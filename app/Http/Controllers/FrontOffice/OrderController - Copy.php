<?php

namespace App\Http\Controllers\FrontOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Models\FrontOffice\Order;
use App\Models\FrontOffice\OrderDetail;
use App\Models\FrontOffice\Table;
use App\Models\FrontOffice\NextCode;
use Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{

    public function index(){
        $data = $this->getOrderData(0);
        return response()->json(
        [
            'success'=> true,
            'message'=> 'Success',
            'data'=> $data,
            'total'=>count($data)
        ], 200);
    }

    public function generateNextCode($flag_id){
        Nextcode::where('id', $flag_id)->update([
            'next_code' => DB::raw('next_code + 1')
        ]);
        $query = NextCode::where('id',$flag_id)->first();
        $data = array(
            'prefix' => $query->prefix,
            'suffix' => $query->suffix,
            'next_code' => $query->next_code
        );
        
        return $data;
    }

    public function store(Request $request){
        $data = $request->all();
        $rowNextCode = $this->generateNextCode(1);
        $query = Order::create([
            'order_no' => $rowNextCode['prefix'].$rowNextCode['next_code'].$rowNextCode['suffix'],
            'customer_id' => '0',
            'table_id' => $data['table_id'],
            'check_in_date' => date("Y-m-d H:i:s"),
            'pax' => $data['pax'],
            'is_void' => 0,
            'made_by' => $data['made_by'],
            'made_date' => date("Y-m-d H:i:s"),
            'discount' => $data['discount'],
            'discount_amount' => $data['discount_amount'],
            'vat_percentag' => $data['vat_percentag'],
            'vat_amount' => $data['vat_amount'],
            'service_tax_amount' => $data['service_tax_amount'],
            'service_tax_percentage' => $data['service_tax_percentage'],
            'sub_total_amount' => $data['sub_total_amount'],
            'member_id' => $data['member_id'],
            'order_type_id' => $data['order_type_id'],
            'drawer_id' => $data['drawer_id'],
            'status_id' => $data['status_id'],
            'created_date' => date("Y-m-d H:i:s"),
            'updated_date' => date("Y-m-d H:i:s")
        ]);
        $orderId = $query->id;
        if(count($data['menu']) > 0){
            for($i = 0; $i < count($data['menu']); $i++){
                $orderDetail = OrderDetail::create([
                                    'pos_order_id' => $orderId,
                                    'menu_price_id' => $data['menu'][$i]['menu_price_id'],
                                    'qty' => $data['menu'][$i]['qty'],
                                    'cost_amount' => $data['menu'][$i]['cost_amount'],
                                    'unit_price' => $data['menu'][$i]['unit_price'],
                                    'price' => $data['menu'][$i]['unit_price'],
                                    'is_addon' => 0,
                                    'is_menu_set' => 0,
                                    'printed_qty' => 1,
                                    'is_instant_discount' => 0,
                                    'is_happyhour_discount' => 0,
                                    'created_date' => date('Y-m-d H:i:s'),
                                    'discount_amount' => $data['menu'][$i]['discount_amount'],
                                    'note' => $data['menu'][$i]['note'],
                                ]);
                $orderDetailId = $orderDetail->id;
                $menu = $data['menu'][$i]['menu_topping'];
                if(count($menu) > 0){
                    for($j = 0; $j < count($menu); $j++){
                        OrderDetail::create([
                            'pos_order_id' => $orderId,
                            'pos_add_on_id' => $menu[$j]['pos_add_on_id'],
                            'qty' => $menu[$j]['qty'],
                            'price' => $menu[$j]['price'],
                            'printed_qty' => 1,
                            'is_addon' => 1,                        
                            'is_instant_discount' => 0,
                            'is_happyhour_discount' => 0,
                            'ref_order_detail_id' => $orderDetailId,
                            'created_date' => date('Y-m-d')
                        ]);
                    }                    
                }
            }    
        }

        if($data['table_id'] > 0){
            Table::where('id', $data['table_id'])->update([
                'status' => 3
            ]);
        }

        return response()->json(
            [
                'success'=> true,
                'message'=> 'Success'
            ], 200);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $table = Order::select('table_id')->where('id', $id)->where('status_id', 10)->first();        
        if(isset($table)){
            Table::where('id', $table->table_id)->update([
                'status' => 1
            ]);
            Table::where('id', $data['table_id'])->update([
                'status' => 3
            ]);
        }
        $query = Order::where('id', $id)->update([
            'customer_id' => '0',
            'table_id' => $data['table_id'],
            'pax' => $data['pax'],
            'is_void' => 0,
            'discount' => $data['discount'],
            'discount_amount' => $data['discount_amount'],
            'vat_percentag' => $data['vat_percentag'],
            'vat_amount' => $data['vat_amount'],
            'service_tax_amount' => $data['service_tax_amount'],
            'service_tax_percentage' => $data['service_tax_percentage'],
            'sub_total_amount' => $data['sub_total_amount'],
            'member_id' => $data['member_id'],
            'order_type_id' => $data['order_type_id'],
            'drawer_id' => $data['drawer_id'],
            'status_id' => $data['status_id'],
            'updated_date' => date("Y-m-d H:i:s")
        ]);
        $orderId = $id;
        if(count($data['menu']) > 0){
            for($i = 0; $i < count($data['menu']); $i++){
                $orderDetail = OrderDetail::create([
                                    'pos_order_id' => $orderId,
                                    'menu_price_id' => $data['menu'][$i]['menu_price_id'],
                                    'qty' => $data['menu'][$i]['qty'],
                                    'cost_amount' => $data['menu'][$i]['cost_amount'],
                                    'unit_price' => $data['menu'][$i]['unit_price'],
                                    'price' => $data['menu'][$i]['unit_price'],
                                    'is_addon' => 0,
                                    'is_menu_set' => 0,
                                    'printed_qty' => 1,
                                    'is_instant_discount' => 0,
                                    'is_happyhour_discount' => 0,
                                    'created_date' => date('Y-m-d H:i:s'),
                                    'note' => $data['menu'][$i]['note'],
                                ]);
                $orderDetailId = $orderDetail->id;
                $menu = $data['menu'][$i]['menu_topping'];
                if(count($menu) > 0){
                    for($j = 0; $j < count($menu); $j++){
                        OrderDetail::create([
                            'pos_order_id' => $orderId,
                            'pos_add_on_id' => $menu[$j]['pos_add_on_id'],
                            'qty' => $menu[$j]['qty'],
                            'price' => $menu[$j]['price'],
                            'printed_qty' => 1,
                            'is_addon' => 1,                        
                            'is_instant_discount' => 0,
                            'is_happyhour_discount' => 0,
                            'ref_order_detail_id' => $orderDetailId,
                            'created_date' => date('Y-m-d')
                        ]);
                    }                    
                }
            }    
        }
        return response()->json(
            [
                'success'=> true,
                'message'=> 'Success'
            ], 200);
    }

    public function splitBill(Request $request, $id){
        $data = $request->all(); 
        $splitItems = $data['splitItems'];
        Order::where('id', $data['order_id'])->delete();
        for($i = 0; $i < count($splitItems); $i++){
            $rowNextCode = $this->generateNextCode(1);
            $query = Order::create([
                'order_no' => $rowNextCode['prefix'].$rowNextCode['next_code'].$rowNextCode['suffix'],
                'customer_id' => '0',
                'table_id' => $data['table_id'],
                'check_in_date' => date("Y-m-d H:i:s"),
                'pax' => 0,
                'is_void' => 0,
                'made_by' => $data['made_by'],
                'made_date' => date("Y-m-d H:i:s"),
                'discount' => $splitItems[$i]['discount'],
                'discount_amount' => $splitItems[$i]['discount_amount'],
                'vat_percentag' => $splitItems[$i]['vat_percentag'],
                'vat_amount' => $splitItems[$i]['vat_amount'],
                'service_tax_amount' => $splitItems[$i]['service_tax_amount'],
                'service_tax_percentage' => $splitItems[$i]['service_tax_percentage'],
                'sub_total_amount' => $splitItems[$i]['sub_total_amount'],
                'member_id' => 0,
                'order_type_id' => $data['order_type_id'],
                'drawer_id' => $data['drawer_id'],
                'status_id' => 10,
                'created_date' => date("Y-m-d H:i:s"),
                'updated_date' => date("Y-m-d H:i:s")
            ]);
            $newOrderId = $query->id;
            $splitItemLists = $splitItems[$i]['splitItemLists'];
            for($j = 0; $j < count($splitItemLists); $j++){
                $queryOrderDetail = OrderDetail::where('pos_order_id', $data['order_id'])
                                    ->where('menu_price_id', $splitItemLists[$j]['menu_price_id'])
                                    ->update(['pos_order_id' => $newOrderId]);
                
                if(count($splitItemLists[$j]['itemToppings']) > 0){
                    for($k = 0; $k < count($splitItemLists[$j]['itemToppings']); $k++){
                        OrderDetail::where('pos_order_id', $data['order_id'])
                                    ->where('pos_add_on_id', $splitItemLists[$j]['itemToppings'][$k]['pos_add_on_id'])
                                    ->update(['pos_order_id' => $newOrderId]);
                    }
                }
            }

        }
        return response()->json(
            [
                'success'=> true,
                'message'=> 'Success'
            ], 200);
    }

    public function getVoidOrder(){
        $data = $this->getOrderData(1);
        return response()->json(
            [
                'success'=> true,
                'message'=> 'Success',
                'data' => $data,
                'total' => count($data)
            ], 200);
    }

    public function getOrderByTable($id){
        $table_id = $id;
        $Orders = Order::orderBy('id','desc')->where('table_id', $table_id)->where('is_void', 0)->where('status_id', 10)->get();
        $data = array();
        foreach($Orders as $row){
            $orderId = $row->id;
            $tableId = $row->table_id;
            $OrderDetails = DB::table('pos_cus_order_details as cod') 
                            ->select('cod.*','m.id as menu_id', 'mp.code', 'm.name as item_name', 'u.abbr as uom')
                            ->join('pos_menu_prices as mp', 'mp.id', '=', 'cod.menu_price_id')
                            ->join('uoms as u', 'u.id', '=', 'mp.uoms_id')
                            ->join('pos_menus as m', 'm.id', '=', 'mp.pos_menus_id')
                            ->where('cod.pos_order_id', $orderId)
                            ->where('cod.is_addon', 0)
                            ->where('cod.is_menu_set', 0)
                            ->get();
            $dataOrderDetails = array();
            foreach($OrderDetails as $OrderDetail){
                $OrderDetailId = $OrderDetail->id;
                $menuId = $OrderDetail->menu_id;
                $itemToppings = DB::table('pos_cus_order_details as cod') 
                                    ->select('cod.*', 'ao.name as name')
                                    ->join('pos_add_ons as ao', 'ao.id', '=', 'cod.pos_add_on_id')
                                    ->where('cod.pos_order_id', $orderId)
                                    ->where('cod.is_addon', 1)
                                    ->where('cod.ref_order_detail_id', $OrderDetailId)
                                    ->get();

                $dataOrderDetails[] = array(
                    'itemName' => $OrderDetail->item_name,
                    'pos_order_id' => $OrderDetail->pos_order_id,
                    'menu_price_id' => $OrderDetail->menu_price_id,
                    'pos_add_on_id' => $OrderDetail->pos_add_on_id,
                    'qty' => $OrderDetail->qty,
                    'abbr' => $OrderDetail->uom,
                    'code' => $OrderDetail->code,
                    'cost_amount' => $OrderDetail->cost_amount,
                    'unit_price' => $OrderDetail->unit_price,
                    'price' => $OrderDetail->price,
                    'is_addon' => $OrderDetail->is_addon,
                    'is_menu_set' => $OrderDetail->is_menu_set,
                    'is_cancel' => $OrderDetail->is_cancel,
                    'is_instant_discount' => $OrderDetail->is_instant_discount,
                    'is_happyhour_discount' => $OrderDetail->is_happyhour_discount,
                    'printed_qty' => $OrderDetail->printed_qty,
                    'note' => $OrderDetail->note,
                    'itemToppings'=> $itemToppings
                    // 'topping' => 'topping'
                );
            }
            // $itemAddOns = DB::table('pos_cus_order_details as cod') 
            //                 ->select('cod.*', 'm.name as item_name', 'u.abbr as uom')
            //                 ->join('pos_menu_prices as mp', 'mp.id', '=', 'cod.menu_price_id')
            //                 ->join('uoms as u', 'u.id', '=', 'mp.uoms_id')
            //                 ->join('pos_menus as m', 'm.id', '=', 'mp.pos_menus_id')
            //                 ->where('cod.pos_order_id', $orderId)
            //                 ->where('cod.is_addon', 1)
            //                 ->where('cod.is_menu_set', 0)
            //                 ->get();
            // $orderDetailArray = array();
            // foreach($OrderDetails as $orderData){
            //     $orderDetailArray[] = array(
            //         'itemAddOn' => '';
            //     );
            // }
            $table = Table::where('id', $tableId)->first();
            $data[] = array(
                'id' => $row->id,
                'order_no' => $row->order_no,
                'table_id' => $tableId,
                'check_in_date' => $row->check_in_date,
                'check_out_date' => $row->check_out_date,
                'eods' => $row->eods,
                'estimate_delivery_time' => $row->estimate_delivery_time,
                'pax' => $row->pax,
                'is_void' => $row->is_void,
                'made_by' => $row->made_by,
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
                'order_type' => $row->OrderType->name,
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
        }

        return response()->json(
        [
            'success'=> true,
            'message'=> 'Success',
            'data'=> $data,
            'total'=>count($data)
        ], 200);
    }

    public function getOrderData($status){
        $Orders = Order::orderBy('id','desc')->where('is_void', $status)->where('status_id', 10)->get();
        $data = array();
        foreach($Orders as $row){
            $orderId = $row->id;
            $tableId = $row->table_id;
            $OrderDetails = DB::table('pos_cus_order_details as cod') 
                            ->select('cod.*','m.id as menu_id', 'mp.code', 'm.name as item_name', 'u.abbr as uom')
                            ->join('pos_menu_prices as mp', 'mp.id', '=', 'cod.menu_price_id')
                            ->join('uoms as u', 'u.id', '=', 'mp.uoms_id')
                            ->join('pos_menus as m', 'm.id', '=', 'mp.pos_menus_id')
                            ->where('cod.pos_order_id', $orderId)
                            ->where('cod.is_addon', 0)
                            ->where('cod.is_menu_set', 0)
                            ->get();
            $dataOrderDetails = array();
            foreach($OrderDetails as $OrderDetail){
                $OrderDetailId = $OrderDetail->id;
                $menuId = $OrderDetail->menu_id;
                $itemToppings = DB::table('pos_cus_order_details as cod') 
                                    ->select('cod.*', 'ao.name as name')
                                    ->join('pos_add_ons as ao', 'ao.id', '=', 'cod.pos_add_on_id')
                                    ->where('cod.pos_order_id', $orderId)
                                    ->where('cod.is_addon', 1)
                                    ->where('cod.ref_order_detail_id', $OrderDetailId)
                                    ->get();

                $dataOrderDetails[] = array(
                    'itemName' => $OrderDetail->item_name,
                    'pos_order_id' => $OrderDetail->pos_order_id,
                    'menu_price_id' => $OrderDetail->menu_price_id,
                    'pos_add_on_id' => $OrderDetail->pos_add_on_id,
                    'qty' => $OrderDetail->qty,
                    'abbr' => $OrderDetail->uom,
                    'code' => $OrderDetail->code,
                    'discount' => $OrderDetail->discount_amount,
                    'cost_amount' => $OrderDetail->cost_amount,
                    'unit_price' => $OrderDetail->unit_price,
                    'price' => $OrderDetail->price,
                    'is_addon' => $OrderDetail->is_addon,
                    'is_menu_set' => $OrderDetail->is_menu_set,
                    'is_cancel' => $OrderDetail->is_cancel,
                    'is_instant_discount' => $OrderDetail->is_instant_discount,
                    'is_happyhour_discount' => $OrderDetail->is_happyhour_discount,
                    'printed_qty' => $OrderDetail->printed_qty,
                    'note' => $OrderDetail->note,
                    'itemToppings'=> $itemToppings
                    // 'topping' => 'topping'
                );
            }
            // $itemAddOns = DB::table('pos_cus_order_details as cod') 
            //                 ->select('cod.*', 'm.name as item_name', 'u.abbr as uom')
            //                 ->join('pos_menu_prices as mp', 'mp.id', '=', 'cod.menu_price_id')
            //                 ->join('uoms as u', 'u.id', '=', 'mp.uoms_id')
            //                 ->join('pos_menus as m', 'm.id', '=', 'mp.pos_menus_id')
            //                 ->where('cod.pos_order_id', $orderId)
            //                 ->where('cod.is_addon', 1)
            //                 ->where('cod.is_menu_set', 0)
            //                 ->get();
            // $orderDetailArray = array();
            // foreach($OrderDetails as $orderData){
            //     $orderDetailArray[] = array(
            //         'itemAddOn' => '';
            //     );
            // }
            $table = Table::where('id', $tableId)->first();
            $data[] = array(
                'id' => $row->id,
                'order_no' => $row->order_no,
                'table_id' => $tableId,
                'check_in_date' => $row->check_in_date,
                'check_out_date' => $row->check_out_date,
                'eods' => $row->eods,
                'estimate_delivery_time' => $row->estimate_delivery_time,
                'pax' => $row->pax,
                'is_void' => $row->is_void,
                'made_by' => $row->made_by,
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
                'order_type' => $row->OrderType->name,
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
        }
        return $data;
    }

    public function voidOrder(Request $request){
        $input = $request->all();
        $query = Order::where('id', $input['order_id'])->update(['is_void' => 1, 'made_by' => $input['made_by'], 'remark' => $input['remark']]);
        $boolen = false;
        if($query){
            $boolen = true;
            $msg = "Data has been voided.";
        }else{
            $boolen = false;
            $msg = "Problem, while trying to update!";
        }
        

        return response()->json(
            [
                'success'=> $boolen,
                'message'=> $msg
            ], 200);
    }
}
