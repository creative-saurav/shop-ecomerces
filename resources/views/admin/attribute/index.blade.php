@extends('admin.layouts.app')
@section('title', 'Attributes')
@section('content')

<div class="page-title px-6 py-6 border-b border-slate-200/80">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-main">Product Attributes</h1>
            <p class="text-sm text-slate-500">Create, update and remove attributes for your ecommerce store.</p>
        </div>
        <a href="{{ route('admin.attribute.create') }}" class="btn btn-primary">Create Attribute</a>
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
                <h2 class="text-lg font-semibold text-main">Attributes list</h2>
                <p class="text-sm text-slate-500">All existing attributes.</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="border-b border-slate-200 text-slate-900">
                    <tr>
                        <th class="py-3 px-3 font-semibold">ID</th>
                        <th class="py-3 px-3 font-semibold">Name</th>
                        <th class="py-3 px-3 font-semibold">Type</th>
                        <th class="py-3 px-3 font-semibold">Values</th>
                        <th class="py-3 px-3 font-semibold">Required</th>
                        <th class="py-3 px-3 font-semibold">Status</th>
                        <th class="py-3 px-3 font-semibold">Created</th>
                        <th class="py-3 px-3 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attributes as $attribute)
                        <tr class="border-b border-slate-200 hover:bg-slate-50 searchable-row">
                            <td class="py-3 px-3">{{ $attribute->id }}</td>
                            <td class="py-3 px-3">{{ $attribute->name }}</td>
                            <td class="py-3 px-3">
                                <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                    {{ ucfirst($attribute->type) }}
                                </span>
                            </td>
                            <td class="py-3 px-3">
                                <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                    {{ $attribute->values_count }}
                                </span>
                            </td>
                            <td class="py-3 px-3">
                                <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold {{ $attribute->is_required ? 'text-emerald-700' : 'text-slate-600' }}">
                                    {{ $attribute->is_required ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td class="py-3 px-3">
                                <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold {{ $attribute->status ? 'text-emerald-700' : 'text-slate-600' }}">
                                    {{ $attribute->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="py-3 px-3">{{ $attribute->created_at->format('Y-m-d') }}</td>
                            <td class="py-3 px-3 space-x-2">
                                <a href="{{ route('admin.attribute.edit', $attribute) }}" class="inline-flex items-center rounded-lg bg-indigo-600 px-3 py-2 text-xs font-semibold text-white hover:bg-indigo-700">Edit</a>
                                <a href="javascript:void(0)"
                                    onclick='confirmModal("{{ route('admin.attribute.destroy', $attribute) }}", "GET", {{ json_encode($attribute->name) }})'
                                    class="inline-flex items-center rounded-lg bg-red-600 px-3 py-2 text-xs font-semibold text-white hover:bg-red-700">
                                        Delete
                                    </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-6 px-3 text-center text-slate-500">No attributes found. Create your first attribute.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $attributes->withQueryString()->links() }}
        </div>
    </div>
</div>

@endsection
