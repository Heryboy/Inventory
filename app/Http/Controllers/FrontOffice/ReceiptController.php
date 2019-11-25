<?php

namespace App\Http\Controllers\FrontOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Models\FrontOffice\Receipt;
use App\Models\FrontOffice\Order;
use App\Models\FrontOffice\OrderDetail;
use App\Models\FrontOffice\NextCode;
use App\Models\FrontOffice\AccountTransaction;
use App\Models\FrontOffice\Reservation;
use App\Models\FrontOffice\Table;
use App\Models\FrontOffice\Drawer;
use Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;

class ReceiptController extends Controller
{
    public function index(){
        // $Receipts = Receipt::orderBy('id', 'desc')->where('status_id', 20)->get();
        $Receipts = Receipt::select('pos_reciept.*', 'u.username as made_by')
                    ->join('pos_cus_orders as pco', 'pco.id', '=', 'pos_reciept.order_id')
                    ->join('user as u', 'u.id', '=', 'pco.made_by')
                    ->where('pos_reciept.status_id', 20)
                    ->orderBy('id', 'DESC')
                    // ->whereDate('check_in_date', date('Y-m-d'))
                    ->get();

        $data = array();
        foreach($Receipts as $row){
            $orderId = $row->order_id;
            $Orders = Order::where('id', $orderId)->first();
            $tableId = $Orders->table_id;
            $table = Table::where('id', $tableId)->first();
            $OrderDetails = OrderDetail::where('pos_order_id', $orderId)->get();
            $dataOrder = array(
                'orderDetails'=>$OrderDetails
            );
            $data[] = array(
                'receiptId'=> $row->id,
                'made_by' => $row->made_by,
                'receipt_no' => $row->receipt_no,
                'order_id' => $row->order_id,
                'payment_method' => $row->PaymentMethod->name,
                'amount' => $row->amount,
                'currency_id' => $row->currency_id,
                'transaction_date' => $row->transaction_date,
                'description' => $row->description,
                'status_id' => $row->status_id,
                'tableInfo' => $table,
                'dataOrder'=>$Orders,
                'dataOrderDetail'=> $OrderDetails
            );
        }
        return response()->json(
        [
            'success'=> true,
            'message'=> 'Success',
            'data'=> $data,
            'total'=>count($Receipts)
        ], 200);
    }

    public function generateNextCode($flag_id){
        Nextcode::where('id', $flag_id)->update([
            'next_sequence' => DB::raw('next_sequence + 1')
        ]);
        $query = NextCode::where('id','=',$flag_id)->first();
        $data = array(
            'prefix' => $query->prefix,
            'suffix' => $query->suffix,
            'next_sequence' => $query->next_sequence
        );
        
        return $data;
    }

    public function store(Request $request){
        
        $input = $request->all();
        $drawer = Drawer::where('id', $input['drawerId'])
                  ->first();
        if($drawer){
            $rowNextCode = $this->generateNextCode(1);
            $checkTable = Order::where('table_id', $input['tableId'])
                        ->whereDate('check_in_date', '=', Carbon::today()->toDateString())
                        ->where('status_id', 10)->get();

            if(count($checkTable) == 1){
                Table::where('id', $input['tableId'])->update([
                    'status' => 1
                ]);
            }

            $query = Receipt::create([
                'receipt_no' => $rowNextCode['prefix'].$rowNextCode['next_sequence'].$rowNextCode['suffix'],
                'order_id' => $input['orderId'],
                'payment_method_id' => 1,
                'amount' => $input['subTotal'],
                'currency_id' => 1,
                'transaction_date' => date("Y-m-d H:i:s"),
                'description' => '',
                'status_id' => 20,
                'created_at' => date("Y-m-d H:i:s")
            ]);
            // AccountTransaction::create([
            //     'account_id' => 1,
            //     'receipt_id' => $query->id,
            //     'transaction_date' => date("Y-m-d H:i:s"),
            //     'debit_amount' => $input['grandTotal'],
            //     'credit_amount' => 0,
            //     'currency_id' => 1,
            //     'local_currency_credit' => 0,
            //     'local_currency_debit' => $input['grandTotal'],
            //     'exchange_rate' => $input['exchangeRate'],
            //     'is_transfered' => 1,
            //     'is_voided' => 0,
            //     'description' => '',
            //     'credit_card_no' => '',
            //     'out_let_id' => 0,
            //     'drawer_id' => $input['drawerId'],
            //     'eod_date' => date("Y-m-d H:i:s"),
            //     'created_at' => date("Y-m-d H:i:s"),
            //     'updated_at' => date("Y-m-d H:i:s")
            // ]);
            
            Order::where('id', $input['orderId'])->update(['drawer_id' => $input['drawerId'], 'status_id' => 11]);

            $data = array(
                'receipt_no' => $rowNextCode['prefix'].$rowNextCode['next_sequence'].$rowNextCode['suffix']
            );

            return response()->json(
                [
                    'success'=> true,
                    'message'=> 'Process payment completed',
                    'data'=> $data
                ], 200);
        }else{
            return response()->json(
                [
                    'success'=> false,
                    'message'=> 'Payment can not be proceed, or you may not have drawer!'
                ], 200);
        }
    }

    public function update(Request $request, $id){

    }

    public function show($id){
        $receipt = $this->getOrderData($id);
        return response()->json(
            [
                'success'=> true,
                'message'=> 'Process payment completed',
                'data' => $receipt
            ], 200);
    }

    public function getOrderData($id){
        $row = DB::table('pos_cus_orders as pco')
                  ->select('pco.*', 'c.name as customerName' ,'pr.receipt_no', 'pr.transaction_date', 'su.username as made_by_user')
                  ->join('pos_reciept as pr', 'pr.order_id','=', 'pco.id')
                  ->join('user as su', 'su.id', '=', 'pco.made_by')
                  ->join('customer as c', 'c.id', '=', 'pco.customer_id')
                  ->where('pr.id', $id)
                  ->first();
        $data = array();
        // foreach($Orders as $row){
            $orderId = $row->id;
            $tableId = $row->table_id;
            $OrderDetails = DB::table('pos_cus_order_details as cod') 
                            ->select('pk.printer_name', 'pk.ip_address as printer_ip', 'cod.*','i.id as item_id', 'i.item_barcode as item_barcode', 'i.name as item_name', 'u.name as uom')
                            // ->join('pos_menu_prices as mp', 'mp.id', '=', 'cod.menu_price_id')
                            ->join('item as i', 'i.id', '=', 'cod.item_id')
                            ->join('unit as u', 'u.id', '=', 'cod.unit_id')
                            ->join('item_sub_category as isc', 'isc.id', '=', 'i.item_sub_category_id')
                            ->join('pos_kitchens as pk', 'pk.id', '=' ,'isc.pos_kitchens_id')
                            ->where('cod.pos_order_id', $orderId)
                            // ->where('cod.is_addon', 0)
                            // ->where('cod.is_menu_set', 0)
                            ->get();
            $dataOrderDetails = array();
            foreach($OrderDetails as $OrderDetail){
                $OrderDetailId = $OrderDetail->id;
                $itemId = $OrderDetail->item_id;
                $itemToppings = DB::table('pos_cus_order_details as cod') 
                                    ->select('cod.*')
                                    // ->select('cod.*', 'ao.name as name')
                                    // ->join('pos_add_ons as ao', 'ao.id', '=', 'cod.pos_add_on_id')
                                    ->where('cod.pos_order_id', $orderId)
                                    // ->where('cod.is_addon', 1)
                                    ->where('cod.ref_order_detail_id', $OrderDetailId)
                                    ->get();

                $dataOrderDetails[] = array(
                    'printer_name' => $OrderDetail->printer_name,
                    'printer_ip' => $OrderDetail->printer_ip,
                    'itemName' => $OrderDetail->item_name,
                    'item_id' => $OrderDetail->item_id,
                    'pos_order_id' => $OrderDetail->pos_order_id,
                    'menu_price_id' => 0,//$OrderDetail->menu_price_id,
                    'pos_add_on_id' => 0,//$OrderDetail->pos_add_on_id,
                    'qty' => $OrderDetail->qty,
                    'abbr' => $OrderDetail->uom,
                    'item_barcode' => $OrderDetail->item_barcode,
                    'discount' => $OrderDetail->discount_amount,
                    'cost_amount' => $OrderDetail->cost_amount,
                    'unit_price' => $OrderDetail->unit_price,
                    'price' => $OrderDetail->price,
                    'is_addon' => 0,//$OrderDetail->is_addon,
                    'is_menu_set' => 0,//$OrderDetail->is_menu_set,
                    'is_cancel' => $OrderDetail->is_cancel,
                    'is_instant_discount' => 0,//$OrderDetail->is_instant_discount,
                    'is_happyhour_discount' => 0, //$OrderDetail->is_happyhour_discount,
                    'printed_qty' => $OrderDetail->printed_qty,
                    'note' => $OrderDetail->note,
                    'itemToppings'=> [] //$itemToppings
                    // 'topping' => 'topping'
                );
            }
            $table = Table::where('id', $tableId)->first();
            $data = array(
                'id' => $row->id,
                'receipt_no' => $row->receipt_no,
                'transaction_date' => $row->transaction_date,
                'order_no' => $row->order_no,
                'customerName' => $row->customerName,
                'table_id' => $tableId,
                'check_in_date' => $row->check_in_date,
                'check_out_date' => $row->check_out_date,
                // 'eods' => $row->eods,
                // 'estimate_delivery_time' => $row->estimate_delivery_time,
                'pax' => $row->pax,
                'is_void' => $row->is_void,
                'made_by' => $row->made_by,
                'made_by_user' => $row->made_by_user,
                'made_date' => $row->made_date,
                'is_printed_receipt' => $row->is_printed_receipt,
                'cancel_by' => $row->cancel_by,
                'discount' => $row->discount,
                'discount_amount' => $row->discount_amount,
                'vat_percentag' => $row->vat_percentag,
                'vat_amount' => $row->vat_amount,
                'service_tax_amount' => $row->service_tax_amount,
                'service_tax_percentage' => $row->service_tax_percentage,
                'sub_total_amount' => $row->sub_total_amount,
                'tax_percentage' => $row->tax_percentage,
                'tax_amount' => $row->tax_amount,
                'member_id' => $row->member_id,
                'order_type_id' => $row->order_type_id,
                // 'order_type' => $row->OrderType->name,
                'drawer_id' => $row->drawer_id,
                'printed_qty' => $row->printed_qty,
                'status_id' => $row->status_id,
                'ref_id' => $row->ref_id,
                'created_date' => $row->created_date,
                'updated_date' => $row->updated_date,
                'discount_method_id' => $row->discount_method_id,
                'discount_by' => $row->discount_by,
                'discount_profile_type_id' => $row->discount_profile_type_id,
                'tableInfo' =>  $table,
                'orderDetail' => $dataOrderDetails,
                // 'itemToppingAddOns' => $itemAddOns,
            );
        // }
        return $data;
    }

    public function edit($id){

    }

    public function destroy($id){
        
    }
}
