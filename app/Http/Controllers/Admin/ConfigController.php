<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
// use App\Http\Requests\Admin\ConfigRequest;
use App\Http\Requests\Configuration\ConfigRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\Config;
use App\Models\Admin\ConfigGroup;
use App\Models\Admin\Language;
use Illuminate\Support\Facades\Input;

use DB;
use Validator;
use Auth;
use Session;

class ConfigController extends Controller
{
	
	public $view_title = "Config";
	

    public function __construct()
    {
       $menu_code = 'y5_s28';
       Session::flash('menu_code',$menu_code);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
        $menu_code = 'y5_s28';
        Session::flash('menu_code',$menu_code);        
        $this->ActivityLog('view');

        $alldata = DB::table('config')
        ->join('config_group', 'config_group.id', '=', 'config.config_group_id')
        ->select('config.*', 'config_group.name as cg_name')
        ->where('config.id','>',0)
        ->orderBy('config_group.id', 'asc')
        ->get();
        
        return view('admin.config.index')
                ->with('alldata',$alldata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	
        $config_group = ConfigGroup::lists('name','id');
        return view('admin.config.create')->with('config_group',$config_group)
        								->with('view_title',$this->view_title)
										->with('action',"Create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ConfigRequest $request)
    {
        $input = $request->all();
        $this->ActivityLog('create');

        $validator = Validator::make($input, [
            'name' => 'required',
            'config_group_id' => 'required',
            'keywords' => 'required',
            'value' => 'required'
        ]);
        
        if ($validator->fails())
        {
            // return redirect()->back()->withErrors($validator->errors());
            return redirect("admin/setting/config")->withErrors($validator->errors());
        }else{
            Config::create($input);
            //##########Set Event for ActivityLog############
            $this->ActivityLog('create');
            	
            return redirect("admin/setting/config")->with('message','Save Successfully');
        }		
    }

    public function edit($id)
    {
        
        $config_group = ConfigGroup::lists('name','id');
               
        $data = Config::find($id);
        
        return view('admin.config.form')->with('config_group',$config_group)
								        ->with('config',$data)
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
    public function update(ConfigRequest $request, $id)
    {
        $this->ActivityLog("update");      

        $input = $request->all();
        $config = Config::find($id);
    
        $config->update($input);
        return redirect("admin/config/configuration")->with('message','Update Successfully');

    }

     public function show($id)
    {
  
        $config_group = ConfigGroup::lists('name','id');
               
        $data = Config::find($id);
        
        return view('admin.config.form')->with('config_group',$config_group)
                                        ->with('config',$data)
                                        ->with('view_title',$this->view_title)
                                        ->with('action',"save");
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
        $data=UserModel::find($id)->delete();
        return redirect("admin/config/configuration")->with('message','Deleted Successfully');
        // return redirect()->back()->with('message','Deleted successfully');
    }

}
