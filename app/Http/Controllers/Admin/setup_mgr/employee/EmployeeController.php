<?php namespace App\Http\Controllers\Admin\setup_mgr\employee;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\EmployeeRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Employee;
use App\Models\Admin\setup_mgr\Position;
use App\Models\Admin\setup_mgr\Department;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class EmployeeController extends Controller
{

    public $view_title = "setup_mgr/employee.entry_title";
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
      $employees = Employee::all();
      return view('admin.setup_mgr.employee.index')
                ->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $position = Position::lists('name','id');
      $department = Department::lists('name','id');
      return view('admin.setup_mgr.employee.form')
                ->with('position',$position)
                ->with('department',$department)
                ->with('action',$this->action)
                ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(EmployeeRequest $request)
    {
      $input = $request->all();

      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      
      $input['created_by'] = Auth::user()->id;
      Employee::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/setup_mgr/employee")->with('message','Save Successfully');
    }

    public function show($id)
    {
                      
      $employee = Employee::findOrFail($id);
      $position = Position::lists('name','id');
      $department = Department::lists('name','id');
      return view('admin.setup_mgr.employee.form')->with('employee',$employee)
                                          ->with('position',$position)
                                          ->with('department',$department)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $employee = Employee::findOrFail($id);
      $position = Position::lists('name','id');
      $department = Department::lists('name','id');
      return view('admin.setup_mgr.employee.form')->with('employee',$employee)
                                          ->with('position',$position)
                                          ->with('department',$department)
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
    public function update(EmployeeRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
        else $input['is_active'] = 0;
       
        $employee = Employee::find($id);
        
        $employee->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect("admin/setup_mgr/employee")->with('message','Save Successfully');
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
      $employee = Employee::find($id);
      $employee->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
