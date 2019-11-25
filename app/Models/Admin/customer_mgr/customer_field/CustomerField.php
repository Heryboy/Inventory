<?php

namespace App\Models\Admin\customer_mgr\customer_field;

use Illuminate\Database\Eloquent\Model;

class CustomerField extends Model
{
	protected $table = 'customer_field';
	protected $fillable = [
							'name',
							'is_delete',
							'is_active',
							'created_by',
							'updated_by',
						   ];
	
	public $timestamps = true;

}
