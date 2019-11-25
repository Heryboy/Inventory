<?php

  namespace App\Http\Requests\discount;
  use App\Http\Requests\Request;
  //class PermissionRequest extends Request
  class DiscountMethodsRequest extends Request
  {

    public function authorize()
    {
      return true;
    }

    public function rules()
    {
      return [
        'abbr'=> 'required',
        'name'=> 'required'
      ];
    }

    public function messages()
    {
      return [
        'abbr.required'=> 'Abbr is required !',
        'name.required'=> 'Name is required !'
      ];
    }

  }