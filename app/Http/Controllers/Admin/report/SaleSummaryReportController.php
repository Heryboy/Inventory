<?php namespace App\Http\Controllers\Admin\report;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\BranchRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\UserModel;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\ItemType;
use App\Models\Admin\setup_mgr\ItemStatus;
use App\Models\Admin\setup_mgr\Branch;
use App\Models\Admin\setup_mgr\BranchGroup;
use App\Models\Admin\setup_mgr\Company;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class SaleSummaryReportController extends Controller
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

    $summaryReports = $this->getForm($start_date,$end_date,$branchid);

    $getData_arr = $this->getData();

    return view('admin.report.sale_summary.index')
                ->With('ItemCategory',$ItemCategory)
                ->with('getData_arr',$getData_arr)
                ->With('Branch',$Branch)
                ->With('branchid', $branchid)
                ->with('from_date',date('Y-m-d'))
                ->with('to_date',date('Y-m-d'))
                ->With('summaryReports',$summaryReports)
                ->With('start_date',$start_date)
                ->With('end_date',$end_date)
                ->With('items',$items);
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
    $summaryReports = $this->getForm($start_date,$end_date,$branchid);

    return view('admin.report.sale_summary.print')->with('Company',$dataCompany)->with('Branch',$Branch->branch_name)->with('summaryReports',$summaryReports);

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

  
  public function getForm($start_date,$end_date,$branchid){
  
  //   // tmp1
	// 	DB::insert(DB::raw("CREATE TEMPORARY TABLE IF NOT EXISTS tmp1 
  //   (
  //     item_id INT(11),
  //     branch_name VARCHAR(50),
  //     item_code VARCHAR(50),
  //     item_name VARCHAR(50),
  //     unit_id INT(11),
  //     unit_name VARCHAR(120),
  //     retail_price VARCHAR(120),
  //     total_price VARCHAR(120),
  //     discount_amount INT(3),
  //     sold_qty FLOAT(10,2)
  //   )
  // "));

  //   DB::insert(DB::raw("
  //     INSERT INTO tmp1 (item_id,branch_name,item_code,item_name,unit_id,unit_name,retail_price,total_price,discount_amount,sold_qty) 
  //     SELECT 
  //     i.id,
  //     B.branch_name as branch_name,
  //     i.item_code,
  //     i.name as item_name,
  //     PCOD.unit_id as unit_id,
  //     u.name as unit_name,
  //     i.retail as retail_price,
  //     (COALESCE(SUM(PCOD.price),0)) as total_price,
  //     (COALESCE(SUM(PCOD.discount_amount),0)) as discount_amount,
  //     (COALESCE(SUM(PCOD.qty),0)) as sold_qty
  //     FROM tbl_pos_cus_orders as PCO
  //     JOIN tbl_pos_cus_order_details PCOD ON PCO.id=PCOD.pos_order_id
  //     JOIN tbl_item i ON i.id=PCOD.item_id
  //     JOIN tbl_unit as u on u.id=PCOD.unit_id 
  //     JOIN tbl_branch B on B.id=".(int)$branch_id."
  //     WHERE PCO.status_id=".(int)$status."
  //     AND PCO.check_out_date BETWEEN '".$start_date."' AND '".$end_date."'
  //     GROUP BY PCOD.item_id,PCOD.unit_id
  //   "));

  //   DB::insert(DB::raw("
  //     INSERT INTO tmp1(item_id,branch_name,item_code,item_name,unit_id,unit_name,retail_price,total_price,discount_amount,sold_qty) 
  //     SELECT 
  //     i.id,
  //     B.branch_name as branch_name,
  //     i.item_code,
  //     i.name as item_name,
  //     SOD.unit_id as unit_id,
  //     u.name as unit_name,
  //     i.retail as retail_price,
  //     (COALESCE(SUM(SOD.sale_order_price),0)) as total_price,
  //     (COALESCE(SUM(SOD.sale_order_price),0)/100*COALESCE(SUM(SOD.discount_amount),0)) as discount_amount,
  //     (COALESCE(SUM(SOD.sale_order_qty),0)) as sold_qty
  //     FROM tbl_sale_order as SO
  //     JOIN tbl_sale_order_detail SOD ON SO.id=SOD.sale_order_id
  //     JOIN tbl_item i ON i.id=SOD.item_id
  //     JOIN tbl_unit as u on u.id=SOD.unit_id 
  //     JOIN tbl_branch B on B.id=".(int)$branch_id."
  //     WHERE SO.is_approve=".(int)$is_approve."
  //     AND SO.sale_order_date BETWEEN '".$start_date."' AND '".$end_date."'
  //     GROUP BY SOD.item_id,SOD.unit_id
  //   "));

  //   $SaleDetailReports = DB::select(DB::raw("SELECT unit_id,branch_name,
  //                       item_code,
  //                       item_name,
  //                       unit_name,
  //                       retail_price,
  //                       (COALESCE(SUM(total_price),0)) as total_price,
  //                       (COALESCE(SUM(discount_amount),0)) as discount_amount,
  //                       (COALESCE(SUM(sold_qty),0)) as sold_qty
  //                       FROM tmp1 
  //                       GROUP BY item_id,unit_id"
  //                     ));	

  //   // dd($SaleDetailReports);

  //   $GetCalculate = DB::select(DB::raw("SELECT (COALESCE(SUM(total_price),0)) as sub_total,(COALESCE(SUM(total_price),0)-(COALESCE(SUM(total_price),0)/100*COALESCE(SUM(discount_amount),0))) as grand_total FROM tmp1"))[0]; 

  //   DB::unprepared(DB::raw("DROP TEMPORARY TABLE tmp1"));
      
    
    
    // $summaryReports = DB::select( 
    //   DB::raw("
    //     SELECT DISTINCT 
    //     itb.item_id,
    //     i.item_code,
    //     i.name AS item_name, 
    //     i.id as item_id,
    //     u1.name AS unit,
    //     u1.id as unit_id,

    //     (SELECT DISTINCT SUM(POD.qty) FROM ".env('DB_PREFIX')."purchase_order PO JOIN ".env('DB_PREFIX')."purchase_order_detail POD ON PO.id=POD.po_id  WHERE DATE_FORMAT(PO.po_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND POD.item_id=itb.item_id AND POD.unit_id=u1.id) as purchase_qty,

    //     (SELECT DISTINCT SUM(TD.qty) FROM ".env('DB_PREFIX')."transfer T JOIN ".env('DB_PREFIX')."transfer_detail TD ON T.id=TD.transfer_id WHERE DATE_FORMAT(T.transfer_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND T.is_transfered = 1 AND T.is_received = 1 AND TD.item_id=itb.item_id AND TD.unit_id=u1.id) as transfer_qty,

    //     (SELECT DISTINCT SUM(adjust_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u1.id) as adjust_qty,

    //     (SELECT DISTINCT SUM(lost_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u1.id) as lost_qty,

    //     (SELECT DISTINCT SUM(damage_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u1.id) as damage_qty,

    //     (SELECT DISTINCT SUM(PCOD.qty) FROM ".env('DB_PREFIX')."pos_cus_orders PCO JOIN ".env('DB_PREFIX')."pos_cus_order_details PCOD ON PCO.id=PCOD.pos_order_id WHERE DATE_FORMAT(PCO.check_out_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND PCO.status_id=4 AND PCOD.item_id=itb.item_id AND PCOD.unit_id=u1.id) as sale_qty,

    //     (SELECT DISTINCT SUM(SOD.sale_order_qty) FROM ".env('DB_PREFIX')."sale_order SO JOIN ".env('DB_PREFIX')."sale_order_detail SOD ON SO.id=SOD.sale_order_id  WHERE DATE_FORMAT(SO.sale_order_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND SOD.item_id=itb.item_id AND SOD.unit_id=u1.id) as sale_order_qty,

    //     (SELECT DISTINCT SUM(RD.qty) FROM ".env('DB_PREFIX')."return R JOIN ".env('DB_PREFIX')."return_detail RD ON R.id = RD.return_id  WHERE DATE_FORMAT(R.return_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND R.is_returned = 1 AND RD.item_id=itb.item_id AND RD.unit_id=u1.id) as return_qty

    //     FROM ".env('DB_PREFIX')."item_conversion ic
    //     LEFT JOIN ".env('DB_PREFIX')."item i ON i.id = ic.item_id
    //     LEFT JOIN ".env('DB_PREFIX')."unit u1 ON u1.id = ic.unit1
    //     LEFT JOIN ".env('DB_PREFIX')."item_base_branch itb ON itb.item_id = i.id
    //     WHERE itb.branch_id=".(int)$branchid."
    //   "));

    // SET @start_date = '2018-12-02';
    // SET @end_date = '2018-12-30';

    // SELECT DISTINCT
    // DATE(ssi.sale_date) AS DATE, 
    // u.id AS unit_id,
    // u.name AS unit_name,
    // i.name AS item_name,
    // b.branch_name AS branch_name,
    // SUM(ssi.grand_total) AS gross_sale,
    // SUM(ssi.grand_total) AS discount,
    // SUM(ssi.sale_price) AS net_sale,
    // SUM(ssi.cost_price) AS cost_of_item,
    // (SUM(ssi.grand_total)-SUM(ssi.cost_price)) AS gross_profit,
    // SUM(ssi.tax_amount) AS tax,
    // (SUM(ssi.grand_total)-SUM(ssi.cost_price)) AS margin
    // FROM tbl_sale_summary_item ssi
    // JOIN tbl_item i ON i.id = ssi.item_id
    // JOIN tbl_unit u ON u.id = ssi.unit_id
    // JOIN tbl_branch b ON b.id = ssi.branch_id
    // WHERE DATE_FORMAT(ssi.sale_date,'%Y-%m-%d') 
    // BETWEEN DATE_FORMAT(@start_date,'%Y-%m-%d') AND DATE_FORMAT(@end_date,'%Y-%m-%d')
    // GROUP BY ssi.unit_id, ssi.item_id
    
    $summaryReports = DB::select( 
      DB::raw("
          SELECT 
          DATE_FORMAT(pco.made_date, '%Y-%m-%d') as date,
          SUM(pco.sub_total_amount) as sub_total_amount,
          SUM(pco.discount_amount) as total_discount,
          SUM(pco.tax_amount) as total_tax_amount,
          (SUM(pcod.cost_amount) * SUM(pcod.qty)) as total_cost_amount
          FROM ".env('DB_PREFIX')."pos_cus_orders pco
          JOIN ".env('DB_PREFIX')."pos_cus_order_details pcod ON pcod.pos_order_id = pco.id
          WHERE DATE_FORMAT(pco.made_date,'%Y-%m-%d') 
          BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d')
          AND pco.status_id = 11
          GROUP BY DATE_FORMAT(pco.made_date, '%Y-%m-%d')
      "));
      // DB::raw("
      //     SELECT DISTINCT 
      //     itb.item_id,
      //     i.item_code,
      //     i.name AS item_name, 
      //     i.id as item_id,
      //     u1.name AS unit,
      //     u1.id as unit_id,
      //     (SELECT DISTINCT SUM(ssi.grand_total) FROM ".env('DB_PREFIX')."sale_summary_item ssi WHERE DATE_FORMAT(ssi.sale_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') GROUP BY ssi.item_id, ssi.unit_id) as grand_total
      //     FROM ".env('DB_PREFIX')."item_conversion ic
      //     LEFT JOIN ".env('DB_PREFIX')."item i ON i.id = ic.item_id
      //     LEFT JOIN ".env('DB_PREFIX')."unit u1 ON u1.id = ic.unit1
      //     LEFT JOIN ".env('DB_PREFIX')."item_base_branch itb ON itb.item_id = i.id
      //     WHERE itb.branch_id=".(int)$branchid."
      //     GROUP BY i.id, u1.id
      // "));
      
      // dd($summaryReports);
      return $summaryReports;
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
