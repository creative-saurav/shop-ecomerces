@extends('admin.layouts.app')
@section('title', 'Create Product Variants')
@section('content')
<div class="page-title px-6 py-6 border-b border-slate-200/80">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-main">Create Product Variants</h1>
            <p class="text-sm text-slate-500">Generate multiple variants from selected attribute combinations or create custom variant rows.</p>
        </div>
        <a href="{{ route('admin.product.variant') }}" class="btn btn-secondary">Back to Variants</a>
    </div>
</div>

<div class="p-6 space-y-6">
    @if($errors->any())
        <div class="mb-4 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.product.variant.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid gap-6 lg:grid-cols-2">
            <div>
                <label for="product_id" class="block text-sm font-medium text-slate-700">Product</label>
                <select id="product_id" name="product_id" required onchange="location = this.value ? '{{ route('admin.product.variant.create') }}?product_id=' + this.value : '{{ route('admin.product.variant.create') }}'"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Select a product</option>
                    @foreach($products as $item)
                        <option value="{{ $item->id }}" {{ optional($product)->id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700">Active status</label>
                <div class="mt-2 flex items-center gap-3">
                    <label class="inline-flex items-center gap-2 text-sm text-slate-700">
                        <input type="checkbox" name="default_status" checked disabled class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" />
                        Active by default
                    </label>
                </div>
            </div>
        </div>

        @if($product)
            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <h2 class="text-base font-semibold text-main">Product attributes</h2>
                        <p class="text-sm text-slate-500">Choose the attribute values to generate variant combinations.</p>
                    </div>
                    <button type="button" id="generate-variants-btn" class="btn btn-secondary">Generate combinations</button>
                </div>

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
                                            <input type="checkbox" data-attribute-name="{{ $attributeName }}" data-attribute-value-id="{{ $value->id }}" data-attribute-value-label="{{ $value->value }}"
                                                class="attribute-value-checkbox h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" />
                                            <span>{{ $value->value }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="rounded-xl border border-dashed border-slate-300 bg-white p-8 text-center text-slate-500">
                        No attribute values assigned for this product. You can add variants manually below.
                    </div>
                @endif
            </div>
        @endif

        <div class="rounded-xl border border-slate-200 bg-white p-4">
            <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-base font-semibold text-main">Variant rows</h2>
                    <p class="text-sm text-slate-500">Add, preview and remove variant rows before saving.</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <button type="button" id="add-row-btn" class="btn btn-secondary">Add blank row</button>
                </div>
            </div>

            <div id="variant-rows" class="space-y-4"></div>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn btn-primary">Save Variants</button>
            <a href="{{ route('admin.product.variant') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>

<script>
    const variantRowsContainer = document.getElementById('variant-rows');
    const generateButton = document.getElementById('generate-variants-btn');
    const addRowButton = document.getElementById('add-row-btn');
    const productIdField = document.getElementById('product_id');
    let variantIndex = 0;

    const oldRows = @json(old('variants', []));

    function createVariantRow(data = {}) {
        const index = variantIndex++;
        const values = data.attribute_values || [];
        const defaultChecked = data.is_default ? 'checked' : '';
        const statusChecked = data.status ? 'checked' : '';
        const variantLabel = data.variant_name || data.variant_name === '' ? data.variant_name : values.join(' / ');

        const row = document.createElement('div');
        row.className = 'rounded-2xl border border-slate-200 bg-slate-50 p-4';
        row.dataset.rowIndex = index;
        row.innerHTML = `
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <div class="flex items-center gap-2 text-sm font-semibold text-slate-900">Variant ${index + 1}</div>
                    <div class="mt-2 text-xs text-slate-500">${values.length ? values.map(v => `<span class='rounded-full bg-white px-2 py-1 text-xs text-slate-700 shadow-sm'>${v}</span>`).join(' ') : 'Manual variant'}</div>
                </div>
                <button type="button" class="btn btn-ghost btn-sm" onclick="removeVariantRow(${index})">Remove</button>
            </div>
            <div class="grid gap-4 lg:grid-cols-3 mt-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Variant name</label>
                    <input type="text" name="variants[${index}][variant_name]" value="${variantLabel}" class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">SKU</label>
                    <input type="text" name="variants[${index}][sku]" value="${data.sku ?? ''}" class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Price</label>
                    <input type="number" step="0.01" min="0" name="variants[${index}][price]" value="${data.price ?? ''}" required class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm" />
                </div>
            </div>
            <div class="grid gap-4 lg:grid-cols-3 mt-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Discount price</label>
                    <input type="number" step="0.01" min="0" name="variants[${index}][discount_price]" value="${data.discount_price ?? ''}" class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Stock quantity</label>
                    <input type="number" min="0" name="variants[${index}][stock_quantity]" value="${data.stock_quantity ?? 0}" required class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Variant image</label>
                    <input type="file" accept="image/*" name="variants[${index}][image]" class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm" onchange="previewVariantImage(event, ${index})" />
                    <div id="preview-${index}" class="mt-3"></div>
                </div>
            </div>
            <div class="grid gap-4 lg:grid-cols-3 mt-4 items-end">
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="variants[${index}][status]" value="1" ${statusChecked} class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" />
                    <span class="text-sm text-slate-700">Active</span>
                </div>
                <div class="flex items-center gap-3">
                    <input type="radio" name="default_variant" value="${index}" ${defaultChecked} onclick="selectDefaultVariant(${index})" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500" />
                    <span class="text-sm text-slate-700">Default variant</span>
                </div>
                <input type="hidden" name="variants[${index}][is_default]" value="${data.is_default ? 1 : 0}" id="default-field-${index}" />
            </div>
            <div class="mt-4" id="attribute-values-${index}"></div>
        `;

        if (values.length) {
            const hiddenInputs = values.map(valueId => `<input type="hidden" name="variants[${index}][attribute_values][]" value="${valueId}" />`).join('');
            row.querySelector('#attribute-values-' + index).innerHTML = hiddenInputs;
        }

        variantRowsContainer.appendChild(row);
    }

    function removeVariantRow(index) {
        const row = document.querySelector(`[data-row-index="${index}"]`);
        if (row) {
            row.remove();
        }
    }

    function previewVariantImage(event, index) {
        const previewContainer = document.getElementById(`preview-${index}`);
        previewContainer.innerHTML = '';
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = () => {
            previewContainer.innerHTML = `<img src="${reader.result}" alt="Preview" class="h-24 w-full rounded-xl object-cover" />`;
        };
        reader.readAsDataURL(file);
    }

    function selectDefaultVariant(index) {
        document.querySelectorAll('[id^="default-field-"]').forEach(element => {
            element.value = '0';
        });
        const target = document.getElementById(`default-field-${index}`);
        if (target) {
            target.value = '1';
        }
    }

    function collectAttributeSelections() {
        const selections = {};
        document.querySelectorAll('.attribute-value-checkbox:checked').forEach(checkbox => {
            const group = checkbox.dataset.attributeName;
            const valueId = checkbox.dataset.attributeValueId;
            const valueLabel = checkbox.dataset.attributeValueLabel;
            if (! selections[group]) {
                selections[group] = [];
            }
            selections[group].push({ id: valueId, label: valueLabel });
        });
        return selections;
    }

    function generateCombinations(groups) {
        const entries = Object.values(groups);
        if (!entries.length) {
            return [];
        }
        return entries.reduce((acc, group) => {
            if (!acc.length) {
                return group.map(item => [item]);
            }
            return acc.flatMap(combo => group.map(item => [...combo, item]));
        }, []);
    }

    function buildRowFromCombination(combination) {
        return {
            attribute_values: combination.map(item => item.id),
            variant_name: combination.map(item => item.label).join(' / '),
            sku: '',
            price: '',
            discount_price: '',
            stock_quantity: 0,
            status: true,
            is_default: false,
        };
    }

    addRowButton.addEventListener('click', () => createVariantRow({ status: true }));

    if (generateButton) {
        generateButton.addEventListener('click', () => {
            const selections = collectAttributeSelections();
            const combos = generateCombinations(selections);
            if (!combos.length) {
                showToast('Please select at least one value per attribute group.', 'error');
                return;
            }
            combos.forEach(combo => createVariantRow(buildRowFromCombination(combo)));
        });
    }

    if (oldRows.length) {
        oldRows.forEach(row => {
            createVariantRow({
                variant_name: row.variant_name,
                sku: row.sku,
                price: row.price,
                discount_price: row.discount_price,
                stock_quantity: row.stock_quantity,
                status: row.status,
                is_default: row.is_default,
                attribute_values: row.attribute_values || [],
            });
        });
    } else {
        createVariantRow({ status: true });
    }
</script>
@endsection
