@extends('admin.layouts.app')
@section('title', 'Product Variants')
@section('content')
<div class="page-title px-6 py-6 border-b border-slate-200/80">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-main">Product Variants</h1>
            <p class="text-sm text-slate-500">Manage product variants with different SKUs, prices and attributes.</p>
        </div>
        <a href="{{ route('admin.product.variant.create') }}" class="btn btn-primary">Create Variants</a>
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
                <h2 class="text-lg font-semibold text-main">Variant list</h2>
                <p class="text-sm text-slate-500">Search variants by SKU or product name, filter by product.</p>
            </div>
            <form method="GET" action="{{ route('admin.product.variant') }}" class="grid gap-3 sm:grid-cols-3 w-full lg:w-auto">
                <div>
                    <label class="sr-only" for="search">Search</label>
                    <input id="search" name="search" value="{{ request('search') }}" type="text" placeholder="Search by SKU or product name"
                        class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-indigo-500 focus:ring-indigo-500" />
                </div>
                <div>
                    <label class="sr-only" for="product_id">Product</label>
                    <select id="product_id" name="product_id" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">All products</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary w-full sm:w-auto">Filter</button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="border-b border-slate-200 text-slate-900">
                    <tr>
                        <th class="py-3 px-3 font-semibold">SKU</th>
                        <th class="py-3 px-3 font-semibold">Variant Name</th>
                        <th class="py-3 px-3 font-semibold">Product</th>
                        <th class="py-3 px-3 font-semibold">Price</th>
                        <th class="py-3 px-3 font-semibold">Stock</th>
                        <th class="py-3 px-3 font-semibold">Status</th>
                        <th class="py-3 px-3 font-semibold">Default</th>
                        <th class="py-3 px-3 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($variants as $variant)
                        <tr class="border-b border-slate-200 hover:bg-slate-50">
                            <td class="py-3 px-3 font-mono text-xs text-slate-600 font-semibold">{{ $variant->sku }}</td>
                            <td class="py-3 px-3">{{ $variant->variant_name }}</td>
                            <td class="py-3 px-3">
                                <a href="{{ route('admin.product.show', $variant->product) }}" class="text-indigo-600 hover:text-indigo-700 font-medium">
                                    {{ $variant->product?->name }}
                                </a>
                            </td>
                            <td class="py-3 px-3">
                                <div class="text-slate-900 font-semibold">
                                    @if($variant->discount_price && $variant->discount_price < $variant->price)
                                        <span class="line-through text-slate-500 text-xs">${{ number_format($variant->price, 2) }}</span>
                                        <span>${{ number_format($variant->discount_price, 2) }}</span>
                                    @else
                                        ${{ number_format($variant->price, 2) }}
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-3">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $variant->stock_quantity > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $variant->stock_quantity }} in stock
                                </span>
                            </td>
                            <td class="py-3 px-3">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $variant->status ? 'bg-blue-100 text-blue-800' : 'bg-slate-100 text-slate-800' }}">
                                    {{ $variant->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="py-3 px-3">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $variant->is_default ? 'bg-purple-100 text-purple-800' : 'bg-slate-100 text-slate-800' }}">
                                    {{ $variant->is_default ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td class="py-3 px-3">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.product.variant.edit', $variant) }}" class="btn btn-sm btn-outline">Edit</a>
                                   
                                     <a href="javascript:void(0)"
                                    onclick='confirmModal("{{ route('admin.product.variant.destroy', $variant->id) }}", "DELETE", {{ json_encode($variant->sku) }})'
                                    class="inline-flex items-center rounded-lg bg-red-600 px-3 py-2 text-xs font-semibold text-white hover:bg-red-700">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-8 px-3 text-center text-slate-500">No variants found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($variants->hasPages())
            <div class="mt-6 flex justify-center">
                {{ $variants->links() }}
            </div>
        @endif
    </div>
</div>




@endsection
