<?php 
namespace App\Http\Requests\customer_mgr\customer_field;
use App\Http\Requests\Request;

class CustomerFieldRequest extends Request
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
      return [
        'name' => 'required',
      ];
  }

  public function messages()
  {
      return [
        'name.required' => 'Provide Customer Field!',
      ];
  }
}
