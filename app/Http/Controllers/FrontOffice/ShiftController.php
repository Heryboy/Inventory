<?php

namespace App\Http\Controllers\FrontOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Models\FrontOffice\OrderType;
use App\Models\FrontOffice\Drawer;
use App\Models\FrontOffice\DrawerTransaction;
use App\User;
use Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;

class ShiftController extends Controller
{
    public function openShift(Request $request){
        $data = $request->all();
        $queryUser = User::where('id', $data['user_id'])->first();
        $boolen = false;
        $dataDrawer = '';
        if($queryUser){
            // $DrawerTransaction = DrawerTransaction::where('cash_drawer_id', $data['drawer_id'])
            //                     ->where('DATE_FORMAT(open_date,"%Y-%m-%d")', date('Y-m-d'))
            //                     ->first();
            $DrawerTransaction = DB::select(DB::raw("select * from tbl_cash_drawer_transaction where `close_by` IS NULL AND 
            DATE_FORMAT(open_date,'%Y-%m-%d') = DATE_FORMAT(now(),'%Y-%m-%d')"));   
            
            if($DrawerTransaction){
                $boolen = false;
                $msg = "Shift is already opened!";
            }else{
                $dataDrawer = Drawer::where('id', $data['drawer_id'])->first();
                DrawerTransaction::create([
                    'cash_drawer_id' => $data['drawer_id'],
                    'workshift_id' => $data['workshift_id'],
                    'open_by' => $data['open_by'],
                    'open_amount' => $data['open_amount'],
                    'open_date' => date("Y-m-d H:i:s"),
                    'created_at' => date("Y-m-d H:i:s")
                ]);

                $boolen = true;
                $msg = "Shift is opened.";
            }
        }else{
            $boolen = false;
            $msg = "Shift can not open, or you don't have drawer!";
        }
        return response()->json(
        [
            'success'=> $boolen,
            'message'=> $msg,
            'data' => $dataDrawer
        ], 200);
    }
    public function closeShift(Request $request){
        $data = $request->all();
        $queryUser = User::where('id', $data['user_id'])->first();
        $boolen = false;
        $dataDrawer = '';
        $query = '';
                
        if($queryUser){
            // $DrawerTransaction = DrawerTransaction::where('cash_drawer_id', $data['drawer_id'])
            //                     ->where('DATE_FORMAT(open_date,"%Y-%m-%d")', date('Y-m-d'))
            //                     ->first();
            $DrawerTransaction = DB::select(DB::raw("SELECT * FROM tbl_cash_drawer_transaction WHERE `close_by` IS NULL AND DATE_FORMAT(open_date,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d')"));   
            
            if($DrawerTransaction){
                $query = DB::Select(DB::raw("
                    UPDATE tbl_cash_drawer_transaction SET 
                    `close_by` = ".$data['user_id'].",
                    `close_amount` = '".$data['close_amount']."',
                    `actual_amount` = '".$data['actual_amount']."',
                    `diff_amount` = '".$data['diff_amount']."',
                    `description` = '".$data['description']."',
                    `close_date` =  '".date("Y-m-d H:i:s")."',
                    `updated_at` =  '".date("Y-m-d H:i:s")."'
                    WHERE `close_by` IS NULL AND 
                    DATE_FORMAT(open_date,'%Y-%m-%d') = DATE_FORMAT(now(),'%Y-%m-%d')"));
                
                $orderByDrawer = DB::Select(DB::raw("
                    SELECT 
                        i.item_code AS code,
                        i.name AS itemName,
                        SUM(cod.qty) AS qty_sold,
                        SUM((cod.price - cod.discount_amount) * cod.qty) AS total_item_price,
                        SUM(co.discount_amount) AS total_discount_amount,
                        SUM(co.tax_amount) AS total_tax_amount
                    FROM tbl_pos_cus_order_details cod
                    JOIN tbl_pos_cus_orders co ON co.id = cod.pos_order_id
                    JOIN tbl_item i ON i.id = cod.item_id
                    JOIN tbl_pos_reciept pr ON pr.order_id = co.id
                    WHERE co.drawer_id = ".$data['drawer_id']." 
                    AND DATE_FORMAT(pr.transaction_date,'%Y-%m-%d') = DATE_FORMAT(Now(),'%Y-%m-%d')
                    GROUP BY cod.item_id
                "));
                
                $total_amount = 0;
                $total_tax = 0;
                $total_discount = 0;
                foreach($orderByDrawer as $row){
                    $total_amount += $row->total_item_price;
                    $total_tax += $row->total_tax_amount;
                    $total_discount += $row->total_discount_amount;
                }
                
                $dataDrawer = array(
                    'dataOrder' => $orderByDrawer,
                    'cashier' => $queryUser->username,
                    'total_cash_in' => ($total_amount + $total_tax) - $total_discount,
                    'total_tax' => $total_tax,
                    'total_discount' => $total_discount,
                    'description' => $data['description'],
                    'open_shift_balance' => $data['open_amount'],
                    'actual_amount' => $data['actual_amount'],
                    'close_shift_balance' => $data['close_amount']
                );

                $boolen = true;
                $msg = "Shift is closed.";
                
            }else{
                $boolen = false;
                $msg = "Shift is already closed!";
            }
        }else{
            $boolen = false;
            $msg = "Shift can't be closed, or you don't have drawer!";
        }
        return response()->json(
        [
            'success'=> $boolen,
            'message'=> $msg,
            'data' => $dataDrawer
        ], 200);
    }
}