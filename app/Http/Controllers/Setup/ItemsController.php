<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Setup\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Setup\ItemModel;
use App\Models\Setup\SupplierModel;
use App\Models\Setup\ItemCateogryModel;
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

class ItemsController extends Controller
{
	
	public $view_title = "Item";

    public function __construct()
    {
      $menu_code = 'y5_s37';
      Session::flash('permissionOn_Menu_ID',$menu_code);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
       $item = DB::table('items as i')
                        // ->Join('supplier as s','s.id','=','i.supplier_id')
                        ->Join('item_category as ic','ic.id','=','i.item_category_id')
                        // ->Join('stock as st','st.id','=','i.stock_id')
                        ->Select('i.*','ic.name as item_category_name')
                        ->get();
      return view('setup.item.index')
                   ->with('view_title',$this->view_title)
                   ->with('item',$item);
    }

    public function create()
    {       
            // $supplier = SupplierModel::lists('name', 'id');
            $itemCategory = ItemCateogryModel::lists('name', 'id');
            // $stock = StockModel::lists('name', 'id');
            return view('setup.item.form')->with('action','edit')
                                            // ->with('supplier',$supplier)
        							        ->with('itemCategory',$itemCategory)
                                            // ->with('stock',$stock)
                                            ->with('view_title',$this->view_title);
    }
    public function store(ItemRequest $request)
    {
        
        $input = $request->all();
        // dd($input);
        //##########Set Event for ActivityLog############
        $this->ActivityLog('create');
        // dd($input);
        $item = ItemModel::create($input);
      
        return redirect("setup/sale/stock/items")->with('message','Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = ItemModel::find($id);
        // $supplier = SupplierModel::lists('name', 'id');
        $itemCategory = ItemCateogryModel::lists('name', 'id');
        // $stock = StockModel::lists('name', 'id');
            return view('setup.item.form')->with('item',$item)
                                            // ->with('supplier',$supplier)
                                            ->with('itemCategory',$itemCategory)
                                            // ->with('stock',$stock)
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
        
        $item = ItemModel::find($id);
        // $supplier = SupplierModel::lists('name', 'id');
        $itemCategory = ItemCateogryModel::lists('name', 'id');
        // $stock = StockModel::lists('name', 'id');
            return view('setup.item.form')->with('item',$item)
                                            // ->with('supplier',$supplier)
                                            ->with('itemCategory',$itemCategory)
                                            // ->with('stock',$stock)
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
    public function update(ItemRequest $request, $id)
    {
        $input = $request->all();
        $item = ItemModel::find($id);  
        $item->update($input);
        
        //##########Set Event for ActivityLog############
        $this->ActivityLog('Update item');      
             return redirect("setup/sale/stock/items")->with('message','Updated Successfully');
        
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
        $item = ItemModel::find($id)->delete();
         return redirect("setup/sale/stock/items")->with('message','Deleted Successfully');
    }

}
