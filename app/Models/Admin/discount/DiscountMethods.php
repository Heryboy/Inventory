<?php

namespace App\Models\Admin\discount;

use Illuminate\Database\Eloquent\Model;

class DiscountMethods extends Model
{
	protected $table = 'discount_methods';
	protected $fillable = [
	                        'abbr', 
						    'name',
						    'description'
						   ];
	
	public $timestamps = true;
}
