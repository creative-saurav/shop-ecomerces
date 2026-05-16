<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('product')?->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:products,slug,' . $productId],
            'sku' => ['nullable', 'string', 'max:100', 'unique:products,sku,' . $productId],
            'category_id' => ['required', 'exists:categories,id'],
            'brand_id' => ['nullable', 'exists:brands,id'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'long_description' => ['nullable', 'string', 'max:5000'],
            'price' => ['required', 'numeric', 'min:0'],
            'discount_price' => ['nullable', 'numeric', 'min:0', 'lte:price'],
            'cost_price' => ['nullable', 'numeric', 'min:0'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'stock_adjustment' => ['nullable', 'integer'],
            'weight' => ['nullable', 'numeric', 'min:0'],
            'status' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
            'is_digital' => ['nullable', 'boolean'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'meta_keywords' => ['nullable', 'string', 'max:1000'],
            'meta_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'attribute_values' => ['nullable', 'array'],
            'attribute_values.*' => ['exists:attribute_values,id'],
            'primary_image_id' => ['nullable', 'integer', 'exists:product_images,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'A product name is required.',
            'slug.unique' => 'This product URL slug is already in use.',
            'sku.unique' => 'This SKU is already taken. Please use a different code.',
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category is invalid.',
            'brand_id.exists' => 'The selected brand is invalid.',
            'short_description.max' => 'The short description may not exceed 500 characters.',
            'long_description.max' => 'The long description may not exceed 5000 characters.',
            'price.required' => 'Please set a price for the product.',
            'price.numeric' => 'The price must be a valid number.',
            'discount_price.lte' => 'The discount price must be less than or equal to the regular price.',
            'stock_quantity.required' => 'Please enter the current stock quantity.',
            'stock_quantity.integer' => 'The stock quantity must be a whole number.',
            'stock_quantity.min' => 'The stock quantity must be 0 or greater.',
            'weight.numeric' => 'The weight must be a valid decimal value.',
            'images.array' => 'The image upload must be an array of files.',
            'images.*.image' => 'Each uploaded file must be an image.',
            'meta_image.image' => 'The SEO image must be a valid image file.',
            'meta_image.mimes' => 'The SEO image must be a JPG, JPEG, PNG or WEBP file.',
            'meta_image.max' => 'The SEO image must be smaller than 4MB.',
            'images.*.mimes' => 'Images must be JPG, JPEG, PNG or WEBP files.',
            'images.*.max' => 'Each image must be smaller than 4MB.',
            'attribute_values.*.exists' => 'One of the selected attribute values is invalid.',
        ];
    }
}
