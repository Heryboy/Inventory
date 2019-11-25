<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\MaintenanceRequest;
use App\Http\Requests;
use App\Models\Admin\Maintenance;
use App\Models\Admin\Aircraft;
use App\Models\Admin\FlightLocationModel;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Auth;
use Session;
use DateTime;
use DateInterval;
use DatePeriod;
use Illuminate\Support\Facades\Input;

class MaintenanceController extends Controller
{
    public $view_title = "Maintenance";

    public function __construct()
    {
      
    }

    public function index()
    { 
      $Maintenance = Maintenance::all();
      return view('admin.setup_mgr.maintenance.index')
          ->with('view_title',$this->view_title)
          ->with('Maintenances',$Maintenance);
    }
    public function create(){
      $FlightLocation = FlightLocationModel::lists('name','id');
      $Aircraft = Aircraft::lists('name','id');
      return view('admin.setup_mgr.maintenance.form')
            ->with('action', 'edit')
            ->with('FlightLocation',$FlightLocation)
            ->with('view_title','Setup a Maintenance')
            ->with('Aircraft',$Aircraft);
    }
    public function store(MaintenanceRequest $request)
    {
      $this->ActivityLog('create');
      $input = $request->all();
      // $this->ActivityLog('create');
      // $Maintenance = Maintenance::create($input);
      // $input = Request::all();
      // $LastId = Maintenance::create($input)->id;

      $Maintenance= Maintenance::create([
        'reason'=>$input['reason'],
        'aircraft_id'=>$input['aircraft_id'],
        'station_id'=>$input['station_id'],
        'start_date' => $input['start_date'],
        'end_date' => $input['end_date'],
        'start_time' =>  substr($input['start_time'],0,2).":".substr($input['start_time'],2),
        'end_time' =>  substr($input['end_time'],0,2).":".substr($input['end_time'],2),
        'modified_by'=>Auth::user()->id,
        'created_by'=>Auth::user()->id,
        'created_date' => $this->DateNow(),
        'modified_date'=>$this->DateNow(),
      ]);

      $LastId = $Maintenance->id;

      $effective_from_date = $input['start_date'];
      $effective_to_date = $input['end_date'];
      // insert to flight schedule mgr
      $begin = new DateTime($effective_from_date);
      $end = new DateTime($effective_to_date);
      //add 1 day to the end for not miss being day
        date_add($end, date_interval_create_from_date_string('1 days'));
        //end
      $interval = DateInterval::createFromDateString('1 day');
      $period = new DatePeriod($begin, $interval, $end);

      $startTimeStamp = strtotime($effective_from_date);
      $endTimeStamp = strtotime($effective_to_date);
      // dd($startTimeStamp);
      $timeDiff = abs($endTimeStamp - $startTimeStamp);
      $numberDays = $timeDiff/86400;  // 86400 seconds in one day
      // and you might want to convert to integer
      $numberDays = intval($numberDays);

      $i=0;
      for ($i=0;$i<count($numberDays);$i++){
        foreach ($period as $dt){
          DB::table('maintenance_description')->insert(
            [
              'maintenance_id' => intval($LastId),
              'maintenance_date'=> $dt->format("Y-m-d"),
            ]
          );
        }
      }

      return redirect("admin/setup_mgr/maintenance")->with('message','Save Successfully');
    }
    public function show($id){
        $Maintenance = Maintenance::find($id);
        $FlightLocation = FlightLocationModel::lists('name','id');
        $Aircraft = Aircraft::lists('name','id');
        return view('admin/setup_mgr/maintenance/Form')
              ->with('view_title',$this->view_title)
              ->with('FlightLocation',$FlightLocation)
              ->with('Maintenance',$Maintenance)
              ->with('action', 'show')
              ->with('Aircraft',$Aircraft);
    }

    public function edit($id){
        $Maintenance = Maintenance::find($id);
        $FlightLocation = FlightLocationModel::lists('name','id');
        $Aircraft = Aircraft::lists('name','id');
        return view('admin/setup_mgr/maintenance/Form')
              ->with('view_title',$this->view_title)
              ->with('FlightLocation',$FlightLocation)
              ->with('Maintenance',$Maintenance)
              ->with('action', 'edit')
              ->with('Aircraft',$Aircraft);
    }

    public function update(MaintenanceRequest $request,$id){

      // $this->ActivityLog('update');
      // $input = $request->all();
        // $Maintenance = Maintenance::find($id);

        // $Maintenance->update(array(
        //   'start_date' =>  $input['start_date'],
        //   'start_time' =>  substr($input['start_time'],0,2).":".substr($input['start_time'],2),
        //   'end_date' =>  $input['end_date'],
        //   'end_time' =>  substr($input['end_time'],0,2).":".substr($input['end_time'],2),
        // ));

      $this->ActivityLog('update');
      $input = $request->all();
      // $this->ActivityLog('create');
      // $Maintenance = Maintenance::create($input);
      // $input = Request::all();
      // $LastId = Maintenance::create($input)->id;

      $Maintenance= Maintenance::where('id',$id)->update([
        'reason'=>$input['reason'],
        'aircraft_id'=>$input['aircraft_id'],
        'station_id'=>$input['station_id'],
        'start_date' => $input['start_date'],
        'end_date' => $input['end_date'],
        'start_time' =>  substr($input['start_time'],0,2).":".substr($input['start_time'],2),
        'end_time' =>  substr($input['end_time'],0,2).":".substr($input['end_time'],2),
        'modified_by'=>Auth::user()->id,
        'created_by'=>Auth::user()->id,
        'created_date' => $this->DateNow(),
        'modified_date'=>$this->DateNow(),
      ]);

      // $LastId = $Maintenance->id;

      $effective_from_date = $input['start_date'];
      $effective_to_date = $input['end_date'];
      // insert to flight schedule mgr
      $begin = new DateTime($effective_from_date);
      $end = new DateTime($effective_to_date);
      //add 1 day to the end for not miss being day
        date_add($end, date_interval_create_from_date_string('1 days'));
        //end
      $interval = DateInterval::createFromDateString('1 day');
      $period = new DatePeriod($begin, $interval, $end);

      $startTimeStamp = strtotime($effective_from_date);
      $endTimeStamp = strtotime($effective_to_date);
      // dd($startTimeStamp);
      $timeDiff = abs($endTimeStamp - $startTimeStamp);
      $numberDays = $timeDiff/86400;  // 86400 seconds in one day
      // and you might want to convert to integer
      $numberDays = intval($numberDays);

      // delete_m
      $delete_m = DB::table('maintenance_description')
                     ->where('maintenance_id',$id)
                     ->delete();

      if($delete_m){
        $i=0;
        for ($i=0;$i<count($numberDays);$i++){
          foreach ($period as $dt) {
            DB::table('maintenance_description')->insert(
              [
                'maintenance_id' => intval($id),
                'maintenance_date'=> $dt->format("Y-m-d"),
              ]
            );
          }
        }
      }

      // $Maintenance->update($input);
      return redirect("admin/setup_mgr/maintenance")->with('message','Update Successfully');
    }

    public function destroy($id){
      $this->ActivityLog('delete');
      Maintenance::find($id)->delete();
      $query_del = DB::table('maintenance_description')->where('maintenance_id',$id)->delete();
      return redirect("admin/setup_mgr/maintenance")->with('message','Deleted Successfully');
      // return redirect()->back("")->with('message','Deleted successfully');
    }

}
