<?php namespace App\Http\Controllers\Admin\report;

// use Illuminate\Http\Request;
use App\Http\Requests\setup_mgr\BranchRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\setup_mgr\branch;
use App\Models\Admin\setup_mgr\BranchGroup;
use App\Models\Admin\setup_mgr\Company;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Auth;
use Session;

class RevenueReportController extends Controller
{

    public $view_title = "report/revenue_report.entry_title";
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
      // $branches = Branch::all();
      return view('admin.report.index');
                // ->with('branches',$branches);
    }

}
