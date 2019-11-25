<?php

namespace App\Models\Admin\stock_mgr;

use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
	protected $table = 'purchase_invoice';
	protected $fillable = [
							'po_id', 
						    'pi_number',
							'pi_date',
							'sub_total',				
							'grand_total',
							'vat_amount',
							'shipping',
							'is_cancel',
							'is_vat',
							'vendor_id',
							'sub_total_return',
							'is_complete',
							'description',
							'discount',
							'total_vat_amount',
							'is_delete',
							'adjust_qty_subitem',
							'remark',
							'user_id',
							'is_approve',
							'is_subitem_complete'
	];
	
	public $timestamps = true;
	// public function config_group(){
	// 	return $this->belongsTo('App\Models\Admin\ConfigGroup','config_group_id','id');
	// 	 //return $this->hasMany('App\ConfigGroup');
	// }
}
