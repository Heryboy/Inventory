<?php

namespace App\Models\Admin\sale_mgr;

use Illuminate\Database\Eloquent\Model;

class ReturnSequence extends Model
{
	protected $table = 'return_sequence';
	protected $fillable = [
							'sequence_no'
						   ];
	
	public $timestamps = false;
}

