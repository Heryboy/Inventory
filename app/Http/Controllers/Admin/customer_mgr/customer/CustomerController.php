<?php namespace App\Http\Controllers\Admin\customer_mgr\customer;

// use Illuminate\Http\Request;
use App\Http\Requests\customer_mgr\customer\CustomerRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\customer_mgr\customer\customer;
use App\Models\Admin\customer_mgr\customer_group\CustomerGroup;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class CustomerController extends Controller
{

    public $view_title = "Customers";
    public $action = "Edit";
    
    public function __construct()
    {
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    { 
      $customers = Customer::Where('is_delete',0)->get();
      return view('admin.customer_mgr.customer.index')
                ->with('customers',$customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $customer_groups = CustomerGroup::lists('name','id');
      return view('admin.customer_mgr.customer.form')
                ->with('action',$this->action)
                ->with('view_title',$this->view_title)
                ->with('customer_groups',$customer_groups);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CustomerRequest $request)
    {
      $input = $request->all();
      $input['created_by'] = Auth::user()->id;
      Customer::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/customer_mgr/customer")->with('message','Save Successfully');
    }

    public function show($id)
    {
                      
      $customer = Customer::findOrFail($id);
      $customer_groups = CustomerGroup::lists('name','id');
      return view('admin.customer_mgr.customer.form')->with('customer',$customer)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show")
                                          ->with('customer_groups',$customer_groups);
    }

    public function edit($id)
    {
      $customer = Customer::findOrFail($id);
      $customer_groups = CustomerGroup::lists('name','id');
      return view('admin.customer_mgr.customer.form')->with('customer',$customer)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Edit")
                                          ->with('customer_groups',$customer_groups);
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
        $input['updated_by'] = Auth::user()->id;
        $customer = Customer::find($id);
        $customer->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect("admin/customer_mgr/customer")->with('message','Update Successfully');
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
      $this->ActivityLog('delete');
      $customer = Customer::find($id);
      $customer->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }

}
