<?php

namespace App\Models\FrontOffice;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='pos_cus_orders';
    protected $primaryKey='id';

    protected $fillable=[
        'order_no',
        'customer_id',
        'table_id',
        'unit_id',
        'check_in_date',
        'check_out_date',
        'eods',
        'estimate_delivery_time',
        'pax',
        'is_void',
        'made_by',
        'made_date',
        'is_printed_receipt',
        'cancel_by',
        'discount',
        'discount_amount',
        'vat_percentag',
        'vat_amount',
        'service_tax_amount',
        'service_tax_percentage',
        'sub_total_amount',
        'tax_percentage',
        'tax_amount',
        'member_id',
        'order_type_id',
        'drawer_id',
        'printed_qty',
        'status_id',
        'ref_id',
        'created_date',
        'updated_date',
        'discount_method_id',
        'discount_by',
        'discount_profile_type_id',
        'remark'
      ];

    public $timestamps=false;

    public function Table() 
    {
        return $this->belongsTo(Table::class,'id');
    }

    public function Customer() 
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function OrderType() 
    {
        return $this->belongsTo(OrderType::class,'order_type_id');
    }
    
}
