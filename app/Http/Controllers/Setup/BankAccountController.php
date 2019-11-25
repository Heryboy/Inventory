<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Setup\BankAccountRequest;
use App\Http\Controllers\Controller;
use App\Models\Setup\BankAccountModel;
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

class BankAccountController extends Controller
{
	
	public $view_title = "Bank Account";

    public function __construct()
    {
      $menu_code = 'y5_s39';
      Session::flash('permissionOn_Menu_ID',$menu_code);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
      $bank_account = BankAccountModel::all();
      return view('setup.bank_account.index')
                   ->with('view_title',$this->view_title)
                   ->with('bank_account',$bank_account);
    }

    public function create()
    {
      return view('setup.bank_account.form')->with('action','edit')
        							  ->with('view_title',$this->view_title);
    }
    public function store(BankAccountRequest $request)
    {
        
        $input = $request->all();
        //##########Set Event for ActivityLog############
        $this->ActivityLog('create');
        // dd($input);
        $bank_account = BankAccountModel::create($input);
      
        return redirect("setup/sale/stock/bank_account")->with('message','Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank_account = BankAccountModel::find($id);
            return view('setup.bank_account.form')->with('bank_account',$bank_account)
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
        
        $bank_account = BankAccountModel::find($id);
            return view('setup.bank_account.form')->with('bank_account',$bank_account)
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
    public function update(BankAccountRequest $request, $id)
    {
        $input = $request->all();
        $bank_account = BankAccountModel::find($id);  
        $bank_account->update($input);
        
        //##########Set Event for ActivityLog############
        $this->ActivityLog('Update bank_account');      
             return redirect("setup/sale/stock/bank_account")->with('message','Updated Successfully');
        
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
        $this->ActivityLog('Delete bank_account');
        //
        $bank_account = BankAccountModel::find($id)->delete();
         return redirect("setup/sale/stock/bank_account")->with('message','Deleted Successfully');
    }

}
