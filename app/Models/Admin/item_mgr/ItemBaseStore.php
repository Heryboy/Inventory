<?php

namespace App\Models\Admin\item_mgr;

use Illuminate\Database\Eloquent\Model;

class ItemBaseStore extends Model
{
	protected $table = 'item_base_branch';
	protected $fillable = ['branch_id', 
						    'item_id',
						    'item_category_id'
						   ];
	
	public $timestamps = true;

	public function Branch(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Branch','branch_id');
	}

	public function Item(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Item','item_id');
	}

	public function ItemCategory(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\ItemCategory','item_category_id');
	}

}
