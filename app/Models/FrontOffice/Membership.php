<?php

namespace App\Models\FrontOffice;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table='pos_membership';
    protected $primaryKey='id';
    protected $fillable=[
        'name',
        'image',
        'gender',
        'nationality',
        'phone',
        'fax',
        'email',
        'address',
        'start_date',
        'expired_date',
        'is_active',
        'max_discount',
        'member_code',
        'member_type'
      ];
    public $timestamps=true;

    
}
