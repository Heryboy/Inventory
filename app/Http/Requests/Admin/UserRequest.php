<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class UserRequest extends Request
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
    
            'username' => 'required|unique:user',
            'password' => 'required|confirmed',
            // 'email' => 'email|max:255|unique:user',
            'group_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
    
            'username.required' => 'Provide username!',
            // 'email.email' => 'Email is invalid!',
            'password.required' => 'Provide password!',
            // 'email.required' => 'Provide email!',
            'group_id.required' => 'Choose group role!',
        ];
    }
}
