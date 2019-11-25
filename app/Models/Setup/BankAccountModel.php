<?php namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class BankAccountModel extends Model {

	protected $table = 'bank_account';
	
	protected $fillable = [

						'id',
						'name',
						'alias',
						'amount',
						];

	public $timestamps = false;
	
}
