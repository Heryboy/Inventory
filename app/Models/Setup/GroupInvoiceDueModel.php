<?php namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class GroupInvoiceDueModel extends Model {

	protected $table = 'group_invoice_due';
	
	protected $fillable = [
							'name',				
							'alias',
							'value',						
							];

	public $timestamps = false;
	
}
