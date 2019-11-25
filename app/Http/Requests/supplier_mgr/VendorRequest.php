<?php 
namespace App\Http\Requests\supplier_mgr;
use App\Http\Requests\Request;

class VendorRequest extends Request
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
      return [
        'branch_id'   => 'required',
        'vendor_name'   => 'required',
      ];
  }

  public function messages()
  {
      return [
        'branch_id.required' => 'Choose Branch!',
        'vendor_name.required' => 'Provide Vendor Name!',
      ];
  }
}
