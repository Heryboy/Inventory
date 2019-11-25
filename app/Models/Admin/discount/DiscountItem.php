<?php

namespace App\Models\Admin\discount;

use Illuminate\Database\Eloquent\Model;

class DiscountItem extends Model
{
	protected $table = 'discount_item';
	protected $fillable = [
	                        'name', 
						    'start_date',
						    'end_date',
						    'is_never_expire',
						    'is_active',
						    'start_time',
						    'end_time',
						    'description',
						    'is_delete',
						    'end_time',
						    'end_time',
						   ];
	
	public $timestamps = true;
}
