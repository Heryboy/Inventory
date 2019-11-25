<?php namespace App\Http\Controllers\Admin\transfer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\ItemSubCategory;
use App\Models\Admin\setup_mgr\ItemType;
use App\Models\Admin\setup_mgr\ItemStatus;
use App\Models\Admin\setup_mgr\Currency;
use App\Models\Admin\setup_mgr\Unit;
use App\Models\Admin\setup_mgr\BranchGroup;
use App\Models\Admin\setup_mgr\Branch;
use App\Models\Admin\transfer\Transfer;
use App\Models\Admin\transfer\TransferDetail;
use App\Models\Admin\transfer\TransferSequence;
use App\Http\Requests\transfer\TransferRequest;
use DB;
use Auth;
use Session;
use Helpers;

class TransferController extends Controller
{

  public $view_title = "transfer/transfer.entry_title";

  public function __construct(){
      
  }

  public function index()
  {
    $getData_arr = $this->getData();
    $Transfer =Transfer::Where('is_cancel',0)->OrderBy('id','DESC')->get();
    return view("admin.transfer.index")->with('getData_arr',$getData_arr)
                                        ->with('Transfer',$Transfer)
                                        ->with('view_title',$this->view_title);
  }

  public function create()
  {
    $getData_arr = $this->getData();
    $exchange_rate_reil = Helpers::getReilFraction();
    $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
    $item_sub_category = ItemSubCategory::Where('is_delete',0)->Lists('name','id');
    $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
    $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
    $Items = Item::Where('is_delete',0)->lists('name','id');
    $Units = Unit::Where('is_delete',0)->lists('name','id');
    $currency = Currency::lists('name','id');
    $unitGroups = Unit::all();
    $Branches = Branch::lists('branch_name','id');
    return view("admin.transfer.form")->with('getData_arr',$getData_arr)
                                      ->with('Items',$Items)
                                      ->with('Units',$Units)
                                      ->with('TransferSequence',$this->getTransferSequence())
                                      ->with('Branches',$Branches)
                                      ->with('currency',$currency)
                                      ->with('item_category',$item_category)
                                      ->with('exchange_rate_reil',$exchange_rate_reil)
                                      ->with('view_title',$this->view_title)
                                      ->with('current_date',date('Y-m-d'))
                                      ->with('default_branch',$this->DefaultBranch());
  }

  public function edit($id)
  {
    $getData_arr = $this->getData();
    $exchange_rate_reil = Helpers::getReilFraction();
    $Transfer =Transfer::findOrFail($id);
    $TransferDetail = TransferDetail::Where('transfer_id',$id)->get();
    $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
    $Items = Item::Where('is_delete',0)->lists('name','id');
    $Branches = Branch::lists('branch_name','id');
    $Units = Unit::Where('is_delete',0)->lists('name','id');
    $currency = Currency::lists('name','id');
    $unitGroups = Unit::all();
    return view("admin.transfer.form")->with('getData_arr',$getData_arr)
                                        ->with('Transfer',$Transfer)
                                        ->with('Items',$Items)
                                        ->with('Units',$Units)
                                        ->with('currency',$currency)
                                        ->with('Branches',$Branches)
                                        ->with('TransferDetail',$TransferDetail)
                                        ->with('exchange_rate_reil',$exchange_rate_reil)
                                        ->with('item_category',$item_category)
                                        ->with('view_title',$this->view_title);
  }

  
  public function getReilCurrency(){
    $Currency = Currency::Where('id',2)->Select('exchange_rate')->first();
    return $Currency->exchange_rate;
  }

  // store
  public function store(TransferRequest $request)
  {
    $input = $request->all();
    // dd($input);
    if(isset($input['is_transfered'])&&($input['is_transfered']=='on')) $input['is_transfered'] = 1;
    else $input['is_transfered'] = 0;

     if(isset($input['is_received'])&&($input['is_received']=='on')) $input['is_received'] = 1;
    else $input['is_received'] = 0;

    $TransferSequence = TransferSequence::Where('id',1)->first();
    $sequence_no = $TransferSequence->sequence_no+1;
    TransferSequence::Where('id',1)->Update(['sequence_no'=>($sequence_no)]);
    // Transfer
    $Transfer = Transfer::create([
      'from_branch_id'=>$input['from_branch_id'],
      'to_branch_id'=>$input['to_branch_id'],
      'transfer_no'=>$input['transfer_no'],
      // 'voucher_no'=>$input['voucher_no'],
      'transfer_date'=>$this->FormatDate($input['transfer_date']),
      'transferor'=>$input['transferor'],
      'receiver'=>$input['receiver'],
      'description'=>$input['description'],
      'is_transfered'=>$input['is_transfered'],
      'created_by'=>Auth::user()->id,
      'is_received'=>$input['is_received']
    ]);
    $LastTransferId = $Transfer->id;
    if(isset($input['item_id'])){
      for($i = 0; $i <=sizeof($input['item_id'])-1 ; $i++){
        // ItemConversion
        DB::table('transfer_detail')->insert(
                [
                  'transfer_id' => $LastTransferId,
                  'unit_id'   => $input['unit_id'][$i],
                  'item_id'   => $input['item_id'][$i],
                  'qty'    => $input['qty'][$i],
                  // 'total'    => $input['total'][$i],
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
  public function update(TransferRequest $request, $id){
    $input = $request->all();

    // dd($input);
    if(isset($input['is_transfered'])&&($input['is_transfered']=='on')) $input['is_transfered'] = 1;
    else $input['is_transfered'] = 0;

     if(isset($input['is_received'])&&($input['is_received']=='on')) $input['is_received'] = 1;
    else $input['is_received'] = 0;
    // dd($input);
    $input['updated_by'] = Auth::user()->id;
    if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
    else $input['is_active'] = 0;
    $Transfer = Transfer::find($id);
    $Transfer->update([
        'from_branch_id'=>$input['from_branch_id'],
        'to_branch_id'=>$input['to_branch_id'],
        'transfer_no'=>$input['transfer_no'],
        // 'voucher_no'=>$input['voucher_no'],
        'transfer_date'=>$this->FormatDate($input['transfer_date']),
        'transferor'=>$input['transferor'],
        'receiver'=>$input['receiver'],
        'description'=>$input['description'],
        'is_transfered'=>$input['is_transfered'],
        'updated_by'=>Auth::user()->id,
        'is_received'=>$input['is_received']
      ]);  
    //##########Set Event for ActivityLog############
    $this->ActivityLog('update');
    return redirect()->back()->with('message','Update successfully.');
  }

  public function destroy($id)
  {
    //##########Set Event for ActivityLog############
    $this->ActivityLog('cancel');
    $Transfer=Transfer::find($id)->update(['is_cancel'=>1]);
    return redirect()->back()->with('message','Cancel successfully');
  }

}
