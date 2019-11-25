<?php

namespace App\Models\Admin\supplier_mgr;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
	protected $table = 'supplier';
	protected $fillable = ['branch_id',
							'name', 
							'company_name',
						    'contact',
						    'email',
						    'address',
						    'website',
							'is_delete',
							'is_active',
						    'created_at',
						    'updated_at',
						   ];
	
	public $timestamps = true;

	public function Branch(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Branch','branch_id');
	}

}
