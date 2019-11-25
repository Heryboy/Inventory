<?php namespace App\Http\Controllers\Admin\customer_mgr\customer_group;

// use Illuminate\Http\Request;
use App\Http\Requests\customer_mgr\customer_group\CustomerGroupRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\customer_mgr\customer_group\CustomerGroup;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class CustomerGroupController extends Controller
{

    public $view_title = "Customer Group";
    public $action = "Edit";
    public function __construct(){

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    { 
      $customer_groups = CustomerGroup::Where('is_delete',0)->get();
      return view('admin.customer_mgr.customer_group.index')
             ->with('customer_groups',$customer_groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.customer_mgr.customer_group.form')
                  ->with('action',$this->action)
                  ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */

    public function store(CustomerGroupRequest $request)
    {

      $input = $request->all();
      $input['created_by'] = Auth::user()->id;
      CustomerGroup::create($input);
      // ########## Set Event for ActivityLog ##########
      $this->ActivityLog('create');
      return redirect("admin/customer_mgr/customer_group")
              ->with('message','Save Successfully');

    }

    public function show($id)
    {

      $customer_group = CustomerGroup::findOrFail($id);
      return view('admin.customer_mgr.customer_group.form')
                                          ->with('customer_group',$customer_group)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");

    }

    public function edit($id)
    {

      $customer_group = CustomerGroup::findOrFail($id);
      return view('admin.customer_mgr.customer_group.form')
                  ->with('customer_group',$customer_group)
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
    public function update(CustomerGroupRequest $request, $id)
    {
        $input = $request->all();
        $customer_group = CustomerGroup::find($id);
        $customer_group->update($input); 
        $input['updated_by'] = Auth::user()->id;
        // ########## Set Event for ActivityLog ##########
        $this->ActivityLog('update');
        return redirect("admin/customer_mgr/customer_group")->with('message','Save Successfully');
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
      $customer_group = CustomerGroup::find($id);
      $customer_group->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
