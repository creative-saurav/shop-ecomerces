<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductVariantUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $variantId = $this->route('variant')?->id;

        return [
            'product_id' => ['required', 'exists:products,id'],
            'variant_name' => ['nullable', 'string', 'max:255'],
            'sku' => ['nullable', 'string', 'max:100', Rule::unique('product_variants', 'sku')->ignore($variantId)],
            'price' => ['required', 'numeric', 'min:0'],
            'discount_price' => ['nullable', 'numeric', 'min:0'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'status' => ['nullable', 'boolean'],
            'is_default' => ['nullable', 'boolean'],
            'attribute_values' => ['nullable', 'array'],
            'attribute_values.*' => ['exists:attribute_values,id'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $discount = $this->input('discount_price');
            $price = $this->input('price');

            if ($discount !== null && $discount !== '' && $price !== null && $discount > $price) {
                $validator->errors()->add('discount_price', 'The discount price must be less than or equal to the price.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Please select the product for this variant.',
            'product_id.exists' => 'The selected product is invalid.',
            'price.required' => 'Please enter a price for the variant.',
            'price.numeric' => 'The price must be a valid number.',
            'stock_quantity.required' => 'Please enter the stock quantity.',
            'stock_quantity.integer' => 'The stock quantity must be an integer.',
            'sku.unique' => 'The SKU is already taken for another variant.',
            'image.image' => 'The variant image must be a valid image file.',
        ];
    }
}
