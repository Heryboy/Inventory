<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class StockType extends Model
{
	protected $table = 'stock_type';
	protected $fillable = ['name', 
							'is_delete',
							'is_active',
							'created_by',
							'updated_by',
						   ];
	
	public $timestamps = true;

}
