@extends('admin.layouts.app')
@section('title', 'Edit Brand')
@section('content')
<div class="page-title px-6 py-6 border-b border-slate-200/80">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-main">Edit Brand</h1>
            <p class="text-sm text-slate-500">Update your brand details.</p>
        </div>
        <a href="{{ route('admin.brand') }}" class="btn btn-secondary">Back to Brands</a>
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

    <form action="{{ route('admin.brand.update', $brand) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid gap-6 lg:grid-cols-2">
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700">Brand name</label>
                <input id="name" name="name" value="{{ old('name', $brand->name) }}" type="text" required
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
            <div>
                <label for="slug" class="block text-sm font-medium text-slate-700">Slug</label>
                <input id="slug" name="slug" value="{{ old('slug', $brand->slug) }}" type="text" readonly disabled
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-slate-700">Description</label>
            <textarea id="description" name="description" rows="4" class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $brand->description) }}</textarea>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div>
                <label for="meta_title" class="block text-sm font-medium text-slate-700">Meta title</label>
                <input id="meta_title" name="meta_title" value="{{ old('meta_title', $brand->meta_title) }}" type="text"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
            <div>
                <label for="meta_description" class="block text-sm font-medium text-slate-700">Meta description</label>
                <input id="meta_description" name="meta_description" value="{{ old('meta_description', $brand->meta_description) }}" type="text"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
        </div>

        <div>
            <label for="logo" class="block text-sm font-medium text-slate-700">Logo</label>
            <input id="logo" name="logo" type="file" accept="image/*"
                class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            @if($brand->logo)
                <div class="mt-3">
                    <img src="{{ asset($brand->logo) }}" alt="Brand logo" class="h-24 w-auto rounded-xl object-cover border border-slate-200" />
                </div>
            @endif
        </div>

        <div class="flex items-center gap-3">
            <label class="inline-flex items-center gap-3 text-sm text-slate-700">
                <input type="checkbox" name="status" value="1" {{ old('status', $brand->status) ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" />
                Active
            </label>
            <label class="inline-flex items-center gap-3 text-sm text-slate-700">
                <input type="checkbox" name="featured" value="1" {{ old('featured', $brand->featured) ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" />
                Featured
            </label>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.brand') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>
@endsection
