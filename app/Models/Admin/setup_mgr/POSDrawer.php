<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class POSDrawer extends Model
{
	protected $table = 'cash_drawer';
	protected $fillable = [
							'user_id',
							'cash_drawer_group_id',
							'workshift_id', 
							'amount_usd',
							'amount_khr',
							'is_active',
							'is_deleted'
						   ];
	
	public $timestamps = true;

	public function User(){
		return $this->belongsTo('App\Models\Admin\UserModel','user_id');
	}

	public function WorkShift(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\POSWorkShift','workshift_id');
	}

	public function DrawerGroup(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\POSDrawerGroup','cash_drawer_group_id');
	}

}
