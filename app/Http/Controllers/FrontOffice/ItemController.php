<?php

namespace App\Http\Controllers\FrontOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Models\FrontOffice\Category;
use App\Models\FrontOffice\SubCategory;
use App\Models\FrontOffice\Item;
use App\Models\FrontOffice\ItemAddOn;
use App\Models\Admin\stock_mgr\AdjustmentStockDate;
use Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;

class ItemController extends Controller
{

    public function getItem($subCatId){
        $Items = Item::where('pos_sub_categories_id', $subCatId)->get();
        $data = array();
        foreach($Items as $row){
            $menuId = $row->id;
            $ItemAddOn = DB::table('pos_rel_menu_add_ons as mao')
                         ->Join('pos_add_ons as ao', 'ao.id', '=', 'mao.pos_add_ons_id')
                         ->where('mao.pos_menus_id',$menuId)
                         ->get();
            
            $ItemSets = DB::table('pos_rel_menu_set_menus as sm')
                         ->Join('pos_menus as m', 'm.id', '=', 'sm.set_menu_id')
                         ->where('sm.pos_menus_id',$menuId)
                         ->get();

            $ItemPrices = DB::table('pos_menu_prices as mp')
                          ->select('mp.*', 'u.abbr', 'u.name')
                          ->Join('uoms as u', 'u.id', '=', 'mp.pos_menus_id')
                          ->Where('mp.pos_menus_id', $menuId)
                          ->get();

            $data[] = array(
                'id' => $row->id,
                'name' => $row->name,
                'is_menu_set' => $row->is_menu_set,
                'is_active' => $row->is_active,
                'description' => $row->description,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
                'pos_sub_categories_id' => $row->pos_sub_categories_id,
                'created_by' => $row->created_by,
                'itemPrice' => $ItemPrices,
                'itemToppingAddOns' => $ItemAddOn,
                'itemSets' => $ItemSets
            );
        }
        return response()->json(
        [
            'success'=> true,
            'message'=> 'Success',
            'data'=> $data,
            'total'=>count($Items)
        ], 200);
    }

    public function getItemByCode(Request $request){
        $query = DB::table('item as i')
                 ->select('pk.printer_name','is.abbr', 'pk.ip_address as printer_ip' ,'i.default_unit', 'i.id as item_id','i.cost as cost', 'i.name', 'i.item_barcode as item_barcode', 'i.price', 'u.name as uom')
                 ->join('item_sub_category as psc', 'psc.id', '=', 'i.item_sub_category_id')
                 ->join('pos_kitchens as pk', 'pk.id', '=' ,'psc.pos_kitchens_id')
                 ->join('unit as u','u.id', '=' ,'i.default_unit')
                 ->join('item_size as is', 'i.item_size_id', '=','is.id')
                 ->where('i.item_barcode', '=', $request['item_code'])
                 ->first();
        
        $dataOrder = '';
        if($query){
            $dataOrder = array(
                            'printer_name' => $query->printer_name,
                            'printer_ip' => $query->printer_ip,
                            'item_id' => $query->item_id,
                            'unit_id' => $query->default_unit,
                            'cost' => $query->cost,
                            'itemName' => $query->name,//this.product['name'],
                            'item_barcode' => $query->item_barcode,
                            'abbr' => $query->abbr,
                            'qty' => 1,//this.model.itemQty,
                            // 'abbr' => $query->abbr,//this.product['itemPrice'][0]['abbr'],
                            'unit_price' => $query->price,//this.product['itemPrice'][0]['price'],
                            'price' => $query->price,//this.product['itemPrice'][0]['price'],
                            'itemToppings' => []//this.itemToppings
                        );
        }
        return response()->json(
            [
                'success'=> true,
                'message'=> 'Success',
                'data'=> $dataOrder
            ], 200);
    }

    public function inventory(){
        $lastDoAdjustmentStock = AdjustmentStockDate::orderBy('id', 'desc')->first();
        $branchid = 1;
        $start_date = $lastDoAdjustmentStock->adjust_stock_date;
        $end_date = date('Y-m-d');
        $ItemInStocks = DB::select( 
        DB::raw("
            SELECT DISTINCT 
            itb.item_id,
            i.item_code,
            i.item_barcode,
            i.name AS item_name, 
            i.id as item_id,
            u1.name AS unit,
            u1.id as unit_id,

            (SELECT DISTINCT SUM(POD.qty) FROM ".env('DB_PREFIX')."purchase_order PO JOIN ".env('DB_PREFIX')."purchase_order_detail POD ON PO.id=POD.po_id  WHERE DATE_FORMAT(PO.po_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND POD.item_id=itb.item_id AND POD.unit_id=u1.id) as purchase_qty,

            (SELECT DISTINCT SUM(TD.qty) FROM ".env('DB_PREFIX')."transfer T JOIN ".env('DB_PREFIX')."transfer_detail TD ON T.id=TD.transfer_id WHERE DATE_FORMAT(T.transfer_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND T.is_transfered = 1 AND T.is_received = 1 AND TD.item_id=itb.item_id AND TD.unit_id=u1.id) as transfer_qty,

            (SELECT DISTINCT SUM(adjust_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u1.id) as adjust_qty,

            (SELECT DISTINCT SUM(lost_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u1.id) as lost_qty,

            (SELECT DISTINCT SUM(damage_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u1.id) as damage_qty,

            (SELECT DISTINCT SUM(PCOD.qty) FROM ".env('DB_PREFIX')."pos_cus_orders PCO JOIN ".env('DB_PREFIX')."pos_cus_order_details PCOD ON PCO.id=PCOD.pos_order_id WHERE DATE_FORMAT(PCO.check_out_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND PCO.status_id=4 AND PCOD.item_id=itb.item_id AND PCOD.unit_id=u1.id) as sale_qty,

            (SELECT DISTINCT SUM(SOD.sale_order_qty) FROM ".env('DB_PREFIX')."sale_order SO JOIN ".env('DB_PREFIX')."sale_order_detail SOD ON SO.id=SOD.sale_order_id  WHERE DATE_FORMAT(SO.sale_order_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND SOD.item_id=itb.item_id AND SOD.unit_id=u1.id) as sale_order_qty,

            (SELECT DISTINCT SUM(RD.qty) FROM ".env('DB_PREFIX')."return R JOIN ".env('DB_PREFIX')."return_detail RD ON R.id = RD.return_id  WHERE DATE_FORMAT(R.return_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND R.is_returned = 1 AND RD.item_id=itb.item_id AND RD.unit_id=u1.id) as return_qty

            FROM ".env('DB_PREFIX')."item_conversion ic
            LEFT JOIN ".env('DB_PREFIX')."item i ON i.id = ic.item_id
            LEFT JOIN ".env('DB_PREFIX')."unit u1 ON u1.id = ic.unit1
            LEFT JOIN ".env('DB_PREFIX')."item_base_branch itb ON itb.item_id = i.id
            WHERE itb.branch_id=".(int)$branchid."
            GROUP BY itb.item_id
        "));

        return response()->json(
            [
                'success'=> true,
                'message'=> 'Success',
                'data'=> $ItemInStocks
            ], 200);
    }
    
}
