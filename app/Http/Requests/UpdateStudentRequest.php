<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class UpdateStudentRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'code' => 'required',
            'email' => 'required|email|unique:students,email,'.Auth::guard('students')->id(),
            'phone' => 'required',
            'status' => 'required',
            // 'password' => 'required',
            // 'repeatpassword' => 'required|same:password',
            'address' => 'required',
            'city' => 'required',
        ];
        if(request()->password){
            $rules['repeatpassword'] = 'required|same:password';
        }
        return $rules;


    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required',
            'code.required' => 'The code field is required',
            'email.required' => 'The email field is required',
            // 'email.email' => 'The email must be a valid email address',
            'email.unique' => 'The email has already been taken',
            'phone.required' => 'The phone field is required',
            'status.required' => 'The status field is required',
            'password.required' => 'The password field is required',
            'repeatpassword.required' => 'The Confirm Password field is required',
            'repeatpassword.same' => 'The Confirm Password and password must match',
            'address.required' => 'The address field is required',
            'city.required' => 'The city field is required',
        ];
    }
}
