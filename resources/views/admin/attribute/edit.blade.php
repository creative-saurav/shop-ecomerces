@extends('admin.layouts.app')
@section('title', 'Edit Attribute')
@section('content')

<div class="page-title px-6 py-6 border-b border-slate-200/80">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-main">Edit Attribute</h1>
            <p class="text-sm text-slate-500">Update your attribute details.</p>
        </div>
        <a href="{{ route('admin.attribute') }}" class="btn btn-secondary">Back to Attributes</a>
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

    <form action="{{ route('admin.attribute.update', $attribute) }}" method="POST" class="space-y-6" id="attributeForm">
        @csrf
        @method('PUT')

        <div class="grid gap-6 lg:grid-cols-2">
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700">Attribute name</label>
                <input id="name" name="name" value="{{ old('name', $attribute->name) }}" type="text" required
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
            <div>
                <label for="slug" class="block text-sm font-medium text-slate-700">Slug</label>
                <input id="slug" name="slug" value="{{ old('slug', $attribute->slug) }}" type="text" readonly disabled
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div>
                <label for="type" class="block text-sm font-medium text-slate-700">Type</label>
                <select id="type" name="type" required class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Select type</option>
                    @foreach($types as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $attribute->type) == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="sort_order" class="block text-sm font-medium text-slate-700">Sort order</label>
                <input id="sort_order" name="sort_order" value="{{ old('sort_order', $attribute->sort_order) }}" type="number" min="0"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
        </div>

        <div class="flex items-center gap-3">
            <label class="inline-flex items-center gap-3 text-sm text-slate-700">
                <input type="checkbox" name="status" value="1" {{ old('status', $attribute->status) ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" />
                Active
            </label>
            <label class="inline-flex items-center gap-3 text-sm text-slate-700">
                <input type="checkbox" name="is_required" value="1" {{ old('is_required', $attribute->is_required) ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" />
                Required
            </label>
        </div>

        <div>
            <div class="mb-4 flex items-center justify-between">
                <label class="block text-sm font-medium text-slate-700">Attribute Values</label>
                <button type="button" id="addValueBtn" class="text-xs font-semibold text-indigo-600 hover:text-indigo-700">+ Add Value</button>
            </div>
            <div id="valuesContainer" class="space-y-3">
                @foreach($attribute->values as $index => $value)
                    <div class="value-row grid gap-3 lg:grid-cols-3 p-4 rounded-xl bg-slate-50 border border-slate-200">
                        <div>
                            <input type="text" name="values[{{ $index }}][value]" value="{{ $value->value }}" placeholder="Value name" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500" />
                        </div>
                        <div>
                            <input type="text" name="values[{{ $index }}][color_code]" value="{{ $value->color_code }}" placeholder="Color code #000000" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500" />
                        </div>
                        <div class="flex gap-2">
                            <input type="number" name="values[{{ $index }}][price_adjustment]" value="{{ $value->price_adjustment }}" placeholder="Price adjust" step="0.01" class="flex-1 rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500" />
                            <button type="button" class="remove-value-btn rounded-lg bg-red-600 px-3 py-2 text-white hover:bg-red-700 text-sm font-semibold">Remove</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.attribute') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        const typeSelect = document.getElementById('type');
        const valuesContainer = document.getElementById('valuesContainer');
        const addValueBtn = document.getElementById('addValueBtn');
        let valueCount = {{ $attribute->values->count() }};

        nameInput.addEventListener('input', function () {
            const value = this.value.trim().toLowerCase();
            const slug = value
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-+|-+$/g, '');
            slugInput.value = slug;
        });

        addValueBtn.addEventListener('click', function () {
            const newRow = document.createElement('div');
            newRow.className = 'value-row grid gap-3 lg:grid-cols-3 p-4 rounded-xl bg-slate-50 border border-slate-200';
            newRow.innerHTML = `
                <div>
                    <input type="text" name="values[${valueCount}][value]" placeholder="Value name" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500" />
                </div>
                <div>
                    <input type="text" name="values[${valueCount}][color_code]" placeholder="Color code #000000" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500" />
                </div>
                <div class="flex gap-2">
                    <input type="number" name="values[${valueCount}][price_adjustment]" placeholder="Price adjust" step="0.01" class="flex-1 rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    <button type="button" class="remove-value-btn rounded-lg bg-red-600 px-3 py-2 text-white hover:bg-red-700 text-sm font-semibold">Remove</button>
                </div>
            `;
            valuesContainer.appendChild(newRow);
            valueCount++;
            attachRemoveListeners();
        });

        function attachRemoveListeners() {
            document.querySelectorAll('.remove-value-btn').forEach(btn => {
                btn.removeEventListener('click', removeValue);
                btn.addEventListener('click', removeValue);
            });
        }

        function removeValue(e) {
            e.preventDefault();
            if (valuesContainer.querySelectorAll('.value-row').length > 1) {
                e.target.closest('.value-row').remove();
            } else {
                showToast('At least one value is required', 'error');
            }
        }

        attachRemoveListeners();
    });
</script>
@endsection
