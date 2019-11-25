<?php 
namespace App\Http\Requests\setup_mgr\language;
use App\Http\Requests\Request;

class LanguageRequest extends Request
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
      return [
        'name'   => 'required',
        'code' => 'required',
      ];
  }

  public function messages()
  {
      return [
        'name.required' => 'Provide Name!',
        'code.required' => 'Provide Code!',
      ];
  }
}
