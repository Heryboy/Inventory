<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class ItemSize extends Model
{
	protected $table = 'item_size';
	protected $fillable = ['size_name', 
							'abbr',
							'description',
							'is_delete',
							'is_active',
							'created_by',
							'updated_by',
						   ];
	
	public $timestamps = true;

}
