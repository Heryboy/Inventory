<?php

namespace App\Models\Admin\sale_mgr;

use Illuminate\Database\Eloquent\Model;

class SaleOrderDetail extends Model
{
	protected $table = 'sale_order_detail';
	protected $fillable = [
							'sale_order_id', 
							'branch_id', 
							'unit_id', 
							'sale_order_date', 
						    'sale_order_qty',
						    'comp_qty',
							'void_qty',
							'item_id',
							'retailer_price',
							'whole_sale_price',
							'discount_amount',
							'sale_order_price',
							'whole_sell_unit',
							'retail_unit',
							'total',
							'remark'
						   ];
	
	public $timestamps = false;

	public function Item(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Item','item_id');
	}
	// public function Customer(){
	// 	return $this->belongsTo('App\Models\Admin\customer_mgr\customer','customer_id');
	// }

}

