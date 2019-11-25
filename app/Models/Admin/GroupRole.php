<?php namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class GroupRole extends Model {

	protected $table = 'group_role';
	
	protected $fillable = ['name','group_id','remark'];

	public $timestamps = false;
	
	
	public function user_group(){
		return $this->belongsTo('App\Models\Admin\UserGroup','group_id');
	}

}
