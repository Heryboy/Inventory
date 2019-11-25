<?php namespace App\Http\Controllers\Admin\stock_mgr\purchase;

// use Illuminate\Http\Request;
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
use App\Models\Admin\stock_mgr\PurchaseInvoice;
use App\Models\Admin\stock_mgr\PurchaseOrder;
use App\Models\Admin\stock_mgr\PurchaseOrderDetail;
use App\Models\Admin\setup_mgr\Unit;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Request;
use Session;

class PurchaseOrderController extends Controller
{
  public $view_title = "stock_mgr/purchase.entry_title";
  public $action = "stock_mgr/purchase.entry_edit";
  
  public function __construct()
  {
     
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
  */

  public function index()
  {

    $exchange_rate_reil = '4000';

    $where_clause = DB::table('purchase_order as po')
                      ->Join('supplier as s','s.id','=','po.supplier_id')
                      ->OrderBy('po.po_date')
                      ->Select('po.*','s.name as supplier_name');

    if(isset($_REQUEST['supplier_id'])){
      $where_clause->Where('po.supplier_id','=',$_REQUEST['supplier_id']);
    }

    $PurchaseOrders = collect($where_clause->get());
    $Suppliers = Supplier::Lists('name','id');
    $Items = Item::Where('is_delete',0)->lists('name','id');
    $Units = Unit::Where('is_delete',0)->lists('name','id');
    $unitGroups = Unit::all();
    
    // dd($purchase_orders);

    $getData_arr = $this->getData();
    return view('admin.stock_mgr.purchase_order.index')
              // ->with('purchase_orders',$purchase_orders)
              ->with('Suppliers',$Suppliers)
              ->with('Items',$Items)
              ->with('Units',$Units)
              ->with('PurchaseOrders',$PurchaseOrders)
              ->with('unitGroups',$unitGroups)
              ->with('exchange_rate_reil',$exchange_rate_reil)
              ->with('getData_arr',$getData_arr);

  }

  // getPurchaseItem
  public function getPurchaseItem(Request $request){
    $input = Request::all();
    $Wherere_clause = DB::table('purchase_order as po')
                      ->Join('supplier as s','s.id','=','po.supplier_id')
                      ->OrderBy('po.po_date')
                      ->Where('po.id',$input['po_id'])
                      ->Select('po.*','s.name as supplier_name');

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
    $Suppliers = Supplier::OrderBy('name')->get();
    $supplier_array = array();
    foreach ($Suppliers as $supplier) {
      $supplier_array[] = array(
        'id' => $supplier->id,
        'name' => $supplier->name
      );
    }
    return $supplier_array;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function store(Request $request)
  {
    // dd($input);
    $input = Request::all();
    $PurchaseInvoiceLastId = DB::table('purchase_order')->insertGetId([
      'po_number' => Input::get('po_number'),
      'po_date' => Input::get('po_date'),
      'branch_id' => $this->DefaultBranch(),
      'sub_total' => Input::get('sub_total'),
      'grand_total' => Input::get('grand_total'),
      'vat_amount' => Input::get('vat_amount'),
      'shipping' => Input::get('shipping'),
      'supplier_id' => Input::get('supplier_id'),
      'description' => Input::get('description'),
      'sub_discount' => Input::get('sub_discount'),
      'make_by' => Auth::user()->id
    ]);

    // barcode
    $i=0;
    $barcode_count = count($input['barcode']);
    for($i=0;$i<=$barcode_count-1;$i++){
      DB::table('purchase_order_detail')->insert(
        [
          'po_id' => $PurchaseInvoiceLastId,
          'qty' => $input['qty'][$i],
          'unit_id' => $input['unit_id'][$i],
          'price' => $input['price_dollar'][$i],
          // 'po_supplier_id' => $input['supplier_id'],
          'discount_amount' => $input['discount_amount'][$i],
          'item_id' => $input['item_id'][$i],
          'total' => $input['total'][$i],
          'remark' => $input['remark'][$i]
        ]
      );
    }

    return redirect("admin/stock_mgr/purchase_order")->with('message','Save Successfully');

  }

  public function show($id)
  {
    $exchange_rate_reil = '4000';
    $PurchaseOrders = PurchaseOrder::findOrFail($id);
    $PurchaseOrderDetails = PurchaseOrderDetail::Where('po_id',$id)->get();
    $Suppliers = Supplier::Lists('name','id');
    $Items = Item::Where('is_delete',0)->lists('name','id');
    $Units = Unit::Where('is_delete',0)->lists('name','id');
    $unitGroups = Unit::all();

    $getData_arr = $this->getData();
    return view('admin.stock_mgr.purchase_order.form')
                                            ->with('Suppliers',$Suppliers)
                                            ->with('Items',$Items)
                                            ->with('Units',$Units)
                                            ->with('PurchaseOrders',$PurchaseOrders)
                                            ->with('PurchaseOrderDetails',$PurchaseOrderDetails)
                                            ->with('unitGroups',$unitGroups)
                                            ->with('exchange_rate_reil',$exchange_rate_reil)
                                            ->with('getData_arr',$getData_arr);
  }

  public function edit($id)
  {
    $exchange_rate_reil = '4000';
    $PurchaseOrders = PurchaseOrder::findOrFail($id);
    $PurchaseOrderDetails = PurchaseOrderDetail::Where('po_id',$id)->get();
    $Suppliers = Supplier::Lists('name','id');
    $Items = Item::Where('is_delete',0)->lists('name','id');
    $Units = Unit::Where('is_delete',0)->lists('name','id');
    $unitGroups = Unit::all();

    $getData_arr = $this->getData();
    return view('admin.stock_mgr.purchase_order.form')
                                            ->with('Suppliers',$Suppliers)
                                            ->with('Items',$Items)
                                            ->with('Units',$Units)
                                            ->with('PurchaseOrders',$PurchaseOrders)
                                            ->with('PurchaseOrderDetails',$PurchaseOrderDetails)
                                            ->with('unitGroups',$unitGroups)
                                            ->with('exchange_rate_reil',$exchange_rate_reil)
                                            ->with('getData_arr',$getData_arr);

  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    $input = Request::all();
    if(isset($input['is_approve'])&&($input['is_approve']=='on')) $input['is_approve'] = 1;
    else $input['is_approve'] = 0;
    // dd($input);
    $input['make_by'] = Auth::user()->id;
    
    if(isset($input['is_approve'])&&($input['is_approve']=='on')) $input['is_approve'] = 0;
    else $input['is_approve'] = 1;

    $PurchaseOrders = PurchaseOrder::find($id);
    $PurchaseOrders->update([
        'po_number' => $input['po_number'],
        'po_date' => $input['po_date'],
        'sub_total' => $input['sub_total'],
        'grand_total' => $input['grand_total'],
        'vat_amount' => $input['vat_amount'],
        'shipping' => $input['shipping'],
        'is_approve' => $input['is_approve'],
        'supplier_id' => $input['supplier_id'],
        'description' => $input['description'],
        'sub_discount' => $input['sub_discount'],
        'make_by' => Auth::user()->id
      ]
    );

    // // barcode
    PurchaseOrderDetail::Where('po_id',$id)->delete();
    $i=0;
    $barcode_count = count($input['barcode']);
    for($i=0;$i<=$barcode_count-1;$i++){
      DB::table('purchase_order_detail')->insert(
        [
          'po_id' => $id,
          'qty' => $input['qty'][$i],
          'unit_id' => $input['unit_id'][$i],
          'price' => $input['price_dollar'][$i],
          // 'po_supplier_id' => $input['supplier_id'],
          'discount_amount' => $input['discount_amount'][$i],
          'item_id' => $input['item_id'][$i],
          'total' => $input['total'][$i],
          'remark' => $input['remark'][$i]
        ]
      );
    }

    //##########Set Event for ActivityLog############
    $this->ActivityLog('update');
    return redirect("admin/stock_mgr/purchase_order")->with('message','Update Successfully');
  }

  public function getError($request){

  }

  public function getItem(Request $request){
    // $data = $request->all();
    $input = Request::all();
    $data_arr = array();
    $item_name = $input['filter_name'];
    $items = DB::table('item')
          ->Where('name','LIKE','%'.$item_name.'%')
          ->Limit(5)
          ->get();

    foreach ($items as $item) {
      $data_arr[] = array(
        'id'   => $item->id,
        'name' => $item->name
      );
    }

    // dd($data_arr);
    return $data_arr;
  }

  // getItemSubCategory
  public function getItemSubCategory(Request $request){
    $input = Request::all();
    $item_sub_category = ItemSubCategory::Where('item_category_id',$input['item_category_id'])->get();
    $data_arr = array();
    foreach ($item_sub_category as $value) {
      $data_arr[] = array(
        'id'   => $value->id,
        'name' => $value->name
      );
    }
    return json_encode($data_arr);
  }

  // getItemCategory
  public function getItemCategory(Request $request){
    // $data = $request->all();
    $input = Request::all();
    $data_arr = array();
    $filter_name = $input['filter_name'];
    $items = ItemCategory::Where('item_category_name','LIKE','%'.$filter_name.'%')->Limit(5)->get();

    foreach ($items as $item) {
      $data_arr[] = array(
        'id'   => $item->id,
        'name' => $item->item_category_name
      );
    }
    // dd($data_arr);
    return $data_arr;
  }

  // getItemCategory
  public function getItemType(Request $request){
    // $data = $request->all();
    $input = Request::all();
    $data_arr = array();
    $filter_name = $input['filter_name'];
    $items = ItemType::Where('name','LIKE','%'.$filter_name.'%')->Limit(5)->get();

    foreach ($items as $item) {
      $data_arr[] = array(
        'id'   => $item->id,
        'name' => $item->name
      );
    }
    // dd($data_arr);
    return $data_arr;
  }

  // getItemCategory
  public function getItemName(Request $request){
    // $data = $request->all();
    $input = Request::all();
    $data_arr = array();
    $filter_name = $input['filter_name'];
    $items = Item::Where('name','LIKE','%'.$filter_name.'%')->Limit(5)->get();

    foreach ($items as $item) {
      $data_arr[] = array(
        'id'   => $item->id,
        'name' => $item->name
      );
    }
    // dd($data_arr);
    return $data_arr;
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  public function destroy($id)
  {
    //##########Set Event for ActivityLog############
    $this->ActivityLog('delete');
    $item = Item::find($id);
    $item->update([
      'is_delete' => 1,
    ]); 
    return redirect()->back()->with('message','Deleted Successfully');
  }

}
