<?php

  namespace App\Http\Controllers\Admin;

  use Illuminate\Http\Request;
  use DB;
  use App\Http\Requests;
  use App\Http\Controllers\Controller;
  use Illuminate\Support\Facades\Input;
  use Validator;
  use Helpers;
  use Auth;
  use Session;
  use Redirect;

  class NotificationController extends Controller
  {

    public function index(){
      $notifications = Helpers::notification();
      // print_r($notifications);
      $total_couunt = DB::table('notification_users as nu')
                      ->Join('notification as n','n.id','=','nu.notification_id')
                      ->where('user_id',Auth::user()->id)
                      ->where('is_read',0)->get();
      
      return view('admin/notifications/notification')
                  ->with('notifications',$notifications);
    }

    private function get_time($date_add){
       $str_date = '';
        $currently_date = date('Y-m-d H:i:s');
        $uploaded_date = $date_add;
        $diff = abs(strtotime($currently_date) - strtotime($uploaded_date)); 
        $years   = floor($diff / (365*60*60*24)); 
        $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
        $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));
        $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60)); 
        if($years == 0 && $months == 0 && $days == 0 && $hours == 0 && $minutes == 0) {
          $str_date .= $seconds." seconds ago.";
        }elseif($years == 0 && $months == 0 && $days == 0 && $hours == 0) {
          $str_date .= $minutes." Minutes and ".$seconds." seconds ago.";
        }elseif($years == 0 && $months == 0 && $days == 0) {
          $str_date .= $hours." hours and ".$minutes." minutes ago.";
        }elseif($years == 0 && $months == 0) {
          $str_date .= $days." days and ".$hours." hours ago.";
        }elseif($years == 0) {
          $str_date .= $months." months and ".$days." days ago.";
        }else{
          $str_date .= $years." years and ".$months." months ago.";
        }
        return $str_date;
    }

    public function show($id){
      // $notification = DB::table('notification')->find($id);
      $user_id =Auth::user()->id;
      $notification_user = DB::table('notification_users')->where('notification_id',$id)
                                                          ->where('user_id',$user_id)
                                                          ->update(['is_read' => 1]);

      if($notification_user){
        echo"Test";
      }else{
        echo"no";
      }
      // return redirect("admin/notification")->with('message','Nofication has been read!');        
    }

    public function notificationList($id){

      // switch ($id) {
      //  case '1':
      //    // $notification_group = DB::table('notification_group')->where('parent_id',1)->get();
      //            $notification_flight = $this->cout_flight_notification($id);
      //            // dd($notification_flight);
      //            return view('admin/notifications/Flight')->with('notification_flight',$notification_flight);
      //            break;
      //  case '2':
      //    // $notification = DB::table('notification as n')->Join('notification_group as ng','ng.id','=','n.notification_group_id')
      //    //                        ->where('notification_group_id',$id)
      //    //                        ->Select('n.*','ng.notification_group as notification_group_name')
      //    //                        ->get();            
      //    // return view('admin/notifications/CrewLicense')->with('notification',$notification);
      //    $this->updateIsRead($id);
      //            break;
      //  case '3':
      //    break;
      //  default:
      //    # code...
      //    break;
      // $this->updateIsRead($id);
      // }

      $notification = DB::table('notification')->find($id);
      $url = htmlentities($notification->url);
      $user_id =Auth::user()->id;
      $notification_user = DB::table('notification_users')->where('notification_id',$id)
                                                           ->where('user_id',$user_id)
                                                           ->update(['is_read' => 1]);
                                                          
      return Redirect($url);
    }

    public function updateIsRead($id){
      
      $this->ActivityLog('update');
      $notification = DB::table('notification')->find($id);
      // dd($notification->id);
      $url = htmlentities($notification->url);
      // dd($url);
      $user_id =Auth::user()->id;
      $notification_user = DB::table('notification_users')->where('notification_id',$id)
                                 ->where('user_id',$user_id)
                                 ->update(['is_read' => 1]);
                                
      // return Redirect($url);
      return Redirect('admin/employee_mgr/crew/1/edit');                                                
    }

    // private fuction
    private function cout_flight_notification($notification_id){

      $user_id = Auth::user()->id;
      $notification_grroups = DB::table('notification_group')->where('parent_id',$notification_id)->get();
      $notifications_group_arr = array();
      foreach ($notification_grroups as $notification_grroup) {
          $notification_group_id = $notification_grroup->id;

          // $notifications = DB::table('notification')->where('notification_group_id',$notification_group_id)->get();

          $notifications = DB::table('notification as n')
                                          ->join('notification_users as nu','nu.notification_id','=','n.id')
                                          ->where('notification_group_id',$notification_group_id)
                                          ->where('nu.user_id',$user_id)
                                          ->where('nu.is_read',0)
                                          ->select('n.notification_name as notification_name','n.url as url','n.date_added as date_added') 
                                          ->get();

          // $notification_users = DB::table('notification_users')
          //                     ->where('notification_id',$notification_id)
          //                     ->where('is_read',0)
          //                     ->where('user_id',$user_id)
          //                     ->get();
          $notifications_arr = array();
          foreach ($notifications as $notification) {
              $notifications_arr[] = array(
                  'notification_name' => $notification->notification_name,
                  'url' => $notification->url,
                  'date_added' => $notification->date_added,
              );
          }

          $notifications_group_arr[] = array(
              'notification_group' => $notification_grroup->notification_group,
              'total_notification' => count($notifications),
              // 'url' => $notification->url,
              'notifications' => $notifications_arr
          );
      }

      // dd($notifications_group_arr);
      return $notifications_group_arr;
    }

    public function getTotalComment(){
      return(123);
    }
    
  }
