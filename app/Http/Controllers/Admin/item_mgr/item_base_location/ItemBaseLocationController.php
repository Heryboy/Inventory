<?php 
namespace App\Http\Controllers\Admin\item_mgr\item_base_location;

use Illuminate\Http\Request;
use App\Http\Requests\item_mgr\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\setup_mgr\ItemLocation;
use App\Models\Admin\item_mgr\ItemBaseStore;
use App\Models\Admin\setup_mgr\BranchGroup;
use App\Models\Admin\setup_mgr\Branch;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\ItemType;
use App\Models\Admin\setup_mgr\ItemStatus;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class ItemBaseLocationController extends Controller
{
    public $view_title = "item_mgr/item_base_store.entry_title";
    public $action = "Edit";

    public function __construct(){

    }
    /*
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
      // #################
      
      $items = Item::Where('is_delete',0)->OrderBy('id','DESC')->get();
      $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $Branch = Branch::Where('is_delete',0)->Lists('branch_name','id');
      $where_clause = DB::table('item_base_location as ibl')
                        ->Join('location as l','l.id','=','ibl.location_id')
                        ->Join('item as i','i.id','=','ibl.item_id')
                        ->Join('item_category as ic','ic.id','=','i.item_category_id')
                        ->Join('item_sub_category as isc','isc.id','=','i.item_sub_category_id')
                        ->Join('branch as b','b.id','=','ibl.branch_id')
                        ->Select('l.name as location_name','i.item_code','ic.item_category_name as category_name','isc.name as sub_category_name','i.name as item_name','b.branch_name as branch_name','i.net_price');
      
      if(isset($_REQUEST['from_date'])&&isset($_REQUEST['to_date'])){
        // $where_clause->whereBetween('ib.due_date', [$_REQUEST['from_date'], $_REQUEST['to_date']]);
      }
      if(isset($_REQUEST['branch_id']) && $_REQUEST['branch_id']!=""){
        $where_clause->Where('ibl.branch_id', $_REQUEST['branch_id']);
      }

      if(isset($_REQUEST['item_category_id']) && $_REQUEST['item_category_id']!=""){
        // $where_clause->Where('i.item_category_id',$_REQUEST['item_category_id']);
      }

      $ItemBaseLocations = collect($where_clause->get());
      $getData_arr = $this->getData();

      return view('admin.item_mgr.item_base_location.index')
                  ->With('ItemBaseLocations',$ItemBaseLocations)
                  ->With('item_category',$item_category)
                  ->With('Branch',$Branch)
                  ->With('getData_arr',$getData_arr)
                  ->With('items',$items);
    }

    /*
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create()
    {

      $where_clauses = Item::Where('is_delete',0);

      // dd($this->getItemBaseStoreArr(1));
      $chkHasItemAssign = ItemBaseStore::Where('branch_id',1)->count();
      $item_id_group='';
      if($chkHasItemAssign>0){
        $itemHasInStore = ItemBaseStore::Where('branch_id',1)->get();
        $item_arr='';
        foreach($itemHasInStore as $val){
          $item_arr .= $val->item_id.','; 
        }
        $item_id_group = explode(',', $item_arr);
        array_pop($item_id_group);
        $where_clauses->WhereNotIn('id',$item_id_group);
      }

      
      $branch_id = '';
      $category_id = '';

      if(isset($_REQUEST['branch_id'])){
        $where_clauses->WhereNotIn('id',$this->getItemBaseStoreArr($_REQUEST['branch_id']));
        $branch_id=$_REQUEST['branch_id'];
      }

      if(isset($_REQUEST['category_id']) && $_REQUEST['category_id']!=''){
        $where_clauses->Where('item_category_id',$_REQUEST['category_id']);
        $category_id=$_REQUEST['category_id'];
      }
      $where_clauses->OrderBy('id','DESC');
      $items = collect($where_clauses->get());

      $ItemLocation = ItemLocation::Where('is_delete',0)->Lists('name','id');
      $itemBaseStore = ItemBaseStore::all();

      $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $Branch = Branch::lists('branch_name','id');
      $getData_arr = $this->getData();
      return view('admin.item_mgr.item_base_location.form')  
              ->with('item_category',$item_category)
              ->with('ItemLocation',$ItemLocation)
              ->with('item_type',$item_type)
              ->with('item_status',$item_status)
              ->with('items',$items)
              ->With('Branch',$Branch)
              ->with('action',$this->action)
              ->With('getData_arr',$getData_arr)
              ->with('branch_id',$branch_id)
              ->with('category_id',$category_id)
              ->with('itemBaseStore',$itemBaseStore)
              ->with('view_title',$this->view_title);
    }

    // getItemBaseStoreArr 
    public function getItemBaseStoreArr($branch_id){
      $ItemBaseStore = ItemBaseStore::Where('branch_id',$branch_id)->get();
      $arr = '';
      foreach ($ItemBaseStore as $row) {
        $arr .= $row->item_id.',';
      }
      $result = explode(',', $arr);
      array_pop($result);
      return $result;
    }

    // getData
    public function getData(){
      $BranchGroups = BranchGroup::Where('is_delete',0)->OrderBy('branch_group_name')->get();
      $category_arr = array();
      foreach($BranchGroups as $BranchGroup){
        $Branches = Branch::Where('is_delete',0)->Where('branch_group_id',$BranchGroup->id)->get();
        $Branch_Array = array();
        foreach($Branches as $Branch){
          $Branch_Array[] = array(
            'branch_name' => $Branch->branch_name,
            'id' => $Branch->id,
          );
        }
        $data_arr[] = array(
          'branch_group_name' => $BranchGroup->branch_group_name,
          'Branch_Array' => $Branch_Array,
        );
      }
      return $data_arr;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
      $input = $request->all();
      $branch_id = $input['hidden_branch_id'];
      ItemBaseStore::Where('branch_id',$branch_id)->delete();
      if(isset($input['item_id'])){
        for ($i = 0; $i <=sizeof($input['item_id'])-1 ; $i++) {
          ItemBaseStore::create([
            'branch_id'=>$input['hidden_branch_id'],
            'item_category_id'=>$input['hidden_category_id'],
            'item_id'=>$input['item_id'][$i]
          ]);
        }
      }
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      // return redirect("admin/item_mgr/item")->with('message','Save Successfully');
      return redirect()->back()->with('message','Assign success Successfully');
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
