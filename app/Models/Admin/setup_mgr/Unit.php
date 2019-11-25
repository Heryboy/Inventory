<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
	protected $table = 'unit';
	protected $fillable = ['unit_group_id', 
						    'name',
							'is_standard',
							'is_delete',
							'is_active',
							'created_by',
							'updated_by',
						   ];
	
	public $timestamps = true;

	public function UnitGroup(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\UnitGroup','unit_group_id');
	}

}
