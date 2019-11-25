<?php

namespace App\Http\Controllers\FrontOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Models\FrontOffice\Table;
use Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;

class POSTableController extends Controller
{
    public function index(Request $request){
        $outlet = '';
        $where_clause = '';
        

        // $where_clause = DB::table("pos_tables as pt")
        //                 ->select('pt.*',  DB::select(DB::raw("SELECT TOP check_in_date FROM ".env('DB_PREFIX')."pos_cus_orders as pco WHERE pco.table_id = pt.id AND pco.status_id = 10")))
        //                 ->where('pt.is_deleted', 0)
        //                 ->where('pt.is_table', 1);

        if(isset($request->outlet)){
            $outlet = $request->outlet;
            // $where_clause->where('pt.pos_outlets_id', $outlet);
            $where_clause .="AND pt.pos_outlets_id = ".$outlet."";
        }

        $sql = DB::select(DB::raw("
            SELECT pt.*,
            (SELECT check_in_date FROM  ".env('DB_PREFIX')."pos_cus_orders as pco WHERE pco.table_id = pt.id AND pco.status_id = 10 ORDER BY pco.id ASC LIMIT 1) as check_in_date
            FROM ".env('DB_PREFIX')."pos_tables as pt 
            WHERE pt.is_deleted = 0 AND pt.is_table = 1
            ".$where_clause."
        "));

        // $sql = collect($where_clause->get());
        return response()->json(
        [
            'success'=> true,
            'message'=> 'Success',
            'data'=> $sql,
            'total'=>count($sql)
        ], 200);
    }

}
