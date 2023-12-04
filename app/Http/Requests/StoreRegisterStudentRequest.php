<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterStudentRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:students|email',
            'password' => 'required',
            'repeatpassword' => 'required|same:password',
        ];
    }
    public function messages()
    {
        return  [
                'name.required' => 'The name field is required',
                'email.required' => 'The email field is required',
                'password.required' => 'The password field is required',
                'repeatpassword.required' => 'The Confirm Password field is required',
                         
            ];
    }
}
