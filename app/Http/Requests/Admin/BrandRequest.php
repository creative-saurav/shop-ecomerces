<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $brandId = $this->route('brand')?->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:brands,slug,' . $brandId],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'dimensions:min_width=100,min_height=100', 'max:2048'],
            'description' => ['nullable', 'string', 'max:1000'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'status' => ['nullable', 'boolean'],
            'featured' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The brand name is required.',
            'slug.unique' => 'This slug is already taken. Please choose another one.',
            'logo.image' => 'The logo must be a valid image file.',
            'logo.mimes' => 'The logo must be a JPG, JPEG, PNG, or WEBP file.',
            'logo.dimensions' => 'The logo must be at least 100x100 pixels.',
            'description.max' => 'The description may not be greater than 1000 characters.',
            'meta_title.max' => 'The meta title may not be greater than 255 characters.',
            'meta_description.max' => 'The meta description may not be greater than 1000 characters.',
        ];
    }
}
