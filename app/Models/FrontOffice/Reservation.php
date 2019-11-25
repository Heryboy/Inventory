<?php

namespace App\Models\FrontOffice;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table='table_reservations';
    protected $primaryKey='id';
    protected $fillable=[
        'table_id',
        'contact_name',
        'reservation_date',
        'contact_number',
        'reservation_by',
        'note',
        'status_id',
        'created_at',
        'updated_at'
      ];
    public $timestamps=false;

    
}
