<?php

namespace App\Models\FrontOffice;
use Illuminate\Database\Eloquent\Model;

class Drawer extends Model
{
    protected $table='cash_drawer';
    protected $primaryKey='id';

    public $timestamps=false;

    
    public function Workshift() 
    {
      return $this->belongsTo(Workshift::class, 'workshift_id');
    }
}
