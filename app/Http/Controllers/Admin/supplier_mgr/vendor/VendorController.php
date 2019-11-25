<?php namespace App\Http\Controllers\Admin\supplier_mgr\vendor;

// use Illuminate\Http\Request;
use App\Http\Requests\supplier_mgr\VendorRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\supplier_mgr\Vendor;
use App\Models\Admin\setup_mgr\Branch;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class VendorController extends Controller
{

    public $view_title = "supplier_mgr/vendor.entry_title";
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
      $vendors = Vendor::Where('is_delete',0)->get();
      return view('admin.supplier_mgr.vendor.index')
                ->with('vendors',$vendors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $branch = Branch::lists('branch_name','id');
      return view('admin.supplier_mgr.vendor.form')
                ->with('branch',$branch)
                ->with('action',$this->action)
                ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(VendorRequest $request)
    {
      $input = $request->all();

      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      
      $input['created_by'] = Auth::user()->id;
      Vendor::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/vendor")->with('message','Save Successfully');
    }

    public function show($id)
    {
             
      $vendor = Vendor::findOrFail($id);
      $branch = Branch::lists('branch_name','id');
      return view('admin.supplier_mgr.vendor.form')->with('vendor',$vendor)
                                          ->with('branch',$branch)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $vendor = Vendor::findOrFail($id);
      $branch = Branch::lists('branch_name','id');
      return view('admin.supplier_mgr.vendor.form')->with('vendor',$vendor)
                                          ->with('branch',$branch)
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
    public function update(VendorRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
        else $input['is_active'] = 0;
       
        $vendor = Vendor::find($id);
        
        $vendor->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect("admin/vendor")->with('message','Save Successfully');
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
      $vendor = Vendor::find($id);
      $vendor->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
