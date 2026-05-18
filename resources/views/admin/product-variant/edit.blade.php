@extends('admin.layouts.app')
@section('title', 'Edit Product Variant')
@section('content')
<div class="page-title px-6 py-6 border-b border-slate-200/80">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-main">Edit Product Variant</h1>
            <p class="text-sm text-slate-500">Update variant details, pricing, stock and image.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.product.variant.index') }}" class="btn btn-secondary">Back to Variants</a>
        </div>
    </div>
</div>

<div class="p-6">
    @if(session('success'))
        <script>
            window.addEventListener('DOMContentLoaded', () => showToast(@json(session('success')), 'success'));
        </script>
    @endif

    @if($errors->any())
        <div class="mb-4 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.product.variant.update', $variant) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid gap-6 lg:grid-cols-2">
            <div>
                <label for="product_id" class="block text-sm font-medium text-slate-700">Product</label>
                <select id="product_id" name="product_id" required disabled
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @foreach($products as $item)
                        <option value="{{ $item->id }}" {{ $variant->product_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
                <p class="mt-2 text-xs text-slate-500">Product cannot be changed after creation.</p>
            </div>
            <div>
                <label for="sku" class="block text-sm font-medium text-slate-700">SKU</label>
                <input id="sku" name="sku" value="{{ old('sku', $variant->sku) }}" type="text" required
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-3">
            <div>
                <label for="price" class="block text-sm font-medium text-slate-700">Price</label>
                <input id="price" name="price" value="{{ old('price', $variant->price) }}" type="number" step="0.01" min="0" required
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
            <div>
                <label for="discount_price" class="block text-sm font-medium text-slate-700">Discount Price</label>
                <input id="discount_price" name="discount_price" value="{{ old('discount_price', $variant->discount_price) }}" type="number" step="0.01" min="0"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                <p class="mt-2 text-xs text-slate-500">Leave empty or use 0 for no discount.</p>
            </div>
            <div>
                <label for="stock_quantity" class="block text-sm font-medium text-slate-700">Stock Quantity</label>
                <input id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', $variant->stock_quantity) }}" type="number" min="0" required
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-slate-50 p-6">
            <h3 class="mb-4 text-base font-semibold text-slate-900">Attributes</h3>
            <p class="mb-4 text-sm text-slate-600">Select attribute values for this variant.</p>

            @php
                $groupedAttributes = $product->attributeValues->groupBy(fn($value) => $value->attribute?->name ?? 'Other');
            @endphp

            @if($groupedAttributes->isNotEmpty())
                <div class="grid gap-4 lg:grid-cols-2">
                    @foreach($groupedAttributes as $attributeName => $values)
                        <div class="rounded-xl border border-slate-200 bg-white p-4">
                            <div class="text-sm font-semibold text-slate-900">{{ $attributeName }}</div>
                            <div class="mt-3 grid gap-2">
                                @foreach($values as $value)
                                    <label class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-800">
                                        <input type="checkbox" name="attribute_values[]" value="{{ $value->id }}"
                                            {{ in_array($value->id, $selectedAttributes ?? []) ? 'checked' : '' }}
                                            class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" />
                                        <span>{{ $value->value }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="rounded-xl border border-dashed border-slate-300 bg-white p-8 text-center text-slate-500">
                    No attribute values assigned for this product.
                </div>
            @endif
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-700">Variant Image</label>
                <div class="mt-2 flex items-center gap-4">
                    <div class="h-24 w-24 overflow-hidden rounded-lg bg-slate-100 flex-shrink-0">
                        @if($variant->image)
                            <img id="image-preview" src="{{ asset($variant->image) }}" alt="Variant image" class="h-full w-full object-cover" />
                        @else
                            <div id="image-preview" class="h-full w-full flex items-center justify-center text-slate-400">No image</div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <input id="image" name="image" type="file" accept="image/*" onchange="previewImage()"
                            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm" />
                        <p class="mt-2 text-xs text-slate-500">PNG, JPG, GIF up to 5MB</p>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <label class="block text-sm font-medium text-slate-700">Variant Status</label>
                <div class="flex flex-col gap-2">
                    <label class="inline-flex items-center gap-3 text-sm text-slate-700">
                        <input type="checkbox" name="status" value="1" {{ old('status', $variant->status) ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" />
                        Active
                    </label>
                    <label class="inline-flex items-center gap-3 text-sm text-slate-700">
                        <input type="checkbox" name="is_default" value="1" {{ old('is_default', $variant->is_default) ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-slate-300 text-purple-600 focus:ring-purple-500" />
                        Set as default variant
                    </label>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-6 border-t border-slate-200">
            <a href="{{ route('admin.product.variant.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Variant</button>
        </div>
    </form>
</div>

<script>
function previewImage() {
    const input = document.getElementById('image');
    const preview = document.getElementById('image-preview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `<img src="${e.target.result}" alt="Preview" class="h-full w-full object-cover" />`;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
