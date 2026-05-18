<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\AttributeValue;
use App\Http\Requests\Admin\ProductVariantStoreRequest;
use App\Http\Requests\Admin\ProductVariantUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductVariantController extends Controller
{
    public function product_variant(Request $request)
    {
        $query = ProductVariant::with('product', 'attributeValues');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('product', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhere('sku', 'like', "%{$search}%");
        }

        if ($request->filled('product_id')) {
            $query->where('product_id', $request->input('product_id'));
        }

        $variants = $query->latest()->paginate(15)->withQueryString();
        $products = Product::orderBy('name')->get();

        return view('admin.product-variant.index', compact('variants', 'products'));
    }

        public function create(Request $request)
        {
            $products = Product::orderBy('name')->get();

            $product = null;

            if ($request->filled('product_id')) {
                $product = Product::find($request->product_id);
            }

            return view(
                'admin.product-variant.create',
                compact('products', 'product')
            );
}
    public function store(ProductVariantStoreRequest $request)
    {
        $product = Product::findOrFail($request->product_id);
        $variants = $request->input('variants');

        foreach ($variants as $variantData) {
            $sku = $variantData['sku'] ?? $this->prepareSku($product);
            $imagePath = null;

            if (isset($variantData['image'])) {
                $imagePath = $this->uploadImage($variantData['image'], $product->id);
            }

            $variantLabel = $this->buildVariantLabel($variantData['attribute_values'] ?? []);

            $variant = $product->variants()->create([
                'sku' => $sku,
                'variant_name' => $variantLabel,
                'price' => $variantData['price'],
                'discount_price' => $variantData['discount_price'] ?? null,
                'stock_quantity' => $variantData['stock_quantity'],
                'image' => $imagePath,
                'is_default' => false,
                'status' => 1,
            ]);

            if (isset($variantData['attribute_values']) && is_array($variantData['attribute_values'])) {
                $variant->attributeValues()->sync($variantData['attribute_values']);
            }
        }

        return redirect()->route('admin.product.variant')->with('success', 'Variants created successfully!');
    }

    public function edit(ProductVariant $variant)
    {
        $product = $variant->product;
        $products = Product::orderBy('name')->get();
        $selectedAttributes = $variant->attributeValues->pluck('id')->toArray();

        return view('admin.product-variant.edit', compact('variant', 'product', 'products', 'selectedAttributes'));
    }

    public function update(ProductVariant $variant, ProductVariantUpdateRequest $request)
    {
        $oldImage = $variant->image;
        $imagePath = $oldImage;

        if ($request->hasFile('image')) {
            if ($oldImage) {
                $this->deleteImageFile($oldImage);
            }
            $imagePath = $this->uploadImage($request->file('image'), $variant->product_id);
        }

        $variant->update([
            'sku' => $request->input('sku'),
            'price' => $request->input('price'),
            'discount_price' => $request->input('discount_price'),
            'stock_quantity' => $request->input('stock_quantity'),
            'image' => $imagePath,
            'is_default' => $request->input('is_default', false),
        ]);

        $attributeValues = $request->input('attribute_values', []);
        $variant->attributeValues()->sync($attributeValues);

        return redirect()->route('admin.product.variant')->with('success', 'Variant updated successfully!');
    }

    public function destroy(ProductVariant $variant)
    {
        if ($variant->image) {
            $this->deleteImageFile($variant->image);
        }
        $variant->delete();

        return redirect()->route('admin.product.variant')->with('success', 'Variant deleted successfully!');
    }

    protected function prepareSku(Product $product)
    {
        $lastVariant = $product->variants()->latest('id')->first();
        $count = $lastVariant ? intval(substr($lastVariant->sku, -3)) + 1 : 1;
        return $product->sku . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);
    }

    protected function buildVariantLabel($attributeValueIds)
    {
        if (empty($attributeValueIds)) {
            return 'Variant';
        }

        $values = AttributeValue::whereIn('id', $attributeValueIds)->get();
        return $values->pluck('value')->implode(' / ');
    }

    protected function uploadImage($image, $productId)
    {
        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/product-variants'), $filename);
        return 'uploads/product-variants/' . $filename;
    }

    protected function deleteImageFile($imagePath)
    {
        if ($imagePath && file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath));
        }
    }
}
