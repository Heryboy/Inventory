<?php

namespace App\Http\Requests\Setup;
use App\Http\Requests\Request;

//class PermissionRequest extends Request
class ItemCateogryRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          
          'name'   => 'required',
         
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Provide Name !',

        ];
    }
}
