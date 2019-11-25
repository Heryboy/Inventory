<?php 
namespace App\Http\Controllers\POS\salepanel;

use Illuminate\Http\Request;
use App\Http\Requests\item_mgr\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\item_mgr\ItemBaseStore;
use App\Models\Admin\setup_mgr\BranchGroup;
use App\Models\Admin\setup_mgr\Branch;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\ItemSubCategory;
use App\Models\Admin\setup_mgr\ItemType;
use App\Models\Admin\setup_mgr\ItemStatus;
use App\Models\Admin\setup_mgr\Company;
use App\Models\Admin\customer_mgr\customer\customer;
use App\Models\POS\POSCusOrder;
use App\Models\POS\POSCusOrderDetail;
use App\Models\POS\POSCusFlag;
use Illuminate\Support\Facades\Input;
use DB;
use Helpers;
use Validator;
use Auth;
use Session;

class SalePanelController extends Controller
{
    public $view_title = "item_mgr/item.entry_title";
    public $action = "Edit";

    public function __construct(){
      
    }

    public function print_invoice(Request $request){
      $input = $request->all();
      // dd($countOrder);
      $countOrder = POSCusOrder::Where('status_id',4)->OrWhere('status_id',3)->Where('is_void',0)->count();
      $countVoid = POSCusOrder::Where('is_void',1)->count();
      $Items = Item::Where('is_delete',0)->Limit(32)->get();
      $customers = customer::lists('name','id');
      $POSCusOrders = POSCusOrder::Where('status_id',4)->OrWhere('status_id',3)->Where('is_void',0)->get();
      $POSCusVoidOrders = POSCusOrder::Where('status_id',4)->OrWhere('status_id',3)->Where('is_void',1)->get();
      $ItemCategory = ItemCategory::Where('is_delete',0)->get();
      $ItemSubCategory = ItemSubCategory::Where('is_delete',0)->get();
      $order_id=0;
      $POSCusOrderDetail='';
      $countOrder=0;
      $sub_total = 0;
      $discount = 0;
      $total = 0;
      $customer_id=null;
      if(isset($_REQUEST['order_id'])){
        $order_id=$_REQUEST['order_id'];
        $POSCusOrder = POSCusOrder::Where('status_id',4)->OrWhere('status_id',3)->Where('id',$order_id)->Where('is_void',0)->first();
        $POSCusOrderDetail = POSCusOrderDetail::Where('pos_order_id',$order_id)
                                                ->Where('is_delete',0)
                                                ->get();
        $getCustomerID = POSCusOrder::Where('status_id',4)->OrWhere('status_id',3)->Where('id',$order_id)->Where('is_void',0)->Select('customer_id')->first();
        if($getCustomerID->customer_id==0){
          $customer_id = null;
        }else{
          $customer_id = $getCustomerID->customer_id;
        }
        $sub_total = $this->getSubTotal($order_id);
        $discount = $this->getDiscount($order_id);
        $total = $this->getTotal($order_id);
      }

      $Company = Company::first();
      $data = array();
      $data = array(
                'countOrder'=>$countOrder,
                'countVoid'=>$countVoid,
                'sub_total'=>$sub_total,
                'discount'=>$discount,
                'total'=>$total,
              );

      return view('POS.salepanel._print_invoice')
              ->with('order_id',$order_id)
              ->with('POSCusOrder',$POSCusOrder)
              ->with('POSCusOrderDetail',$POSCusOrderDetail)
              ->with('data',$data)
              ->With('Company',$Company);
    }


    /*
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index()
    {
      $order_id=0;
      $POSCusOrderDetail='';
      $countOrder=0;
      $sub_total = 0;
      $discount = 0;
      $total = 0;
      $customer_id=null;
      if(isset($_REQUEST['order_id'])){
        $order_id=$_REQUEST['order_id'];
        $POSCusOrderDetail = POSCusOrderDetail::Where('pos_order_id',$order_id)
                                                ->Where('is_delete',0)
                                                ->get();
        $getCustomerID = POSCusOrder::Where('status_id',3)->Where('id',$order_id)->Where('is_void',0)->Select('customer_id')->first();
        if($getCustomerID->customer_id==0){
          $customer_id = null;
        }else{
          $customer_id = $getCustomerID->customer_id;
        }
        $sub_total = $this->getSubTotal($order_id);
        $discount = $this->getDiscount($order_id);
        $total = $this->getTotal($order_id);
      }

      $Company = Company::first();
      $chkHasPOSCusOrder = POSCusFlag::count();
      $OrderArray=[];
      if($chkHasPOSCusOrder>0){
        $POSCusFlag = POSCusFlag::all();
        $order_str='';
        foreach ($POSCusFlag as $val) {
          $order_str .=$val->order_id.',';
        }
        $OrderArray = explode(',', $order_str);
        array_pop($OrderArray);
      }
      // dd($countOrder);
      $Items = Item::Where('is_delete',0)->Limit(32)->get();
      $customers = customer::lists('name','id');
      $countOrder = POSCusOrder::WhereNotIn('id',$OrderArray)->Where('status_id',3)->Where('is_void',0)->count();
      $countVoid = POSCusOrder::WhereNotIn('id',$OrderArray)->Where('is_void',1)->count();
      $POSCusOrders = POSCusOrder::WhereNotIn('id',$OrderArray)->Where('status_id',3)->Where('is_void',0)->get();
      $POSCusVoidOrders = POSCusOrder::WhereNotIn('id',$OrderArray)->Where('status_id',3)->Where('is_void',1)->get();
      $ItemCategory = ItemCategory::Where('is_delete',0)->get();
      $ItemSubCategory = ItemSubCategory::Where('is_delete',0)->get();

      $data = array();
      $data = array(
                'countOrder'=>$countOrder,
                'countVoid'=>$countVoid,
                'sub_total'=>$sub_total,
                'discount'=>$discount,
                'total'=>$total,
              );

      return view('POS.salepanel.index')->with('Items',$Items)
                                        ->with('customers',$customers)
                                        ->with('POSCusOrders',$POSCusOrders)
                                        ->with('POSCusVoidOrders',$POSCusVoidOrders)
                                        ->with('POSCusOrderDetail',$POSCusOrderDetail)
                                        ->with('ItemCategory',$ItemCategory)
                                        ->with('ItemSubCategory',$ItemSubCategory)
                                        ->with('data',$data)
                                        ->with('Company',$Company)
                                        ->with('customer_id',$customer_id)
                                        ->with('order_id',$order_id);
    }

    public function POSCusBarcodeScanner(Request $request){
      $input = $request->all();
      $barcode = $input['barcode'];
      $success=1;
      $chkItem = Item::Where('item_barcode',$barcode)->first();
      $json=[];
      if($chkItem){
        $success=1;

        // POSCusOrder####################
        $order_id = $input['order_id'];
        $item_id = $chkItem->id;
        $item_price = $chkItem->retail;
        $default_unit = $chkItem->default_unit;
        // 
        $new_order_price = floatval($this->getSubTotal($order_id))+floatval($item_price);
        POSCusOrder::Where('id',$order_id)->Where('status_id',3)->Update(['sub_total_amount'=>floatval($new_order_price)]);

        // $boolen = $this->checkHasOrderID($order_id);
        $POSCusOrderDetail = POSCusOrderDetail::create([
          'pos_order_id'=>$order_id,
          'item_id'=>$item_id,
          'qty'=>1,
          'unit_price'=>$item_price,
          'price'=>$item_price,
          'unit_id'=>$default_unit
        ]);
        $order_detail_id = $POSCusOrderDetail->id;
        // $json = array();
        $json = array(
          'id'=>$order_detail_id,
          'item_name'=>$chkItem->name,
          'item_price'=>$item_price,
          'sub_total'=>$this->getSubTotal($order_id),
          'total'=>$this->getTotal($order_id),
          'discount'=>$this->getDiscount($order_id),
          'currency_sign'=>Helpers::getCurrencyDefault('currency_sign'),
          'success'=>$success
        );

        // return json_encode($json);
        ##########################

      }else{
        $json = array(
          'success'=>$success
        );
      }

      return json_encode($json); 
      
    }

    public function customerDashboard()
    {
      $Company=Company::Where('id',1)->first();
      $ItemCategory = ItemCategory::Where('is_delete',0)->get();
      return view('POS.customer.index')->with('ItemCategory',$ItemCategory)->with('Company',$Company);
    }

    public function customerSubcategory($id)
    {
      $Company=Company::Where('id',1)->first();
      $ItemSubCategory = ItemSubCategory::Where('item_category_id',$id)->Where('is_delete',0)->get();
      return view('POS.customer.sub_category')
              ->with('ItemSubCategory',$ItemSubCategory)
              ->with('cid',$id)
              ->with('flag_back',1)
              ->with('Company',$Company);
    }

    public function customerCheckout(){
      return view('POS.salepanel.customer_checkout');
    }

    public function POSCusCheckOut(Request $request){
      $input = $request->all();
      $boolen=1;
      $order_id = $input['order_id'];
      POSCusFlag::Where('order_id',$order_id)->delete();
      POSCusOrder::Where('id',$order_id)->Update(['flag_check'=>0]);
      return json_encode($boolen);
    }

    public function customerSalepanel()
    {
      $order_id=0;
      $POSCusOrderDetail='';
      $countOrder=0;
      $sub_total = 0;
      $discount = 0;
      $total = 0;
      $customer_id=null;
      // this flag available only customer when they first generate order
      $chkHas = POSCusFlag::count();
      if($chkHas>0){
        $POSCusFlag = POSCusFlag::Select('order_id')->first();
        $order_id = $POSCusFlag->order_id;
        $POSCusOrderDetail = POSCusOrderDetail::Where('pos_order_id',$order_id)
                                                ->Where('is_cancel',0)
                                                ->Where('is_delete',0)
                                                ->get();
        $getCustomerID = POSCusOrder::Where('status_id',3)->Where('flag_check',1)->Where('id',$order_id)->Where('is_void',0)->Select('customer_id')->first();
        if($getCustomerID->customer_id==0){
          $customer_id = null;
        }else{
          $customer_id = $getCustomerID->customer_id;
        }
        $sub_total = $this->getSubTotal($order_id);
        $discount = $this->getDiscount($order_id);
        $total = $this->getTotal($order_id);
      }

      if(isset($_REQUEST['order_id'])){
        $order_id=$_REQUEST['order_id'];
        $POSCusOrderDetail = POSCusOrderDetail::Where('pos_order_id',$order_id)
                                               ->Where('is_cancel',0)
                                               ->Where('is_delete',0)
                                               ->get();
        $getCustomerID = POSCusOrder::Where('status_id',3)->Where('flag_check',1)->Where('id',$order_id)->Where('is_void',0)->Select('customer_id')->first();
        if($getCustomerID->customer_id==0){
          $customer_id = null;
        }else{
          $customer_id = $getCustomerID->customer_id;
        }
        $sub_total = $this->getSubTotal($order_id);
        $discount = $this->getDiscount($order_id);
        $total = $this->getTotal($order_id);
      }

      // dd($countOrder);
      $countOrder = POSCusOrder::Where('status_id',3)->Where('flag_check',1)->Where('is_void',0)->count();
      $countVoid = POSCusOrder::Where('is_void',1)->count();
      $customers = customer::lists('name','id');
      $POSCusOrders = POSCusOrder::Where('status_id',3)->Where('flag_check',1)->Where('is_void',0)->get();
      $POSCusVoidOrders = POSCusOrder::Where('status_id',3)->Where('flag_check',1)->Where('is_void',1)->get();

      $cid='';
      $scat='';
      $where_clause_cat = ItemCategory::Where('is_delete',0);
      if(isset($_REQUEST['cid'])){
        $cid=$_REQUEST['cid'];
      }
      //   $where_clause_cat = $where_clause_cat->Where('id',$_REQUEST['cid']);
      $ItemCategory = collect($where_clause_cat->get());
      $where_clause_scat = ItemSubCategory::Where('is_delete',0);
      if(isset($_REQUEST['scat'])){
        $scat=$_REQUEST['scat'];
        $where_clause_scat = $where_clause_scat->Where('item_category_id',$cid);
      }

      $ItemSubCategory = collect($where_clause_scat->get());

      $where_clause_item = Item::Where('is_delete',0)->Limit(32);
      if(isset($_REQUEST['scat'])){
        $scat=$_REQUEST['scat'];
        $where_clause_item->Where('item_sub_category_id',$scat);
      }

      $Items = collect($where_clause_item->get());

      $data = array();
      $data = array(
                'countOrder'=>$countOrder,
                'countVoid'=>$countVoid,
                'sub_total'=>$sub_total,
                'discount'=>$discount,
                'total'=>$total,
              );
      
      return view('POS.salepanel.customer') ->with('Items',$Items)
                                            ->with('customers',$customers)
                                            ->with('POSCusOrders',$POSCusOrders)
                                            ->with('POSCusVoidOrders',$POSCusVoidOrders)
                                            ->with('POSCusOrderDetail',$POSCusOrderDetail)
                                            ->with('ItemCategory',$ItemCategory)
                                            ->with('ItemSubCategory',$ItemSubCategory)
                                            ->with('data',$data)
                                            ->with('customer_id',$customer_id)
                                            ->with('order_id',$order_id)
                                            ->with('cid',$cid)
                                            ->with('scat',$scat);
    }

    public function getSubTotal($order_id){
      $result = DB::table('pos_cus_order_details')
                ->select(DB::raw('SUM(price) as total_sales'))
                ->Where('is_cancel',0)
                ->Where('is_delete',0)
                ->Where('pos_order_id',$order_id)
                // ->groupBy('department')
                // ->havingRaw('SUM(price) > 2500')
                ->first();
      return $result->total_sales;
    }

    public function getDiscount($order_id){
      $discount=0;
      $discount = POSCusOrder::Where('id',$order_id)->first();
      return $discount->discount;
    }

    public function getTotal($order_id){
      $total=0;
      $sql = POSCusOrder::Where('id',$order_id)->first();
      if($sql){
        $total = floatval($this->getSubTotal($order_id))+(floatval($this->getSubTotal($order_id))/100*(int)TAX)-(floatval($this->getSubTotal($order_id))/100*(int)$sql->discount);
      }

      return $total;
    }

    public function getSubCat(Request $request){
      $input = $request->all();
      $catID = $input['catID'];
      $ItemSubCategory = ItemSubCategory::Where('item_category_id',$catID)->Where('is_delete',0)->get();
      $data = array();
      foreach ($ItemSubCategory as $row) {
        $data[]=array(
          'id'=>$row->id,
          'name'=>$row->name,
        );
      }
      $json = array(
        'data'=>$data,
        'success'=>1
      );
      return $json;
    }
    public function getItemBySub(Request $request){
      $input = $request->all();
      $subCatID = $input['SubCatID'];
      $Items = Item::Where('item_sub_category_id',$subCatID)->Where('is_delete',0)->get();
      $data = array();
      foreach ($Items as $row) {
        $data[]=array(
          'id'=>$row->id,
          'name'=>$row->name,
          'default_unit'=>$row->default_unit,
          'image'=>$row->image,
          'retail'=>$row->retail,
          'item_barcode'=>$row->item_barcode,
          'item_code'=>$row->item_code
        );
      }
      $json = array(
        'data'=>$data,
        'success'=>1
      );
      return $json;
    }

    public function getAllItems(Request $request){
      $input = $request->all();
      $order_id = $input['order_id'];
      $POSCusOrderDetails = POSCusOrderDetail::Where('pos_order_id',$order_id)
                                               ->Where('is_delete',0)
                                               ->get();
      $POSCusOrders = POSCusOrder::Where('status_id',3)->Where('id',$order_id)->Where('is_void',0)->first();
      $data = array();
      foreach ($POSCusOrderDetails as $row) {
        $data[]=array(
          'id'=>$row->id,
          'name'=>$row->Item->name,
          'is_cancel'=>$row->is_cancel,
          'unit_price'=>$row->unit_price,
          'price'=>$row->price,
          'qty'=>$row->qty
        );
      }
      $json = array(
        'data'=>$data,
        'check_in_date'=>$POSCusOrders->check_in_date,
        'customer'=>$POSCusOrders->Customer->name,
        'check_out_date'=>$POSCusOrders->check_out_date,
        'sub_total'=>$this->getSubTotal($order_id),
        'total'=>$this->getTotal($order_id),
        'discount'=>$this->getDiscount($order_id),
        'currency_sign'=>Helpers::getCurrencyDefault('currency_sign'),
        'success'=>1
      );
      return $json;
    }

    /*
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create()
    {
      $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $Branch = Branch::all();
      $getData_arr = $this->getData();
      return view('admin.item_mgr.item_base_store.form')  
                ->with('item_category',$item_category)
                ->with('item_type',$item_type)
                ->with('item_status',$item_status)
                ->With('Branch',$Branch)
                ->with('action',$this->action)
                ->With('getData_arr',$getData_arr)
                ->with('view_title',$this->view_title);
    }

    // getData
    public function getData(){
      $BranchGroups = BranchGroup::Where('is_delete',0)->OrderBy('branch_group_name')->get();
      $category_arr = array();
      foreach($BranchGroups as $BranchGroup){
        $Branches = Branch::Where('is_delete',0)->Where('branch_group_id',$BranchGroup->id)->get();
        $Branch_Array = array();
        foreach($Branches as $Branch){
          $Branch_Array[] = array(
            'branch_name' => $Branch->branch_name,
            'id' => $Branch->id,
          );
        }
        $data_arr[] = array(
          'branch_group_name' => $BranchGroup->branch_group_name,
          'Branch_Array' => $Branch_Array,
        );
      }

      return $data_arr;
    }

    // checkHasOrderID
    public function checkHasOrderID($order_id){
      // $input = $_REQUEST[''];
      $boolen = 0;
      $order_id = 1;//$input['order_id'];
      $checkHasOrderID = POSCusOrder::where('id',$order_id)->Where('status_id',3)->first();
      if(count($checkHasOrderID)>0){
        $boolen=1;
      }else{
        $boolen=0;
      }
      return $boolen;
    }

    // InCreasePrice
    public function IcreaseItemPrice(Request $request){
      $input = $request->all();
      $order_detail_id = $input['order_detail_id'];
      $order_id = $input['order_id'];
      $result = DB::table('pos_cus_order_details')->Where('id',$order_detail_id)->first();
      $new_price = floatval($result->price)+floatval($result->unit_price);
      $qty = $result->qty+1;
      $POSCusOrderDetail = POSCusOrderDetail::Where('id',$order_detail_id)->update([
        'qty'=>$qty,
        'price'=>$new_price
      ]);
      // $json = array();
      $json = array(
        'id'=>$order_detail_id,
        'qty'=>$qty,
        'price'=>$new_price,
        'sub_total'=>$this->getSubTotal($order_id),
        'total'=>$this->getTotal($order_id),
        'discount'=>$this->getDiscount($order_id),
        'currency_sign'=>Helpers::getCurrencyDefault('currency_sign'),
        'success'=>1
      );

      return json_encode($json);
    }

    // DecreaseItemPrice
    public function DecreaseItemPrice(Request $request){
      $input = $request->all();
      $order_detail_id = $input['order_detail_id'];
      $order_id = $input['order_id'];
      $result = DB::table('pos_cus_order_details')->Where('id',$order_detail_id)->first();
      $qty=0;
      $new_price=0;
      if(($result->qty-1)==0){
        $qty=1;
        $new_price=floatval($result->unit_price);
      }else{
        $qty = $result->qty-1;
        $new_price = floatval($result->price)-floatval($result->unit_price);
      }
      $POSCusOrderDetail = POSCusOrderDetail::Where('id',$order_detail_id)->update([
        'qty'=>$qty,
        'price'=>$new_price
      ]);

      // $json = array();
      $json = array(
        'id'=>$order_detail_id,
        'sub_total'=>$this->getSubTotal($order_id),
        'total'=>$this->getTotal($order_id),
        'qty'=>$qty,
        'price'=>$new_price,
        'discount'=>$this->getDiscount($order_id),
        'currency_sign'=>Helpers::getCurrencyDefault('currency_sign'),
        'success'=>1
      );

      return json_encode($json);
    }

    //ProcessPayment
    public function ProcessPayment(Request $request){
      $input = $request->all();
      $boolen=1;
      $order_id = $input['order_id'];
      POSCusOrder::Where('id',$order_id)->Update(['status_id'=>4]);
      return $boolen;
    } 

    // POSCusOrder
    public function POSCusOrder(Request $request){
      $input = $request->all();
      $item_id = $input['item_id'];
      $item_price = $input['item_price'];
      $order_id = $input['order_id'];
      $default_unit = $input['default_unit'];
      // 
      $new_order_price = floatval($this->getSubTotal($order_id))+floatval($item_price);
      POSCusOrder::Where('id',$order_id)->Where('status_id',3)->Update(['sub_total_amount'=>floatval($new_order_price)]);

      $boolen = $this->checkHasOrderID($order_id);
      $POSCusOrderDetail = POSCusOrderDetail::create([
        'pos_order_id'=>$order_id,
        'item_id'=>$item_id,
        'qty'=>1,
        'unit_price'=>$item_price,
        'price'=>$item_price,
        'unit_id'=>$default_unit
      ]);
      $order_detail_id = $POSCusOrderDetail->id;
      // $json = array();
      $json = array(
        'id'=>$order_detail_id,
        'sub_total'=>$this->getSubTotal($order_id),
        'total'=>$this->getTotal($order_id),
        'discount'=>$this->getDiscount($order_id),
        'currency_sign'=>Helpers::getCurrencyDefault('currency_sign'),
        'success'=>1
      );

      return json_encode($json);
    }

    public function cancelItem(Request $request){
      $boolen = 1;
      $input = $request->all();
      $order_id = $input['order_id'];
      $order_detail_id = $input['order_detail_id'];
      $POSCusOrderDetail = POSCusOrderDetail::Where('id',$order_detail_id)->update(['is_delete'=>1]);
      // $json = array();
      $json = array(
        'sub_total'=>$this->getSubTotal($order_id),
        'total'=>$this->getTotal($order_id),
        'discount'=>$this->getDiscount($order_id),
        'currency_sign'=>Helpers::getCurrencyDefault('currency_sign'),
        'success'=>1
      );
      return json_encode($json);
    }

    public function cancelAllItem(Request $request){
      $boolen = 1;
      $input = $request->all();
      $order_id = $input['order_id'];
      $POSCusOrderDetail = POSCusOrderDetail::Where('pos_order_id',$order_id)->update(['is_cancel'=>1]);
      return json_encode($boolen);
    }

    public function GenerateOrder(Request $request){
      $input = $request->all();
      $customer_id = $input['customer_id'];
      // flag_check = 1 means customer order by themselves order cahiser order for them
      $flag_check = $input['flag_check'];

      $pos_cus_order_sequence = DB::table('pos_cus_order_sequence')->first();
      $sequence_no = $pos_cus_order_sequence->sequence+1;
      DB::table('pos_cus_order_sequence')->Update(['sequence'=>($sequence_no)]);
      
      $POSCusOrder = POSCusOrder::create([
        'customer_id'=>$customer_id,
        'branch_id'=>$this->DefaultBranch(),
        'flag_check'=>$flag_check,
        'vat_percentag'=>TAX,
        'check_in_date'=>$this->DateNow(),
        'check_out_date'=>$this->DateNow(),
        'order_no'=>$sequence_no,
        'made_by'=>Auth::user()->id,
        'status_id'=>3,
      ]);
      $LastId = $POSCusOrder->id;

      if($flag_check==1){
        POSCusFlag::Create(['order_id'=>$LastId]);
      }

      return json_encode($LastId);
    }

    public function VoidOrder(Request $request){
      $input = $request->all();
      $order_id = $input['order_id'];
      $flag_check = $input['flag_check'];
      if($flag_check==1){
        POSCusFlag::truncate();
      }
      $POSCusOrder = POSCusOrder::Where('id',$order_id)->Update([
        'is_void'=>1,
        'status_id'=>3
      ]);
      return json_encode(1);
    }

    public function ProcessDiscount(Request $request){
      $input = $request->all();
      $boolen=1;
      $order_id = $input['order_id'];
      $percent_val = $input['percent_val'];
      $sub_total = POSCusOrder::Where('id',$order_id)->Where('status_id',3)->Select('sub_total_amount')->first();
      // $new_sub_total = floatval($this->getSubTotal($order_id))-($this->getSubTotal($order_id)/100*$percent_val);
      POSCusOrder::Where('id',$order_id)->Where('status_id',3)->Update(['discount'=>$percent_val,'sub_total_amount'=>$this->getSubTotal($order_id)]);

      $json = array(
        'sub_total'=>$this->getSubTotal($order_id),
        'total'=>$this->getTotal($order_id),
        'discount'=>$this->getDiscount($order_id),
        'currency_sign'=>Helpers::getCurrencyDefault('currency_sign'),
        'success'=>1
      );

      return json_encode($json);

      // return $boolen;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ItemRequest $request)
    {
      $input = $request->all();

      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      
      $input['created_by'] = Auth::user()->id;
      Item::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/item_mgr/item")->with('nmessage','Save Successfully');
    }

    public function show($id)
    {
      
      $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');       
      $item = Item::findOrFail($id);
      return view('Admin.item_mgr.item.form')->with('item',$item)
                                          ->with('item_category',$item_category)
                                          ->with('item_type',$item_type)
                                          ->with('item_status',$item_status)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item = Item::findOrFail($id);
      return view('Admin.item_mgr.item.form')->with('item',$item)
                                          ->with('item_category',$item_category)
                                          ->with('item_type',$item_type)
                                          ->with('item_status',$item_status)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Edit");
    }

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $id)
    {
      $input = $request->all();
      $input['updated_by'] = Auth::user()->id;
      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
     
      $item = Item::find($id);
      
      $item->update($input);  
      //##########Set Event for ActivityLog############
      $this->ActivityLog('update');
      return redirect("admin/item_mgr/item")->with('message','Save Successfully');
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
