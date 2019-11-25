<?php namespace App\Http\Controllers\Admin\setup_mgr\stock_type;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\StockTypeRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\StockType;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class StockTypeController extends Controller
{

    public $view_title = "setup_mgr/stock_type.entry_title";
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
      $stock_types = StockType::Where('is_delete',0)->OrderBy('id','DESC')->get();
      return view('admin.setup_mgr.stock_type.index')
                ->with('stock_types',$stock_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.setup_mgr.stock_type.form')
                ->with('action',$this->action)
                ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StockTypeRequest $request)
    {
      $input = $request->all();

      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      
      $input['created_by'] = Auth::user()->id;
      StockType::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/setup_mgr/stock_type")->with('message','Save Successfully');
    }

    public function show($id)
    {
                      
      $stock_type = StockType::findOrFail($id);
      return view('admin.setup_mgr.stock_type.form')->with('stock_type',$stock_type)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $stock_type = StockType::findOrFail($id);
      return view('admin.setup_mgr.stock_type.form')->with('stock_type',$stock_type)
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
    public function update(StockTypeRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
        else $input['is_active'] = 0;
       
        $stock_type = StockType::find($id);
        
        $stock_type->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect("admin/setup_mgr/stock_type")->with('message','Save Successfully');
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
      $stock_type = StockType::find($id);
      $stock_type->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
