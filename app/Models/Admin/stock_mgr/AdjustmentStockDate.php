<?php

namespace App\Models\Admin\stock_mgr;

use Illuminate\Database\Eloquent\Model;

class AdjustmentStockDate extends Model
{
	protected $table = 'adjustment_date';
	protected $fillable = [
							'adjust_stock_date'
						  ];
	
	public $timestamps = false;
}
