<?php 
namespace App\Http\Controllers\Admin\discount;

use Illuminate\Http\Request;
use App\Http\Requests\discount\DiscountItemRequest;
use App\Models\Admin\discount\DiscountItem;
use App\Models\Admin\discount\DiscountMethods;
use App\Models\Admin\discount\DiscountItemDetail;

use App\Http\Requests\item_mgr\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Item;
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

class DiscountItemController  extends Controller
{
    public $view_title = "discount/discount_item.entry_title";
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
      $discount_item = DiscountItem::Where('is_delete',0)->get();
      $getData_arr = $this->getData();

      return view('admin.discount.discount_item.index')
                  ->with('discount_item',$discount_item)
                  ->With('getData_arr',$getData_arr);
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
      $chkHasDiscountItem = DiscountItemDetail::Where('branch_id',1)->count();
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

      $itemBaseStore = ItemBaseStore::all();
      $DiscountMethods = DiscountMethods::lists('abbr','id');
      $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $Branch = Branch::lists('branch_name','id');
      $getData_arr = $this->getData();
      return view('admin.discount.discount_item.form')  
              ->with('DiscountMethods',$DiscountMethods)
              ->with('item_category',$item_category)
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

    public function store(DiscountItemRequest $request)
    {
      $input = $request->all();
      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      $DiscountItem = DiscountItem::create([
        'name'=>$input['name'],
        'start_date'=>$input['start_date'],
        'end_date'=>$input['end_date'],
        'is_active'=>$input['is_active']
      ]);
      $LastId = $DiscountItem->id;
      $branch_id = $input['hidden_branch_id'];
      if(isset($input['item_id'])){
        for ($i = 0; $i <=sizeof($input['item_id'])-1 ; $i++) {
          DiscountItemDetail::create([
            'discount_item_id'=>$LastId,
            'category_id'=>$input['hidden_category_id'],
            'branch_id'=>$input['hidden_branch_id'],
            'item_id'=>$input['item_id'][$i],
            'discount'=>$input['discount'][$i],
            'discount_method_id'=>$input['discount_method_id'][$i],
            'item_id'=>$input['item_id'][$i],
          ]);
        }
      }
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      // return redirect("admin/item_mgr/item")->with('message','Save Successfully');
      return redirect()->back()->with('message','Created Successfully');
    }

    public function show($id)
    {
      
      $where_clauses = Item::Where('is_delete',0);
      $branchid = $this->DefaultBranch();
      // dd($this->getItemBaseStoreArr(1));
      $chkHasDiscountItem = DiscountItemDetail::Where('discount_item_id',$id)->count();
      $item_id_group='';
      if($chkHasDiscountItem>0){
        $itemHasInStore = DiscountItemDetail::Where('discount_item_id',$id)->get();
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
      $DiscountItem = DiscountItem::findOrFail($id);
      $DiscountItemDetail = DiscountItemDetail::Where('discount_item_id',$id)->get();
      $DiscountMethods = DiscountMethods::lists('abbr','id');
      $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $Branch = Branch::lists('branch_name','id');
      $getData_arr = $this->getData();
      return view('admin.discount.discount_item.form')  
              ->with('DiscountMethods',$DiscountMethods)
              ->with('item_category',$item_category)
              ->with('item_type',$item_type)
              ->with('item_status',$item_status)
              ->with('items',$items)
              ->With('Branch',$Branch)
              ->with('action',$this->action)
              ->With('getData_arr',$getData_arr)
              ->with('branch_id',$branch_id)
              ->with('category_id',$category_id)
              ->with('DiscountItem',$DiscountItem)
              ->with('DiscountItemDetail',$DiscountItemDetail)
              ->with('view_title',$this->view_title);
    }

    public function edit($id)
    {
      $where_clauses = Item::Where('is_delete',0);
      $branchid = $this->DefaultBranch();
      // dd($this->getItemBaseStoreArr(1));
      $chkHasDiscountItem = DiscountItemDetail::Where('discount_item_id',$id)->count();
      $item_id_group='';
      if($chkHasDiscountItem>0){
        $itemHasInStore = DiscountItemDetail::Where('discount_item_id',$id)->get();
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
      $DiscountItem = DiscountItem::findOrFail($id);
      $DiscountItemDetail = DiscountItemDetail::Where('discount_item_id',$id)->get();
      $DiscountMethods = DiscountMethods::lists('abbr','id');
      $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
      $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
      $Branch = Branch::lists('branch_name','id');
      $getData_arr = $this->getData();
      return view('admin.discount.discount_item.form')  
              ->with('DiscountMethods',$DiscountMethods)
              ->with('item_category',$item_category)
              ->with('item_type',$item_type)
              ->with('item_status',$item_status)
              ->with('items',$items)
              ->With('Branch',$Branch)
              ->with('action',$this->action)
              ->With('getData_arr',$getData_arr)
              ->with('branch_id',$branch_id)
              ->with('category_id',$category_id)
              ->with('DiscountItem',$DiscountItem)
              ->with('DiscountItemDetail',$DiscountItemDetail)
              ->with('view_title',$this->view_title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountItemRequest $request, $id)
    {
      $input = $request->all();
      $input['updated_by'] = Auth::user()->id;
      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      $DiscountItem = DiscountItem::find($id);
      $DiscountItem->update([
        'name'=>$input['name'],
        'start_date'=>$input['start_date'],
        'end_date'=>$input['end_date'],
        'is_active'=>$input['is_active']
      ]);
      $branch_id = $input['hidden_branch_id'];
      DiscountItemDetail::Where('discount_item_id',$id)->delete();
      if(isset($input['item_id'])){
        for ($i = 0; $i <=sizeof($input['item_id'])-1 ; $i++) {
          DiscountItemDetail::create([
            'discount_item_id'=>$id,
            'category_id'=>$input['hidden_category_id'],
            'branch_id'=>$input['hidden_branch_id'],
            'item_id'=>$input['item_id'][$i],
            'discount'=>$input['discount'][$i],
            'discount_method_id'=>$input['discount_method_id'][$i],
            'item_id'=>$input['item_id'][$i],
          ]);
        }
      }
      //##########Set Event for ActivityLog############
      $this->ActivityLog('update');
      return redirect()->back()->with('message','Update Successfully');
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
      $DiscountItem = DiscountItem::find($id);
      $DiscountItem->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
