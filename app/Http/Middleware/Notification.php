<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;
use DB;
class Notification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         $User_Natification = DB::table('user as u')->Join('user_group as ug', 'ug.id', '=', 'u.group_id')
                                ->Join('group_role as gr','ug.id', '=', 'gr.group_id')
                                ->Where('gr.is_active',1)
                                ->Where('gr.is_alert_system',1)
                                ->Select('u.id as user_id','u.username as username','ug.name as user_group','gr.name as role_name','gr.is_alert_email as is_alert_email','gr.is_alert_system as is_alert_system')
                                ->get();

        return $next($request);
    }

    public function check_user(){
         $User_Natification = DB::table('user as u')->Join('user_group as ug', 'ug.id', '=', 'u.group_id')
                                    ->Join('group_role as gr','ug.id', '=', 'gr.group_id')
                                    ->Where('gr.is_active',1)
                                    ->Where('gr.is_alert_system',1)
                                    ->Select('u.id as user_id','u.username as username','ug.name as user_group','gr.name as role_name','gr.is_alert_email as is_alert_email','gr.is_alert_system as is_alert_system')
                                    ->get(); 
            return $User_Natification
    }
}
