<?php namespace App\Http\Controllers\Admin\stock_mgr\actual_stock;

use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\stock_mgr\ActualStock;
use App\Models\Admin\supplier_mgr\Supplier;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\setup_mgr\ItemConversion;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\ItemSubCategory;
use App\Models\Admin\setup_mgr\Currency;
use App\Models\Admin\setup_mgr\ItemRelated;
use App\Models\Admin\setup_mgr\ItemType;
use App\Models\Admin\setup_mgr\ItemStatus;
use App\Models\Admin\setup_mgr\Unit;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
// use Request;
use Session;

class ActualStockController extends Controller
{
  public $view_title = "stock_mgr/actual_stock.entry_title";
  public $action = "stock_mgr/actual_stock.entry_edit";
  
  public function __construct()
  {
     
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
  */

  public function index(Request $request)
  { 
    
    $input = $request->all();
    $default_branch = $this->DefaultBranch();
    $filter_name='';
    $item_subcatID = 0;
    $where_clause = "";
    $filter_date=date('Y-m-d');
    if(isset($input['filter_name']) && isset($input['filter_date'])){
      $filter_name = $input['filter_name'];
      $filter_date = $input['filter_date'];
    }
    if(isset($input['item_subcatID'])){
      $item_sub_category_id = $input['item_subcatID'];
      $where_clause .= 'WHERE isc.id = '.(int)$item_sub_category_id.'';
    }
    // $actual_stock_items = DB::select( 
    //                       DB::raw("
    //                         SELECT i.item_code ,i.name AS item_name, i.id as item_id ,u1.name AS unit,u1.id as unit_id, (SELECT qty FROM `tbl_actual_stock` WHERE `branch_id`=".(int)$default_branch." AND `date` LIKE '%".$filter_date."%' AND unit_id=ic.unit1 AND item_id=ic.item_id) as hello, ic.qty1 AS qty FROM tbl_item_conversion ic
    //                         JOIN tbl_item i ON i.id = ic.item_id
    //                         JOIN tbl_unit u1 ON u1.id = ic.unit1
    //                         UNION ALL
    //                         SELECT i.item_code, i.name AS item_name, i.id as item_id ,u2.name AS unit,u2.id as unit_id ,(SELECT qty FROM `tbl_actual_stock` WHERE `branch_id`=".(int)$default_branch." AND `date` LIKE '%".$filter_date."%' AND unit_id=ic.unit2 AND item_id=ic.item_id) as hello, ic.qty2 AS qty FROM tbl_item_conversion ic
    //                         JOIN tbl_item i ON i.id = ic.item_id
    //                         JOIN tbl_unit u2 ON u2.id = ic.unit2
    //                       ")
    //                     );
    $actual_stock_items = DB::select( 
      DB::raw("
        SELECT i.item_code ,i.name AS item_name, i.id as item_id ,u1.name AS unit,u1.id as unit_id, 
        (SELECT SUM(qty) FROM `tbl_actual_stock` WHERE `branch_id`=".(int)$default_branch." 
        AND `date` LIKE '%".$filter_date."%' 
        AND unit_id=ic.unit1 
        AND item_id=ic.item_id) as hello, ic.qty1 AS qty 
        FROM tbl_item_conversion ic
        JOIN tbl_item i ON i.id = ic.item_id
        JOIN tbl_item_sub_category isc ON isc.id = i.item_sub_category_id
        JOIN tbl_unit u1 ON u1.id = ic.unit1
        ".$where_clause."
        GROUP BY item_id, unit_id
      ")
    );

    $getData_arr = $this->getData();
    return view('admin.stock_mgr.actual_stock.index')
              ->with('actual_stock_items',$actual_stock_items)
              ->with('getData_arr',$getData_arr)
              ->with('filter_date',$filter_date)
              ->with('filter_name',$filter_name);

  }


  // getBarcode
  public function getBarcode(Request $request){
    $input = Request::all();
    $Item = Item::Where('id',$input['item_id'])->first();
    return json_encode($Item->item_barcode);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
    $item_sub_category = ItemSubCategory::Where('is_delete',0)->Lists('name','id');
    $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
    $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
    $currency = Currency::lists('name','id');
    $units = Unit::lists('name','id');
    $unitGroups = Unit::all();
    $getData_arr = $this->getData();
    return view('admin.setup_mgr.item.form')  
              ->with('item_category',$item_category)
              ->with('item_sub_category',$item_sub_category)
              ->with('item_type',$item_type)
              ->with('item_status',$item_status)
              ->with('currency',$currency)
              ->with('getData_arr',$getData_arr)
              ->with('units',$units)
              ->with('unitGroups',$unitGroups)
              ->with('action',$this->action)
              ->with('view_title',$this->view_title);
  }

  // getData
  public function getData(){
    $ItemCategories = ItemCategory::Where('is_delete',0)->OrderBy('item_category_name')->get();
    $category_arr = array();
    $data_arr = array();
    if($ItemCategories){
      foreach($ItemCategories as $ItemCat){
        $ItemSubCategories = ItemSubCategory::Where('is_delete',0)->Where('item_category_id',$ItemCat->id)->get();
        $sub_category_arr = array();
        foreach($ItemSubCategories as $ItemSubCat){
          $sub_category_arr[] = array(
            'name' => $ItemSubCat->name,
            'id' => $ItemSubCat->id,
          );
        }
        $data_arr[] = array(
          'item_category_name' => $ItemCat->item_category_name,
          'sub_category_arr' => $sub_category_arr,
        );
      }
    }

    return $data_arr;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function store(Request $request)
  {
    $input = $request->all();
    // dd($input);
    $filter_date = '';
    if(isset($input['filter_date'])){
      $filter_date = $this->FormatDate($input['filter_date']);
    }else{
      $filter_date = $this->FormatDate($this->DateNow());
    }
    // $deleteActual = ActualStock::Where('branch_id',$this->DefaultBranch())->Where('date',$filter_date)->delete();
    for ($i = 0; $i <= sizeof($input['item_id'])-1 ; $i++) {
      
      ActualStock::where('branch_id', $this->DefaultBranch())
                   ->where('item_id', $input['item_id'][$i])
                   ->where('unit_id', $input['unit_id'][$i])
                   ->where('date', $filter_date)
                   ->delete();

      ActualStock::insert([
        'branch_id'=>$this->DefaultBranch(),
        'item_id'=>$input['item_id'][$i],
        'unit_id'=>$input['unit_id'][$i],
        'qty'=>$input['qty'][$i],
        'date'=>$filter_date
      ]);
    }
    return redirect()->back()->with('message','Actual stock has been modified.');
  }

}
