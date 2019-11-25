<?php
namespace App\Http\Middleware;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use DB;
use Mail;
use App\user;
use Validator;
use Auth;
use Session;
use App\Models\Admin\NotificationModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Middleware\Notification;

class GlobalConfig  
{
    protected $auth;

    /**
    * Create a new filter instance.
    *
    * @param  Guard  $auth
    * @return void
    */

    protected function checkUser(){
        //check all users whom have permission to receive notification's alert 
        $UsrList = DB::table('user as u')->Join('user_group as ug', 'ug.id', '=', 'u.group_id')
            ->Join('group_role as gr','ug.id', '=', 'gr.group_id')
            ->Where('gr.is_active',1)
            ->Where('gr.is_alert_system',1)
            ->orWhere('gr.is_alert_email',1)
            ->Select('u.id as user_id','u.email as email','gr.group_id as user_group_id','u.username as username','ug.name as user_group','gr.name as role_name','gr.is_alert_email as is_alert_email','gr.is_alert_system as is_alert_system')
            ->get();
        
        return $UsrList;
    }



    protected function addNotificationEvent($License_Expiration_End_Time){
        $sql = new NotificationModel(array(
                'notification_group_id'   => 2,
                'notification_name'   => 'Crew License'.$License_Expiration_End_Time.' days',
                'url'    => 'admin/employee_mgr/crew/1/edit',
                'endtime'=> $License_Expiration_End_Time,
            ));
        $sql->save();
        $lastId = $sql->id;
        return $lastId;
    }

    protected function addNotificationUsers($notification_id, $data){
        $sql = DB::table('notification_users')->insert(
            [
                'user_id' => $data->user_id,
                'notification_id' => $notification_id,
                'is_read' => 0,
                'is_email' => 0
            ]
        );
    }


    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    protected function processSendEmail($request){
        $data=$this->checkUser();
        $userEmailArr = Array();
    
        define('BASSAKA_SYSTEM_EMAIL','system@bassakaair.com');
        define('BASSAKA_SYSTEM_NAME', 'BASSAKA AIR SYSTEM');
        define('subject', 'Crew License with bassakaair');
        define('message', 'Crew License Will expire soon within 7 day(s).');
       
        
        $userLists = DB::table('user as u')
                    ->Join('user_group as ug', 'ug.id', '=', 'u.group_id')
                    ->Join('group_role as gr','ug.id', '=', 'gr.group_id')
                    ->Where('gr.is_active',1)
                    ->Where('gr.is_alert_system',1)
                    ->Select('u.*','u.id as user_id','u.username as username','ug.name as user_group','gr.name as role_name','gr.is_alert_email as is_alert_email','gr.is_alert_system as is_alert_system')
                    ->get();
        
        $user_email_arr = '';
        foreach ($userLists as $userList){
            $user_email_arr .= $userList->email.':';
        }
        $mail_Group_arr = explode(':', $user_email_arr);
        // $test = array(''.$array["email"].'');
        $mail_arr = array('sim_sineth@ymail.com','sineth.sim@y5net.com.kh','simsineth855@gmail.com');
        $data = $request->only(BASSAKA_SYSTEM_EMAIL,BASSAKA_SYSTEM_NAME, subject, message);
        
        Mail::send('admin.mail.mail', [], function($message) use ($mail_arr)
            {
        // Mail::send('admin.mail.mail', $data, function($message) {
            $message->to($mail_arr, 'Bassaka')->subject('Welcome to the Laravel 4 Auth App!');
        });

        // Mail::send('admin.mail.mail', $data, function($message){
        //   $message->from(BASSAKA_SYSTEM_EMAIL, BASSAKA_SYSTEM_NAME);
        //   $message->to('simsineth855@gmail.com')->subject(subject);
        // });

        // Mail::send('admin.mail.mail', [], function($message) use ($test)
        //     {    
        //         $message->from(BASSAKA_SYSTEM_EMAIL,BASSAKA_SYSTEM_NAME);
        //         $message->to($test)->subject(subject);    
        //     });
        // }
        
    }

    public function handle($request, Closure $next)
    {  

       // GlobalConfig
       $GlobalConfig = DB::table('config')->get(); 
       foreach ($GlobalConfig as $key => $value) {
            define($value->keywords, $value->value);
       }

       return $next($request);
       
    }



   
    
}


