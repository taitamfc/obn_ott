<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateLessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'grade_id' => 'required|numeric',
            'subject_id' => 'required|numeric',
            'course_id' => 'required|numeric',
            'status' => 'required|numeric',
        ];
    }
    function messages(): array
    {
        return [
            'name.required' => "Name on lesson setting isn't required",
            'grade_id.required' => 'Grade on lesson setting is required',
            'grade_id.numeric' => 'Grade on lesson setting is required',
            'subject_id.required' => 'Subject on lesson setting is required',
            'subject_id.numeric' => 'Subject on lesson setting is required',
            'course_id.required' => 'Course on lesson setting is required',
            'course_id.numeric' => 'Course on lesson setting is required',
            'status.required' => 'Status on lesson setting is required',
            'status.numeric' => 'Status on lesson setting is required',
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