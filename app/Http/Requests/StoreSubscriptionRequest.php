<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class StoreSubscriptionRequest extends FormRequest
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
            'price' => 'required|numeric',
            'duration' => 'required',
            'course' => 'required|array',
            'course.*' => 'numeric',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required',
            'price.numeric' => 'The price field must contain numeric values',
            'price.required' => 'The price field is required',
            'duration.required' => 'The duration field is required',
            'course.required' => 'The course field is required',
            'course.*.numeric' => 'The course field must contain numeric values',
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