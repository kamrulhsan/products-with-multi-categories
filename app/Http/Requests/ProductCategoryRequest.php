<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
            'category_name' => 'required|min:3|max:100'
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Product Category is required.',
            'category_name.min' => 'Category Name must be at least 3 Character.',
            'category_name.max' => 'Category Name must be less than 100 Character.',
        ];
    }
}
