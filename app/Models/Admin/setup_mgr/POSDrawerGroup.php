<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class POSDrawerGroup extends Model
{
	protected $table = 'cash_drawer_group';
	protected $fillable = [
							'name',
							'description',
							'is_active',
							'is_delete'
						   ];
	
	public $timestamps = true;
}
