<?php

namespace App\Http\Controllers\FrontOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Models\FrontOffice\Table;
use App\Models\FrontOffice\Outlet;
use Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;

class OutletController extends Controller
{
    public function index(){
        $Outlets = Outlet::Where('is_deleted', 0)->orderBy('id', 'asc')->get();
        $data = array();
        foreach($Outlets as $row){
            $outletId = $row->id;
            $tables = Table::where('pos_outlets_id', $outletId)->get();
            $data[] = array(
                'id' => $row->id,
                'name' => $row->name,
                'description' => $row->description,
                'tooltype' => $row->tooltype,
                'is_deleted' => $row->is_deleted,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
                'tables' => $tables
            );
        }   
        return response()->json(
        [
            'success'=> true,
            'message'=> 'Success',
            'data'=> $data,
            'total'=>count($Outlets)
        ], 200);
    }
}
