<?php

namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

//class PermissionRequest extends Request
class POSOutletRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Provide Name!'
        ];
    }
}
