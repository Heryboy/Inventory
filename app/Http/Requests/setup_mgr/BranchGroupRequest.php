<?php 
namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

class BranchGroupRequest extends Request
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
      return [
        'branch_group_name'   => 'required',
      ];
  }

  public function messages()
  {
      return [
        'branch_group_name.required' => 'Provide Branch Group Name!',
      ];
  }
}
