<?php

namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

//class PermissionRequest extends Request
class POSTableRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'name' => 'required',
          'pos_outlets_id' => 'required',
          'pax' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'pos_outlets_id.required' => 'Choose Outlet!',
          'name.required' => 'Provide Table Name!',
          'pax.required' => 'Provide Pax!',
        ];
    }
}
