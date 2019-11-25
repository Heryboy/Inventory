<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $table = 'employee';
	protected $fillable = [
							'position_id', 
							'department_id', 
							'emp_name', 
							'emp_gender', 
							'emp_dob', 
							'emp_pob', 
							'emp_current_living', 
							'emp_contact', 
							'emp_email', 
							'emp_relative', 
							'is_delete',
							'created_by',
							'updated_by',
						   ];
	
	public $timestamps = true;

	public function Position(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Position','position_id');
	}

	public function Department(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Department','department_id');
	}

}
