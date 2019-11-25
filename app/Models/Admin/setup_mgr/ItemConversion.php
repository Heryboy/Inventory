<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class ItemConversion extends Model
{

	protected $table = 'item_conversion';
	protected $fillable = [
							'item_id', 
							'unit1',
							'unit2',
							'qty1',
							'qty2',
						  ];
	
	public $timestamps = false;

	public function Branch(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Branch','branch_id');
	}

}
