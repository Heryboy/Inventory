<?php

namespace App\Models\Admin\quotation;

use Illuminate\Database\Eloquent\Model;

class QuotationDetail extends Model
{
	protected $table = 'quotation_detail';
	protected $fillable = [
							'quotation_id', 
							'branch_id', 
							'unit_id', 
							'quotation_date', 
						    'quotation_qty',
						    'comp_qty',
							'void_qty',
							'item_id',
							'retailer_price',
							'whole_sale_price',
							'discount_amount',
							'quotation_price',
							'whole_sell_unit',
							'total',
							'retail_unit',
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

