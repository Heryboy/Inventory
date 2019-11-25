<?php

namespace App\Models\Admin\supplier_mgr;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
	protected $table = 'vendor';
	protected $fillable = ['branch_id',
							'vendor_name', 
						    'contact',
						    'address1',
						    'address2',
						    'tel1',
						    'tel2',
						    'tel3',
						    'fax1',
						    'fax2',
						    'account_number',
						    'terms_of_payment',
						    'delivery_day',
						    'email',
						    'website',
						    'vendor_code',
						    'description',
						    'is_vat',
						    'vat_no',
							'is_delete',
							'is_active',
						   ];
	
	public $timestamps = true;

	public function Branch(){
		return $this->belongsTo('App\Models\Admin\setup_mgr\Branch','branch_id');
	}

}
