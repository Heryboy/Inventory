<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
	protected $table = 'item_category';
	protected $fillable = [
	                        'item_category_name', 
	                        'image', 
							'is_delete',
							'branch_id'
						  ];
	
	public $timestamps = false;

	public function Branch(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Branch','branch_id');
	}

}
