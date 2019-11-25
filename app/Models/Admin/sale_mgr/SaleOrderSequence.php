<?php

namespace App\Models\Admin\sale_mgr;

use Illuminate\Database\Eloquent\Model;

class SaleOrderSequence extends Model
{
	protected $table = 'sale_order_sequence';
	protected $fillable = [
							'sequence_no'
						   ];
	
	public $timestamps = false;
}

