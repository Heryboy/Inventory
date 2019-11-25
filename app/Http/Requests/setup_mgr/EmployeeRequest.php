<?php 
namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

class EmployeeRequest extends Request
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
      return [
        'emp_name'   => 'required',
        'position_id'   => 'required',
        'department_id'   => 'required',
      ];
  }

  public function messages()
  {
      return [
        'emp_name.required' => 'Provide Employee Name!',
        'position_id.required' => 'Choose Position Name!',
        'department_id.required' => 'Choose Department Name!'
      ];
  }
}
