<?php

namespace App\Models\FrontOffice;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $table='pos_reciept';
    protected $primaryKey='id';

    protected $fillable=[
        'receipt_no',
        'order_id',
        'payment_method_id',
        'amount',
        'currency_id',
        'transaction_date',
        'description',
        'status_id',
        'udpated_at',
        'created_at',
      ];

    public $timestamps=false;

    public function PaymentMethod() 
    {
        return $this->belongsTo(PaymentMethod::class,'payment_method_id');
    }
    public function OrderType() 
    {
        return $this->belongsTo(OrderType::class,'order_type_id');
    }
    
}
