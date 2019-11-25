<?php

namespace App\Models\Admin\setup_mgr\language;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
	protected $table = 'language';
	protected $fillable = ['name', 
						    'code',
							'image',
							'order_level',
							'created_at',
							'updated_at',
							'is_delete',
							'is_active',
						   ];
	
	public $timestamps = true;

}
