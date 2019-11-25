<?php

namespace App\Http\Requests\Setup;
use App\Http\Requests\Request;

//class PermissionRequest extends Request
class CustomerRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          
          'group_invoice_due_id'  => 'required',
          'name'   => 'required',
          'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'group_invoice_due_id.required' => 'Provide Group Invoice Due!',
          'name.required' => 'Provide Name !',
          'phone.required' => 'Provide Phone!',
        ];
    }
}
