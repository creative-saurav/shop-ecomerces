<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductVariantStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products,id'],
            'variants' => ['required', 'array', 'min:1'],
            'variants.*.variant_name' => ['nullable', 'string', 'max:255'],
            'variants.*.sku' => ['nullable', 'string', 'max:100', 'unique:product_variants,sku'],
            'variants.*.price' => ['required', 'numeric', 'min:0'],
            'variants.*.discount_price' => ['nullable', 'numeric', 'min:0'],
            'variants.*.stock_quantity' => ['required', 'integer', 'min:0'],
            'variants.*.image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'variants.*.status' => ['nullable', 'boolean'],
            'variants.*.is_default' => ['nullable', 'boolean'],
            'variants.*.attribute_values' => ['nullable', 'array'],
            'variants.*.attribute_values.*' => ['exists:attribute_values,id'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            foreach ($this->input('variants', []) as $index => $variant) {
                if (isset($variant['discount_price'], $variant['price']) && $variant['discount_price'] !== '' && $variant['discount_price'] > $variant['price']) {
                    $validator->errors()->add("variants.$index.discount_price", 'The discount price must be less than or equal to the price.');
                }
            }
        });
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Please select the product for this variant.',
            'product_id.exists' => 'The selected product is invalid.',
            'variants.required' => 'At least one variant row is required.',
            'variants.*.price.required' => 'Please enter a price for each variant.',
            'variants.*.price.numeric' => 'Each variant price must be a valid number.',
            'variants.*.stock_quantity.required' => 'Please enter stock quantity for each variant.',
            'variants.*.stock_quantity.integer' => 'Stock quantity must be a whole number.',
            'variants.*.sku.unique' => 'Each variant SKU must be unique.',
            'variants.*.image.image' => 'Each variant image must be a valid image file.',
        ];
    }
}
