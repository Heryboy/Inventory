<?php

namespace App\Models\Admin\transfer;

use Illuminate\Database\Eloquent\Model;

class TransferSequence extends Model
{
	protected $table = 'transfer_sequence';
	protected $fillable = [
							'sequence_no'
						   ];
	
	public $timestamps = false;
}

