@extends('admin.layouts.app')
@section('title', 'Create Product')
@section('content')
<div class="page-title px-6 py-6 border-b border-slate-200/80">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-main">Create Product</h1>
            <p class="text-sm text-slate-500">Add a new product to your ecommerce catalog.</p>
        </div>
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Back to Products</a>
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

    <form action="{{ route('admin.product.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf

        <div class="grid gap-6 lg:grid-cols-2">
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700">Product name</label>
                <input id="name" name="name" value="{{ old('name') }}" type="text" required
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
            <div>
                <label for="slug" class="block text-sm font-medium text-slate-700">Slug</label>
                <input id="slug" name="slug" value="{{ old('slug') }}" type="text"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-3">
            <div>
                <label for="sku" class="block text-sm font-medium text-slate-700">SKU</label>
                <input id="sku" name="sku" value="{{ old('sku') }}" type="text"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                <p class="mt-2 text-xs text-slate-500">Leave empty to auto-generate a unique SKU.</p>
            </div>
            <div>
                <label for="category_id" class="block text-sm font-medium text-slate-700">Category</label>
                <select id="category_id" name="category_id" required
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Select category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="brand_id" class="block text-sm font-medium text-slate-700">Brand (optional)</label>
                <select id="brand_id" name="brand_id"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">No brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div>
                <label for="short_description" class="block text-sm font-medium text-slate-700">Short description</label>
                <textarea id="short_description" name="short_description" rows="3"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('short_description') }}</textarea>
            </div>
            <div>
                <label for="long_description" class="block text-sm font-medium text-slate-700">Long description</label>
                <textarea id="long_description" name="long_description" rows="5"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('long_description') }}</textarea>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-3">
            <div>
                <label for="price" class="block text-sm font-medium text-slate-700">Price</label>
                <input id="price" name="price" value="{{ old('price') }}" type="number" step="0.01" min="0"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
            <div>
                <label for="discount_price" class="block text-sm font-medium text-slate-700">Discount price</label>
                <input id="discount_price" name="discount_price" value="{{ old('discount_price') }}" type="number" step="0.01" min="0"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
            <div>
                <label for="cost_price" class="block text-sm font-medium text-slate-700">Cost price</label>
                <input id="cost_price" name="cost_price" value="{{ old('cost_price') }}" type="number" step="0.01" min="0"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-3">
            <div>
                <label for="stock_quantity" class="block text-sm font-medium text-slate-700">Stock quantity</label>
                <input id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', 0) }}" type="number" min="0"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
            <div>
                <label for="weight" class="block text-sm font-medium text-slate-700">Weight (kg)</label>
                <input id="weight" name="weight" value="{{ old('weight') }}" type="number" step="0.01" min="0"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
            <div class="space-y-3">
                <label class="block text-sm font-medium text-slate-700">Product flags</label>
                <div class="flex flex-col gap-2">
                    <label class="inline-flex items-center gap-3 text-sm text-slate-700">
                        <input type="checkbox" name="status" value="1" {{ old('status', true) ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" />
                        Active
                    </label>
                    <label class="inline-flex items-center gap-3 text-sm text-slate-700">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-amber-600 focus:ring-amber-500" />
                        Featured
                    </label>
                    <label class="inline-flex items-center gap-3 text-sm text-slate-700">
                        <input type="checkbox" name="is_digital" value="1" {{ old('is_digital') ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500" />
                        Digital product
                    </label>
                </div>
            </div>
        </div>

        <div>
            <label for="images" class="block text-sm font-medium text-slate-700">Product images</label>
            <input id="images" name="images[]" type="file" accept="image/*" multiple
                class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            <p class="mt-2 text-xs text-slate-500">Upload one or more images. You can set the primary image after uploading.</p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
            <h2 class="text-base font-semibold text-main">Product attributes</h2>
            <p class="text-sm text-slate-500">Choose attribute values to link this product with your existing attribute system.</p>

            <div class="grid gap-6 mt-4">
                @forelse($attributes as $attribute)
                    <div class="rounded-xl border border-slate-200 bg-white p-4">
                        <div class="text-sm font-semibold text-slate-900">{{ $attribute->name }}</div>
                        <div class="mt-3 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach($attribute->values as $value)
                                <label class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-800">
                                    <input type="checkbox" name="attribute_values[]" value="{{ $value->id }}"
                                        {{ in_array($value->id, old('attribute_values', [])) ? 'checked' : '' }}
                                        class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" />
                                    <span>{{ $value->value }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="rounded-xl border border-slate-200 bg-white p-4 text-sm text-slate-500">No attributes configured yet.</div>
                @endforelse
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-4">
            <div>
                <label for="meta_title" class="block text-sm font-medium text-slate-700">Meta title</label>
                <input id="meta_title" name="meta_title" value="{{ old('meta_title') }}" type="text"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
            <div>
                <label for="meta_description" class="block text-sm font-medium text-slate-700">Meta description</label>
                <textarea id="meta_description" name="meta_description" rows="2"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('meta_description') }}</textarea>
            </div>
            <div>
                <label for="meta_keywords" class="block text-sm font-medium text-slate-700">Meta keywords</label>
                <input id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords') }}" type="text"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
            <div>
                <label for="meta_image" class="block text-sm font-medium text-slate-700">Meta image</label>
                <input id="meta_image" name="meta_image" type="file" accept="image/*"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                <p class="mt-2 text-xs text-slate-500">Use this image for SEO/Open Graph previews.</p>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn btn-primary">Create Product</button>
            <a href="{{ route('admin.product.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const nameField = document.getElementById('name');
        const slugField = document.getElementById('slug');
        const skuField = document.getElementById('sku');
        let slugManuallyChanged = false;

        slugField.addEventListener('input', () => {
            slugManuallyChanged = slugField.value.trim().length > 0;
        });

        nameField.addEventListener('input', () => {
            const value = nameField.value.trim();
            if (!slugManuallyChanged) {
                slugField.value = value.toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/(^-|-$)/g, '');
            }
            if (!skuField.value) {
                const prefix = value.split(' ').map(word => word.slice(0, 2).toUpperCase()).join('').slice(0, 8) || 'PRD';
                skuField.value = `${prefix}-${Math.floor(1000 + Math.random() * 9000)}`;
            }
        });
    });
</script>
@endsection
