<?php

namespace App\Models\FrontOffice;
use Illuminate\Database\Eloquent\Model;

class AccountTransaction extends Model
{
    protected $table='account_transactions';
    protected $primaryKey='id';
    protected $fillable=[
      'account_id',
      'receipt_id',
      'transaction_date',
      'debit_amount',
      'credit_amount',
      'currency_id',
      'local_currency_credit',
      'local_currency_debit',
      'exchange_rate',
      'is_transfered',
      'is_voided',
      'description',
      'credit_card_no',
      'out_let_id',
      'drawer_id',
      'eod_date',
      'created_at',
      'updated_at',
    ];
    public $timestamps=false;

    
    public function Drawer() 
    {
      return $this->belongsTo(Drawer::class, 'cash_drawer_id');
    }
}
