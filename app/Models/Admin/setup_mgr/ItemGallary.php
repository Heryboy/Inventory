<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class ItemGallary extends Model
{
	protected $table = 'item_gallary';
	protected $fillable = [
							'item_id', 
							'name',
							'image_gallary',
							'order_level'
						   ];
	
	public $timestamps = false;


	public function Item(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Item','item_id');
	}

}

