<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Setup\GIDRequest;
use App\Http\Controllers\Controller;
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

class GroupInvoiceDueController extends Controller
{
	
	public $view_title = "Group Invoice Due";

    public function __construct()
    {
      $menu_code = 'y5_s29';
      Session::flash('permissionOn_Menu_ID',$menu_code);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
      $groupInvoiceDue = GroupInvoiceDueModel::all();
      return view('setup.groupInvoiceDue.index')
                   ->with('view_title',$this->view_title)
                   ->with('groupInvoiceDue',$groupInvoiceDue);
    }

    public function create()
    {
      return view('setup.groupInvoiceDue.form')
                                        ->with('action','edit')
        							    ->with('view_title',$this->view_title);
    }
    public function store(GIDRequest $request)
    {
        
        $input = $request->all();
        //##########Set Event for ActivityLog############
        $this->ActivityLog('create');
        // dd($input);
        $groupInvoiceDue = GroupInvoiceDueModel::create($input);
      
        return redirect("setup/system/group_invoice_due")->with('message','Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groupInvoiceDue = GroupInvoiceDueModel::find($id);
            return view('setup.groupInvoiceDue.form')->with('groupInvoiceDue',$groupInvoiceDue)
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
        
        $groupInvoiceDue = GroupInvoiceDueModel::find($id);
            return view('setup.groupInvoiceDue.form')->with('groupInvoiceDue',$groupInvoiceDue)
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
    public function update(GIDRequest $request, $id)
    {
        $input = $request->all();
        $groupInvoiceDue = GroupInvoiceDueModel::find($id);  
        $groupInvoiceDue->update($input);
        
        //##########Set Event for ActivityLog############
        $this->ActivityLog('Update groupInvoiceDue');      
             return redirect("setup/system/group_invoice_due")->with('message','Updated Successfully');
        
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
        $this->ActivityLog('Delete groupInvoiceDue');
        //
        $groupInvoiceDue = GroupInvoiceDueModel::find($id)->delete();
         return redirect("setup/system/group_invoice_due")->with('message','Deleted Successfully');
    }

}
