<?php namespace App\Http\Controllers\Admin\setup_mgr\company;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\CompanyRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\Company;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class CompanyController extends Controller
{

    public $view_title = "setup_mgr/company.entry_title";
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
      $companies = Company::all();
      return view('admin.setup_mgr.company.index')
              ->with('companies',$companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.setup_mgr.company.form')
                ->with('action',$this->action)
                ->with('view_title',$this->view_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CompanyRequest $request)
    {
      $input = $request->all();

      if(isset($input['is_active'])&&($input['is_active']=='on')) $input['is_active'] = 1;
      else $input['is_active'] = 0;
      
      $input['created_by'] = Auth::user()->id;
      Company::create($input);
      
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
      return redirect("admin/setup_mgr/company")->with('message','Save Successfully');
    }

    public function show($id)
    {
                      
      $company = Company::findOrFail($id);
      return view('admin.setup_mgr.company.form')->with('company',$company)
                                          ->with('view_title',$this->view_title)
                                          ->with('action',"Show");
    }

    public function edit($id)
    {
      $company = Company::findOrFail($id);
      return view('admin.setup_mgr.company.form')->with('company',$company)
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
    public function update(CompanyRequest $request, $id)
    {
        $input = $request->all();
        
        if (Input::file('image')!="") {
          if(Input::file('image')->isValid()){
            $image = $input['image'];
            $date_create = date('d-M-Y/');
            $destinationPath = 'images/uploads/company/'.$date_create; // upload path
            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            //$fileName = rand(11111,99999).'.'.$extension; // renameing image
            $fileName = $image->getClientOriginalName();
            Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
            $fileImage = $date_create.$fileName;
            $input['image']=$fileImage;
          }
        }else{
          $input['image']=$input['image_hidden'];
        }

        $company = Company::find($id);
        
        $company->update($input);  
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
      $company = Company::find($id);
      $company->update([
        'is_delete' => 1,
      ]); 
      return redirect()->back()->with('message','Deleted Successfully');
    }
}
