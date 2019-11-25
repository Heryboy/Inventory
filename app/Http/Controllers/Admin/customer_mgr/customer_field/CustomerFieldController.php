<?php namespace App\Http\Controllers\Admin\customer_mgr\customer_field;

// use Illuminate\Http\Request;
use App\Http\Requests\customer_mgr\customer_field\CustomerFieldRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\customer_mgr\customer_field\CustomerField;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class CustomerFieldController extends Controller
{

    public $view_title = "customer_mgr/customer_field.entry_title";
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
      $customer_fields = CustomerField::all();
      return view('admin.customer_mgr.customer_field.index')
                ->with('customer_fields',$customer_fields);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.customer_mgr.customer_field.form')
                ->with('action',$this->action)
                ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CustomerFieldRequest $request)
    {
      $input = $request->all();

      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      
      $input['created_by'] = Auth::user()->id;
      CustomerField::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/customer_mgr/customer_field")->with('message','Save Successfully');
    }

    public function show($id)
    {
                      
      $customer_field = CustomerField::findOrFail($id);
      return view('admin.customer_mgr.customer_field.form')->with('customer_field',$customer_field)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $customer_field = CustomerField::findOrFail($id);
      return view('admin.customer_mgr.customer_field.form')->with('customer_field',$customer_field)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerFieldRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
        else $input['is_active'] = 0;
       
        $customer_field = CustomerField::find($id);
        
        $customer_field->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect("admin/customer_mgr/customer_field")->with('message','Save Successfully');
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
      $customer_field = CustomerField::find($id);
      $customer_field->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
