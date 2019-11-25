<?php 
namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

class CompanyRequest extends Request
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
      return [
        'company_kh'   => 'required',
        'company_en'   => 'required',
      ];
  }

  public function messages()
  {
      return [
        'company_kh.required' => 'Provide Company KH!',
        'company_en.required' => 'Provide Company ENG!',
      ];
  }
}
