@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')
<div class="page-title px-6 py-6 border-b border-slate-200/80">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-main">Products</h1>
            <p class="text-sm text-slate-500">Browse, filter and manage your ecommerce products.</p>
        </div>
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Create Product</a>
    </div>
</div>

<div class="p-6">
    @if(session('success'))
        <script>
            window.addEventListener('DOMContentLoaded', () => showToast(@json(session('success')), 'success'));
        </script>
    @endif

    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h2 class="text-lg font-semibold text-main">Product list</h2>
                <p class="text-sm text-slate-500">Search products, filter by category, brand or status.</p>
            </div>
            <form method="GET" action="{{ route('admin.product.index') }}" class="grid gap-3 sm:grid-cols-4 w-full lg:w-auto">
                <div>
                    <label class="sr-only" for="search">Search</label>
                    <input id="search" name="search" value="{{ request('search') }}" type="text" placeholder="Search by name, SKU or slug"
                        class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-indigo-500 focus:ring-indigo-500" />
                </div>
                <div>
                    <label class="sr-only" for="category">Category</label>
                    <select id="category" name="category" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">All categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="sr-only" for="brand">Brand</label>
                    <select id="brand" name="brand" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">All brands</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="sr-only" for="status">Status</label>
                    <select id="status" name="status" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">All statuses</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary w-full sm:w-auto">Filter</button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="border-b border-slate-200 text-slate-900">
                    <tr>
                        <th class="py-3 px-3 font-semibold">ID</th>
                        <th class="py-3 px-3 font-semibold">Name</th>
                        <th class="py-3 px-3 font-semibold">SKU</th>
                        <th class="py-3 px-3 font-semibold">Category</th>
                        <th class="py-3 px-3 font-semibold">Brand</th>
                        <th class="py-3 px-3 font-semibold">Price</th>
                        <th class="py-3 px-3 font-semibold">Stock</th>
                        <th class="py-3 px-3 font-semibold">Status</th>
                        <th class="py-3 px-3 font-semibold">Featured</th>
                        <th class="py-3 px-3 font-semibold">Created</th>
                        <th class="py-3 px-3 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr class="border-b border-slate-200 hover:bg-slate-50">
                            <td class="py-3 px-3">{{ $product->id }}</td>
                            <td class="py-3 px-3">
                                <div class="flex items-center gap-3">
                                    <div class="h-12 w-12 overflow-hidden rounded-lg bg-slate-100">
                                        @if($product->primary_image_url)
                                            <img src="{{ $product->primary_image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover" />
                                        @else
                                            <div class="h-full w-full flex items-center justify-center text-slate-400">No image</div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-medium text-slate-900">{{ $product->name }}</div>
                                        <div class="text-xs text-slate-500">{{ $product->slug }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-3 font-mono text-xs text-slate-600">{{ $product->sku }}</td>
                            <td class="py-3 px-3">{{ $product->category?->name ?? '—' }}</td>
                            <td class="py-3 px-3">{{ $product->brand?->name ?? '—' }}</td>
                            <td class="py-3 px-3">
                                <span class="font-semibold text-slate-900">${{ number_format($product->price, 2) }}</span>
                                @if($product->discount_price)
                                    <div class="text-xs text-slate-500">Sale ${{ number_format($product->discount_price, 2) }}</div>
                                @endif
                            </td>
                            <td class="py-3 px-3">{{ $product->stock_quantity }}</td>
                            <td class="py-3 px-3">
                                <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold {{ $product->status ? 'text-emerald-700' : 'text-slate-600' }}">
                                    {{ $product->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="py-3 px-3">
                                <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold {{ $product->is_featured ? 'text-amber-700' : 'text-slate-600' }}">
                                    {{ $product->is_featured ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td class="py-3 px-3">{{ $product->created_at->format('Y-m-d') }}</td>
                            <td class="py-3 px-3 space-x-2">
                                <a href="{{ route('admin.product.show', $product) }}" class="inline-flex items-center rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-200">View</a>
                                <a href="{{ route('admin.product.edit', $product) }}" class="inline-flex items-center rounded-lg bg-indigo-600 px-3 py-2 text-xs font-semibold text-white hover:bg-indigo-700">Edit</a>
                                <a href="javascript:void(0)"
                                   onclick='confirmModal("{{ route('admin.product.destroy', $product) }}", "GET", {{ json_encode($product->name) }})'
                                   class="inline-flex items-center rounded-lg bg-red-600 px-3 py-2 text-xs font-semibold text-white hover:bg-red-700">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="py-6 px-3 text-center text-slate-500">No products found. Create your first product.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">{{ $products->links() }}</div>
    </div>
</div>
@endsection
