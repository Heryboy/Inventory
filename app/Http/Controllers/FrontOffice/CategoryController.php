<?php

namespace App\Http\Controllers\FrontOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Models\FrontOffice\Category;
use App\Models\FrontOffice\SubCategory;
use App\Models\FrontOffice\Item;
use Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    public function category(){
        $Categories = Category::where('is_delete','=', 0)->get();
        $data = array();
        foreach($Categories as $row){
            $catId = $row->id;
            $SubCategories = DB::table('item_sub_category as sc')
                             ->select('sc.*', 'pk.printer_name', 'pk.ip_address')
                             ->where('is_delete', '=', 0)
                             ->Join('pos_kitchens as pk','pk.id','=','sc.pos_kitchens_id')
                             ->where('sc.item_category_id', $catId)
                             ->get();
            $subCatData = array();
            foreach($SubCategories as $subCat){
                $subCatId = $subCat->id;
                $Items = DB::table('item as i')
                         ->select('i.*', 'u.name as uom', 'is.abbr')
                         ->join('unit as u', 'i.default_unit', '=', 'u.id')
                         ->join('item_size as is', 'i.item_size_id', '=','is.id')
                         ->where('i.is_delete','=',0)
                         ->where('i.item_sub_category_id', $subCatId)->get();
                $itemData = array();
                foreach($Items as $ItemRow){
                    $menuId = $ItemRow->id;
            //         // $ItemAddOn = DB::table('pos_rel_menu_add_ons as mao')
            //         //              ->Join('pos_add_ons as ao', 'ao.id', '=', 'mao.pos_add_ons_id')
            //         //              ->where('mao.pos_menus_id',$menuId)
            //         //              ->get();
                    
            //         // $ItemSets = DB::table('pos_rel_menu_set_menus as sm')
            //         //              ->Join('pos_menus as m', 'm.id', '=', 'sm.set_menu_id')
            //         //              ->where('sm.pos_menus_id', $menuId)
            //         //              ->get();
                    
            //         // $ItemPrices = DB::table('pos_menu_prices as mp')
            //         //               ->select('mp.*', 'u.abbr', 'u.name')
            //         //               ->Join('uoms as u', 'u.id', '=', 'mp.uoms_id')
            //         //               ->Where('mp.pos_menus_id', $menuId)
            //         //               ->get();
        
                    $itemData[] = array(
                        'id' => $ItemRow->id,
                        'name' => $ItemRow->name,
                        'image' => $ItemRow->image,
                        // 'is_menu_set' => $ItemRow->is_menu_set,
                        'is_active' => $ItemRow->is_active,
                        'description' => '',
                        'created_at' => $ItemRow->created_at,
                        'updated_at' => $ItemRow->updated_at,
                        'pos_sub_categories_id' => $ItemRow->item_sub_category_id,
                        'created_by' => $ItemRow->created_by,
                        'itemPrice' => array([
                            'item_id' => $ItemRow->id,
                            'abbr' => $ItemRow->abbr,
                            'uom' => $ItemRow->uom,
                            'unit_id' => $ItemRow->default_unit,
                            'item_barcode' => $ItemRow->item_barcode,
                            'price' => $ItemRow->price,
                            'cost' => $ItemRow->cost
                        ]),
                        // 'itemPrice' => $ItemPrices,
                        'discount' => 0,
            //         //     'itemToppingAddOns' => $ItemAddOn,
            //         //     'itemSets' => $ItemSets
                    );                
                }

                $subCatData[] = array(
                    'id' => $subCat->id,
                    'pos_kitchens_id' => $subCat->pos_kitchens_id,
                    'printer_name' => $subCat->printer_name,
                    'printer_ip' => $subCat->ip_address,
                    'pos_categories_id' => $subCat->item_category_id,
                    'name' => $subCat->name,
                    'image' => $subCat->image,
                    // 'seq_no' => $subCat->seq_no,
                    // 'description' => $subCat->description,
                    // 'is_active' => $subCat->is_active,
                    // 'is_deleted' => $subCat->is_deleted,
                    // 'created_at' => $subCat->created_at,
                    // 'updated_at' => $subCat->updated_at,
                    'itemData' => $itemData
                );
            }
            $data[] = array(
                'id' => $row->id,
                'sqe_no' => $row->sqe_no,
                'category_flag' => $row->category_flag,
                'name' => $row->item_category_name,
                'image' => $row->image,
                'description' => $row->description,
                'is_active' => $row->is_active,
                'is_deleted' => $row->is_deleted,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
                'subCategories' => $subCatData
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

    public function subCategory($catId){
        $SubCategories = SubCategory::where('pos_categories_id', $catId)->get();
        return response()->json(
        [
            'success'=> true,
            'message'=> 'Success',
            'data'=> $SubCategories,
            'total'=>count($SubCategories)
        ], 200);
    }
}
