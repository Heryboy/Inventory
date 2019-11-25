<?php

namespace App\Models\Admin\setup_mgr;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'company';
	protected $fillable = [
							'image',
							'company_kh', 
							'company_en', 
						    'address',
						    'description',
						    'website',
						    'phone',
						    'email'
						  ];
	
	public $timestamps = true;
}
