<?php

namespace App\Http\Requests\Setup;
use App\Http\Requests\Request;

//class PermissionRequest extends Request
class GIDRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'name' => 'required',
          'alias' => 'required',
          'value' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Provide Currency Name!',
          'alias.required' => 'Provide alias !',
          'value.required' => 'Provide Value!',
        ];
    }
}
