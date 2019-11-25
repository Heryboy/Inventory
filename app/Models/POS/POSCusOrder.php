<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Model;

class POSCusOrder extends Model
{
	protected $table = 'pos_cus_orders';
	protected $fillable = [
							'customer_id',
							'branch_id',
							'order_no',
							'check_in_date',
							'check_out_date',
							'is_void',
							'made_by',
							'made_date',
							'is_printed_receipt',
							'cancel_by',
							'discount',
							'discount_amount',
							'vat_percentag',
							'vat_amount',
							'sub_total_amount',
							'order_type_id',
							'drawer_id',
							'printed_qty',
							'status_id',
							'ref_id',
							'flag_check',
							'discount_method_id',
							'discount_by',
							'discount_amount',
							'discount_profile_type_id'
						  ];
	
	public $timestamps = true;//to avoid updated_at and created_at in default laravel framwork
	public function Customer(){
		return $this->belongsTo('App\Models\Admin\customer_mgr\customer\customer','customer_id');
	}
}
