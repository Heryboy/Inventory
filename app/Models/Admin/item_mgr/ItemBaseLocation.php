<?php

namespace App\Models\Admin\item_mgr;

use Illuminate\Database\Eloquent\Model;

class ItemBaseLocation extends Model
{
	protected $table = 'item_base_location';
	protected $fillable = ['branch_id', 
							'location_id',
						    'item_id'
						   ];
	
	public $timestamps = true;

	public function Branch(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Branch','branch_id');
	}

	public function Item(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Item','item_id');
	}

	public function ItemLocation(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\ItemLocation','location_id');
	}

}
