<?php 
namespace App\Http\Requests\customer_mgr\customer_group;
use App\Http\Requests\Request;

class CustomerGroupRequest extends Request
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
        'name.required' => 'Provide Name!',
      ];
  }
}
