<?php

namespace App\Http\Controllers\FrontOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use App\Models\FrontOffice\Reservation;
use App\Models\FrontOffice\Table;
use Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;

class ReservationController extends Controller
{
    public function index(){
        $Reservation = DB::table('table_reservations as tr')
                       ->select('tr.*', 't.name as table', 'u.username as reservation_name')
                       ->join('pos_tables as t', 't.id', '=' ,'tr.table_id')
                       ->join('user as u', 'u.id', '=', 'tr.reservation_by')
                       ->orderBy('tr.id', 'desc')
                       ->get();
        
        // Reservation::all();
        return response()->json(
        [
            'success'=> true,
            'message'=> 'Success',
            'data'=> $Reservation,
            'total'=>count($Reservation)
        ], 200);
    }

    public function store(Request $request){
        $data = $request->all();        
        Reservation::create([
            'table_id' => $data['table_id'],
            'contact_name' => $data['contact_name'],
            'reservation_date' => $data['reservation_date'],
            'contact_number' => $data['contact_number'],
            'reservation_by' => $data['reservation_by'],
            'note' => $data['note'],
            'status_id' => $data['status_id'],
            'created_at' => date('Y-m-d H:i:s')
        ]);
        Table::where('id', $data['table_id'])->update([
            'status' => 2
        ]);
        return response()->json(
            [
                'success'=> true,
                'message'=> 'Reservation has been created.'
            ], 200);
    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){
        $input = $request->all();
        
        $input['updated_at'] = date("Y-m-d H:i:s");
        $input['status_id'] = 6;
        Table::where('id', $input['table_id'])->update([
            'status' => 1
        ]);
        Reservation::where('id', $id)->update($input);
        return response()->json(
            [
                'success'=> true,
                'message'=> 'Reservation has been updated.'
            ], 200);
    }

    public function destroy($id){
        $tableId = $_REQUEST['table_id'];
        Reservation::where('id', $id)->delete();
        Table::where('id', $tableId)->update(['status' => 1]);
        return response()->json(
            [
                'success'=> true,
                'message'=> 'Data bas heen deleted.'
            ], 200);
    }
}
