<?php namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class GroupRoleFlight extends Model {

	protected $table = 'group_role_flight';
	
	protected $fillable = ['group_role_id',
							'pax_movement_id',							
							'read',
							'write'
							];

	public $timestamps = false;
	
	
	public function group_user(){
		return $this->belongsTo('App\Models\Admin\GroupUser','group_id');
	}

}
