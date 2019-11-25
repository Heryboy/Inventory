<?php namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class LookUpModel extends Model {

	protected $table = 'lookup';
	
	protected $fillable = [

							'id',
							'look_up_group_id',
							'name',
							'alias',
							'value',
							'ordering',
							];

	public $timestamps = false;
	
}
