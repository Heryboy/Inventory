<?php 
namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

class ItemSubCategoryRequest extends Request
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
      return [
        'name'   => 'required',
        'item_category_id'   => 'required',
        'branch_id'   => 'required',
        'pos_kitchens_id' => 'required'
      ];
  }

  public function messages()
  {
      return [
        'name.required' => 'Provide Subcategory Name!',
        'item_category_id.required' => 'Provide Category Name!',
        'branch_id.required' => 'Provide Branch Name!',
        'pos_kitchens_id.required' => 'Choose Printer Setting!',
      ];
  }
}
