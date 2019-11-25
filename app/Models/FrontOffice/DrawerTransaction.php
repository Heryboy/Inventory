<?php

namespace App\Models\FrontOffice;
use Illuminate\Database\Eloquent\Model;

class DrawerTransaction extends Model
{
    protected $table='cash_drawer_transaction';
    protected $primaryKey='id';
    protected $fillable=[
      "cash_drawer_id",
      "workshift_id",
      "open_by",
      "close_by",
      "open_amount",
      "open_date",
      "close_amount",
      "close_date",
      "created_at",
      "updated_at",
      "actaul_amount",
      "diff_amount",
      "description",
    ];
    public $timestamps=false;

    
    public function Drawer() 
    {
      return $this->belongsTo(Drawer::class, 'cash_drawer_id');
    }
}
