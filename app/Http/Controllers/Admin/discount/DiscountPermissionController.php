<?php namespace App\Http\Controllers\Admin\discount;
// use Illuminate\Http\Request;
use App\Http\Requests\discount\DiscountPermissionRequest;
use App\Models\Admin\UserModel;
use App\Http\Controllers\Controller;
use App\Models\Admin\discount\DiscountPermission;
use App\Models\Admin\discount\DiscountMethods;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class DiscountPermissionController extends Controller
{

    public $view_title = "discount/discount_permission.entry_title";
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
      $discount_permissions  = DiscountPermission::Where('is_delete',0)->get();
      return view('admin.discount.discount_permission.index')
                      ->with('discount_permissions',$discount_permissions);
    }

    public function create()
    {
      $Users = UserModel::lists('username','id');
      $DiscountMethods = DiscountMethods::lists('name','id');
      return view('admin.discount.discount_permission.form')
                                          ->with('Users',$Users)
                                          ->with('DiscountMethods',$DiscountMethods)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Create");
    }

    public function store(DiscountPermissionRequest $request)
    {
      $input = $request->all();
      
      DiscountPermission::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect()->back()->with('message','Save Successfully');
    }

    public function show($id)
    {
      $Users = UserModel::lists('username','id');
      $DiscountMethods = DiscountMethods::lists('name','id');
      $discount_permissions = DiscountPermission::findOrFail($id);
      return view('admin.discount.discount_permission.form')
                                          ->with('Users',$Users)
                                          ->with('DiscountMethods',$DiscountMethods)
                                          ->with('discount_permissions',$discount_permissions)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $Users = UserModel::lists('username','id');
      $DiscountMethods = DiscountMethods::lists('name','id');
      $discount_permissions = DiscountPermission::findOrFail($id);
      return view('admin.discount.discount_permission.form')
                                          ->with('Users',$Users)
                                          ->with('DiscountMethods',$DiscountMethods)
                                          ->with('discount_permissions',$discount_permissions)
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
    public function update(DiscountPermissionRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        $discount_permissions = DiscountPermission::find($id);
        
        $discount_permissions->update($input);  
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
      $this->ActivityLog('try to delete');
      $discount_permissions = DiscountPermission::find($id);
      $discount_permissions->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Discount permission is deleted!');
    }
}
