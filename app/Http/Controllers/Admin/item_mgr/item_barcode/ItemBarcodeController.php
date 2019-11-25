<?php 
namespace App\Http\Controllers\Admin\item_mgr\item_barcode;

use Illuminate\Http\Request;
use App\Http\Requests\item_mgr\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\item_mgr\ItemBaseStore;
use App\Models\Admin\setup_mgr\BranchGroup;
use App\Models\Admin\setup_mgr\Branch;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\ItemSubCategory;
use App\Models\Admin\setup_mgr\ItemType;
use App\Models\Admin\setup_mgr\ItemStatus;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class ItemBarcodeController extends Controller
{
    public $view_title = "item_mgr/item_in_stock.entry_title";
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
      $getData_arr = $this->getData();
      $filetype = 'PNG';
      $dpi = 72;
      $rotation = 0;
      $font_family = 'Arial.ttf';
      $font_size = 11;
      $scale = 2.5;
      $thickness=30;
      $cid = '';
      $scid = '';
      $where_clause = Item::Where('is_delete',0);
      if(isset($_REQUEST['category_id'])){
        $filetype = $_REQUEST['filetype'];
        $dpi = $_REQUEST['dpi'];
        $scale = $_REQUEST['scale'];
        $rotation = $_REQUEST['rotation'];
        $font_family = $_REQUEST['font_family'];
        $font_size = $_REQUEST['font_size'];
        $thickness= $_REQUEST['thickness'];
      }
      if(isset($_REQUEST['item_category_id'])&&$_REQUEST['item_category_id']!=''){
        $cid = $_REQUEST['item_category_id'];
        $where_clause->Where('item_category_id', $_REQUEST['item_category_id']);
      }else{
        $where_clause->Limit(30);
      }

      if(isset($_REQUEST['item_sub_category_id'])&&$_REQUEST['item_sub_category_id']!=''){
        $scid = $_REQUEST['item_sub_category_id'];
        $where_clause->Where('item_sub_category_id',$_REQUEST['item_sub_category_id']);
      }

      $ItemCategory = ItemCategory::lists('item_category_name','id');

      $item_category_id = 0;
      $item_sub_category_id = 0;
      $ItemSubCategory = '';
      if(isset($_REQUEST['item_category_id'])){
        $item_category_id = $_REQUEST['item_category_id'];
        $item_sub_category_id = $item_category_id;
        $ItemSubCategory = ItemSubCategory::Where('item_category_id', $item_category_id)->Where('is_delete',0)->get();
      }
      

      $Item = collect($where_clause->get());
      // $ItemSubCategory = ItemCategory::all();
      return view('admin.item_mgr.item_barcode.index')
              ->with('Item',$Item)
              ->with('item_category_id', $item_category_id)
              ->with('item_sub_category_id', $item_sub_category_id)
              ->with('ItemCategory',$ItemCategory)
              ->with('ItemSubCategory',$ItemSubCategory)
              ->with('getData_arr',$getData_arr)
              ->with('filetype',$filetype)
              ->with('dpi',$dpi)
              ->with('scale',$scale)
              ->with('rotation',$rotation)
              ->with('font_family',$font_family)
              ->with('font_size',$font_size)
              ->with('thickness',$thickness)
              ->with('cid',$cid)
              ->with('scid',$scid);
    }

    public function print_barcode(){
      $getData_arr = $this->getData();
      $filetype = 'PNG';
      $dpi = 72;
      $rotation = 0;
      $font_family = 'Arial.ttf';
      $font_size = 11;
      $scale = 2.5;
      $thickness=30;
      $cid = '';
      $scid='';
      $cname = '';
      $sname='';
      $where_clause = Item::Where('is_delete',0);
      if(isset($_REQUEST['category_id'])){
        $cid = $_REQUEST['category_id'];
        $scid = $_REQUEST['sub_category_id'];
        $filetype = $_REQUEST['filetype'];
        $dpi = $_REQUEST['dpi'];
        $scale = $_REQUEST['scale'];
        $rotation = $_REQUEST['rotation'];
        $font_family = $_REQUEST['font_family'];
        $font_size = $_REQUEST['font_size'];
        $thickness= $_REQUEST['thickness'];
      }
      if(isset($_REQUEST['category_id'])&&$_REQUEST['category_id']!=''){
        $where_clause->Where('item_sub_category_id',$_REQUEST['category_id']);
        $getCat = ItemCategory::Where('id',$_REQUEST['category_id'])->Select('item_category_name')->first();
        if($getCat){
          $cname = $getCat->item_category_name;
        }
        
      } 

      if(isset($_REQUEST['sub_category_id'])&&$_REQUEST['sub_category_id']!=''){
        $where_clause->Where('item_sub_category_id',$_REQUEST['sub_category_id']);
        $getSCat = ItemSubCategory::Where('id',$_REQUEST['sub_category_id'])->Select('name')->first();
        if($getSCat){
          $sname = $getSCat->name;
        }
        
      }

      $ItemCategory = ItemCategory::lists('item_category_name','id');
      $ItemSubCategory = ItemSubCategory::lists('name','id');
      

      $Item = collect($where_clause->get());
      // $ItemSubCategory = ItemCategory::all();
      return view('admin.item_mgr.item_barcode._print_barcode')
              ->with('Item',$Item)
              ->with('ItemCategory',$ItemCategory)
              ->with('ItemSubCategory',$ItemSubCategory)
              ->with('getData_arr',$getData_arr)
              ->with('filetype',$filetype)
              ->with('dpi',$dpi)
              ->with('scale',$scale)
              ->with('rotation',$rotation)
              ->with('font_family',$font_family)
              ->with('font_size',$font_size)
              ->with('thickness',$thickness)
              ->with('cid',$cid)
              ->with('scid',$scid)
              ->with('cname',$cname)
              ->with('sname',$sname);
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

   
}
