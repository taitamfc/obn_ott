<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
class StoreUserBankRequest extends FormRequest
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
            'bank_number' => 'required',
            'bank_owner' => 'required',
            'bank_name' => 'required',
            'address' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'bank_number.required' => 'The bank number field is required',
            'bank_owner.required' => 'The bank owner field is required',
            'bank_name.required' => 'The bank name field is required',
            'address.required' => 'The address field is required',
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'success' => false,
            'has_errors' => true,
        ], 200));
    }
}