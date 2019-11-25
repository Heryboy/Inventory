<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
	protected $table = 'currency';
	protected $fillable = ['name', 
						    'value',
						    'currency_sign',
							'is_default',
							'is_delete',
							'is_active',
						   ];
	
	public $timestamps = true;

}
