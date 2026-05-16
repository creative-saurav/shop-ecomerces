<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = Category::with('parent')->latest()->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $parents = Category::orderBy('name')->get();

        return view('admin.category.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|dimensions:min_width=100,min_height=100|max:2048',
            'icon' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $category = new Category();
        $category->name = $validated['name'];
        $category->slug = $this->uniqueSlug($validated['name']);
        $category->parent_id = $validated['parent_id'] ?? null;
        $category->description = $validated['description'] ?? null;
        $category->icon = $validated['icon'] ?? null;
        $category->status = $request->has('status');
        $category->sort_order = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $category->image = $this->uploadImage($request->file('image'));
        }

        $category->save();

        return Redirect::route('admin.category')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $parents = Category::where('id', '!=', $category->id)->orderBy('name')->get();

        return view('admin.category.edit', compact('category', 'parents'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => ['nullable', 'exists:categories,id'],
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|dimensions:min_width=100,min_height=100|max:2048',
            'icon' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $category->name = $validated['name'];
        $category->slug = $this->uniqueSlug($validated['name'], $category->id);
        $category->parent_id = $validated['parent_id'] ?? null;
        $category->description = $validated['description'] ?? null;
        $category->icon = $validated['icon'] ?? null;
        $category->status = $request->has('status');
        $category->sort_order = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $this->deleteImage($category->image);
            $category->image = $this->uploadImage($request->file('image'));
        }

        $category->save();

        return Redirect::route('admin.category')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $this->deleteImage($category->image);
        $category->delete();

        return Redirect::route('admin.category')->with('success', 'Category deleted successfully.');
    }

    protected function uploadImage(UploadedFile $file): string
    {
        $directory = public_path('uploads/category');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->extension();
        $file->move($directory, $filename);

        return 'uploads/category/' . $filename;
    }

    protected function deleteImage(?string $imagePath): void
    {
        if (! $imagePath) {
            return;
        }

        $fullPath = public_path($imagePath);
        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }
    }

    protected function uniqueSlug(string $name, int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $original = $slug;
        $count = 1;

        while (Category::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }
}
