<?php

namespace App\Models\Admin\discount;

use Illuminate\Database\Eloquent\Model;

class DiscountItemDetail extends Model
{
	protected $table = 'discount_item_detail';
	protected $fillable = [
							'discount_item_id',
	                        'item_id',
	                        'category_id', 
						    'discount',
						    'discount_method_id',
						    'is_delete'
						   ];
	
	public $timestamps = true;

	public function Item(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Item','item_id');
	}

	public function ItemCategory(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\ItemCategory','category_id');
	}
}
