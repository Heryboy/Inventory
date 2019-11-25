<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Setup\ItemBaseStockRequest;
use App\Http\Controllers\Controller;
use App\Models\Setup\ItemModel;
use App\Models\Setup\SupplierModel;
use App\Models\Setup\ItemBaseStockModel;
use App\Models\Setup\StockModel;
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

class ItemBaseStockController extends Controller
{
	
	public $view_title = "Item Base Stock";

    public function __construct()
    {
      $menu_code = 'y5_s41';
      Session::flash('permissionOn_Menu_ID',$menu_code);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
       $item = DB::table('item_to_stock as ibs')
                        ->Join('supplier as s','s.id','=','ibs.supplier_id')
                        ->Join('items as i','i.id','=','ibs.item_id')
                        ->Join('stock as st','st.id','=','ibs.stock_id')
                        ->Select('ibs.*','i.name as item_name', 's.name as supplier_name', 'st.name as stock_name' )
                        ->get();
      return view('setup.item_base_stock.index')
                   ->with('view_title',$this->view_title)
                   ->with('item',$item);
    }

    public function create()
    {       
            $supplier = SupplierModel::lists('name', 'id');
            $itemlist = ItemModel::lists('name', 'id');
            $stock = StockModel::lists('name', 'id');
            return view('setup.item_base_stock.form')->with('action','edit')
                                            ->with('supplier',$supplier)
        							        ->with('itemlist',$itemlist)
                                            ->with('stock',$stock)
                                            ->with('view_title',$this->view_title);
    }
    public function store(ItemBaseStockRequest $request)
    {
        
        $input = $request->all();
        // dd($input);
        //##########Set Event for ActivityLog############
        $this->ActivityLog('create');
        // dd($input);
        $item = ItemBaseStockModel::create($input);
      
        return redirect("setup/sale/stock/item_base_stock")->with('message','Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $item = ItemBaseStockModel::find($id);
            $supplier = SupplierModel::lists('name', 'id');
            $itemlist = ItemModel::lists('name', 'id');
            $stock = StockModel::lists('name', 'id');
            return view('setup.item_base_stock.form')->with('item',$item)
                                            ->with('supplier',$supplier)
                                            ->with('itemlist',$itemlist)
                                            ->with('stock',$stock)
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
        
        $item = ItemBaseStockModel::find($id);
            $supplier = SupplierModel::lists('name', 'id');
            $itemlist = ItemModel::lists('name', 'id');
            $stock = StockModel::lists('name', 'id');
            return view('setup.item_base_stock.form')->with('item',$item)
                                            ->with('supplier',$supplier)
                                            ->with('itemlist',$itemlist)
                                            ->with('stock',$stock)
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
    public function update(ItemBaseStockRequest $request, $id)
    {
        $input = $request->all();
        $item = ItemBaseStockModel::find($id);  
        $item->update($input);
        
        //##########Set Event for ActivityLog############
        $this->ActivityLog('Update item');      
             return redirect("setup/sale/stock/item_base_stock")->with('message','Updated Successfully');
        
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
        $this->ActivityLog('Delete item');
        //
        $item = ItemBaseStockModel::find($id)->delete();
         return redirect("setup/sale/stock/item_base_stock")->with('message','Deleted Successfully');
    }

}
