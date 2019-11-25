<?php

namespace App\Models\Admin\stock_mgr;

use Illuminate\Database\Eloquent\Model;

class ActualStock extends Model
{
	protected $table = 'actual_stock';
	protected $fillable = [
							'branch_id', 
						    'item_id',
							'unit_id',
							'qty',				
							'date',
							'cost',
							'expected_close',
							'end_margin',
							'act_unit_id',
							'act_qty',
							'sub_location_id'
	];
	
	public $timestamps = false;
	// public function config_group(){
	// 	return $this->belongsTo('App\Models\Admin\ConfigGroup','config_group_id','id');
	// 	 //return $this->hasMany('App\ConfigGroup');
	// }
}
