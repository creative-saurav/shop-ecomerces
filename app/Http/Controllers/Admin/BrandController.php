<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function brand()
    {
        $brands = Brand::when(request('search'), fn ($query, $search) => $query->where('name', 'like', "%{$search}%")
            ->orWhere('slug', 'like', "%{$search}%"))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(BrandRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = $this->normalizeSlug($data['slug'] ?? $data['name']);
        $data['status'] = $request->has('status');
        $data['featured'] = $request->has('featured');

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->uploadLogo($request->file('logo'));
        }

        Brand::create($data);

        return Redirect::route('admin.brand')->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $data = $request->validated();
        $data['slug'] = $this->normalizeSlug($data['slug'] ?? $data['name'], $brand->id);
        $data['status'] = $request->has('status');
        $data['featured'] = $request->has('featured');

        if ($request->hasFile('logo')) {
            $this->deleteLogo($brand->logo);
            $data['logo'] = $this->uploadLogo($request->file('logo'));
        }

        $brand->update($data);

        return Redirect::route('admin.brand')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return Redirect::route('admin.brand')->with('success', 'Brand deleted successfully.');
    }

    protected function uploadLogo(UploadedFile $file): string
    {
        $directory = public_path('uploads/brands');
        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->extension();
        $file->move($directory, $filename);

        return 'uploads/brands/' . $filename;
    }

    protected function deleteLogo(?string $logoPath): void
    {
        if (! $logoPath) {
            return;
        }

        $fullPath = public_path($logoPath);
        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }
    }

    protected function normalizeSlug(string $value, int $ignoreId = null): string
    {
        $slug = Str::slug($value);
        $original = $slug;
        $count = 1;

        while (Brand::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }
}
