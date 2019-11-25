<?php

namespace App\Http\Requests\Setup;
use App\Http\Requests\Request;

//class PermissionRequest extends Request
class StockRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          
        
          'stock_type_id',
          'name',
          'alias',
          'amount',
        ];
    }

    public function messages()
    {
        return [
          'stock_type_id.required' => 'Provide Stock Type !',
          'name.required' => 'Provide Name!',
          'stock_type_id.required' => 'Provide Stock Type !',
          'amount.required' => 'Provide Amount!',
        ];
    }
}
