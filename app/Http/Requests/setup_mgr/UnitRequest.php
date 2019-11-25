<?php 
namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

class UnitRequest extends Request
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
      return [
        'unit_group_id'   => 'required',
      ];
  }

  public function messages()
  {
      return [
        'unit_group_id.required' => 'Choose Unit Group!',
      ];
  }
}
