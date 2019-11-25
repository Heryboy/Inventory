<?php

namespace App\Models\Admin\transfer;

use Illuminate\Database\Eloquent\Model;

class TransferDetail extends Model
{
	protected $table = 'transfer_detail';
	protected $fillable = [
							'transfer_id', 
							'unit_id', 
							'item_id', 
							'qty', 
						    'remark',
						    'total'
						   ];
	
	public $timestamps = true;

	public function Item(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Item','item_id');
	}

}

