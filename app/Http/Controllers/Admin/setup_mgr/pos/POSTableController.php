<?php namespace App\Http\Controllers\Admin\setup_mgr\pos;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\POSTableRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\POSTable;
use App\Models\Admin\setup_mgr\POSOutlet;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class POSTableController extends Controller
{

    public $view_title = 'setup_mgr/pos_table.entry_title';
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
      $pos_tables = POSTable::Where('is_deleted',0)->Where('status', 1)->OrderBy('id','DESC')->get();
      return view('admin.setup_mgr.pos_table.index')
                ->with('pos_tables',$pos_tables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $pos_outlets = POSOutlet::Where('is_deleted',0)->Lists('name','id');
      return view('admin.setup_mgr.pos_table.form')
                ->with('action',$this->action)
                ->with('view_title',$this->view_title)
                ->with('pos_outlets',$pos_outlets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(POSTableRequest $request)
    {
      $input = $request->all();

      if(isset($input['status'])&&($input['status']=='on')) $input['status'] = 1;
      else $input['status'] = 0;
      
      $input['created_by'] = Auth::user()->id;
      POSTable::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/setup_mgr/pos_table")->with('message','Save Successfully');
    }

    public function show($id)
    {
      $pos_outlets = POSOutlet::Where('is_deleted',0)->Lists('name','id');           
      $pos_table = POSTable::findOrFail($id);
      return view('admin.setup_mgr.pos_table.form')->with('pos_table',$pos_table)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show")
                                          ->with('pos_outlets', $pos_outlets);
    }

    public function edit($id)
    {
      $pos_outlets = POSOutlet::Where('is_deleted',0)->Lists('name','id');
      $pos_table = POSTable::findOrFail($id);
      return view('admin.setup_mgr.pos_table.form')->with('pos_table',$pos_table)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Edit")
                                          ->with('pos_outlets', $pos_outlets);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(POSTableRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['status'])&&($input['status']=='on')) $input['status'] = 1;
        else $input['status'] = 0;
       
        $pos_table = POSTable::find($id);
        
        $pos_table->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect("admin/setup_mgr/pos_table")->with('message','Save Successfully');
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
      $pos_table = POSTable::find($id);
      $pos_table->update([
        'is_deleted' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
