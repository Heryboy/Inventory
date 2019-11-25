@extends('admin.common.layout') 
@section('content')
<!-- header -->
@include('admin.common.header')

  <?php
    // $scheduledate=date('Y-m-d');
    // $std="22:15:00";
    // $sta="02:50:00";
    // $stds = date_create($scheduledate.' '.$std);
    // $stas = date_create($scheduledate.' '.$sta);
    // $calculate_duration_flight = date_diff($stas,$stds);
    // echo $calculate_duration_flight->i;
    // $new_std_hour = date("H",strtotime($std));
    // $new_sta_hour = date("H",strtotime($sta));
    // if($new_std_hour>$new_sta_hour){
    //    $time_cal = (24 + $new_sta_hour) - $new_std_hour;
    // }
    //24 - date("H",strtotime($result->STD));
    // $calculate_duration_flight = date_diff($stas,$stds);
    // echo $calculate_duration_flight->h;
  ?>

  <script type="text/javascript">
    $(function(){
      $("#rClick").on('contextmenu', function(e){
        alert($(this).attr('id'));
        return false;
      });
    });
  </script>

  <style type="text/css">
    html body .container.body{background:none !important;}
    .x_panel{border: 0px solid #f00 !important;}
  </style>

  <!-- color status -->
  <input type="hidden" name="color_updated" id="color_updated" value="{{$color_updated}}">
  <input type="hidden" name="color_completed" id="color_completed" value="{{$color_completed}}">
  <input type="hidden" name="color_no_update" id="color_no_update" value="{{$color_no_update}}">
  <!-- Schedule Swap -->
  <input type="hidden" placeholder="Swap Schedule" name="schedule_swap" id="schedule_swap">
  <input type="hidden" placeholder="Swap Aircraft" name="aircraft_swap" id="aircraft_swap">
  <!-- This flag for check about status cancell if flight status cancel will not show show on Operations assign -->
  <input type="hidden" value="1" placeholder="Flag Schedule Monitor or Operation Assign" name="is_flight_cancel" id="is_flight_cancel">

  <!-- finish -->
  <div>
    
    <!-- block -->
    <div class="flight-search padding-bottom-lg">
      <div class="padding-top-sm container-fluid">

        <div class="row">
          <div class="col-sm-2">{!!trans('common.search_by_company')!!}</div>
          <div class="col-sm-2">{!!trans('common.search_flight_number')!!}</div>
          <div class="col-sm-2">{!!trans('common.filter_from')!!}</div>
          <div class="col-sm-2">{!!trans('common.filter_to')!!}<br></div>
        </div>

        <div class="row">
          <!-- col-sm-6 -->
          <div class="col-sm-2">
            <!-- !! Form::select('company', $company, null,['class'=>'form-control','id'=>'company','placeholder'=>'--Choose Company--']) !!}  -->
            <?php 
              $company_val='';
              if(isset($_REQUEST['company'])){
                $company_val=$_REQUEST['company'];
              }
            ?>
            
            <select name="company" id="company" class="form-control">
              <option value="">-- All Company --</option>
              @foreach($company as $companys)
              <option <?php if($company_val==$companys->id){echo 'selected="selected"';}?>  value="{{$companys->id}}">{{$companys->name}}</option>
              @endforeach
            </select>

            <!-- <input value="<?php //if(isset($_REQUEST['flight_number'])){echo $_REQUEST['flight_number'];}?>" name="flight_number" class="form-control" id="flight_number" placeholder="{!!trans('common.search_by_company')!!}" aria-describedby="inputSuccess2Status2" type="text"> -->
          </div>

          <!-- col-sm-6 -->
          <div class="col-sm-2">
            <input value="<?php if(isset($_REQUEST['flight_number'])){echo $_REQUEST['flight_number'];}?>" name="flight_number" class="form-control has-feedback-left" id="flight_number" placeholder="{!!trans('common.flight_number')!!}" aria-describedby="inputSuccess2Status2" type="text">

            <span class="fa fa-plane form-control-feedback left" aria-hidden="true"></span>
          </div>

          <input type="hidden" name="fsm_id" id="fsm_id">
          <input type="hidden" value="{{date('Y-m-d')}}" name="capture_current_date" id="capture_current_date">
          <input type="hidden" placeholder="capture_date_from_load" name="capture_date_from_load" id="capture_date_from_load">

          <input type="hidden" name="filter_date_hidden" id="filter_date_hidden">
          <input type="hidden" name="number_decrease" id="number_decrease">
          <input type="hidden" name="flight_pax_id" id="flight_pax_id" value="Flight Pax ID">
          <input type="hidden" value="100" name="number_increase" id="number_increase">
          <input type="hidden" value="<?php echo $countAircraft;?>" name="aircraft_num" id="aircraft_num">
          
          <?php 
            if(isset($_REQUEST['filter_from'])&&isset($_REQUEST['filter_to'])){
          ?>
            <input type="hidden" value="<?php echo $_REQUEST['filter_to'];?>" name="ajax_load_date" id="ajax_load_date">
          <?php
            }else{
          ?>
            <input type="hidden" name="ajax_load_date" id="ajax_load_date">
          <?php 
            }
          ?>

          <?php 
            if(isset($_REQUEST['filter_from'])&&isset($_REQUEST['filter_to'])){
          ?>
              <!-- col-sm-6 -->
              <div class="col-sm-2">
                <div class="form-group">
                  <div class="form-group">
                    <input required="required" value="{{$_REQUEST['filter_from']}}" name="filter_from" class="date-picker form-control has-feedback-left" id="filter_from" placeholder="Effective Date From" aria-describedby="inputSuccess2Status2" type="text">
                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
              </div>
              <!-- col-sm-6 -->
              <div class="col-sm-2">
                <div class="">
                  <div class="form-group">
                    <input required="required" value="{{$_REQUEST['filter_to']}}" name="filter_to" class="date-picker form-control has-feedback-left" id="filter_to" placeholder="Effective Date From" aria-describedby="inputSuccess2Status2" type="text">
                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                    <?php 
                      $swap_action=1;
                      $background = 'btn-primary';
                    ?>
                    @if(isset($_REQUEST['swap']))
                      <?php
                        $swap_action = $_REQUEST['swap'];
                        $background = "btn-danger";
                      ?>
                    @endif
                  </div>
                </div>
              </div>
              <input type="hidden" value="{{$swap_action}}" name="swap_action" id="swap_action">
          <?php 
            }else{
          ?>
              <?php 
                $newDate = Date('Y-m-d', strtotime("+6 days"));
              ?>
              <!-- col-sm-6 -->
              <div class="col-sm-2">
                <div class="form-group">
                  <div class="form-group">
                    <input required="required" value="{{ date('Y-m-d')}}" name="filter_from" class="date-picker form-control has-feedback-left" id="filter_from" placeholder="Effective Date From" aria-describedby="inputSuccess2Status2" type="text">
                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
              </div>
              <!-- col-sm-6 -->
              <div class="col-sm-2">
                <div class="">
                  <div class="form-group">
                    <input required="required" value="<?php echo $newDate;?>" name="filter_to" class="date-picker form-control has-feedback-left" id="filter_to" placeholder="Effective Date From" aria-describedby="inputSuccess2Status2" type="text">
                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                    <?php 
                      $swap_action=1;
                      $background = 'btn-primary';
                    ?>
                    @if(isset($_REQUEST['swap']))
                      <?php 
                        $swap_action = $_REQUEST['swap'];
                        $background = "btn-danger";
                      ?>
                    @endif

                  </div>
                </div>
              </div>
              <input type="hidden" value="{{$swap_action}}" name="swap_action" id="swap_action">

          <?php
            }
          ?> 
          
          <!-- Search Flight Number -->
          <div class="col-sm-1">
            <a href="javascript:void(0);" id="initSearchFlightNumber" class="btn btn-primary btn-md" data-original-title="{!!trans('common.search')!!}" data-toggle="tooltip" data-placement="top"><i class="fa fa-wa fa-search"></i></a>
          </div>

          <!-- col-sm-6 -->
          <div class="col-sm-3" style="font-size:16px;top:-20px;">
            <span class="pull-right"><i class="fa fa-wa fa-clock-o"></i> {!!trans('common.date')!!}: <?php echo date('d-M-Y');?> | <span id="hours"></span>:<span id="min"></span>:<span id="sec"></span></span>
          </div>
        </div>

        <div class="row">
          <!-- col-sm-3 -->
           <div class="col-sm-12" style="margin-top:10px;">
            <div class="row">
              <center>
                <div class="current-date"><h3>

                <div class="col-sm-12">
                  <?php 
                    if(isset($_REQUEST['filter_from'])){
                      
                    }else{
                      
                    }
                  ?>
                  <!-- {!!trans('flightschedule/schedulemonitor.from_date')!!}: <span id="search_date_from"></span> -

                  {!!trans('flightschedule/schedulemonitor.to_date')!!}: <span id="search_date_to"></span> -->
                </div>
                <div class="clearfixed"></div>
              </center>
            </div>
           </div>
        </div>

      </div>
      <div class="clearfix"></div>
    </div>

    <!-- search-flight -->
    <div class="flight-remark padding-bottom-lg">
      <!-- col-sm-5 -->
      <div class="col-sm-8">
        <div class="row">
        
          <!-- col-sm-4 -->
          <div class="col-sm-3">
            <!-- clock-time-zone -->
            <div class="clock-time-zone bg-gray color-parent" style="max-height: 150px;height: 100px;">
              <div class="header"><center>{!!trans('flightschedule/schedulemonitor.update_status')!!}</center></div>
              <div class="padding-xs">
                <!-- row -->
                <div class="row">

                  @foreach($UpdateStatus as $status)
                    <div class="col-sm-6">
                      <div class="status_flight pull-left">
                        <div style="width: 10px !important;height: 10px !important;background: {{$status->color}} !important;color: #fff;" class="width-box"></div> 
                      </div>
                      <span class="pull-left"><small>{{$status->name}}</small></span>
                    </div>
                  @endforeach
                  
                 </div>
              </div>
            </div>
          </div>

          <!-- col-sm-4 -->
          <div class="col-sm-3">
            <!-- clock-time-zone -->
            <div class="clock-time-zone bg-gray color-parent" style="max-height: 150px;height: 100px;">
              <div class="header"><center>{!!trans('flightschedule/schedulemonitor.notification_status')!!}</center></div>
              <div class="padding-xs">
                <!-- row -->
                <div class="row">

                  @foreach($FlightNotifications as $FlightNotification)
                  <div class="col-sm-6">
                    <div class="status_flight pull-left">
                      <div style="width: 10px !important;height: 10px !important;background: {{$FlightNotification->color}} !important;color: #fff;" class="width-box"></div> 
                    </div>
                    <span class="pull-left"><small>{{$FlightNotification->name}}</small></span>
                  </div>
                  @endforeach
                  
                 </div>
              </div>
            </div>
          </div>

          <!-- col-sm-4 -->
          <div class="col-sm-3">
            <!-- clock-time-zone -->
            <div class="clock-time-zone bg-gray color-parent" style="max-height: 150px;height: 100px;">
              <div class="header"><center>{!!trans('flightschedule/schedulemonitor.flight_status')!!}</center></div>
              <div class="padding-xs">
                <!-- row -->
                <div class="row">

                  @foreach($FlightStatus as $Status)
                  <div class="col-sm-6">
                    <div class="status_flight pull-left">
                      <div style="width: 10px !important;height: 10px !important;background: {{$Status->color}} !important;color: #fff;" class="width-box"></div> 
                    </div>
                    <span class="pull-left"><small>{{$Status->name}}</small></span>
                  </div>
                  @endforeach
                  
                 </div>
              </div>
            </div>
          </div>

          <!-- col-sm-4 -->
          <div class="col-sm-3">
            <!-- clock-time-zone -->
            <div class="clock-time-zone bg-gray color-parent" style="max-height: 150px;height: 100px;">
              <div class="header"><center>{!!trans('flightschedule/schedulemonitor.pax_movement')!!}</center></div>
              <div class="padding-xs">
                <!-- row -->
                <div class="row">

                  @foreach($PaxsMovement as $PaxsMovement)
                    <div class="col-sm-6">
                      <div class="status_flight pull-left">
                        <div style="width: 10px !important;height: 10px !important;background: {{$PaxsMovement->color}} !important;color: #fff;" class="width-box"></div> 
                      </div>
                      <span class="pull-left"><small>{{$PaxsMovement->name}}</small></span>
                    </div>
                  @endforeach
                  
                 </div>
              </div>
            </div>
          </div>

        </div>
      </div>

       <style type="text/css">
       .asdf{border:;}
       </style>
       <!-- col-sm-5 -->
       <div class="col-sm-4">
          <div class="pull-right">
          <form action="{{url("/admin/getPrint")}}" method="put" class="form-horizontal form-label-left" enctype="multipart/data" target="_blank">

            @if($write_permission_sm==1)
              <a onclick="initSwapFlight();" data-original-title="SWAP ACTION" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" class="btn btn-primary btn-lg">
                <i class="fa fa-wa fa-pencil"></i> {!!trans('flightschedule/schedulemonitor.swap')!!}
              </a>

              @if(isset($_REQUEST['swap']))
                <?php
                  if($_REQUEST['swap']==0){
                ?>
                    <a onclick="initSwapBack(1);" data-original-title="SWAP" data-toggle="tooltip" data-placement="top" href="javascript:voide(0);" class="btn btn-danger btn-lg">
                      <i class="fa fa-exchange"></i>
                    </a>
                <?php    
                  }else{
                ?>
                    <a onclick="initSwapF(0);" data-original-title="SWAP" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" class="btn btn-primary btn-lg">
                      <i class="fa fa-exchange"></i>
                    </a>
                <?php
                  }
                ?>
              @else
                <a onclick="initSwapF(0);" data-original-title="SWAP" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" class="btn {{$background}} btn-lg">
                  <i class="fa fa-exchange"></i>
                </a>
              @endif

              <a type="button" target="_blank" data-original-title="{!!trans('flightschedule/schedulemonitor.add_flight')!!}" data-placement="top" data-toggle="tooltip" data-target=".bs-example-modal-sm" data-placement="top" href="{{url('admin/setup_mgr/schedule')}}" class="btn btn-primary btn-lg"><i class="fa fa-wa fa-plane"></i></a>

            @endif

              <input type="hidden" name="from_date" id="from_date" value="" />
              <input type="hidden" name="to_date", id="to_date" value="" />
              <button type="button" onClick="printSchedule()" id="print_id" data-original-title="{!!trans('common.print_flight')!!}" data-toggle="tooltip" data-placement="top" href="#" class="btn btn-primary btn-lg">
                <i class="fa fa-print"></i> PRINT
              </button> 
              
              <a data-original-title="{!!trans('common.view_reports')!!}" data-toggle="tooltip" data-placement="top" onClick="init_print_report();" href="javascript:void();" class="btn btn-primary btn-lg"><i class="fa fa-wa fa-bar-chart"></i></a>



              <!-- zoom in /out -->
              <div class="col-sm-12" style="margin-top:20px;">Zoom In/Out: &nbsp;
                <a data-original-title="Zoom Out" data-toggle="tooltip" data-placement="top" target="_blank" href="#" class="btn btn-primary btn-sm"><i class="fa fa-wa fa-plus"></i></a>

                <a data-original-title="Zoom In" data-toggle="tooltip" data-placement="top" target="_blank" href="#" class="btn btn-primary btn-sm"><i class="fa fa-wa fa-minus"></i></a>
              </div>

            </form>
          </div>
       </div>

       <!-- Request a Flight ########### -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h2 class="modal-title" id="myModalLabel2">{!!trans('common.request_flight')!!}</h2>
              </div>
              <div class="modal-body">
                {!! Form::open(['url' => 'admin/setup_mgr/schedule','files'=> true,'class'=>'form-horizontal']) !!}
                  <!-- page content -->
                  <div style="min-height: 650px;" class="-right_col" role="main">
                      <!-- row -->
                      <div class="row">
                        <!-- x_content -->
                        <div class="x_content">
                          <!-- col-sm-12 -->
                          <div class="col-sm-12">

                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('setup_mgr/schedule.flight_number')}} <span class="validate_label_red">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('flight_number',null,['placeholder'=>'Flight Number','class'=>'form-control']) !!}
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('setup_mgr/schedule.aircraft')}}</label>
                              <div class="col-sm-6">
                                <?php
                                  // $aircraft = ['0' => 'Select Branch'] + $aircraft; 
                                ?>
                                {!! Form::select('aircraft_id', $aircraft, null,['class'=>'form-control','placeholder'=>'--Choose Aircraft--']) !!} 

                                <!-- !! Form::select('branch_id',[null => 'Select Branch'] +$branch_info,null,['class'=>'form-control']) !!} -->
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/schedule.pax_movement')!!}</label>
                              <div class="col-sm-6">
                              {!! Form::select('pax_movement_id', $PaxMovements, null, ['optional' => 'Select Origin','class'=>'form-control','placeholder'=>'--Choose Pax Movement--']) !!}
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">{!!trans('setup_mgr/schedule.origin')!!} <span class="validate_label_red">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('origin_id', $FlightLocation, null, ['id'=>'origin_id','class'=>'form-control','placeholder'=>'--Choose Origin--']) !!}
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">{!!trans('setup_mgr/schedule.destination')!!} <span class="validate_label_red">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="destination_id" id="destination_id" class="form-control">
                                  <option value="">--Choose Destination--</option>
                                </select>
                              </div>
                            </div>

                            <!-- form-control -->
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/schedule.flight_notification_status')!!}
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                
                                {!! Form::select('fnotification_status_id', $FlightNotification, null, ['optional' => 'Select Flight Notification','class'=>'form-control','id'=>'fnotification_status_id']) !!}
                              </div>
                            </div>
                            
                            <!-- row -->
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/schedule.effective_date_from')!!} <span class="validate_label_red">*</span></label>
                              <!-- col-sm-6 -->
                              <div class="col-sm-6">
                                {!! Form::text('effective_from_date',null,['placeholder'=>'Effective Date From','class'=>'date-picker form-control has-feedback-left active','id'=>'-single_cal2']) !!}
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                              </div>
                            </div>
                            <!-- row -->

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/schedule.effective_date_to')!!} <span class="validate_label_red">*</span></label>
                              <!-- col-sm-6 -->
                              <div class="col-sm-6">
                                {!! Form::text('effective_to_date',null,['placeholder'=>'Effective Date To','class'=>'date-picker form-control has-feedback-left active','id'=>'-single_cal22']) !!}
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                              </div>
                            </div>

                            <!-- row -->
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/schedule.flight_day')!!} <span class="validate_label_red">*</span></label>
                              <!-- col-sm-6 -->
                              <div class="col-sm-6" style="margin-top:8px;">
                                <label for="sun" style="margin-right:8px;">
                                  {!!trans('setup_mgr/schedule.sun')!!} <input class="flat" type="checkbox" value="7" name="flight_day[]">
                                </label>
                                <label for="mon" style="margin-right:8px;">
                                  {!!trans('setup_mgr/schedule.mon')!!} <input class="flat" type="checkbox" value="1" name="flight_day[]">
                                </label>
                                <label for="tue" style="margin-right:8px;">
                                  {!!trans('setup_mgr/schedule.tue')!!} <input class="flat" type="checkbox" value="2" name="flight_day[]">
                                </label>
                                <label for="wed" style="margin-right:8px;">
                                  {!!trans('setup_mgr/schedule.wed')!!} <input class="flat" type="checkbox" value="3" name="flight_day[]">
                                </label>
                                <label for="thu" style="margin-right:8px;">
                                  {!!trans('setup_mgr/schedule.thu')!!} <input class="flat" type="checkbox" value="4" name="flight_day[]">
                                </label>
                                <label for="fri" style="margin-right:8px;">
                                  {!!trans('setup_mgr/schedule.fri')!!} <input class="flat" type="checkbox" value="5" name="flight_day[]">
                                </label>
                                <label for="sat" style="margin-right:8px;">
                                  {!!trans('setup_mgr/schedule.sat')!!} <input class="flat" type="checkbox" value="6" name="flight_day[]">
                                </label>
                              </div>
                            </div>

                            <!-- row -->
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/schedule.schedule_time_departure')!!} <span class="validate_label_red">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <!-- <input placeholder="Effective Date From" class="date-picker form-control has-feedback-left active" id="-single_cal2" name="effective_from_date" type="text"> -->
                                {!! Form::text('STD',null,['placeholder'=>'Please, Enter Time only 4 digit.','class'=>'form-control col-sm-6 has-feedback-left','id'=>'STD','maxlength'=>'4']) !!}
                                <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                                  <!-- /.input group -->
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/schedule.schedule_time_arrival')!!} <span class="validate_label_red">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('STA',null,['placeholder'=>'Please, Enter Time only 4 digit.','class'=>'form-control col-sm-6 has-feedback-left','id'=>'STA','maxlength'=>'4']) 
                                !!}
                                <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/schedule.fuel')!!}
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('fuel',null,['class'=>'form-control col-md-7 col-xs-12','id'=>'fuel']) !!}
                                <ul id="parsley-id-0882" class="parsley-errors-list"></ul>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/schedule.nautical_miles')!!}
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('miles',null,['class'=>'form-control','id'=>'miles']) !!}
                                <ul id="parsley-id-0882" class="parsley-errors-list"></ul>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/schedule.number_pax')!!}
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('number_pax',null,['class'=>'form-control','id'=>'number_pax']) !!}
                              </div>
                            </div>

                             <!-- row -->
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/schedule.is_active')!!}?</label>
                              <!-- col-sm-6 -->
                              <div class="col-sm-6" style="margin-top:8px;">
                                <input class="flat" type="checkbox" value="1" name="is_active">
                              </div>  
                            </div>

                             <!-- row -->
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/schedule.is_approval')!!}?</label>
                              <!-- col-sm-6 -->
                              <div class="col-sm-6" style="margin-top:8px;">
                                <input class="flat" type="checkbox" value="1" name="is_approve">
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>

                  </div>
                  <!-- /page content -->
                {!! Form::close() !!}
                <!-- include('admin.schedule_monitor.schedule_form') -->

                <div style="display: none;">
                  <div class="row">
                    <!-- <label class="col-sm-3">MODIFIED : </label> -->
                    <label class="col-sm-6">Schedule Date</label>
                    <label class="col-sm-6">Origin</label>
                  </div>

                  <div class="row">
                    <!-- <div class="col-sm-3">&nbsp;</div> -->
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="STD">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="STA">
                    </div>
                  </div>

                  <div style="margin-top:15px;"></div>


                  <div class="row">
                    <!-- <label class="col-sm-3">SECTORS : </label> -->
                    <label class="col-sm-6">Origin</label>
                    <label class="col-sm-6">Destination</label>
                  </div>

                  <div class="row">
                    <!-- <label class="col-sm-3">&nbsp;</label> -->
                    <div class="col-sm-6">
                      <select class="form-control" name="origin_id"><option value="">--Please Select--</option></select>
                    </div>
                    <div class="col-sm-6"><select class="form-control" name="destination_id"><option value="">--Please Select--</option></select></div>
                  </div>

                  <div style="margin-top:15px;"></div>

                  <div class="row">
                    <!-- <label class="col-sm-3">TIME : </label> -->
                    <label class="col-sm-6">STD</label>
                    <label class="col-sm-6">STA</label>
                  </div>

                  <div class="row">
                    <!-- <label class="col-sm-3">&nbsp;</label> -->
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="STD">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="STA">
                    </div>
                  </div>
                </div>

              </div>
              <!-- <div class="modal-footer"> -->
              <div style="border-top: 1px solid #eee;padding-bottom: 5px;padding-top:10px;">
                <div class="pull-right">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                <div class="clearfix"></div>
              </div>
              <!-- </div> -->

            </div>
          </div>
        </div>

       <div class="clearfix"></div>
    </div>
    <?php
      $start = date_create('2015-02-26 12:01:00');
      $end = date_create('2015-02-26 13:14:00');
      $diff=date_diff($end,$start);

      // print_r($diff);
      if($diff->i<=9){
        echo '0'.$diff->h;
        echo '0'.$diff->i;  
      }
    ?>
    
    <!-- main-container -->
    <div class="main_container padding-bottom-lg">
      <!-- utc-time-switch -->
      <div class="utc-time pull-left">
        <center>
          
          @if(isset($_REQUEST['utc_default']))
            <input type="hidden" id="DEFAULT_UTC_TIME" name="DEFAULT_UTC_TIME" value="{{$_REQUEST['utc_default']}}">
          @else
            <input type="hidden" id="DEFAULT_UTC_TIME" name="DEFAULT_UTC_TIME" value="{{DEFAULT_UTC_TIME}}">
          @endif

          <div id="utc-default-content"></div>
          <input type="hidden" name="swap_aircraft_option" id="swap_aircraft_option">
          <!-- <div class="grid-flight">XU-112</div> -->
          <div class="grid-title-flight">
            <?php $i=1;?>
            @foreach($Aircrafts as $Aircraft)
              <div class="column">
                <div style="position:absolute;z-index:100;" class="aircraft_swap" data-value="{{$Aircraft->id}}">
                  <input style="display:none;" type="checkbox" class="-hidden-lg" value="{{$Aircraft->id}}" id="aircraft_option_{{$Aircraft->id}}" name="flight_schedule_mgr[]">
                </div>
                <!-- <a ctive-color" href="javascript:void(0);" onclick="init_airplane({{$Aircraft->id}});" data-value=""> -->
                <label for="aircraft_option_{{$Aircraft->id}}">
                  <div class="grid-cell airplane_value"><div class="flight-title aircraft-line-height">{{$Aircraft->name}}</div></div>
                  <input type="checkbox" name="aircraft[]" id="checkbox{{$Aircraft->id}}" style="display: none;">
                </label>
                <!-- </a> -->
              </div>
            <?php $i++;?>
            @endforeach
          </div>
        </center>
      </div>

      <script type="text/javascript">
        // toggle Action Airplane
        jQuery(".airplane_value").click(function(){
          jQuery(this).toggleClass('active-color');
        });

        $('.aircraft_swap').click(function(){
          var tempValue='';
          tempValue=$('.aircraft_swap input:checkbox').map(function(n){
            if(this.checked){
              return  this.value;
            };
          }).get().join(',');
          console.log(tempValue);
          $('#aircraft_swap').val(tempValue);
        })

        // clear Checkbox
        function ClearCheckbox(){ 
          var w = document.getElementsByTagName('input'); 
          for(var i = 0; i < w.length; i++){ 
            if(w[i].type=='checkbox'){ 
              w[i].checked = false; 
            }
          }
        }

        $(window).load(function(){
          ClearCheckbox();
        });
      </script>

      <!-- hidden text -->
      <!-- <input type="text" name="flight-schedule-arr" value="1:901,902" data-value=""> -->

      <?php 
        $total_d_co = '';
        $total_d_h = '';
        $current_date = date('Y-m-d');
        $startTimeStamp = strtotime($current_date);
        $endTimeStamp = strtotime(date("Y-m-d"));
        $timeDiff = abs($endTimeStamp - $startTimeStamp);
        $numberDays = $timeDiff/86400;
        $numberDays = intval($numberDays);
        $total_d_co = intval($numberDays)*(1177);
        $total_d_h = intval($numberDays)*(1200);
      ?>

      <div id="draggable2" class="draggable ui-widget-content">
        <!-- block-timeline -->
        <div class="gt-timeline" style="margin-left:-<?php echo $total_d_co;?>px;width:1200px;cursor: move;">
          <!-- time_line_show -->
          <div id="time_line_show"></div>
          <!-- ########## Display Dynamic Schedule -->
          <div id="displya_dynamic_time_schedule"></div>
          <!-- ########## End Display Dynamic Schedule -->
        </div>
        <!-- #END block-timeline -->
      </div>

      <div class="clearfix"></div>
    </div>

  </div>

  @include('admin.schedule_monitor.common.common_script')
  @include('admin.schedule_monitor.common.schedule_monitor_script')
  @include('admin.schedule_monitor.common.action_flight_script')
  @include('admin.schedule_monitor.common.dragablePullSchedule')
  <!-- context MenuSCript -->
  @include('admin.schedule_monitor.common.context_menu_script')
@endsection

