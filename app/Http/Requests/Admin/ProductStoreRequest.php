<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'title' => 'required|string',
            'primaryImage' => 'required|image|mimes:jpeg,png,jpg,gif',
            'secondaryImage' => 'required|image|mimes:jpeg,png,jpg,gif',
            'material' => 'required|string',
            'excerpt' => 'required|string',
            'stock' => 'required|array',
            'price' => 'required|integer',
            // 'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'categoryId' => 'required|exists:categories,id|integer'
        ];
    }
}
