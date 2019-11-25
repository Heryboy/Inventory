<?php namespace App\Http\Controllers\Admin\discount;
// use Illuminate\Http\Request;
use App\Http\Requests\discount\DiscountMethodsRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\discount\DiscountMethods;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class DiscountMethodController extends Controller
{

    public $view_title = "discount/discount_item.entry_title";
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
      $discount_methods  = DiscountMethods::all();
      return view('admin.discount.discount_methods.index')
                      ->with('discount_methods',$discount_methods);
    }

    public function show($id)
    {
      $discount_methods = DiscountMethods::findOrFail($id);
      return view('admin.discount.discount_methods.form')
                                          ->with('discount_methods',$discount_methods)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $discount_methods = DiscountMethods::findOrFail($id);
      return view('admin.discount.discount_methods.form')
                                          ->with('discount_methods',$discount_methods)
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
    public function update(DiscountMethodsRequest $request, $id)
    {
        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        $discount_methods = DiscountMethods::find($id);
        
        $discount_methods->update($input);  
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
      // $discount_methods = DiscountMethods::find($id);
      // $discount_methods->update([
      //   'is_delete' => 1,
      // ]); 
      return redirect()->back()->with('message','Discount Methods cannot be deleted!');
    }
}
