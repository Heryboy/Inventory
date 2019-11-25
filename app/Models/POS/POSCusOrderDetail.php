<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Model;

class POSCusOrderDetail extends Model
{
	protected $table = 'pos_cus_order_details';
	protected $fillable = [
							'pos_order_id',
							'item_id',
							'unit_id',
							'qty',
							'cost_amount',
							'unit_price',
							'price',
							'is_cancel',
							'printed_qty',
							'note'
						  ];

	public $timestamps = true;//to avoid updated_at and created_at in default laravel framwork
	
	public function Item(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Item','item_id');
	}

}
