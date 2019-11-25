<?php namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class ItemCateogryModel extends Model {

	protected $table = 'item_category';
	
	protected $fillable = [

					
					'id',
					'name',
					'is_deleted',
					
						];

	public $timestamps = false;
	
}
