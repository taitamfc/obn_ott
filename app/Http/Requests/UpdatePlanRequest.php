<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePlanRequest extends FormRequest
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
            'number_course' => 'required|numeric',
            'number_admin' => 'required|numeric',
            'description' => 'required',
            // 'is_contact' => 'required',
            // 'duration' => 'required',
            // 'number_days' => 'required|numeric',
            // 'number_grade' => 'required|numeric',
            // 'number_subject' => 'required|numeric',
            // 'number_lesson' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return  [
                'name.required' => 'The name field is required',
                'price.required' => 'The price field is required',
                'duration.required' => 'The duration field is required',
                'number_days.required' => 'The number days field is required',
                'number_course.required' => 'The number course field is required',
                'number_student.required' => 'The number student field is required',
                'number_grade.required' => 'The number grade field is required',
                'number_subject.required' => 'The number subject field is required',
                'number_lesson.required' => 'The number lesson field is required'
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
