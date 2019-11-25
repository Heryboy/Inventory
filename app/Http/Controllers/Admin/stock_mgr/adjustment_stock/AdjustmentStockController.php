<?php namespace App\Http\Controllers\Admin\stock_mgr\adjustment_stock;

use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\ItemRequest;
use App\Http\Controllers\Controller;
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
use App\Models\Admin\setup_mgr\Branch;
use App\Models\Admin\setup_mgr\ItemLocation;
use App\Models\Admin\item_mgr\ItemBaseLocation;
use App\Models\Admin\item_mgr\LocationBaseBranch;
use App\Models\Admin\stock_mgr\AdjustmentStock;
use App\Models\Admin\stock_mgr\AdjustmentStockDate;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class AdjustmentStockController extends Controller
{
  public $view_title = "stock_mgr/adjustment_stock_items_stock.entry_title";
  public $action = "stock_mgr/adjustment_stock_items_stock.entry_edit";
  
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
    $default_branch = $this->DefaultBranch();
    // $Location = collect($Location_clause->get());
    // print_r($Location);
    $input = $request->all();
    $filter_name='';
    $filter_date=date('Y-m-d');
    if(isset($input['filter_name']) && isset($input['filter_date'])){
      $filter_name = $input['filter_name'];
      $filter_date = $input['filter_date'];
    }
    $where_clause = '';
    $sub_catID = 0;
    if(isset($input['sub_catID'])){
      $sub_catID = $input['sub_catID'];
      $where_clause .= "AND i.item_sub_category_id=".(int)$input['sub_catID'];
    } 

    $branch_id = '';
    $location_id = '';
    $Branch = Branch::Where('is_delete',0)->Lists('branch_name','id');
    if(isset($_REQUEST['location_id'])){
      $location_id=$_REQUEST['location_id'];
    }
    $LocationBaseBranches = [];
    if(isset($_REQUEST['branch_id'])){
      $branch_id=$_REQUEST['branch_id'];
      $LocationBaseBranches = LocationBaseBranch::Where('branch_id',$branch_id)->get();
    }

    // $adjustment_stock_items_stock_items = DB::select( 
    //                                           DB::raw("
    //                                             SELECT i.name AS item_name, i.id as item_id ,u1.name AS unit,u1.id as unit_id, 
    //                                             (SELECT ad.adjust_qty FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit1 AND ad.item_id=ic.item_id) as qty,
    //                                             (SELECT ad.lost_qty FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit1 AND ad.item_id=ic.item_id) as lost_qty,
    //                                             (SELECT ad.damage_qty FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit1 AND ad.item_id=ic.item_id) as damage_qty,
    //                                             (SELECT ad.adjust_by FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit1 AND ad.item_id=ic.item_id) as adjust_by,
    //                                             (SELECT ad.reason FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit1 AND ad.item_id=ic.item_id) as reason 

    //                                             FROM tbl_item_conversion ic
    //                                             JOIN tbl_item i ON i.id = ic.item_id ".$where_clause."
    //                                             JOIN tbl_unit u1 ON u1.id = ic.unit1

    //                                             UNION ALL

    //                                             SELECT i.name AS item_name, i.id as item_id ,u2.name AS unit,u2.id as unit_id ,
    //                                             (SELECT ad.adjust_qty FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit2 AND ad.item_id=ic.item_id) as qty,
    //                                             (SELECT ad.lost_qty FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit2 AND ad.item_id=ic.item_id) as lost_qty,
    //                                             (SELECT ad.damage_qty FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit2 AND ad.item_id=ic.item_id) as damage_qty ,

    //                                             (SELECT ad.adjust_by FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit2 AND ad.item_id=ic.item_id) as adjust_by,

    //                                             (SELECT ad.reason FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit2 AND ad.item_id=ic.item_id) as reason 

    //                                             FROM tbl_item_conversion ic
    //                                             JOIN tbl_item i ON i.id = ic.item_id ".$where_clause."
    //                                             JOIN tbl_unit u2 ON u2.id = ic.unit2
    //                                           ")
    //                                         );
    $adjustment_stock_items_stock_items = DB::select( 
      DB::raw("
        SELECT i.name AS item_name, i.id as item_id ,u1.name AS unit,u1.id as unit_id, 
        (SELECT ad.adjust_qty FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit1 AND ad.item_id=ic.item_id) as qty,
        (SELECT ad.lost_qty FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit1 AND ad.item_id=ic.item_id) as lost_qty,
        (SELECT ad.damage_qty FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit1 AND ad.item_id=ic.item_id) as damage_qty,
        (SELECT ad.adjust_by FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit1 AND ad.item_id=ic.item_id) as adjust_by,
        (SELECT ad.reason FROM tbl_adjustment ad WHERE ad.branch_id=".(int)$default_branch." AND ad.adjustment_date LIKE '%".$filter_date."%' AND ad.unit_id=ic.unit1 AND ad.item_id=ic.item_id) as reason 

        FROM tbl_item_conversion ic
        JOIN tbl_item i ON i.id = ic.item_id ".$where_clause."
        JOIN tbl_unit u1 ON u1.id = ic.unit1
      ")
    );

    $getData_arr = $this->getData();
    return view('admin.stock_mgr.adjustment_stock.index')
              ->with('adjustment_stock_items_stock_items',$adjustment_stock_items_stock_items)
              ->with('getData_arr',$getData_arr)
              ->with('filter_date',$filter_date)
              ->with('filter_name',$filter_name)
              ->with('Branch',$Branch)
              ->with('branch_id',$branch_id)
              ->with('location_id',$location_id)
              ->with('sub_catID', $sub_catID)
              ->with('LocationBaseBranches',$LocationBaseBranches);

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
    $filter_date = '';
    if(isset($input['filter_date'])){
      $filter_date = $this->FormatDate($input['filter_date']);
    }else{
      $filter_date = $this->FormatDate($this->DateNow());
    }
    $adjust_qty = $input['adjust_qty'];
    // $deleteAdjust = AdjustmentStock::Where('branch_id',$this->DefaultBranch())->Where('adjustment_date',$filter_date)->delete();
    AdjustmentStockDate::create(['adjust_stock_date' => date('Y-m-d')]);
    for ($i = 0; $i <= sizeof($adjust_qty)-1 ; $i++){
      AdjustmentStock::where('item_id', $input['item_id'][$i])
                      ->where('adjustment_date', $filter_date)
                      ->where('branch_id', $this->DefaultBranch())
                      ->where('unit_id', $input['unit_id'][$i])
                      ->delete();
        

      AdjustmentStock::create([
        'item_id'=>$input['item_id'][$i],
        'adjustment_date'=>$filter_date,
        'adjust_qty'=>$input['adjust_qty'][$i],
        'lost_qty'=>$input['lost_qty'][$i],
        'damage_qty'=>$input['damage_qty'][$i],
        'branch_id'=>$this->DefaultBranch(),
        'adjust_by'=>$input['adjust_by'][$i],
        'unit_id'=>$input['unit_id'][$i],
        'reason'=>$input['reason'][$i]
      ]);
    }
    return redirect()->back()->with('message','Stock has been adjusted.');
  }


}
