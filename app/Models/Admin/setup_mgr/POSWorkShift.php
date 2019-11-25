<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class POSWorkShift extends Model
{
	protected $table = 'workshifts';
	protected $fillable = [
							'workshift_name',
							'start_time',
							'end_time', 
							'description',
							'is_active'
						   ];
	
	public $timestamps = true;
}
