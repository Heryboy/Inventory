<?php

namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

//class PermissionRequest extends Request
class POSKitchenRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'name' => 'required',
          'printer_name' => 'required',
          'ip_address' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Provide Name!',
          'printer_name.required' => 'Provide Printer Name !',
          'ip_address.required' => 'Provide IP Address!'
        ];
    }
}
