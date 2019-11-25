<?php

namespace App\Models\FrontOffice;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table='pos_cus_order_details';
    protected $primaryKey='id';

    protected $fillable=[        
        'pos_order_id',
        'item_id',
        'pos_add_on_id',
        'unit_id',
        'qty',
        'cost_amount',
        'unit_price',
        'price',
        'is_addon',
        'is_menu_set',
        'is_cancel',
        'made_by',
        'discount_amount',
        'is_instant_discount',
        'is_happyhour_discount',
        'ref_order_id',
        'printed_qty',
        'created_date',
        'updated_date',
        'note',
    ];

    public $timestamps=false;

    
}
