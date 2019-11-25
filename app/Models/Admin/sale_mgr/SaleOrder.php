<?php

namespace App\Models\Admin\sale_mgr;

use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
	// protected $table = 'sale_order';
	// protected $fillable = [
	// 						'sale_order_no', 
	// 						'invoice_no',
	// 						'quotation_no',
	// 						'sale_order_date',
	// 						'sale_order_item_master', 
	// 						'customer_id', 
	// 						'description', 
	// 					    'sub_total',
	// 					    'discount',
	// 						'vat_percentage',
	// 						'grand_total',
	// 						'is_void',
	// 						'is_cancel',
	// 						'branch_id',
	// 						'expired_date',
	// 						'created_by',
	// 						'updated_by',
	// 						'is_approve'
	// 					   ];
	protected $table = 'pos_cus_orders';
	protected $fillable = [
							'order_no',
							'branch_id',
							'invoice_no',
							'unit_id',
							'table_id',
							'member_id',
							'customer_id',
							'check_in_date',
							'check_out_date',
							'is_voidtiny',
							'pax',
							'made_by',
							'made_date',
							'is_printed_receipttiny',
							'cancel_by',
							'discount',
							'discount_amount',
							'vat_percentag',
							'vat_amount',
							'tax_amount',
							'tax_percentage',
							'sub_total_amount',
							'service_tax_amount',
							'service_tax_percentage',
							'order_type_id',
							'drawer_id',
							'printed_qty',
							'status_id',
							'flag_checktiny',
							'ref_id',
							'created_date',
							'updated_date',
							'discount_method_id',
							'discount_by',
							'discount_profile_type_id',
							'remark'
						   ];
						   
	public $timestamps = true;

	public function Customer(){
		return $this->belongsTo('App\Models\Admin\customer_mgr\customer\customer','customer_id');
	}

}

