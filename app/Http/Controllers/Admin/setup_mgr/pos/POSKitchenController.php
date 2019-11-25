<?php namespace App\Http\Controllers\Admin\setup_mgr\pos;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\POSKitchenRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\POSKitchen;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class POSKitchenController extends Controller
{

    public $view_title = 'setup_mgr/pos_kitchen.entry_title';
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
      $pos_kitchens = POSKitchen::Where('is_deleted',0)->OrderBy('id','DESC')->get();
      return view('admin.setup_mgr.pos_kitchen.index')
                ->with('pos_kitchens',$pos_kitchens);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.setup_mgr.pos_kitchen.form')
                ->with('action',$this->action)
                ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(POSKitchenRequest $request)
    {
      $input = $request->all();

      // if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      // else $input['is_active'] = 0;
      
      // $input['created_by'] = Auth::user()->id;
      POSKitchen::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/setup_mgr/pos_kitchen")->with('message','Save Successfully');
    }

    public function show($id)
    {
                      
      $pos_kitchen = POSKitchen::findOrFail($id);
      return view('admin.setup_mgr.pos_kitchen.form')->with('pos_kitchen',$pos_kitchen)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $pos_kitchen = POSKitchen::findOrFail($id);
      return view('admin.setup_mgr.pos_kitchen.form')->with('pos_kitchen',$pos_kitchen)
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
    public function update(POSKitchenRequest $request, $id)
    {
        $input = $request->all();
        // $input['updated_by'] = Auth::user()->id;
        // if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
        // else $input['is_active'] = 0;
       
        $pos_kitchen = POSKitchen::find($id);
        
        $pos_kitchen->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect("admin/setup_mgr/pos_kitchen")->with('message','Save Successfully');
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
      $pos_kitchen = POSKitchen::find($id);
      $pos_kitchen->update([
        'is_deleted' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
