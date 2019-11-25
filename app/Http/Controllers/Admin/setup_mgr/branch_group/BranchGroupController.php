<?php namespace App\Http\Controllers\Admin\setup_mgr\branch_group;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\BranchGroupRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\BranchGroup;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class BranchGroupController extends Controller
{

    public $view_title = "setup_mgr/branch_group.entry_title";
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
      $branch_groups = BranchGroup::Where('is_delete',0)->get();
      return view('admin.setup_mgr.branch_group.index')
                ->with('branch_groups',$branch_groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.setup_mgr.branch_group.form')
                ->with('action',$this->action)
                ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(BranchGroupRequest $request)
    {
      $input = $request->all();

      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      
      $input['created_by'] = Auth::user()->id;
      BranchGroup::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/setup_mgr/branch_group")->with('message','Save Successfully');
    }

    public function show($id)
    {
                      
      $branch_group = BranchGroup::findOrFail($id);
      return view('admin.setup_mgr.branch_group.form')->with('branch_group',$branch_group)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $branch_group = BranchGroup::findOrFail($id);
      return view('admin.setup_mgr.branch_group.form')->with('branch_group',$branch_group)
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
    public function update(BranchGroupRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
        else $input['is_active'] = 0;
       
        $branch_group = BranchGroup::find($id);
        
        $branch_group->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect("admin/setup_mgr/branch_group")->with('message','Save Successfully');
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
      $branch_group = BranchGroup::find($id);
      $branch_group->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
