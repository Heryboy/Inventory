<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table = 'item';
	protected $fillable = [
							'item_code', 
							'image', 
							'item_barcode', 
							'item_category_id', 
							'item_sub_category_id', 
						    'item_type_id',
							'item_status_id',
							'item_size_id',
						    'name',
							'alias',
							'qty',
							'net_price',
							'cost',
							'price',
							'default_currency',
							'default_unit',
							'is_active',
							'is_delete',
							'created_by',
							'updated_by',
						   ];
	
	public $timestamps = true;

	public function ItemCategory(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\ItemCategory','item_category_id');
	}

	public function ItemSubCategory(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\ItemSubCategory','item_sub_category_id');
	}

	public function ItemType(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\ItemType','item_type_id');
	}

	public function ItemStatus(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\ItemStatus','item_status_id');
	}

}

