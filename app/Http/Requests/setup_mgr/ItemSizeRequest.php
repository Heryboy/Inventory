<?php 
namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

class ItemSizeRequest extends Request
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
      return [
        'size_name'   => 'required',
      ];
  }

  public function messages()
  {
      return [
        'size_name.required' => 'Provide Size Name!',
      ];
  }
}
