<?php namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class StockModel extends Model {

	protected $table = 'stock';
	
	protected $fillable = [

					
				
					'id',
					'parent_id',
					'stock_type_id',
					'name',
					'alias',
					'amount',
					'amount_alert',
					'is_debt',
					'status',
					'created_at',
					'created_by',
					'modified_at',
					'modified_by',
					'is_deleted',
					
						];

	public $timestamps = false;
	
}
