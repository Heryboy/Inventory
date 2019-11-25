<?php 
namespace App\Http\Controllers\Admin\item_mgr\item_in_stock;

use Illuminate\Http\Request;
use App\Http\Requests\item_mgr\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\item_mgr\ItemBaseStore;
use App\Models\Admin\setup_mgr\BranchGroup;
use App\Models\Admin\setup_mgr\Branch;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\ItemType;
use App\Models\Admin\setup_mgr\ItemStatus;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class ItemInStockController extends Controller
{
    public $view_title = "item_mgr/item_in_stock.entry_title";
    public $action = "Edit";

    public function __construct(){

    }
    /*
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
      // #################
      $items = Item::Where('is_delete',0)->OrderBy('id','DESC')->get();
      $ItemCategory = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $Branch = Branch::Where('is_delete',0)->Lists('branch_name','id');
      $default_branch = $this->DefaultBranch();
      $filter_name='';
      $filter_date=date('Y-m-d');
      $start_date=date('Y-m-d');
      $end_date=date('Y-m-d');
      if(isset($_REQUEST['from_date'])&&isset($_REQUEST['to_date'])){
        $start_date = $_REQUEST['from_date'];
        $end_date = $_REQUEST['to_date'];
      }
      if(isset($_REQUEST['branch_id'])){
        $branchid = $_REQUEST['branch_id'];
      }else{
        $branchid = $this->DefaultBranch();
      }

      $ItemInStocks = DB::select( 
                            DB::raw("
                              SELECT DISTINCT 
                              itb.item_id,
                              i.item_code,
                              i.name AS item_name, 
                              i.id as item_id,
                              u1.name AS unit,
                              u1.id as unit_id,

                              (SELECT DISTINCT SUM(POD.qty) FROM ".env('DB_PREFIX')."purchase_order PO JOIN ".env('DB_PREFIX')."purchase_order_detail POD ON PO.id=POD.pi_id  WHERE DATE_FORMAT(PO.po_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND POD.item_id=itb.item_id AND POD.unit_id=u1.id) as purchase_qty,

                              (SELECT DISTINCT SUM(TD.qty) FROM ".env('DB_PREFIX')."transfer T JOIN ".env('DB_PREFIX')."transfer_detail TD ON T.id=TD.transfer_id WHERE DATE_FORMAT(T.transfer_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND TD.item_id=itb.item_id AND TD.unit_id=u1.id) as transfer_qty,

                              (SELECT DISTINCT SUM(adjust_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u1.id) as adjust_qty,

                              (SELECT DISTINCT SUM(PCOD.qty) FROM ".env('DB_PREFIX')."pos_cus_orders PCO JOIN ".env('DB_PREFIX')."pos_cus_order_details PCOD ON PCO.id=PCOD.pos_order_id WHERE DATE_FORMAT(PCO.check_out_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND PCO.status_id=4 AND PCOD.item_id=itb.item_id AND PCOD.unit_id=u1.id) as sale_qty,

                              (SELECT DISTINCT SUM(SOD.sale_order_qty) FROM ".env('DB_PREFIX')."sale_order SO JOIN ".env('DB_PREFIX')."sale_order_detail SOD ON SO.id=SOD.sale_order_id  WHERE DATE_FORMAT(SO.sale_order_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND SOD.item_id=itb.item_id AND SOD.unit_id=u1.id) as sale_order_qty


                              FROM ".env('DB_PREFIX')."item_conversion ic
                              LEFT JOIN ".env('DB_PREFIX')."item i ON i.id = ic.item_id
                              LEFT JOIN ".env('DB_PREFIX')."unit u1 ON u1.id = ic.unit1
                              LEFT JOIN ".env('DB_PREFIX')."item_base_branch itb ON itb.item_id = i.id
                              WHERE itb.branch_id=".(int)$branchid."
                            
                              GROUP BY itb.item_id
                              
                              UNION ALL
                              
                              SELECT DISTINCT 
                              itb.item_id,
                              i.item_code,
                              i.name AS item_name, 
                              i.id as item_id,
                              u2.name AS unit,
                              u2.id as unit_id,

                              (SELECT DISTINCT SUM(POD.qty) FROM ".env('DB_PREFIX')."purchase_order PO JOIN ".env('DB_PREFIX')."purchase_order_detail POD ON PO.id=POD.pi_id  WHERE DATE_FORMAT(PO.po_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND POD.item_id=itb.item_id AND POD.unit_id=u2.id) as purchase_qty,

                              (SELECT DISTINCT SUM(TD.qty) FROM ".env('DB_PREFIX')."transfer T JOIN ".env('DB_PREFIX')."transfer_detail TD ON T.id=TD.transfer_id WHERE DATE_FORMAT(T.transfer_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND TD.item_id=itb.item_id AND TD.unit_id=u2.id) as transfer_qty,

                              (SELECT DISTINCT SUM(adjust_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u2.id) as adjust_qty,

                              (SELECT DISTINCT SUM(PCOD.qty) FROM ".env('DB_PREFIX')."pos_cus_orders PCO JOIN ".env('DB_PREFIX')."pos_cus_order_details PCOD ON PCO.id=PCOD.pos_order_id WHERE DATE_FORMAT(PCO.check_out_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND PCO.status_id=4 AND PCOD.item_id=itb.item_id AND PCOD.unit_id=u2.id) as sale_qty,

                              (SELECT DISTINCT SUM(SOD.sale_order_qty) FROM ".env('DB_PREFIX')."sale_order SO JOIN ".env('DB_PREFIX')."sale_order_detail SOD ON SO.id=SOD.sale_order_id  WHERE DATE_FORMAT(SO.sale_order_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND SOD.item_id=itb.item_id AND SOD.unit_id=u2.id) as sale_order_qty

                              FROM ".env('DB_PREFIX')."item_conversion ic
                              LEFT JOIN ".env('DB_PREFIX')."item i ON i.id = ic.item_id
                              LEFT JOIN ".env('DB_PREFIX')."unit u2 ON u2.id = ic.unit2
                              LEFT JOIN ".env('DB_PREFIX')."item_base_branch itb ON itb.item_id = i.id
                              WHERE itb.branch_id=".(int)$branchid."
                              GROUP BY itb.item_id
                            "));

      $getData_arr = $this->getData();

      return view('admin.item_mgr.item_in_stock.index')
                  ->With('ItemCategory',$ItemCategory)
                  ->with('getData_arr',$getData_arr)
                  ->With('Branch',$Branch)
                  ->With('ItemInStocks',$ItemInStocks)
                  ->With('start_date',$start_date)
                  ->With('end_date',$end_date)
                  ->With('items',$items);
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
      return view('admin.item_mgr.item_in_stock.form')  
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
      return redirect("admin/item_mgr/item")->with('message','Save Successfully');
    }

    public function show($id)
    {
      
      $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');       
      $item = Item::findOrFail($id);
      return view('admin.item_mgr.item.form')->with('item',$item)
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
      return view('admin.item_mgr.item.form')->with('item',$item)
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
