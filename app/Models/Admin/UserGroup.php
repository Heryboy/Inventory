<?php namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model {

	protected $table = 'user_group';
	
	protected $fillable = ['name',
							'is_active',
							'remark',
							'created_by',
							'updated_by'
							];

	public $timestamps = false;
	
	
	public function origin_office(){
		return $this->belongsTo('App\Models\Admin\OriginOffice','branch_id');
	}
	
	public function user(){
		return $this->belongsTo('App\Models\Admin\UserModel','create_by_id');
	}
	
}
