<?php

namespace App\Models\Admin\customer_mgr\customer;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
	protected $table = 'customer';
	protected $fillable = ['customer_group_id',
							'name', 
						    'phone',
							'email',
							'address',
							'created_by',
							'updated_by',
							'is_delete',
						   ];
	
	public $timestamps = true;

	public function customer_group(){
		return $this->belongsTo('App\Models\Admin\customer_mgr\customer_group\CustomerGroup','customer_group_id');
	}

}
