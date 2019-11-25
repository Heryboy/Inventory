<?php namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model {

	protected $table = 'supplier';
	
	protected $fillable = [

					
					'id',
					'name',
					'phone',
					'email',
					'address',
					'website',
					'created_at',
					'created_by',
					'is_deleted',
					
						];

	public $timestamps = false;
	
}
