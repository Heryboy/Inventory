<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
	protected $table = 'branch';
	protected $fillable = ['company_id', 
						    'branch_name',
						    'descripton',
							'branch_group_id',
							'is_deleted',
							'is_default',
							'created_by',
							'updated_by',
						   ];
	
	public $timestamps = true;

	public function Company(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Company','company_id');
	}

	public function BranchGroup(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\BranchGroup','branch_group_id');
	}

}
