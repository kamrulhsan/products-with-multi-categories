<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'                 => 'required',
            'slug' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                'unique:products,slug',
            ],
            'thumbnail'             => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_categories'    => 'required|array|min:1',
            'product_categories.*'  => 'integer|exists:categories,id',
            'images'                => 'required|array|min:1',
            'images.*'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock_qty'             => 'required|integer',
            'sku'                   => 'required|integer|unique:products,sku',
            'short_description'     => 'required',
            'is_active'             => 'required',
            'long_description'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'                => 'Product Title is required.',
            'is_active.required'            => 'Product Status is required.',
            'slug.required'                 => 'Product Slug is required.',
            'thumbnail.required'            => 'Product Thumbnail is required.',
            'product_categories.required'   => 'Product Category is required.',
            'images.required'               => 'Product Image is required.',
            'stock_qty.required'            => 'Product Stock Quantity is required.',
            'sku.required'                  => 'Product SKU is required.',
            'short_description.required'    => 'Product Short Description is required.',
            'long_description.required'     => 'Product Long Discription is required.',
        ];
    }
}
