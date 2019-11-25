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

class SaleItemReportController extends Controller
{
    public $view_title = "report/revenue_report.entry_sale_detail";
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

      $lastDoAdjustmentStock = AdjustmentStockDate::orderBy('id', 'desc')->first();
      $start_date=date('Y-m-d');
      if(isset($lastDoAdjustmentStock)){
        $start_date = $lastDoAdjustmentStock->adjust_stock_date;
      }
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

      $saleItems = $this->getForm($start_date, $end_date, $branchid);

      $getData_arr = $this->getData();

      return view('admin.report.sale_item.index')
                  ->With('ItemCategory',$ItemCategory)
                  ->with('getData_arr',$getData_arr)
                  ->With('Branch',$Branch)
                  ->with('branchid', $branchid)
                  ->with('from_date',$start_date)
                  ->with('to_date', $end_date)
                  ->With('saleItems', $saleItems)
                  ->With('start_date',$start_date)
                  ->With('end_date',$end_date)
                  ->With('items',$items);
  	}

    public function getForm($start_date, $end_date, $branchid){
      // $ItemInStocks = DB::select( 
      //                       DB::raw("
      //                         SELECT DISTINCT 
      //                         itb.item_id,
      //                         i.item_code,
      //                         i.name AS item_name, 
      //                         i.id as item_id,
      //                         u1.name AS unit,
      //                         u1.id as unit_id,

      //                         (SELECT DISTINCT SUM(POD.qty) FROM ".env('DB_PREFIX')."purchase_order PO JOIN ".env('DB_PREFIX')."purchase_order_detail POD ON PO.id=POD.pi_id  WHERE DATE_FORMAT(PO.po_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND POD.item_id=itb.item_id AND POD.unit_id=u1.id) as purchase_qty,

      //                         (SELECT DISTINCT SUM(TD.qty) FROM ".env('DB_PREFIX')."transfer T JOIN ".env('DB_PREFIX')."transfer_detail TD ON T.id=TD.transfer_id WHERE DATE_FORMAT(T.transfer_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND TD.item_id=itb.item_id AND TD.unit_id=u1.id) as transfer_qty,

      //                         (SELECT DISTINCT SUM(adjust_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u1.id) as adjust_qty,

      //                         (SELECT DISTINCT SUM(PCOD.qty) FROM ".env('DB_PREFIX')."pos_cus_orders PCO JOIN ".env('DB_PREFIX')."pos_cus_order_details PCOD ON PCO.id=PCOD.pos_order_id WHERE DATE_FORMAT(PCO.check_out_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND PCO.status_id=4 AND PCOD.item_id=itb.item_id AND PCOD.unit_id=u1.id) as sale_qty,

      //                         (SELECT DISTINCT SUM(SOD.sale_order_qty) FROM ".env('DB_PREFIX')."sale_order SO JOIN ".env('DB_PREFIX')."sale_order_detail SOD ON SO.id=SOD.sale_order_id  WHERE DATE_FORMAT(SO.sale_order_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND SOD.item_id=itb.item_id AND SOD.unit_id=u1.id) as sale_order_qty


      //                         FROM ".env('DB_PREFIX')."item_conversion ic
      //                         LEFT JOIN ".env('DB_PREFIX')."item i ON i.id = ic.item_id
      //                         LEFT JOIN ".env('DB_PREFIX')."unit u1 ON u1.id = ic.unit1
      //                         LEFT JOIN ".env('DB_PREFIX')."item_base_branch itb ON itb.item_id = i.id
      //                         WHERE itb.branch_id=".(int)$branchid."
                            
      //                         GROUP BY itb.item_id
                              
      //                         UNION ALL
                              
      //                         SELECT DISTINCT 
      //                         itb.item_id,
      //                         i.item_code,
      //                         i.name AS item_name, 
      //                         i.id as item_id,
      //                         u2.name AS unit,
      //                         u2.id as unit_id,

      //                         (SELECT DISTINCT SUM(POD.qty) FROM ".env('DB_PREFIX')."purchase_order PO JOIN ".env('DB_PREFIX')."purchase_order_detail POD ON PO.id=POD.pi_id  WHERE DATE_FORMAT(PO.po_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND POD.item_id=itb.item_id AND POD.unit_id=u2.id) as purchase_qty,

      //                         (SELECT DISTINCT SUM(TD.qty) FROM ".env('DB_PREFIX')."transfer T JOIN ".env('DB_PREFIX')."transfer_detail TD ON T.id=TD.transfer_id WHERE DATE_FORMAT(T.transfer_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND TD.item_id=itb.item_id AND TD.unit_id=u2.id) as transfer_qty,

      //                         (SELECT DISTINCT SUM(adjust_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u2.id) as adjust_qty,

      //                         (SELECT DISTINCT SUM(PCOD.qty) FROM ".env('DB_PREFIX')."pos_cus_orders PCO JOIN ".env('DB_PREFIX')."pos_cus_order_details PCOD ON PCO.id=PCOD.pos_order_id WHERE DATE_FORMAT(PCO.check_out_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND PCO.status_id=4 AND PCOD.item_id=itb.item_id AND PCOD.unit_id=u2.id) as sale_qty,

      //                         (SELECT DISTINCT SUM(SOD.sale_order_qty) FROM ".env('DB_PREFIX')."sale_order SO JOIN ".env('DB_PREFIX')."sale_order_detail SOD ON SO.id=SOD.sale_order_id  WHERE DATE_FORMAT(SO.sale_order_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND SOD.item_id=itb.item_id AND SOD.unit_id=u2.id) as sale_order_qty

      //                         FROM ".env('DB_PREFIX')."item_conversion ic
      //                         LEFT JOIN ".env('DB_PREFIX')."item i ON i.id = ic.item_id
      //                         LEFT JOIN ".env('DB_PREFIX')."unit u2 ON u2.id = ic.unit2
      //                         LEFT JOIN ".env('DB_PREFIX')."item_base_branch itb ON itb.item_id = i.id
      //                         WHERE itb.branch_id=".(int)$branchid."
      //                         GROUP BY itb.item_id
      //                       "));

      // $SaleItems = DB::select( 
      //   DB::raw("
      //     SELECT 
      //     itb.item_id,
      //     i.item_code,
      //     i.name AS item_name, 
      //     i.id as item_id,
      //     u1.name AS unit,
      //     u1.id as unit_id,
      //     b.branch_name as branch_name,
      //     SUM(si.sale_qty) as sale_qty,
      //     SUM(si.void_qty) as void_qty,
      //     SUM(si.retail_price) as retail_price,
      //     SUM(si.whole_sale_price) as whole_sale_price,
      //     SUM(si.discount_amount) as discount_amount,
      //     SUM(si.tax_amount) as tax_amount,
      //     SUM(si.cost_price) as cost_price,
      //     (SUM(si.cost_price) * SUM(si.sale_qty)) as total_cost_price,
      //     (SUM(si.net_price) * SUM(si.sale_qty)) as total_net_price,
      //     (SUM(si.grand_total)) as grand_total
      //     FROM ".env('DB_PREFIX')."item_conversion ic
      //     LEFT JOIN ".env('DB_PREFIX')."item i ON i.id = ic.item_id
      //     LEFT JOIN ".env('DB_PREFIX')."sale_summary_item si ON si.item_id = i.id
      //     LEFT JOIN ".env('DB_PREFIX')."unit u1 ON u1.id = ic.unit1
      //     LEFT JOIN ".env('DB_PREFIX')."item_base_branch itb ON itb.item_id = i.id
      //     LEFT JOIN ".env('DB_PREFIX')."branch b ON b.id = ".(int)$branchid."
      //     WHERE itb.branch_id=".(int)$branchid."
      //     AND si.unit_id = u1.id
      //     AND DATE_FORMAT(si.sale_date,'%Y-%m-%d') 
      //     BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') 
      //     AND DATE_FORMAT('".$end_date."','%Y-%m-%d')          
      //     GROUP BY si.item_id, si.unit_id
      //     ORDER By i.id
      // "));

      $SaleItems = DB::select( 
        DB::raw("
          SELECT 
          itb.item_id,
          i.item_code,
          i.name AS item_name, 
          i.id as item_id,
          u.name AS unit,
          u.id as unit_id,
          b.branch_name as branch_name,
          SUM(sod.sale_order_qty) as sale_qty,
          SUM(sod.void_qty) as void_qty,
          SUM(sod.sale_order_price) as sale_order_price,
          SUM(sod.discount_amount) as discount_amount,
          (SUM(sod.total)) as grand_total
          FROM ".env('DB_PREFIX')."item_conversion ic
          LEFT JOIN ".env('DB_PREFIX')."item i ON i.id = ic.item_id
          LEFT JOIN ".env('DB_PREFIX')."sale_order_detail sod ON sod.item_id = i.id
          LEFT JOIN ".env('DB_PREFIX')."sale_order sd ON sd.id = sod.sale_order_id
          LEFT JOIN ".env('DB_PREFIX')."unit u ON u.id = ic.unit1
          LEFT JOIN ".env('DB_PREFIX')."item_base_branch itb ON itb.item_id = i.id
          LEFT JOIN ".env('DB_PREFIX')."branch b ON b.id = ".(int)$branchid."
          WHERE itb.branch_id=".(int)$branchid."
          AND sod.unit_id = u.id
          AND DATE_FORMAT(sd.sale_order_date,'%Y-%m-%d') 
          BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') 
          AND DATE_FORMAT('".$end_date."','%Y-%m-%d')          
          GROUP BY sod.item_id, sod.unit_id
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

      return view('admin.report.sale_item.print')
              ->with('Branch',$Branch->branch_name)
              ->with('Company',$dataCompany)
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
