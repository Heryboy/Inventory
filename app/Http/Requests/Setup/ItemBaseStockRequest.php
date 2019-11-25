<?php

namespace App\Http\Requests\Setup;
use App\Http\Requests\Request;

//class PermissionRequest extends Request
class ItemBaseStockRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          
            'item_id'   => 'required',
            'stock_id'   => 'required',
            'supplier_id'   => 'required',
         
        ];
    }

    public function messages()
    {
        return [
            'item_id.required' => 'Provide Item !',
            'stock_id.required' => 'Provide stock !',
            'supplier_id.required' => 'Provide supplier !',

        ];
    }
}
