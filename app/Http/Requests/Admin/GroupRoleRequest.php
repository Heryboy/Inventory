<?php

namespace App\Http\Requests\Admin;
use App\Http\Requests\Request;

//class PermissionRequest extends Request
class GroupRoleRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'name' => 'required',
          'group_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Provide Group Name!',
          'group_id.required' => 'Choose Group Role!',
        ];
    }
}
