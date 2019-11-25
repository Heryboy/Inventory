<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Setup\CustomerRequest;
use App\Http\Controllers\Controller;
use App\Models\Setup\GroupInvoiceDueModel;
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

class CustomerController extends Controller
{
	
	public $view_title = "Customer";

    public function __construct()
    {
      $menu_code = 'y5_s31';
      Session::flash('permissionOn_Menu_ID',$menu_code);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
      // $customer = CustomerModel::all();
        $customer = DB::table('customer as c')
                        ->Join('group_invoice_due as gid','gid.id','=','c.group_invoice_due_id')
                        ->Select('c.*', 'gid.name as gidName')
                        ->get();
      return view('setup.customer.index')
                   ->with('view_title',$this->view_title)
                   ->with('customer',$customer);
    }

    public function create()
    {
        $group_invoice_due = GroupInvoiceDueModel::lists('name', 'id');
            return view('setup.customer.form')->with('action','edit')
                                            ->with('group_invoice_due',$group_invoice_due)
        							        ->with('view_title',$this->view_title);
    }
    public function store(CustomerRequest $request)
    {
        
        $input = $request->all();
        // dd($input);
        //##########Set Event for ActivityLog############
        $this->ActivityLog('create');
        // dd($input);
        $customer = CustomerModel::create($input);
         // DB::table('customer')
         //                ->where('id',$customer->id)
         //                ->update(['name' => $this->getCodeWithConfig("RECEIPT")]);
      
        return redirect("setup/sale/customer")->with('message','Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = CustomerModel::find($id);
        $group_invoice_due = GroupInvoiceDueModel::lists('name', 'id');
            return view('setup.customer.form')->with('customer',$customer)
                                              ->with('group_invoice_due',$group_invoice_due)
                                              ->with('view_title',$this->view_title)
                                              ->with('action',"show");
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $customer = CustomerModel::find($id);
        $group_invoice_due = GroupInvoiceDueModel::lists('name', 'id');
            return view('setup.customer.form')->with('customer',$customer)
                                              ->with('group_invoice_due',$group_invoice_due)
                                              ->with('view_title',$this->view_title)
                                              ->with('action',"edit");
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        $input = $request->all();
        $customer = CustomerModel::find($id);  
        $customer->update($input);
        
        //##########Set Event for ActivityLog############
        $this->ActivityLog('Update customer');      
             return redirect("setup/sale/customer")->with('message','Updated Successfully');
        
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
        $this->ActivityLog('Delete customer');
        //
        $customer = CustomerModel::find($id)->delete();
         return redirect("setup/sale/customer")->with('message','Deleted Successfully');
    }

}
