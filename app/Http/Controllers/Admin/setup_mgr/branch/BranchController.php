<?php namespace App\Http\Controllers\Admin\setup_mgr\branch;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\BranchRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Branch;
use App\Models\Admin\setup_mgr\BranchGroup;
use App\Models\Admin\setup_mgr\Company;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class BranchController extends Controller
{

    public $view_title = "setup_mgr/branch.entry_title";
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
      $branches = Branch::all();
      return view('admin.setup_mgr.branch.index')
                ->with('branches',$branches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $branch_group = BranchGroup::Where('is_delete',0)->Where('is_active',1)->lists('branch_group_name','id');
      $company = Company::lists('company_en','id');
      return view('admin.setup_mgr.branch.form')
                ->with('action',$this->action)
                ->with('branch_group',$branch_group)
                ->with('company',$company)
                ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(BranchRequest $request)
    {
      $input = $request->all();

      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      
      $input['created_by'] = Auth::user()->id;
      Branch::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect()->back()->with('message','Save Successfully');
    }

    public function show($id)
    {
                      
      $branch = Branch::findOrFail($id);
      $branch_group = BranchGroup::Where('is_delete',0)->Where('is_active',1)->lists('branch_group_name','id');
      $company = Company::lists('company_en','id');
      return view('admin.setup_mgr.branch.form')
                                          ->with('branch',$branch)
                                          ->with('branch_group',$branch_group)
                                          ->with('company',$company)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $branch = Branch::findOrFail($id);
      $company = Company::lists('company_en','id');
      $branch_group = BranchGroup::Where('is_delete',0)->Where('is_active',1)->lists('branch_group_name','id');
      $company = Company::lists('company_en','id');
      return view('admin.setup_mgr.branch.form')
                                          ->with('branch',$branch)
                                          ->with('branch_group',$branch_group)
                                          ->with('company',$company)
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
    public function update(BranchRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
        else $input['is_active'] = 0;
       
        $branch = Branch::find($id);
        
        $branch->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect()->back()->with('message','Save Successfully');
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
      $branch = Branch::find($id);
      $branch->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
