<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Setup\ItemCateogryRequest;
use App\Http\Controllers\Controller;
use App\Models\Setup\ItemCateogryModel;
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

class ItemCategoryController extends Controller
{
	
	public $view_title = "Item Category";

    public function __construct()
    {
      $menu_code = 'y5_s36';
      Session::flash('permissionOn_Menu_ID',$menu_code);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
      $item_category = ItemCateogryModel::all();
      return view('setup.item_category.index')
                   ->with('view_title',$this->view_title)
                   ->with('item_category',$item_category);
    }

    public function create()
    {
            return view('setup.item_category.form')->with('action','edit')
                                            
        							        ->with('view_title',$this->view_title);
    }
    public function store(ItemCateogryRequest $request)
    {
        
        $input = $request->all();
        // dd($input);
        //##########Set Event for ActivityLog############
        $this->ActivityLog('create');
        // dd($input);
        $item_category = ItemCateogryModel::create($input);
      
        return redirect("setup/sale/stock/item_category")->with('message','Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item_category = ItemCateogryModel::find($id);
            return view('setup.item_category.form')->with('item_category',$item_category)
                                              
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
        
        $item_category = ItemCateogryModel::find($id);
            return view('setup.item_category.form')->with('item_category',$item_category)
                                              
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
    public function update(ItemCateogryRequest $request, $id)
    {
        $input = $request->all();
        $item_category = ItemCateogryModel::find($id);  
        $item_category->update($input);
        
        //##########Set Event for ActivityLog############
        $this->ActivityLog('Update item_category');      
             return redirect("setup/sale/stock/item_category")->with('message','Updated Successfully');
        
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
        $this->ActivityLog('Delete item_category');
        //
        $item_category = ItemCateogryModel::find($id)->delete();
         return redirect("setup/sale/stock/item_category")->with('message','Deleted Successfully');
    }

}
