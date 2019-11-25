<?php namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class ItemBaseStockModel extends Model {

	protected $table = 'item_to_stock';
	
	protected $fillable = [

						'id',
						'item_id',
						'stock_id',
						'supplier_id',
						];

	public $timestamps = false;
	
}
