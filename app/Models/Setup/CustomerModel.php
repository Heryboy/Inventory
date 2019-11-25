<?php namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model {

	protected $table = 'customer';
	
	protected $fillable = [
						'id',
						'group_invoice_due_id',
						'name',
						'phone',
						'email',
						'address',
						'created_at',
						'created_by',
						'modified_at',
						'modified_by',
						'is_deleted',

						];

	public $timestamps = false;
	
}
