<?php

namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

//class PermissionRequest extends Request
class POSWorkShiftRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'workshift_name' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'workshift_name.required' => 'Provide Work Shift Name!'
        ];
    }
}
