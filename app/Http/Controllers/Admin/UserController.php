<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\UserModel;
use App\Models\Admin\UserGroup;
use Illuminate\Support\Facades\Input;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;

use DB;
use App\user;
use Carbon\Carbon;
use Auth;
use Session;
use Validator;
use rules;
use Redirect;
use View;

class UserController extends Controller
{
	
	public $view_title = "users/users.users_listing";
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

      $UserGroup = UserGroup::lists('name','id');
      //$users = UserModel::all();
      $users = DB::table('user')
                ->where('id','>',1)
                ->get();
      //dd($users);
      return view('admin.user.index')
                ->with('view_title',$this->view_title)
                ->with('users',$users)
                ->with('UserGroup',$UserGroup);
    }

  
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create()
    {
      $user_groups=UserGroup::lists('name','id');
        $users = UserModel::all();
      return view('admin.user.create',compact('user_groups',$user_groups))
                    ->with('action','edit')
                    ->with('users',$users)
    						    ->with('view_title',$this->view_title);
    }

    //User Add
    public function add()
    {
      return view('admin.user.user_form');
    }

    //User Permission
    public function user_permission()
    {
      return view('admin.user.userPermission_list'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(UserRequest $request)
    { 
      $input = $request->all();
      $fileImage = "";
      if (Input::file('image')!="") {
          if(Input::file('image')->isValid()){
            $image = $input['image'];
            $date_create = date('d-M-Y/');
            $destinationPath = 'images/uploads/user/'.$date_create; // upload path
            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            //$fileName = rand(11111,99999).'.'.$extension; // renameing image
            $fileName = $image->getClientOriginalName();
            Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

            $fileImage = $date_create.$fileName;
          }else{
            // sending back with error message.
            Session::flash('error', 'uploaded file is not valid');
            //return Redirect::to('upload');
            return redirect("admin/user_mgr/user")
                              ->with('message','Error while uploading!');
          }                         
      }
      //##########Set Event for ActivityLog############
      $this->ActivityLog('create');
  
      UserModel::create([
              'username' => Input::get('username'),
              'email' => Input::get('email'),
              'password' => bcrypt(Input::get('password')),
              'photo' => $fileImage,
              'group_id' => Input::get('group_id')
              //'emp_id' => Input::get('emp_id')
      ]);
  
     return redirect("admin/users")->with('message','Save Successfully');
      //}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $group_user = UserGroup::lists('name','id');
      $user = UserModel::find($id);
      $user->password = '';
      return view('admin.user.edit')->with('user_groups',$group_user)
                        ->with('user',$user)
                        ->with('view_title',$this->view_title)
                        ->with('action',"show");
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $group_user = UserGroup::lists('name','id');
      $user = UserModel::find($id);
      $user->password = '';
      return view('admin.user.edit')->with('user_groups',$group_user)
  			        ->with('user',$user)
  			        ->with('view_title',$this->view_title)
  			        ->with('action',"edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        // dd($input);
        // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required'); 
        $picname = Input::file('image');
        
        // checking file is valid.
        if($picname==''){
          if(empty($input['photo_hidden'])) $input['photo'] = null;
          else $input['photo'] = $input['photo_hidden'];
        }else{
          $image = $input['image'];
          $date_create = date('d-M-Y/');
          $destinationPath = 'images/uploads/user/'.$date_create; // upload path
          $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
          //$fileName = rand(11111,99999).'.'.$extension; // renameing image
          $fileName = $image->getClientOriginalName();
          Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
          
          //##########Set Event for ActivityLog############
          $this->ActivityLog('Updated');
          $input['photo']= $date_create.$fileName;
        }
        
        $project = UserModel::find($id);
        
        $old_pwd = $project->password;
        
        $rules = array(
            'username' => 'required',
            'password' => 'confirmed|min:6',
            // 'email' => 'email|max:255|unique:user',
            'email' => 'email|max:255',
            'group_id' => 'required');
        
        $messages = [
            'username.required' => 'Provide name!',
            'email.email' => 'Email is invalid!',
            'password.confirmed' => 'Password not match!',
            'group_id.required' => 'Choose group role!',
        ];
       $validator = Validator::make($input, $rules,$messages);
        if ($validator->fails())
        {
          return redirect()->back()->withErrors($validator->errors());
        }else{

            if($input['password'] == ''){
              $input['password'] = $old_pwd;
            }else{
              $input['password'] = bcrypt($input['password']);
            }

            $project->update($input);
            // dd('updated');
            //##########Set Event for ActivityLog############

            $this->ActivityLog('update');
            // return redirect()->back()->with('message','Update Successfully');
            
        }
        return redirect("admin/users")->with('message','Update Successfully');
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
        //
        $data=UserModel::find($id)->delete();
        return redirect("admin/users")->with('message','Deleted Successfully');
        // return redirect()->back()->with('message','Deleted successfully');
    }

}
