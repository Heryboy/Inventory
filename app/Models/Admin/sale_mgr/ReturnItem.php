<?php

namespace App\Models\Admin\sale_mgr;
use Illuminate\Database\Eloquent\Model;

class ReturnItem extends Model
{

	protected $table = 'return';
	protected $fillable = [
							'branch_id',
							'customer_id',
							'bill_no', 
							'return_no', 
							'return_date', 
							'return_by', 
						    'verify_by',
						    'is_returned',
						    'description',
							'created_by',
							'updated_by',
						   ];

	public $timestamps = true;

	public function Branch(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Branch','branch_id');
	}
	public function Customer(){
		return $this->belongsTo('App\Models\Admin\customer_mgr\customer\customer','customer_id');
	}
}

