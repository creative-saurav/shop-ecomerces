<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand', 'images']);

        if ($request->filled('search')) {
            $query->where(function ($sub) use ($request) {
                $sub->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('sku', 'like', '%' . $request->search . '%')
                    ->orWhere('slug', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status === 'active');
        }

        $products = $query->latest()->paginate(15)->withQueryString();
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();

        return view('admin.product.index', compact('products', 'categories', 'brands'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();
        $attributes = Attribute::with('values')->orderBy('name')->get();

        return view('admin.product.create', compact('categories', 'brands', 'attributes'));
    }

    public function show(Product $product)
    {
        $product->load(['category', 'brand', 'images', 'attributeValues.attribute']);

        return view('admin.product.show', compact('product'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = $this->normalizeSlug($data['slug'] ?? $data['name']);
        $data['sku'] = $data['sku'] ?: $this->generateSku($data['name']);
        $data['status'] = $request->has('status');
        $data['is_featured'] = $request->has('is_featured');
        $data['is_digital'] = $request->has('is_digital');
        $data['stock_quantity'] = intval($data['stock_quantity'] ?? 0);

        if ($request->hasFile('meta_image')) {
            $data['meta_image'] = $this->uploadMetaImage($request->file('meta_image'));
        }

        $product = Product::create($data);

        $this->syncAttributes($product, $data['attribute_values'] ?? []);
        $this->storeImages($product, $request->file('images', []), $request->input('primary_image_id'));

        return Redirect::route('admin.product.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();
        $attributes = Attribute::with('values')->orderBy('name')->get();

        return view('admin.product.edit', compact('product', 'categories', 'brands', 'attributes'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['slug'] = $this->normalizeSlug($data['slug'] ?? $data['name'], $product->id);
        $data['sku'] = $data['sku'] ?: $product->sku ?: $this->generateSku($data['name']);
        $data['status'] = $request->has('status');
        $data['is_featured'] = $request->has('is_featured');
        $data['is_digital'] = $request->has('is_digital');

        if ($request->filled('stock_adjustment')) {
            $adjustment = intval($data['stock_adjustment']);
            $data['stock_quantity'] = max(0, $product->stock_quantity + $adjustment);
        } else {
            $data['stock_quantity'] = intval($data['stock_quantity'] ?? $product->stock_quantity);
        }

        if ($request->hasFile('meta_image')) {
            if ($product->meta_image) {
                $this->deleteImageFile($product->meta_image);
            }
            $data['meta_image'] = $this->uploadMetaImage($request->file('meta_image'));
        }

        unset($data['stock_adjustment']);

        $product->update($data);

        $this->syncAttributes($product, $data['attribute_values'] ?? []);
        $this->storeImages($product, $request->file('images', []), $request->input('primary_image_id'));

        if ($request->filled('primary_image_id')) {
            $this->setPrimaryImage($product, intval($request->primary_image_id));
        }

        return Redirect::route('admin.product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        foreach ($product->images as $image) {
            if ($image->image_path) {
                $this->deleteImageFile($image->image_path);
            }
        }

        if ($product->meta_image) {
            $this->deleteImageFile($product->meta_image);
        }

        $product->delete();

        return Redirect::route('admin.product.index')->with('success', 'Product deleted successfully.');
    }

    protected function storeImages(Product $product, array $files, ?int $primaryImageId = null): void
    {
        if (empty($files)) {
            return;
        }

        $isPrimarySet = $product->images()->where('is_primary', true)->exists();
        foreach ($files as $index => $file) {
            if (! $file instanceof UploadedFile) {
                continue;
            }

            $imagePath = $this->uploadImage($file);
            $product->images()->create([
                'image_path' => $imagePath,
                'is_primary' => ! $isPrimarySet && $index === 0,
            ]);
        }

        if ($primaryImageId) {
            $this->setPrimaryImage($product, $primaryImageId);
        }
    }

    protected function setPrimaryImage(Product $product, int $imageId): void
    {
        if (! $product->images()->where('id', $imageId)->exists()) {
            return;
        }

        $product->images()->update(['is_primary' => false]);
        $product->images()->where('id', $imageId)->update(['is_primary' => true]);
    }

    protected function uploadImage(UploadedFile $file): string
    {
        $directory = public_path('uploads/products');
        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->extension();
        $file->move($directory, $filename);

        return 'uploads/products/' . $filename;
    }

    protected function uploadMetaImage(UploadedFile $file): string
    {
        $directory = public_path('uploads/products/meta');
        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->extension();
        $file->move($directory, $filename);

        return 'uploads/products/meta/' . $filename;
    }

    protected function deleteImageFile(string $path): void
    {
        $fullPath = public_path($path);
        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }
    }

    protected function normalizeSlug(string $value, int $ignoreId = null): string
    {
        $slug = Str::slug($value);
        $original = $slug;
        $count = 1;

        while (Product::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }

    protected function generateSku(string $name): string
    {
        $prefix = strtoupper(preg_replace('/[^A-Z0-9]/', '', Str::limit($name, 6, '')));
        $prefix = $prefix ?: 'PROD';
        $candidate = $prefix . '-' . strtoupper(Str::random(4));

        while (Product::where('sku', $candidate)->exists()) {
            $candidate = $prefix . '-' . strtoupper(Str::random(4));
        }

        return $candidate;
    }

    protected function syncAttributes(Product $product, array $attributeValueIds): void
    {
        $attributeValueIds = array_filter(array_map('intval', $attributeValueIds));
        if (empty($attributeValueIds)) {
            $product->attributeValues()->sync([]);
            return;
        }

        $syncData = AttributeValue::whereIn('id', $attributeValueIds)
            ->get()
            ->mapWithKeys(fn (AttributeValue $value) => [
                $value->id => ['attribute_id' => $value->attribute_id],
            ])
            ->toArray();

        $product->attributeValues()->sync($syncData);
    }
}
