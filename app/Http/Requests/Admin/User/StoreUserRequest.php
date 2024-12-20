<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreUserRequest extends FormRequest
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
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
            'first_name' => 'string|nullable',
            'last_name' => 'string|nullable',
        ];
    }

    public function prepareForValidation(){
        $this->merge([
            'phone' => convertNumber($this->phone),
            'password' => Hash::make($this->password ?? $this->phone.'1234')
        ]);
        if (substr($this->phone, 0, 1) == '0') {
            $this->merge([
                'phone' => substr($this->phone, 1, 11)
            ]);
        }
    }

}
