<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class BranchGroup extends Model
{
	protected $table = 'branch_group';
	protected $fillable = ['branch_group_name', 
						    'branch_group_description',
						    'is_active',
						    'is_delete',
						  ];
	
	public $timestamps = false;

}
