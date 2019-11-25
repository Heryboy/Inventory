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
use App\Models\Admin\stock_mgr\AdjustmentStockDate;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class SalePOSItemByDrawerReportController extends Controller
{
    public $view_title = "report/sale_pos_item_by_drawer.entry_title";
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
      $Users = UserModel::Where('is_delete',0)->Lists('username','id');
      $Branch = Branch::Where('is_delete',0)->Lists('branch_name','id');
      $default_branch = $this->DefaultBranch();
      $filter_name='';
      $filter_date=date('Y-m-d');

      $lastDoAdjustmentStock = AdjustmentStockDate::orderBy('id', 'desc')->first();
      $start_date=date('Y-m-d');
      if(isset($lastDoAdjustmentStock)){
        $start_date = $lastDoAdjustmentStock->adjust_stock_date;
      }
      $end_date=date('Y-m-d');
      if(isset($_REQUEST['from_date']) && isset($_REQUEST['to_date'])){
        $start_date = $_REQUEST['from_date'];
        $end_date = $_REQUEST['to_date'];
      }
      if(isset($_REQUEST['branch_id'])){
        $branchid = $_REQUEST['branch_id'];
      }else{
        $branchid = $this->DefaultBranch();
      }
      if(isset($_REQUEST['user_id'])){
        $user_id = $_REQUEST['user_id'];
      }else{
        $user_id = null;
      }

      $saleItems = $this->getForm($start_date,$end_date,$branchid);

      $getData_arr = $this->getData();

      return view('admin.report.sale_pos_item_by_drawer.index')
                  ->With('ItemCategory',$ItemCategory)
                  ->with('getData_arr',$getData_arr)
                  ->with('users', $Users)
                  ->With('Branch',$Branch)
                  ->with('branchid', $branchid)
                  ->with('from_date',$start_date)
                  ->with('to_date', $end_date)
                  ->With('saleItems', $saleItems)
                  ->With('start_date',$start_date)
                  ->With('end_date',$end_date)
                  ->With('user_id', $user_id)
                  ->With('items',$items);
  	}

    
    public function getForm($start_date, $end_date, $branchid){
      // $SaleItems = DB::select( 
      //   DB::raw("
      //     SELECT 
      //     us.username AS user_drawer_name,
      //     itb.item_id,
      //     i.item_code,
      //     i.name AS item_name, 
      //     i.id as item_id,
      //     u.name AS unit,
      //     u.id as unit_id,
      //     b.branch_name as branch_name,
      //     SUM(pcod.qty) as sale_qty,
      //     SUM(pcod.price) as sale_order_price,
      //     SUM(pcod.discount_amount) as discount_amount,
      //     (SUM(pcod.price) * SUM(pcod.qty)) as grand_total
      //     FROM ".env('DB_PREFIX')."item_conversion ic
      //     LEFT JOIN ".env('DB_PREFIX')."item i ON i.id = ic.item_id
      //     LEFT JOIN ".env('DB_PREFIX')."pos_cus_order_details pcod ON pcod.item_id = i.id
      //     LEFT JOIN ".env('DB_PREFIX')."pos_cus_orders pco ON pco.id = pcod.pos_order_id
      //     LEFT JOIN ".env('DB_PREFIX')."cash_drawer cd ON cd.id = pco.drawer_id
      //     LEFT JOIN ".env('DB_PREFIX')."user us ON us.id = cd.user_id
      //     LEFT JOIN ".env('DB_PREFIX')."unit u ON u.id = ic.unit1
      //     LEFT JOIN ".env('DB_PREFIX')."item_base_branch itb ON itb.item_id = i.id
      //     LEFT JOIN ".env('DB_PREFIX')."branch b ON b.id = ".(int)$branchid."
      //     WHERE itb.branch_id=".(int)$branchid."
      //     AND pco.status_id = 11
      //     AND pcod.unit_id = u.id
      //     AND DATE_FORMAT(pco.check_in_date,'%Y-%m-%d') 
      //     BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') 
      //     AND DATE_FORMAT('".$end_date."','%Y-%m-%d')          
      //     GROUP BY pcod.item_id, pcod.unit_id
      //     ORDER By i.id
      // "));
      $where_clause = "";
      if(isset($_REQUEST['user_id']) && $_REQUEST['user_id'] != null){
        $where_clause .= "AND us.id = ".$_REQUEST['user_id'];
      }

      $SaleItems = DB::select( 
        DB::raw("
          SELECT 
          us.username AS user_drawer_name,
          itb.item_id,
          i.item_code,
          i.name AS item_name, 
          i.id as item_id,
          u.name AS unit,
          u.id as unit_id,
          b.branch_name as branch_name,
          SUM(pcod.qty) as sale_qty,
          SUM(pcod.price) as sale_order_price,
          SUM(pcod.discount_amount) as discount_amount,
          (i.net_price * SUM(pcod.qty)) as total_netprice,
          (pcod.price * SUM(pcod.qty)) as sub_total,
          (SUM(pcod.cost_amount)) as cost_amount
          FROM ".env('DB_PREFIX')."item_conversion ic
          LEFT JOIN ".env('DB_PREFIX')."item i ON i.id = ic.item_id
          LEFT JOIN ".env('DB_PREFIX')."pos_cus_order_details pcod ON pcod.item_id = i.id
          LEFT JOIN ".env('DB_PREFIX')."pos_cus_orders pco ON pco.id = pcod.pos_order_id
          LEFT JOIN ".env('DB_PREFIX')."unit u ON u.id = ic.unit1
          LEFT JOIN ".env('DB_PREFIX')."item_base_branch itb ON itb.item_id = i.id
          LEFT JOIN ".env('DB_PREFIX')."branch b ON b.id = ".(int)$branchid."
          JOIN ".env('DB_PREFIX')."cash_drawer cd ON cd.id = pco.drawer_id
          JOIN ".env('DB_PREFIX')."user us ON us.id = cd.user_id
          WHERE itb.branch_id=".(int)$branchid."
          AND pco.status_id = 11
          AND pcod.unit_id = u.id
          AND DATE_FORMAT(pco.check_in_date,'%Y-%m-%d') 
          BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') 
          AND DATE_FORMAT('".$end_date."','%Y-%m-%d')        
          ".$where_clause."  
          GROUP BY cd.id, pcod.item_id, pcod.unit_id
          ORDER By i.id
      "));

      return $SaleItems;
    }
  	
    public function getPrint(){
      $Company=Company::first();
      $dataCompany = '';
      if($Company){
        $dataCompany = $Company;
      }
      
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
      $saleItems = $this->getForm($start_date,$end_date,$branchid);

      return view('admin.report.sale_pos_item_by_drawer.print')
              ->with('Branch',$Branch->branch_name)
              ->with('Company',$dataCompany)
              ->with('branchid', $branchid)
              ->with('from_date',$start_date)
              ->with('to_date', date('Y-m-d'))
              ->With('start_date',$start_date)
              ->With('end_date',$end_date)
              ->with('saleItems',$saleItems);

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
                           SELECT i.retail as retail_price,B.branch_name as branch_name,i.item_code,u.name as unit_name,i.name as item_name,(COALESCE(SUM(PCOD.price),0) + (SELECT DISTINCT COALESCE(SUM(SOD.sale_order_price),0)*(COALESCE(SUM(SOD.sale_order_qty),0))  FROM tbl_sale_order SO JOIN tbl_sale_order_detail SOD ON SOD.sale_order_id=SO.id WHERE SOD.item_id=i.id AND SOD.unit_id=u.id AND SOD.branch_id=".(int)$branch_id." AND SO.is_approve=".(int)$is_approve." AND SO.sale_order_date BETWEEN '".$start_date."' AND '".$end_date."')) as total_price,

                            (SELECT DISTINCT (COALESCE(SUM(SOD.discount_amount),0))  FROM tbl_sale_order SO JOIN tbl_sale_order_detail SOD ON SOD.sale_order_id=SO.id WHERE SOD.item_id=i.id AND SOD.unit_id=u.id AND SOD.branch_id=".(int)$branch_id." AND SO.is_approve=".(int)$is_approve." AND SO.sale_order_date BETWEEN '".$start_date."' AND '".$end_date."') as discount_item,

                            (COALESCE(SUM(PCOD.qty),0)+(SELECT DISTINCT (COALESCE(SUM(SOD.sale_order_qty),0))  FROM tbl_sale_order SO JOIN tbl_sale_order_detail SOD ON SOD.sale_order_id=SO.id WHERE SOD.item_id=i.id AND SOD.unit_id=u.id AND SOD.branch_id=".(int)$branch_id." AND SO.is_approve=".(int)$is_approve." AND SO.sale_order_date BETWEEN '".$start_date."' AND '".$end_date."')) as sold_qty
                            
                              FROM tbl_pos_cus_orders as PCO
                              JOIN tbl_pos_cus_order_details PCOD ON PCO.id=PCOD.pos_order_id
                              JOIN tbl_item i ON i.id=PCOD.item_id
                              JOIN tbl_unit as u on u.id=i.default_unit 
                              JOIN tbl_branch B on B.id=".(int)$branch_id."
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
