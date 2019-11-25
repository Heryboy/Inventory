<?php

namespace App\Models\Admin\stock_mgr;

use Illuminate\Database\Eloquent\Model;

class AdjustmentStock extends Model
{
	protected $table = 'adjustment';
	protected $fillable = [
							'item_id', 
						    'adjustment_date',
							'adjust_qty',
							'adjust_type',				
							'adjust_by',
							'reason',
							'branch_id',
							'unit_id',
							'lost_qty',
							'damage_qty'
	];
	
	public $timestamps = true;
	// public function config_group(){
	// 	return $this->belongsTo('App\Models\Admin\ConfigGroup','config_group_id','id');
	// 	 //return $this->hasMany('App\ConfigGroup');
	// }
}
