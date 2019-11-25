<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FrontOffice\Drawer;
use Auth;
use DB;
use App\User;

class LoginPinCodeController extends Controller
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

    public function login(Request $request){
        $boolen = true;
        $message = '';
        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
            $sec_user = Auth::user();
            $data['general'] = $sec_user;
            $token = $sec_user->id;
            $drawer = Drawer::where('user_id', $sec_user->id)
                      ->first();
            $data['drawer'] = $drawer;
            // if($drawer){
            return response()->json(
            [
                'success'=> $boolen,
                'data'=>$data,
                'token'=>$token,
                'message'=> $message
            ], 200);
            // }else{
            //     return response()->json(['success'=>false, 'message'=>'You have login failed, you do not have drawer!'], 200);
            // }
            
        }else{
            return response()->json(['success'=>false,'message'=>'You have login failed.'], 200);
        }
    }

    public function loginPinCode(Request $request){
        $boolen = false;
        $data = $request->all();
        // dd($data['pincode']);
        $passcode = '';
        for($i = 0; $i < count($data['pincode']); $i++){
            $passcode .= $data['pincode'][$i];
        }
        // $data = Auth::user();
        $user = User::select('id', 'username')->where('pos_pin', $passcode)->first();
        $dataDrawer = '';
        $dataArray = null;
        if($user){
        // if($data['pos_pin'] == $request['pincode']){
            $drawer = Drawer::where('user_id', $user->id)
                            ->first();
            
            if($drawer){
                $dataArray = array(
                    'drawer_id' => $drawer->id,
                    'cash_drawer_group_id' => $drawer->cash_drawer_group_id,
                    'workshift_id' => $drawer->workshift_id,
                    'workshift' => $drawer->Workshift->workshift_name,
                    'start_time' => $drawer->Workshift->start_time,
                    'end_time' => $drawer->Workshift->end_time,
                    'amount_usd' => $drawer->amount_usd,
                    'amount_khr' => $drawer->amount_khr,
                    'is_active' => $drawer->is_active,
                    'is_deleted' => $drawer->is_deleted,
                );
            }
            $dataDrawer = array(
                'id'=>$user->id,
                'username'=>$user->username,
                'drawer'=>$dataArray
            );
            $boolen = true;
            $message = 'Pincode is correct.';
        }else{
            $boolen = false;
            $message = 'Pincode is incorrect.';
        }
        
        return response()->json(
        [
            'success'=> $boolen,
            'data'=>$dataDrawer,
            'message'=> $message
        ], 200);
    
    }

}
