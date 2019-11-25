<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
	protected $table = 'user';
	protected $fillable = ['username', 
						    'password',
							'photo',
							'group_id',
							'email'
							
	];
	 
	public $timestamps = false;
	
	
	public function group_user(){
		return $this->belongsTo('App\Models\Admin\UserGroup','group_id');
	}
}
