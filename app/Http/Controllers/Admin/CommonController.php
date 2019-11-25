<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\supplier_mgr\Supplier;
use App\Models\Admin\quotation\Quotation;
use App\Models\Admin\customer_mgr\customer\customer;
// use App\Helpers\getMenu;
// use App\user;
use DB;
use Validator;
use Auth;
use Session;
use Mail;

class CommonController extends Controller
{
	public $view_action="&nbsp;";
	  
	public function __construct()
	{
	  $menu_code = 'y5_s02';
	  Session::flash('menu_code',$menu_code);
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	*/

	public function index(){
		return view('admin.common.dashboard');
	}

	public function home(){
		$items = Item::Where('is_delete',0)->count();
		$suppliers = Supplier::Where('is_delete',0)->count();
		$quotations = Quotation::Where('is_cancel',null)->count();
		$customers = customer::Where('is_delete',0)->count();
	
		// return response()->json(['data' => $this->getItemBaseLocation()]);
	
		return view('admin.common.home')
				->with('items',$items)
				->with('suppliers',$suppliers)
				->with('quotations',$quotations)
				->with('customers',$customers)
				->with('getItemBaseLocations',$this->getItemBaseLocation())
				->with('view_action',$this->view_action);
	}

	public function getItemBaseLocation(){
		$query = DB::table("item_base_location as ibl")
				->JOIN('location as l','l.id','=','ibl.location_id')
				->JOIN('branch as b','b.id','=','ibl.branch_id')
				->GROUPBY('l.id')
				->GROUPBY('ibl.branch_id')
				->SELECT('ibl.location_id','ibl.branch_id','b.branch_name','l.name as location_name')
				->get();
		$data_array = array();
		foreach($query as $row){
			$data_array[] = array(
				'branch' => $row->branch_name,
				'location' => $row->location_name,
				'location_id' => $row->location_id,
				'getItemBaseLocations' => $this->getItemLocation($row->branch_id,$row->location_id)
			);
		}
		return $data_array;
	}

	public function getItemLocation($branch_id,$location_id){
		$default_branch = $branch_id;
		$filter_date = "2018-02-02";
		$adjustment_stock_items_stock_items = DB::select( 
			DB::raw("
			  SELECT i.name AS item_name, i.id as item_id ,u1.name AS unit,u1.id as unit_id, 
			  (SELECT ad.adjust_qty FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit1 AND ad.item_id=ic.item_id) as qty,
			  (SELECT ad.lost_qty FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit1 AND ad.item_id=ic.item_id) as lost_qty,
			  (SELECT ad.damage_qty FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit1 AND ad.item_id=ic.item_id) as damage_qty,
			  (SELECT ad.adjust_by FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit1 AND ad.item_id=ic.item_id) as adjust_by,
			  (SELECT ad.reason FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit1 AND ad.item_id=ic.item_id) as reason 

			  FROM tbl_item_conversion ic
			  JOIN tbl_item i ON i.id = ic.item_id
			  JOIN tbl_unit u1 ON u1.id = ic.unit1
			  JOIN tbl_item_base_location ibl ON ibl.item_id = i.id
			  WHERE ibl.location_id = ".$location_id."
			  GROUP BY ibl.item_id

			  UNION ALL

			  SELECT i.name AS item_name, i.id as item_id ,u2.name AS unit,u2.id as unit_id ,
			  (SELECT ad.adjust_qty FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit2 AND ad.item_id=ic.item_id) as qty,
			  (SELECT ad.lost_qty FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit2 AND ad.item_id=ic.item_id) as lost_qty,
			  (SELECT ad.damage_qty FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit2 AND ad.item_id=ic.item_id) as damage_qty ,

			  (SELECT ad.adjust_by FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit2 AND ad.item_id=ic.item_id) as adjust_by,

			  (SELECT ad.reason FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit2 AND ad.item_id=ic.item_id) as reason 

			  FROM tbl_item_conversion ic
			  JOIN tbl_item i ON i.id = ic.item_id
			  JOIN tbl_unit u2 ON u2.id = ic.unit2
			  JOIN tbl_item_base_location ibl ON ibl.item_id = i.id
			  WHERE ibl.location_id = ".$location_id."
			  GROUP BY ibl.item_id
			")
		);

		return $adjustment_stock_items_stock_items;
	}
	
}   

