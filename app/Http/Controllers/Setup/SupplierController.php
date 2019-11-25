<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Setup\SupplierRequest;
use App\Http\Controllers\Controller;
use App\Models\Setup\SupplierModel;
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

class SupplierController extends Controller
{
	
	public $view_title = "Supplier";

    public function __construct()
    {
      $menu_code = 'y5_s35';
      Session::flash('permissionOn_Menu_ID',$menu_code);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
      $supplier = SupplierModel::all();
      return view('setup.supplier.index')
                   ->with('view_title',$this->view_title)
                   ->with('supplier',$supplier);
    }

    public function create()
    {
     
      return view('setup.supplier.form')->with('action','edit')
        							   ->with('view_title',$this->view_title);
    }
    public function store(SupplierRequest $request)
    {
        
        $input = $request->all();
        //##########Set Event for ActivityLog############
        $this->ActivityLog('create');
        // dd($input);
        $supplier = SupplierModel::create($input);
      
        return redirect("setup/sale/stock/supplier")->with('message','Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = SupplierModel::find($id);
       
            return view('setup.supplier.form')->with('supplier',$supplier)
                                
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
        
        $supplier = SupplierModel::find($id);
       
            return view('setup.supplier.form')->with('supplier',$supplier)
                                
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
    public function update(SupplierRequest $request, $id)
    {
        $input = $request->all();
        $supplier = SupplierModel::find($id);  
        $supplier->update($input);
        
        //##########Set Event for ActivityLog############
        $this->ActivityLog('Update supplier');      
             return redirect("setup/sale/stock/supplier")->with('message','Updated Successfully');
        
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
        $this->ActivityLog('Delete supplier');
        //
        $supplier = SupplierModel::find($id)->delete();
         return redirect("setup/sale/stock/supplier")->with('message','Deleted Successfully');
    }

}
