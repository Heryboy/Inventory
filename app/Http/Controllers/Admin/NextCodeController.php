<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Admin\NextCodeRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\NextCodeModel;
use Illuminate\Support\Facades\Input;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;

use DB;
use App\user;
use Carbon\Carbon;
use Auth;
use Session;
use Validator;
use rules;
use Redirect;
use View;

class NextCodeController extends Controller
{
	
	public $view_title = "Next Code";

    public function __construct()
    {
      $menu_code = 'y5_s42';
      Session::flash('permissionOn_Menu_ID',$menu_code);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
      $next_code = NextCodeModel::all();
   
      return view('admin.next_code.index')
                   ->with('view_title',$this->view_title)
                   ->with('next_code',$next_code);
    }

    public function create()
    {
      return view('admin.next_code.form')->with('action','edit')
        							     ->with('view_title',$this->view_title);
    }
    public function store(NextCodeRequest $request)
    {
        
        $input = $request->all();
        //##########Set Event for ActivityLog############
        $this->ActivityLog('create');
        // dd($input);
        $next_code = NextCodeModel::create($input);
      
        return redirect("admin/config/next_code")->with('message','Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $next_code = NextCodeModel::find($id);
            return view('admin.next_code.form')->with('next_code',$next_code)
                                            ->with('view_title',$this->view_title)
                                            ->with('action',"show");
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $next_code = NextCodeModel::find($id);
            return view('admin.next_code.form')->with('next_code',$next_code)
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
    public function update(NextCodeRequest $request, $id)
    {
        $input = $request->all();
        $next_code = NextCodeModel::find($id);  
        $next_code->update($input);
        
        //##########Set Event for ActivityLog############
        $this->ActivityLog('Update next_code');      
             return redirect("admin/config/next_code")->with('message','Updated Successfully');
        
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
        $this->ActivityLog('Delete next_code');
        //
        $next_code = NextCodeModel::find($id)->delete();
         return redirect("admin/config/next_code")->with('message','Deleted Successfully');
    }

}
