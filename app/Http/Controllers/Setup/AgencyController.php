<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Setup\AgencyRequest;
use App\Http\Controllers\Controller;
use App\Models\Setup\AgencyModel;
use App\Models\Setup\GroupInvoiceDueModel;
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

class AgencyController extends Controller
{
	
	public $view_title = "Agency";

    public function __construct()
    {
      $menu_code = 'y5_s30';
      Session::flash('permissionOn_Menu_ID',$menu_code);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
      // $agency = AgencyModel::all();
      $agency = DB::table('agency as ag')
                        ->Join('group_invoice_due as gid','gid.id','=','ag.group_invoice_due_id')
                        ->Select('ag.*', 'gid.name as gidName')
                        ->get();
      return view('setup.agency.index')
                   ->with('view_title',$this->view_title)
                   ->with('agency',$agency);
    }

    public function create()
    {
      $group_invoice_due = GroupInvoiceDueModel::lists('name', 'id');
      return view('setup.agency.form')->with('action','edit')
                                      ->with('group_invoice_due',$group_invoice_due)
        							  ->with('view_title',$this->view_title);
    }
    public function store(AgencyRequest $request)
    {
        
        $input = $request->all();
        //##########Set Event for ActivityLog############
        $this->ActivityLog('create');
        // dd($input);
        $agency = AgencyModel::create($input);
      
        return redirect("setup/sale/agency")->with('message','Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agency = AgencyModel::find($id);
        $group_invoice_due = GroupInvoiceDueModel::lists('name', 'id');
            return view('setup.agency.form')->with('agency',$agency)
                                            ->with('group_invoice_due',$group_invoice_due)
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
        
        $agency = AgencyModel::find($id);
        $group_invoice_due = GroupInvoiceDueModel::lists('name', 'id');
            return view('setup.agency.form')->with('agency',$agency)
                                            ->with('group_invoice_due',$group_invoice_due)
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
    public function update(AgencyRequest $request, $id)
    {
        $input = $request->all();
        $agency = AgencyModel::find($id);  
        $agency->update($input);
        
        //##########Set Event for ActivityLog############
        $this->ActivityLog('Update agency');      
             return redirect("setup/sale/agency")->with('message','Updated Successfully');
        
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
        $this->ActivityLog('Delete agency');
        //
        $agency = AgencyModel::find($id)->delete();
         return redirect("setup/sale/agency")->with('message','Deleted Successfully');
    }

}
