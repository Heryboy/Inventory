<?php namespace App\Http\Controllers\Admin\setup_mgr\unit;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\UnitRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Unit;
use App\Models\Admin\setup_mgr\UnitGroup;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class UnitController extends Controller
{

    public $view_title = "setup_mgr/unit.entry_title";
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
      $units = Unit::Where('is_delete',0)->OrderBy('id','DESC')->get();
      return view('admin.setup_mgr.unit.index')
                ->with('units',$units);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $unit_group = UnitGroup::lists('name','id');
      return view('admin.setup_mgr.unit.form')
                ->with('unit_group',$unit_group)
                ->with('action',$this->action)
                ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(UnitRequest $request)
    {
      $input = $request->all();

      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      
      $input['created_by'] = Auth::user()->id;
      Unit::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/setup_mgr/unit")->with('message','Save Successfully');
    }

    public function show($id)
    {
                      
      $unit = Unit::findOrFail($id);
      $unit_group = UnitGroup::lists('name','id');
      return view('admin.setup_mgr.unit.form')->with('unit',$unit)
                                          ->with('unit_group',$unit_group)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $unit = Unit::findOrFail($id);
      $unit_group = UnitGroup::lists('name','id');
      return view('admin.setup_mgr.unit.form')->with('unit',$unit)
                                          ->with('unit_group',$unit_group)
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
    public function update(UnitRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
        else $input['is_active'] = 0;
       
        $unit = Unit::find($id);
        
        $unit->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect("admin/setup_mgr/unit")->with('message','Save Successfully');
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
      $unit = Unit::find($id);
      $unit->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
