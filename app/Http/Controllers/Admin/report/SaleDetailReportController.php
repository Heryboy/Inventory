<?php namespace App\Http\Controllers\Admin\report;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\BranchRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\UserModel;
use App\Models\Admin\setup_mgr\Branch;
use App\Models\Admin\setup_mgr\BranchGroup;
use App\Models\Admin\setup_mgr\Company;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class SaleDetailReportController extends Controller
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

    $Users = UserModel::lists('username','id');
    $Branches = Branch::lists('branch_name','id');
    $branch_id = $this->DefaultBranch();
    $is_approve = 1;
    $status = 4;//means item is ordered and paid
    $start_date = '2017-11-14';
    $end_date = '2017-11-15';

    // tmp1
		DB::insert(DB::raw("CREATE TEMPORARY TABLE IF NOT EXISTS tmp1 
						(
              item_id INT(11),
							branch_name VARCHAR(50),
							item_code VARCHAR(50),
              item_name VARCHAR(50),
              unit_id INT(11),
							unit_name VARCHAR(120),
              retail_price VARCHAR(120),
              total_price VARCHAR(120),
              discount_amount INT(3),
              sold_qty FLOAT(10,2)
						)
					"));

		DB::insert(DB::raw("
          INSERT INTO tmp1 (item_id,branch_name,item_code,item_name,unit_id,unit_name,retail_price,total_price,discount_amount,sold_qty) 
          SELECT 
          i.id,
          B.branch_name as branch_name,
          i.item_code,
          i.name as item_name,
          PCOD.unit_id as unit_id,
          u.name as unit_name,
          i.retail as retail_price,
          (COALESCE(SUM(PCOD.price),0)) as total_price,
          (COALESCE(SUM(PCOD.discount_amount),0)) as discount_amount,
          (COALESCE(SUM(PCOD.qty),0)) as sold_qty
          FROM tbl_pos_cus_orders as PCO
          JOIN tbl_pos_cus_order_details PCOD ON PCO.id=PCOD.pos_order_id
          JOIN tbl_item i ON i.id=PCOD.item_id
          JOIN tbl_unit as u on u.id=PCOD.unit_id 
          JOIN tbl_branch B on B.id=".(int)$branch_id."
          WHERE PCO.status_id=".(int)$status."
          AND PCO.check_out_date BETWEEN '".$start_date."' AND '".$end_date."'
          GROUP BY PCOD.item_id,PCOD.unit_id
        "));

    DB::insert(DB::raw("
          INSERT INTO tmp1(item_id,branch_name,item_code,item_name,unit_id,unit_name,retail_price,total_price,discount_amount,sold_qty) 
          SELECT 
          i.id,
          B.branch_name as branch_name,
          i.item_code,
          i.name as item_name,
          SOD.unit_id as unit_id,
          u.name as unit_name,
          i.retail as retail_price,
          (COALESCE(SUM(SOD.sale_order_price),0)) as total_price,
          (COALESCE(SUM(SOD.sale_order_price),0)/100*COALESCE(SUM(SOD.discount_amount),0)) as discount_amount,
          (COALESCE(SUM(SOD.sale_order_qty),0)) as sold_qty
          FROM tbl_sale_order as SO
          JOIN tbl_sale_order_detail SOD ON SO.id=SOD.sale_order_id
          JOIN tbl_item i ON i.id=SOD.item_id
          JOIN tbl_unit as u on u.id=SOD.unit_id 
          JOIN tbl_branch B on B.id=".(int)$branch_id."
          WHERE SO.is_approve=".(int)$is_approve."
          AND SO.sale_order_date BETWEEN '".$start_date."' AND '".$end_date."'
          GROUP BY SOD.item_id,SOD.unit_id
        "));

		$SaleDetailReports = DB::select(DB::raw("SELECT unit_id,branch_name,
                            item_code,
                            item_name,
                            unit_name,
                            retail_price,
                            (COALESCE(SUM(total_price),0)) as total_price,
                            (COALESCE(SUM(discount_amount),0)) as discount_amount,
                            (COALESCE(SUM(sold_qty),0)) as sold_qty
                            FROM tmp1 
                            GROUP BY item_id,unit_id"
                          ));	
    
    // dd($SaleDetailReports);

    $GetCalculate = DB::select(DB::raw("SELECT (COALESCE(SUM(total_price),0)) as sub_total,(COALESCE(SUM(total_price),0)-(COALESCE(SUM(total_price),0)/100*COALESCE(SUM(discount_amount),0))) as grand_total FROM tmp1"))[0]; 
    
		DB::unprepared(DB::raw("DROP TEMPORARY TABLE tmp1"));

    return view('admin.report.revenue_reports.sale_detail.index')
              ->with('Users',$Users)
              ->with('from_date',date('Y-m-d'))
              ->with('to_date',date('Y-m-d'))
              ->with('SaleDetailReports',$SaleDetailReports)
              ->with('GetCalculate',$GetCalculate)
              ->with('Branches',$Branches);
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
