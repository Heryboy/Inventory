<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Request;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('auth/logout');
    }

    public function login(Request $request){
        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
            $user = Auth::user();
            $sec_user = Auth::user();
            $data['general_profile'] = $sec_user;
            // $account_master = AccountMaster::where('user_id',$user->id)->first();
            $token =  $user->createToken('Token Name')->accessToken;
            // $this->saveTokenDevice($user, $request);
            // $security_number = common::AccountMobileLog($account_master->merchant_id,$token);
            header("Access-Control-Allow-Origin: *");
            return response()->json(
                        [
                            'success'=>true,
                            'message'=>'Security key will be sent to you soon.',
                            'PID'=>'DLUyc4VN5gdK2M4Hf5ZlH7dmEoO2DcowALRhzTrf',
                            'token'=>$token,
                            'data' => $data
                        ]);
        }
        else{
            return response()->json(['success'=>false,'message'=>'You have login failed.'], 401);
        }
    }

    public function loginPinCode(Request $request){
        $user = Auth::user();
        
        // if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
        //     $user = Auth::user();
        //     $sec_user = Auth::user();
        //     $data['general_profile'] = $sec_user;
        //     // $account_master = AccountMaster::where('user_id',$user->id)->first();
        //     $token =  $user->createToken('Token Name')->accessToken;
        //     // $this->saveTokenDevice($user, $request);
        //     // $security_number = common::AccountMobileLog($account_master->merchant_id,$token);
        //     return response()->json(
        //                 [
        //                     'success'=>true,
        //                     'message'=>'Security key will be sent to you soon.',
        //                     'PID'=>'DLUyc4VN5gdK2M4Hf5ZlH7dmEoO2DcowALRhzTrf',
        //                     'token'=>$token,
        //                     'data' => $data
        //                 ], 200);
        // }
        // else{
        //     return response()->json(['success'=>false,'message'=>'You have login failed.'], 401);
        // }
    }

    public function logout(Request $request)
    {
        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
            $user = Auth::user();
            DB::table('oauth_access_tokens')->where('user_id',$user->id)->delete();
            return response()->json(
                [
                    'success'=>true,
                    'message'=>'Logout successfully.'
                ], 200);
        }else{
            return response()->json(['success'=>false,'message'=>'Failed to logout!']);
        }
    }
}
