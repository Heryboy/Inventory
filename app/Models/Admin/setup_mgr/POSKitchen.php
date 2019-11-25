<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class POSKitchen extends Model
{
	protected $table = 'pos_kitchens';
	protected $fillable = ['name', 
							'printer_name',
							'ip_address',
							'is_deleted',
							'is_active'
						   ];
	
	public $timestamps = true;

}
