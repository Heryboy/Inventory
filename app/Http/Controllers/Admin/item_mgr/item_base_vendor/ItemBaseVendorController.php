<?php 
namespace App\Http\Controllers\Admin\item_mgr\item_base_vendor;

// use Illuminate\Http\Request;
use App\Http\Requests\item_mgr\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\item_mgr\ItemBaseVendor;
// use App\Models\Admin\setup_mgr\ItemCategory;
// use App\Models\Admin\setup_mgr\ItemType;
// use App\Models\Admin\setup_mgr\ItemStatus;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class ItemBaseVendorController extends Controller
{
    public $view_title = "item_mgr/item.entry_title";
    public $action = "Edit";
    
    public function __construct()
    {
       
    }

    /*
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index()
    {
      $items = Item::Where('is_delete',0)->OrderBy('id','DESC')->get(); 
      $ItemBaseVendors = ItemBaseVendor::all();
      return view('admin.item_mgr.item_base_vendor.index')
                  ->With('ItemBaseVendors',$ItemBaseVendors)
                  ->With('items',$items);;
    }

    /*
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create()
    {
      $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      return view('admin.item_mgr.item.form')  
                ->with('item_category',$item_category)
                ->with('item_type',$item_type)
                ->with('item_status',$item_status)
                ->with('action',$this->action)
                ->with('view_title',$this->view_title);
    }

   /*
    * Store a newly created resource in storage
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store(ItemRequest $request)
    {
      
      $input = $request->all();

      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;

      else $input['is_active'] = 0;

      $input['created_by'] = Auth::user()->id;
      Item::create($input);
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/item_mgr/item")->with('message','Save Successfully');

    }

    public function show($id)
    {
      
      $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');       
      $item = Item::findOrFail($id);
      return view('admin.item_mgr.item.form')->with('item',$item)
                                          ->with('item_category',$item_category)
                                          ->with('item_type',$item_type)
                                          ->with('item_status',$item_status)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item = Item::findOrFail($id);
      return view('admin.item_mgr.item.form')->with('item',$item)
                                          ->with('item_category',$item_category)
                                          ->with('item_type',$item_type)
                                          ->with('item_status',$item_status)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Edit");
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
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
        else $input['is_active'] = 0;
       
        $item = Item::find($id);
        
        $item->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect("admin/item_mgr/item")->with('message','Save Successfully');
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
      $this->ActivityLog('delete');
      $item = Item::find($id);
      $item->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
