<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Configuration\ConfigGroupRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\ConfigGroup;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class ConfigGroupController extends Controller
{
	public $view_title = "Config Group";
	
    public function __construct()
    {
       $menu_code = 'y5_s27';
       Session::flash('menu_code',$menu_code);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $alldata = ConfigGroup::all();
        return view('admin.config_group.index')
                    ->with('alldata',$alldata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {		
        return view('admin.config_group.create')
					->with('view_title',$this->view_title)
					->with('action',"Create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ConfigGroupRequest $request)
    {
        
        $input = $request->all();
        $this->ActivityLog('create');
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
        
        if ($validator->fails())
        {
            // return redirect()->back()->withErrors($validator->errors());
            return redirect("admin/config/config_group")->withErrors($validator->errors());
        }else{
            ConfigGroup::create($input);
            //##########Set Event for ActivityLog############
            $this->ActivityLog('create');
            	
            // return redirect('admin/setting/config_group')->with('message','Save Successfully');
        }		
    }

    public function show($id)
    {
  
        $data = ConfigGroup::find($id);
        
        return view('admin.config_group.form')->with('config_group',$data)
                                        ->with('view_title',$this->view_title)
                                        ->with('action',"save");
    }

   
    public function edit($id)
    {       
        $data = ConfigGroup::find($id);
         
        return view('admin.config_group.form')->with('config_group',$data)
									        ->with('view_title',$this->view_title)
									        ->with('action',"edit");
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConfigGroupRequest $request, $id)
    {
        $this->ActivityLog("update");      

        $input = $request->all();
        $config = ConfigGroup::find($id);
    
        $config->update($input);
        return redirect("admin/config/config_group")->with('message','Update Successfully');
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
        //
        $data=ConfigGroup::find($id)->delete();
        return redirect("admin/config/config_group")->with('message','Deleted Successfully');
        // return redirect()->back()->with('message','Deleted successfully');
    }

}
