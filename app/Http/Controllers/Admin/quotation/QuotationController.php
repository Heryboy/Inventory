<?php 
namespace App\Http\Controllers\Admin\quotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\quotation\Quotation;
use App\Models\Admin\quotation\QuotationDetail;
use App\Models\Admin\sale_mgr\SaleOrder;
use App\Models\Admin\sale_mgr\SaleOrderDetail;
use App\Models\Admin\sale_mgr\SaleOrderSequence;
use App\Models\Admin\item_mgr\ItemBaseStore;
use App\Models\Admin\setup_mgr\Company;
use App\Models\Admin\customer_mgr\customer\customer;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\ItemSubCategory;
use App\Models\Admin\setup_mgr\ItemType;
use App\Models\Admin\setup_mgr\ItemStatus;
use App\Models\Admin\setup_mgr\Currency;
use App\Models\Admin\setup_mgr\Unit;
use App\Models\Admin\customer_mgr\customer_group\CustomerGroup;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Helpers;
use Auth;
use Session;

class QuotationController extends Controller
{
    public $view_title = "quotation/quotation.entry_title";
    public $action = "Edit";
    
    public function __construct()
    {
       
    }

    // QuotationList
    public function index(){
      $Quotations = Quotation::WhereNull('is_void')->get();
      $getData_arr = $this->getData();
      return view('admin.quotation.quotation_list')->with('Quotations',$Quotations)
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

      $QuotationLastId = Quotation::insertGetId([
        'branch_id' => $this->DefaultBranch(),
        'quotation_no' => Input::get('quotation_no'),
        'quotation_date' => Input::get('quotation_date'),
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
      $this->updateSequence($QuotationLastId);

      // barcode
      $i=0;
      if(isset($input['item_id'])){
        $barcode_count = count($input['item_id']);
        for($i=0;$i<=$barcode_count-1;$i++){
          QuotationDetail::insert(
            [
              'branch_id' => $this->DefaultBranch(),
              'quotation_id' => $QuotationLastId,
              'quotation_qty' => $input['quotation_qty'][$i],
              'unit_id' => $input['unit_id'][$i],
              'whole_sale_price' => $input['price_dollar'][$i],
              'quotation_price' => $input['price_dollar'][$i],
              'item_id' => $input['item_id'][$i],
              'total' => $input['total'][$i],
              'remark' => $input['remark'][$i]
            ]
          );
        }
      }
      return redirect()->back()->with('message','Save Successfully');
    }

    // send2SaleOrder
    public function send2SaleOrder(Request $request){
      $input = $request->all();
      $boolen=0;
      $qid = $input['qid'];
      $is_sale_order = $input['is_sale_order'];

      // is sale order =1 cannot send this quotation to sale order

      if($is_sale_order==1){
        $boolen=0;
      }else{
        Quotation::Where('id',$qid)->Update(['is_sale_order'=>1]);
        $quotation = Quotation::Where('id',$qid)->first();
        $sale_order_sequence = $this->getSaleOrdersequence();
        $SaleOrderLastId = SaleOrder::insertGetId([
          'sale_order_no'=>$sale_order_sequence,
          'quotation_no'=>$quotation->quotation_no,
          'invoice_no'=>$this->getInvoiceSequence(),
          'sale_order_date'=>$this->DateNow(),
          'customer_id'=>$quotation->customer_id,
          'description'=>$quotation->description,
          'sub_total'=>$quotation->sub_total,
          'discount'=>$quotation->discount,
          'vat_percentage'=>$quotation->vat_percentage,
          'grand_total'=>$quotation->grand_total,
          'is_void'=>$quotation->is_void,
          'is_cancel'=>$quotation->is_cancel,
          'branch_id'=>$quotation->branch_id,
          'expired_date'=>$quotation->expired_date,
          'created_at'=>$this->DateNow(),
          'updated_at'=>$this->DateNow(),
          'created_by'=>$quotation->created_by,
          'updated_by'=>$quotation->updated_by,
          'is_approve'=>$quotation->is_approve
        ]);

        $query = DB::table('quotation_detail')->Where('quotation_id',$qid)->get();
        // dd($query);
        foreach($query as $row){
          // echo $row->quotation_id;
          SaleOrderDetail::Insert([
            'sale_order_id'=>$SaleOrderLastId,
            'branch_id'=>$row->branch_id, 
            'unit_id'=>$row->unit_id, 
            'sale_order_date'=>$row->quotation_date,
            'sale_order_qty'=>$row->quotation_qty,
            'comp_qty'=>$row->comp_qty,
            'void_qty'=>$row->void_qty,
            'item_id'=>$row->item_id,
            'retailer_price'=>$row->retailer_price,
            'whole_sale_price'=>$row->whole_sale_price,
            'discount_amount'=>$row->discount_amount,
            'sale_order_price'=>$row->quotation_price,
            'whole_sell_unit'=>$row->whole_sell_unit,
            'retail_unit'=>$row->retail_unit,
            'total'=>$row->total,
            'remark'=>$row->remark
          ]);
        }
        
        $this->UpdateInvoiceSequence();
        $this->UpdateSaleOrderSequence();
        $boolen=1;
      }
        return json_encode($boolen);
    }

    // update sequence
    public function updateSequence($id){
      $sequence_no = $id+1;
      DB::table("quotation_sequence")->update([
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

      $quote_sequence = $this->getQuotationSequence();

      $customer_groups = CustomerGroup::lists('name','id');
      return view('admin.quotation.quotation_form')
              ->with('customer_groups',$customer_groups)
              ->with('item_category',$item_category)
              ->with('item_sub_category',$item_sub_category)
              ->with('item_type',$item_type)
              ->with('Items',$Items)
              ->with('quote_sequence',$quote_sequence)
              ->with('customers',$customers)
              ->with('exchange_rate_reil',$exchange_rate_reil)
              ->with('item_status',$item_status)
              ->with('Units',$Units)
              ->with('unitGroups',$unitGroups)
              ->with('currency',$currency);
    }

    // QuotationEdit
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
      $quote_sequence = $this->getQuotationSequence();
      $customer_groups = CustomerGroup::lists('name','id');

      $Quotations = Quotation::Where('id',$id)->first();
      $QuotationDetails = QuotationDetail::Where('quotation_id',$id)->get();
      return view('admin.quotation.quotation_form')
              ->with('customer_groups',$customer_groups)
              ->with('item_category',$item_category)
              ->with('item_sub_category',$item_sub_category)
              ->with('item_type',$item_type)
              ->with('Items',$Items)
              ->with('Quotations',$Quotations)
              ->with('QuotationDetails',$QuotationDetails)
              ->with('quote_sequence',$quote_sequence)
              ->with('customers',$customers)
              ->with('exchange_rate_reil',$exchange_rate_reil)
              ->with('item_status',$item_status)
              ->with('Units',$Units)
              ->with('unitGroups',$unitGroups)
              ->with('currency',$currency);
    }

    // QuotationEdit
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
      $quote_sequence = $this->getQuotationSequence();
      $customer_groups = CustomerGroup::lists('name','id');

      $Quotations = Quotation::Where('id',$id)->first();
      $QuotationDetails = QuotationDetail::Where('quotation_id',$id)->get();
      return view('admin.quotation.quotation_form')
              ->with('customer_groups',$customer_groups)
              ->with('item_category',$item_category)
              ->with('item_sub_category',$item_sub_category)
              ->with('item_type',$item_type)
              ->with('Items',$Items)
              ->with('Quotations',$Quotations)
              ->with('QuotationDetails',$QuotationDetails)
              ->with('quote_sequence',$quote_sequence)
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
      if($this->chkQuoteApprove($id)==null){
        if(isset($input['is_approve'])&&($input['is_approve']=='on')) $input['is_approve'] = 1;
        else $input['is_approve'] = 0;
       
        $Quotation = Quotation::find($id);
        $Quotation->update([
          'branch_id' => $this->DefaultBranch(),
          'quotation_no' => Input::get('quotation_no'),
          'quotation_date' => Input::get('quotation_date'),
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
          $QuoteDetail = QuotationDetail::Where('quotation_id',$id)->delete();
          $barcode_count = count($input['item_id']);
          for($i=0;$i<=$barcode_count-1;$i++){
            QuotationDetail::insert(
              [
                'branch_id' => $this->DefaultBranch(),
                'quotation_id' => $id,
                'quotation_qty' => $input['quotation_qty'][$i],
                'unit_id' => $input['unit_id'][$i],
                'whole_sale_price' => $input['price_dollar'][$i],
                'quotation_price' => $input['price_dollar'][$i],
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
        return redirect()->back()->with('message','Quotation has been approved, so cannot update!');
      }
    }

    public function printInvoice(Request $request, $id){
      $Company=Company::first();
      $dataCompany = '';
      if($Company){
        $dataCompany = $Company;
      }

      $Quotations = Quotation::Where('id',$id)->first();     
      $customerInfo = array(
        'name' => $Quotations->Customer->name,
        'phone' => $Quotations->Customer->phone,
        'email' => $Quotations->Customer->email,
        'address' => $Quotations->Customer->address
      ); 
      $QuotationDetails = DB::table('quotation_detail as qd')
                          ->select('qd.*', 'i.name as item_name', 'i.item_barcode', 'u.name as unit')
                          ->join('item as i', 'i.id', '=', 'qd.item_id')
                          ->join('unit as u', 'u.id', '=', 'qd.unit_id')
                          ->where('qd.quotation_id',$id)
                          ->get();
      return view('admin.quotation._print_quotation')
              ->with('Quotations',$Quotations)
              ->with('customerInfo', $customerInfo)
              ->with('QuotationDetails',$QuotationDetails)
              ->with('Company',$dataCompany);
    }

    public function chkQuoteApprove($id){
      $boolen=1;
      $sql = Quotation::Where('id',$id)->Select('is_approve')->first();
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
      if($this->chkQuoteApprove($id)==null){
        //##########Set Event for ActivityLog############
        $this->ActivityLog('void');
        $qutation = Quotation::find($id);
        $qutation->update([
          'is_void' => 1,
        ]); 
        return redirect()->back()->with('message','Sorry you cannot void this approval quotation.');
      }else{
        return redirect()->back()->with('message','Quotation is voided successfully.');
      }
      
    }
}
