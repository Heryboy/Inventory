<?php namespace App\Http\Controllers\Admin\setup_mgr\item;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Item;
use App\Models\Admin\setup_mgr\ItemGallary;
use App\Models\Admin\setup_mgr\ItemConversion;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\ItemSubCategory;
use App\Models\Admin\setup_mgr\Currency;
use App\Models\Admin\setup_mgr\ItemRelated;
use App\Models\Admin\setup_mgr\ItemType;
use App\Models\Admin\setup_mgr\ItemStatus;
use App\Models\Admin\setup_mgr\ItemSize;
use App\Models\Admin\setup_mgr\Unit;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Request;
use Session;

class ItemController extends Controller
{
  public $view_title = "setup_mgr/item.entry_title";
  public $action = "Edit";
  
  public function __construct()
  {
     
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    $clause = '';
    $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
    $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
    $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');

    //Item::Where('is_delete',0)->get();
    $item_clause = DB::table("item as i")
             ->Join('item_category as ic','ic.id','=','i.item_category_id')
             ->Join('item_type as it','it.id','=','i.item_type_id')
             ->Join('item_status as is','is.id','=','i.item_status_id')
             ->Join('item_sub_category as isc','isc.id','=','i.item_sub_category_id')
             ->Where('i.is_delete',0)
             ->OrderBy('i.id','DESC')
             ->Select("i.*","ic.item_category_name as item_cat_name",'isc.name as item_sub_catName',"it.name as item_type_name","is.name as item_status_name");
    
    if(isset($_REQUEST['item_subcatID'])){
      $item_clause->Where('i.item_sub_category_id',$_REQUEST['item_subcatID']);
    }

    if(isset($_REQUEST['filter_item_cat'])){
      $item_clause->WHERE('ic.item_category_name','LIKE','%'.$_REQUEST['filter_item_cat'].'%');
    }
    if(isset($_REQUEST['filter_item_type'])){
      $item_clause->WHERE('it.name','LIKE','%'.$_REQUEST['filter_item_type'].'%');
    }

    if(isset($_REQUEST['filter_item_name'])){
      $item_clause->WHERE('i.name','LIKE','%'.$_REQUEST['filter_item_name'].'%');
    }

    $items = collect($item_clause->get());
      
    // getData
    $getData_arr = $this->getData();
    return view('admin.setup_mgr.item.index')
              ->with('item_category',$item_category)
              ->with('item_type',$item_type)
              ->with('item_status',$item_status)
              ->with('getData_arr',$getData_arr)
              ->with('items',$items);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
    $item_sub_category = ItemSubCategory::Where('is_delete',0)->get();
    $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
    $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
    $item_size = ItemSize::Where('is_delete',0)->Where('is_active',1)->Lists('abbr','id');
    $currency = Currency::lists('name','id');
    $units = Unit::lists('name','id');
    $unitGroups = Unit::all();
    $getData_arr = $this->getData();
    return view('admin.setup_mgr.item.form')  
              ->with('item_category',$item_category)
              ->with('item_sub_category',$item_sub_category)
              ->with('item_type',$item_type)
              ->with('item_status',$item_status)
              ->with('item_size',$item_size)
              ->with('currency',$currency)
              ->with('getData_arr',$getData_arr)
              ->with('units',$units)
              ->with('unitGroups',$unitGroups)
              ->with('action',$this->action)
              ->with('view_title',$this->view_title);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function store(ItemRequest $request)
  {
    $input = $request->all();
    $bool = $this->chkExistData('item','item_barcode',$input['item_barcode']);
    $fileImage = "";
    if (Input::file('image')!="") {
      if(Input::file('image')->isValid()){
        $image = $input['image'];
        $date_create = date('d-M-Y/');
        $destinationPath = 'images/uploads/products/'.$date_create; // upload path
        $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
        //$fileName = rand(11111,99999).'.'.$extension; // renameing image
        $fileName = $image->getClientOriginalName();
        Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
        $fileImage = $date_create.$fileName;
        $input['image'] = $fileImage;
      }                    
    }

    if($bool==0){
      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;

      $input['created_by'] = Auth::user()->id;
      // Item
      $Item = Item::create($input);
      // dd($input);
      $LastItemId = $Item->id;
      if(isset($input['item_conversion'])){
        foreach($input['item_conversion'] as $item_conversion){
          // ItemConversion
          $ItemConversion = ItemConversion::insert(
                  [
                    'item_id' => $LastItemId,
                    'unit1'   => $item_conversion['unit1'],
                    'unit2'   => $item_conversion['unit2'],
                    'qty1'    => $item_conversion['qty1'],
                    'qty2'    => $item_conversion['qty2']
                  ]
                );
        }
      }


      // ItemRelated
      if(!empty($input['item_attribute_hidden'])){
        foreach ($item_attribute as $item) {
          ItemRelated::insert(
            [
              'item_id' => $LastItemId,
              'item_related_id' => $item['item_id'],
            ]
          );
        }
      }

      if(isset($input['attribute_image'])){
        $attribute_images = $input['attribute_image'];
        foreach ($attribute_images as $attribute_image) {
            // dd($attribute_image['image']);
            $filename_image='';
            if($attribute_image['image_gallary']!=null){
              $image_gallary = $attribute_image['image_gallary'];
              $destinationPath = 'images/uploads/products/'.$date_create;
              $filename_image_alt = $image_gallary->getClientOriginalName();
              $filename_image = preg_replace('/[^a-zA-Z0-9_.]/', '', $filename_image_alt);
              $image_gallary->move($destinationPath, $filename_image);

              ItemGallary::insert(
                [
                  'item_id' => intval($LastItemId),
                  'name' => $attribute_image['name'],
                  'image_gallary' => $date_create.$filename_image,
                  'order_level' => $attribute_image['order_level'],
                ]
              );
            }else{
              ItemGallary::insert(
                [
                  'item_id' => intval($LastItemId),
                  'name' => $attribute_image['name'],
                  'image_gallary' => $attribute_image['image_gallary_hidden'],
                  'order_level' => $attribute_image['order_level'],
                ]
              );
            }
          }
      }

      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect()->back()->with('message','Save Successfully');

  }else{
    return redirect()->back()->with('message','Already Exist!');
  }


  }

  public function show($id)
  {
    $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
    $item_sub_category = ItemSubCategory::Where('is_delete',0)->get();
    $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
    $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
    $item_size = ItemSize::Where('is_delete',0)->Where('is_active',1)->Lists('abbr','id');
    $item = Item::findOrFail($id);
    $ItemConversion = ItemConversion::WHERE('item_id',$id)->get();
    $units = Unit::lists('name','id');
    $unitGroups = Unit::all();
    $currency = Currency::lists('name','id');
    $getData_arr = $this->getData();
    $ItemRelated = DB::table('item_related as ir')
                  ->Join('item as i','i.id','=','ir.item_related_id')
                  ->Select('i.name','i.id')
                  ->Where('item_id',$id)
                  ->get();

    return view('admin.setup_mgr.item.form')->with('item',$item)
                                        ->with('ItemConversion',$ItemConversion)
                                        ->with('ItemRelated',$ItemRelated)
                                        ->with('item_category',$item_category)
                                        ->with('item_sub_category',$item_sub_category)
                                        ->with('item_type',$item_type)
                                        ->with('item_size',$item_size)
                                        ->with('getData_arr',$getData_arr)
                                        ->with('currency',$currency)
                                        ->with('units',$units)
                                        ->with('unitGroups',$unitGroups)
                                        ->with('item_status',$item_status)
                                        ->with('view_title',$this->view_title)
                                        ->with('action',"Show");
  }

  public function edit($id)
  {

    $item_category = ItemCategory::Where('is_delete',0)->Lists('item_category_name','id');
    $item_sub_category = ItemSubCategory::Where('is_delete',0)->get();
    $item_type = ItemType::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
    $item_status = ItemStatus::Where('is_delete',0)->Where('is_active',1)->Lists('name','id');
    $item_size = ItemSize::Where('is_delete',0)->Where('is_active',1)->Lists('abbr','id');
    $item = Item::findOrFail($id);
    $ItemConversion = ItemConversion::WHERE('item_id',$id)->get();
    $units = Unit::lists('name','id');
    $unitGroups = Unit::all();
    $currency = Currency::lists('name','id');
    $getData_arr = $this->getData();
    $ItemGallary = ItemGallary::Where('item_id',$id)->get();
    $ItemRelated = DB::table('item_related as ir')
                  ->Join('item as i','i.id','=','ir.item_related_id')
                  ->Select('i.name','i.id')
                  ->Where('item_id',$id)
                  ->get();

    return view('admin.setup_mgr.item.form')->with('item',$item)
                                        ->with('ItemGallary',$ItemGallary)
                                        ->with('ItemConversion',$ItemConversion)
                                        ->with('ItemRelated',$ItemRelated)
                                        ->with('item_category',$item_category)
                                        ->with('item_sub_category',$item_sub_category)
                                        ->with('item_type',$item_type)
                                        ->with('getData_arr',$getData_arr)
                                        ->with('currency',$currency)
                                        ->with('units',$units)
                                        ->with('unitGroups',$unitGroups)
                                        ->with('item_status',$item_status)
                                        ->with('item_size',$item_size)
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
    $input = Request::all();
    // dd($input);
    $input['updated_by'] = Auth::user()->id;
    if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
    else $input['is_active'] = 0;

    $fileImage = "";
    if (Input::file('image')!="") {
      if(Input::file('image')->isValid()){
        $image = $input['image'];
        $date_create = date('d-M-Y/');
        $destinationPath = 'images/uploads/products/'.$date_create; // upload path
        $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
        //$fileName = rand(11111,99999).'.'.$extension; // renameing image
        $fileName = $image->getClientOriginalName();
        Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
        $fileImage = $date_create.$fileName;
        $input['image'] = $fileImage;
      }                    
    }else{
      $input['image'] = $input['image_hidden'];
    }

    $item = Item::find($id);
    $item->update($input);
    // ItemConversion
    $ItemConversion = ItemConversion::Where('item_id',$id)->delete();
    if(isset($input['item_conversion'])){
      foreach($input['item_conversion'] as $item_conversion){
        // ItemConversion
        $ItemConversion = ItemConversion::insert(
          [
            'item_id' => $id,
            'unit1'   => $item_conversion['unit1'],
            'unit2'   => $item_conversion['unit2'],
            'qty1'    => $item_conversion['qty1'],
            'qty2'    => $item_conversion['qty2']
          ]
        );
      }
    }

    // ItemRelated
    if(isset($input['item_attribute_hidden'])){
      ItemRelated::Where('item_id',$id)->delete();
      foreach ($input['item_attribute_hidden'] as $item) {
        ItemRelated::insert(
          [
            'item_id' => $id,
            'item_related_id' => $item['item_id'],
          ]
        );
      }
    }
    // dd($input);
    // (dd($filter_input(type, variable_name)));
    ItemGallary::Where('item_id',$id)->delete();
    // dd($request['attribute_image']);
    $date_create = date('d-M-Y/');
    if(isset($input['attribute_image'])){
      $attribute_images = $input['attribute_image'];
      ItemGallary::where('item_id',$id)->delete();
      foreach ($attribute_images as $attribute_image) {
        // dd($attribute_image['image']);
        $filename_image='';
        if($attribute_image['image_gallary']!=null){
          $image_gallary = $attribute_image['image_gallary'];
          $destinationPath = 'images/uploads/products/'.$date_create;
          $filename_image_alt = $image_gallary->getClientOriginalName();
          $filename_image = preg_replace('/[^a-zA-Z0-9_.]/', '', $filename_image_alt);
          $image_gallary->move($destinationPath, $filename_image);

          ItemGallary::insert(
            [
              'item_id' => intval($id),
              'name' => $attribute_image['name'],
              'image_gallary' => $date_create.$filename_image,
              'order_level' => $attribute_image['order_level'],
            ]
          );
        }else{
          ItemGallary::insert(
            [
              'item_id' => intval($id),
              'name' => $attribute_image['name'],
              'image_gallary' => $attribute_image['image_gallary_hidden'],
              'order_level' => $attribute_image['order_level'],
            ]
          );
        }
      }
    }

    //##########Set Event for ActivityLog############
    $this->ActivityLog('update');
    return redirect()->back()->with('message','Update Successfully');
  }

  public function getUnitBaseItem(Request $request){
    $input = Request::all();
    $Item = Item::Where('id',$input['item_id'])->first();
    $Units = DB::table('item_conversion as ic')
             ->select('ic.unit1 as unit_id', 'u.name as unit_name')
             ->join('unit as u', 'u.id', '=', 'ic.unit1')
             ->where('ic.item_id', $input['item_id'])
             ->groupBy('ic.unit1')
             ->get();
    $data = array(
      'itemCode' => $Item->item_code,
      'units' => $Units
    );
    return json_encode($data);
  }

  public function getError($request){

  }

  // getData
  public function getData(){
    $ItemCategories = ItemCategory::Where('is_delete',0)->OrderBy('item_category_name')->get();
    $category_arr = array();
    $data_arr = array();
    if($ItemCategories){
      foreach($ItemCategories as $ItemCat){
        $ItemSubCategories = ItemSubCategory::Where('is_delete',0)->Where('item_category_id',$ItemCat->id)->get();
        $sub_category_arr = array();
        foreach($ItemSubCategories as $ItemSubCat){
          $sub_category_arr[] = array(
            'name' => $ItemSubCat->name,
            'id' => $ItemSubCat->id,
          );
        }
        $data_arr[] = array(
          'item_category_name' => $ItemCat->item_category_name,
          'sub_category_arr' => $sub_category_arr,
        );
      }
    }

    return $data_arr;
  }

  public function getItem(Request $request){
    // $data = $request->all();
    $input = Request::all();
    $data_arr = array();
    $item_name = $input['filter_name'];
    $items = DB::table('item')
          ->Where('name','LIKE','%'.$item_name.'%')
          ->Limit(5)
          ->get();

    foreach ($items as $item) {
      $data_arr[] = array(
        'id'   => $item->id,
        'name' => $item->name
      );
    }

    // dd($data_arr);
    return $data_arr;
  }

  // getItemSubCategory
  public function getItemSubCategory(Request $request){
    $input = Request::all();
    $item_sub_category = ItemSubCategory::Where('is_delete',0)->Where('item_category_id',$input['item_category_id'])->get();
    $data_arr = array();
    foreach ($item_sub_category as $value) {
      $data_arr[] = array(
        'id'   => $value->id,
        'name' => $value->name
      );
    }
    return json_encode($data_arr);
  }

  // getItemCategory
  public function getItemCategory(Request $request){
    // $data = $request->all();
    $input = Request::all();
    $data_arr = array();
    $filter_name = $input['filter_name'];
    $items = ItemCategory::Where('item_category_name','LIKE','%'.$filter_name.'%')->Limit(5)->get();

    foreach ($items as $item) {
      $data_arr[] = array(
        'id'   => $item->id,
        'name' => $item->item_category_name
      );
    }
    // dd($data_arr);
    return $data_arr;
  }

  // getItemCategory
  public function getItemType(Request $request){
    // $data = $request->all();
    $input = Request::all();
    $data_arr = array();
    $filter_name = $input['filter_name'];
    $items = ItemType::Where('name','LIKE','%'.$filter_name.'%')->Limit(5)->get();

    foreach ($items as $item) {
      $data_arr[] = array(
        'id'   => $item->id,
        'name' => $item->name
      );
    }
    // dd($data_arr);
    return $data_arr;
  }

  // getItemCategory
  public function getItemName(Request $request){
    // $data = $request->all();
    $input = Request::all();
    $data_arr = array();
    $filter_name = $input['filter_name'];
    $items = Item::Where('name','LIKE','%'.$filter_name.'%')->Limit(5)->get();

    foreach ($items as $item) {
      $data_arr[] = array(
        'id'   => $item->id,
        'name' => $item->name
      );
    }
    // dd($data_arr);
    return $data_arr;
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
