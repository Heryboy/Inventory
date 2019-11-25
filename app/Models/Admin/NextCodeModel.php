<?php namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class NextCodeModel extends Model {

	protected $table = 'next_codes';
	
	protected $fillable = [

					'id',
					'module',
					'next_sequence',
					'cit',
					'cet',
					'prefix',
					'suffix',
					'length',
					'created_at',
					'updated_at',
					'is_manaul',
				];

	public $timestamps = false;
}
