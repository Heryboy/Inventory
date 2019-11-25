<?php 
namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

class ItemStatusRequest extends Request
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
        'name.required' => 'Provide Item Status Name!',
      ];
  }
}
