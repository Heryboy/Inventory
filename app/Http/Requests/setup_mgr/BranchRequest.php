<?php 
namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

class BranchRequest extends Request
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
      return [
        'branch_name'   => 'required',
        'company_id'   => 'required',
        'branch_group_id'   => 'required',
      ];
  }

  public function messages()
  {
      return [
        'branch_group_id.required' => 'Choose Branch Group!',
        'company_id.required' => 'Choose Company!',
        'branch_name.required' => 'Provide Branch Name!',
      ];
  }
}
