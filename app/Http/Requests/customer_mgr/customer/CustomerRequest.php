<?php 
namespace App\Http\Requests\customer_mgr\customer;
use App\Http\Requests\Request;

class CustomerRequest extends Request
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
      return [
        'customer_group_id'   => 'required',
        'name' => 'required',
        'phone' => 'required',
      ];
  }

  public function messages()
  {
      return [
        'customer_group_id.required' => 'Provide Customer Group!',
        'name.required' => 'Provide Customer Name!',
        'phone.required' => 'Provide Phone Number!',
      ];
  }
}
