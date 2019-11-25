<?php namespace App\Http\Controllers\Admin\report\inventory_on_hand;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\BranchRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\UserModel;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\setup_mgr\BranchGroup;
use App\Models\Admin\setup_mgr\Branch;
use App\Models\Admin\setup_mgr\Company;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\ItemSubCategory;
use App\Models\Admin\setup_mgr\ItemType;
use App\Models\Admin\setup_mgr\ItemStatus;
use App\Models\Admin\stock_mgr\AdjustmentStockDate;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class InventoryOnhandReportController extends Controller
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

      $item_category_id = 0;
      $item_sub_category_id = 0;
      $ItemSubCategory = '';
      if(isset($_REQUEST['item_category_id'])){
        $item_category_id = $_REQUEST['item_category_id'];
        $item_sub_category_id = $_REQUEST['item_sub_category_id'];
        $ItemSubCategory = ItemSubCategory::Where('item_category_id', $item_category_id)->Where('is_delete',0)->get();
      }

      $filter = array(
        'item_category_id' => $item_category_id,
        'item_sub_category_id' => $item_sub_category_id
      );

      $ItemInStocks = $this->getForm($start_date,$end_date,$branchid,$filter);

      $getData_arr = $this->getData();

      return view('admin.report.inventory_on_hand.index')
                  ->With('ItemCategory',$ItemCategory)
                  ->With('ItemSubCategory',$ItemSubCategory)
                  ->with('item_category_id', $item_category_id)
                  ->with('item_sub_category_id', $item_sub_category_id)
                  ->with('getData_arr',$getData_arr)
                  ->With('Branch',$Branch)
                  ->with('from_date',$start_date)
                  ->with('to_date', $end_date)
                  ->with('branchid', $branchid)
                  ->With('ItemInStocks',$ItemInStocks)
                  ->With('start_date',$start_date)
                  ->With('end_date',$end_date)
                  ->With('items',$items);
  	}

    public function getForm($start_date,$end_date,$branchid,$filter){
      // $ItemInStocks = DB::select( 
      //                       DB::raw("
      //                         SELECT DISTINCT 
      //                         itb.item_id,
      //                         i.item_code,
      //                         i.name AS item_name, 
      //                         i.id as item_id,
      //                         u1.name AS unit,
      //                         u1.id as unit_id,

      //                         (SELECT DISTINCT SUM(POD.qty) FROM ".env('DB_PREFIX')."purchase_order PO JOIN ".env('DB_PREFIX')."purchase_order_detail POD ON PO.id=POD.po_id  WHERE DATE_FORMAT(PO.po_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND POD.item_id=itb.item_id AND POD.unit_id=u1.id) as purchase_qty,

      //                         (SELECT DISTINCT SUM(TD.qty) FROM ".env('DB_PREFIX')."transfer T JOIN ".env('DB_PREFIX')."transfer_detail TD ON T.id=TD.transfer_id WHERE DATE_FORMAT(T.transfer_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND TD.item_id=itb.item_id AND TD.unit_id=u1.id) as transfer_qty,

      //                         (SELECT DISTINCT SUM(adjust_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u1.id) as adjust_qty,
                              
      //                         (SELECT DISTINCT SUM(lost_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u1.id) as lost_qty,

      //                         (SELECT DISTINCT SUM(damage_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u1.id) as damage_qty,

      //                         (SELECT DISTINCT SUM(PCOD.qty) FROM ".env('DB_PREFIX')."pos_cus_orders PCO JOIN ".env('DB_PREFIX')."pos_cus_order_details PCOD ON PCO.id=PCOD.pos_order_id WHERE DATE_FORMAT(PCO.check_out_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND PCO.status_id=4 AND PCOD.item_id=itb.item_id AND PCOD.unit_id=u1.id) as sale_qty,

      //                         (SELECT DISTINCT SUM(SOD.sale_order_qty) FROM ".env('DB_PREFIX')."sale_order SO JOIN ".env('DB_PREFIX')."sale_order_detail SOD ON SO.id=SOD.sale_order_id  WHERE DATE_FORMAT(SO.sale_order_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND SOD.item_id=itb.item_id AND SOD.unit_id=u1.id) as sale_order_qty,
                              
      //                         (SELECT DISTINCT SUM(RD.qty) FROM ".env('DB_PREFIX')."return R JOIN ".env('DB_PREFIX')."return_detail RD ON R.id = RD.return_id  WHERE DATE_FORMAT(R.return_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND R.is_returned = 1 AND RD.item_id=itb.item_id AND RD.unit_id=u1.id) as return_qty

      //                         FROM ".env('DB_PREFIX')."item_conversion ic
      //                         LEFT JOIN ".env('DB_PREFIX')."item i ON i.id = ic.item_id
      //                         LEFT JOIN ".env('DB_PREFIX')."unit u1 ON u1.id = ic.unit1
      //                         LEFT JOIN ".env('DB_PREFIX')."item_base_branch itb ON itb.item_id = i.id
      //                         WHERE itb.branch_id=".(int)$branchid."
                            
      //                         GROUP BY u1.id
                              
      //                         UNION ALL
                              
      //                         SELECT DISTINCT 
      //                         itb.item_id,
      //                         i.item_code,
      //                         i.name AS item_name, 
      //                         i.id as item_id,
      //                         u2.name AS unit,
      //                         u2.id as unit_id,

      //                         (SELECT DISTINCT SUM(POD.qty) FROM ".env('DB_PREFIX')."purchase_order PO JOIN ".env('DB_PREFIX')."purchase_order_detail POD ON PO.id=POD.po_id  WHERE DATE_FORMAT(PO.po_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND POD.item_id=itb.item_id AND POD.unit_id=u2.id) as purchase_qty,

      //                         (SELECT DISTINCT SUM(TD.qty) FROM ".env('DB_PREFIX')."transfer T JOIN ".env('DB_PREFIX')."transfer_detail TD ON T.id=TD.transfer_id WHERE DATE_FORMAT(T.transfer_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND TD.item_id=itb.item_id AND TD.unit_id=u2.id) as transfer_qty,

      //                         (SELECT DISTINCT SUM(adjust_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u2.id) as adjust_qty,
                              
      //                         (SELECT DISTINCT SUM(lost_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u2.id) as lost_qty,

      //                         (SELECT DISTINCT SUM(damage_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u2.id) as damage_qty,

      //                         (SELECT DISTINCT SUM(PCOD.qty) FROM ".env('DB_PREFIX')."pos_cus_orders PCO JOIN ".env('DB_PREFIX')."pos_cus_order_details PCOD ON PCO.id=PCOD.pos_order_id WHERE DATE_FORMAT(PCO.check_out_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND PCO.status_id=4 AND PCOD.item_id=itb.item_id AND PCOD.unit_id=u2.id) as sale_qty,

      //                         (SELECT DISTINCT SUM(SOD.sale_order_qty) FROM ".env('DB_PREFIX')."sale_order SO JOIN ".env('DB_PREFIX')."sale_order_detail SOD ON SO.id=SOD.sale_order_id  WHERE DATE_FORMAT(SO.sale_order_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND SOD.item_id=itb.item_id AND SOD.unit_id=u2.id) as sale_order_qty,

      //                         (SELECT DISTINCT SUM(RD.qty) FROM ".env('DB_PREFIX')."return R JOIN ".env('DB_PREFIX')."return_detail RD ON R.id = RD.return_id  WHERE DATE_FORMAT(R.return_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND R.is_returned = 1 AND RD.item_id=itb.item_id AND RD.unit_id=u2.id) as return_qty

      //                         FROM ".env('DB_PREFIX')."item_conversion ic
      //                         LEFT JOIN ".env('DB_PREFIX')."item i ON i.id = ic.item_id
      //                         LEFT JOIN ".env('DB_PREFIX')."unit u2 ON u2.id = ic.unit2
      //                         LEFT JOIN ".env('DB_PREFIX')."item_base_branch itb ON itb.item_id = i.id
      //                         WHERE itb.branch_id=".(int)$branchid."
      //                         GROUP BY itb.item_id, u2.id, ic.unit2
      //                       "));
      $where_clause = '';
      if((int)$filter['item_category_id'] > 0){
        $where_clause .= "AND i.item_category_id = ".(int)$filter['item_category_id']."";
        $where_clause .= " AND i.item_sub_category_id = ".(int)$filter['item_sub_category_id']."";
      }

        $ItemInStocks = DB::select( 
          DB::raw("
            SELECT DISTINCT 
            itb.item_id,
            i.item_code,
            i.item_barcode,
            i.name AS item_name, 
            i.id as item_id,
            u1.name AS unit,
            u1.id as unit_id,

            (SELECT DISTINCT SUM(POD.qty) FROM ".env('DB_PREFIX')."purchase_order PO JOIN ".env('DB_PREFIX')."purchase_order_detail POD ON PO.id=POD.po_id  WHERE DATE_FORMAT(PO.po_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND POD.item_id=itb.item_id AND POD.unit_id=u1.id) as purchase_qty,

            (SELECT DISTINCT SUM(TD.qty) FROM ".env('DB_PREFIX')."transfer T JOIN ".env('DB_PREFIX')."transfer_detail TD ON T.id=TD.transfer_id WHERE DATE_FORMAT(T.transfer_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND T.is_transfered = 1 AND T.is_received = 1 AND TD.item_id=itb.item_id AND TD.unit_id=u1.id) as transfer_qty,

            (SELECT DISTINCT SUM(adjust_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u1.id) as adjust_qty,

            (SELECT DISTINCT SUM(lost_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u1.id) as lost_qty,

            (SELECT DISTINCT SUM(damage_qty) FROM ".env('DB_PREFIX')."adjustment WHERE DATE_FORMAT(adjustment_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND item_id=itb.item_id AND unit_id=u1.id) as damage_qty,

            (SELECT DISTINCT SUM(PCOD.qty) FROM ".env('DB_PREFIX')."pos_cus_orders PCO JOIN ".env('DB_PREFIX')."pos_cus_order_details PCOD ON PCO.id=PCOD.pos_order_id WHERE DATE_FORMAT(PCO.check_in_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND PCO.status_id=11 AND PCOD.item_id=itb.item_id AND PCOD.unit_id=u1.id) as sale_qty,

            (SELECT DISTINCT SUM(SOD.sale_order_qty) FROM ".env('DB_PREFIX')."sale_order SO JOIN ".env('DB_PREFIX')."sale_order_detail SOD ON SO.id=SOD.sale_order_id  WHERE DATE_FORMAT(SO.sale_order_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND SOD.item_id=itb.item_id AND SOD.unit_id=u1.id) as sale_order_qty,

            (SELECT DISTINCT SUM(RD.qty) FROM ".env('DB_PREFIX')."return R JOIN ".env('DB_PREFIX')."return_detail RD ON R.id = RD.return_id  WHERE DATE_FORMAT(R.return_date,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$start_date."','%Y-%m-%d') AND DATE_FORMAT('".$end_date."','%Y-%m-%d') AND R.is_returned = 1 AND RD.item_id=itb.item_id AND RD.unit_id=u1.id) as return_qty

            FROM ".env('DB_PREFIX')."item_conversion ic
            LEFT JOIN ".env('DB_PREFIX')."item i ON i.id = ic.item_id
            LEFT JOIN ".env('DB_PREFIX')."unit u1 ON u1.id = ic.unit1
            LEFT JOIN ".env('DB_PREFIX')."item_base_branch itb ON itb.item_id = i.id
            WHERE itb.branch_id=".(int)$branchid."
            ".$where_clause."
          "));

        return $ItemInStocks;
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

      $item_category_id = 0;
      $item_sub_category_id = 0;
      if(isset($_REQUEST['item_category_id'])){
        $item_category_id = $_REQUEST['item_category_id'];
        $item_sub_category_id = $item_category_id;
      }

      $filter = array(
        'item_category_id' => $item_category_id,
        'item_sub_category_id' => $item_sub_category_id
      );

      $ItemInStocks = $this->getForm($start_date, $end_date, $branchid, $filter);

      return view('admin.report.inventory_on_hand.print')
             ->with('Branch',$Branch->branch_name)
             ->with('Company',$dataCompany)
             ->with('ItemInStocks', $ItemInStocks);

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
