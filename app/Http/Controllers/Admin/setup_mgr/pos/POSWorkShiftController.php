<?php namespace App\Http\Controllers\Admin\setup_mgr\pos;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\POSWorkShiftRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\POSWorkShift;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class POSWorkShiftController extends Controller
{

    public $view_title = 'setup_mgr/pos_work_shift.entry_title';
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
      $pos_work_shifts = POSWorkShift::OrderBy('id','DESC')->get();
      return view('admin.setup_mgr.pos_work_shift.index')
                ->with('pos_work_shifts', $pos_work_shifts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.setup_mgr.pos_work_shift.form')
                ->with('action',$this->action)
                ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(POSWorkShiftRequest $request)
    {
      $input = $request->all();

      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      
      $input['created_by'] = Auth::user()->id;
      POSWorkShift::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/setup_mgr/pos_work_shift")->with('message','Save Successfully');
    }

    public function show($id)
    {
                      
      $pos_work_shift = POSWorkShift::findOrFail($id);
      return view('admin.setup_mgr.pos_work_shift.form')->with('pos_work_shift',$pos_work_shift)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $pos_work_shift = POSWorkShift::findOrFail($id);
      return view('admin.setup_mgr.pos_work_shift.form')->with('pos_work_shift',$pos_work_shift)
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
    public function update(POSWorkShiftRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
        else $input['is_active'] = 0;
       
        $pos_work_shift = POSWorkShift::find($id);
        
        $pos_work_shift->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect("admin/setup_mgr/pos_work_shift")->with('message','Save Successfully');
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
      $pos_work_shift = POSWorkShift::find($id);
      $pos_work_shift->update([
        'is_deleted' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
