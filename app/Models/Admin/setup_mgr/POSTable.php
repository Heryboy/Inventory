<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class POSTable extends Model
{
	protected $table = 'pos_tables';
	protected $fillable = [
							'pos_outlets_id',
							'pos_tables',
							'name', 
							'pax',
							'is_table',
							'description',
							'status',
							'font_size',
							'width',
							'height',
							'table_shape',
							'position_x',
							'position_y',
							'background_color',
							'background_url',
							'text_color',
							'is_deleted'
						   ];
	
	public $timestamps = true;

	public function Outlet(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\POSOutlet','pos_outlets_id');
	}

}
