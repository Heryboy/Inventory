<?php

namespace App\Http\Controllers\FrontOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Models\FrontOffice\Membership;
use App\Models\FrontOffice\Table;
use Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;

class MembershipController extends Controller
{
    public function index(){
        $Membership = Membership::orderBy('id', 'desc')->get();
        return response()->json(
        [
            'success'=> true,
            'message'=> 'Success',
            'data'=> $Membership,
            'total'=>count($Membership)
        ], 200);
    }

    public function getMembershipCode(Request $request){
        $data = $request->all();
        $checkHasMember = DB::table("pos_membership as pm")
                          ->select("pmc.*")
                          ->Join("pos_membership_card as pmc", "pmc.id", "=", "pm.member_card_id")
                          ->where('pmc.code_no', $data['member_code'])
                          ->first();
        if($checkHasMember){
            return response()->json(
                [
                    'success'=> true,
                    'data' => $checkHasMember,
                    'message'=> 'Membership code is found.'
                ], 200);
        }else{
            return response()->json(
                [
                    'success'=> false,
                    'message'=> 'Membership code is not found!'
                ], 200);
        }
    }

    public function store(Request $request){
        $data = $request->all();
        $checkHasMember = Membership::where('member_code', $data['member_code'])->first();
        if($checkHasMember){
            return response()->json(
                [
                    'success'=> false,
                    'message'=> 'Membership is already exist!'
                ], 200);
        }else{
            Membership::create($data);
            return response()->json(
                [
                    'success'=> true,
                    'message'=> 'Membership has been created.'
                ], 200);
        }
    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){
        $input = $request->all();
        $input['updated_at'] = date("Y-m-d H:i:s");
        Membership::where('id', $id)->update($input);
        return response()->json(
            [
                'success'=> true,
                'message'=> 'Membership has been updated.'
            ], 200);
    }

    public function destroy($id){
        Membership::where('id', $id)->delete();
        return response()->json(
            [
                'success'=> true,
                'message'=> 'Membership bas heen deleted.'
            ], 200);
    }
}
