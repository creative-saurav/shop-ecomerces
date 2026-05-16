@extends('admin.layouts.app')
@section('title', 'Brands')
@section('content')

<div class="page-title px-6 py-6 border-b border-slate-200/80">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-main">Brands</h1>
            <p class="text-sm text-slate-500">Create, update and remove brands for your ecommerce store.</p>
        </div>
        <a href="{{ route('admin.brand.create') }}" class="btn btn-primary">Create Brand</a>
    </div>
</div>

<div class="p-6">
    @if(session('success'))
        <script>
            window.addEventListener('DOMContentLoaded', () => showToast(@json(session('success')), 'success'));
        </script>
    @endif

    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-5 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-main">Brand list</h2>
                <p class="text-sm text-slate-500">All existing brands.</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="border-b border-slate-200 text-slate-900">
                    <tr>
                        <th class="py-3 px-3 font-semibold">ID</th>
                        <th class="py-3 px-3 font-semibold">Logo</th>
                        <th class="py-3 px-3 font-semibold">Name</th>
                        <th class="py-3 px-3 font-semibold">Status</th>
                        <th class="py-3 px-3 font-semibold">Created</th>
                        <th class="py-3 px-3 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($brands as $brand)
                        <tr class="border-b border-slate-200 hover:bg-slate-50 searchable-row">
                            <td class="py-3 px-3">{{ $brand->id }}</td>
                            <td class="py-3 px-3">
                                @if($brand->logo)
                                    <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }} logo" class="h-10 w-10 rounded-lg object-cover" />
                                @else
                                    <span class="text-xs text-slate-500">No logo</span>
                                @endif
                            </td>
                            <td class="py-3 px-3">{{ $brand->name }}</td>
                            <td class="py-3 px-3">
                                <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold {{ $brand->status ? 'text-emerald-700' : 'text-slate-600' }}">
                                    {{ $brand->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="py-3 px-3">{{ $brand->created_at->format('Y-m-d') }}</td>
                            <td class="py-3 px-3 space-x-2">
                                <a href="{{ route('admin.brand.edit', $brand) }}" class="inline-flex items-center rounded-lg bg-indigo-600 px-3 py-2 text-xs font-semibold text-white hover:bg-indigo-700">Edit</a>
                                <a href="javascript:void(0)"
                                    onclick='confirmModal("{{ route('admin.brand.destroy', $brand) }}", "GET", {{ json_encode($brand->name) }})'
                                    class="inline-flex items-center rounded-lg bg-red-600 px-3 py-2 text-xs font-semibold text-white hover:bg-red-700">
                                        Delete
                                    </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-6 px-3 text-center text-slate-500">No brands found. Create your first brand.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
