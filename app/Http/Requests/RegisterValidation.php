<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|unique:users,email',
            'login' => 'required|unique:users',
            'address' => 'required',
            'role' => 'required|in:user,admin' 
        ];
    }
    
}
