<?php namespace App\Http\Controllers\Admin\setup_mgr\item_category;

use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\ItemCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\ItemCategory;
use App\Models\Admin\setup_mgr\Branch;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class ItemCategoryController extends Controller
{

    public $view_title = "setup_mgr/item_category.entry_title";
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
      $branch = Branch::lists('branch_name','id');
      $item_categories = ItemCategory::Where('is_delete',0)->get();
      return view('admin.setup_mgr.item_category.index')
                ->with('item_categories',$item_categories)
                ->with('branch',$branch);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $branch = Branch::lists('branch_name','id');
      return view('admin.setup_mgr.item_category.form')
                ->with('branch',$branch)
                ->with('action',$this->action)
                ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ItemCategoryRequest $request)
    {
      $input = $request->all();

      if(isset($input['is_delete'])&&($input['is_delete']=='on')) $input['is_delete'] = 1;
      else $input['is_delete'] = 0;
      
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

      // dd($input);
      ItemCategory::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      // return redirect("admin/setup_mgr/item_category")->with('message','Save Successfully');
      return redirect()->back()->with('message','Save Successfully');
    }

    public function show($id)
    {
                      
      $item_category = ItemCategory::findOrFail($id);
      $branch = Branch::lists('branch_name','id');
      return view('admin.setup_mgr.item_category.form')->with('item_category',$item_category)
                                          ->with('branch',$branch)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }


    public function edit($id)
    {
      $item_category = ItemCategory::findOrFail($id);
      $branch = Branch::lists('branch_name','id');
      return view('admin.setup_mgr.item_category.form')->with('item_category',$item_category)
                                          ->with('branch',$branch)
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
    public function update(ItemCategoryRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        if(isset($input['is_delete'])&&($input['is_delete']=='on')) $input['is_delete'] = 1;
        else $input['is_delete'] = 0;
          
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
        $item_category = ItemCategory::find($id);
        
        $item_category->update($input);  
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
      $item_category = ItemCategory::find($id);
      $item_category->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }


    public function saveItemCategory(Request $request){
      $boolen = 1;
      $input = $request->all();
      $sql = ItemCategory::create($input);
      if($sql){
        $boolen=1;
      }else{
        $boolen=0;
      }
      return json_encode($boolen);
    }
}
