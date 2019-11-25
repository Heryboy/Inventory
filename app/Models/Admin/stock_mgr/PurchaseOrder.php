<?php

namespace App\Models\Admin\stock_mgr;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
	protected $table = 'purchase_order';
	protected $fillable = [
							'po_number', 
						    'po_date',
							'pr_id',
							'sub_total',				
							'vat_amount',
							'shipping',
							'grand_total',
							'po_footer_remark',
							'is_post',
							'is_cancel',
							'is_approve',
							'post_date',
							'supplier_id',	
							'cancel_date',
							'branch_id',
							'vendor_id',
							'description',
							'sub_discount',
							'make_by',
							'remark'
	];
	
	public $timestamps = true;

	public function Supplier(){
		return $this->belongsTo('App\Models\Admin\supplier_mgr\Supplier','vendor_id','id');
	}
}
