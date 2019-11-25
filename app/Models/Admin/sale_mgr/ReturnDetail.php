<?php

namespace App\Models\Admin\sale_mgr;

use Illuminate\Database\Eloquent\Model;

class ReturnDetail extends Model
{
	protected $table = 'return_detail';
	protected $fillable = [
							'return_id', 
							'unit_id', 
							'item_id', 
							'qty'
						   ];
	
	public $timestamps = true;
	public function Item(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Item','item_id');
	}
}

