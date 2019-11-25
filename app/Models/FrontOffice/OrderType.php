<?php

namespace App\Models\FrontOffice;
use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    protected $table='order_types';
    protected $primaryKey='id';

    public $timestamps=false;

    
}
