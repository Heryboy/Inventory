<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserGroupRequest;
use App\Models\Admin\UserGroup;
use App\Models\Admin\UserModel;
use DB;
use Validator;
use Auth;
use Session;

class UserGroupController extends Controller {

	public $view_title = "usergroup/user_group.entry_title";
	public $action = "Edit";
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	 public function __construct()
    {
       
    }

	public function index()
	{	
		$user_groups = UserGroup::Where('is_delete',0)->get();
		return view('admin.user_groups.index')
					->with('view_title',$this->view_title)
					->with('user_groups',$user_groups);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	*/

	public function create()
	{
		return view('admin.user_groups.form')->with('action',$this->action)
														->with('view_title',$this->view_title);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserGroupRequest $request)
	{
		$input = $request->all();
		$input['created_by'] = Auth::user()->id;
		UserGroup::create($input);
		//##########Set Event for ActivityLog############
		// $eventName = 'create';
		// Session::flash('eventName',$eventName);
		$this->ActivityLog("create");
		return redirect("admin/user_groups")->with('message','Group => ('.$input['name'].') has been saved.');  
		 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$user_group = UserGroup::find($id);
		$create_by = Auth::user()->id;
		
		return view('admin.user_groups.form')->with('user_group',$user_group)
									  ->with('view_title',$this->view_title)
									  ->with('action',"show")
									  ->with('create_by',$create_by);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		
		$user_group = UserGroup::find($id);
		return view('admin.user_groups.form')->with('user_group',$user_group)
									  ->with('view_title',$this->view_title)
									  ->with('action',"Edit");

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UserGroupRequest $request,$id)
	{

		$input = $request->all();
		$input['updated_by'] = Auth::user()->id;
		$project = UserGroup::find($id);
		$project->update($input);
		//##########Set Event for ActivityLog############
		$this->ActivityLog("update");
		return redirect("admin/user_groups")->with('message','Group => ('.$input['name'].') has been modified.');

	}

	/*
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function destroy($id)
	{
		//##########Set Event for ActivityLog############
      $this->ActivityLog("delete");
		UserGroup::find($id)->delete();
		return redirect("admin/user_groups")->with('message','Delete Successfully.');
	}
}
