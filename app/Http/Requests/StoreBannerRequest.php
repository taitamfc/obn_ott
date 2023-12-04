<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class StoreBannerRequest extends FormRequest
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
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,svg',
            'video' => 'required|mimes:mp4,avi,mov,flv',
            'status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required',
            'description.required' => 'The description field is required',
            'image.required' => 'The image field is required',
            'image.mimes' => 'Invalid video format. Allowed formats: jpg, jpeg, png, svg',
            'video.required' => 'The video field is required',
            'video.mimes' => 'Invalid image format. Allowed formats: mp4, avi, mov, flv',
            'status.required' => 'The link field is required',
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