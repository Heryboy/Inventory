<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Setup\StockRequest;
use App\Http\Controllers\Controller;
use App\Models\Setup\StockModel;
use App\Models\Setup\LookUpModel;
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

class StockController extends Controller
{
	
	public $view_title = "Stock";

    public function __construct()
    {
      $menu_code = 'y5_s38';
      Session::flash('permissionOn_Menu_ID',$menu_code);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
       $stock = DB::table('stock as s')
                        ->Join('lookup as l','l.id','=','s.stock_type_id')
                        ->Select('s.*', 'l.name as stock_type_name')
                        ->get();
      return view('setup.stock.index')
                   ->with('view_title',$this->view_title)
                   ->with('stock',$stock);
    }

    public function create()
    {       
            // $stock_type = LookUpModel::lists('name', 'id');
            $stock_type=DB::table('lookup')->where('look_up_group_id',1)->lists('name','id');
            $stockList = StockModel::lists('name', 'id');
            return view('setup.stock.form')->with('action','edit')
                                            ->with('stock_type',$stock_type)
                                            ->with('stockList',$stockList)
                                            ->with('view_title',$this->view_title);
    }
    public function store(StockRequest $request)
    {
        
        $input = $request->all();
        // dd($input);
        //##########Set Event for ActivityLog############
        $this->ActivityLog('create');
        // dd($input);
        $stock = StockModel::create($input);
      
        return redirect("setup/sale/stock/stock")->with('message','Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = StockModel::find($id);
        $stock_type = LookUpModel::lists('name', 'id');
        $stockList = StockModel::lists('name', 'id');
            return view('setup.stock.form')->with('stock',$stock)
                                            ->with('stock_type',$stock_type)
                                            ->with('stockList',$stockList)
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
        
        $stock = StockModel::find($id);
        $stock_type = LookUpModel::lists('name', 'id');
         $stockList = StockModel::lists('name', 'id');
            return view('setup.stock.form')->with('stock',$stock)
                                            ->with('stock_type',$stock_type)
                                             ->with('stockList',$stockList)
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
    public function update(StockRequest $request, $id)
    {
        $input = $request->all();
        $stock = StockModel::find($id);  
        $stock->update($input);
        
        //##########Set Event for ActivityLog############
        $this->ActivityLog('Update stock');      
             return redirect("setup/sale/stock/stock")->with('message','Updated Successfully');
        
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
        $this->ActivityLog('Delete stock');
        //
        $stock = StockModel::find($id)->delete();
         return redirect("setup/sale/stock/stock")->with('message','Deleted Successfully');
    }

}
