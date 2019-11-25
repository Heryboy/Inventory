<?php

namespace App\Models\Admin\customer_mgr\customer_group;

use Illuminate\Database\Eloquent\Model;

class CustomerGroup extends Model
{
	protected $table = 'customer_group';
	protected $fillable = [
							'name',
							'created_by',
							'updated_by',
							'is_delete',
						   ];
	
	public $timestamps = true;

}
