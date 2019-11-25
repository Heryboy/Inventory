<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class ItemRelated extends Model
{
	protected $table = 'item_related';
	protected $fillable = ['item_id', 
							'item_related_id'
						   ];
	
	public $timestamps = false;

}
