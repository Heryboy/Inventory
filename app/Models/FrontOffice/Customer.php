<?php

namespace App\Models\FrontOffice;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table='customer';
    protected $primaryKey='id';

    protected $fillable=[
        "id",
        "customer_group_id",
        "customer_type_id",
        "group_invoice_due_id",
        "name",
        "phone",
        "email",
        "address",
        "created_at",
        "created_by",
        "updated_at",
        "updated_by",
        "is_default",
        "is_delete"
    ];

    public $timestamps=true;

    
}
