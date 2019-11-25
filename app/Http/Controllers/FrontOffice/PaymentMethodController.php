<?php

namespace App\Http\Controllers\FrontOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Models\FrontOffice\PaymentMethod;
use Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;

class PaymentMethodController extends Controller
{
    public function index(){
        $PaymentMethods = PaymentMethod::all();
        return response()->json(
        [
            'success'=> true,
            'message'=> 'Success',
            'data'=> $PaymentMethods,
            'total'=>count($PaymentMethods)
        ], 200);
    }
}