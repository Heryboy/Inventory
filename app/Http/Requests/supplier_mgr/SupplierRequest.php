<?php 
namespace App\Http\Requests\supplier_mgr;
use App\Http\Requests\Request;

class SupplierRequest extends Request
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
      return [
        'branch_id'   => 'required',
        'name'   => 'required',
      ];
  }

  public function messages()
  {
      return [
        'branch_id.required' => 'Choose Branch!',
        'name.required' => 'Provide Supplier Name!',
      ];
  }
}
