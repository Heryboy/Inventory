<?php namespace App\Http\Controllers\Admin\report\item;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\BranchRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\UserModel;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\setup_mgr\ItemGallary;
use App\Models\Admin\setup_mgr\ItemConversion;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\ItemSubCategory;
use App\Models\Admin\setup_mgr\ItemRelated;
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

class ItemInformationReportController extends Controller
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

      $branch_id = $this->DefaultBranch();
      if(isset($_REQUEST['branch_id'])){
        $branchid = $_REQUEST['branch_id'];
      }else{
        $branchid = $this->DefaultBranch();
      }
      $clause = '';
      $ItemCategory = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $Branch = Branch::Where('is_delete',0)->Lists('branch_name','id');
      //Item::Where('is_delete',0)->get();
      $item_clause = DB::table("item as i")
               ->Join('item_category as ic','ic.id','=','i.item_category_id')
               ->Join('item_type as it','it.id','=','i.item_type_id')
               ->Join('item_status as is','is.id','=','i.item_status_id')
               ->Join('item_sub_category as isc','isc.id','=','i.item_sub_category_id')
               ->Where('i.is_delete',0)
               ->OrderBy('i.id','DESC')
               ->Select("i.*","ic.item_category_name as item_cat_name",'isc.name as item_sub_catName',"it.name as item_type_name","is.name as item_status_name");
      
      if(isset($_REQUEST['item_category_id'])){
        $item_clause->Where('i.item_category_id',$_REQUEST['item_category_id']);
      }

      if(isset($_REQUEST['item_sub_category_id'])){
        $item_clause->Where('i.item_sub_category_id',$_REQUEST['item_sub_category_id']);
      }

      if(isset($_REQUEST['filter_item_cat'])){
        $item_clause->WHERE('ic.item_category_name','LIKE','%'.$_REQUEST['filter_item_cat'].'%');
      }
      if(isset($_REQUEST['filter_item_type'])){
        $item_clause->WHERE('it.name','LIKE','%'.$_REQUEST['filter_item_type'].'%');
      }

      if(isset($_REQUEST['filter_item_name'])){
        $item_clause->WHERE('i.name','LIKE','%'.$_REQUEST['filter_item_name'].'%');
      }

      $item_category_id = 0;
      $item_sub_category_id = 0;
      $ItemSubCategory = '';
      if(isset($_REQUEST['item_category_id'])){
        $item_category_id = $_REQUEST['item_category_id'];
        $item_sub_category_id = $_REQUEST['item_sub_category_id'];
        $ItemSubCategory = ItemSubCategory::Where('item_category_id', $item_category_id)->Where('is_delete',0)->get();
      }

      $items = collect($item_clause->get());
      $start_date=date('Y-m-d');

      // getData
      $getData_arr = $this->getData();
      return view('admin.report.item_information.index')
                ->with('ItemCategory',$ItemCategory)
                ->With('ItemSubCategory',$ItemSubCategory)
                ->with('item_category_id', $item_category_id)
                ->with('item_sub_category_id', $item_sub_category_id)
                ->with('item_type',$item_type)
                ->With('Branch',$Branch)
                ->with('item_status',$item_status)
                ->with('getData_arr',$getData_arr)
                ->with('items',$items)
                ->with('item_sub_category_id', $item_sub_category_id)
                ->with('start_date',$start_date)
                ->with('end_date', date('Y-m-d'))
                ->with('from_date',$start_date)
                ->with('to_date', date('Y-m-d'))
                ->with('branchid', $branchid);
  	}
    
    public function getPrint(){
      $Company=Company::first();
      $dataCompany = '';
      if($Company){
        $dataCompany = $Company;
      }
      $start_date=date('Y-m-d');
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
      $Branch = Branch::Where('id',$_REQUEST['branch_id'])->first();
      $item_category_id = 0;
      $item_sub_category_id = 0;
      if(isset($_REQUEST['item_category_id'])){
        $item_category_id = $_REQUEST['item_category_id'];
        $item_sub_category_id = $_REQUEST['item_sub_category_id'];
      }

      $filter = array(
        'item_category_id' => $item_category_id,
        'item_sub_category_id' => $item_sub_category_id
      );

      $items = $this->getForm($branchid, $filter);

      return view('admin.report.item_information.print')
             ->with('Branch',$Branch->branch_name)
             ->with('Company',$dataCompany)
             ->with('items', $items);

    }

    public function getForm($branchid,$filter){
      $where_clause = '';
      
      $item_clause = DB::table("item as i")
               ->Join('item_category as ic','ic.id','=','i.item_category_id')
               ->Join('item_type as it','it.id','=','i.item_type_id')
               ->Join('item_status as is','is.id','=','i.item_status_id')
               ->Join('item_sub_category as isc','isc.id','=','i.item_sub_category_id')
               ->Where('i.is_delete',0)
               ->OrderBy('i.id','DESC')
               ->Select("i.*","ic.item_category_name as item_cat_name",'isc.name as item_sub_catName',"it.name as item_type_name","is.name as item_status_name");
      
      if(isset($_REQUEST['item_category_id'])){
        $item_clause->Where('i.item_category_id',$_REQUEST['item_category_id']);
      }

      if(isset($_REQUEST['item_sub_category_id'])){
        $item_clause->Where('i.item_sub_category_id',$_REQUEST['item_sub_category_id']);
      }

      if(isset($_REQUEST['filter_item_cat'])){
        $item_clause->WHERE('ic.item_category_name','LIKE','%'.$_REQUEST['filter_item_cat'].'%');
      }
      if(isset($_REQUEST['filter_item_type'])){
        $item_clause->WHERE('it.name','LIKE','%'.$_REQUEST['filter_item_type'].'%');
      }

      if(isset($_REQUEST['filter_item_name'])){
        $item_clause->WHERE('i.name','LIKE','%'.$_REQUEST['filter_item_name'].'%');
      }

      $item_category_id = 0;
      $item_sub_category_id = 0;
      $ItemSubCategory = '';
      if(isset($_REQUEST['item_category_id'])){
        $item_category_id = $_REQUEST['item_category_id'];
        $item_sub_category_id = $item_category_id;
        $ItemSubCategory = ItemSubCategory::Where('item_category_id', $item_category_id)->Where('is_delete',0)->get();
      }

      $items = collect($item_clause->get());

      return $items;
    }

    // getData
    public function getData(){
      $ItemCategories = ItemCategory::Where('is_delete',0)->OrderBy('item_category_name')->get();
      $category_arr = array();
      foreach($ItemCategories as $ItemCat){
        $ItemSubCategories = ItemSubCategory::Where('is_delete',0)->Where('item_category_id',$ItemCat->id)->get();
        $sub_category_arr = array();
        foreach($ItemSubCategories as $ItemSubCat){
          $sub_category_arr[] = array(
            'name' => $ItemSubCat->name,
            'id' => $ItemSubCat->id,
          );
        }
        $data_arr[] = array(
          'item_category_name' => $ItemCat->item_category_name,
          'sub_category_arr' => $sub_category_arr,
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
