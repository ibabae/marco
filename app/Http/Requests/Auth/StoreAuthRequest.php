<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreAuthRequest extends FormRequest
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
            'phone' => 'required|digits:10',
        ];
    }

    public function messages(){
        return [
            'phone.required' => 'شماره موبایل ضروری است',
            'phone.digits' => 'شماره همراه اشتباه است',
            'captcha.required' => 'کد کپچا ضروری است',
            'captcha.captcha' => 'کد کپچا صحیح نیست',
        ];
    }

    public function prepareForValidation(){
        $this->merge([
            'phone' => convertNumber($this->phone),
            'code' => $this->code ? convertNumber($this->code) : false,
            'password' => $this->phone.'1234'
        ]);
        if (substr($this->phone, 0, 1) == '0') {
            $this->merge([
                'phone' => substr($this->phone, 1, 11)
            ]);
        }

    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => $validator->errors(),
        ], 422));
    }

}
