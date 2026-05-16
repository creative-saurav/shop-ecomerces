@extends('admin.layouts.app')
@section('title', 'Product Details')
@section('content')
<div class="page-title px-6 py-6 border-b border-slate-200/80">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-main">{{ $product->name }}</h1>
            <p class="text-sm text-slate-500">Review full product details and related attributes.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Back to Products</a>
            <a href="{{ route('admin.product.edit', $product) }}" class="btn btn-primary">Edit Product</a>
        </div>
    </div>
</div>

<div class="p-6 space-y-6">
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="grid gap-6 lg:grid-cols-[320px_minmax(1fr,_1fr)]">
            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                <div class="mb-4 text-sm font-semibold text-slate-900">Product images</div>
                <div class="grid gap-3">
                    @foreach($product->images as $image)
                        <div class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white">
                            <img src="{{ asset($image->image_path) }}" alt="{{ $product->name }}" class="h-48 w-full object-cover" />
                            <div class="absolute bottom-3 left-3 rounded-full px-3 py-1 text-xs font-semibold text-white {{ $image->is_primary ? 'bg-emerald-600' : 'bg-slate-500' }}">
                                {{ $image->is_primary ? 'Primary' : 'Image' }}
                            </div>
                        </div>
                    @endforeach
                    @if($product->images->isEmpty())
                        <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-8 text-center text-slate-500">No uploaded images yet.</div>
                    @endif
                </div>
            </div>

            <div class="space-y-6">
                <div class="grid gap-3 sm:grid-cols-2">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <div class="text-xs text-slate-500">SKU</div>
                        <div class="mt-2 font-semibold text-slate-900">{{ $product->sku }}</div>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <div class="text-xs text-slate-500">Status</div>
                        <div class="mt-2 font-semibold text-slate-900">{{ $product->status ? 'Active' : 'Inactive' }}</div>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <div class="text-xs text-slate-500">Featured</div>
                        <div class="mt-2 font-semibold text-slate-900">{{ $product->is_featured ? 'Yes' : 'No' }}</div>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <div class="text-xs text-slate-500">Digital</div>
                        <div class="mt-2 font-semibold text-slate-900">{{ $product->is_digital ? 'Yes' : 'No' }}</div>
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-5">
                    <div class="mb-3 text-sm font-semibold text-slate-900">Pricing & stock</div>
                    <div class="grid gap-3 sm:grid-cols-2">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <div class="text-xs text-slate-500">Price</div>
                            <div class="mt-2 text-lg font-semibold text-main">${{ number_format($product->price, 2) }}</div>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <div class="text-xs text-slate-500">Discount price</div>
                            <div class="mt-2 text-lg font-semibold text-slate-900">{{ $product->discount_price ? '$' . number_format($product->discount_price, 2) : '—' }}</div>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <div class="text-xs text-slate-500">Stock quantity</div>
                            <div class="mt-2 text-lg font-semibold text-main">{{ $product->stock_quantity }}</div>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <div class="text-xs text-slate-500">Weight</div>
                            <div class="mt-2 text-lg font-semibold text-slate-900">{{ $product->weight ?? '—' }} kg</div>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-5">
                    <div class="mb-3 text-sm font-semibold text-slate-900">Category & Brand</div>
                    <div class="grid gap-3 sm:grid-cols-2">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <div class="text-xs text-slate-500">Category</div>
                            <div class="mt-2 font-semibold text-slate-900">{{ $product->category?->name ?? '—' }}</div>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <div class="text-xs text-slate-500">Brand</div>
                            <div class="mt-2 font-semibold text-slate-900">{{ $product->brand?->name ?? '—' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-2">
            <div class="mb-4 text-base font-semibold text-slate-900">Product description</div>
            <div class="prose prose-slate max-w-none">
                {!! nl2br(e($product->long_description ?? $product->short_description ?? 'No description available.')) !!}
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mb-4 text-base font-semibold text-slate-900">SEO metadata</div>
            <dl class="space-y-4 text-sm text-slate-700">
                <div>
                    <dt class="font-medium text-slate-900">Meta title</dt>
                    <dd class="mt-1">{{ $product->meta_title ?? '—' }}</dd>
                </div>
                <div>
                    <dt class="font-medium text-slate-900">Meta description</dt>
                    <dd class="mt-1">{{ $product->meta_description ?? '—' }}</dd>
                </div>
                <div>
                    <dt class="font-medium text-slate-900">Meta keywords</dt>
                    <dd class="mt-1">{{ $product->meta_keywords ?? '—' }}</dd>
                </div>
                <div>
                    <dt class="font-medium text-slate-900">Meta image</dt>
                    <dd class="mt-2">
                        @if($product->meta_image)
                            <img src="{{ asset($product->meta_image) }}" alt="Meta image" class="h-28 w-full rounded-xl object-cover" />
                        @else
                            <span class="text-slate-500">No meta image set.</span>
                        @endif
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-4 flex items-center justify-between">
            <div>
                <h2 class="text-base font-semibold text-main">Assigned attributes</h2>
                <p class="text-sm text-slate-500">Attributes and values linked to this product.</p>
            </div>
            <span class="text-xs uppercase tracking-[0.2em] text-slate-400">{{ $product->attributeValues->count() }} values</span>
        </div>
        @if($product->attributeValues->isNotEmpty())
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($product->attributeValues->groupBy(fn($value) => $value->attribute->name ?? 'Other') as $attributeName => $values)
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <div class="mb-2 text-sm font-semibold text-slate-900">{{ $attributeName }}</div>
                        <div class="flex flex-wrap gap-2">
                            @foreach($values as $value)
                                <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-slate-700 shadow-sm">{{ $value->value }}</span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-8 text-center text-slate-500">No attributes assigned yet.</div>
        @endif
    </div>
</div>
@endsection
