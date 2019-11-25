<?php namespace App\Http\Controllers\Admin\sale_mgr;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\customer_mgr\customer\customer;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\ItemSubCategory;
use App\Models\Admin\setup_mgr\ItemType;
use App\Models\Admin\setup_mgr\ItemStatus;
use App\Models\Admin\setup_mgr\Currency;
use App\Models\Admin\setup_mgr\Unit;
use App\Models\Admin\setup_mgr\BranchGroup;
use App\Models\Admin\setup_mgr\Branch;
use App\Models\Admin\sale_mgr\ReturnItem;
use App\Models\Admin\sale_mgr\ReturnSequence;
use App\Models\Admin\sale_mgr\ReturnDetail;
use App\Http\Requests\sale_mgr\ReturnRequest;
use DB;
use Auth;
use Session;
use Helpers;

class ReturnController extends Controller
{
  
  public $view_title = "sale_mgr/return.entry_title";

  public function __construct(){
    
  }

  public function index()
  {    
    $getData_arr = $this->getData();
    $Return = ReturnItem::OrderBy('id','DESC')->get();
    return view("admin.sale_mgr.return.index")->with('getData_arr',$getData_arr)
                                              ->with('Return',$Return)
                                              ->with('view_title',$this->view_title);
  }

  public function create()
  {
    $getData_arr = $this->getData();
    $exchange_rate_reil = Helpers::getReilFraction();
    $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
    $Items = Item::Where('is_delete',0)->lists('name','id');
    $Branches = Branch::lists('branch_name','id');
    $Units = Unit::Where('is_delete',0)->lists('name','id');
    $currency = Currency::lists('name','id');
    $unitGroups = Unit::all();
    $customers = customer::lists('name','id');
    $ReturnSequence = $this->getReturnSequence();
    return view("admin.sale_mgr.return.form")->with('getData_arr',$getData_arr)
                                        ->with('customers',$customers)
                                        ->with('Items',$Items)
                                        ->with('Units',$Units)
                                        ->with('currency',$currency)
                                        ->with('Branches',$Branches)
                                        ->with('ReturnSequence',$ReturnSequence)
                                        ->with('current_date',Date('Y-m-d'))
                                        ->with('exchange_rate_reil',$exchange_rate_reil)
                                        ->with('item_category',$item_category)
                                        ->with('view_title',$this->view_title)
                                        ->with('default_branch',$this->DefaultBranch());
  }

  public function edit($id)
  {
    $getData_arr = $this->getData();
    $exchange_rate_reil = Helpers::getReilFraction();
    $Return = ReturnItem::findOrFail($id);
    $ReturnDetail = ReturnDetail::Where('return_id',$id)->get();
    $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
    $Items = Item::Where('is_delete',0)->lists('name','id');
    $Branches = Branch::lists('branch_name','id');
    $Units = Unit::Where('is_delete',0)->lists('name','id');
    $currency = Currency::lists('name','id');
    $unitGroups = Unit::all();
    $customers = customer::lists('name','id');
    return view("admin.sale_mgr.return.form")->with('getData_arr',$getData_arr)
                                        ->with('customers',$customers)
                                        ->with('Return',$Return)
                                        ->with('Items',$Items)
                                        ->with('Units',$Units)
                                        ->with('currency',$currency)
                                        ->with('Branches',$Branches)
                                        ->with('ReturnDetail',$ReturnDetail)
                                        ->with('exchange_rate_reil',$exchange_rate_reil)
                                        ->with('item_category',$item_category)
                                        ->with('view_title',$this->view_title);
  }

  
  public function getReilCurrency(){
    $Currency = Currency::Where('id',2)->Select('exchange_rate')->first();
    return $Currency->exchange_rate;
  }

  // store
  public function store(ReturnRequest $request)
  {
    $input = $request->all();
    // dd($input);
    // dd($input);
    if(isset($input['is_returned'])&&($input['is_returned']=='on')) $input['is_returned'] = 1;
    else $input['is_returned'] = 0;

    $ReturnSequence = ReturnSequence::Where('id',1)->first();
    $sequence_no = $ReturnSequence->sequence_no+1;
    ReturnSequence::Where('id',1)->Update(['sequence_no'=>($sequence_no)]);
    // Return
    $Return = ReturnItem::create($input);
    $LastTransferId = $Return->id;
    if(isset($input['item_id'])){
      for($i = 0; $i <=sizeof($input['item_id'])-1 ; $i++){
        // ReturnDetail
        ReturnDetail::insert(
                [
                  'return_id' => $LastTransferId,
                  'unit_id'   => $input['unit_id'][$i],
                  'item_id'   => $input['item_id'][$i],
                  'qty'    => $input['qty'][$i],
                  'remark'    => $input['remark'][$i]
                ]
              );
      }
    }
    //##########Set Event for ActivityLog############
    $this->ActivityLog('create');
    return redirect()->back()->with('message','Save successfully.');
  }

  // getData
  public function getData(){
    $BranchGroups = BranchGroup::Where('is_delete',0)->OrderBy('branch_group_name')->get();
    $BranchGroup_Array = array();
    foreach ($BranchGroups as $BranchGroup) {
      $BranchGroup_Array[] = array(
        'id' => $BranchGroup->id,
        'name' => $BranchGroup->branch_group_name
      );
    }
    return $BranchGroup_Array;
  }

  // update
  public function update(ReturnRequest $request, $id){
    $input = $request->all();
    // dd($input);
    if(isset($input['is_returned'])&&($input['is_returned']=='on')) $input['is_returned'] = 1;
    else $input['is_returned'] = 0;
    // Return
    $Return = ReturnItem::find($id);
    $Return->update($input);
    $LastTransferId = $Return->id;
    if(isset($input['item_id'])){
      ReturnDetail::Where('return_id',$id)->delete();
      for($i = 0; $i <=sizeof($input['item_id'])-1 ; $i++){
        // ReturnDetail
        ReturnDetail::insert(
                [
                  'return_id' => $LastTransferId,
                  'unit_id'   => $input['unit_id'][$i],
                  'item_id'   => $input['item_id'][$i],
                  'qty'    => $input['qty'][$i],
                  'remark'    => $input['remark'][$i]
                ]
              );
      }
    }
    //##########Set Event for ActivityLog############
    $this->ActivityLog('update');
    return redirect()->back()->with('message','Update successfully.');
  }

  public function destroy($id)
  {
    //##########Set Event for ActivityLog############
    $this->ActivityLog('cancel');
    // $Transfer=Transfer::find($id)->update(['is_cancel'=>1]);
    return redirect()->back()->with('message','Cancel successfully');
  }

}
