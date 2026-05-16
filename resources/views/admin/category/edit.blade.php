@extends('admin.layouts.app')
@section('title', 'Edit Category')
@section('content')
<div class="page-title px-6 py-6 border-b border-slate-200/80">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-main">Edit Category</h1>
            <p class="text-sm text-slate-500">Update your category details.</p>
        </div>
        <a href="{{ route('admin.category') }}" class="btn btn-secondary">Back to Categories</a>
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

    <form action="{{ route('admin.category.update', $category) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid gap-6 lg:grid-cols-2">
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700">Category name</label>
                <input id="name" name="name" value="{{ old('name', $category->name) }}" type="text" required
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
            <div>
                <label for="parent_id" class="block text-sm font-medium text-slate-700">Parent category</label>
                <select id="parent_id" name="parent_id" class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">No parent</option>
                    @foreach($parents as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-slate-700">Description</label>
            <textarea id="description" name="description" rows="4" class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div>
                <label for="icon" class="block text-sm font-medium text-slate-700">Icon</label>
                <input id="icon" name="icon" value="{{ old('icon', $category->icon) }}" type="text"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
            <div>
                <label for="sort_order" class="block text-sm font-medium text-slate-700">Sort order</label>
                <input id="sort_order" name="sort_order" value="{{ old('sort_order', $category->sort_order) }}" type="number" min="0"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-slate-700">Image</label>
            <input id="image" name="image" type="file" accept="image/*"
                class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            @if($category->image)
                <div class="mt-3">
                    <img src="{{ asset($category->image) }}" alt="Category image" class="h-24 w-auto rounded-xl object-cover border border-slate-200" />
                </div>
            @endif
        </div>

        <div class="flex items-center gap-3">
            <label class="inline-flex items-center gap-3 text-sm text-slate-700">
                <input type="checkbox" name="status" value="1" {{ old('status', $category->status) ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" />
                Active
            </label>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.category') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>
@endsection
