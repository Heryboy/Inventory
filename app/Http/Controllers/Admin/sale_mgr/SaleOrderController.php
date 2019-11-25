<?php 
namespace App\Http\Controllers\Admin\sale_mgr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\sale_mgr\SaleOrder;
use App\Models\Admin\sale_mgr\SaleOrderDetail;
use App\Models\Admin\item_mgr\ItemBaseStore;
use App\Models\Admin\customer_mgr\customer\customer;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\ItemSubCategory;
use App\Models\Admin\setup_mgr\ItemType;
use App\Models\Admin\setup_mgr\ItemStatus;
use App\Models\Admin\setup_mgr\Currency;
use App\Models\Admin\setup_mgr\Unit;
use App\Models\Admin\setup_mgr\Company;
use App\Models\Admin\customer_mgr\customer_group\CustomerGroup;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Helpers;
use Auth;
use Session;

class SaleOrderController extends Controller
{
    public $view_title = "sale_mgr/sale_order.entry_title";
    public $action = "Edit";
    
    public function __construct()
    {
       
    }

    // QuotationList
    public function index(){
      $SaleOrders = SaleOrder::Where('status_id', 10)->Where('is_void', 0)->OrderBy('check_in_date', 'DESC')->get();
      $Company=Company::first();
      $dataCompany = '';
      if($Company){
        $dataCompany = $Company;
      }
      $getData_arr = $this->getData();
      return view('admin.sale_mgr.sale_order.index')->with('SaleOrders',$SaleOrders)
                                                    ->with('Company',$dataCompany)
                                                    ->with('getData_arr',$getData_arr);
    }

    // store
    public function store(Request $request){
      // dd($input);
      $input = $request->all();

      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;

      if(isset($input['is_approve'])&&($input['is_approve']=='on')) $input['is_approve'] = 1;
      else $input['is_approve'] = 0;

      $SaleOrderLastId = SaleOrder::insertGetId([
        'branch_id' => $this->DefaultBranch(),
        'sale_order_no' => Input::get('sale_order_no'),
        'sale_order_date' => Input::get('sale_order_date'),
        'customer_id' => Input::get('customer_id'),
        'description' => Input::get('description'),
        'sub_total' => Input::get('sub_total'),
        'discount' => Input::get('sub_discount'),
        'vat_percentage' => TAX,
        'grand_total' => Input::get('grand_total'),
        'expired_date' => Input::get('expired_date'),
        'is_approve' => $input['is_approve'],
        'created_by' => Auth::user()->id
      ]);

      // update sequence no
      $this->updateSequence($SaleOrderLastId);

      // barcode
      $i=0;
      if(isset($input['item_id'])){
        $barcode_count = count($input['item_id']);
        for($i=0;$i<=$barcode_count-1;$i++){
          SaleOrderDetail::insert(
            [
              'branch_id' => $this->DefaultBranch(),
              'sale_order_id' => $SaleOrderLastId,
              'sale_order_qty' => $input['sale_order_qty'][$i],
              'unit_id' => $input['unit_id'][$i],
              'whole_sale_price' => $input['price_dollar'][$i],
              'sale_order_price' => $input['price_dollar'][$i],
              'item_id' => $input['item_id'][$i],
              'total' => $input['total'][$i],
              'remark' => $input['remark'][$i]
            ]
          );
        }
      }
      return redirect()->back()->with('message','Save Successfully');
    }

    // update sequence
    public function updateSequence($id){
      $sequence_no = $id+1;
      DB::table("sale_order_sequence")->update([
        'sequence_no' => $sequence_no+1,
      ]);
    }

    // QuotationFrom
    public function create(){
      $exchange_rate_reil = Helpers::getReilFraction()*100;
      $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $item_sub_category = ItemSubCategory::Where('is_delete',0)->Lists('name','id');
      $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $Items = Item::Where('is_delete',0)->lists('name','id');
      $Units = Unit::Where('is_delete',0)->lists('name','id');
      $currency = Currency::lists('name','id');
      $unitGroups = Unit::all();
      $customers = customer::lists('name','id');

      $sale_order_sequence = $this->getSaleOrdersequence();

      $customer_groups = CustomerGroup::lists('name','id');
      return view('admin.sale_mgr.sale_order.form')
              ->with('customer_groups',$customer_groups)
              ->with('item_category',$item_category)
              ->with('item_sub_category',$item_sub_category)
              ->with('item_type',$item_type)
              ->with('Items',$Items)
              ->with('sale_order_sequence',$sale_order_sequence)
              ->with('customers',$customers)
              ->with('exchange_rate_reil',$exchange_rate_reil)
              ->with('item_status',$item_status)
              ->with('Units',$Units)
              ->with('unitGroups',$unitGroups)
              ->with('currency',$currency);
    }

    // Sale Order
    public function show($id){
      $exchange_rate_reil = Helpers::getReilFraction()*100;
      $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $item_sub_category = ItemSubCategory::Where('is_delete',0)->Lists('name','id');
      $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $Items = Item::Where('is_delete',0)->lists('name','id');
      $Units = Unit::Where('is_delete',0)->lists('name','id');
      $currency = Currency::lists('name','id');
      $unitGroups = Unit::all();
      $customers = customer::lists('name','id');
      $sale_order_sequence = $this->getSaleOrdersequence();
      $customer_groups = CustomerGroup::lists('name','id');

      $SaleOrders = SaleOrder::Where('id',$id)->first();
      $SaleOrderDetails = SaleOrderDetail::Where('sale_order_id',$id)->get();
      return view('admin.sale_mgr.sale_order.form')
              ->with('customer_groups',$customer_groups)
              ->with('item_category',$item_category)
              ->with('item_sub_category',$item_sub_category)
              ->with('item_type',$item_type)
              ->with('Items',$Items)
              ->with('SaleOrders',$SaleOrders)
              ->with('SaleOrderDetails',$SaleOrderDetails)
              ->with('sale_order_sequence',$sale_order_sequence)
              ->with('customers',$customers)
              ->with('exchange_rate_reil',$exchange_rate_reil)
              ->with('item_status',$item_status)
              ->with('Units',$Units)
              ->with('unitGroups',$unitGroups)
              ->with('currency',$currency);
    }

    // Sale Order
    public function edit($id){
      $exchange_rate_reil = Helpers::getReilFraction()*100;
      $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $item_sub_category = ItemSubCategory::Where('is_delete',0)->Lists('name','id');
      $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $Items = Item::Where('is_delete',0)->lists('name','id');
      $Units = Unit::Where('is_delete',0)->lists('name','id');
      $currency = Currency::lists('name','id');
      $unitGroups = Unit::all();
      $customers = customer::lists('name','id');
      $sale_order_sequence = $this->getSaleOrdersequence();
      $customer_groups = CustomerGroup::lists('name','id');

      $SaleOrders = SaleOrder::Where('id',$id)->first();
      $SaleOrderDetails = SaleOrderDetail::Where('sale_order_id',$id)->get();
      return view('admin.sale_mgr.sale_order.form')
              ->with('customer_groups',$customer_groups)
              ->with('item_category',$item_category)
              ->with('item_sub_category',$item_sub_category)
              ->with('item_type',$item_type)
              ->with('Items',$Items)
              ->with('SaleOrders',$SaleOrders)
              ->with('SaleOrderDetails',$SaleOrderDetails)
              ->with('sale_order_sequence',$sale_order_sequence)
              ->with('customers',$customers)
              ->with('exchange_rate_reil',$exchange_rate_reil)
              ->with('item_status',$item_status)
              ->with('Units',$Units)
              ->with('unitGroups',$unitGroups)
              ->with('currency',$currency);
    }

    public function update(Request $request, $id)
    {
      $input = $request->all();
      if($this->chkSaleOrderApprove($id)==null){
        if(isset($input['is_approve'])&&($input['is_approve']=='on')) $input['is_approve'] = 1;
        else $input['is_approve'] = 0;
       
        $SaleOrder = SaleOrder::find($id);
        $SaleOrder->update([
          'branch_id' => $this->DefaultBranch(),
          'sale_order_no' => Input::get('sale_order_no'),
          'sale_order_date' => Input::get('sale_order_date'),
          'customer_id' => Input::get('customer_id'),
          'description' => Input::get('description'),
          'sub_total' => Input::get('sub_total'),
          'discount' => Input::get('sub_discount'),
          'vat_percentage' => TAX,
          'grand_total' => Input::get('grand_total'),
          'expired_date' => Input::get('expired_date'),
          'is_approve' => $input['is_approve'],
          'updated_by' => Auth::user()->id
        ]);

        if(isset($input['item_id'])){
          $QuoteDetail = SaleOrderDetail::Where('sale_order_id',$id)->delete();
          $barcode_count = count($input['item_id']);
          for($i=0;$i<=$barcode_count-1;$i++){
            SaleOrderDetail::insert(
              [
                'branch_id' => $this->DefaultBranch(),
                'sale_order_id' => $id,
                'sale_order_qty' => $input['sale_order_qty'][$i],
                'unit_id' => $input['unit_id'][$i],
                'whole_sale_price' => $input['price_dollar'][$i],
                'sale_order_price' => $input['price_dollar'][$i],
                'item_id' => $input['item_id'][$i],
                'total' => $input['total'][$i],
                'remark' => $input['remark'][$i]
              ]
            );
          }
        }

        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect()->back()->with('message','Save Successfully');
      }else{
        return redirect()->back()->with('message','SaleOrder has been approved, so cannot update!');
      }
    }

    public function printInvoice(Request $request, $id){
      $Company=Company::first();
      $dataCompany = '';
      if($Company){
        $dataCompany = $Company;
      }

      $SaleOrders = SaleOrder::Where('id',$id)->first();      
      $customerInfo = array(
        'name' => $SaleOrders->Customer->name,
        'phone' => $SaleOrders->Customer->phone,
        'email' => $SaleOrders->Customer->email,
        'address' => $SaleOrders->Customer->address
      );
      $SaleOrderDetails = DB::table('sale_order_detail as sod')
                          ->select('sod.*', 'i.name as item_name', 'i.item_barcode', 'u.name as unit')
                          ->join('item as i', 'i.id', '=', 'sod.item_id')
                          ->join('unit as u', 'u.id', '=', 'sod.unit_id')
                          ->where('sod.sale_order_id',$id)
                          ->get();

      return view('admin.sale_mgr.sale_order._print_invoice')
              ->with('SaleOrders',$SaleOrders)
              ->with('customerInfo', $customerInfo)
              ->with('SaleOrderDetails',$SaleOrderDetails)
              ->with('Company',$dataCompany);
    }
    
    public function chkSaleOrderApprove($id){
      $boolen=1;
      $sql = SaleOrder::Where('id',$id)->Select('is_approve')->first();
      if($sql->is_approve==1){
        $boolen=1;
      }else{
        $boolen=0;
      }
      return $boolen;
    }

    // getData
    public function getData(){
      $Customers = Customer::Where('is_delete',0)->OrderBy('name')->get();
      $Customer_Array = array();
      foreach ($Customers as $Customer) {
        $Customer_Array[] = array(
          'id' => $Customer->id,
          'name' => $Customer->name
        );
      }
      return $Customer_Array;
    }

    public function destroy($id)
    {
      if($this->chkSaleOrderApprove($id)==null){
        //##########Set Event for ActivityLog############
        $this->ActivityLog('void');
        $SaleOrder = SaleOrder::find($id);
        $SaleOrder->update([
          'is_void' => 1,
        ]); 
        return redirect()->back()->with('message','Sorry you cannot void this approval quotation.');
      }else{
        return redirect()->back()->with('message','SaleOrder is voided successfully.');
      }
      
    }
}
