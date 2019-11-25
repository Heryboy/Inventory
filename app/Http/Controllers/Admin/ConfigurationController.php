<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
// use App\user;
use DB;
use Validator;
use Auth;
use Session;

class ConfigurationController extends Controller
{   
  
  public function __construct()
  {
    //echo $user_role = Auth::user()->role_id;
    //$this->middleware('auth');
    //$this->middleware('guest');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
  */

  // index
  public function index()
  {  
    // return view('admin.configuration.index')
    //         ->with('view_title',$this->view_title)
    //         ->with('view_action',$this->view_action);
  }
  // configuration
  public function configuration(){
    return view('admin.configuration.configuration')
            ->with('view_title',$this->view_title);
  }
  // config_group
  public function config_group(){
    return view('admin.configuration.config_group')
            ->with('view_title', $this->view_title);
  }

  // Language
  public function language(){
    return view('admin.configuration.language')
            ->with('view_title', $this->view_title);
  }

}   
