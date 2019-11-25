<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;
use App\Models\Admin\NotificationModel;
use App\Models\Admin\setup_mgr\Branch;
use App\Models\Admin\sale_mgr\SaleOrderSequence;
use App\Models\Admin\invoice\InvoiceSequence;
use Session;
use Auth;
use Request;

class Controller extends BaseController
{
	
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;	
   	
   	// getMenuCode
    public function getMenuCode(){
    	if(isset($_REQUEST['menuCode'])){
      	$menu_code = $_REQUEST['menuCode'];
      	return "?menuCode=".$menu_code;
    	}else{
    		$menu_code = 'y5_m01';
    		return $menu_code;
    	}
    }

    // update sequence
    public function UpdateInvoiceSequence(){
      $InvoiceSequence = InvoiceSequence::Where('id',1)->first();
      $sequence_no = $InvoiceSequence->sequence_no+1;
      InvoiceSequence::Where('id',1)->Update(['sequence_no'=>($sequence_no)]);
    }

    // update sequence
    public function UpdateSaleOrderSequence(){
      $SaleOrderSequence = SaleOrderSequence::Where('id',1)->first();
      $sequence_no = $SaleOrderSequence->sequence_no+1;
      SaleOrderSequence::Where('id',1)->Update(['sequence_no'=>($sequence_no)]);
    }

   // getQuotationFormat
   public function getQuotationSequence(){
   	$next_codes = DB::table("next_codes")->Where('id',3)->first();
   	$sequence = DB::table("quotation_sequence")->first();
   	$year='';
   	$month='';
   	if($next_codes->year_format!=null&&$next_codes->month_format!=null){
   		$year=date($next_codes->year_format);
   		$month=date($next_codes->month_format);
   	}else if($next_codes->year_format!=null){
   		$year=date($next_codes->year_format);
   	}else{
   		$month=date($next_codes->month_format);
   	}
   	$format = $next_codes->prefix.$year.$month.$next_codes->suffix.$sequence->sequence_no;
   	return $format;
   }
   // getSaleOrderFormat
   public function getSaleOrdersequence(){
   	$next_codes = DB::table("next_codes")->Where('id',6)->first();
   	$sequence = DB::table("sale_order_sequence")->first();
   	$year='';
   	$month='';
   	if($next_codes->year_format!=null&&$next_codes->month_format!=null){
   		$year=date($next_codes->year_format);
   		$month=date($next_codes->month_format);
   	}else if($next_codes->year_format!=null){
   		$year=date($next_codes->year_format);
   	}else{
   		$month=date($next_codes->month_format);
   	}
   	$format = $next_codes->prefix.$year.$month.$next_codes->suffix.$sequence->sequence_no;
   	return $format;
   }
   // getInvoiceSequence
   public function getInvoiceSequence(){
   	$next_codes = DB::table("next_codes")->Where('id',2)->first();
   	$sequence = InvoiceSequence::first();
   	$year='';
   	$month='';
   	if($next_codes->year_format!=null&&$next_codes->month_format!=null){
   		$year=date($next_codes->year_format);
   		$month=date($next_codes->month_format);
   	}else if($next_codes->year_format!=null){
   		$year=date($next_codes->year_format);
   	}else{
   		$month=date($next_codes->month_format);
   	}
   	$format = $next_codes->prefix.$year.$month.$next_codes->suffix.$sequence->sequence_no;
   	return $format;
   }

   // getQuotationFormat
   public function getReturnSequence(){
   	$next_codes = DB::table("next_codes")->Where('id',5)->first();
   	$sequence = DB::table("return_sequence")->first();
   	$year='';
   	$month='';
   	if($next_codes->year_format!=null&&$next_codes->month_format!=null){
   		$year=date($next_codes->year_format);
   		$month=date($next_codes->month_format);
   	}else if($next_codes->year_format!=null){
   		$year=date($next_codes->year_format);
   	}else{
   		$month=date($next_codes->month_format);
   	}
   	$format = $next_codes->prefix.$year.$month.$next_codes->suffix.$sequence->sequence_no;
   	return $format;
   }

   // getQuotationFormat
   public function getTransferSequence(){
   	$next_codes = DB::table("next_codes")->Where('id',4)->first();
   	$sequence = DB::table("transfer_sequence")->first();
   	$year='';
   	$month='';
   	if($next_codes->year_format!=null&&$next_codes->month_format!=null){
   		$year=date($next_codes->year_format);
   		$month=date($next_codes->month_format);
   	}else if($next_codes->year_format!=null){
   		$year=date($next_codes->year_format);
   	}else{
   		$month=date($next_codes->month_format);
   	}
   	$format = $next_codes->prefix.$year.$month.$next_codes->suffix.$sequence->sequence_no;
   	return $format;
   }

   // get default branch
   public function DefaultBranch(){
   	 $branch = Branch::Where('is_default',1)->select('id')->first();
   	 return $branch->id;
   }

   // check if table exist data
   public function chkExistData($table,$field,$value){
    	$sql = DB::table($table)->Where($field,$value)->get();
    	if($sql){
    		$result = 1;
    	}else{
    		$result = 0;
    	}
    	return $result;
   }

   // Permission
   public function permissionOnMenu($group_id,$language_id){
    	$menu_arr="";
        $menu_id_arr="";
        $menu_parent_id_arr="";
        $global_menu = "";
        // $group_id = $GroupRole->id;
        $group_role_detail_arr=array();
        $group_role_detail = DB::table('group_role_detail')
                ->where('group_role_id','=',$group_id)
                ->get();

        foreach ($group_role_detail as $key => $value) {
          $menu_arr .= $value->menu_code.":";
          $menu_id_arr .= $value->menu_id.":";
          $menu_parent_id_arr .= $value->parent_menu_id.":";

          $group_role_detail_arr[] = array(
          	'menu_code'=>$menu_arr,
          	'menu_id'=>$menu_id_arr,
          	'menu_parent_id'=>$menu_parent_id_arr,
          );
        }

        $menu_sep = explode(':',$menu_arr);
        $menu_id_sep = explode(':',$menu_id_arr);
        $menu_parent_id_sep = explode(':',$menu_parent_id_arr);
        // print_r($menu_sep);
        $parents_menu_arr = array();
        // parent_menu #########
        $parents_menu = DB::table("menu as m")
            ->JOIN('menu_description as md','m.id','=','md.menu_id')
            ->WHERE('m.parent_id',0)
            ->WHERE('md.language_id',$language_id)
            ->SELECT('m.id as id','m.parent_id as parent_id','m.default as default','m.menu_code as menu_code','m.fa_icon as fa_icon','m.menu_link as p_menu_link','md.name as parent_menu_name','m.id as parent_menu_id')
            ->OrderBy('m.ordering')
            ->get();

        foreach ($parents_menu as $parent_menu) 
        {
          $mm_id='';
          $mmcode='';
          $mparent_id='';
          $read='';
          $write='';

          $mtitle = $parent_menu->parent_menu_name;
          $mcode = $parent_menu->menu_code;
          $mparent_id = $parent_menu->parent_id;
          $mid = $parent_menu->id;
          $default = $parent_menu->default;
          // dd($mcode);
          if(in_array($mcode, $menu_sep)){
            $mm_id = $parent_menu->id;
            $mmcode = $parent_menu->menu_code;
          }

          $read='';
          $write='';
          $reads = DB::table('group_role_detail')
                      ->where('menu_code',$mcode)
                      ->where('group_role_id',$group_id)
                      ->get();
					foreach ($reads as $read12){
						$read = $read12->read;
					}

					$writes = DB::table('group_role_detail')->where('menu_code','=',$mcode)->where('group_role_id','=',$group_id)->get();
					foreach ($writes as $writes12){
						$write = $writes12->write;
					}

	        // Submenu ############
	        $submenus = DB::table("menu as m")
			    ->JOIN('menu_description as md','m.id','=','md.menu_id')
			    ->WHERE('m.parent_id',$mid)
			    ->WHERE('md.language_id',$language_id)
			    ->SELECT('m.id as id','m.parent_id as parent_id','m.menu_code as menu_code','m.fa_icon as fa_icon','m.menu_link as p_menu_link','md.name as parent_menu_name','m.id as parent_menu_id')
			    ->OrderBy('m.ordering')
			    ->get();
		    
		    	$submenus_arr=array();
					//foreach ($submenu as $submenus) {
					foreach ($submenus as $submenu) {
					  $s_id='';
					  $s_code='';
					  $sread='';
					  $swrite='';
					  $s_parent_id='';

					  $sid = $submenu->id;
					  $smtitle = $submenu->parent_menu_name;
					  $smcode = $submenu->menu_code;
					  $sparent_id = $submenu->parent_id;
					    
					  if(in_array($smcode, $menu_sep)){
					      // $s_id = $submenu->id;
					      // $s_code = $submenu->menu_code;
					      // $s_parent_id = $submenu->parent_id;
							$sub_reads = DB::table('group_role_detail')->where('menu_code','=',$smcode)->where('group_role_id','=',$group_id)->get();
							foreach ($sub_reads as $sub_read){
					      $sread = $sub_read->read;
					    }
					      
					    $sub_writes = DB::table('group_role_detail')->where('menu_code','=',$smcode)->where('group_role_id','=',$group_id)->get();
					    foreach ($sub_writes as $sub_write){
					      $swrite = $sub_write->write;
					    }
					  }

					  //sreyleak add on more sub menu
						$sub_submenus_arr = array();
						$sub_submenus = DB::table("menu as m")
														    ->JOIN('menu_description as md','m.id','=','md.menu_id')
														    ->WHERE('m.parent_id',$sid)
														    ->WHERE('md.language_id',$language_id)
														    ->SELECT('m.id as id','m.parent_id as parent_id','m.menu_code as menu_code','m.fa_icon as fa_icon','m.menu_link as p_menu_link','md.name as parent_menu_name','m.id as parent_menu_id')
														    ->OrderBy('m.ordering')
														    ->get();			    
			    	
						foreach ($sub_submenus as $sub_submenu) {
						  $sub_s_id='';
						  $sub_s_code='';
						  $sub_sread='';
						  $sub_swrite='';
						  $sub_s_parent_id='';

						  $sub_sid = $sub_submenu->id;
						  $sub_smtitle = $sub_submenu->parent_menu_name;
						  $sub_smcode = $sub_submenu->menu_code;
						  $sub_sparent_id = $sub_submenu->parent_id;
						    
						  if(in_array($sub_smcode, $menu_sep)){
								$sub_reads = DB::table('group_role_detail')->where('menu_code','=',$smcode)->where('group_role_id','=',$group_id)->get();
								foreach ($sub_reads as $sub_read){
						      $sub_sread = $sub_read->read;
						    }
						      
						    $sub_writes = DB::table('group_role_detail')->where('menu_code','=',$smcode)->where('group_role_id','=',$group_id)->get();
						    foreach ($sub_writes as $sub_write){
						      $sub_swrite = $sub_write->write;
						    }
						  }

							$sub_submenus_arr[]=array(
						    's_menu_name'=>$sub_smtitle,
								's_menu_code'=>$sub_smcode,
								's_parent_id'=>$sid,
								's_mid'=>$sub_sid,
								's_read'=>$sub_sread,
								's_write'=>$sub_swrite,
								'sub_menus'=>$sub_submenus_arr,
						    );
						}
					  //end
					  $submenus_arr[]=array(
					    's_menu_name'=>$smtitle,
							's_menu_code'=>$smcode,
							's_parent_id'=>$sparent_id,
							's_mid'=>$sid,
							's_read'=>$sread,
							's_write'=>$swrite,
							'sub_menus'=>$sub_submenus_arr,
					    );
					}

			$parents_menu_arr[] = array(
				'parent_menu_name'=>$mtitle,
				'menu_code'=>$mcode,
				'default'=>$default,
				'parent_id'=>$mparent_id,
				'mid'=>$mid,
				'read'=>$read,
				'write'=>$write,
				'sub_menus'=>$submenus_arr,
			);

		}

		$global_menu = array(
			'group_role_detail_arr'=>$group_role_detail_arr,
			'parents_menu_arr'=>$parents_menu_arr,
		);

		// dd($global_menu);			

		return($global_menu);
   }

    //get FMenuLists
	public function getFMenuLists($language_id,$menu_type,$parent_id=0){

		$fmenu = DB::table('fmenu')
					//->select($field)
					->where('is_active',1)
					->where('parent_id',$parent_id)
					->where('menu_type_id',$menu_type)
					->orderBy('ordering')
					->get();
		//dd($fmenu);
		$data = array();
		foreach ($fmenu as $fm) {
			//dd($fm);
			$id = $fm->id;
			$url = $fm->url;
			$fa_icon = $fm->fa_icon;
			$child = $this -> getFMenuLists($language_id,$menu_type,$id);
			//dd($child);
			$name = $this-> getDescription('fmenu', 'name', $id, $language_id);
			$checkLink = explode('http:', $fm->menu_link);
			if(sizeof($checkLink)>1) $menu_link = $fm->menu_link;
			else $menu_link = $fm->menu_link;
			$data[] = array('id'=> $id,
					'name'=>$name,
					'url'=>$url,
					'fa_icon' => $fa_icon,
					'link'=>$menu_link,
					'parent_id'=>$fm->parent_id,
					'child'=>$child);
		}
		return $data;

	}
	//get content
	public function getContent($id, $language_id){

		$results = DB::table('content as c')
					->leftjoin('fmenu_description as fmd','c.fmenu_id','=','fmd.fmenu_id')
					->join('content_description as cd','cd.content_id','=','c.id')
					->select('c.id as id','fmd.name as name','cd.description as cd_description','cd.language_id as cd_language')
					->where('c.is_active',1)
					->where('fmd.language_id',$language_id)
					->where('c.fmenu_id',$id)					
					->get();

		$data = array();

		foreach ($results as $result) {
			$id = $result->id;
			$title_content = $result->name;
			$name = $this-> getDescription('content', 'description', $id, $language_id);
			$description =  html_entity_decode($this-> getDescription('content', 'description', $id, $language_id));
			$data[] = array('id'=> $id,
							'name'=>$title_content,
							'description'=>$description
						   );
		}
		return $data;
	}

	//get contdent
	public function getTitleArticle($id, $language_id){
		$results = DB::table('fmenu_description')
		        ->where('language_id',$language_id)
		 		->where('fmenu_id',$id)		
		        ->get();

		 //$data = array();
		 foreach ($results as $key => $value) {
		 	$id = $value->id;
		 	$title_article = $value->name;
		 	$data[] = array('id'=> $id,
	 				'name'=>$title_article
				   ); 
		 }
		return $data;
	}

	//getDescription
	public function getDescription($table, $field, $id, $language_id){
		
		$name = DB::table($table.'_description')
		        ->select($field)
		        ->where('language_id',$language_id)
		 		->where($table.'_id',$id)		
		        ->get();
        //->toSql();
        //dd($language_id);
        //dd($name);
        if(empty($name)) $data = '';
        else $data = $name[0]->$field;
        return $data;
	}

	//getFmenuDescription
	public function getFmenuDescription($field, $fmenu_id, $language_id){
		$name = DB::table('fmenu_description')
        ->select($field)
 		->where('fmenu_id',$fmenu_id)
		->where('language_id',$language_id)
        ->get();
        //->toSql();
		return $name[0]->$field;
	}
	
	
	public function getCurrency($name){
		$id = Currency::where('name',$name)->first()->id;
		return $id;
	}
	
	public function calculateTime($scheduledate, $stds, $stas){
	  $std = date_create($scheduledate.' '.$stds);
	  $sta = date_create($scheduledate.' '.$stas);
     	
	  // $calculate_duration_flight = date_diff($std,$sta);
	  $new_std_hour = date("H",strtotime($stds));
	  $new_sta_hour = date("H",strtotime($stas));

	  $new_std_minute = date("i",strtotime($stds));
	  $new_sta_minute = date("i",strtotime($stas));

	  $time = 0;
	  $time_in = '';	
	  if($new_std_hour>$new_sta_hour){
	  	
	  	if($new_std_minute>$new_sta_minute){
	    	$time = (24+$new_sta_hour) - $new_std_hour - 1;
	  	}else{
	  		$time = (24+$new_sta_hour) - $new_std_hour;
	  	}


	    if($new_std_minute>$new_sta_minute){
	    	$minute = (60 + $new_sta_minute)-$new_std_minute;//$new_std_minute-$new_sta_minute;
	    }else{
	    	$minute = $new_sta_minute-$new_std_minute;
	    }
	    // if($time_cal<=9){
	    // 	$time=$time_cal;
	    // 	$minute = $time_cal;
	    // }else{
	    // 	$time= $time_cal;
	    // 	$minute = $time_cal;
	    // }
	  }else{
	  	$calculate_duration_flight = date_diff($std,$sta);
	  	$time = $calculate_duration_flight->h;
	  	$minute = $calculate_duration_flight->i;
	  }

	  // $calculate_duration_flight = date_diff($std,$sta);
      if($time<=9){
        $time_in = '0'.$time;
      }else{
        $time_in = $time;
      }
      if($minute<=9){
        $minute_in = '0'.$minute;
      }else{
        $minute_in = $minute;
      }
      if($time_in=='00') $time_in='';
    
      $calculate_time = $time_in.$minute_in;

      return $calculate_time;
	}

	public function DateNow(){
		$datetime = date('Y-m-d H:i:s');
		return $datetime;
	}

	public function FormatDate($date){
		$date = strtotime($date);
		$newdate = date('Y-m-d',$date);
		return $newdate;
	}

	//Activity Log
	public function ActivityLog($action){
		$menuCode = 'y5_m01';
		if(isset($_REQUEST['menuCode'])){
			$menuCode = $_REQUEST['menuCode'];
		}

	  // Recent ActivityLog
		$sql = DB::table('activity_log')->insert(
	    [
			'user_id' => Auth::user()->id, 
			'action' => $action,
			'menu_code' => $menuCode,
			// 'ip_address' => $_SERVER['SERVER_ADDR'],
			// 'mac_address' => $_SERVER['SERVER_ADDR'],
			'datetime' => date('Y-m-d h:i:s')
	    ]
		);

		return $sql;
	}

	// Notification Log
	public function NotificationLog($notification_group_id, $event_name, $url){

		// $sql = DB::table('notification')->insert(
		//     [
		// 		'notification_group_id' => $notification_group_id,
		// 		'notification_name' => $event_name,
		// 		'url' => $url,
		// 		'date_added' => date('Y-m-d h:i:s')
		//     ]
		// );

		$sql = new NotificationModel(array(
                    'notification_group_id'   => $notification_group_id,
                    'notification_name'   => $event_name,
                    'url'    => $url,
                    'endtime'=> '',
                    'date_added' => date('Y-m-d h:i:s')
                ));
        $sql->save();
        
        $lastId = $sql->id;
		$this->checkUser($lastId);
		return $sql;
	}

	// insertFlightStatus
	public function addNotificationFlightAction($noti_group_id,$noti_name,$url){
		$sql = new NotificationModel(array(
            'notification_group_id'   => $noti_group_id,
            'notification_name'   => $noti_name,
            'date_added'   => date('Y-m-d H:i:s'),
            'url'    => $url
        ));
		
		$sql->save();
        $lastNotificationId = $sql->id;

		$userList = DB::table('user as u')
					->Join('user_group as ug', 'ug.id', '=', 'u.group_id')
                	->Join('group_role as gr','ug.id', '=', 'gr.group_id')
                	->Where('gr.is_active',1)
                	->Where('gr.is_alert_system',1)
                	->Select('u.id as user_id','u.username as username','ug.name as user_group','gr.name as role_name','gr.is_alert_email as is_alert_email','gr.is_alert_system as is_alert_system')
                	->get();

        if($userList){
        	foreach ($userList as $data) {
        		$this->addNotificationUsers($lastNotificationId, $data);
        	}
        };

        return true;
    }

	protected function checkUser($user_id){
        //check all users whom have permission to receive notification's alert 
       $userList = DB::table('user as u')
					->Join('user_group as ug', 'ug.id', '=', 'u.group_id')
                	->Join('group_role as gr','ug.id', '=', 'gr.group_id')
                	->Where('gr.is_active',1)
                	->Where('gr.is_alert_system',1)
                	->Select('u.id as user_id','u.username as username','ug.name as user_group','gr.name as role_name','gr.is_alert_email as is_alert_email','gr.is_alert_system as is_alert_system')
                	->get();

        if($userList){
        	foreach ($userList as $data) {
        		$this->addNotificationUsers($user_id, $data);
        	}
        };

        return $userList;
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


    protected function getCodeWithConfig($module){
    	

		$data = DB::table('next_codes')->where('module',$module)->first();
    	if ($data->is_manaul == true){

    	}else{
    		$code = $this->generateCode($data->prefix, $data->cit, $data->length);
    		$nextCode = (int)($data->cit) + 1;
  			$data = DB::table('next_codes')->where('module',$module);
    		$data->update(['cit' => $nextCode]);
    	}
    	return $code;
    }

    protected function generateCode($prefix,$nextCode,$length){
    	if(is_null($prefix)){
    		$prefix="";
    	}
    	$zero='';
    	$l_num = strlen((string)($nextCode));
    	
    	while ( $l_num < $length) {
    		$zero.='0';
    		$length-=1;
		}
		// dd($prefix);
		return $prefix.$zero.(string)($nextCode);
    }

    protected function getCode($module){
		$data = DB::table('next_codes')->where('module',$module)->first();
    	$code = $this->generateCode($data->prefix, $data->cit, $data->length);
   		return $code;
    }

}
