<?php 
namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

class CurrencyRequest extends Request
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
      return [
        'name'   => 'required',
        'value'   => 'required',
        'currency_sign'   => 'required',
      ];
  }

  public function messages()
  {
      return [
        'name.required' => 'Provide Currency Name!',
        'value.required' => 'Provide Currency Value!',
        'currency_sign.required' => 'Provide Currency Sign!',
      ];
  }
}
