<?php

  namespace App\Http\Requests\transfer;
  use App\Http\Requests\Request;
  //class PermissionRequest extends Request
  class TransferRequest extends Request
  {

    public function authorize()
    {
      return true;
    }

    public function rules()
    {
      return [
        'transfer_date'=> 'required',
        'from_branch_id'=> 'required',
        'to_branch_id'=> 'required',
      ];
    }

    public function messages()
    {
      return [
        'transfer_date.required'=> 'Provide Transfer Date !',
        'from_branch_id.required'=> 'Provide Transfer From!',
        'to_branch_id.required'=> 'Provide Transfer To !',
      ];
    }

  }