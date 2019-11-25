<?php namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model {

	protected $table = 'items';
	
	protected $fillable = [

					
				
				'id',
				'supplier_id',
				'item_category_id',
				'stock_id',
				'name',
				'alias',
				'net_price',
				'qty',
				'status',
				'created_at',
				'created_by',
				'modified_at',
				'modified_by',
				'is_deleted',
					
						];

	public $timestamps = false;
	
}
