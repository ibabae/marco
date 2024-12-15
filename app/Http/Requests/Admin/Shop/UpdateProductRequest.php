<?php

namespace App\Http\Requests\Admin\Shop;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'nullable|string|exists:categories,id',
            'media' => 'nullable|array',
            'media.*' => 'file|mimes:jpeg,png,jpg,gif,svg,mp4,webm|max:10240',
            'main_image' => 'nullable|integer|exists:media,id',
            'sku' => 'nullable|string|max:50|unique:products,sku',
            'status' => 'required|in:active,inactive',
            'attributes' => 'nullable|array',
            'attributes.*.name' => 'required_with:attributes|string|max:100',
            'attributes.*.value' => 'required_with:attributes|string|max:100',
            'min_order_quantity' => 'nullable|integer|min:1',
            'max_order_quantity' => 'nullable|integer|min:1|gte:min_order_quantity',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
            'discount_start_date' => 'nullable|date|before:discount_end_date',
            'discount_end_date' => 'nullable|date|after:discount_start_date',
            'seo_title' => 'nullable|string|max:70',
            'seo_description' => 'nullable|string|max:160',
        ];
    }
}
