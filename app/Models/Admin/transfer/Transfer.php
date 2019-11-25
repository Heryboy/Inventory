<?php

namespace App\Models\Admin\transfer;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
	protected $table = 'transfer';
	protected $fillable = [
							'from_branch_id', 
							'to_branch_id', 
							'transfer_no', 
							'transfer_date', 
						    'transferor',
						    'receiver',
						    'description',
							'voucher_no',
							'is_transfered',
							'is_received',
							'is_cancel',
							'created_by',
							'updated_by',
							'total'
						   ];
	
	public $timestamps = true;

	public function FromBranch(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Branch','from_branch_id');
	}

	public function ToBranch(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Branch','to_branch_id');
	}

}

