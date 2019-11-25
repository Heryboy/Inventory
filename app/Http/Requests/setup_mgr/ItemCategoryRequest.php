<?php 
namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

class ItemCategoryRequest extends Request
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
      return [
        'item_category_name'   => 'required',
        'branch_id'   => 'required'
      ];
  }

  public function messages()
  {
      return [
        'item_category_name.required' => 'Provide Item Category Name!',
        'branch_id.required' => 'Provide Branch Name!'
      ];
  }
}
