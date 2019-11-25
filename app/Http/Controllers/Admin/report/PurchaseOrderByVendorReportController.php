<?php namespace App\Http\Controllers\Admin\report;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\BranchRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\UserModel;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\setup_mgr\BranchGroup;
use App\Models\Admin\setup_mgr\Branch;
use App\Models\Admin\setup_mgr\Company;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\ItemType;
use App\Models\Admin\setup_mgr\ItemStatus;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class PurchaseOrderByVendorReportController extends Controller
{
    public $view_title = "report/purchase_order.entry_title";
    public $action = "Edit";
    
    public function __construct()
    {
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // discount_item VARCHAR(120),
    // sold_qty VARCHAR(120),
  	public function index(){

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

      $purchaseOrderByVendor = $this->getForm($start_date,$end_date,$branchid);

      $getData_arr = $this->getData();

      return view('admin.report.purchase_item.index')
                  ->With('ItemCategory',$ItemCategory)
                  ->with('getData_arr',$getData_arr)
                  ->With('Branch',$Branch)
                  ->with('from_date',date('Y-m-d'))
                  ->with('to_date',date('Y-m-d'))
                  ->With('purchaseOrderByVendor', $purchaseOrderByVendor)
                  ->With('start_date',$start_date)
                  ->With('end_date',$end_date)
                  ->With('items',$items);
  	}

    public function getForm($start_date,$end_date,$branchid){

      $purchaseOrderByVendor = DB::select( 
        DB::raw("
        SELECT 
          v.*,
          i.id AS item_id,
          i.item_code,
          i.name AS item_name,
          i.item_barcode AS item_barcode,
          b.branch_name AS branch_name,
          u.name as unit,
          SUM(pod.qty) AS qty,
          SUM(pod.price) AS price,
          SUM(pod.discount_amount) AS discount_amount,
          SUM(pod.total) AS total_amount,
          u.name AS unit_name 
          FROM ".env('DB_PREFIX')."purchase_order_detail pod
          JOIN ".env('DB_PREFIX')."purchase_order po ON po.id = pod.po_id
          JOIN ".env('DB_PREFIX')."item i ON i.id = pod.item_id
          JOIN ".env('DB_PREFIX')."unit u ON u.id = pod.unit_id
          JOIN ".env('DB_PREFIX')."branch b ON b.id = po.branch_id
          JOIN ".env('DB_PREFIX')."vendor v on v.id = po.vendor_id
          WHERE po.branch_id=".(int)$branchid."
          AND DATE_FORMAT(po.po_date,'%Y-%m-%d') 
          BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') 
          AND DATE_FORMAT('".$end_date."','%Y-%m-%d')
          GROUP BY pod.item_id, pod.unit_id
          ORDER BY i.id, i.name
      "));
      $data = [];
      if($purchaseOrderByVendor){
        $data = $purchaseOrderByVendor;
        return $data;
      }else{
        return $data;
      } 
    }
  	
    public function getPrint(){
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
      $Branch = Branch::Where('id',$_REQUEST['branch_id'])->first();
      $purchaseOrderByVendor = $this->getForm($start_date,$end_date,$branchid);

      return view('admin.report.purchase_item.print')->with('Branch',$Branch->branch_name)->with('purchaseOrderByVendor',$purchaseOrderByVendor);

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

    public function _index()
    {
      $Users = UserModel::lists('username','id');
      $Branches = Branch::lists('branch_name','id');

      $branch_id = $this->DefaultBranch();
      $is_approve = 1;
      $status = 4;//means item is ordered and paid
      $start_date = '2017-10-01';
      $end_date = '2017-11-20';
      $SaleDetailReports = DB::select( 
                          DB::raw("
                           SELECT i.retail as retail_price,B.branch_name as branch_name,i.item_code,u.name as unit_name,i.name as item_name,(COALESCE(SUM(PCOD.price),0) + (SELECT DISTINCT COALESCE(SUM(SOD.sale_order_price),0)*(COALESCE(SUM(SOD.sale_order_qty),0))  FROM ".env('DB_PREFIX')."sale_order SO JOIN ".env('DB_PREFIX')."sale_order_detail SOD ON SOD.sale_order_id=SO.id WHERE SOD.item_id=i.id AND SOD.unit_id=u.id AND SOD.branch_id=".(int)$branch_id." AND SO.is_approve=".(int)$is_approve." AND SO.sale_order_date BETWEEN '".$start_date."' AND '".$end_date."')) as total_price,

                            (SELECT DISTINCT (COALESCE(SUM(SOD.discount_amount),0))  FROM ".env('DB_PREFIX')."sale_order SO JOIN ".env('DB_PREFIX')."sale_order_detail SOD ON SOD.sale_order_id=SO.id WHERE SOD.item_id=i.id AND SOD.unit_id=u.id AND SOD.branch_id=".(int)$branch_id." AND SO.is_approve=".(int)$is_approve." AND SO.sale_order_date BETWEEN '".$start_date."' AND '".$end_date."') as discount_item,

                            (COALESCE(SUM(PCOD.qty),0)+(SELECT DISTINCT (COALESCE(SUM(SOD.sale_order_qty),0))  FROM ".env('DB_PREFIX')."sale_order SO JOIN ".env('DB_PREFIX')."sale_order_detail SOD ON SOD.sale_order_id=SO.id WHERE SOD.item_id=i.id AND SOD.unit_id=u.id AND SOD.branch_id=".(int)$branch_id." AND SO.is_approve=".(int)$is_approve." AND SO.sale_order_date BETWEEN '".$start_date."' AND '".$end_date."')) as sold_qty
                            
                              FROM ".env('DB_PREFIX')."pos_cus_orders as PCO
                              JOIN ".env('DB_PREFIX')."pos_cus_order_details PCOD ON PCO.id=PCOD.pos_order_id
                              JOIN ".env('DB_PREFIX')."item i ON i.id=PCOD.item_id
                              JOIN ".env('DB_PREFIX')."unit as u on u.id=i.default_unit 
                              JOIN ".env('DB_PREFIX')."branch B on B.id=".(int)$branch_id."
                              WHERE PCO.status_id=".(int)$status."
                              AND PCO.check_out_date BETWEEN '".$start_date."' AND '".$end_date."'
                              GROUP BY PCOD.item_id"));
      
      // dd($SaleDetailReports);
      return view('admin.report.revenue_reports.sale_detail.index')
              ->with('Users',$Users)
              ->with('from_date',date('Y-m-d'))
              ->with('to_date',date('Y-m-d'))
              ->with('SaleDetailReports',$SaleDetailReports)
              ->with('Branches',$Branches);
                // ->with('branches',$branches);
    }
}
