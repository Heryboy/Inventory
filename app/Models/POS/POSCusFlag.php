<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Model;

class POSCusFlag extends Model
{
	protected $table = 'pos_cus_flag';
	protected $fillable = [
							'order_id'
						  ];
	
	public $timestamps = false;//to avoid updated_at and created_at in default laravel framwork
}
