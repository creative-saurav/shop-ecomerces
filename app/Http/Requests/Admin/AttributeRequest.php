<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $attributeId = $this->route('attribute')?->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:attributes,slug,' . $attributeId],
            'type' => ['required', 'in:text,color,button,dropdown'],
            'status' => ['nullable', 'boolean'],
            'is_required' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'values' => ['required', 'array', 'min:1'],
            'values.*.value' => ['required', 'string', 'max:255'],
            'values.*.color_code' => ['nullable', 'string', 'regex:/^#[0-9a-fA-F]{6}$/'],
            'values.*.price_adjustment' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The attribute name is required.',
            'type.required' => 'The attribute type is required.',
            'values.required' => 'At least one attribute value is required.',
            'values.min' => 'At least one attribute value is required.',
            'values.*.value.required' => 'All attribute values must have a name.',
            'values.*.color_code.regex' => 'Invalid color code format. Use #XXXXXX format.',
        ];
    }
}
