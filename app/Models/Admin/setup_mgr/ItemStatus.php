<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class ItemStatus extends Model
{
	protected $table = 'item_status';
	protected $fillable = ['name', 
							'description',
							'is_delete',
							'is_active',
							'created_by',
							'updated_by',
						   ];
	
	public $timestamps = true;

}
