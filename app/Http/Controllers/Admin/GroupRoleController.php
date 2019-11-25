<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\GroupRole;
use App\Models\Admin\GroupRoleDetail;
use App\Models\Admin\GroupRoleFlight;
use App\Models\Admin\UserGroup;
use App\Http\Requests\Admin\GroupRoleRequest;
use Illuminate\Http\Request;

use DB;
use Validator;
use Auth;
use Session;
use Redirect;
use Input;

class GroupRoleController extends Controller {
	
	public $view_title = "users/group_role.group_role";
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
    {
        $menu_code = 's03';
		\Session::flash('permissionOn_Menu_ID',$menu_code);
    }
    
    //Group Roles
	public function index()
	{
		$UserGroup = UserGroup::lists('name','id');
		$GroupRoles = GroupRole::all();
		return view('admin.group_role.index')
					->with('view_title',$this->view_title)
		            ->with('GroupRoles',$GroupRoles)
		            ->with('UserGroup',$UserGroup);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$UserGroup = UserGroup::lists('name','id');
		return view('admin.group_role.form')
		                ->with('UserGroup',$UserGroup)
					    ->with('view_title',$this->view_title);	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(GroupRoleRequest $request)
	{	
		$this->ActivityLog('create');
		$input = $request->all(); 
		GroupRole::create($input);
		 //##########Set Event for ActivityLog############
        $this->ActivityLog('create');
		return redirect("admin/users_group_role")->with('message','Group Role => ('.$input['name'].') has been saved.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	

		$language_id = Session::get('applangId');
        if(!$language_id) $language_id = CONFIG_LANGUAGE;
        $group_id = $id;
        $permissionOnMenu = $this->permissionOnMenu($group_id,$language_id);
        //dd($permissionOnMenu);
		$GroupRole = GroupRole::find($id);
		
		$this->ActivityLog('view');
		return view('admin.group_role.permission_form')
					->with('permissionOnMenu',$permissionOnMenu)
					->with('group_role_id',$id)
		            ->with('GroupRole',$GroupRole);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function edit($id)
	{

		$UserGroup = UserGroup::lists('name','id');
		$GroupRole = GroupRole::find($id);
	
		return view('admin.group_role.form')->with('UserGroup',$UserGroup)
									  ->with('GroupRole',$GroupRole)
									  ->with('view_title',$this->view_title)
									  ->with('action',"Edition");
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$input = $request->all();
    $GroupRole = GroupRole::find($id);
    $GroupRole->update($input);
    //##########Set Event for ActivityLog############
    $this->ActivityLog('update');
    return redirect("admin/users_group_role")->with('message','Group Role => ('.$input['name'].') has been modified.');
	}
	
	public function updateGroupRolePermission(Request $request){
		if(!$request->has('chk_read')){
			$request->offsetSet('chk_read',"0");
		}

		$data = $request->all();
		
		 //##########Set Event for ActivityLog############
	    $this->ActivityLog('update permission');
			// if(!$request->has('chk_read')){
			// 	$request->offsetSet('chk_read', "0");
			// }
	    $id = $data['group_role_id'];

	    $del_record = DB::table('group_role_detail')->where('group_role_id', '=', $id)->delete();
	    if($del_record>=0){
				// if (isset($data['menu_code']) && is_array($data['menu_code'])){
		      //$j=1;
	    	foreach ($data['menu_code'] as $key=>$value){
					$write_arr='';
					//Write
					if(!empty($data['chk_write'])){
						for($i=0;$i<count($data['chk_write']);$i++){
							if($data['menu_code'][$key]==$data['chk_write'][$i]){
								$write_arr =1;
								break;
								// echo $data['menu_code'][$key]."---Match---".$read_arr."<br/>";
							}else{
								$write_arr =0;
								// echo $data['menu_code'][$key]."---Not Match---0".$read_arr."<br/>";
							}
						}
					}else{
						$write_arr =0;
					}

					//Read
					for($i=0;$i<count($data['chk_read']);$i++){
						if($data['menu_code'][$key]==$data['chk_read'][$i]){
							$read_arr =1;
							break;
							// echo $data['menu_code'][$key]."---Match---".$read_arr."<br/>";
						}else{
							$read_arr =0;
							// echo $data['menu_code'][$key]."---Not Match---0".$read_arr."<br/>";
						}
					}

					DB::table('group_role_detail')->insert(
					  [
							'group_role_id' => intval($id), 
					  	'menu_code' => $data['menu_code'][$key],
					  	'menu_id' => $data['menu_id'][$key],
					  	'parent_menu_id' => $data['parent_menu_id'][$key],
					  	'read' => intval($read_arr),
					  	'write' => intval($write_arr)
					  ]
					);
				}
				return redirect("admin/users_group_role")->with('message','Permission Groups Role has been modified.');				
				// }
	    }else{
	      return redirect("admin/users_group_role");
	    }
	}
	
	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return Response
	*/

	public function destroy($id)
	{
		//##########Set Event for ActivityLog############
        $this->ActivityLog('delete');
		//
		$data=GroupRole::find($id)->delete();
		// return redirect()->back()->with('message','Deleted successfully');
		return redirect("admin/users_group_role")->with('message','Group Role has been deleted.');
	}

	public function pax_movement_permission($data,$group_role_id){
		$i=0;
		// dd($data);
		foreach ($data['pax_movement_id'] as $pax) {
			$pax_movement_id = $pax[$i];
			// dd($pax_movement_id);
			$write_arr='';
					//Write
					if(!empty($data['pax_chk_write'])){
						for($j=0;$j<count($data['pax_chk_write']);$j++){
							if($data['chk_write'][$pax]==$data['chk_write'][$j]){
								$write_arr =1;
								break;
								//echo $data['menu_code'][$key]."---Match---".$read_arr."<br/>";
							}else{
								$write_arr =0;
								//echo $data['menu_code'][$key]."---Not Match---0".$read_arr."<br/>";
							}
						}
					}else{
						$write_arr =0;
					}

					//Read
					if(!empty($data['pax_chk_read'])){
						for($k=0;$k<count($data['pax_chk_read']);$k++){
							if($data['chk_write'][$pax]==$data['chk_write'][$k]){
								$read_arr =1;
								break;
								//echo $data['menu_code'][$key]."---Match---".$read_arr."<br/>";
							}else{
								$read_arr =0;
								//echo $data['menu_code'][$key]."---Not Match---0".$read_arr."<br/>";
							}
						}
					}else{
						$write_arr =0;
					}

		DB::table('group_role_flight')->insert(
					    [
						'group_role_id' => intval($group_role_id), 
					  	'pax_movement_id' => $pax_movement_id
					  	//'read' =>$read_arr,
					  	//'write' =>$write_arr
					    ]
					);

		}


		$i++;

	}

}