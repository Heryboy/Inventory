<?php

  namespace App\Http\Requests\discount;
  use App\Http\Requests\Request;
  //class PermissionRequest extends Request
  class DiscountPermissionRequest extends Request
  {

    public function authorize()
    {
      return true;
    }

    public function rules()
    {
      return [
        'user_id'=> 'required',
        'max_discount'=> 'required',
        'discount_method_id'=> 'required'
      ];
    }

    public function messages()
    {
      return [
        'user_id.required'=> 'User is required !',
        'max_discount.required'=> 'Maximum discount is required !',
        'discount_method_id.required'=> 'Discount method is required !'
      ];
    }

  }