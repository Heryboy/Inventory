<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Setup\AgencyRequest;
use App\Http\Controllers\Controller;
use App\Models\Setup\AgencyModel;
use App\Models\Setup\GroupInvoiceDueModel;
use App\Models\Setup\CurrencyModel;
use App\Models\Setup\CustomerModel;
use Illuminate\Support\Facades\Input;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;

use DB;
use App\user;
use Carbon\Carbon;
use Auth;
use Session;
use Validator;
use rules;
use Redirect;
use View;

class QuotationController extends Controller
{
	
	public $view_title = "Quotation";

    public function __construct()
    {
      $menu_code = 'y5_s32';
      Session::flash('permissionOn_Menu_ID',$menu_code);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
       return view('setup.quotation.index')
                ->with('action','edit')
                ->with('view_title',$this->view_title);
    }

    public function create()
    {
      $ListCurrency = CurrencyModel::lists('name','id');
      $ListCustomer = CustomerModel::lists('name','id');
      // dd($ListCurrency);
      return view('setup.quotation.form')
            ->with('ListCurrency',$ListCurrency)
            ->with('ListCustomer',$ListCustomer)
            ->with('action','edit')
            ->with('view_title',$this->view_title);
    }
    public function getCompany(Request $request)
    {
        $data = \DB::table('agency as a')
            ->join('group_invoice_due as gid','a.group_invoice_due_id','=','gid.id')
            ->join('customer as c','gid.id','=','c.group_invoice_due_id')
            ->select('a.company_name')
            ->where('c.id',$request->input("customer_id"))
            ->first();

        return json_encode($data);
    }
    public function getQuoteNo(Request $request)
    {
        
        $input = $request->all();
        //$data = $this->getCode($input['type'];
        //return $data;
    }   
    public function store(AgencyRequest $request)
    {
      
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgencyRequest $request, $id)
    {
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }

}
