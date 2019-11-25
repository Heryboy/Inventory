<?php namespace App\Http\Controllers\Admin\store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\language\language;
use App\Models\Admin\setup_mgr\Branch;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class MainStoreController extends Controller
{

    public $view_title = "store/main_store.entry_title";
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
      $branches = Branch::all();
      return view('admin.store.index')->with('branches',$branches);
    }

    public function ChangeStore(Request $request){
      $input = $request->all();
      $branch_id = $input['branch_id'];
      $boolen = 1;  
      $resetBranch = Branch::Where('is_delete',0)->Update(['is_default'=>0]); 
      if($resetBranch){
        $branches = Branch::Where('id',$branch_id)->Update(['is_default'=>1]); 
      }
      return json_encode($boolen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.setup_mgr.language.form')
                ->with('action',$this->action)
                ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(LanguageRequest $request)
    {
      $input = $request->all();

      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      
      $input['created_by'] = Auth::user()->id;
      Language::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/setup_mgr/language")->with('message','Save Successfully');
    }

    public function show($id)
    {
                      
      $language = Language::findOrFail($id);
      return view('admin.setup_mgr.language.form')->with('language',$language)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $language = Language::findOrFail($id);
      return view('admin.setup_mgr.language.form')->with('language',$language)
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
    public function update(LanguageRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
        else $input['is_active'] = 0;
       
        $language = Language::find($id);
        
        $language->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect("admin/setup_mgr/language")->with('message','Save Successfully');
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
      $language = Language::find($id);
      $language->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
