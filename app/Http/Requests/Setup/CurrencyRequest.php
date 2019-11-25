<?php

namespace App\Http\Requests\Setup;
use App\Http\Requests\Request;

//class PermissionRequest extends Request
class CurrencyRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'name' => 'required',
          'value' => 'required',
          'currency_signe' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Provide Currency Name!',
          'value.required' => 'Provide Value !',
          'currency_signe.required' => 'Provide Currency Signe!',
        ];
    }
}
