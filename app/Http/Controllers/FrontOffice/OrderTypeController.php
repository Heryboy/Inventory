<?php

namespace App\Http\Controllers\FrontOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Models\FrontOffice\OrderType;
use Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;

class OrderTypeController extends Controller
{
    public function index(){
        $OrderType = OrderType::all();
        return response()->json(
        [
            'success'=> true,
            'message'=> 'Success',
            'data'=> $OrderType,
            'total'=>count($OrderType)
        ], 200);
    }
}
