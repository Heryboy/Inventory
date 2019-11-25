<?php 
namespace App\Http\Controllers\Admin\sale_mgr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\sale_mgr\SaleOrder;
use App\Models\Admin\sale_mgr\SaleOrderDetail;
use App\Models\Admin\item_mgr\ItemBaseStore;
use App\Models\Admin\customer_mgr\customer\customer;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\ItemSubCategory;
use App\Models\Admin\setup_mgr\ItemType;
use App\Models\Admin\setup_mgr\ItemStatus;
use App\Models\Admin\setup_mgr\Currency;
use App\Models\Admin\setup_mgr\Unit;
use App\Models\Admin\setup_mgr\Company;
use App\Models\Admin\customer_mgr\customer_group\CustomerGroup;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Helpers;
use Auth;
use Session;

class InvoiceController extends Controller
{
    public $view_title = "sale_mgr/sale_order.entry_title";
    public $action = "Edit";
    
    public function __construct()
    {
       
    }

    public function paidInvoice(){
      $SaleOrders = SaleOrder::Where('status_id', 10)->Where('is_void', 0)->OrderBy('check_in_date', 'DESC')->get();
      $Company=Company::first();
      $dataCompany = '';
      if($Company){
        $dataCompany = $Company;
      }
      $getData_arr = $this->getData();
      return view('admin.sale_mgr.sale_order.index')->with('SaleOrders',$SaleOrders)
                                                    ->with('Company',$dataCompany)
                                                    ->with('getData_arr',$getData_arr);
    }

    public function unpaidInvoice(){
      $SaleOrders = SaleOrder::Where('status_id', 10)->Where('is_void', 0)->OrderBy('check_in_date', 'DESC')->get();
      $Company=Company::first();
      $dataCompany = '';
      if($Company){
        $dataCompany = $Company;
      }
      $getData_arr = $this->getData();
      return view('admin.sale_mgr.sale_order.index')->with('SaleOrders',$SaleOrders)
                                                    ->with('Company',$dataCompany)
                                                    ->with('getData_arr',$getData_arr);
    }

    // getData
    public function getData(){
      $Customers = Customer::Where('is_delete',0)->OrderBy('name')->get();
      $Customer_Array = array();
      foreach ($Customers as $Customer) {
        $Customer_Array[] = array(
          'id' => $Customer->id,
          'name' => $Customer->name
        );
      }
      return $Customer_Array;
    }
}
