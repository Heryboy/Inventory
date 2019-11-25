<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class POSOutlet extends Model
{
	protected $table = 'pos_outlets';
	protected $fillable = ['name', 
							'description',
							'tooltype',
							'is_deleted',
							'is_active'
						   ];
	
	public $timestamps = true;

}
