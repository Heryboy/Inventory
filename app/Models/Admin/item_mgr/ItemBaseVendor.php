<?php

namespace App\Models\Admin\item_mgr;

use Illuminate\Database\Eloquent\Model;

class ItemBaseVendor extends Model
{
	protected $table = 'item_base_vendor';
	protected $fillable = ['id', 
						    'vendor_id',
						    'item_id',
							'is_deleted',
							'created_by',
							'updated_by',
						   ];
	
	public $timestamps = true;

	public function Vendor(){
		return $this->belongsTo('App\Models\Admin\supplier_mgr\Vendor','vendor_id');
	}

	public function Item(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Item','item_id');
	}

}
