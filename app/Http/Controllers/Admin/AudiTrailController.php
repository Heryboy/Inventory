<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Input;

class AudiTrailController extends Controller
{	public $view_title = "Audit Trail";
   	public $view_action= "&nbsp;";
    
    public function __construct()
    {
        $menu_code = 'y5_m09';
      Session::flash('menu_code',$menu_code);
    }
    public function index()
    {  
    $audiTrail = DB::table('activity_log as al')
                    ->Join('user as u','u.id','=','al.user_id')
                    ->Select('al.*','u.username as username')
                    ->OrderBy('al.id','DESC')
										->get();
    // dd($aircraft);
     return view('admin.audi_trail.index')
      		->with('view_title',$this->view_title)
      		->with('audiTrail',$audiTrail)
           	->with('view_action',$this->view_action);
  }
}
