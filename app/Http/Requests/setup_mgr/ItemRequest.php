<?php 
namespace App\Http\Requests\setup_mgr;
use App\Http\Requests\Request;

class ItemRequest extends Request
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
      return [
        'item_code'   => 'required',
        'item_category_id'   => 'required',
        'item_sub_category_id' => 'required',
        'item_type_id'   => 'required',
        'item_status_id'   => 'required',
        'item_size_id'   => 'required',
        'name'   => 'required',
        'alias'   => 'required',
        'net_price'   => 'required',
        'cost'   => 'required',
        'price'   => 'required',
        // 'default_currency'   => 'required',
        'default_unit'   => 'required',
        'qty'   => 'required',
      ];
  }

  public function messages()
  {
    return [
      'item_code.required' => 'Provide Item Code!',
      'item_category_id.required' => 'Choose Item Category!',
      'item_sub_category_id.required' => 'Choose Item Sub Category!',
      'item_type_id.required' => 'Choose Item Type!',
      'item_status_id.required' => 'Choose Item Status!',
      'item_size_id.required' => 'Choose Item Size!',
      'name.required' => 'Provide Item Name!',
      'alias.required' => 'Provide Item Alias!',
      'net_price.required' => 'Provide Net Price!',
      'qty.required' => 'Provide Quantity!',
      'cost.required'   => 'Provide Whole Sale!',
      'price.required'   => 'Provide Retail Sale!',
      // 'default_currency.required'   => 'Provide Default Currency!',
      'default_unit.required' => 'Default Unit!',
      'qty.num' => 'Provide Quantity as number only!',
    ];
  }
}
