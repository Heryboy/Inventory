<?php

namespace App\Models\Admin\item_mgr;

use Illuminate\Database\Eloquent\Model;

class LocationBaseBranch extends Model
{
	protected $table = 'location_base_branch';
	protected $fillable = ['branch_id', 
						    'location_id'
						   ];
	
	public $timestamps = true;

	public function Branch(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Branch','branch_id');
	}

	public function ItemLocation(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\ItemLocation','location_id');
	}

}
