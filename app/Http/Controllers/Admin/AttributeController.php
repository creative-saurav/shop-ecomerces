<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AttributeRequest;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::when(request('search'), fn ($query, $search) => $query->where('name', 'like', "%{$search}%")
            ->orWhere('slug', 'like', "%{$search}%"))
            ->withCount('values')
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.attribute.index', compact('attributes'));
    }

    public function create()
    {
        $types = ['text' => 'Text', 'color' => 'Color', 'button' => 'Button', 'dropdown' => 'Dropdown'];

        return view('admin.attribute.create', compact('types'));
    }

    public function store(AttributeRequest $request)
    {
        $data = $request->validated();
        $values = $data['values'];
        unset($data['values']);

        $data['slug'] = $this->normalizeSlug($data['slug'] ?? $data['name']);
        $data['status'] = $request->has('status');
        $data['is_required'] = $request->has('is_required');

        DB::transaction(function () use ($data, $values) {
            $attribute = Attribute::create($data);

            foreach ($values as $index => $value) {
                if (! empty($value['value'])) {
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'value' => $value['value'],
                        'color_code' => $value['color_code'] ?? null,
                        'price_adjustment' => $value['price_adjustment'] ?? null,
                        'sort_order' => $index,
                    ]);
                }
            }
        });

        return Redirect::route('admin.attribute')->with('success', 'Attribute created successfully.');
    }

    public function edit(Attribute $attribute)
    {
        $types = ['text' => 'Text', 'color' => 'Color', 'button' => 'Button', 'dropdown' => 'Dropdown'];
        $attribute->load('values');

        return view('admin.attribute.edit', compact('attribute', 'types'));
    }

    public function update(AttributeRequest $request, Attribute $attribute)
    {
        $data = $request->validated();
        $values = $data['values'];
        unset($data['values']);

        $data['slug'] = $this->normalizeSlug($data['slug'] ?? $data['name'], $attribute->id);
        $data['status'] = $request->has('status');
        $data['is_required'] = $request->has('is_required');

        DB::transaction(function () use ($data, $values, $attribute) {
            $attribute->update($data);
            $attribute->values()->delete();

            foreach ($values as $index => $value) {
                if (! empty($value['value'])) {
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'value' => $value['value'],
                        'color_code' => $value['color_code'] ?? null,
                        'price_adjustment' => $value['price_adjustment'] ?? null,
                        'sort_order' => $index,
                    ]);
                }
            }
        });

        return Redirect::route('admin.attribute')->with('success', 'Attribute updated successfully.');
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return Redirect::route('admin.attribute')->with('success', 'Attribute deleted successfully.');
    }

    protected function normalizeSlug(string $value, int $ignoreId = null): string
    {
        $slug = Str::slug($value);
        $original = $slug;
        $count = 1;

        while (Attribute::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }
}
