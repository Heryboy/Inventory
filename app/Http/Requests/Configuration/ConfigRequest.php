<?php

namespace App\Http\Requests\Configuration;

use App\Http\Requests\Request;

class ConfigRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            
            'config_group_id' => 'required',
            'name' => 'required',
            'keywords' => 'required',
            'value' => 'required',
          
        ];
    }
    public function messages()
    {
        return [
    
            // 'crew_id.required' => 'Provide crew!',
            'config_group_id.required' => 'Provide config_group_id!',
            'name.required' => 'Provide Name!',
            'keywords.required' => 'Provide Keyword!',
            'value.required' => 'Provide Value!',
        ];
    }
}
