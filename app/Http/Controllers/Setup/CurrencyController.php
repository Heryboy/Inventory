<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Setup\CurrencyRequest;
use App\Http\Controllers\Controller;
use App\Models\Setup\CurrencyModel;
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

class CurrencyController extends Controller
{
	
	public $view_title = "Currency";

    public function __construct()
    {
      $menu_code = 'y5_s28';
      Session::flash('permissionOn_Menu_ID',$menu_code);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
      $currency = CurrencyModel::all();
      return view('setup.currency.index')
                   ->with('view_title',$this->view_title)
                   ->with('currency',$currency);
    }

    public function create()
    {
      return view('setup.currency.form')
                                        ->with('action','edit')
        							                  ->with('view_title',$this->view_title);
    }
    public function store(CurrencyRequest $request)
    {
        
        $input = $request->all();
        //##########Set Event for ActivityLog############
        $this->ActivityLog('create');
        // dd($input);
        $currency = CurrencyModel::create($input);
      
        return redirect("setup/system/currency")->with('message','Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currency = CurrencyModel::find($id);
            return view('setup.currency.form')->with('currency',$currency)
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
        
        $currency = CurrencyModel::find($id);
            return view('setup.currency.form')->with('currency',$currency)
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
    public function update(CurrencyRequest $request, $id)
    {
        $input = $request->all();
        $currency = CurrencyModel::find($id);  
        $currency->update($input);
        
        //##########Set Event for ActivityLog############
        $this->ActivityLog('Update Currency');      
             return redirect("setup/system/currency")->with('message','Updated Successfully');
        
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
        $this->ActivityLog('Delete Currency');
        //
        $currency = CurrencyModel::find($id)->delete();
         return redirect("setup/system/currency")->with('message','Deleted Successfully');
    }

}
