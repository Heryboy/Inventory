<?php

namespace App\Http\Requests\Setup;
use App\Http\Requests\Request;

//class PermissionRequest extends Request
class BankAccountRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          
          'name'   => 'required',
          'amount' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Provide Name !',
          'amount.required' => 'Provide Amount!',
        ];
    }
}
