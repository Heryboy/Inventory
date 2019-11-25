<style type="text/css">
	/*div.column{background-color:yellow;}*/
	div.column .cell:hover{border:2px solid green;}
	/*div.column .cell{border:1px solid blue;z-index: 100000;}*/
</style>

<!-- UTC TIMZONE -->
<script type="text/javascript">
		// printSchedule
		function printSchedule(){
			var filter_from = $('#filter_from').val();
			var filter_to = $('#filter_to').val();
			var flight_number = $('#flight_number').val();
			var default_utc = "1";
			var url = '{{url("admin/getPrint")}}?filter_from='+filter_from+'&filter_to='+filter_to+'&flight_number='+flight_number+'&default_utc='+default_utc+'';
			var win = window.open(url, '_blank');
			win.focus();
		} 

		// init_print_report
		function init_print_report(){
			var filter_from = $('#filter_from').val();
			var filter_to = $('#filter_to').val();
			var flight_number = $('#flight_number').val();
			var default_utc = "1";
			var url = '{{url("admin/report/flight")}}?from_date='+filter_from+'&to_date='+filter_to+'&fn='+flight_number+'';

			var win = window.open(url, '_blank');
			win.focus();
		} 

		// getLayoutTime
		$.getLayoutTime = function(data,distance_between_utc,bevious_distance,bevious_aircraft,new_date,total_distance){ 
			var html ='';
			var timeline='';
			var time_elapse_utc_total='';
			var total_distance_dtd='';
			var flag_flight = 1;
			var flag_swap_flight = 2;
			var flag_diverted_flight = 3;
			var flag_delay_flight = 4;
			var flag_cancelled_flight = 5;
			var flag_deleted_flight = 6;
			var flag_retime_flight = 7;
			var flag_reschedule_flight = 8;
			var capture_current_date = $("#capture_current_date").val();
			var DEFAULT_UTC_TIME = $("#DEFAULT_UTC_TIME").val();

			// local Time Current ########
			var local_minute = '';
			var local_hour = '';
			var local_current_date = new Date();
			local_minute = local_current_date.getMinutes();
			local_hour = local_current_date.getHours();
			// color_not_approve
			var color_not_apporve = '{{FLIGHT_COLOR_NOT_APPROVED}}';
			// color no update 
			var color_not_update = $("#color_no_update").val();
			var color_updated = $("#color_updated").val();

			// new_date
			// alert(new_date);
			// schedule_data
			$.each(data, function(schedule_id, schedule_data){
				var m=1;
				// Maintenance Flight ##############
				if(schedule_data['Maintenance_arr']!=''){
					$.each(schedule_data['Maintenance_arr'], function(Maintenance_name,Maintenance_val){
						var M_sartdate = Maintenance_val['m_start_date'];
						var M_end_date = Maintenance_val['m_end_date'];
						var M_aircraft_id = Maintenance_val['m_aircraft_id'];
						var M_maintenance_date = Maintenance_val['m_maintenance_date'];
						var maintenance_date = new Date(M_maintenance_date);
				    var new_maintenance_date = maintenance_date.toString('yyyy-MM-dd');
				    var M_class_top='';

				   switch(M_aircraft_id){
				   	case 2:
								M_class_top = 75;
							break;
							case 3:
								M_class_top = 118;
							break;
							case 4:
								M_class_top = 161;
							break;
							case 5:
								M_class_top = 185;
							break;
							case 6:
								M_class_top = 204;
							break;
							default:
								M_class_top = 28;
							break;
				    }
				   
							var m_distance =0;
							var m_etimate_time_utc = 1200;
							var m_start_time='';
							var m_end_time='';
							if(new_date==new_maintenance_date){
								if(m==1){
									m_distance = Maintenance_val['m_distance'];
									m_start_time = SlitTime(Maintenance_val['m_start_time']);
								}else if(m === Maintenance_val['m_count']){
				        	m_etimate_time_utc = Maintenance_val['etimate_time_end_utc'];
				        	m_end_time = SlitTime(Maintenance_val['m_end_time']);
				        }

								html += '<div class="top-engine" style="margin-left:4px;position:absolute;bottom:-23px;font-size:10px;top:'+M_class_top+'px">';
									html += '<div style="position:absolute;margin-left:-10px;left:'+m_distance+'px;">'+m_start_time+'</div>';
										html += '<div class="" data-value="" style="position:absolute;background-color:'+Maintenance_val['maintenance_color']+';height:15px;width:'+m_etimate_time_utc+'px;top:-15px;left:'+m_distance+'px;color:#fff;">';
										
											html +='<center>'+Maintenance_val['m_reason']+'</center>';

										html += '</div>';
									html += '<div style="position:absolute;margin-left:-15px;left:'+m_etimate_time_utc+'px;">'+m_end_time+'</div>';
								html += '</div>';

							}
						m++;
					});
				}
				// ##########END Maintenance Flight

				// ##Flight Arry
				$.each(schedule_data['flight_schedule_mgr'], function(schedule_id, schedule_data){
					var origin_id = schedule_data.origin_id;
					var destination_id = schedule_data.destination_id;
					var dd = '';
					if(destination_id == origin_id){
						// alert(destination_id);
					}else if(destination_id != 3){
						var dd = schedule_data.destination_name;
					}
					var new_hour_BT_OFF=0;
					var new_hour_BT_ON=0;
					if(schedule_data.BT_OFF!=null || schedule_data.BT_ON!=null){
						var s_BT_OFF = schedule_data.BT_OFF;
						var s_BT_ON = schedule_data.BT_ON;
						var new_BT_OFF = Date.parse(s_BT_OFF);
						var new_BT_ON = Date.parse(s_BT_ON);
						new_hour_BT_OFF = new_BT_OFF.getHours();
						new_hour_BT_ON = new_BT_ON.getHours();
						// alert(new_hour_BT_OFF);
					}
					if(schedule_data.BT_OFF==null || new_hour_BT_OFF==0 || schedule_data.BT_ON==null || new_hour_BT_ON==0){
						var STD_Time = schedule_data.fsm_STD; 
						var STA_Time = schedule_data.fsm_STA;
					}else{
						var STD_Time = schedule_data.BT_OFF; 
						var STA_Time = schedule_data.BT_ON;
					}
					// ############Block Use Common
					var aircrafts_id=schedule_data.aircrafts_id;
					var utc_destination = schedule_data.utc_destination;
					var utc_origin = schedule_data.utc_origin;
					// #############Block Schedules1
					var STD = Date.parse(STD_Time);
					var STA = Date.parse(STA_Time);
					var STD_hour = STD.getHours();
					var STA_hour = STA.getHours();
					var STD_minute = STD.getMinutes();
					var v_fsm_atd = STD_minute;
					var STA_minute = STA.getMinutes();
					var total_minute = STA_minute-STA_minute;
					// ##############Block Time Definds Schedules2
					var STD_Time_New = schedule_data.fsm_STD; 
					var STA_Time_New = schedule_data.fsm_STA;
					var STD_New = Date.parse(STD_Time_New);
					var STA_New = Date.parse(STA_Time_New);
					var STD_hour_New = STD_New.getHours();
					var STA_hour_New = STA_New.getHours();
					var STD_minute_New = STD_New.getMinutes();
					var STA_minute_New = STA_New.getMinutes();
					var total_minute_New = STA_minute_New-STA_minute_New;

					//################ UTC TIME ##################
					if(DEFAULT_UTC_TIME==1){
						var distance_utc = (STD_hour_New*50)+STD_minute_New*(50/60);
						// $time_elapse_utc_total='';
						if(STD_New > STA_New){
							var time_elapse_utc_total = STA_hour_New+24 - STD_hour_New;
						}else{
							var time_elapse_utc_total = STA_hour_New - STD_hour_New;
						}
						var etimate_time_utc = time_elapse_utc_total * 50 + ((STA_minute_New-STD_minute_New) * (50/60));
					}else{
						// ################## LOCAL TIME ZONE ###############
						var distance_utc = (STD_hour_New*50)+STD_minute_New*(50/60) + utc_origin*50;
						var Local_time = utc_destination - utc_origin;
						var time_elapse='';
						if(STD_New > STA_New){
							var time_elapse = STA_hour_New+24 - STD_hour_New;
						}else{
							var time_elapse = STA_hour_New - STD_hour_New;
						}
						var etimate_time_utc = (time_elapse+Local_time) * 50 + ((STA_minute_New-STD_minute_New) * (50/60));
					}

					// Calss Top
					var class_top='';
					
					@if(isset($_REQUEST['default_utc']))
						if(aircrafts_id==2){
							class_top = 42;
						}else if(aircrafts_id==3){
							class_top = 82;
						}else if(aircrafts_id==4){
							class_top = 122;
						}else if(aircrafts_id==5){
							class_top = 162;
						}else if(aircrafts_id==6){
							class_top = 202;
						}else if(aircrafts_id==7){
							class_top = 242;
						}else if(aircrafts_id==8){
							class_top = 305;
						}else if(aircrafts_id==9){
							class_top = 350;
						}else if(aircrafts_id==10){
							class_top = 395;
						}else{
							class_top = 0;
						}
					@else
						if(aircrafts_id==2){
							class_top = 50;
						}else if(aircrafts_id==3){
							class_top = 95;
						}else if(aircrafts_id==4){
							class_top = 135;
						}else if(aircrafts_id==5){
							class_top = 175;
						}else if(aircrafts_id==6){
							class_top = 215;
						}else if(aircrafts_id==7){
							class_top = 260;
						}else if(aircrafts_id==8){
							class_top = 305;
						}else if(aircrafts_id==9){
							class_top = 350;
						}else if(aircrafts_id==10){
							class_top = 395;
						}else{
							class_top = 5;
						}
					@endif

					// ###condition if flight_status is Delay Flight ####
					var flight_status_id = schedule_data.flight_status_id;
					if(new_date==(schedule_data.schedule_date)){
						// ##### Flight Status Condition
						// Diverted Flight
						var divert_std = '';
						var divert_dta = '';
						var divert_dtd = '';
						var divert_sta = '';
						var divert_BT_OFF = '';
						var divert_BT_ON = '';
						var divert_remark  = '';
						var origin_name = '';
						var destination_name = '';
						var divert_location = '';
						var origin_id = '';
						var destination_id = '';
						var flight_divert = '';
						//Delay Flight
						var delay_std='';
						var delay_sta='';
						var distance_utc_delay='';
						var delay_remark='';
						// Cancelled Flight
						var cancel_remark = '';
						// Retime Flight
						var retime_std = '';
						var retime_sta = '';
						var retime_remark = '';
						// Reschedule Flight
						var reschedule_std = '';
						var reschedule_sta = '';
						var reschedule_remark = '';
						// button save change
						var html_notificaton_str='';
						
						html_notificaton_str += '<div class="col-sm-12" style="padding-top:10px;"><button type="button" data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" onClick="disableAction();" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button></div>';
						
						// $.LeftClickNotification();
						var html_notificaton='';
						var html_right_click_status = '';
						// #####flight_notification_status ##############
						var swap_action = $("#swap_action").val();
						if(swap_action!=0){
							//######## block_change_notification ##########
							html_right_click_status += '<div style="position:absolute;margin:0 auto;left:0;right:0;top:15px;font-size:25px;z-index:100;">';
								html_right_click_status += '<center>';
									// arrow-caret-up
									html_right_click_status += '<a href="javascript:void();" id="arrow-up-right-click'+schedule_data.fsm_id+'" style="display:none;"><i class="fa fa-caret-up"></i></a>';
								html_right_click_status += '</center>';

									// Flight Information Status ############
									// ##########Flight Status Information ##############
									html_right_click_status += '<div style="position:absolute;margin:0 auto;left:0;right:0;top:0px;font-size:15px;margin:0 auto;">';

										html_right_click_status += '<div class="flight_information_right_click" id="flight_pax_main_UTC_right_click'+schedule_data.fsm_id+'" style="display:none;">';
											// #################flight_pax
											html_right_click_status += '<div class="flight_pax_right_click">';
												// flight_pax_content
												html_right_click_status += '<div class="flight_pax_content_right_click">';
													html_right_click_status +='<a onClick="InitCloseRightClick('+schedule_data.fsm_id+')" href="javascript:void();" class="btn-close-schedule btn btn-danger btn-xs"><i class="fa fa-wa fa-remove"></i></a>';
													html_right_click_status +='<div class="col-sm-12">';
														html_right_click_status += '<div class="row">'; 
															html_right_click_status += '<div class="x_content">';
															html_right_click_status += '<div class="" role="tabpanel" data-example-id="togglable-tabs">';
																// html_right_click_status += 'Choose Aircraft';
																html_right_click_status += '<div class="col-sm-6" style="padding:4px;font-size:13px;">';
																	html_right_click_status += '<a class="btn btn-xs btn-primary" onClick="initChangeAircraft('+schedule_data.fsm_id+',0,'+total_distance+',\''+schedule_data.schedule_date+'\');" href="javascript:void();"><i class="fa fa-wa fa-plane"></i> {!!trans("flightschedule/schedulemonitor.change_aircrafts")!!}</a>';
																html_right_click_status += '</div>';

																if(flight_status_id==5){
																	html_right_click_status += '<div class="col-sm-6" style="padding:4px;font-size:13px;">';
																		html_right_click_status += '<a class="btn btn-xs btn-success" onClick="initReActiveStatus('+schedule_data.fsm_id+','+schedule_data.flight_status_id+','+total_distance+',\''+schedule_data.schedule_date+'\',\''+schedule_data.fsm_flight_group+'\','+schedule_data.pax_movement_id+');" href="javascript:void();"><i class="fa fa-wa fa-check"></i> {!!trans("flightschedule/schedulemonitor.reinstate_flight")!!}</a>';
																	html_right_click_status += '</div>';
																}

																// html_right_click_status += 'Choose Aircraft';
															html_right_click_status += '</div>';
															html_right_click_status += '</div>';
														html_right_click_status += '</div>';
													html_right_click_status += '</div>';
													html_right_click_status += '<div class="clearfix"></div>';
												html_right_click_status += '</div>';
												// ############## END flight_pax_content ######
											html_right_click_status += '</div>';
											// ############END flight pax ########
										html_right_click_status += '</div>';
										// html_right_click_status += '</center>';
										html_right_click_status += '<div class="clearfixed"></div>';
									html_right_click_status += '</div>';
									// ######## End Flight Status Information #################
									// #END Flight Information Status
							html_right_click_status += '</div>';
						}
						// #############END flight_notification_status  ######

						// <!-- ######### UTC TIME ZONE #######-->
						var STD_Time='';
						@if(isset($_REQUEST['default_utc']))
							var STD_Time = SlitTime(schedule_data.fsm_STD);
							//new Date(schedule_data.STA);
							// var STA_hour = STD_Time.getHours();
							var class_cal_hour = '';
							// local_hour = local_current_date.getHours();
							if(STD_Time>2000){
								var class_cal_hour = class_top+(3*41);
								// var class_cal_hour = class_top;
							}else{
								var class_cal_hour = class_top;
							}
						@else
							var class_cal_hour = class_top;
						@endif

						html += '<div class="schedule_UTC_content" style="display: block;position: relative;top:'+class_cal_hour+'px;left:3px;">';

							// ###condition if flight_status is Delay Flight ###
							switch(flight_status_id) {

								//########## Cancelled Flight#############
								case 5:
									//######## default utc #########
									@if(isset($_REQUEST['default_utc']))
										// this formular happen when use get print schedule
										if(STD_Time>2000){
											var cal_distance = schedule_data.distance_utc-1050;
										}else{
											var cal_distance = schedule_data.distance_utc+(3*50);
										}
									@else
										var cal_distance = distance_utc;
									@endif

									// schedule_date.fsm_ATD ########
									if(schedule_data.flight_status_id!=flag_cancelled_flight){
										if(schedule_data.fsm_ATD!=null || schedule_data.fsm_ATA!=null){
											// this line grid time will appear when schedule is complete
											html += '<div style="margin-left:'+cal_distance+'px;">';
												html += '<div style="z-index:1;position:absolute;top:5px;background-color:{{FLIGHT_COLOR}};height:3px;width:'+etimate_time_utc+'px"></div>';
											html += '</div>';
										}
									}

									var color_transform = '';
									if(schedule_data.pm_color!=null){
										// color_transform = schedule_data.pm_color;
										color_transform = schedule_data.flight_status_color;
									}else{
										color_transform = schedule_data.flight_status_color;
									}
									//######## default utc #########
									@if(isset($_REQUEST['default_utc']))
										// this formular happen when use get print schedule
										if(STD_Time>2000){
											var cal_distance = schedule_data.distance_utc-1050;
										}else{
											var cal_distance = schedule_data.distance_utc+(3*50);
										}
									@else
										var cal_distance = schedule_data.distance_utc;
									@endif
									// check if it is flight cancel it will hide on schedule monitor only if value=1
									var is_flight_cancel = $("#is_flight_cancel").val();
									var aircraft_num = $("#aircraft_num").val();
									if(is_flight_cancel==1){
										// this flight will fail down if this flight is cancelled
										flight_cancel_down = aircraft_num*45;
										// Schedule Innner
										html += '<div class="schedule_inner" style="margin-left:'+cal_distance+'px;">'
											html += '<div style="position:absolute;padding-top:'+flight_cancel_down+'px;">';
												// Schedule Innner
												html  += '<div style="position:absolute;z-index:100;" class="checkflightSchedule" data-value='+schedule_data.fsm_id+'>';
													// html += '<input style="display:none;" type="checkbox" class="-hidden-lg" value="'+schedule_data.fsm_id+':'+schedule_data.schedule_date+':'+schedule_data.aircrafts_id+':'+schedule_data.origin_id+':'+schedule_data.destination_id+':'+schedule_data.fsm_STA+':'+schedule_data.fsm_STD+'" id="flight_schdule_check'+schedule_data.fsm_id+'" name="flight_schedule_mgr[]">';
													html += '<input style="display:none;" type="checkbox" class="-hidden-lg" value="'+schedule_data.fsm_id+'=>'+schedule_data.schedule_date+'=>'+schedule_data.aircrafts_id+'=>'+schedule_data.origin_id+'=>'+schedule_data.destination_id+'=>'+schedule_data.fsm_STA+'=>'+schedule_data.fsm_STD+'=>'+total_distance+'=>" id="flight_schdule_check'+schedule_data.fsm_id+'" name="flight_schedule_mgr[]">';
												html += '</div>';

												// group-flight
												html += '<div id="contextMenuOption" class="contextMenuOption group-flight" data-value="'+schedule_data.fsm_id+'" style="position:relative;bottom:-23px;font-size:10px;">';
													// block background
													html += '<a class="check_schedule" onClick="InitFlightPax_UTC('+schedule_data.fsm_id+')" href="javascript:void();">';
														// normal Flight
														html += '<label for="flight_schdule_check'+schedule_data.fsm_id+'" style="position:absolute;">';
															
															html += '<div class="initSwapAction flight-status-bg" style="position:absolute;background-color:'+color_transform+';height:15px;width:'+schedule_data.etimate_time_utc+'px;top:-15px;">';

																//######## Flight Nofication Piecse##########
																html += '<span style="top:0px;position: absolute;height: 15px;right: 0px;width:10px;background-color:'+schedule_data.fnotification_color+'"></span>';
																//######## Flight Nofication Piecse##########

																html += '<div class="clearfixed"></div>';
																// block-flight-no
																html +='<div class="block-flight-no">';
																	
																	// origin_block
																	html +='<div style="right:100%;position:absolute;">';
																		//sreyleak add
																		if(aircrafts_id!=bevious_aircraft) bevious_distance = 0
																			distance_between_utc = distance_utc  - bevious_distance;

																		if(distance_between_utc>(50*1.5)){                
																			html += schedule_data.origin_name;
																		}else{
																			// html += '&nbsp;';
																			html += schedule_data.origin_name;
																		}

																	//end
																	html += '</div>';

																	html +='<div style="right:100%;position:absolute;top:14px;">';
																		if(STD_minute==0){
																			html += '00';
																		}else if(STD_minute<=9){
																			html += '0'+STD_minute;
																		}else{
																			html += STD_minute;
																		}
																	html += '</div>';

																	// Flight Number
																	html += '<div style="position:absolute;margin:0 auto;left:0;right:0;">';
																		html += '<center>';
																			html += '<small style="color:#fff;cursor: pointer;font-size:10px !important">'+schedule_data.flight_number+'</small>';
																		html += '</center>';
																	html += '</div>';

																	bevious_distance = distance_utc + etimate_time_utc;
																	bevious_aircraft = aircrafts_id;
																	
																	// Duration Flight
																	html += '<div style="position:absolute;margin:0 auto;left:0;right:0;top:12px;">';
																		html += '<center style="margin-top:2px;">';
																			html += '<small style="background:yellow;cursor: pointer;font-size:10px !important">'+schedule_data.calculate_schedule_time+'</small>';
																		html += '</center>';
																	html += '</div>';

																	// flight_notification_status ##############
																	html += html_notificaton;
																	// block_right_click
																	html += html_right_click_status;
																	// #############END flight_notification_status  ######
																		// Destination Block
																		html +='<div style="left:100%;position:absolute;">'+schedule_data.destination_name+'</div>';
																	html +='<div style="left:100%;position:absolute;top:14px;">';
																		if(STA_minute==0){
																			html += '00';
																		}else if(STA_minute<=9){
																			html += '0'+STA_minute;
																		}else{
																			html += STA_minute;
																		}
																	html += '</div>';
																	// ###END condition if flight_status is Delay Flight ####
																html +='</div>';
																// END block-flight-no
															html += '</div>';
														html += '</label>';

													html += '</a>';
													// end block background
												html += '</div>';
											html += '</div>';
												// End group-flight
										html += '</div>';
									}
									// #End Schedule Inner
								break;

								//########## Deleted Flight###############
								case 6:
									//######## default utc #########
									@if(isset($_REQUEST['default_utc']))
										// this formular happen when use get print schedule
										if(STD_Time>2000){
											var cal_distance = schedule_data.distance_utc-1050;
										}else{
											var cal_distance = schedule_data.distance_utc+(3*50);
										}
									@else
										var cal_distance = distance_utc;
									@endif

									// schedule_date.fsm_ATD ########
									if(schedule_data.flight_status_id!=flag_cancelled_flight){
										if(schedule_data.fsm_ATD!=null || schedule_data.fsm_ATA!=null){
											// this line grid time will appear when schedule is complete
											html += '<div style="margin-left:'+cal_distance+'px;">';
												html += '<div style="z-index:1;position:absolute;top:5px;background-color:{{FLIGHT_COLOR}};height:3px;width:'+etimate_time_utc+'px"></div>';
											html += '</div>';
										}
									}

									// Schedule Innner
									html += '<div class="schedule_inner" style="display:none;margin-left:'+schedule_data.distance_utc+'px;">'
										// Schedule Innner
										html  += '<div style="position:absolute;z-index:100;" class="checkflightSchedule" data-value='+schedule_data.fsm_id+'>';
											html += '<input style="display:none;" type="checkbox" class="-hidden-lg" value="'+schedule_data.fsm_id+'=>'+schedule_data.schedule_date+'=>'+schedule_data.aircrafts_id+'=>'+schedule_data.origin_id+'=>'+schedule_data.destination_id+'=>'+schedule_data.fsm_STA+'=>'+schedule_data.fsm_STD+'=>'+total_distance+'=>" id="flight_schdule_check'+schedule_data.fsm_id+'" name="flight_schedule_mgr[]">';
										html += '</div>';

										// group-flight
										html += '<div id="contextMenuOption" class="contextMenuOption group-flight" data-value="'+schedule_data.fsm_id+'" style="position:relative;bottom:-23px;font-size:10px;">';
											// block background
											html += '<a onClick="InitFlightPax_UTC('+schedule_data.fsm_id+')" href="javascript:void();">';

												// normal Flight
												html += '<label for="flight_schdule_check'+schedule_data.fsm_id+'" style="position:absolute;">';
													
													html += '<div class="flight-status-bg" style="position:absolute;background-color:'+schedule_data.flight_status_color+';height:15px;width:'+schedule_data.etimate_time_utc+'px;top:-15px;">';

														//######## Flight Nofication Piecse##########
														html += '<span style="top:0px;position: absolute;height: 15px;right: 0px;width:10px;background-color:'+schedule_data.fnotification_color+'"></span>';
														//######## Flight Nofication Piecse##########

														html += '<div class="clearfixed"></div>';
														// block-flight-no
														html +='<div class="block-flight-no">';
															
															// origin_block
															html +='<div style="right:100%;position:absolute;">';
																//sreyleak add
																if(aircrafts_id!=bevious_aircraft) bevious_distance = 0
																	distance_between_utc = distance_utc  - bevious_distance;
																if(distance_between_utc>(50*1.5)){                
																	html += schedule_data.origin_name;
																}else{
																	html += '&nbsp;';
																}

															//end
															html += '</div>';

															html +='<div style="right:100%;position:absolute;top:14px;">';
																if(STD_minute==0){
																	html += '00';
																}else if(STD_minute<=9){
																	html += '0'+STD_minute;
																}else{
																	html += STD_minute;
																}
															html += '</div>';

															// Flight Number
															html += '<div style="position:absolute;margin:0 auto;left:0;right:0;">';
																html += '<center>';
																	html += '<small style="color:#fff;cursor: pointer;font-size:10px !important">'+schedule_data.flight_number+'</small>';
																html += '</center>';
															html += '</div>';

															bevious_distance = distance_utc + etimate_time_utc;
															bevious_aircraft = aircrafts_id;
															
															// Duration Flight
															html += '<div style="position:absolute;margin:0 auto;left:0;right:0;top:12px;">';
																html += '<center style="margin-top:2px;">';
																	html += '<small style="background:yellow;cursor: pointer;font-size:10px !important">'+schedule_data.calculate_schedule_time+'</small>';
																html += '</center>';
															html += '</div>';
															// flight_notification_status ##############
															html += html_notificaton;
															// block_right_click
															html += html_right_click_status;
																// #############END flight_notification_status  ######
																// Destination Block
																html +='<div style="left:100%;position:absolute;">'+schedule_data.destination_name+'</div>';
															 html +='<div style="left:100%;position:absolute;top:14px;">';
																
																if(STA_minute==0){
																	html += '00';
																}else if(STA_minute<=9){
																	html += '0'+STA_minute;
																}else{
																	html += STA_minute;
																}

															html += '</div>';
															// ###END condition if flight_status is Delay Flight ####
														html +='</div>';
														// END block-flight-no
													html += '</div>';
												html += '</label>';
											html += '</a>';
											// end block background
										html += '</div>';
										// End group-flight
									html += '</div>'; 
									// #End Schedule Inner
								break;

								//########## Deleted Flight###############
								default:

									@if(isset($_REQUEST['default_utc']))
										// this formular happen when use get print schedule
										if(STD_Time>2000){f
											var cal_distance = schedule_data.distance_utc-1050;
										}else{
											var cal_distance = schedule_data.distance_utc+(3*50);
										}
									@else
										// cal_distance
										var cal_distance = distance_utc;
									@endif

									// schedule_date.fsm_ATD ########
									if(schedule_data.flight_status_id!=flag_cancelled_flight){
										if(schedule_data.fsm_ATD!=null || schedule_data.fsm_ATA!=null){
											// this line grid time will appear when schedule is complete
											html += '<div style="margin-left:'+cal_distance+'px;">';
												html += '<div style="z-index:1;position:absolute;top:5px;background-color:{{FLIGHT_COLOR}};height:3px;width:'+etimate_time_utc+'px"></div>';
											html += '</div>';
										}
									}
									
								 	// $_REQUEST['default_utc']
									@if(isset($_REQUEST['default_utc']))
										// this formular happen when use get print schedule
										if(STD_Time>2000){
											var cal_distance = schedule_data.distance_utc-1050;
										}else{
											var cal_distance = schedule_data.distance_utc+(3*50);
										}
										html += '<div class="schedule_inner" style="margin-left:'+
											cal_distance+'px;">';
									@else
										var cal_distance = schedule_data.distance_utc;
										html += '<div class="schedule_inner" style="margin-left:'+schedule_data.distance_utc+'px;">';
									@endif

										// Schedule Innner
										html  += '<div style="position:absolute;z-index:100;" class="checkflightSchedule" data-value='+schedule_data.fsm_id+'>';
											html += '<input style="display:none;" type="checkbox" class="-hidden-lg" value="'+schedule_data.fsm_id+'=>'+schedule_data.schedule_date+'=>'+schedule_data.aircrafts_id+'=>'+schedule_data.origin_id+'=>'+schedule_data.destination_id+'=>'+schedule_data.fsm_STA+'=>'+schedule_data.fsm_STD+'=>'+total_distance+'=>" id="flight_schdule_check'+schedule_data.fsm_id+'" name="flight_schedule_mgr[]">';
										html += '</div>';

										// color_transform
										var color_transform = '';
										// Check date if not yet update status
										start = new Date(schedule_data.schedule_date);
										current_date = new Date();
										var actual_time_atd = schedule_data.fsm_ATD;
										var flight_status_bg = '';
										if(schedule_data.schedule_date<capture_current_date && actual_time_atd==null){
											if(schedule_data.is_approve>0){
												if(schedule_data.ATA == null && schedule_data.ATD == null){
													// color_transform = schedule_data.update_status_color;
													color_transform = color_not_update;
												}else if(schedule_data.pm_color!=0){
													color_transform = schedule_data.pm_color;
												}else{
													if(schedule_data.flight_status_id>1){
														color_transform = schedule_data.flight_status_color;
														flight_status_bg = 'flight-status-bg';
													}else{
														color_transform = schedule_data.update_status_color;
													}
												}
											}else{
												// color-not-approve
												color_transform = color_not_apporve;
											}

										}else if(schedule_data.schedule_date==capture_current_date){

											var compare_time_cur = schedule_data.fsm_STD;
											var length = 2;
											var trimmedString = compare_time_cur.substring(0, length);
											// alert(trimmedString)
											// local_hour = local_current_date.getHours();
											var t = (parseInt(local_hour))+'.'+local_minute;
											var std_t = STD_hour+'.'+STD_minute;
											// alert(STD_hour);
											// if((parseInt(std_t)-7) > 2){alert(STD_hour);}
											if((parseInt(local_hour)-7) < std_t){
												// alert("testing");

												if(schedule_data.flight_status_id>1){
													color_transform = schedule_data.flight_status_color;
													flight_status_bg = 'flight-status-bg';
												}else{
													color_transform = schedule_data.update_status_color;
												}
												

												// if(local_hour>STD_hour){
													// color_transform = schedule_data.update_status_color;
													// color_transform = schedule_data.flight_status_color;
													// flight_status_bg = 'flight-status-bg';
												// }else{
													// if(actual_time_atd!=null){
													// 	color_transform = schedule_data.update_status_color;
													// }else{
													// 	color_transform = color_not_update;
													// }
												// }

											}else{
												color_transform = color_not_update;
											}

										}else{
											if(schedule_data.is_approve>0){
												if(schedule_data.pax_movement_id>0){
													color_transform = schedule_data.pm_color;
												}else{
													if(schedule_data.flight_status_id>1){
														color_transform = schedule_data.flight_status_color;
														flight_status_bg = 'flight-status-bg';
													}else{
														color_transform = schedule_data.update_status_color;
													}
													// color_transform = schedule_data.update_status_color;
												}
											}else{
												// color-not-approve
												color_transform = color_not_apporve;
											}
										}

										// group-flight
										html += '<div id="-contextMenuOption" class="-contextMenuOption group-flight" data-value="'+schedule_data.fsm_id+'" style="position:relative;bottom:-23px;font-size:10px;">';
											// block background
											html += '<a class="check_schedule" onClick="InitFlightPax_UTC('+schedule_data.fsm_id+')" href="javascript:void();">';
												// normal Flight
												html += '<label for="flight_schdule_check'+schedule_data.fsm_id+'" style="position:absolute;">';

													// initSwapAction
													html += '<div class="'+flight_status_bg+' initSwapAction" data-value="'+schedule_data.fsm_id+'" style="position:absolute;background-color:'+color_transform+';height:15px;width:'+schedule_data.etimate_time_utc+'px;top:-15px;">';

														//######## Flight Nofication Piecse##########
														html += '<lable>';
															html += '<span style="top:0px;position: absolute;height: 15px;right: 0px;width:10px;background-color:'+schedule_data.fnotification_color+'"></span>';
														html += '</label>';
														//######## Flight Nofication Piecse###########
														html += '<div class="clearfixed"></div>';
														// block-flight-no
														html +='<div class="block-flight-no">';
															// origin_block
															html +='<div style="right:100%;position:absolute;">';
																//sreyleak add
																if(aircrafts_id!=bevious_aircraft) bevious_distance = 0
																	distance_between_utc = distance_utc  - bevious_distance;
																if(distance_between_utc>(50*1.5)){                
																	html += schedule_data.origin_name;
																}else{
																	html += '&nbsp;';
																}
															html += '</div>';
															//end

															html +='<div style="right:100%;position:absolute;top:14px;">';
																if(STD_minute==0){
																	html += '00';
																}else if(STD_minute<=9){
																	html += '0'+STD_minute;
																}else{
																	html += STD_minute;
																}
															html += '</div>';

															// Flight Number
															html += '<div style="position:absolute;margin:0 auto;left:0;right:0;">';
																html += '<center>';
																	html += '<small style="color:#fff;cursor: pointer;font-size:10px !important">'+schedule_data.flight_number+'</small>';
																html += '</center>';
															html += '</div>';

															bevious_distance = distance_utc + etimate_time_utc;
															bevious_aircraft = aircrafts_id;

															// *******************Duration Flight
															html += '<div style="position:absolute;margin:0 auto;left:0;right:0;top:12px;">';
																html += '<center style="margin-top:3px;">';
																	html += '<small style="background:yellow;cursor: pointer;font-size:10px !important">'+schedule_data.calculate_schedule_time+'</small>';
																html += '</center>';
															html += '</div>';

															// ********************start popup part
															
															var fsm_id = schedule_data.fsm_id;
															var schedule_date = schedule_data.schedule_date;
															var aircraft_name = schedule_data.aircraft_name;
															var flight_status_id = schedule_data.flight_status_id;
															var origin_name = schedule_data.origin_name;
															var destination_name = schedule_data.destination_name;
															var origin_id = schedule_data.origin_id;
															var destination_id = schedule_data.destination_id;
															var aircraft_id = schedule_data.aircrafts_id;
															var fsm_STA = schedule_data.fsm_STA;
															var fsm_STD = schedule_data.fsm_STD;
															var fsm_ATA = schedule_data.fsm_ATA;
															var fsm_ATD = schedule_data.fsm_ATD;

															var fsm_flight_group = schedule_data.fsm_flight_group;
															var created_by_user = schedule_data.created_by_user;
															var fs_created_date = schedule_data.fs_created_date;
															var crews_arr = schedule_data.crews_arr;
															var BTOFF = schedule_data.BT_OFF;
															var BTON = schedule_data.BT_ON;
															var adult = schedule_data.adult;
															var child = schedule_data.child;
															var enfant = schedule_data.enfant;
															var first_class = schedule_data.first_class;
															var business_class = schedule_data.business_class;
															var economic_class = schedule_data.economic_class;
															var cargo = schedule_data.cargo;
															var block_fuel = schedule_data.block_fuel;
															var used_fuel = schedule_data.used_fuel;
															var fsm_remark = schedule_data.fsm_remark;
															var flight_number = schedule_data.flight_number;
															var distance = schedule_data.distance;
															var pax_movement_id = schedule_data.pax_movement_id;
															var flight_schedule_id = schedule_data.flight_schedule_id;
															var fnotification_status = schedule_data.fsm_fnotification_status_id;
															var write_permission_sm = schedule_data.write_permission_sm;	

															// if Swap Action !=0
															if(swap_action!=0){
																if(write_permission_sm==1){
																	html += $.getLayoutFlightPopupTop(schedule_data.fsm_id);
																	// ******* Flight Update
																	html += $.getLayoutPopupTabUpdateFlight(fsm_id,pax_movement_id,origin_id,origin_name,destination_id,destination_name,aircraft_name,fsm_STD,fsm_STA,fsm_ATD,fsm_ATA,fsm_flight_group,created_by_user,fs_created_date,crews_arr,BTOFF,BTON,adult,child,enfant,first_class,business_class,economic_class,cargo,block_fuel,used_fuel,distance,fsm_remark,total_distance,schedule_date,aircraft_id,capture_current_date,local_hour,STD_hour,STD_minute,fnotification_status,flight_number);

																	// ******* Flight Divert
																	var STD_DIVERT = schedule_data['flight_divert_arr']['STD'];
																	var STA_DIVERT = schedule_data['flight_divert_arr']['STA'];
																	var flight_status_id_DIVERT = schedule_data['flight_divert_arr']['flight_status_id'];
																	var remark_DIVERT = schedule_data['flight_divert_arr']['remark'];
																	var modified_by_DIVERT = schedule_data['flight_divert_arr']['modified_by'];
																	var modified_date_DIVERT = schedule_data['flight_divert_arr']['modified_date'];

																	var new_STD_DIVERT = Date.parse(fsm_STD);
																	var STD_hour_DIVERT = new_STD_DIVERT.getHours();

																	html += $.getLayoutPopupTabDivertFlight(fsm_id,origin_id,origin_name,destination_id,destination_name,STD_DIVERT,STA_DIVERT,fsm_STD,fsm_STA,remark_DIVERT,flag_diverted_flight,total_distance,schedule_date,flight_status_id_DIVERT,local_hour,STD_hour_DIVERT,aircraft_id,modified_by_DIVERT,modified_date_DIVERT,capture_current_date,aircraft_name,flight_schedule_id,flight_number,fsm_flight_group);

																	// ******* Flight Delay
																	var STD_DELAY = schedule_data['flight_delay_arr']['STD'];
																	var STA_DELAY = schedule_data['flight_delay_arr']['STA'];
																	var flight_status_id_DELAY = schedule_data['flight_delay_arr']['flight_status_id'];
																	var remark_DELAY = schedule_data['flight_delay_arr']['remark'];
																	var modified_by_DELAY = schedule_data['flight_delay_arr']['modified_by'];
																	var modified_date_DELAY = schedule_data['flight_delay_arr']['modified_date'];

																	var new_STD_DELAY = Date.parse(fsm_STD);
																	var STD_hour_DELAY = new_STD_DELAY.getHours();

																	html += $.getLayoutPopupTabDelayFlight(fsm_id,origin_id,origin_name,destination_id,destination_name,STD_DELAY,STA_DELAY,fsm_STD,fsm_STA,remark_DELAY,flag_delay_flight,total_distance,schedule_date,flight_status_id_DELAY,local_hour,STD_hour_DELAY,aircraft_id,modified_by_DELAY,modified_date_DELAY,capture_current_date,flight_number);

																	// ******* Flight Reschedules
																	var STD_RESCHEDULE = schedule_data['flight_reschedule_arr']['STD'];
																	var STA_RESCHEDULE = schedule_data['flight_reschedule_arr']['STA'];
																	var flight_status_id_RESCHEDULE = schedule_data['flight_reschedule_arr']['flight_status_id'];
																	var remark_RESCHEDULE = schedule_data['flight_reschedule_arr']['remark'];
																	var modified_by_RESCHEDULE = schedule_data['flight_reschedule_arr']['modified_by'];
																	var modified_date_RESCHEDULE = schedule_data['flight_reschedule_arr']['modified_date'];

																	var new_STD_RESCHEDULE = Date.parse(fsm_STD);
																	var STD_hour_RESCHEDULE = new_STD_RESCHEDULE.getHours();
																	
																	// getLayoutPopupTabRescheduleFlight
																	html += $.getLayoutPopupTabRescheduleFlight(fsm_id,origin_id,origin_name,destination_id,destination_name,STD_RESCHEDULE,STA_RESCHEDULE,fsm_STD,fsm_STA,remark_RESCHEDULE,flag_reschedule_flight,total_distance,schedule_date,flight_status_id_RESCHEDULE,local_hour,STD_hour_RESCHEDULE,aircraft_id,modified_by_RESCHEDULE,modified_date_RESCHEDULE,capture_current_date,flight_number);

																	// ******* Flight Retime
																	var STD_RETIME = schedule_data['flight_retime_arr']['STD'];
																	var STA_RETIME = schedule_data['flight_retime_arr']['STA'];
																	var flight_status_id_RETIME = schedule_data['flight_retime_arr']['flight_status_id'];
																	var remark_RETIME = schedule_data['flight_retime_arr']['remark'];
																	var modified_by_RETIME = schedule_data['flight_retime_arr']['modified_by'];
																	var modified_date_RETIME = schedule_data['flight_retime_arr']['modified_date'];

																	var new_STD_RETIME = Date.parse(fsm_STD);
																	var STD_hour_RETIME = new_STD_RETIME.getHours();

																	html += $.getLayoutPopupTabRetimeFlight(fsm_id,origin_id,origin_name,destination_id,destination_name,STD_RETIME,STA_RETIME,fsm_STD,fsm_STA,remark_RETIME,flag_retime_flight,total_distance,schedule_date,flight_status_id_RETIME,local_hour,STD_hour_RETIME,aircraft_id,modified_by_RETIME,modified_date_RETIME,capture_current_date,flight_number);

																	// ******* Flight Cancel
																	var STD_CANCEL = schedule_data['flight_retime_arr']['STD'];
																	var STA_CANCEL = schedule_data['flight_retime_arr']['STA'];
																	var flight_status_id_CANCEL = schedule_data['flight_retime_arr']['flight_status_id'];
																	var remark_CANCEL = schedule_data['flight_retime_arr']['remark'];
																	var modified_by_CANCEL = schedule_data['flight_retime_arr']['modified_by'];
																	var modified_date_CANCEL = schedule_data['flight_retime_arr']['modified_date'];

																	var new_STD_CANCEL = Date.parse(fsm_STD);
																	var STD_hour_CANCEL = new_STD_CANCEL.getHours();

																	html += $.getLayoutPopupTabCancelFlight(fsm_id,origin_id,origin_name,destination_id,destination_name,STD_CANCEL,STA_CANCEL,fsm_STD,fsm_STA,remark_CANCEL,flag_cancelled_flight,total_distance,schedule_date,flight_status_id_CANCEL,local_hour,STD_hour_CANCEL,aircraft_id,modified_by_CANCEL,modified_date_CANCEL,capture_current_date,aircraft_name,pax_movement_id,fsm_flight_group,flight_number);

																	// ******* Flight Delete
																	var STD_DELETE = schedule_data['flight_retime_arr']['STD'];
																	var STA_DELETE = schedule_data['flight_retime_arr']['STA'];
																	var flight_status_id_DELETE = schedule_data['flight_retime_arr']['flight_status_id'];
																	var remark_DELETE = schedule_data['flight_retime_arr']['remark'];
																	var modified_by_DELETE = schedule_data['flight_retime_arr']['modified_by'];
																	var modified_date_DELETE = schedule_data['flight_retime_arr']['modified_date'];

																	var new_STD_DELETE = Date.parse(fsm_STD);
																	var STD_hour_DELETE = new_STD_DELETE.getHours();

																	html += $.getLayoutPopupTabDeleteFlight(fsm_id,origin_id,origin_name,destination_id,destination_name,STD_DELETE,STA_DELETE,fsm_STD,fsm_STA,remark_DELETE,flag_deleted_flight,total_distance,schedule_date,flight_status_id_DELETE,local_hour,STD_hour_DELETE,aircraft_id,modified_by_DELETE,modified_date_DELETE,capture_current_date,aircraft_name,flight_number);

																	// #####******* END Block Flight Status*****########
																	// getLayoutFlightPopupBottom
																	html += $.getLayoutFlightPopupBottom();
																	// ************end popup part***********
																}
																// block_right_click
																html += html_right_click_status;
															}

															// #############END flight_notification_status  ######
																// Destination Block
																html +='<div style="left:100%;position:absolute;">'+schedule_data.destination_name+'</div>';
															html +='<div style="left:100%;position:absolute;top:14px;">';
																if(STA_minute==0){
																	html += '00';
																}else if(STA_minute<=9){
																	html += '0'+STA_minute;
																}else{
																	html += STA_minute;
																}
																
															html += '</div>';
															// ###END condition if flight_status is Delay Flight ####
														html +='</div>';
														// END block-flight-no
													html += '</div>';
												html += '</label>';
											// html += '<input style="display:none;" class="ids" value="'+schedule_data.fsm_id+'" id="flight_schedule_check'+schedule_data.fsm_id+'" type="checkbox" name="flight_schedule_mgr[]" />';
											html += '</a>';
											// end block background
										html += '</div>';
										// End group-flight

									html += '</div>';
									// #End Schedule Inner
								break
								// default code block

							}
							html += '<div class="clearfix"></div>';

						html += '</div>';
						// #END block UTC FLIGHT
					}
				});
				// ##########END Maintenance Flight
			});

			$.eventallData();

			return html;
		}

			// RightClickNotification
			$.RightClickNotification = function(fsm_id,flight_status_id,schedule_date,total_distance){
				var html_right_click_status='';
				//######## block_change_notification ##########
				html_right_click_status += '<div style="position:absolute;margin:0 auto;left:0;right:0;top:15px;font-size:25px;z-index:100;">';
					html_right_click_status += '<center>';
						// arrow-caret-up
						html_right_click_status += '<a href="javascript:void();" id="arrow-up-right-click'+fsm_id+'" style="display:none;"><i class="fa fa-caret-up"></i></a>';
					html_right_click_status += '</center>';

						// Flight Information Status ############
						// ##########Flight Status Information ##############
						html_right_click_status += '<div style="position:absolute;margin:0 auto;left:0;right:0;top:0px;font-size:15px;margin:0 auto;">';
							html_right_click_status += '<div class="flight_information_right_click" id="flight_pax_main_UTC_right_click'+fsm_id+'" style="display:none;">';
								// #################flight_pax
								html_right_click_status += '<div class="flight_pax_right_click">';
									// flight_pax_content
									html_right_click_status += '<div class="flight_pax_content_right_click">';
										html_right_click_status +='<a onClick="InitCloseRightClick('+fsm_id+')" href="javascript:void();" class="btn-close-schedule btn btn-danger btn-xs"><i class="fa fa-wa fa-remove"></i></a>';
										html_right_click_status +='<div class="col-sm-12">';
											html_right_click_status += '<div class="row">'; 
												html_right_click_status += '<div class="x_content">';
												html_right_click_status += '<div class="" role="tabpanel" data-example-id="togglable-tabs">';
													// html_right_click_status += 'Choose Aircraft';
													html_right_click_status += '<div class="col-sm-6" style="padding:4px;font-size:13px;">';
														html_right_click_status += '<a class="btn btn-xs btn-primary" onClick="initChangeAircraft('+fsm_id+',0,'+total_distance+',\''+schedule_date+'\');" href="javascript:void();"><i class="fa fa-wa fa-plane"></i> {!!trans("flightschedule/schedulemonitor.change_aircrafts")!!}</a>';
													html_right_click_status += '</div>';

													if(flight_status_id==5){
														html_right_click_status += '<div class="col-sm-6" style="padding:4px;font-size:13px;">';
															html_right_click_status += '<a class="btn btn-xs btn-success" onClick="initReActiveStatus('+fsm_id+','+flight_status_id+','+total_distance+',\''+schedule_date+'\');" href="javascript:void();"><i class="fa fa-wa fa-check"></i> {!!trans("flightschedule/schedulemonitor.reinstate_flight")!!}</a>';
														html_right_click_status += '</div>';
													}

													// html_right_click_status += 'Choose Aircraft';
												html_right_click_status += '</div>';
												html_right_click_status += '</div>';
											html_right_click_status += '</div>';
										html_right_click_status += '</div>';
										html_right_click_status += '<div class="clearfix"></div>';
									html_right_click_status += '</div>';
									// ############## END flight_pax_content ######
								html_right_click_status += '</div>';
								// ############END flight pax ########
							html_right_click_status += '</div>';
							// html_right_click_status += '</center>';
							html_right_click_status += '<div class="clearfixed"></div>';
						html_right_click_status += '</div>';
						// ######## End Flight Status Information #################
						// #END Flight Information Status
				html_right_click_status += '</div>';
				return html_right_click_status;
			}

			// *************start part popup top
			// LeftClickNotification
			$.getLayoutFlightPopupTop = function(fsm_id){
				// ############################@@@@@@#########################
				var html_notificaton = '';
				// Block Flight Notification
				html_notificaton += '<div style="position:absolute;margin:0 auto;left:0;right:0;top:15px;font-size:25px;z-index:100;">';
					html_notificaton += '<center>';
						// arrow-caret-up
						html_notificaton += '<a href="javascript:void();" id="arrow-up'+fsm_id+'" style="display:none;"><i class="fa fa-caret-up"></i></a>';
					html_notificaton += '</center>';
					// Flight Information Status ############
					// ##########Flight Status Information ##############
					html_notificaton += '<div style="position:absolute;margin:0 auto;left:0;right:0;top:0px;font-size:15px;margin:0 auto;">';
						// html_notificaton += '<center>';
						html_notificaton += '<div class="flight_information" id="flight_pax_main_UTC'+fsm_id+'">';
							// #################flight_pax
							html_notificaton += '<div class="flight_pax">';
								// flight_pax_content
								html_notificaton += '<div class="flight_pax_content">';
									html_notificaton +='<a onClick="InitFlightPax_UTC('+fsm_id+')" href="javascript:void();" class="btn-close-schedule btn btn-danger btn-sm"><i class="fa fa-wa fa-remove"></i></a>';
									html_notificaton +='<div class="col-sm-12">';
										html_notificaton += '<div class="row">'; 
											html_notificaton += '<div class="x_content">';
											html_notificaton += '<div class="" role="tabpanel" data-example-id="togglable-tabs">';
											html_notificaton += '<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">';
												// $.each(schedule_data['FlightStatus_arr'], function(schedule_name, status_value){
												html_notificaton += '<li role="presentation" class="active"><a href="#tab_flight'+fsm_id+'" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">{!!trans("flightschedule/schedulemonitor.flight")!!}</a></li>';
												
												html_notificaton += '<li role="presentation" class=""><a href="#tab_diverted_flight'+fsm_id+'" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">{!!trans("flightschedule/schedulemonitor.diverted_flight")!!}</a></li>';

												html_notificaton += '<li role="presentation" class=""><a href="#tab_cancel_flight'+fsm_id+'" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">{!!trans("flightschedule/schedulemonitor.canceled_flight")!!}</a></li>';
												
												html_notificaton += '<li role="presentation" class=""><a href="#tab_deleted_flight'+fsm_id+'" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">{!!trans("flightschedule/schedulemonitor.deleted_flight")!!}</a></li>';
												

												html_notificaton += '<li role="presentation" class=""><a href="#tab_retime_flight'+fsm_id+'" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">{!!trans("flightschedule/schedulemonitor.retime_flight")!!}</a></li>';
												// tab Reschedules
												html_notificaton += '<li role="presentation" class=""><a href="#tab_reschedule_flight'+fsm_id+'" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">{!!trans("flightschedule/schedulemonitor.reschedule")!!}</a></li>';

												html_notificaton += '<li role="presentation" class=""><a href="#tab_delay_flight'+fsm_id+'" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">{!!trans("flightschedule/schedulemonitor.delay_flight")!!}</a></li>';

											html_notificaton += '</ul>';

											html_notificaton += '<div id="myTabContent" class="tab-content">';

												// *************************************
												
												// contain body
												// *************************************

				// *************************************                  
				// $.getLayoutFlightPopupBottom here  ###########
				// *************************************

				// ###############END ###################
				return html_notificaton;
			}

			//getLayoutPopupTabUpdateFlight
			$.getLayoutPopupTabUpdateFlight = function(fsm_id,pax_movement_id,origin_id,origin_name,destination_id,destination_name,aircraft_name,fsm_STD,fsm_STA,fsm_ATD,fsm_ATA,fsm_flight_group,created_by_user,fs_created_date,crews_arr,BTOFF,BTON,adult,child,enfant,first_class,business_class,economic_class,cargo,block_fuel,used_fuel,distance,fsm_remark,total_distance,schedule_date,aircraft_id,capture_current_date,local_hour,STD_hour,STD_minute,fnotification_status,flight_number){

				var disable_action='';
				// ****disable action in input text this action occor when the flight is not ontime***//
				// var t = (parseInt(local_hour))+'.'+local_minute;
				var std_t = STD_hour+'.'+STD_minute;
				// alert(std_t);
				// alert(STD_hour);
				// if((parseInt(std_t)-7) > 2){alert(STD_hour);}
					
				if(schedule_date>=capture_current_date){
					if((parseInt(local_hour)-7) <= std_t){
					// if(local_hour<=STD_hour){
						// button save change
						disable_action = 'disabled="disabled"';
					}else{
						if(schedule_date>capture_current_date){
							// button save change
							disable_action = 'disabled="disabled"';
						}else{
							// button save change
							disable_action = '';
						}
					}
				}else{
					// button save change
					disable_action = '';
				}

				var html_notificaton='';
				var html_notificaton_str='';
				html_notificaton_str += '<div class="col-sm-12" style="padding-top:10px;"><button type="button" data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" onClick="disableAction();" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button></div>';
				// ***********************************
				// TAB FLIGHT #################
				html_notificaton += '<div role="tabpanel" class="tab-pane fade active in" id="tab_flight'+fsm_id+'" aria-labelledby="home-tab">';
					html_notificaton += '<p>';
						// Flight Information
						html_notificaton += '<div class="container">';
							// col-sm-5 #############
							html_notificaton += '<span class="col-sm-5">';
								// devide-line
								html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-info-circle color-parent"></i> {!!trans("flightschedule/schedulemonitor.flight_information")!!}</div>';

								html_notificaton += '<div style="line-height:35px;">';
								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-info-circle color-parent"></i></i>  {!!trans("flightschedule/schedulemonitor.route_info")!!} : </label>';

									html_notificaton += '<label class="col-sm-6">'+origin_name+' - '+destination_name+'</label>';

								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-pencil-square-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.aircraft_registration")!!} : </label>';

								html_notificaton += '<label class="col-sm-6">'+aircraft_name+'</label>';

								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.std")!!} : </label>';
									
									html_notificaton += '<label class="col-sm-6">';
										html_notificaton += SlitTime(fsm_STD);
									html_notificaton += '</label>';
								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.sta")!!} : </label>';
								html_notificaton += '<label class="col-sm-6">';
									html_notificaton += SlitTime(fsm_STA);
								html_notificaton += '</label>';
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-user color-parent"></i> {!!trans("flightschedule/schedulemonitor.created_by")!!} : </label>';
								html_notificaton += '<label class="col-sm-6">'+created_by_user+'</label>';

								html_notificaton += '<label class="col-sm-6"><i class="fa fa-calendar color-parent"></i> {!!trans("flightschedule/schedulemonitor.created_date")!!} : </label>';
								html_notificaton += '<label class="col-sm-6">'+fs_created_date+'</label>';

								html_notificaton += '<label class="col-sm-6"><i class="fa fa-calendar color-parent"></i> {!!trans("flightschedule/schedulemonitor.modified_date")!!} : </label>';
								html_notificaton += '<label class="col-sm-6">'+fs_created_date+'</label>';
								html_notificaton += '</div>';

								// col-sm-12
								html_notificaton += '<div class="col-sm-12" style="margin-top:20px;">';
									html_notificaton += '<div class="row">';
										html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-users color-parent"></i> {!!trans("flightschedule/schedulemonitor.crews_information")!!}</div>';
										// loop crew
										if(crews_arr==''){
											html_notificaton += '<center>{!!trans("flightschedule/schedulemonitor.there_is_no_crews_information")!!}</center>';
										}else{
											$.each(crews_arr,function(index,crew){
												html_notificaton += '<label class="col-sm-5">'+crew['occupation_name']+' : </label>';
												html_notificaton += '<label class="col-sm-7">'+crew['crew_name']+'</label>';
											});
										}
									html_notificaton +='</div>';
								html_notificaton += '</div>';
							html_notificaton += '</span>';

							// col-sm-7 #############
							html_notificaton += '<span class="col-sm-7">';
								html_notificaton += '<div class="col-sm-12 devide-line"><i class="fa fa-wa fa-pencil-square-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.update_flight_information")!!}</div>';
								// Flight Status Schedules
								html_notificaton += '<div id="flight_status">';
									html_notificaton += '<form style="font-size:13px;" class="form-horizontal form-label-left">';
										// row
										html_notificaton += '<div class="row">';
											//#######Block Pax Adule Info ########
											html_notificaton += '<div class="group-whole col-sm-4">';
												// group_block_off
												html_notificaton += '<div class="group_block_off'+fsm_id+'">';
													html_notificaton += '<div class="form-group">';
														// Block Off
														html_notificaton += '<label class="control-label col-sm-5" for="">{!!trans("flightschedule/schedulemonitor.block_off")!!} </label>';

															html_notificaton += '<div class="col-sm-7">';

																if(BTOFF==null){
																	var BT_OFF = '';
																}else{
																	var BT_OFF = SlitTime(BTOFF);
																}

																html_notificaton += '<input '+disable_action+' maxlength="4" value="'+BT_OFF+'" placeholder="{!!trans("flightschedule/schedulemonitor.block_off")!!}" data-parsley-id="0098" name="block_off'+fsm_id+'" id="block_off'+fsm_id+'" class="form-control col-md-12" type="text">';
														html_notificaton += '</div>';
													html_notificaton += '</div>';
												html_notificaton += '</div>';

												// group_atd_
												html_notificaton += '<div class="group_atd_'+fsm_id+'"">';
													html_notificaton += '<div class="form-group">';
														// label data
														html_notificaton += '<label class="control-label col-sm-5" for="">{!!trans("flightschedule/schedulemonitor.atd")!!} <span class="validate_label_red">*</span></label>';
															html_notificaton += '<div class="col-sm-7 col-xs-12">';
															
															var actual_time_atd='';
															var actual_time_ata='';
															var fsm_flight_group_data='';

															
															if(fsm_ATD!=null){
																var actual_time_atd = SlitTime(fsm_ATD);
															}else{
																var actual_time_atd = '';
															}

															if(fsm_ATA!=null){
																var actual_time_ata = SlitTime(fsm_ATA);
															}else{
																var actual_time_ata = '';
															}
															
															if(fsm_flight_group!=null){
																fsm_flight_group_data += fsm_flight_group;
															}

															html_notificaton += '<input '+disable_action+' placeholder="ATD" data-parsley-id="0098" name="fsm_atd'+fsm_id+'" id="fsm_atd'+fsm_id+'" maxlength="4" value="'+actual_time_atd+'" required="required" class="form-control col-md-12 col-xs-12" type="text"></div>';

													html_notificaton += '</div>';
												html_notificaton += '</div>';
												// end form group

												// group_ata_
												html_notificaton += '<div class="group_ata_'+fsm_id+'"">'; 
													html_notificaton += '<div class="form-group">';
														html_notificaton += '<label class="control-label col-sm-5 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.ata")!!}</label>';
														html_notificaton += '<div class="col-md-7 col-sm-7 col-xs-12"><input placeholder="ATA" '+disable_action+' maxlength="4" data-parsley-id="0098" name="fsm_ata'+fsm_id+'" id="fsm_ata'+fsm_id+'" value="'+actual_time_ata+'" class="form-control col-md-12 col-xs-12" type="text">';
														html_notificaton += '</div>';
													html_notificaton+='</div>';
												html_notificaton += '</div>';
												// #END form group 

												// group_block_on
												html_notificaton += '<div class="form-group">';
													html_notificaton += '<div class="group_block_on'+fsm_id+'">';
														html_notificaton += '<label class="control-label col-md-5 col-sm-5 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.block_on")!!} </label>';
															html_notificaton += '<div class="col-md-7 col-sm-7 col-xs-12">';

																if(BTON==null){
																	var BT_ON = '';
																}else{
																	var BT_ON = SlitTime(BTON);
																}

																html_notificaton += '<input '+disable_action+' value="'+BT_ON+'" maxlength="4" placeholder="{!!trans("flightschedule/schedulemonitor.block_on")!!}" data-parsley-id="0098" name="block_on'+fsm_id+'" id="block_on'+fsm_id+'" class="form-control col-md-7 col-xs-12" type="text">';
														html_notificaton += '</div>';
													html_notificaton += '</div>';
												html_notificaton += '</div>';

												// group_block_time
												html_notificaton += '<div class="form-group">';
													html_notificaton += '<div class="group_block_time'+fsm_id+'">';
														html_notificaton += '<label class="control-label col-md-5 col-sm-5 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.block_time")!!} </label>';
															html_notificaton += '<div class="col-md-7 col-sm-7 col-xs-12">';

																var BLTime = '';													
																if(BTON==null && BTOFF==null){
																	total_block_time = '0000';
																}
																if(BTON!=null || BTOFF==null){
																	total_block_time = '0000';
																}
																if(BTON!=null || BTOFF!=null){
																	total_block_time = CalculateTime(BTOFF,BTON)
																}

															html_notificaton += '<button type="button" class="btn btn-success btn-xs">'+total_block_time+'</button>';
														html_notificaton += '</div>';
													html_notificaton += '</div>';
													html_notificaton += '</div>';	

													var total_flight_time = '';

													if(fsm_ATD==null){
														total_flight_time = '0000';
													}else if(fsm_ATA==null){
														total_flight_time = '0000';
													}else if(fsm_ATD!=null && fsm_ATA!=null){
														total_flight_time = CalculateTime(fsm_ATD,fsm_ATA);
													}

												// group_flight_time
												html_notificaton += '<div class="form-group">';
													html_notificaton += '<div class="group_flight_time'+fsm_id+'">';
														html_notificaton += '<label class="control-label col-md-5 col-sm-5 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.flight_time")!!} </label>';
															html_notificaton += '<div class="col-md-7 col-sm-7 col-xs-12">';
																html_notificaton += '<button type="button" class="btn btn-success btn-xs">';
																	html_notificaton += total_flight_time;
																html_notificaton += '</button>';
														html_notificaton += '</div>';
													html_notificaton += '</div>';
												html_notificaton += '</div>';

											html_notificaton += '</div>';
											// #END GROUP Whole ###########

											//#######Block Pax Adule Info ########
											html_notificaton += '<div class="group-whole col-sm-3">';

												// Adult Group
												html_notificaton += '<div class="form-group">';
													html_notificaton += '<div class="group_adult'+fsm_id+'">';
														html_notificaton += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.text_adult")!!} </label>';
															html_notificaton += '<div class="col-md-9 col-sm-9 col-xs-12">';
																if(adult==null){
																	var adult = '';
																}else{
																	var adult = adult;
																}
																html_notificaton += '<input '+disable_action+' value="'+adult+'" placeholder="{!!trans("flightschedule/schedulemonitor.text_adult")!!}" data-parsley-id="0098" name="adult'+fsm_id+'" id="adult'+fsm_id+'" class="form-control col-md-7 col-xs-12" type="text">';
														html_notificaton += '</div>';
													html_notificaton += '</div>';
												html_notificaton += '</div>';
												// #End form-group

												// Group Child
												html_notificaton += '<div class="form-group">';
													html_notificaton += '<div class="group_child'+fsm_id+'">';
														html_notificaton += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.text_child")!!} </label>';

														html_notificaton += '<div class="col-md-9 col-sm-9 col-xs-12">';
															if(child==null){
																var child = '';
															}else{
																var child = child;
															}
															html_notificaton += '<input '+disable_action+' value="'+child+'" placeholder="{!!trans("flightschedule/schedulemonitor.text_child")!!}" data-parsley-id="0098" name="child'+fsm_id+'" id="child'+fsm_id+'" class="form-control col-md-7 col-xs-12" type="text">';
														html_notificaton += '</div>';
													html_notificaton += '</div>';
												html_notificaton += '</div>';
												// #End form-group

												// form-group
												html_notificaton += '<div class="form-group">';
													html_notificaton += '<div class="group_enfant'+fsm_id+'">';

														html_notificaton += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.text_enfant")!!} </label>';
														html_notificaton += '<div class="col-md-9 col-sm-9 col-xs-12">';
															if(enfant==null){
																var enfant = '';
															}else{
																var enfant = enfant;
															}

															html_notificaton += '<input '+disable_action+' value="'+enfant+'" placeholder="{!!trans("flightschedule/schedulemonitor.text_enfant")!!}" data-parsley-id="0098" name="enfant'+fsm_id+'" id="enfant'+fsm_id+'" class="form-control col-md-7 col-xs-12" type="text">';
														html_notificaton += '</div>';
													html_notificaton += '</div>';
												html_notificaton += '</div>';
												// #End form-group

												// Group F
												html_notificaton += '<div class="form-group">';
													html_notificaton += '<div class="group_f'+fsm_id+'">';

														html_notificaton += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.text_first_class")!!} </label>';
														html_notificaton += '<div class="col-md-9 col-sm-9 col-xs-12">';
															if(first_class==null){
																var first_class = '';
															}else{
																var first_class = first_class;
															}

															html_notificaton += '<input '+disable_action+' value="'+first_class+'" placeholder="{!!trans("flightschedule/schedulemonitor.text_first_class")!!}" data-parsley-id="0098" name="first_class_'+fsm_id+'" id="first_class_'+fsm_id+'" class="form-control col-md-7 col-xs-12" type="text">';
														html_notificaton += '</div>';
													html_notificaton += '</div>';  
												html_notificaton += '</div>';
												// #End form-group


												// Group C
												html_notificaton += '<div class="form-group">';

													html_notificaton += '<div class="group_c'+fsm_id+'">';

														html_notificaton += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.text_business_class")!!} </label>';
														html_notificaton += '<div class="col-md-9 col-sm-9 col-xs-12">';
															if(business_class==null){
																var business_class = '';
															}else{
																var business_class = business_class;
															}

															html_notificaton += '<input '+disable_action+' value="'+business_class+'" placeholder="{!!trans("flightschedule/schedulemonitor.text_business_class")!!}" data-parsley-id="0098" name="business_class_'+fsm_id+'" id="business_class_'+fsm_id+'" class="form-control col-md-7 col-xs-12" type="text">';
														html_notificaton += '</div>';
													html_notificaton += '</div>';

												html_notificaton += '</div>';
												// #End form-group

												// form-group
												html_notificaton += '<div class="form-group">';
													
													html_notificaton += '<div class="group_y'+fsm_id+'">';

														html_notificaton += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.text_economic_class")!!} </label>';
														html_notificaton += '<div class="col-md-9 col-sm-9 col-xs-12">';
															if(economic_class==null){
																var economic_class = '';
															}else{
																var economic_class = economic_class;
															}

															html_notificaton += '<input '+disable_action+' value="'+economic_class+'" placeholder="{!!trans("flightschedule/schedulemonitor.text_economic_class")!!}" data-parsley-id="0098" name="economic_class_'+fsm_id+'" id="economic_class_'+fsm_id+'" class="form-control col-md-7 col-xs-12" type="text">';
														html_notificaton += '</div>';
													html_notificaton += '</div>';
												html_notificaton += '</div>';
												// #End form-group
												
											html_notificaton +='</div>';
											// #END GROUP Whole ###########

											//#######Block Cargo ########
											html_notificaton += '<div class="group-whole col-sm-5">';
												// Block Cargo
												html_notificaton += '<div class="form-group">';
													html_notificaton += '<div class="group_cargo'+fsm_id+'">';

														html_notificaton += '<label class="control-label col-md-5 col-sm-5 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.text_cargo")!!} </label>';
														html_notificaton += '<div class="col-md-7 col-sm-7 col-xs-12">';

															html_notificaton += '<input '+disable_action+' value="'+cargo+'" placeholder="{!!trans("flightschedule/schedulemonitor.text_cargo")!!}" data-parsley-id="0098" name="cargo'+fsm_id+'" id="cargo'+fsm_id+'" class="form-control col-md-12 col-xs-12" type="text">';
														html_notificaton += '</div>';
													html_notificaton += '</div>';  
												html_notificaton += '</div>';
												// #End Cargo

												// Pax Movement 
												html_notificaton += '<div class="form-group">';
													html_notificaton += '<label class="control-label col-md-5 col-sm-5 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.pax_movement")!!}</label>';
													html_notificaton += '<div class="col-md-7 col-sm-7 col-xs-12">';
													 // pax_movement_data
													 html_notificaton += '<select class="col-sm-12 form-control" id="pax_movement'+fsm_id+'" data-value="'+fsm_id+'" style="font-size:13px;" name="pax_movement'+fsm_id+'">';
														html_notificaton += '<option value="">{!!trans("flightschedule/schedulemonitor.select")!!}</option>';
														var selected='';
														var pax_movement = pax_movement_id;

														@foreach($PaxsMovements as $PaxsMovementsss)
															if("{{$PaxsMovementsss->id}}"==pax_movement){
																selected = 'selected="selected"';
																html_notificaton += '<option '+selected+' value="{{$PaxsMovementsss->id}}">{{$PaxsMovementsss->name}}</option>';
															}else{
																html_notificaton += '<option value="{{$PaxsMovementsss->id}}">{{$PaxsMovementsss->name}}</option>';
															}
														@endforeach

													html_notificaton += '</select>';
													html_notificaton += '</div>';
												html_notificaton += '</div>';
												// #END form group

												// Flight Nots 
												html_notificaton += '<div class="form-group">';
													html_notificaton += '<label class="control-label col-md-5 col-sm-5 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.fnotification_status")!!}</label>';
													html_notificaton += '<div class="col-md-7 col-sm-7 col-xs-12">';
													 // pax_movement_data
													 html_notificaton += '<select class="col-sm-12 form-control" id="fnotification_status'+fsm_id+'" data-value="'+fsm_id+'" style="font-size:13px;" name="fnotification_status'+fsm_id+'">';
														// html_notificaton += '<option value="">{!!trans("flightschedule/schedulemonitor.select")!!}</option>';
														var selected='';
														var fsm_fnotification_status_id = fnotification_status;

														@foreach($FlightNotifications as $FlightNotification)
															if("{{$FlightNotification->id}}"==fsm_fnotification_status_id){
																selected = 'selected="selected"';
																html_notificaton += '<option '+selected+' value="{{$FlightNotification->id}}">{{$FlightNotification->name}}</option>';
															}else{
																html_notificaton += '<option value="{{$FlightNotification->id}}">{{$FlightNotification->name}}</option>';
															}
														@endforeach

													html_notificaton += '</select>';

													html_notificaton += '</div>';
												html_notificaton += '</div>';
												// #END form group

												// flight_group 
												html_notificaton += '<div class="form-group">';
													html_notificaton += '<label class="control-label col-md-5 col-sm-5 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.flight_group")!!}</label>';
													html_notificaton += '<div class="col-md-7 col-sm-7 col-xs-12"><input placeholder="{!!trans("flightschedule/schedulemonitor.flight_group")!!}" data-parsley-id="0098" name="fsm_fg'+fsm_id+'" id="fsm_fg'+fsm_id+'" value="'+fsm_flight_group_data+'" class="form-control col-md-7 col-xs-12" type="text">';
													html_notificaton += '</div>';
												html_notificaton += '</div>';
												// #END form group 

												// Block Fuel
												html_notificaton += '<div class="form-group">';

													html_notificaton += '<div class="group_block_fuel'+fsm_id+'">';

														html_notificaton += '<label class="control-label col-md-5 col-sm-5 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.text_block_fuel")!!} </label>';
														html_notificaton += '<div class="col-md-7 col-sm-7 col-xs-12">';

															html_notificaton += '<input '+disable_action+' value="'+block_fuel+'" placeholder="{!!trans("flightschedule/schedulemonitor.text_block_fuel")!!}" data-parsley-id="0098" name="block_fuel'+fsm_id+'" id="block_fuel'+fsm_id+'" class="form-control col-md-7 col-xs-12" type="text">';
														html_notificaton += '</div>';
													html_notificaton += '</div>';
												html_notificaton += '</div>';
												// #End Block Fuel

												// BLock Used Fuel #############
												html_notificaton += '<div class="form-group">';
													
													html_notificaton += '<div class="group_used_fuel'+fsm_id+'">';

														html_notificaton += '<label class="control-label col-md-5 col-sm-5 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.text_used_fuel")!!} </label>';
														html_notificaton += '<div class="col-md-7 col-sm-7 col-xs-12">';
															if(economic_class==null){
																var economic_class = '';
															}else{
																var economic_class = economic_class;
															}

															html_notificaton += '<input '+disable_action+' value="'+used_fuel+'" placeholder="{!!trans("flightschedule/schedulemonitor.text_used_fuel")!!}" data-parsley-id="0098" name="used_fuel'+fsm_id+'" id="used_fuel'+fsm_id+'" class="form-control col-md-7 col-xs-12" type="text">';
														html_notificaton += '</div>';
													html_notificaton += '</div>';
												html_notificaton += '</div>';
												// #End BLock Used Fuel
												
												// BLock Distance #############
												html_notificaton += '<div class="form-group">';
													
													html_notificaton += '<div class="group_distance'+fsm_id+'">';

														html_notificaton += '<label class="control-label col-md-5 col-sm-5 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.text_distance")!!} </label>';
														html_notificaton += '<div class="col-md-7 col-sm-7 col-xs-12">';
															if(economic_class==null){
																var economic_class = '';
															}else{
																var economic_class = economic_class;
															}

															html_notificaton += '<input '+disable_action+' value="'+distance+'" placeholder="{!!trans("flightschedule/schedulemonitor.text_distance")!!}" data-parsley-id="0098" name="distance'+fsm_id+'" id="distance'+fsm_id+'" class="form-control col-md-7 col-xs-12" type="text">';
														html_notificaton += '</div>';
													html_notificaton += '</div>';
												html_notificaton += '</div>';
												// #End BLock Distance
											html_notificaton +='</div>';
											// #END Block Cargo ###########

											// remark########### 
											html_notificaton += '<div class="col-sm-12" style="margin-top:10px;">';
												// flight_group 
												html_notificaton += '<div class="form-group">';
													html_notificaton += '<label class="control-label col-md-2 col-sm-2 col-xs-12" for="">{!!trans("flightschedule/schedulemonitor.remark")!!}</label>';

													html_notificaton += '<div class="col-md-10 col-sm-10 col-xs-12"><textarea placeholder="{!!trans("flightschedule/schedulemonitor.remark")!!}" data-parsley-id="0098" name="fsm_remark'+fsm_id+'" id="fsm_remark'+fsm_id+'" value="'+fsm_flight_group+'" class="form-control col-md-7 col-xs-12">';
														
														// if(schedule_date>=capture_current_date){
														// 	if((parseInt(local_hour)-7) <= std_t){
														// 		html_notificaton += "Flight not yet on time!";
														// 	}else{
														// 		html_notificaton += "Flight not yet on time!";
														// 	}
														// }else{
														if(fsm_remark!=null){
															html_notificaton += fsm_remark;
														}
														// }


													html_notificaton += '</textarea>';
													html_notificaton += '</div>';
												html_notificaton += '</div>';
												// #END form group 
											html_notificaton += '</div>';
											// END remark########### 

											// button_group########### 
											html_notificaton += '<div class="col-sm-12" style="margin-top:10px;">';
												html_notificaton += '<div class="col-md-2 col-sm-2 col-xs-12" for="">&nbsp;</div>';
												html_notificaton += '<div class="col-md-9 col-sm-9 col-xs-12">';
													// condition display action button when flight is not fly
													// button save change #########
												var html_notificaton_action='';
												html_notificaton_action += '<button type="button" data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" onClick="initFlight('+fsm_id+','+total_distance+',\''+schedule_date+'\','+origin_id+','+destination_id+','+aircraft_id+',\''+fsm_STD+'\',\''+fsm_STA+'\',\''+flight_number+'\',\''+local_hour+'\',\''+std_t+'\');" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button>';
													if(schedule_date>=capture_current_date){
														
														if(local_hour<=STD_hour){
															// button save change
															// html_notificaton += html_notificaton_str;
															html_notificaton += html_notificaton_action;
														}else{
															if(schedule_date>capture_current_date){
																// button save change
																// html_notificaton += html_notificaton_str;
																html_notificaton += html_notificaton_action;
															}else{
																// button save change
																html_notificaton += html_notificaton_action;
															}
														}
													}else{
														// button save change
														html_notificaton += html_notificaton_action;
													}

												html_notificaton += '</div>';
											html_notificaton += '</div>';
											// #END form group 

										html_notificaton += '</div>';
										// #END row
									html_notificaton += '</form>';
										// #END form
								html_notificaton += '</div>';

								// #END flght status block
							html_notificaton += '</span>';
							// clearfix
							html_notificaton += '<div class="clearfix"></div>';
						html_notificaton += '</div>';
					html_notificaton += '</p>';
				html_notificaton += '</div>';
				// END TAB FLIGHT ################
				// *************************************
				return html_notificaton;
			}

			// getLayoutPopupTabDivertFlight
			$.getLayoutPopupTabDivertFlight = function(fsm_id,origin_id,origin_name,destination_id,destination_name,std,sta,fsm_STD,fsm_STA,remark,flag_diverted_flight,total_distance,schedule_date,flight_status_id,local_hour,STD_hour,aircraft_id,modified_by,modified_date,capture_current_date,aircraft_name,flight_schedule_id,flight_number,fsm_flight_group){

				var html_notificaton_str='';
				html_notificaton_str += '<div class="col-sm-12" style="padding-top:10px;"><button type="button" data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" onClick="disableAction();" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button></div>';

				var html_notificaton='';
				// TAB Diverted FLIGHT #################
				html_notificaton += '<div role="tabpanel" class="tab-pane fade in" id="tab_diverted_flight'+fsm_id+'" aria-labelledby="home-tab">';
					html_notificaton += '<p>';
						html_notificaton += '{!! Form::open(["url" => "admin/setup_mgr/schedule","files"=> true,"class"=>"form-horizontal"]) !!}';
							// Flight Information
							html_notificaton += '<div class="container">';
								// ######### Block Divert Request FLight
								html_notificaton += '<div class="col-sm-12">';
									html_notificaton += '<div class="devide-line"><i class="fa fa-angle-double-right color-parent"></i> {!!trans("flightschedule/schedulemonitor.divert_to")!!}</div>';
									//###### col-sm-12 ######
									html_notificaton += '<div class="col-sm-12">';
									 
										// ###Col-sm-4
										html_notificaton += '<div class="col-sm-4">';
											html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-plane color-parent"></i> {!!trans("flightschedule/schedulemonitor.flight")!!}</div>';
											
											// block
											html_notificaton += '<label class="col-sm-8">{!!trans("flightschedule/schedulemonitor.aircraft")!!} : </label>';
											html_notificaton += '<label class="col-sm-4">'+aircraft_name+'</label>';
											// block
											html_notificaton += '<label class="col-sm-8" style="padding-top:14px;">{!!trans("flightschedule/schedulemonitor.retime_to")!!}</label>';
											html_notificaton += '<label class="col-sm-4" style="padding-top:14px;">=></label>';
										html_notificaton += '</div>';

										// ###Col-sm-4
										html_notificaton += '<div class="col-sm-4">';
											html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.departure")!!}</div>';

											html_notificaton += '<div class="row" style="padding-bottom:4px;">';
												html_notificaton += '<div class="col-sm-12">';
														html_notificaton += '<select class="col-sm-10 form-control" style="font-size:13px;" name="d_origin_id'+fsm_id+'">';
															// var selected='';
															html_notificaton += '<option  value="'+origin_id+'">'+origin_name+'</option>';
														html_notificaton += '</select>';
													html_notificaton += '</div>';

												html_notificaton += '<div class="col-sm-12" style="margin-top:5px;">';
													html_notificaton += '<div class="row">';
														html_notificaton += '<div class="col-sm-3">{!!trans("flightschedule/schedulemonitor.std")!!} <span class="validate_label_red">*</span>: </div>';
														html_notificaton += '<div class="col-sm-9">';
															html_notificaton += '<input placeholder="{!!trans("flightschedule/schedulemonitor.std")!!}" name="s_STD'+fsm_id+'" id="s_STD'+fsm_id+'" type="text" onKeyUp="ValidateTimeFormat(this)" class="col-sm-10 form-control" value="'+SlitTime(fsm_STD)+'"/>';
														html_notificaton += '</div>';
													html_notificaton += '</div>';
													// END row
												html_notificaton += '</div>';
											html_notificaton += '</div>';
											// block
										html_notificaton += '</div>';

										// ###Col-sm-4
										html_notificaton += '<div class="col-sm-4">';
											html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.arrival")!!}</div>';
											// block

											html_notificaton += '<div class="col-sm-12">';
												html_notificaton += '<div class="group_diverted_arrival'+fsm_id+'">';
													html_notificaton += '<select class="col-sm-10 form-control" onClick="initSelectDestinationDivert('+fsm_id+');" id="divert_destination_id'+fsm_id+'" data-value="'+fsm_id+'" style="font-size:13px;" name="divert_destination_id'+fsm_id+'">';
														
														html_notificaton += '<option value="">--Please Select--</option>';

														var selected='';

														@foreach($FlightLocation as $FlightLocations)
															if("{{$FlightLocations->alias}}"==destination_name){
																selected = 'selected="selected"';
																html_notificaton += '<option '+selected+' value="{{$FlightLocations->id}}">{{$FlightLocations->alias}}</option>';
															}else{
																html_notificaton += '<option value="{{$FlightLocations->id}}">{{$FlightLocations->alias}}</option>';
															}
														@endforeach

													html_notificaton += '</select>';
												html_notificaton += '</div>';
											html_notificaton += '</div>';

											html_notificaton += '<div class="col-sm-12" style="margin-top:5px;">';

												html_notificaton += '<div class="row">';
													html_notificaton += '<div class="col-sm-3">{!!trans("flightschedule/schedulemonitor.sta")!!} <span class="validate_label_red">*</span>: </div>';

													html_notificaton += '<div class="col-sm-9">';
														html_notificaton += '<div class="group_diverted_sta'+fsm_id+'">';
															html_notificaton += '<input maxlength="4" placeholder="{!!trans("flightschedule/schedulemonitor.sta")!!}"  name="s_STA'+fsm_id+'" class="col-sm-10 form-control" id="s_STA'+fsm_id+'" type="text" onKeyUp="ValidateTimeFormat(this)" value="'+SlitTime(fsm_STA)+'"/>';
														html_notificaton += '</div>';
													html_notificaton += '</div>';
													// END col-sm-8

												html_notificaton += '</div>';
											html_notificaton += '</div>';

										html_notificaton += '</div>';

									html_notificaton +='</div>';

								html_notificaton += '</div>';

								// ######### Block Divert Request FLight
								html_notificaton += '<div class="col-sm-12" style="margin-top:20px;padding-bottom:15px;">';
									html_notificaton += '<div class="devide-line"><i class="fa fa-exchange color-parent"></i> {!!trans("flightschedule/schedulemonitor.divert_flight")!!} <input class="flat" type="checkbox" onClick="init_is_divert('+fsm_id+');" data-value="'+fsm_id+'"><input type="hidden" id="hide_divert_flight_to'+fsm_id+'" name="hide_divert_flight_to'+fsm_id+'"></div>';
									// Block DIVERTED FLIGHT #########################
									html_notificaton += '<div id="block_divert_to'+fsm_id+'" class="col-sm-12" style="display:none;">';
										html_notificaton += '<input type="hidden" name="is_diverted'+fsm_id+'" id="is_diverted'+fsm_id+'">';
										// Col-sm-4 #########
										html_notificaton += '<div class="col-sm-4">';
											html_notificaton += '<div class="devide-line"><i class="fa fa-plane color-parent"></i> {!!trans("flightschedule/schedulemonitor.flight")!!}</div>';
											// block
											html_notificaton += '<label class="col-sm-8">{!!trans("flightschedule/schedulemonitor.aircraft")!!} <span class="validate_label_red">*</span>: </label>';
											html_notificaton += '<label class="col-sm-4">'+aircraft_name+'</label>';
											// block
											html_notificaton += '<label style="padding-top:14px;" class="col-sm-8">{!!trans("flightschedule/schedulemonitor.retime_divert_to")!!}</label>';
											html_notificaton += '<label class="col-sm-4" style="padding-top:14px;">=></label>';
										html_notificaton += '</div>';

										// Col-sm-4
										html_notificaton += '<div class="col-sm-4">';
											html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.departure")!!}</div>';

											html_notificaton += '<div class="col-sm-12">';

												html_notificaton += '<select class="col-sm-10 form-control" style="font-size:13px;" id="nd_divert_location_id'+fsm_id+'" name="nd_divert_location_id'+fsm_id+'">';
													// if(divert_location!=''){
													//   html_notificaton += '<option value="'+flight_divert+'">'+divert_location+'</option>';
													// }else{
													//   html_notificaton += '<option value="">--Please Select--</option>';
													// }
												html_notificaton += '</select>';
											html_notificaton += '</div>';

											html_notificaton += '<div class="col-sm-12" style="margin-top:5px;">';
												// row
												html_notificaton += '<div class="row">';
													// col-sm-3
													html_notificaton += '<div class="col-sm-3">';
														html_notificaton += '{!!trans("flightschedule/schedulemonitor.std")!!} <span class="validate_label_red">*</span>: '
													html_notificaton += '</div>';
													// #END col-sm-3

													// col-sm-9
													html_notificaton += '<div class="col-sm-9">';
														html_notificaton += '<div class="group_diverted_to_std'+fsm_id+'">';
															// html_notificaton += '<input placeholder="{!!trans("flightschedule/schedulemonitor.std")!!}"  name="nd_STD'+fsm_id+'" onKeyUp="ValidateTimeFormat(this)" id="nd_STD'+fsm_id+'" type="text" class="col-sm-10 form-control" value="'+divert_dtd+'"/>';
															html_notificaton += '<input placeholder="{!!trans("flightschedule/schedulemonitor.std")!!}" name="nd_STD'+fsm_id+'" onKeyUp="ValidateTimeFormat(this)" id="nd_STD'+fsm_id+'" type="text" class="col-sm-10 form-control" value=""/>';
														html_notificaton += '</div>';
													html_notificaton += '</div>';
													// #END col-sm-9
												html_notificaton += '</div>';
											html_notificaton += '</div>';
											// END row
										html_notificaton += '</div>';

										// Col-sm-4
										html_notificaton += '<div class="col-sm-4">';
											html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.arrival")!!}</div>';
											// block
											html_notificaton += '<div class="col-sm-12">';
												
												html_notificaton += '<select class="col-sm-10 form-control" style="font-size:13px;" name="nd_destination_id'+fsm_id+'">';
													// var selected='';
													html_notificaton += '<option  value="'+destination_id+'">'+destination_name+'</option>';

												html_notificaton += '</select>';

											html_notificaton += '</div>';

											html_notificaton += '<div class="col-sm-12" style="margin-top:5px;">';

												// row
												html_notificaton += '<div class="row">';
													// col-sm-3
													html_notificaton += '<div class="col-sm-3">';
														html_notificaton += '{!!trans("flightschedule/schedulemonitor.sta")!!} <span class="validate_label_red">*</span>: ';
													html_notificaton += '</div>';
													// #END col-sm-3

													// col-sm-9
													html_notificaton += '<div class="col-sm-9">';
														html_notificaton += '<div class="group_diverted_to_sta'+fsm_id+'">';
															// html_notificaton += '<input placeholder="{!!trans("flightschedule/schedulemonitor.sta")!!}"  name="nd_STA'+fsm_id+'" onKeyUp="ValidateTimeFormat(this)" class="col-sm-10 form-control" id="nd_STA'+fsm_id+'" type="text" value="'+divert_sta+'"/>';
															html_notificaton += '<input placeholder="{!!trans("flightschedule/schedulemonitor.sta")!!}"  name="nd_STA'+fsm_id+'" onKeyUp="ValidateTimeFormat(this)" class="col-sm-10 form-control" id="nd_STA'+fsm_id+'" type="text" value=""/>';
														html_notificaton += '</div>'
													html_notificaton += '</div>'

													// #END col-sm-9
												html_notificaton += '</div>';
												// END row
											html_notificaton += '</div>';
											// #END col-sm-12

										html_notificaton += '</div>';
									html_notificaton += '</div>';
								// clearfix
								html_notificaton += '<div class="clearfix"></div>';
								// Comment Block
								html_notificaton += '<div class="col-sm-12">';
									html_notificaton += '<div class="row">';
										html_notificaton += '<div class="devide-line"><i class="fa fa-pencil-square-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.remark_alt")!!}</div>';
										html_notificaton += '<textarea class="form-control" placeholder="{!!trans("flightschedule/schedulemonitor.remark")!!}" name="divert_remark'+fsm_id+'" id="divert_remark'+fsm_id+'" style="max-width:100%;" row="6">';
											if(remark!=null){
												html_notificaton += remark;
											}
										html_notificaton += '</textarea>';
									html_notificaton += '</div>';
								html_notificaton += '</div>';
								// #END Comment Block

							html_notificaton += '</div>';
							// ###END Content
							// Button Request Diverted
							html_notificaton += '<div class="col-sm-12">';
							
							// Disable Action When time is not time
							// button save change
							var html_notificaton_action='';
						
							// html_notificaton_action += '<button type="button" data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" onClick="initDivertFlight('+fsm_id+','+flag_diverted_flight+','+total_distance+',\''+schedule_date+'\','+aircraft_id+','+flight_schedule_id+');" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button>';

							html_notificaton_action += '<button type="button" data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" onClick="initDivertFlight('+fsm_id+','+flag_diverted_flight+','+total_distance+',\''+schedule_date+'\','+aircraft_id+','+flight_schedule_id+',\''+flight_number+'\',\''+fsm_flight_group+'\');" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button>';

							if(schedule_date>=capture_current_date){
								
								if(local_hour<=STD_hour){
									// button save change
									// html_notificaton += html_notificaton_str;
									html_notificaton += html_notificaton_action;
								}else{
									// button save change
									html_notificaton += html_notificaton_action;
								}
							}else{
								// button save change
								html_notificaton += html_notificaton_action;
							}

							html_notificaton += '</div>';
							html_notificaton += '</div>';

						html_notificaton += "{!! Form::close() !!}";

					html_notificaton += '</p>';
				html_notificaton += '</div>';
				// // END Diverted Flight ################
				return html_notificaton;
			}

			// getLayoutPopupTabCancelFlight
			$.getLayoutPopupTabCancelFlight = function(fsm_id,origin_id,origin_name,destination_id,destination_name,std,sta,fsm_STD,fsm_STA,remark,flag_cancelled_flight,total_distance,schedule_date,flight_status_id,local_hour,STD_hour,aircraft_id,modified_by,modified_date,capture_current_date,aircraft_name,pax_movement_id,fsm_flight_group,flight_number){
				
				var html_notificaton_str='';
				html_notificaton_str += '<div class="col-sm-12" style="padding-top:10px;"><button type="button" data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" onClick="disableAction();" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button></div>';

				var html_notificaton='';
				// TAB CANCELED FLIGHT #################
				html_notificaton += '<div role="tabpanel" class="tab-pane fade in" id="tab_cancel_flight'+fsm_id+'" aria-labelledby="home-tab">';
					html_notificaton += '<p>';

						// Flight Information
						html_notificaton += '<div class="container">';
							// Col-sm-4
							html_notificaton += '<div class="col-sm-3">';
								html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-pencil-square-o  color-parent"></i> {!!trans("flightschedule/schedulemonitor.flight")!!}</div>';
								// block
								html_notificaton += '<div class="col-sm-6"><i class="fa fa-wa fa-caret-right color-parent"></i> {!!trans("flightschedule/schedulemonitor.aircraft")!!} : </div>';
								html_notificaton += '<div class="col-sm-6">'+aircraft_name+'</div>';
								// block
								html_notificaton += '<div class="col-sm-6"><i class="fa fa-wa fa-caret-right color-parent"></i> {!!trans("flightschedule/schedulemonitor.time")!!} : </div>';
								html_notificaton += '<div class="col-sm-6"><i class="fa fa-wa fa-angle-double-right color-parent"></i></div>';
							html_notificaton += '</div>';

							// Col-sm-4
							html_notificaton += '<span class="col-sm-2">';
								html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.departure")!!}</div>';
								html_notificaton += '<div class="line-through">';
									html_notificaton += '<div class="col-sm-12">'+origin_name+'</div>';
									// block
									html_notificaton += '<label class="col-sm-12">';
										html_notificaton += SlitTime(fsm_STD);
									html_notificaton += '</label>';
								html_notificaton += '</div>';
							html_notificaton += '</span>';

							// Col-sm-4
							html_notificaton += '<span class="col-sm-2">';
								html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.arrival")!!}</div>';
								// block
								html_notificaton += '<div class="line-through">';
									html_notificaton += '<div class="col-sm-12">'+destination_name+'</div>';
									// block
									html_notificaton += '<label class="col-sm-12">';
										html_notificaton += SlitTime(fsm_STA);
									html_notificaton += '</label>';
								html_notificaton += '</div>';

							html_notificaton += '</span>';

							// Col-sm-4
							html_notificaton += '<span class="col-sm-5">';
								html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-pencil color-parent"></i> {!!trans("flightschedule/schedulemonitor.remark_cancel")!!}</div>';
								html_notificaton +='<div class="row">';

									// block
									html_notificaton += '<label class="col-sm-12">{!!trans("flightschedule/schedulemonitor.date")!!}</label>';

									html_notificaton += '<div class="col-sm-10"><input type="text" name="date'+fsm_id+'" class="date-picker form-control" id="date'+fsm_id+'" value="" placeholder="{!!trans("flightschedule/schedulemonitor.date")!!}"></div>';

									// block
									html_notificaton += '<label class="col-sm-12">{!!trans("flightschedule/schedulemonitor.remark")!!}</label>';

									html_notificaton += '<div class="col-sm-12"><textarea style="width:100%;" class="form-control" id="remark'+fsm_id+'" name="remark'+fsm_id+'" row="3">';
										if(flight_status_id==5){
											if(remark!=null){
												html_notificaton += remark;
											}
										}
									html_notificaton += '</textarea></div>';

									if(flight_status_id==5){
										html_notificaton += '<div class="col-sm-12" style="margin-top:10px;"><b>Status</b> : <button type="button" class="btn btn-danger btn-xs">Cancelled</button></div>';
									}

									// Disable Action When time is not time
									// button save change
									// clearfix
									html_notificaton += '<div class="clearfix"></div>';
									var html_notificaton_action='';
									html_notificaton_action += '<div class="col-sm-12" style="margin-top:10px;"><button data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" onClick="initCancelFlight('+fsm_id+','+flag_cancelled_flight+','+total_distance+',\''+schedule_date+'\','+pax_movement_id+',\''+fsm_flight_group+'\',\''+flight_number+'\');" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button></div>';
										if(schedule_date>=capture_current_date){
											
											if(local_hour<=STD_hour){
												// button save change
												// html_notificaton += html_notificaton_str;
												html_notificaton += html_notificaton_action;
											}else{
												// button save change
												html_notificaton += html_notificaton_action;
											}
										}else{
											// button save change
											html_notificaton += html_notificaton_action;
										}
								html_notificaton +='</div>';
							html_notificaton += '</span>';

						html_notificaton += '</div>';
					html_notificaton += '<p>';
				html_notificaton += '</div>';

				$('.date-picker').datepicker({ 
			    format: 'yyyy-mm-dd',
			    autoclose: true,
			    //startDate: today
		    });

				// END CANCEL FLIGHT ################
				return html_notificaton;
			}

			// getLayoutPopupTabDeleteFlight
			$.getLayoutPopupTabDeleteFlight = function(fsm_id,origin_id,origin_name,destination_id,destination_name,std,sta,fsm_STD,fsm_STA,remark,flag_deleted_flight,total_distance,schedule_date,flight_status_id,local_hour,STD_hour,aircraft_id,modified_by,modified_date,capture_current_date,aircraft_name,flight_number){
				var html_notificaton='';

				var html_notificaton_str='';
				html_notificaton_str += '<div class="col-sm-12" style="padding-top:10px;"><button type="button" data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" onClick="disableAction();" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button></div>';

				// TAB DELETED FLIGHT #################
				html_notificaton += '<div role="tabpanel" class="tab-pane fade in" id="tab_deleted_flight'+fsm_id+'" aria-labelledby="home-tab">';
					html_notificaton += '<p>';
						// Flight Information
						html_notificaton += '<div class="container">';
							// Col-sm-4
							html_notificaton += '<div class="col-sm-3">';
								html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-pencil-square-o  color-parent"></i> {!!trans("flightschedule/schedulemonitor.flight")!!}</div>';
								// block
								html_notificaton += '<div class="col-sm-6"><i class="fa fa-wa fa-caret-right color-parent"></i> {!!trans("flightschedule/schedulemonitor.aircraft")!!} : </div>';
								html_notificaton += '<div class="col-sm-6">'+aircraft_name+'</div>';
								// block
								html_notificaton += '<div class="col-sm-6"><i class="fa fa-wa fa-caret-right color-parent"></i> {!!trans("flightschedule/schedulemonitor.time")!!} : </div>';
								html_notificaton += '<div class="col-sm-6"><i class="fa fa-wa fa-angle-double-right color-parent"></i></div>';
							html_notificaton += '</div>';

							// Col-sm-4
							html_notificaton += '<span class="col-sm-2">';
								html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.departure")!!}</div>';
								
								html_notificaton += '<div class="line-through">';
									html_notificaton += '<div class="col-sm-12">'+origin_name+'</div>';
									// block
									html_notificaton += '<label class="col-sm-12">';
										html_notificaton += SlitTime(fsm_STD);
									html_notificaton += '</label>';
								html_notificaton += '</div>';

							html_notificaton += '</span>';

							// Col-sm-4
							html_notificaton += '<span class="col-sm-2">';
								html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.arrival")!!}</div>';
								// block
								html_notificaton += '<div class="line-through">';
									html_notificaton += '<div class="col-sm-12">'+destination_name+'</div>';
									// block
									html_notificaton += '<label class="col-sm-12">';
										html_notificaton += SlitTime(fsm_STA);
									html_notificaton += '</label>';
								html_notificaton += '</div>';

							html_notificaton += '</span>';

							// Col-sm-4
							html_notificaton += '<span class="col-sm-4">';
								html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-pencil-square-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.remark_delete")!!}</div>';
								// block
								html_notificaton += '<label class="col-sm-12">{!!trans("flightschedule/schedulemonitor.remark")!!}</label>';

								
								html_notificaton += '<div class="col-sm-12"><textarea class="form-control" style="width:100%;" id="del_remark'+fsm_id+'" name="del_remark'+fsm_id+'" row="3">';
									if(flight_status_id==6){
										if(fsm_remark!=null){
											html_notificaton += fsm_remark;
										}
									}
								html_notificaton += '</textarea></div>';
								

								if(flight_status_id==6){
									html_notificaton += '<div class="col-sm-12" style="margin-top:10px;"><b>Status</b> : <button type="button" class="btn btn-danger btn-xs">Deleted</button></div>';
								}

								// Disable Action When time is not time
								// button save change
								var html_notificaton_action='';
								html_notificaton_action += '<div class="col-sm-12" style="margin-top:10px;"><button data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" onClick="initDeleteFlight('+fsm_id+','+flag_deleted_flight+','+total_distance+',\''+schedule_date+'\',\''+flight_number+'\');" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button></div>';
								if(schedule_date>=capture_current_date){
									
									if(local_hour<=STD_hour){
										// button save change
										html_notificaton += html_notificaton_action;
										// html_notificaton += html_notificaton_str;
									}else{
										// button save change
										html_notificaton += html_notificaton_action;
									}
								}else{
									// button save change
									html_notificaton += html_notificaton_action;
								}
							html_notificaton += '</span>';

							// clearfix
							html_notificaton += '<div class="clearfix"></div>';
						html_notificaton += '</div>';


					html_notificaton += '<p>';
				html_notificaton += '</div>';
				// END TAB DELETED FLIGHT ##############
				return html_notificaton;
			}

			// getLayoutPopupTabRetimeFlight
			$.getLayoutPopupTabRetimeFlight = function(fsm_id,origin_id,origin_name,destination_id,destination_name,std,sta,fsm_STD,fsm_STA,remark,flag_retime_flight,total_distance,schedule_date,flight_status_id,local_hour,STD_hour,aircraft_id,modified_by,modified_date,capture_current_date,flight_number){

				var html_notificaton_str='';
				html_notificaton_str += '<div class="col-sm-12" style="padding-top:10px;"><button type="button" data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" onClick="disableAction();" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button></div>';

				if(modified_by==null){
					var modified_by = '';
				}else{
					var modified_by = modified_by;
				}
				if(modified_date==null){
					var modified_date = '';
				}else{
					var modified_date = formatDate(modified_date);
				}
				if(std==null){
					var std = '';
				}else{
					var std = SlitTime(std);
				}

				if(sta==null){
					var sta = '';
				}else{
					var sta = SlitTime(sta);
				}

				if(remark==null){
					var remark = '';
				}else{
					var remark = remark;
				}


				var html_notificaton='';
				// TAB RETIME FLIGHT #################
				html_notificaton += '<div role="tabpanel" class="tab-pane fade in" id="tab_retime_flight'+fsm_id+'" aria-labelledby="home-tab">';
					html_notificaton += '<p>';
						// Flight Information
						html_notificaton += '<div class="container">';
							html_notificaton += '<span class="col-sm-6">';
								html_notificaton += '<div class="devide-line"><i class="fa fa-fighter-jet color-parent"></i> {!!trans("flightschedule/schedulemonitor.original_flight")!!}</div>';
								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-info-circle color-parent"></i> {!!trans("flightschedule/schedulemonitor.route_info")!!}</label>';
								html_notificaton += '<label class="col-sm-6">'+origin_name+' - '+destination_name+'</label>';
								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.std")!!} : </label>';
								html_notificaton += '<label class="col-sm-6">';
									html_notificaton += SlitTime(fsm_STD);
								html_notificaton += '</label>';
								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.sta")!!} : </label>';
								html_notificaton += '<label class="col-sm-6">';
									html_notificaton += SlitTime(fsm_STA);
								html_notificaton += '</label>';

								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-info-circle color-parent"></i> {!!trans("flightschedule/schedulemonitor.modified_by")!!} : </label>';
								html_notificaton += '<label class="col-sm-6">'+modified_by+'</label>';
								// Last Modified
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-info-circle color-parent"></i> {!!trans("flightschedule/schedulemonitor.modified_date")!!} : </label>';
								html_notificaton += '<label class="col-sm-6">'+modified_date+'</label>';

							html_notificaton += '</span>';

							html_notificaton += '<span class="col-sm-6">';
								html_notificaton += '<div class="devide-line"><i class="fa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.retime_flight")!!}</div>';
								
								// formgroup
								html_notificaton += '<div class="group_retime_std'+fsm_id+'" style="margin-bottom:10px;">';
									html_notificaton += '<label class="col-sm-4 control-label">{!!trans("flightschedule/schedulemonitor.std")!!} <span class="validate_label_red">*</span>: </label>';
									html_notificaton += '<div class="col-sm-6"><input placeholder="{!!trans("flightschedule/schedulemonitor.std")!!}" type="text" style="height:30px;" class="form-control" onKeyUp="ValidateTimeFormat(this)" maxlength="4" name="r_std'+fsm_id+'" id="r_std'+fsm_id+'" value="'+std+'"></div>';
								html_notificaton += '&nbsp;</div>';

								// formgroup
								html_notificaton += '<div class="group_retime_sta'+fsm_id+'" style="margin-top:10px;">';
									html_notificaton += '<label class="col-sm-4 control-label">{!!trans("flightschedule/schedulemonitor.sta")!!} <span class="validate_label_red">*</span>: </label>';
									html_notificaton += '<div class="col-sm-6"><input type="text" placeholder="{!!trans("flightschedule/schedulemonitor.sta")!!}" class="form-control" style="height:30px;" maxlength="4" onKeyUp="ValidateTimeFormat(this)" name="r_sta'+fsm_id+'" id="r_sta'+fsm_id+'" value="'+sta+'"></div>';
								html_notificaton += '</div>';

								// block
								html_notificaton +='<div class="clearfix"></div>';
								html_notificaton += '<div class="col-sm-12" style="margin-top:10px;">';
									html_notificaton += '<div class="row">';
										html_notificaton += '<label class="col-sm-4">Remark : </label>';

										html_notificaton += '<div class="col-sm-8"><textarea class="form-control" style="width:100%;" id="retime_remark'+fsm_id+'" name="retime_remark'+fsm_id+'" row="3">';
												if(flight_status_id==7){
													html_notificaton += remark;
												}
										html_notificaton += '</textarea></div>';
									html_notificaton += '</div>';
								html_notificaton += '</div>';

							// button save change
							html_notificaton += '<div class="clearfix"></div>';
							html_notificaton += '<div style="margin-top:10px;" class="col-sm-12">';
								html_notificaton  += '<div class="row">';
									html_notificaton += '<div class="col-sm-4">&nbsp;</div>';
									html_notificaton += '<div class="col-sm-6">';
										
										// Disable Action When time is not time
										// button save change
										var html_notificaton_action='';
										
										html_notificaton_action += '<button data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" onClick="initRetimeFlight('+fsm_id+','+flag_retime_flight+','+total_distance+',\''+schedule_date+'\','+origin_id+','+destination_id+','+aircraft_id+',\''+flight_number+'\');" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button>';

										if(schedule_date>=capture_current_date){
											if(local_hour<=STD_hour){
												// button save change
												// html_notificaton += html_notificaton_str;
												html_notificaton += html_notificaton_action;
											}else{
												// button save change
												html_notificaton += html_notificaton_action;
											}
										}else{
											// button save change
											html_notificaton += html_notificaton_action;
										}

									html_notificaton += '</div>'
								html_notificaton += '</div>';
							html_notificaton += '</div>';
							// clearfix
							html_notificaton += '<div class="clearfix"></div>';
						html_notificaton += '</div>';

					html_notificaton += '<p>';
				html_notificaton += '</div>';
				// END RETIME FLIGHT ################

				return html_notificaton;
			}

			// getLayoutPopupTabDelayFlight
			$.getLayoutPopupTabDelayFlight = function(fsm_id,origin_id,origin_name,destination_id,destination_name,std,sta,fsm_STD,fsm_STA,remark,flag_delay_flight,total_distance,schedule_date,flight_status_id,local_hour,STD_hour,aircraft_id,modified_by,modified_date,capture_current_date,flight_number){
				var html_notificaton_str='';
				html_notificaton_str += '<div class="col-sm-12" style="padding-top:10px;"><button type="button" data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" onClick="disableAction();" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button></div>';

				if(modified_by==null){
					var modified_by = '';
				}else{
					var modified_by = modified_by;
				}
				if(modified_date==null){
					var modified_date = '';
				}else{
					var modified_date = formatDate(modified_date);
				}
				if(std==null){
					var std = '';
				}else{
					var std = SlitTime(std);
				}

				if(sta==null){
					var sta = '';
				}else{
					var sta = SlitTime(sta);
				}

				if(remark==null){
					var remark = '';
				}else{
					var remark = remark;
				}

				var html_notificaton='';
				// TAB DELAY FLIGHT #################
				html_notificaton += '<div role="tabpanel" class="tab-pane fade in" id="tab_delay_flight'+fsm_id+'" aria-labelledby="home-tab">';

					html_notificaton += '<p>';
						// Flight Information
						html_notificaton += '<div class="container">';
							html_notificaton += '<span class="col-sm-6">';
								html_notificaton += '<div class="devide-line"><i class="fa fa-fighter-jet color-parent"></i> {!!trans("flightschedule/schedulemonitor.original_flight")!!}</div>';
								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-wa fa-info-circle color-parent"></i> {!!trans("flightschedule/schedulemonitor.route_info")!!} : </label>';
								html_notificaton += '<label class="col-sm-6">'+origin_name+' - '+destination_name+'</label>';
								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-wa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.std")!!} : </label>';
								html_notificaton += '<label class="col-sm-6">';
									html_notificaton += SlitTime(fsm_STD);
								html_notificaton += '</label>';
								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-wa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.sta")!!} : </label>';
								html_notificaton += '<label class="col-sm-6">';
									html_notificaton += SlitTime(fsm_STA);
								html_notificaton += '</label>';

								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-info-circle color-parent"></i> {!!trans("flightschedule/schedulemonitor.modified_by")!!} : </label>';

								html_notificaton += '<label class="col-sm-6">'+modified_by+'</label>';
								// Last Modified
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-info-circle color-parent"></i> {!!trans("flightschedule/schedulemonitor.modified_date")!!} : </label>';

								html_notificaton += '<label class="col-sm-6">'+modified_date+'</label>';


							html_notificaton += '</span>';

							html_notificaton += '<span class="col-sm-6">';
								html_notificaton += '<div class="devide-line"><i class="fa fa-wa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.time_delay")!!}</div>';
								// block

								html_notificaton += '<div class="group_delay_std'+fsm_id+'" style="padding-bottom:10px;">';
									html_notificaton += '<label class="control-label col-sm-4">{!!trans("flightschedule/schedulemonitor.std")!!} <span class="validate_label_red">*</span> :</label>';
									html_notificaton += '<div class="col-sm-6"><input type="text" maxlength="4" class="form-control" placeholder="{!!trans("flightschedule/schedulemonitor.std")!!}" style="height:30px;" class="form-group" onKeyUp="ValidateTimeFormat(this)" name="d_std'+fsm_id+'"  id="d_std'+fsm_id+'" value="'+std+'"></div>';
								html_notificaton += '&nbsp;</div>';

								// group html_notificaton ########
								html_notificaton += '<div class="group_delay_sta'+fsm_id+'" style="padding-bottom:10px;">';
									html_notificaton += '<label class="control-label col-sm-4">{!!trans("flightschedule/schedulemonitor.sta")!!} <span class="validate_label_red">*</span> :</label>';
									html_notificaton += '<div class="col-sm-6"><input type="text" maxlength="4" class="form-control" style="height:30px;" onKeyUp="ValidateTimeFormat(this)" placeholder="{!!trans("flightschedule/schedulemonitor.sta")!!}" name="d_sta'+fsm_id+'" id="d_sta'+fsm_id+'" value="'+sta+'"></div>';
								html_notificaton += '</div>';
								// html_notificaton ############

								// block_notification ##########
								html_notificaton +='<div class="clearfix"></div>';
								html_notificaton += '<div class="col-sm-12" style="margin-top:10px;">';
									html_notificaton += '<div class="row">';
										html_notificaton += '<label class="col-sm-4">Remark : </label>';

										html_notificaton += '<div class="col-sm-8"><textarea class="form-control" style="width:100%;" id="delay_remark'+fsm_id+'" name="delay_remark'+fsm_id+'" row="3">';
												if(flight_status_id==4){
													html_notificaton += remark;
												}
										html_notificaton += '</textarea></div>';
									html_notificaton += '</div>';
								html_notificaton += '</div>';


								// button save change
								html_notificaton += '<div class="col-sm-12" style="margin-top:10px;">';
								html_notificaton += '<div class="row">';
									html_notificaton += '<div class="col-sm-4">&nbsp;</div>';
									html_notificaton += '<div class="col-sm-8">';

										// Disable Action When time is not time
										// button save change
										var html_notificaton_action='';
										html_notificaton_action += '<button data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" onClick="initDelayFlight('+fsm_id+','+flag_delay_flight+','+total_distance+',\''+schedule_date+'\','+origin_id+','+destination_id+','+aircraft_id+',\''+flight_number+'\');" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button>';
										if(schedule_date>=capture_current_date){
											if(local_hour<=STD_hour){
												// button save change
												// html_notificaton += html_notificaton_str;
												html_notificaton += html_notificaton_action;
											}else{
												// button save change
												html_notificaton += html_notificaton_action;
											}
										}else{
											// button save change
											html_notificaton += html_notificaton_action;
										}

									html_notificaton += '</div></div></div>';
							 
							html_notificaton += '</span>';
						 
							// clearfix
							html_notificaton += '<div class="clearfix"></div>';
						html_notificaton += '</div>';

					html_notificaton += '<p>';
				html_notificaton += '</div>';
				// END DELAY FLIGHT ################
				return html_notificaton;
			}

			// getLayoutPopupTabRescheduleFlight
			$.getLayoutPopupTabRescheduleFlight = function(fsm_id,origin_id,origin_name,destination_id,destination_name,std,sta,fsm_STD,fsm_STA,remark,flag_reschedule_flight,total_distance,schedule_date,flight_status_id,local_hour,STD_hour,aircraft_id,modified_by,modified_date,capture_current_date,flight_number){

				var html_notificaton_str='';
				html_notificaton_str += '<div class="col-sm-12" style="padding-top:10px;"><button type="button" data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" onClick="disableAction();" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button></div>';

				if(modified_by==null){
					var modified_by = '';
				}else{
					var modified_by = modified_by;
				}
				if(modified_date==null){
					var modified_date = '';
				}else{
					var modified_date = formatDate(modified_date);
				}
				if(std==null){
					var std = '';
				}else{
					var std = SlitTime(std);
				}

				if(sta==null){
					var sta = '';
				}else{
					var sta = SlitTime(sta);
				}

				if(remark==null){
					var remark = '';
				}else{
					var remark = remark;
				}

				var html_notificaton='';
				// TAB RESCHEDULE FLIGHT #################
				html_notificaton += '<div role="tabpanel" class="tab-pane fade in" id="tab_reschedule_flight'+fsm_id+'" aria-labelledby="home-tab">';
					html_notificaton += '<p>';
						// Flight Information
						html_notificaton += '<div class="container">';
							html_notificaton += '<span class="col-sm-6">';
								html_notificaton += '<div class="devide-line"><i class="fa fa-fighter-jet color-parent"></i> {!!trans("flightschedule/schedulemonitor.original_flight")!!}</div>';
								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-info-circle color-parent"></i> {!!trans("flightschedule/schedulemonitor.route_info")!!}</label>';
								html_notificaton += '<label class="col-sm-6">'+origin_name+' - '+destination_name+'</label>';
								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.std")!!} : </label>';
								html_notificaton += '<label class="col-sm-6">';
									html_notificaton += SlitTime(fsm_STD);
								html_notificaton += '</label>';
								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.sta")!!} : </label>';
								html_notificaton += '<label class="col-sm-6">';
									html_notificaton += SlitTime(fsm_STA);
								html_notificaton += '</label>';

								// block
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-info-circle color-parent"></i> {!!trans("flightschedule/schedulemonitor.modified_by")!!} : </label>';
								html_notificaton += '<label class="col-sm-6">'+modified_by+'</label>';
								// Last Modified
								html_notificaton += '<label class="col-sm-6"><i class="fa fa-info-circle color-parent"></i> {!!trans("flightschedule/schedulemonitor.modified_date")!!} : </label>';
								html_notificaton += '<label class="col-sm-6">'+modified_date+'</label>';

							html_notificaton += '</span>';

							html_notificaton += '<span class="col-sm-6">';
								html_notificaton += '<div class="devide-line"><i class="fa fa-clock-o color-parent"></i> {!!trans("flightschedule/schedulemonitor.reschedule")!!}</div>';
								
								// block
								html_notificaton += '<div class="group_reschedule_std'+fsm_id+'" style="margin-bottom:10px;">';
									html_notificaton += '<label class="col-sm-4 control-label">{!!trans("flightschedule/schedulemonitor.std")!!} <span class="validate_label_red">*</span>: </label>';
									html_notificaton += '<div class="col-sm-6"><input placeholder="{!!trans("flightschedule/schedulemonitor.std")!!}" class="form-control" type="text" style="height:30px;" class="form-group" onKeyUp="ValidateTimeFormat(this)" maxlength="4" name="re_std'+fsm_id+'" id="re_std'+fsm_id+'" value="'+std+'"></div>';
								html_notificaton += '&nbsp;</div>';

								// block
								html_notificaton += '<div class="group_reschedule_sta'+fsm_id+'" style="margin-bottom:10px;">';
									html_notificaton += '<label class="col-sm-4 control-label">{!!trans("flightschedule/schedulemonitor.sta")!!} <span class="validate_label_red">*</span>: </label>';
									html_notificaton += '<div class="col-sm-6"><input type="text" placeholder="{!!trans("flightschedule/schedulemonitor.sta")!!}" maxlength="4" class="form-control" style="height:30px;" onKeyUp="ValidateTimeFormat(this)" name="re_sta'+fsm_id+'" id="re_sta'+fsm_id+'" value="'+sta+'"></div>';
								html_notificaton += '</div>';

								// block
								html_notificaton +='<div class="clearfix"></div>';
								html_notificaton += '<div class="col-sm-12" style="margin-top:10px;">';
									html_notificaton += '<div class="row">';
										html_notificaton += '<label class="col-sm-4">Remark : </label>';

										html_notificaton += '<div class="col-sm-8"><textarea class="form-control" style="width:100%;" id="reschedule_remark'+fsm_id+'" name="reschedule_remark'+fsm_id+'" row="3">';
											html_notificaton += remark;
										html_notificaton += '</textarea></div>';
									html_notificaton += '</div>';
								html_notificaton += '</div>';
								
							// button save change
							html_notificaton += '<div class="clearfix"></div>';
							html_notificaton += '<div style="margin-top:10px;" class="col-sm-12">';
								html_notificaton  += '<div class="row">';
									html_notificaton += '<div class="col-sm-4">&nbsp;</div>';
									html_notificaton += '<div class="col-sm-6">';
										
										// Disable Action When time is not time
										// button save change
										var html_notificaton_action='';
										html_notificaton_action += '<button data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" onClick="initRescheduleFlight('+fsm_id+','+flag_reschedule_flight+','+total_distance+',\''+schedule_date+'\','+origin_id+','+destination_id+','+aircraft_id+',\''+flight_number+'\');" class="btn btn-success btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button>';
										if(schedule_date>=capture_current_date){
											
											if(local_hour<=STD_hour){
												// button save change
												// html_notificaton += html_notificaton_str;
												html_notificaton += html_notificaton_action;
											}else{
												// button save change
												html_notificaton += html_notificaton_action;
											}
										}else{
											// button save change
											html_notificaton += html_notificaton_action;
										}

									html_notificaton += '</div>'
								html_notificaton += '</div>';

							html_notificaton += '</div>';
							// clearfix
							html_notificaton += '<div class="clearfix"></div>';
						html_notificaton += '</div>';

					html_notificaton += '<p>';
				html_notificaton += '</div>';
				// END RESCHEDULE FLIGHT ################
				return html_notificaton;
			}

			// getLayoutPopupBottom
			$.getLayoutFlightPopupBottom = function(){
				var html_notificaton = '';

				html_notificaton += '</div>';
											html_notificaton += '</div>';
											html_notificaton += '</div>';
										html_notificaton += '</div>';
									html_notificaton += '</div>';
									html_notificaton += '<div class="clearfix"></div>';
								html_notificaton += '</div>';
								// ############## END flight_pax_content ######
							html_notificaton += '</div>';
							// ############END flight pax ########
						html_notificaton += '</div>';
						// html_notificaton += '</center>';
						html_notificaton += '<div class="clearfixed"></div>';
					html_notificaton += '</div>';
					// ######## End Flight Status Information #################
					// #END Flight Information Status
				html_notificaton += '</div>';
				return html_notificaton;
			}
			// *************end part popup bottom 

			// Layout Grid Time ################
			$.getLayoutGridTime = function(){
				var html = "";
				var html_str = "";
				var aircraft_num = $("#aircraft_num").val();
				var j=1;
				// html += '<div style="padding-left:2px;position: absolute;width: 1502px;z-index: -1;">';
				html += '<div style="padding-left:2px;position: absolute;width: 1502px;z-index: -1;">';
				for(j=1;j<=aircraft_num;j++){
					html += '<!-- Aircraft-Cell -->';
					// html += '<div class="column" style="position: relative;display: block;width:100%;">';
					html += '<div class="column" style="width:100%;">';
					html += '<!-- grid-flight-time perday -->';
					// alert(schedule_data.countAircraft);
					html += '<div data-value="0000" id="'+j+'" class="droppable cell"></div><div data-value="0100" id="'+j+'" class="droppable cell"></div><div data-value="0200" id="'+j+'" class="droppable cell"></div><div data-value="0300" id="'+j+'" class="droppable cell"></div><div data-value="0400" id="'+j+'" class="droppable cell"></div><div data-value="0500" id="'+j+'" class="droppable cell"></div><div data-value="0600" id="'+j+'" class="droppable cell"></div><div data-value="0700" id="'+j+'" class="droppable cell"></div><div data-value="0800" id="'+j+'" class="droppable cell"></div><div data-value="0900" id="'+j+'" class="droppable cell"></div><div data-value="1000" id="'+j+'" class="droppable cell"></div><div data-value="1100" id="'+j+'" class="droppable cell"></div><div data-value="1200" id="'+j+'" class="droppable cell"></div><div data-value="1300" id="'+j+'" class="droppable cell"></div><div data-value="1400" id="'+j+'" class="droppable cell"></div><div data-value="1500" id="'+j+'" class="droppable cell"></div><div data-value="1600" id="'+j+'" class="droppable cell"></div><div data-value="1700" id="'+j+'" class="droppable cell"></div><div data-value="1800" id="'+j+'" class="droppable cell"></div><div data-value="1900" id="'+j+'" class="droppable cell"></div><div data-value="2000" id="'+j+'" class="droppable cell"></div><div data-value="2100" id="'+j+'" class="droppable cell"></div><div data-value="2200" id="'+j+'" class="droppable cell"></div><div data-value="2300" id="'+j+'" class="droppable cell"></div></div>';
				}
				html += '</div>';
				
				html += '</div>';
				
				html += $.gridTime();

				// block layout time ##############
				html +='</div>';


				$("#number_increases").val(i*100);
				return html;
			}

			// gridTime #########
			$.gridTime = function(){

				var html_str = '';
				var gt_timeline_class = '';
				@if(isset($_REQUEST['default_utc']))
					gt_timeline_class = 'gt_timeline_schedule';
				@else
					gt_timeline_class = 'gt-timeline';
				@endif

				html_str += '<!-- gt-timeline ###################-->';
				html_str = '<div class="main_line"></div><div class="bottom_line"></div>';
				html_str += '<div class="'+gt_timeline_class+'" style="z-index: -100"><div class="horizontal-line month-line even-month" style="left:12.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:25px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:37.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:62.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:75px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:87.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:112.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:125px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:137.5px"><div class="second">45</div></div><!-- second --><div class="horizontal-line month-line even-month" style="left:162.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:175px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:187.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:212.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:225px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:237.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:262.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:275px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:287.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:312.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:325px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:337.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:362.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:375px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:387.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:412.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:425px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:437.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:462.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:475px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:487.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:512.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:525px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:537.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:562.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:575px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:587.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:612.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:625px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:637.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:662.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:675px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:687.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:712.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:725px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:737.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:762.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:775px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:787.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:812.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:825px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:837.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:862.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:875px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:887.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:912.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:925px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:937.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:962.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:975px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:987.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1012.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1025px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1037.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1062.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1075px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1087.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1112.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1125px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1137.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1162.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1175px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1187.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line leftend" style="left:0px"><div class="year">0000</div></div><div class="horizontal-line leftend" style="left:50px"><div class="year">0100</div></div><div class="horizontal-line leftend" style="left:100px"><div class="year">0200</div></div><div class="horizontal-line leftend" style="left:150px"><div class="year">0300</div></div><div class="horizontal-line leftend" style="left:200px"><div class="year">0400</div></div><div class="horizontal-line leftend" style="left:250px"><div class="year">0500</div></div><div class="horizontal-line leftend" style="left:300px"><div class="year">0600</div></div><div class="horizontal-line leftend" style="left:350px"><div class="year">0700</div></div><div class="horizontal-line leftend" style="left:400px"><div class="year">0800</div></div><div class="horizontal-line leftend" style="left:450px"><div class="year">0900</div></div><div class="horizontal-line leftend" style="left:500px"><div class="year">1000</div></div><div class="horizontal-line leftend" style="left:550px"><div class="year">1100</div></div><div class="horizontal-line leftend" style="left:600px"><div class="year">1200</div></div><div class="horizontal-line leftend" style="left:650px"><div class="year">1300</div></div><div class="horizontal-line leftend" style="left:700px"><div class="year">1400</div></div><div class="horizontal-line leftend" style="left:750px"><div class="year">1500</div></div><div class="horizontal-line leftend" style="left:800px"><div class="year">1600</div></div><div class="horizontal-line leftend" style="left:850px"><div class="year">1700</div></div><div class="horizontal-line leftend" style="left:900px"><div class="year">1800</div></div><div class="horizontal-line leftend" style="left:950px"><div class="year">1900</div></div><div class="horizontal-line leftend" style="left:1000px"><div class="year">2000</div></div><div class="horizontal-line leftend" style="left:1050px"><div class="year">2100</div></div><div class="horizontal-line leftend" style="left:1100px"><div class="year">2200</div></div><div class="horizontal-line leftend" style="left:1150px"><div class="year">2300</div></div></div></div>';

					return html_str;
			}

			// RealTimeLine Auto Running
			$.timeline = function(){
				var utc_default_timess = $('#DEFAULT_UTC_TIME').val();
				var timeline='';
				
				if(utc_default_timess==2){
					timeline += '<div style="margin-left: <?php echo $total_d_h;?>px;position: absolute;">';
					timeline += '<!-- timeline-left -->';
					timeline += '<div class="timeline-left" style="display: block;">';
					timeline += '<div class="timeline_active">';
					timeline += '<div class="second_time"><center><small class="second_running">00</small></center></div>';
					timeline += '<div class="timeline_running"></div>';
					timeline += '</div>';
					timeline += '</div>';
				}else{

					timeline += '<!-- timeline-left -->';
					timeline += '<div class="timeline-left-utc" style="display: block;">';
					timeline += '<div class="timeline_active">';
					timeline += '<div class="second_time_utc"><center><small class="second_running_utc">00</small></center></div>';
					timeline += '<div class="timeline_running_utc"></div>';
					timeline += '</div>';
					timeline += '</div>';
					timeline += '</div>';
				}
				// return $("#time_line_show").html(timeline);
				return timeline;
				// return timeline;
			}

			// ###########
			$.getScheduleBySwithUTC_Option = function(){
				$("#loading").show();
				$.ajax({
					url: "{{url('admin/getScheduleMgrByBetweenDate')}}",
					type:'post',

					data:{
						filter_from_date: filter_from.val(),
						filter_to_date: filter_to.val(),
						flight_number: flight_number.val(),
						company: company.val(),
						utc_default_time: utc_default_time,
					},

					dataType: 'json',
					beforeSend: function() {
						$("#loading").show();
						// $('#button-cart-customize').button('loading');
						// alert('beforesend');
					},
					complete: function() {
						$("#loading").hide();
						// $('#button-cart-customize').button('reset');
						// alert('testing');
					},
					success: function(data) {
						$.getLayoutTimeLineHtml(data);
						var html ='';
						
						if(utc_default_time==1){
							var visible_utc = 'style="display: block;cursor: pointer;"';
							var visible_local = 'style="display: none;cursor: pointer;"';
						}else if(utc_default_time==2){
							var visible_utc = 'style="display: none;cursor: pointer;"';
							var visible_local = 'style="display: block;cursor: pointer;"';
						}else{
							alert("Error, Please contact administrator!");
							return false;
						}
						
						html += '<div id="local-time-title" class="utc-time-title" '+visible_local+'>Local Time <span class="pull-right"><i class="fa fa-wa fa-chevron-circle-right"></i></span></div>';

						html += '<div id="utc-time-title" class="utc-time-title" '+visible_utc+'>All Time In UTC <span class="pull-right"><i class="fa fa-wa fa-chevron-circle-right"></i></span></div>';

						$("#utc-default-content").html(html);
						$.eventallData();
					},
					error: function(xhr, ajaxOptions, thrownError){
						alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});
			};

			// ClearCheckbox
			function ClearCheckbox(){
				var w = document.getElementsByTagName('input');
				for(var i = 0; i < w.length; i++){
					if(w[i].type=='checkbox'){
						w[i].checked = false;
					}
				}
			}

			// initSwapF
			function initSwapF(swap_id) {
				var filter_from = $("#filter_from").val();
				var filter_to = $("#filter_to").val();
				var flight_number = $("#flight_number").val();
				var href='{{url("admin/schedule_monitor")}}?filter_from='+filter_from+'&filter_to='+filter_to+'&flight_number='+flight_number+'&swap='+swap_id+'';
				window.location.href = href;
			}

			// initSwapBack
			function initSwapBack(swap_id) {
				var filter_from = $("#filter_from").val();
				var filter_to = $("#filter_to").val();
				var flight_number = $("#flight_number").val();
				var href='{{url("admin/schedule_monitor")}}?filter_from='+filter_from+'&filter_to='+filter_to+'&flight_number='+flight_number+'&swap='+swap_id+''; 
				window.location.href = href;
			}

			// refreshDiv
			function refreshDiv(){
				var image = $("#loading");
				image.show();
				image.css("position","fixed");
				image.css("top", ($(window).height() / 2) - (image.outerHeight() / 2));
				image.css("left", ($(window).width() / 2) - (image.outerWidth() / 2));
			}

			// InitFlightPax_UTC Onclick Action to Animate Dropdown Flight Pax when user click on FLight number 
			function InitFlightPax_UTC(fsm_id){
				// hide popup flightnotification
				$('#arrow-up-right-click'+fsm_id+'').hide(); 
				$('#flight_pax_main_UTC_right_click'+fsm_id+'').hide();
				// fms_id refers to Flight Schedule ID
				$('#flight_pax_main_UTC'+fsm_id+'').toggle("slide", { direction: "top" }, 100);
				$('#arrow-up'+fsm_id+'').toggle("slide", { direction: "top" }, 100);
				var flight_pax_id = $("#flight_pax_id").val(fsm_id);
			}

		// CloseRightClick
		function InitCloseRightClick(fsm_id){
			$('#arrow-up-right-click'+fsm_id+'').hide(); 
			$('#flight_pax_main_UTC_right_click'+fsm_id+'').hide();
		} 

		function InitFlightPax(fsm_id){
			// $('#flight_pax_main'+fsm_id+'').toggle("slide", { direction: "left" }, 10);
			// var flight_pax_id = $("#flight_pax_id").val(fsm_id); 
			$('#flight_pax_main_UTC'+fsm_id+'').toggle("slide", { direction: "left" }, 10);
			var flight_pax_id = $("#flight_pax_id").val(fsm_id);
		}

		

		var utc_default_timess = $('#DEFAULT_UTC_TIME').val();
		var filter_from = $("input[name='filter_from']");
		var company = $("select[name='company']");
		var filter_to = $("input[name='filter_to']");
		var flight_number = $("input[name='flight_number']");
		var ajax_load_date = $("input[name='ajax_load_date']");
		var utc_default_time = $("#DEFAULT_UTC_TIME").val();
		var flag_check='';

		// Draggable
		// Onchange Loading By Calendar to get Record from FLight Schedules
		// var isFirstLoad = true;
		// Window First Loadin to get Flight Schedule Capture Current date Filter From by add 7 day for Filter To

		$(window).load(function(){
			// Load Time Grid
			var current_date = $("#filter_from").val();
			var date = new Date(current_date);
			var increase_date = date.setDate(date.getDate() + 6);
			var new_date = date.toString('yyyy-MM-dd');
			
			// $("#filter_to").val(new_date);
			@if(!isset($_REQUEST['filter_to']))
				$("#ajax_load_date").val(new_date);
			@endif

			$("#filter_date_hidden").val(current_date);
			// Search Date
			$("#search_date_from").html(current_date)+" - ";
			$("#search_date_to").html(new_date);
			// #End Search Date
			// Clear 
			$.ClearValue();
			// Loop Date Repeat to another date
			$.getSchedule();
			// $.getScheduleAssignment();
			// Clear Checkbox
			ClearCheckbox();
		});

		// Clear
		$.ClearValue = function(){
			// Clear
			$("#fsm_id").val("");
			$("#number_decrease").val("");
			$("#number_increase").val("");
			$("#aircraft_id").val("");
			$("#schedule_swap").val("");
			$("#aircraft_swap").val("");
			$("#capture_date_from_load").val("");
			// aircraft_change_id stay in context_menu_script.blade.php
			$("#aircraft_change_id").val("");
			$("#is_diverted").val("");
		}

		// CheckUTC_TIME
		$.CheckUTC_TIME = function(){
			$.ajax({ 
				url: "{{url('admin/schedule_monitor/CheckUTC_TIME')}}", 
				type:'post', 
				data:{utc_default_time:utc_default_time}, 
				// data:  $('#flight_status input[type=\'text\']), 
				// data:  $('#flight_status input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'), 
				dataType: 'json', 
				beforeSend: function() { 
					$("#loading").show(); 
					// $('#button-cart-customize').button('loading'); 
					// alert('beforesend'); 
				},
				complete: function() {
					$("#loading").hide();
					// $('#button-cart-customize').button('reset');
					// alert('testing');
				},
				success: function(utc_default_time) {

					var html ='';
					if(utc_default_time==1){
						var visible_utc = 'style="display: block;cursor: pointer;"';
						var visible_local = 'style="display: none;cursor: pointer;"';
					}else if(utc_default_time==2){
						var visible_utc = 'style="display: none;cursor: pointer;"';
						var visible_local = 'style="display: block;cursor: pointer;"';
					}else{
						alert("Error, Please contact administrator!");
						return false;
					}
					
					html += '<div id="local-time-title" class="utc-time-title" '+visible_local+'>Local Time <span class="pull-right"><i class="fa fa-wa fa-chevron-circle-right"></i></span></div>';

					html += '<div id="utc-time-title" class="utc-time-title" '+visible_utc+'>All Time In UTC <span class="pull-right"><i class="fa fa-wa fa-chevron-circle-right"></i></span></div>';

					$("#utc-default-content").html(html);
					$.eventallData();
				},

				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}

			});
		}

		// eventallData
		$.eventallData = function(event){
			$('.date-picker').datepicker({ 
		    format: 'yyyy-mm-dd',
		    autoclose: true,
		    //startDate: today
	    });

			// block_divert_to
			$(document).ready(function(){
				$('input[type="checkbox"]').click(function(){
					var fsm_id = $(this).data("value");
					if($(this).is(":checked")){
						// alert(fsm_id);
						// alert("Checkbox is checked.");
						$("#block_divert_to"+fsm_id+"").show();
						$("#is_diverted"+fsm_id+"").val(fsm_id);
						return true;
					}
					else if($(this).is(":not(:checked)")){
						// alert("Checkbox is unchecked.");
						$("#block_divert_to"+fsm_id+"").hide();
						$("#is_diverted"+fsm_id+"").val("");
						return true;
					}
				});
			});

			// if check on is divert
			// $("#is_divert").change(function(event){
			//   if(this.checked){
			//     var data_val = $(this).data("value");
			//     alert(data_val);
			//     // alert("You have elected to show your checkout history.");
			//   } else {
			//     alert("You have elected to turn off checkout history.");
			//   }
			// });

			// draggable_flight ########
			$(".draggable_flight").draggable({
				revert: true,
				revertDuration: 600,
			});

			$(".droppable").droppable({
				accept: '.draggable_flight',
				over: function(event, ui) {
					$('.droppable').addClass('highlighter');
					$(this).css('background-color', 'red');
				},
				out: function(event, ui) {
					$(".draggable_flight").draggable({ revert: true });
					$(this).css('background-color', '');
					$('.droppable').removeClass('highlighter');
				},    
				drop: function() { 
					$(".draggable_flight").draggable({ revert: false });
					$("#draggable_aircraft").val($(this).attr('id'));
				}
			});

			
			$(document).on("contextmenu", "#contextMenuOption", function(e){
				var fsm_id = $(this).data("value");
				var fsm_id_val = $("#fsm_id").val(fsm_id);
				// show option settings
				// $('#show_option_settings').show();
				$('#arrow-up-right-click'+fsm_id+'').show(); 
				$('#flight_pax_main_UTC_right_click'+fsm_id+'').show();

				$('#flight_pax_main_UTC'+fsm_id+'').hide();//toggle("slide", { direction: "top" }, 100);
				$('#arrow-up'+fsm_id+'').hide();//toggle("slide", { direction: "top" }, 100);

				return false;
			});

			// contextMenuOption
			$(document).on("contextmenu", "#contextMenuOption", function(e){
				var fsm_id = $(this).data("value");
				var fsm_id_val = $("#fsm_id").val(fsm_id);
				// show option settings
				// $('#show_option_settings').show();
				$('#arrow-up-right-click'+fsm_id+'').show(); 
				$('#flight_pax_main_UTC_right_click'+fsm_id+'').show();

				$('#flight_pax_main_UTC'+fsm_id+'').hide();//toggle("slide", { direction: "top" }, 100);
				$('#arrow-up'+fsm_id+'').hide();//toggle("slide", { direction: "top" }, 100);

				return false;
			});

			// Checkbox Swap Flight
			// $('.checkflightSchedule input:checkbox').change(function(){
			$('.checkflightSchedule').click(function(){
				var tempValue='';
				tempValue=$('.checkflightSchedule input:checkbox').map(function(n){
					if(this.checked){
						return  this.value;
					};
				}).get().join(',');
				// console.log(tempValue);
				$('#schedule_swap').val(tempValue);
			})

			@if(isset($_REQUEST['swap']))
				@if($_REQUEST['swap']==0)
					// initSwapAction
					$('.initSwapAction').click(function() {
						var fsm_id = $(this).data("value");
						$(this).toggleClass('active-swap');
						// $(this)toggle("background-color",'blue');
					});
				@endif
			@endif

			// Prevent All Script Event
			$("#flight_pax_double a").dblclick(function(e){
				e.preventDefault();
				var flight_pax_id = $("#flight_pax_id").val();
				// alert(flight_pax_id);
				var href = "{{url('admin/schedule_monitor/flight_log')}}?id="+flight_pax_id;
				// window.location = href;
			});

			$("#utc-time-title").click(function (){
				// if user perform action on utc time switch
				// Set default local time = 2
				var utc_default_time = $('#DEFAULT_UTC_TIME').val(2);

				// UTC Toogle
				$('#local-time-title').show();
				$('#utc-time-title').hide();
				// $('#local-time-title').toggle("slide", { direction: "left" }, 1);
				// $('#utc-time-title').toggle("slide", { direction: "left" }, 1);

				$(".timeline-left").show();
				$(".timeline-left-utc").hide();
				 // utctime_grid
				$('.schedule_content').show();
				$('.schedule_UTC_content').hide();
				// $.getScheduleBySwithUTC_Option();
			
			});

			$("#local-time-title").click(function (){
				// if user perform action on utc time switch
				// Set default UTC time = 1
				$('#DEFAULT_UTC_TIME').val(1);

				// UTC Toogle
				$('#local-time-title').hide();
				$('#utc-time-title').show();
				// $('#utc-time-title').toggle("slide", { direction: "left" }, 1);
				// $('#local-time-title').toggle("slide", { direction: "left" }, 1);

				$(".timeline-left-utc").show();
				$(".timeline-left").hide();

				// utctime_grid
				$('.schedule_UTC_content').show();
				$('.schedule_content').hide();
				// $.getScheduleBySwithUTC_Option();
				// $.getSchedule();
			});
		}
		// #END function
</script>

<script type="text/javascript">
	$(document).ready(function() {
		// Making 2 variable month and day
		var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
		var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

		// make single object
		var newDate = new Date();
		// make current time
		newDate.setDate(newDate.getDate());
		// setting date and time
		$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

		setInterval( function() {
		// Create a newDate() object and extract the seconds of the current time on the visitor's
		var seconds = new Date().getSeconds();
		// Add a leading zero to seconds value
		$("#sec,.second_running").html(( seconds < 10 ? "0" : "" ) + seconds);
		},1000);

		setInterval( function() {
		// Create a newDate() object and extract the minutes of the current time on the visitor's
		var minutes = new Date().getMinutes();

		// Add a leading zero to the minutes value
		$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
		//},1000);
		
		//setInterval( function() {
		// Create a newDate() object and extract the hours of the current time on the visitor's
		var hours = new Date().getHours();
		// Add a leading zero to the hours value

		$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
		var total_grid_colume = 50;

		// var total_gridTime = parseInt(minutes)-5 + parseInt(hours) * total_grid_colume;
		var total_gridTime = parseInt(minutes)-5 + parseInt(hours) * total_grid_colume;

		// var total_gridTime_utc = parseInt(minutes) + parseInt(hours) * total_grid_colume - 7*50;

		// var total_gridTime = parseInt(minutes) + parseInt(hours) * total_grid_colume - 7*50;

		$(".timeline-left").css("margin-left", total_gridTime + "px");
		// $(".timeline-left-utc").css("margin-left", total_gridTime_utc + "px");
		}, 1000);
	});

	$(document).ready(function() {
		// Making 2 variable month and day
		var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
		var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

		// make single object
		var newDate = new Date();
		// make current time
		newDate.setDate(newDate.getDate());
		// setting date and time
		$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

		setInterval( function() {
		// Create a newDate() object and extract the seconds of the current time on the visitor's
		var seconds = new Date().getSeconds();
		// Add a leading zero to seconds value
		$("#sec,.second_running_utc").html(( seconds < 10 ? "0" : "" ) + seconds);
		},1000);

		setInterval( function() {
		// Create a newDate() object and extract the minutes of the current time on the visitor's
		var minutes = new Date().getMinutes();

		// Add a leading zero to the minutes value
		$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
		//},1000);
		
		//setInterval( function() {
		// Create a newDate() object and extract the hours of the current time on the visitor's
		var hours = new Date().getHours();
		// Add a leading zero to the hours value

		$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
		var total_grid_colume = 50;

		var total_gridTime = parseInt(minutes)-5 + parseInt(hours) * total_grid_colume - 7*50;

		// var total_gridTime_utc = parseInt(minutes) + parseInt(hours) * total_grid_colume - 7*50;

		// var total_gridTime = parseInt(minutes) + parseInt(hours) * total_grid_colume - 7*50;

		$(".timeline-left-utc").css("margin-left", total_gridTime + "px");
		// $(".timeline-left-utc").css("margin-left", total_gridTime_utc + "px");
		}, 1000);
	});
</script>

<script type="text/javascript">
	setInterval(function () {
		var i =1;
		var v = $(".timeline_active").css("left").replace("px", "");
		$(".timeline_active").css("left", parseInt(v)+1);
		i++;
	}, 60000);
	setInterval(function () {
		var i =1;
		$('.second_running').html(parseInt($('.second_running').html()) + 1);
		i++;
	}, 1000);
</script>