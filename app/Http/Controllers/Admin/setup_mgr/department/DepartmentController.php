<?php namespace App\Http\Controllers\Admin\setup_mgr\department;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\DepartmentRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Department;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class DepartmentController extends Controller
{

    public $view_title = "setup_mgr/department.entry_title";
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
      $departments = Department::Where('is_delete',0)->get();
      return view('admin.setup_mgr.department.index')
                ->with('departments',$departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.setup_mgr.department.form')
                ->with('action',$this->action)
                ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(DepartmentRequest $request)
    {
      $input = $request->all();
      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      
      $input['created_by'] = Auth::user()->id;
      Department::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/setup_mgr/department")->with('message','Save Successfully');
    }

    public function show($id)
    {
                      
      $department = Department::findOrFail($id);
      return view('admin.setup_mgr.department.form')->with('department',$department)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $department = Department::findOrFail($id);
      return view('admin.setup_mgr.department.form')->with('department',$department)
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
    public function update(DepartmentRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
        else $input['is_active'] = 0;
       
        $department = Department::find($id);
        
        $department->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect("admin/setup_mgr/department")->with('message','Save Successfully');
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
      $department = Department::find($id);
      $department->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
