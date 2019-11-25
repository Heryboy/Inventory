<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\PositionModel;
use App\Models\Admin\CrewModel;
use App\Models\Admin;
// use App\user;
use DB;
use Validator;
use Auth;
use Session;
use DateTime;
use Illuminate\Support\Facades\Input;

class ErrorpageController extends Controller
{   
  
  public $view_title = "Error Page";

  public function __construct()
  {
    //echo $user_role = Auth::user()->role_id;
    //$this->middleware('auth');
    //$this->middleware('guest');
  }

  public function index()
  { 
    return view('admin.common.404Error')
            ->with('view_title',$this->view_title);
  }

  
}   
