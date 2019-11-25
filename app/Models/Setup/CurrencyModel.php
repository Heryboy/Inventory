<?php namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class CurrencyModel extends Model {

	protected $table = 'currency';
	
	protected $fillable = ['name',				
							'value',
							'currency_signe',
							'is_default'
							];

	public $timestamps = false;
	
}
