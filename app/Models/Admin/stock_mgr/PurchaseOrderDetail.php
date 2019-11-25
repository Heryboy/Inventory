<?php

namespace App\Models\Admin\stock_mgr;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderDetail extends Model
{
	protected $table = 'purchase_order_detail';
	protected $fillable = [
							'pi_id', 
						    'po_vendor_id',
							'delivery_date',
							'qty',				
							'receive_qty',
							'unit_id',
							'price',
							'discount_id',
							'discount_amount',
							'change',
							'item_id',
							'is_complete',
							'total',
							'remark'
	];
	
	public $timestamps = false;

	public function Item(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Item','item_id','id');
	}
}
