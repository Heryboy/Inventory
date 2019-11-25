<?php namespace App\Http\Controllers\Admin\setup_mgr\pos;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\POSDrawerRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\POSDrawer;
use App\Models\Admin\setup_mgr\POSDrawerGroup;
use App\Models\Admin\UserModel;
use App\Models\Admin\setup_mgr\POSWorkShift;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class POSDrawerController extends Controller
{

    public $view_title = 'setup_mgr/pos_drawer.entry_title';
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
      $pos_drawers = POSDrawer::Where('is_deleted',0)->OrderBy('id','DESC')->get();
      return view('admin.setup_mgr.pos_drawer.index')
                ->with('pos_drawers',$pos_drawers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users = UserModel::Lists('username','id');
      $pos_work_shifts = POSWorkShift::Lists('workshift_name','id');
      $pos_drawer_groups = POSDrawerGroup::Where('is_delete',0)->Lists('name','id');
      return view('admin.setup_mgr.pos_drawer.form')
                ->with('action',$this->action)
                ->with('view_title',$this->view_title)
                ->with('users',$users)
                ->with('pos_drawer_groups',$pos_drawer_groups)
                ->with('pos_work_shifts', $pos_work_shifts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(POSDrawerRequest $request)
    {
      $input = $request->all();

      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      
      $input['created_by'] = Auth::user()->id;
      POSDrawer::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/setup_mgr/pos_drawer")->with('message','Save Successfully');
    }

    public function show($id)
    {
      
      $users = UserModel::Lists('username','id');
      $pos_work_shifts = POSWorkShift::Lists('workshift_name','id');
      $pos_drawer_groups = POSDrawerGroup::Where('is_delete',0)->Lists('name','id');
      $pos_drawer = POSDrawer::findOrFail($id);
      $pos_drawer = POSDrawer::findOrFail($id);
      return view('admin.setup_mgr.pos_drawer.form')->with('pos_drawer',$pos_drawer)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show")
                                          ->with('users',$users)
                                          ->with('pos_drawer_groups',$pos_drawer_groups)
                                          ->with('pos_work_shifts', $pos_work_shifts);
    }

    public function edit($id)
    {
      $users = UserModel::Lists('username','id');
      $pos_work_shifts = POSWorkShift::Lists('workshift_name','id');
      $pos_drawer_groups = POSDrawerGroup::Where('is_delete',0)->Lists('name','id');
      $pos_drawer = POSDrawer::findOrFail($id);
      return view('admin.setup_mgr.pos_drawer.form')->with('pos_drawer',$pos_drawer)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Edit")
                                          ->with('users',$users)
                                          ->with('pos_drawer_groups',$pos_drawer_groups)
                                          ->with('pos_work_shifts', $pos_work_shifts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(POSDrawerRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
        else $input['is_active'] = 0;
       
        $pos_drawer = POSDrawer::find($id);
        
        $pos_drawer->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect("admin/setup_mgr/pos_drawer")->with('message','Save Successfully');
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
      $pos_drawer = POSDrawer::find($id);
      $pos_drawer->update([
        'is_deleted' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
