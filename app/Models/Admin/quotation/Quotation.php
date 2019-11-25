<?php

namespace App\Models\Admin\quotation;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
	protected $table = 'quotation';
	protected $fillable = [
							'quotation_no', 
							'quotation_date',
							'quotation_item_master', 
							'customer_id', 
							'description', 
						    'sub_total',
						    'discount',
							'vat_percentage',
							'grand_total',
							'is_void',
							'is_cancel',
							'branch_id',
							'expired_date',
							'created_by',
							'updated_by',
							'is_approve',
							'is_sale_order'
						   ];
	
	public $timestamps = true;

	public function Customer(){
		return $this->belongsTo('App\Models\Admin\customer_mgr\customer\customer','customer_id');
	}

}

