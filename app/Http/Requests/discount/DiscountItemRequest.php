<?php

  namespace App\Http\Requests\discount;
  use App\Http\Requests\Request;
  //class PermissionRequest extends Request
  class DiscountItemRequest extends Request
  {

    public function authorize()
    {
      return true;
    }

    public function rules()
    {
      return [
        'name'=> 'required',
        'start_date'=> 'required',
        'end_date'=> 'required',
        // 'start_time'=> 'required',
        // 'end_time'=> 'required'
      ];
    }

    public function messages()
    {
      return [
        'name.required'=> 'Name is required !',
        'start_date.required'=> 'Start Date is required !',
        'end_date.required'=> 'End Date is required !',
        // 'start_time.required'=> 'Start Time is required !',
        // 'end_time.required'=> 'End Time is required !',
      ];
    }

  }