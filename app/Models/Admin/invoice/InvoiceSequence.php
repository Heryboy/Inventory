<?php

namespace App\Models\Admin\invoice;

use Illuminate\Database\Eloquent\Model;

class InvoiceSequence extends Model
{
	protected $table = 'invoice_sequence';
	protected $fillable = [
							'sequence_no'
						   ];
	
	public $timestamps = false;
}

