<?php

namespace App\Http\Controllers\FrontOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Models\FrontOffice\Customer;
use Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;

class CustomerController extends Controller
{
    public function index(){
        $Customers = Customer::OrderBy('id', 'ASC')->get();
        return response()->json(
        [
            'success'=> true,
            'message'=> 'Success',
            'data'=> $Customers,
            'total'=>count($Customers)
        ], 200);
    }

    public function store(Request $request){
        $data = $request->all();
        $Customers = Customer::create($data);
        return response()->json(
        [
            'success'=> true,
            'message'=> 'Customer has been created.',
            'data'=> $Customers
        ], 200);
    }
}
