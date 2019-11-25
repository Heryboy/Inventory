<?php

namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

//class PermissionRequest extends Request
class POSDrawerRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'user_id' => 'required',
          'cash_drawer_group_id' => 'required',
          'workshift_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'user_id.required' => 'Select User!',
          'cash_drawer_group_id.required' => 'Select cash drawer!',
          'workshift_id.required' => 'Select Work Shift!'
        ];
    }
}
