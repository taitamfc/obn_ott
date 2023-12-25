<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class StorePlanBuyRequest extends FormRequest
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
        // dd($this);
        $roles = [
            'nameuser' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ];
        $checkExist = User::where('email',$this->email)->where('role','site_owner')->first();
        if($checkExist){
            $roles['email'] = 'required|email|unique:users';
        }
        return $roles; 

    }

    public function messages()
    {
        return  [
                'nameuser.required' => 'The name field is empty!',
                'email.required' => 'The email field is empty!',
                'email.required' => 'The email field is empty!',
                'phone.required' => 'The phone field is empty!'
            ];
    }
}
