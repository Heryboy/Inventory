<?php

namespace App\Http\Requests\Setup;
use App\Http\Requests\Request;

//class PermissionRequest extends Request
class ItemRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          
            // 'supplier_id'=> 'required',
            'item_category_id'=> 'required',
            // 'stock_id'=> 'required',
            'name'=> 'required',
            'net_price'=> 'required',
            'qty'=> 'required',
         
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Provide Name !',
          // 'supplier_id.required'=> 'Provide Supplier !',
          'item_category_id.required'=> 'Provide Item Category !',
          // 'stock_id.required'=> 'Provide Stock !',
          'net_price.required'=> 'Provide Net price !',
          'qty.required'=> 'Provide qty !',

        ];
    }
}
