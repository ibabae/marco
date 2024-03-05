<?php

namespace App\Http\Requests;

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
            'title' => 'required|string', // Adjust max file size as needed
            'material' => 'required|string', // Adjust max file size as needed
            'category' => 'required|array', // Adjust max file size as needed
            'stock' => 'required|array', // Adjust max file size as needed
            'images' => 'required|array', // Adjust max file size as needed
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Adjust max file size as needed
        ];
    }
}
