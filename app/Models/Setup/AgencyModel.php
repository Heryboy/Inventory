<?php namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class AgencyModel extends Model {

	protected $table = 'agency';
	
	protected $fillable = [

						'id',
						'group_invoice_due_id',
						'name',
						'company_name',
						'phone',
						'fax',
						'email',
						'website',
						'address',
						'map_url',
						'created_by',
						'modified_by',
						'created_at',
						'modified_at',
						'is_delete',

						];

	public $timestamps = false;
	
}
