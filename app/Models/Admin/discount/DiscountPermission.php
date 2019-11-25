<?php

namespace App\Models\Admin\discount;

use Illuminate\Database\Eloquent\Model;

class DiscountPermission extends Model
{
	protected $table = 'discount_permissions';
	protected $fillable = [
	                        'user_id', 
						    'max_discount',
						    'discount_method_id',
						    'is_active',
						    'is_delete'
						   ];
	
	public $timestamps = true;
	public function User(){
		return $this->belongsTo('App\Models\Admin\UserModel','user_id');
	}
	public function DiscountMethod(){
		return $this->belongsTo('App\Models\Admin\discount\DiscountMethods','discount_method_id');
	}
}
