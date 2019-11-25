<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class ItemSubCategory extends Model
{
	protected $table = 'item_sub_category';
	protected $fillable = [
							'branch_id',
							'image',
							'pos_kitchens_id',
							'item_category_id',
	                        'name', 
							'is_delete'
						  ];
	
	public $timestamps = false;

	public function Branch(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Branch','branch_id');
	}
	public function Category(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\ItemCategory','item_category_id');
	}
	public function POSKitchen(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\POSKitchen','pos_kitchens_id');
	}

}
