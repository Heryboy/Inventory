<?php namespace App\Http\Controllers\Admin\setup_mgr\item_size;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\ItemSizeRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\ItemSize;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class ItemSizeController extends Controller
{

    public $view_title = 'setup_mgr/item_size.entry_title';
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
      $item_sizes = ItemSize::Where('is_delete',0)->OrderBy('id','DESC')->get();
      return view('admin.setup_mgr.item_size.index')
                ->with('item_sizes',$item_sizes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.setup_mgr.item_size.form')
                ->with('action',$this->action)
                ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ItemSizeRequest $request)
    {
      $input = $request->all();

      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      
      $input['created_by'] = Auth::user()->id;
      ItemSize::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/setup_mgr/item_size")->with('message','Save Successfully');
    }

    public function show($id)
    {
                      
      $item_size = ItemSize::findOrFail($id);
      return view('admin.setup_mgr.item_size.form')->with('item_size',$item_size)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $item_size = ItemSize::findOrFail($id);
      return view('admin.setup_mgr.item_size.form')->with('item_size',$item_size)
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
    public function update(ItemSizeRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
        else $input['is_active'] = 0;
       
        $item_size = ItemSize::find($id);
        
        $item_size->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect("admin/setup_mgr/item_size")->with('message','Save Successfully');
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
      $item_size = ItemSize::find($id);
      $item_size->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
