<?php namespace App\Http\Controllers\Admin\setup_mgr\item_subcategory;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\ItemSubCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\ItemSubCategory;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\Branch;
use App\Models\Admin\setup_mgr\POSKitchen;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class ItemSubCategoryController extends Controller
{

    public $view_title = "setup_mgr/item_sub_category.entry_title";
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
      $item_categories = ItemSubCategory::Where('is_delete',0)->OrderBy('id','desc')->get();
      return view('admin.setup_mgr.item_sub_category.index')
                ->with('item_categories',$item_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $branch = Branch::lists('branch_name','id');
      $ItemCategory = ItemCategory::lists('item_category_name','id');
      $POSKitchens = POSKitchen::Where('is_deleted', 0)->lists('name','id');
      return view('admin.setup_mgr.item_sub_category.form')
                ->with('branch',$branch)
                ->with('ItemCategory',$ItemCategory)
                ->with('POSKitchens', $POSKitchens)
                ->with('action',$this->action)
                ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ItemSubCategoryRequest $request)
    {
      $input = $request->all();
      
      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      
      $input['created_by'] = Auth::user()->id;

      $fileImage = "";
      if (Input::file('image')!="") {
        // if(Input::file('image')->isValid()){
        $image = Input::file('image');
        $date_create = date('d-M-Y/');
        $destinationPath = 'images/uploads/catalog/'.$date_create; // upload path
        $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
        //$fileName = rand(11111,99999).'.'.$extension; // renameing image
        $fileName = $image->getClientOriginalName();
        Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
        $fileImage = $date_create.$fileName;
        // }
        $input['image'] = $date_create.$fileName;        
      }

      ItemSubCategory::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect()->back()->with('message','Save Successfully');
    }

    public function show($id)
    {
                      
      $item_sub_category = ItemSubCategory::findOrFail($id);
      $branch = Branch::lists('branch_name','id');
      $ItemCategory = ItemCategory::lists('item_category_name','id');
      $POSKitchens = POSKitchen::Where('is_deleted', 0)->lists('name','id');
      return view('admin.setup_mgr.item_sub_category.form')->with('item_sub_category',$item_sub_category)
                                          ->with('branch',$branch)
                                          ->with('ItemCategory',$ItemCategory)
                                          ->with('POSKitchens', $POSKitchens)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $item_sub_category = ItemSubCategory::findOrFail($id);
      $branch = Branch::lists('branch_name','id');
      $ItemCategory = ItemCategory::lists('item_category_name','id');
      $POSKitchens = POSKitchen::Where('is_deleted', 0)->lists('name','id');
      return view('admin.setup_mgr.item_sub_category.form')->with('item_sub_category',$item_sub_category)
                                          ->with('branch',$branch)
                                          ->with('ItemCategory',$ItemCategory)
                                          ->with('POSKitchens', $POSKitchens)
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
    public function update(ItemSubCategoryRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
        else $input['is_active'] = 0;
        
        $fileImage = "";
        if (Input::file('image')!="") {
          if(Input::file('image')->isValid()){
            $image = $input['image'];
            $date_create = date('d-M-Y/');
            $destinationPath = 'images/uploads/catalog/'.$date_create; // upload path
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

        $item_sub_category = ItemSubCategory::find($id);
        
        $item_sub_category->update($input);  
        //##########Set Event for ActivityLog############
        $this->ActivityLog('update');
        return redirect()->back()->with('message','Save Successfully');
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
      $item_sub_category = ItemSubCategory::find($id);
      $item_sub_category->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
