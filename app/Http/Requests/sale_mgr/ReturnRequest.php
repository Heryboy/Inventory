<?php

  namespace App\Http\Requests\sale_mgr;
  use App\Http\Requests\Request;
  //class PermissionRequest extends Request
  class ReturnRequest extends Request
  {

    public function authorize()
    {
      return true;
    }

    public function rules()
    {
      return [
        'return_no'=> 'required',
        'bill_no'=> 'required',      
        'return_date'=> 'required',
      ];
    }

    public function messages()
    {
      return [
        'return_no.required'=> 'Provide Return Date !',
        'bill_no.required'=> 'Provide Bill No !',
        'return_date.required'=> 'Provide Return Date !',
      ];
    }

  }