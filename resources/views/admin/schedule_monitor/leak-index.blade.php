@extends('admin.common.layout') 
@section('content')
<!-- header -->
@include('admin.common.header')
<style type="text/css">
  .x_panel{border: 0px solid #f00 !important;}
</style>


  <div>
    <!-- block -->
    <div class="flight-search padding-bottom-lg">
      <div class="padding-top-sm container-fluid">
        <div class="row">
          <div class="col-sm-2">{!!trans('common.search_flight_number')!!}</div>
          <div class="col-sm-2">{!!trans('common.filter_from')!!}</div>
          <div class="col-sm-2">{!!trans('common.filter_to')!!}<br></div>
        </div>
        <div class="row">
          <!-- col-sm-6 -->
          <div class="col-sm-2">
            <input type="text" class="form-control" name="search">
          </div>
          <!-- col-sm-6 -->
          <div class="col-sm-2">
            <div class="form-group">
              <div class="form-group">
                <input required="required" value="{{ date('Y-m-d')}}" name="filter_from" class="date-picker form-control has-feedback-left" id="filter_from" placeholder="Effective Date From" aria-describedby="inputSuccess2Status2" type="text">
                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
              </div>

              <input type="hidden" name="filter_date_hidden" id="filter_date_hidden">
              <input type="hidden" value="0" name="number_decrease" id="number_decrease">
              <input type="hidden" name="flight_pax_id" id="flight_pax_id" value="Flight Pax ID">

            </div>
          </div>
          <!-- col-sm-6 -->
          <div class="col-sm-2">
            <div class="">
              <div class="form-group">
                <input required="required" name="filter_to" class="date-picker form-control has-feedback-left" id="filter_to" placeholder="Effective Date From" aria-describedby="inputSuccess2Status2" type="text">
                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>

                <input type="hidden" name="ajax_load_date" id="ajax_load_date">
                <input type="hidden" value="100" name="number_increase" id="number_increase">
                <input type="hidden" value="<?php echo $countAircraft;?>" name="aircraft_num" id="aircraft_num">

              </div>
            </div>
          </div>
          <!-- col-sm-6 -->
          <div class="col-sm-6">
            <span class="pull-right"><h3>{!!trans('common.date')!!}: <?php echo date('d-M-Y');?> | <span id="hours"></span>:<span id="min"></span>:<span id="sec"></span></h3></span>
          </div>
        </div>

      </div>
      <div class="clearfix"></div>
    </div>
    
    <!-- search-flight -->
    <div class="flight-remark padding-bottom-lg">
      <!-- col-sm-5 -->
      <div class="col-sm-5">
        <div class="row">

          <!-- col-sm-4 -->
          <div class="col-sm-4">
            <!-- clock-time-zone -->
            <div class="clock-time-zone bg-gray color-parent">
              <div class="header">{!!trans('common.flight_status')!!}</div>
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
          <div class="col-sm-4">
            <!-- clock-time-zone -->
            <div class="clock-time-zone bg-blue">
              <div class="header">{!!trans('common.clock')!!}</div>
              <div class="padding-xs">
                <!-- row -->
                <div class="row">
                  <div class="col-sm-6">
                    <span class="pull-left"><small>PNH - 13:00</small></span>
                  </div>
                  <div class="col-sm-6">
                    <span class="pull-left"><small>CTU - 14:00</small></span>
                  </div>
                </div>
                <!-- row -->
                <div class="row">
                  <div class="col-sm-6">
                    <span class="pull-left"><small>CSX - 15:00</small></span>
                  </div>
                  <div class="col-sm-6">
                    <span class="pull-left"><small>XIY - 13:23</small></span>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <!-- col-sm-4 -->
          <div class="col-sm-3">
            <!-- clock-time-zone -->
            <div class="clock-time-zone bg-red">
              <div class="header">{!!trans('common.convert_to_CTL')!!}</div>
              <!-- row -->
              <div class="row padding-xs">
                <div class="col-sm-6">
                  <span class="pull-left"><small>DT</small><br> <small>12:15</small></span>
                </div>
                <div class="col-sm-6">
                  <span class="pull-left"><small>AT</small><br><small>12:15</small></span>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>

       <!-- col-sm-3 -->
       <div class="col-sm-3 padding-top-md">
        <div class="row">
          <center>
            <div class="current-date"><h3>
              <b>{!!trans('common.date')!!}: 
                <span id="search_date_from"></span> - 
                <span id="search_date_to"></span>
                <!-- 01 Jun to 15 June 2016 -->
              </b></h3></div>
          </center>
        </div>
       </div>

      <script type="text/javascript">
        var = '12:30:00';

        alert(now.getHours());
      </script>
       <!-- col-sm-5 -->
       <div class="col-sm-4" style="padding-top:20px;">
          <div class="pull-right">
           <a data-original-title="Save" data-toggle="tooltip" data-placement="top" href="{{url('schedule_mgr/create')}}" class="btn btn-primary btn-lg">{!!trans('common.add_schedule')!!}</a>
           
           <!-- <button data-original-title="Save" data-toggle="tooltip" data-placement="top" type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">{!!trans('common.add_note')!!}</button> -->

           <a data-original-title="Save" data-toggle="tooltip" data-placement="top" target="_blank" href="{{url('report/schedule?from_date=2016-05-10&to_date=2016-05-30&time_zone=UTC')}}" class="btn btn-primary btn-lg">{!!trans('common.view_reports')!!}</a>

          </div>
       </div>

       <div style="display: none;" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">ADD NOTE FOR A FLIGHT</h4>
              </div>
              <div class="modal-body">
                <form>
                  <textarea style="max-width: 100%;" class="form-control" rows="6" cols="10"></textarea>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>

            </div>
          </div>
        </div>
       <div class="clearfix"></div>
    </div>

    <?php
      $start = date_create('2015-02-26 12:01:00');
      $end = date_create('2015-02-26 13:14:00');
      $diff=date_diff($end,$start);

      // echo $diff->d;

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

          <div id="local-time-title" class="utc-time-title" style="display: none;cursor: pointer;">
            Local Time <span class="pull-right"><i class="fa fa-wa fa-chevron-circle-right"></i></span>
          </div>

          <div id="utc-time-title" class="utc-time-title" style="display: block;cursor: pointer;">
            All Time In UTC <span class="pull-right"><i class="fa fa-wa fa-chevron-circle-right"></i></span>
          </div>
          <!-- <div class="grid-flight">XU-112</div> -->
          <div class="grid-title-flight">
            <?php $i=1;?>
            @foreach($Aircrafts as $Aircraft)
              <div class="column">
                <div class="grid-cell"><div class="flight-title aircraft-line-height">{{$Aircraft->name}}</div></div>
              </div>
            <?php $i++;?>
            @endforeach
          </div>
        </center>
      </div>

      <?php 
        $total_d_co = '';
        $total_d_h = '';
        $current_date = date('Y-m-d');
        $startTimeStamp = strtotime($current_date);
        $endTimeStamp = strtotime(date("Y-m-d"));
        $timeDiff = abs($endTimeStamp - $startTimeStamp);
        $numberDays = $timeDiff/86400;
        $numberDays = intval($numberDays);
        $total_d_co = intval($numberDays)*1177;
        $total_d_h = intval($numberDays)*1200;
     ?>

      <div id="draggable2" class="draggable ui-widget-content">
        <!-- block-timeline -->
        <div class="gt-timeline" style="margin-left:-<?php echo $total_d_co;?>px;width:1200px;cursor: move;">

          <div id="time_line_show">
            <div style="margin-left: <?php echo $total_d_h;?>px;position: absolute;">
              <!-- timeline-left -->
              <div class="timeline-left" style="display: none;">
                <div class="timeline_active">
                  <div class="second_time"><center><small class="second_running">00</small></center></div>
                  <div class="timeline_running"></div>
                </div>
              </div>

              <!-- timeline-left -->
              <div class="timeline-left-utc" style="display: block;">
                <div class="timeline_active">
                  <div class="second_time_utc"><center><small class="second_running_utc">00</small></center></div>
                  <div class="timeline_running_utc"></div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- ########## Display Dynamic Schedule -->
          <div id="displya_dynamic_time_schedule"></div>
          <!-- ########## End Display Dynamic Schedule -->

        </div>
        <!-- #END block-timeline -->
      </div>
      <div class="clearfix"></div>
    </div>
  </div>

  <style type="text/css">
    .arrow-up{
      width: 0; 
      position: absolute;
      left: 40%;
      display: none;
      margin-left:0px;
      bottom: -25px;
      height: 0; 
      border-left: 10px solid transparent;
      border-right: 10px solid transparent;
      border-bottom: 10px solid #337ab7;
    }
  </style>


  <!-- Hide and view utc time -->
  <script type="text/javascript">
    $("#utc-time-title").click(function (){
      $('#local-time-title').toggle("slide", { direction: "left" }, 1);
      $('#utc-time-title').toggle("slide", { direction: "left" }, 1);

      $( ".timeline-left" ).show();
      $( ".timeline-left-utc" ).hide();
       // utctime_grid
      $('.schedule_content').toggle("slide", { direction: "left" }, 10);
      $('.schedule_UTC_content').hide();
    });

    $("#local-time-title").click(function (){
      $('#utc-time-title').toggle("slide", { direction: "left" }, 1);
      $('#local-time-title').toggle("slide", { direction: "left" }, 1);

      $( ".timeline-left-utc" ).show();
      $( ".timeline-left" ).hide();

      // utctime_grid
      $('.schedule_UTC_content').toggle("slide", { direction: "left" }, 10);
      $('.schedule_content').hide();
    });
  </script>

  
  <!-- UTC TIMZONE -->
  <script type="text/javascript">
    function refreshDiv(){
      var image = $("#loading");
      image.show();
      image.css("position","fixed");
      image.css("top", ($(window).height() / 2) - (image.outerHeight() / 2));
      image.css("left", ($(window).width() / 2) - (image.outerWidth() / 2));
    }

    // InitFlightPax Onclick Action to Animate Dropdown Flight Pax when user click on FLight number 
    function InitFlightPax_UTC(fsm_id){
      // fms_id refers to Flight Schedule ID
      $('#flight_pax_main_UTC'+fsm_id+'').toggle("slide", { direction: "left" }, 10);
      $('#arrow-up'+fsm_id+'').toggle("slide", { direction: "left" }, 10);
      var flight_pax_id = $("#flight_pax_id").val(fsm_id);
    }

    function InitFlightPax(fsm_id){
      // $('#flight_pax_main'+fsm_id+'').toggle("slide", { direction: "left" }, 10);
      // var flight_pax_id = $("#flight_pax_id").val(fsm_id); 
      $('#flight_pax_main_UTC'+fsm_id+'').toggle("slide", { direction: "left" }, 10);
      var flight_pax_id = $("#flight_pax_id").val(fsm_id);
    }

    // function Init Flight In Flight Schedule schedule_mgr
    function InitFlight(tab_flight_id, fsm_id){
      
      if(tab_flight_id==1){
       
      }else if(tab_flight_id==2){
       
      }else if(tab_flight_id==3){

      }else if(tab_flight_id==4){

      }else if(tab_flight_id==5){

      }else if(tab_flight_id==6){

      }else if(tab_flight_id==7){

      }else if(tab_flight_id==8){

      }
    }

    // Function
    $(function(){

      var filter_from = $("input[name='filter_from']");
      var filter_to = $("input[name='filter_to']");
      var ajax_load_date = $("input[name='ajax_load_date']");
  
      // Window First Loadin to get Flight Schedule Capture Current date Filter From by add 7 day for Filter To

      $(window).load(function(){

        var current_date = $("#filter_from").val();
        var date = new Date(current_date);
        var increase_date = date.setDate(date.getDate() + 6);
        var new_date = date.toString('yyyy-MM-dd');
        $("#filter_to").val(new_date);
        $("#ajax_load_date").val(new_date);

        $("#filter_date_hidden").val(current_date);
        // Search Date
        $("#search_date_from").html(current_date)+" - ";
        $("#search_date_to").html(new_date);
        // #End Search Date
        // Clear
        $("#number_decrease").val("");
        $("#number_increase").val("");
        // Loop Date Repeat to another date
        $.getSchedule();
      });

      
      // Draggable To Get Flight Schedule
      var start,stop;
      $("#draggable2").draggable({
          axis: "x",
          start: function(event, ui) {
            start = ui.position.left;
          },
          stop: function(event, ui) {
            var schedule_date = $('#ajax_load_date').val();
            var filter_date_hidden = $('#filter_date_hidden').val();
            var date = new Date(schedule_date);
            var number_increase = $("#number_increase").val();
            var number_decrease = $("#number_decrease").val();
            var total_num_increase = Number(number_increase)+Number(100);
            var total_num_decrease = Number(number_decrease)+Number(-99.9 );
            $("#loading").show();
            stop = ui.position.left;
            if(start > stop){
              var starts = 1;
              $("#number_increase").val(total_num_increase);
              date.setDate(date.getDate() + 1);
              $('#ajax_load_date').val(date.toString('yyyy-MM-dd'));
              // Loop Date Repeat to another date
              $.ajax({
                url: "{{url('admin/getScheduleMgrByBetweenDate')}}",
                dataType: "json",
                timeout: 3000,
                data: {
                  schedule_date: schedule_date,
                },
                error: function(x, t, m) {
                  if(t==="timeout") {
                    alert("got timeout");
                  } else {
                    alert(t);
                  }
                },
                success: function( data ) {
                  console.log(data);
                  $("#loading").hide();
                  $.getLayoutTimeLine(data,starts);
                }

              });
            }else{
              var stop = 0;

              var date_drag_previous = $("#filter_date_hidden").val();
              var date_new_previous = new Date(date_drag_previous);
              var increase_date = date_new_previous.setDate(date_new_previous.getDate() - 1);
              var new_input_previous_date = date_new_previous.toString('yyyy-MM-dd');
              $('#filter_date_hidden').val(new_input_previous_date);
              $("#number_decrease").val(total_num_decrease);
              
              // previousdate
              $.ajax({
                url: "{{url('admin/getScheduleMgrByBetweenDate')}}",
                dataType: "json",
                timeout: 3000,
                data: {
                  schedule_date: new_input_previous_date,
                },
                error: function(x, t, m) {
                    if(t==="timeout") {
                      alert("got timeout");
                    } else {
                      alert(t);
                    }
                },
                success: function( data ) {
                  console.log(data);
                  $("#loading").hide();
                  $.getLayoutTimeLine(data,stop);
                }
              });
              // alert("previouse date");
            }
          }
      });

      // Onchange Loading By Calendar to get Record from FLight Schedules
      var isFirstLoad = true;
      // Filter From & Filter To
      $("#filter_from").change(function(){
        isFirstLoad = true;
        var current_date = $("#filter_from").val();
        var date = new Date(current_date);
        var increase_date = date.setDate(date.getDate() + 6);
        var new_date = date.toString('yyyy-MM-dd');
        $("#filter_to").val(new_date);
        $("#ajax_load_date").val(new_date);
        location.reload();
        $.getSchedule();
      });


      // Function Get Schedule Reference by filter from and filter to another condition
      //*** if  filter_from &  filter to not null get Record flight schedule
      // ** if of ajax_load_date not null get record from flight schedule

      $.getSchedule = function(){
        $("#loading").show();
        $.ajax({
            url: "{{url('/admin/getScheduleMgrByBetweenDate')}}",
            dataType: "json",
            timeout: 3000,
            data: {
              filter_from_date: filter_from.val(),
              filter_to_date: filter_to.val(),
            },
            error: function(x, t, m) {
              if(t==="timeout") {
                alert("got timeout");
              } else {
                alert(t);
              }
              // $(window).unbind('beforeunload');
              // window.location =  "{{url('/counter')}}";
            },
            success: function( data ) {
              // alert("testing");
              console.log(data);
              if(data.length==0){
                $("#loading").hide();
                return;
              }
              $("#loading").hide();
              $.getLayoutTimeLineHtml(data);
            }
        });
      };

      // function getTop(data){
      $.getLayoutTimeLineHtml = function(data){
          var totalDistance = $('#number_increase').val()+"%;";
          var html = "";
          var timeline = "";
          var i=0;
          
          var start_date = $("#filter_from").val();
          var end_date = $("#filter_to").val();
          var totalCountDate = CalculateDateCounter(start_date,end_date);

          var start_date_str = new Date(start_date);
          var start_date = start_date_str.setDate(start_date_str.getDate());

          var today = new Date();
          var today_string = today.setDate(today.getDate());

          // alert(increase_date);

          // if(start_date==today_string){
            timeline += '<div style="margin-left: <?php echo $total_d_h;?>px;position: absolute;">';
            timeline += '<!-- timeline-left -->';
            timeline += '<div class="timeline-left" style="display: none;">';
            timeline += '<div class="timeline_active">';
            timeline += '<div class="second_time"><center><small class="second_running">00</small></center></div>';
            timeline += '<div class="timeline_running"></div>';
            timeline += '</div>';
            timeline += '</div>';
            timeline += '<!-- timeline-left -->';
            timeline += '<div class="timeline-left-utc" style="display: block;">';
            timeline += '<div class="timeline_active">';
            timeline += '<div class="second_time_utc"><center><small class="second_running_utc">00</small></center></div>';
            timeline += '<div class="timeline_running_utc"></div>';
            timeline += '</div>';
            timeline += '</div>';
            timeline += '</div>';
          // }

          // alert(totalCountDate);
          for(i==0;i<=totalCountDate;i++){
            var total_distance = i*100;
            var current_date = $("#filter_from").val();
            var date = new Date(current_date);
            var increase_date = date.setDate(date.getDate() + i);
            var new_date = date.toString('yyyy-MM-dd');

            html += '<div id="capture_date_current" class="grid-date-7-day" style="height:185px;position:absolute;top:0px;width:100%;left:'+total_distance+'%">';
            html += '<div class="border-grid-line" style="border-left:1px solid #f00;height:100%;position:absolute;top:5px;z-index:1;"></div>'
            html += '<span class="schedule_date"><b>Date: '+new_date+'</b></span>';
            html += '<!--########### container-time-date 3 Apri - 2016-->';
            html += '<div class="container-time" style="margin-left:-3px;">';
          
            // if(data!=null){
            //sreyleak add
            var distance_between_utc = 0;
            var bevious_distance = 0;
            var bevious_aircraft = 0;
            //end

            $.each(data, function(schedule_id, schedule_data){
              if(new_date==(schedule_data.schedule_date)){

                var origin_id = schedule_data.origin_id;
                var destination_id = schedule_data.destination_id;
                var dd='';
                if(destination_id == origin_id){
                  // alert(destination_id);
                }else if(destination_id != 3){
                  var dd = schedule_data.destination_name;
                }
                
                var time_elapse_utc_total='';
                var aircrafts_id=schedule_data.aircrafts_id;
                var STD_Time = schedule_data.STD; 
                var STA_Time = schedule_data.STA;
                var STD = Date.parse(STD_Time);
                var STA = Date.parse(STA_Time);
                var STD_hour = STD.getHours();
                var STA_hour = STA.getHours();
                var STD_minute = STD.getMinutes();
                var STA_minute = STA.getMinutes();
                var total_minute = STA_minute-STA_minute;

                var utc_destination = schedule_data.utc_destination;
                var utc_origin = schedule_data.utc_origin;
                
                //################ UTC TIME ##################
                var distance_utc = (STD_hour*50)+STD_minute*(50/60);



                // $time_elapse_utc_total='';
                if(STD > STA){
                  var time_elapse_utc_total = STA_hour+24 - STD_hour;
                }else{
                  var time_elapse_utc_total = STA_hour - STD_hour;
                }
                var etimate_time_utc = time_elapse_utc_total * 50 + ((STA_minute-STD_minute) * (50/60));

                // ################## LOCAL TIME ZONE ###############
                var distance = (STD_hour*50)+STD_minute*(50/60) + utc_origin*50;

                var Local_time = utc_destination - utc_origin;
                var time_elapse='';
                if(STD > STA){
                  var time_elapse = STA_hour+24 - STD_hour;
                }else{
                  var time_elapse = STA_hour - STD_hour;
                }
                var etimate_time = (time_elapse+Local_time) * 50 + ((STA_minute-STD_minute) * (50/60));

                // Calss Top
                var class_top='';
                
                if(aircrafts_id==1){
                  class_top = 5;
                }else if(aircrafts_id==2){
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
                }

                var fsm_id = schedule_data.fsm_id;
                var update_status_color = schedule_data.update_status_color;
                var update_status_name = schedule_data.update_status_name;
                
                // block UTC Flight
                // <!-- ######### UTC TIME ZONE #######-->
                html += '<div class="schedule_UTC_content" style="display: block;position: absolute;z-index:1;top:'+class_top+'px;left:3px;">';
                html += '<div class="schedule_inner" style="margin-left:'+distance_utc+'px;">'
                html += '<div style="position: absolute;">';
                html += '<span>';
                html += '<div class="pull-left" style="position:absolute;left:-25px;">';
                //sreyleak add
                if(aircrafts_id!=bevious_aircraft) bevious_distance = 0
                distance_between_utc = distance_utc  - bevious_distance;
                bevious_distance = distance_utc + etimate_time_utc;
                bevious_aircraft = aircrafts_id;
                
                if(distance_between_utc>(50*2)){                
                  html += '<small>'+schedule_data.origin_name+' &nbsp;</small> ';
                }else{
                  html += '<small>&nbsp;</small> ';
                }
                //end
                html += '<div style="font-size:10px;position: absolute;left:20px;">'+STD_minute+'</div>';
                html += '</div>';
                

                html +='<div id="flight_pax_double">'
                  html += '<a onClick="InitFlightPax_UTC('+schedule_data.fsm_id+')" href="javascript:void();" class="pull-left" style="margin-top:4px;position: relative;top:0px;background-color:'+update_status_color+';width:'+etimate_time_utc+'px;height:15px;color:#fff;">';
                  html += '<small><center><span style="position: absolute;left:0px;right:0px;z-index: 99;">'+schedule_data.flight_number+'</span><span class="arrow-up" id="arrow-up'+schedule_data.fsm_id+'"></span></center></small>';

                  html += '<span style="top:0px;position: absolute;height: 15px;right: 0px;width:10px;background-color:'+schedule_data.fnotification_color+'"></span>';
                  html += '</a>';
                html +='</div>';

                

                // ##########Flight Pax Loading
                html += '<div class="flight_information" id="flight_pax_main_UTC'+schedule_data.fsm_id+'">';
                  // #################Tab Content
                  html += '<div class="flight_pax">';
                    html += '<div class="flight_pax_content">';
                      html +='<a onClick="InitFlightPax_UTC('+schedule_data.fsm_id+')" href="javascript:void();" class="btn-close-schedule btn btn-danger btn-sm"><i class="fa fa-wa fa-remove"></i></a>';
                      html +='<div class="col-sm-12">';
                        html += '<div class="row">'; 
                          html += '<div class="x_content">';
                          html += '<div class="" role="tabpanel" data-example-id="togglable-tabs">';
                          html += '<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">';
                          
                          html += '<li role="presentation" class="active"><a href="#tab_flight'+schedule_data.fsm_id+'" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">{!!trans("flightschedule/schedulemonitor.flight")!!}</a></li>';
                          
                          html += '<li role="presentation" class=""><a href="#tab_swap_flight'+schedule_data.fsm_id+'" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">{!!trans("flightschedule/schedulemonitor.swap_flight")!!}</a></li>';
                          
                          html += '<li role="presentation" class=""><a href="#tab_diverted_flight'+schedule_data.fsm_id+'" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">{!!trans("flightschedule/schedulemonitor.diverted_flight")!!}</a></li>';

                          html += '<li role="presentation" class=""><a href="#tab_cancel_flight'+schedule_data.fsm_id+'" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">{!!trans("flightschedule/schedulemonitor.canceled_flight")!!}</a></li>';

                          html += '<li role="presentation" class=""><a href="#tab_requested_flight'+schedule_data.fsm_id+'" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">{!!trans("flightschedule/schedulemonitor.requested_flight")!!}</a></li>';

                          html += '<li role="presentation" class=""><a href="#tab_retime_flight'+schedule_data.fsm_id+'" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">{!!trans("flightschedule/schedulemonitor.retime_flight")!!}</a></li>';

                          html += '<li role="presentation" class=""><a href="#tab_delay_flight'+schedule_data.fsm_id+'" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">{!!trans("flightschedule/schedulemonitor.delay_flight")!!}</a></li>';

                          html += '</ul>';
                          html += '<div id="myTabContent" class="tab-content">';

                          // TAB FLIGHT #################
                          html += '<div role="tabpanel" class="tab-pane fade active in" id="tab_flight'+schedule_data.fsm_id+'" aria-labelledby="home-tab">';
                            html += '<p>';

                              // Flight Information
                              html += '<div class="container padding-top-md">';
                                html += '<span class="col-sm-5">';
                                  // block
                                  html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.route_info")!!} : </b></label>';
                                  html += '<label class="col-sm-4">'+schedule_data.origin_name+' - '+schedule_data.destination_name+'</label>';

                                  // block
                                  html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.aircraft_registration")!!} : </b></label>';
                                  html += '<label class="col-sm-4">'+schedule_data.aircraft_name+'</label>';

                                  // loop crew
                                  $.each(schedule_data['crews_arr'],function(index,crew){
                                    html += '<label class="col-sm-6"><b>'+crew['occupation_name']+' : </b></label>';
                                    html += '<label class="col-sm-6">'+crew['crew_name']+'</label>';
                                  });

                                  // block
                                  html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.std")!!} : </b></label>';
                                  html += '<label class="col-sm-4">'+SlitTime(schedule_data.STD)+'</label>';
                                  // block
                                  html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.sta")!!} : </b></label>';
                                  html += '<label class="col-sm-4">'+SlitTime(schedule_data.STA)+'</label>';
                                  html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.created_by")!!} : </b></label>';
                                  html += '<label class="col-sm-6">'+schedule_data.created_by_user+'</label>';

                                  html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.created_date")!!} : </b></label>';
                                  html += '<label class="col-sm-6">'+schedule_data.fs_created_date+'</label>';

                                  html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.modified_date")!!} : </b></label>';
                                  html += '<label class="col-sm-6">'+schedule_data.fs_created_date+'</label>';
                                html += '</span>';

                                html += '<span class="col-sm-6">';
                                  html += '<div class="devide-line"><i class="fa fa-wa fa-clock-o"></i> {!!trans("flightschedule/schedulemonitor.update_actual_time")!!}</div>';
                                  // Flight Status Block
                                  html += '<div id="flight_status">';
                                    // block
                                    html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.atd")!!} : </b> <span class="validate-required">*</span></label>';
                                    var actual_time_atd='';
                                    var actual_time_ata='';
                                    if(schedule_data.fsm_ATD!=null || schedule_data.fsm_ATA!=null){
                                      actual_time_atd = SlitTime(schedule_data.fsm_ATD);
                                      actual_time_ata = SlitTime(schedule_data.fsm_ATA);
                                    }

                                    html += '<label class="col-sm-4"><input maxlength="4" name="fsm_atd'+schedule_data.fsm_id+'" placeholder="{!!trans("flightschedule/schedulemonitor.input_number_only")!!}" id="fsm_atd'+schedule_data.fsm_id+'" type="text" value="'+actual_time_atd+'"/></label>';
                                    // block
                                    html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.ata")!!} : </b></label>';
                                    html += '<label class="col-sm-4"><input placeholder="{!!trans("flightschedule/schedulemonitor.input_number_only")!!}" maxlength="4" type="text" name="fsm_ata'+schedule_data.fsm_id+'" id="fsm_ata'+schedule_data.fsm_id+'" value="'+actual_time_ata+'"/></label>';
                                  html += '</div>';

                                    // button save change
                                    html += '<button data-original-title="{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" onClick="initFlight('+schedule_data.fsm_id+');" class="btn btn-primary btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button>';  

                                html += '</span>';


                                // clearfix
                                html += '<div class="clearfix"></div>';
                              html += '</div>';

                            html += '<p>';
                          html += '</div>';
                          // END TAB FLIGHT ################

                          // TAB CANCELED FLIGHT #################
                          html += '<div role="tabpanel" class="tab-pane fade in" id="tab_cancel_flight'+schedule_data.fsm_id+'" aria-labelledby="home-tab">';
                            html += '<p>';                            
                            
                              // Flight Information
                              html += '<div class="container padding-top-md">';
                                // Col-sm-4
                                html += '<span class="col-sm-2">';
                                  html += '<div class="devide-line"><b><i class="fa fa-wa fa-plane"></i> {!!trans("flightschedule/schedulemonitor.flight")!!}</b></div>';
                                  // block
                                  html += '<label class="col-sm-8">{!!trans("flightschedule/schedulemonitor.aircraft")!!} : </label>';
                                  html += '<label class="col-sm-4">'+schedule_data.aircraft_name+'</label>';
                                  // block
                                  html += '<label class="col-sm-8">Time  </label>';
                                  html += '<label class="col-sm-4">=></label>';
                                html += '</span>';

                                // Col-sm-4
                                html += '<span class="col-sm-2">';
                                  html += '<div class="devide-line"><b><i class="fa fa-wa fa-clock-o"></i> {!!trans("flightschedule/schedulemonitor.departure")!!}</b></div>';

                                  html += '<div class="col-sm-12"><b>'+schedule_data.origin_name+'</b></div>';
                                  // block
                                  html += '<label class="col-sm-12">'+SlitTime(schedule_data.STD)+'</label>';
                                html += '</span>';

                                // Col-sm-4
                                html += '<span class="col-sm-2">';
                                  html += '<div class="devide-line"><i class="fa fa-wa fa-clock-o"></i> {!!trans("flightschedule/schedulemonitor.arrival")!!}</div>';
                                  // block
                                  html += '<label class="col-sm-12">'+schedule_data.destination_name+'</label>';
                                  html += '<label class="col-sm-12">'+SlitTime(schedule_data.STA)+'</label>';
                                html += '</span>';

                                // Col-sm-4
                                html += '<span class="col-sm-5">';
                                  html += '<div class="devide-line">{!!trans("flightschedule/schedulemonitor.request_cancel")!!}</div>';
                                  // block
                                  html += '<label class="col-sm-12">{!!trans("flightschedule/schedulemonitor.remark")!!}</label>';
                                  html += '<label class="col-sm-12"><textarea style="width:100%;" row="3"></textarea></label>';
                                html += '</span>';

                                // button save change
                                html += '<div class="col-sm-12"><button data-original-title="Save Change" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" onClick="initCancelFlight('+schedule_data.fsm_id+');" class="btn btn-primary btn-md">{!!trans("flightschedule/schedulemonitor.request_cancel")!!}</button></div>';

                                // clearfix
                                html += '<div class="clearfix"></div>';
                              html += '</div>';

                            html += '<p>';
                          html += '</div>';
                          // END CANCEL FLIGHT ################

                          // TAB RETIME FLIGHT #################
                          html += '<div role="tabpanel" class="tab-pane fade in" id="tab_retime_flight'+schedule_data.fsm_id+'" aria-labelledby="home-tab">';
                            html += '<p>';
                              // Flight Information
                              html += '<div class="container padding-top-md">';
                                html += '<span class="col-sm-5">';
                                  html += '<div class="devide-line">{!!trans("flightschedule/schedulemonitor.original_flight")!!}</div>';
                                  // block
                                  html += '<label class="col-sm-6">{!!trans("flightschedule/schedulemonitor.route_info")!!}</label>';
                                  html += '<label class="col-sm-4">'+schedule_data.origin_name+' - '+schedule_data.destination_name+'</label>';
                                  // block
                                  html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.std")!!} : </b></label>';
                                  html += '<label class="col-sm-4">'+SlitTime(schedule_data.STD)+'</label>';
                                  // block
                                  html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.sta")!!} : </b></label>';
                                  html += '<label class="col-sm-4">'+SlitTime(schedule_data.STA)+'</label>';
                                html += '</span>';

                                html += '<span class="col-sm-5">';
                                  html += '<div class="devide-line">{!!trans("flightschedule/schedulemonitor.retime_flight")!!}</div>';
                                  // block
                                  html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.route_info")!!} : </b></label>';
                                  html += '<label class="col-sm-4">'+schedule_data.origin_name+' - '+schedule_data.destination_name+'</label>';
                                  // block
                                  html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.std")!!} : </b></label>';
                                  html += '<label class="col-sm-4"><input type="text" name="r_std'+schedule_data.fsm_id+'" value="'+SlitTime(schedule_data.fsm_STD)+'"></label>';
                                  // block
                                  html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.sta")!!} : </b></label>';
                                  html += '<label class="col-sm-4"><input type="text" name="r_sta'+schedule_data.fsm_id+'" value="'+SlitTime(schedule_data.fsm_STA)+'"></label>';
                                  // block
                                  html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.modified_by")!!} : </b></label>';
                                  html += '<label class="col-sm-4">'+schedule_data.modified_by_user+'</label>';
                                  // Last Modified
                                  html += '<label class="col-sm-6"><b>{!!trans("flightschedule/schedulemonitor.modified_date")!!} : </b></label>';
                                  html += '<label class="col-sm-6">'+formatDate(schedule_data.fsm_modified_date)+'</label>';
                                html += '</span>';
                                // button save change
                                html += '<div class="col-sm-12"><button data-original-title="Save Change" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" onClick="initRetimeFlight('+schedule_data.fsm_id+');" class="btn btn-primary btn-md">{!!trans("flightschedule/schedulemonitor.button_save_chage")!!}</button></div>';
                                // clearfix
                                html += '<div class="clearfix"></div>';
                              html += '</div>';

                            html += '<p>';
                          html += '</div>';
                          // END RETIME FLIGHT ################

                          // TAB DELAY FLIGHT #################
                          html += '<div role="tabpanel" class="tab-pane fade in" id="tab_delay_flight'+schedule_data.fsm_id+'" aria-labelledby="home-tab">';
                            html += '<p>';
                              // Flight Information
                              html += '<div class="container padding-top-md">';
                                html += '<span class="col-sm-5">';
                                  html += '<div class="devide-line">ORIGINAL FLIGHT</div>';
                                  // block
                                  html += '<label class="col-sm-6"><b>ROUTE INTO : </b></label>';
                                  html += '<label class="col-sm-4">'+schedule_data.origin_name+' - '+schedule_data.destination_name+'</label>';
                                  // block
                                  html += '<label class="col-sm-6"><b>STD : </b></label>';
                                  html += '<label class="col-sm-4">'+schedule_data.STD+'</label>';
                                  // block
                                  html += '<label class="col-sm-6"><b>STA : </b></label>';
                                  html += '<label class="col-sm-4">'+schedule_data.STA+'</label>';
                                html += '</span>';

                                html += '<span class="col-sm-5">';
                                  html += '<div class="devide-line">DELAY FLIGHT</div>';
                                  // block
                                  html += '<label class="col-sm-6"><b>ROUTE INTO : </b></label>';
                                  html += '<label class="col-sm-4">'+schedule_data.origin_name+' - '+schedule_data.destination_name+'</label>';
                                  // block
                                  html += '<label class="col-sm-6"><b>DELAY STD : </b></label>';
                                  html += '<label class="col-sm-4"><input type="text" name="d_std'+schedule_data.fsm_id+'" value="'+schedule_data.fsm_STD+'"></label>';
                                  // block
                                  html += '<label class="col-sm-6"><b>DELAY STA : </b></label>';
                                  html += '<label class="col-sm-4"><input type="text" name="d_sta'+schedule_data.fsm_id+'" value="'+schedule_data.fsm_STA+'"></label>';
                                  // block
                                  html += '<label class="col-sm-6"><b>CHANGED BY : </b></label>';
                                  html += '<label class="col-sm-4">'+schedule_data.modified_by_user+'</label>';
                                html += '</span>';
                                // button save change
                                html += '<div class="col-sm-12"><button data-original-title="Save Change" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" onClick="initDelayFlight('+schedule_data.fsm_id+');" class="btn btn-primary btn-md">SAVE CHANGE</button></div>';
                                // clearfix
                                html += '<div class="clearfix"></div>';
                              html += '</div>';

                            html += '<p>';
                          html += '</div>';
                          // END DELAY FLIGHT ################


                          html += '</div>';
                          html += '</div>';
                          html += '</div>';
                        html += '</div>';
                      html += '</div>';
                      html += '<div class="clearfix"></div>';
                    html += '</div>';
                    // html += '</div>';

                  html += '</div>';

                html += '</div>';
                // ######## End Pax

                html += '<div class="pull-left" style="top:0px;position: absolute;right: -30px;">';
                html += '<small>&nbsp; '+schedule_data.destination_name+' &nbsp;</small>'; 
                html += '<div style="font-size:10px;position:absolute;">'+STA_minute+'</div>';
                html += '</div>';
                html += '<div style="position: absolute center;">';
                html += '<center>';
                html += '<div style="font-size:10px;">';
                
                html += '<span style="background:yellow;cursor: pointer;">';
                // Function CalculateTime & CalculateMinute stay in public/js/common.js 
                // html += CalculateTime(STA_Time,STD_Time);
                html += EslapseTime(STD_Time,STA_Time);
                // html += CalculateMinute(STD_Time,STA_Time);
                html += '</span>';

                html += '</div>';
                html += '</center>';
                html += '</div>';
                html += '</span>';
                html += '<div class="clearfix"></div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                // #END block UTC FLIGHT 

                // <!-- ######### LOCATION TIME #######-->
                html += '<div class="schedule_content" style="display: none;position: absolute;z-index: 99;top:'+class_top+'px;left:3px;">';
                html += '<div class="schedule_inner" style="margin-left:'+distance+'px;">'
                html += '<div style="position: absolute;">';
                html += '<span>';
                html += '<div class="pull-left" style="position:absolute;left:-25px;">';
                html += '<small>'+schedule_data.origin_name+' &nbsp;</small> ';
                html += '<div style="font-size:10px;position: absolute;left:20px;">'+STD_minute+'</div>';
                html += '</div>';
                
                html +='<div id="flight_pax_double">'
                  html += '<a onClick="InitFlightPax('+schedule_data.fsm_id+')" href="javascript:void();" class="pull-left" style="margin-top:4px;position: relative;top:0px;background-color:#337ab7;width:'+etimate_time+'px;height:15px;color:#fff;">';
                  html += '<small><center><span style="position: absolute;left:0px;right:0px;z-index: 99;">'+schedule_data.flight_number+'</span></center></small>';
                  html += '<span style="top:0px;position: absolute;height: 15px;right: 0px;width:10px;background-color:'+schedule_data.fnotification_color+'"></span>';
                  html += '</a>';
                html +='</div>'

                //##########Flight Pax Loading
                html += '<div id="flight_pax_main'+schedule_data.fsm_id+'" style="position: relative;height: 100%;width: 100%;display:none;">';
                html += '<div class="flight_pax<?php //echo $FlightSchedule->fsm_id;?>" style="position: absolute;z-index: 99;width:830px;top:40px;right:-220%;height: 100%;">';
                html += '<div style="background-color:#fff;border-radius: 4px;border:1px solid #777;">';
                html += '<div class="flight_box_title" style=";padding:10px;">';
                html += '<div style="text-align: center;border-bottom:1px solid #eee;">';
                html += '<a href="#" class="btn btn-sm btn-primary">FLIGHT</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">PAX</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">REMARK</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">SWAP FLIGHT</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">DIVERTED FLIGHT</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">CANCEL FLIGHT</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">REQUEST FLIGHT</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">RETIME</a>';
                html += '</div>';
                html += '<div style="padding:10px;line-height: 25px;">';
                // html += '<div class="row"> <b>Flight Number : </b> $FlightSchedule->flight_number</div>';
                html += '<div class="row" style="z-index:9999;">';
                  html += '<div class="col-sm-6">';
                    html += '<div class="row"> <b>Aircraft Registration : </b> U-113</div>';
                    html += '<div class="row"> <b>Captain(s) : </b> Sineth</div>';
                    html += '<div class="row"> <b>FO : </b> J Brenner</div>';
                    html += '<div class="row"> <b>Created By : </b> J Sovanna on 8/03/ 13:00</div>';
                    html += '<div class="row"> <b>ATD : </b> 12:30</div>';
                    html += '<div class="row"> <b>ATA : </b> 02:40</div>';
                  html += '</div>';

                  html += '<div class="col-sm-6">'
                    html += '<div class="row"> <b>Route Info : </b>';
                    html += '<br>';
                    html += '<div style="padding-left: 20px;">';
                    html += 'PNH - REP (TBA 03/01/2016 [150 PAX]';
                  html += '</div>';
                  html += '<div class="clearfix"></div>';
                html += '</div>';

                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '<div class="clearfix"></div>';
                html += '</div>';
                // ######## End Pax

                html += '<div class="pull-left" style="top:0px;position: absolute;right: -30px;">';
                html += '<small>&nbsp; '+schedule_data.destination_name+' &nbsp;</small>'; 
                html += '<div style="font-size:10px;position:absolute;">'+STA_minute+'</div>';
                html += '</div>';
                html += '<div style="position: absolute center;">';
                html += '<center>';
                html += '<div style="font-size:10px;">';
                html += '<span style="background:yellow;cursor: pointer;">';
                // Function CalculateTime & CalculateMinute stay in public/js/common.js 
                html += CalculateTime(STA_Time,STD_Time);
                html += CalculateMinute(STA_Time,STD_Time);
                
                html += '</span>';
                html += '</div>';
                html += '</center>';
                html += '</div>';
                html += '</span>';
                html += '<div class="clearfix"></div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                            
              }
              j++;

            });
            // }
            var aircraft_num = $("#aircraft_num").val();
            var j=1;
            html += '<div style="padding-left:2px;">';
              for(j=1;j<=aircraft_num;j++){
                html += '<!-- Aircraft-Cell -->';
                html += '<div class="column" style="position: relative;display: block;width:100%;">';
                html += '<!-- grid-flight-time perday -->';
                // alert(schedule_data.countAircraft);
                html += '<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div></div>';
              }
            html += '</div>';
            
            html += '</div>';

            html += '<!-- gt-timeline ###################-->';
            html += '<div class="main_line"></div><div class="bottom_line"></div><div class="gt-timeline" style="z-index: -100"><div class="horizontal-line month-line even-month" style="left:12.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:25px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:37.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:62.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:75px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:87.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:112.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:125px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:137.5px"><div class="second">45</div></div><!-- second --><div class="horizontal-line month-line even-month" style="left:162.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:175px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:187.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:212.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:225px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:237.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:262.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:275px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:287.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:312.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:325px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:337.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:362.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:375px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:387.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:412.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:425px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:437.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:462.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:475px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:487.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:512.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:525px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:537.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:562.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:575px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:587.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:612.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:625px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:637.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:662.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:675px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:687.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:712.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:725px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:737.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:762.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:775px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:787.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:812.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:825px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:837.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:862.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:875px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:887.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:912.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:925px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:937.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:962.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:975px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:987.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1012.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1025px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1037.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1062.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1075px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1087.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1112.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1125px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1137.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1162.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1175px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1187.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line leftend" style="left:0px"><div class="year">0000</div></div><div class="horizontal-line leftend" style="left:50px"><div class="year">0100</div></div><div class="horizontal-line leftend" style="left:100px"><div class="year">0200</div></div><div class="horizontal-line leftend" style="left:150px"><div class="year">0300</div></div><div class="horizontal-line leftend" style="left:200px"><div class="year">0400</div></div><div class="horizontal-line leftend" style="left:250px"><div class="year">0500</div></div><div class="horizontal-line leftend" style="left:300px"><div class="year">0600</div></div><div class="horizontal-line leftend" style="left:350px"><div class="year">0700</div></div><div class="horizontal-line leftend" style="left:400px"><div class="year">0800</div></div><div class="horizontal-line leftend" style="left:450px"><div class="year">0900</div></div><div class="horizontal-line leftend" style="left:500px"><div class="year">1000</div></div><div class="horizontal-line leftend" style="left:550px"><div class="year">1100</div></div><div class="horizontal-line leftend" style="left:600px"><div class="year">1200</div></div><div class="horizontal-line leftend" style="left:650px"><div class="year">1300</div></div><div class="horizontal-line leftend" style="left:700px"><div class="year">1400</div></div><div class="horizontal-line leftend" style="left:750px"><div class="year">1500</div></div><div class="horizontal-line leftend" style="left:800px"><div class="year">1600</div></div><div class="horizontal-line leftend" style="left:850px"><div class="year">1700</div></div><div class="horizontal-line leftend" style="left:900px"><div class="year">1800</div></div><div class="horizontal-line leftend" style="left:950px"><div class="year">1900</div></div><div class="horizontal-line leftend" style="left:1000px"><div class="year">2000</div></div><div class="horizontal-line leftend" style="left:1050px"><div class="year">2100</div></div><div class="horizontal-line leftend" style="left:1100px"><div class="year">2200</div></div><div class="horizontal-line leftend" style="left:1150px"><div class="year">2300</div></div></div></div>';
            // alert(i);
            $("#number_increase").val(i*100);
        }

        $("#displya_dynamic_time_schedule").html(html);
        $("#time_line_show").html(timeline);
        $.eventallData();
        // $.eventallDatfVa();
      }

      // function getTop(data){
      $.getLayoutTimeLine = function(data,flag_check){
        // alert(flag_check);
        // alert(total_num_increase);
        var totalDistance='';
        if(flag_check==1){
          // alert(flag_check);
          var totalDistance = $('#number_increase').val()+"%";
          var new_date = $('#ajax_load_date').val();

        }else{
          var totalDistance = $('#number_decrease').val()+"%";
          // alert(totalDistance);
          var new_date = $('#filter_date_hidden').val();
          // alert(new_date);
        }

        var html ='';
        html += '<div id="capture_date_current" class="grid-date-7-day" style="height:185px;position:absolute;top:0px;width:100%;left:'+totalDistance+'">';
            html += '<div class="border-grid-line"></div>'

            html += '<span class="schedule_date"><b>Date: '+new_date+'</b></span>';
            html += '<!--########### container-time-date 3 Apri - 2016-->';
            html += '<div class="container-time" style="margin-left:1px;">';
          
            // if(data!=null){
            $.each(data, function(schedule_id, data){
              if(new_date==(data.schedule_date)){
                
                var time_elapse_utc_total='';
                var aircrafts_id=data.aircrafts_id;
                var STD_Time = data.STD; 
                var STA_Time = data.STA;
                var STD = Date.parse(STD_Time);
                var STA = Date.parse(STA_Time);
                var STD_hour = STD.getHours();
                var STA_hour = STA.getHours();
                var STD_minute = STD.getMinutes();
                var STA_minute = STA.getMinutes();
                var total_minute = STA_minute-STA_minute;

                var utc_destination = data.utc_destination;
                var utc_origin = data.utc_origin;
                
                //################ UTC TIME ##################
                var distance_utc = (STD_hour*50)+STD_minute*(50/60);
                // $time_elapse_utc_total='';
                if(STD > STA){
                  var time_elapse_utc_total = STA_hour+24 - STD_hour;
                }else{
                  var time_elapse_utc_total = STA_hour - STD_hour;
                }

                var etimate_time_utc = time_elapse_utc_total * 50 + ((STA_minute-STD_minute) * (50/60));

                // ################## LOCAL TIME ZONE ###############
                var distance = (STD_hour*50)+STD_minute*(50/60) + utc_origin*50;
                var Local_time = utc_destination - utc_origin;
                var time_elapse='';
                if(STD > STA){
                  var time_elapse = STA_hour+24 - STD_hour;
                }else{
                  var time_elapse = STA_hour - STD_hour;
                }

                var etimate_time = (time_elapse+Local_time) * 50 + ((STA_minute-STD_minute) * (50/60));

                // Calss Top
                var class_top='';
                if(aircrafts_id==1){
                  class_top = 5;
                }else if(aircrafts_id==2){
                  class_top = 50;
                }else{
                  class_top = 95;
                }

                var fsm_id = data.fsm_id;

                // block UTC Flight
                // <!-- ######### UTC TIME ZONE #######-->
                html += '<div class="schedule_UTC_content" style="display: block;position: absolute;z-index: 1;top:'+class_top+'px;left:0px;">';
                html += '<div class="schedule_inner" style="margin-left:'+distance_utc+'px;">'
                html += '<div style="position: absolute;">';
                html += '<span>';
                html += '<div class="pull-left" style="position:absolute;left:-25px;">';
                html += '<small>'+data.origin_name+' &nbsp;</small> ';
                html += '<div style="font-size:10px;position: absolute;left:20px;">'+STD_minute+'</div>';
                html += '</div>';
                
                html +='<div id="flight_pax_double">'
                  html += '<a onClick="InitFlightPax_UTC('+data.fsm_id+')" href="javascript:void();" class="pull-left" style="margin-top:4px;position: relative;top:0px;background-color:#337ab7;width:'+etimate_time_utc+'px;height:15px;color:#fff;">';
                  html += '<small><center><span style="position: absolute;left:0px;right:0px;z-index: 99;">'+data.flight_number+'</span></center></small>';
                  html += '<span style="top:0px;position: absolute;height: 15px;right: 0px;width:10px;background-color:'+data.fnotification_color+'"></span>';
                  html += '</a>';
                html +='</div>'

                // ##########Flight Pax Loading
                html += '<div id="flight_pax_main_UTC'+data.fsm_id+'" style="position: relative;height: 100%;width: 100%;display:none;">';
                html += '<div class="flight_pax<?php //echo $FlightSchedule->fsm_id;?>" style="position: absolute;z-index: 99;width:830px;top:40px;right:-220%;height: 100%;">';
                html += '<div style="background-color:#fff;border-radius: 4px;border:1px solid #777;">';
                html += '<div class="flight_box_title" style=";padding:10px;">';
                html += '<div style="text-align: center;border-bottom:1px solid #eee;">';
                html += '<a href="#" class="btn btn-sm btn-primary">FLIGHT</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">PAX</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">REMARK</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">SWAP FLIGHT</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">DIVERTED FLIGHT</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">CANCEL FLIGHT</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">REQUEST FLIGHT</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">RETIME</a>';
                html += '</div>';
                html += '<div style="padding:10px;line-height: 25px;">';
                // html += '<div class="row"> <b>Flight Number : </b> $FlightSchedule->flight_number</div>';
                html += '<div class="row" style="z-index:9999;">';
                  html += '<div class="col-sm-6">';
                    html += '<div class="row"> <b>Aircraft Registration : </b> U-113</div>';
                    html += '<div class="row"> <b>Captain(s) : </b> Sineth</div>';
                    html += '<div class="row"> <b>FO : </b> J Brenner</div>';
                    html += '<div class="row"> <b>Created By : </b> J Sovanna on 8/03/ 13:00</div>';
                    html += '<div class="row"> <b>ATD : </b> 12:30</div>';
                    html += '<div class="row"> <b>ATA : </b> 02:40</div>';
                  html += '</div>';

                  html += '<div class="col-sm-6">'
                    html += '<div class="row"> <b>Route Info : </b>';
                    html += '<br>';
                    html += '<div style="padding-left: 20px;">';
                    html += 'PNH - REP (TBA 03/01/2016 [150 PAX]';
                  html += '</div>';
                  html += '<div class="clearfix"></div>';
                html += '</div>';

                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '<div class="clearfix"></div>';
                html += '</div>';
                // ######## End Pax

                html += '<div class="pull-left" style="top:0px;position: absolute;right: -30px;">';
                html += '<small>&nbsp; '+data.destination_name+' &nbsp;</small>'; 
                html += '<div style="font-size:10px;position:absolute;">'+STA_minute+'</div>';
                html += '</div>';
                html += '<div style="position: absolute center;">';
                html += '<center>';
                html += '<div style="font-size:10px;">';
                html += '<span style="background:yellow;cursor: pointer;">';
                // Function CalculateTime & CalculateMinute stay in public/js/common.js 
                html += CalculateTime(STA_Time,STD_Time);
                html += CalculateMinute(STA_Time,STD_Time);
                
                html += '</span>';
                html += '</div>';
                html += '</center>';
                html += '</div>';
                html += '</span>';
                html += '<div class="clearfix"></div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                // #END block UTC FLIGHT 

                // <!-- ######### LOCATION TIME #######-->
                html += '<div class="schedule_content" style="display: none;position: absolute;z-index: 99;top:'+class_top+'px;left:0px;">';
                html += '<div class="schedule_inner" style="margin-left:'+distance+'px;">'
                html += '<div style="position: absolute;">';
                html += '<span>';
                html += '<div class="pull-left" style="position:absolute;left:-25px;">';
                html += '<small>'+data.origin_name+' &nbsp;</small> ';
                html += '<div style="font-size:10px;position: absolute;left:20px;">'+STD_minute+'</div>';
                html += '</div>';
                
                html +='<div id="flight_pax_double">'
                  html += '<a onClick="InitFlightPax('+data.fsm_id+')" href="javascript:void();" class="pull-left" style="margin-top:4px;position: relative;top:0px;background-color:#337ab7;width:'+etimate_time+'px;height:15px;color:#fff;">';
                  html += '<small><center><span style="position: absolute;left:0px;right:0px;z-index: 99;">'+data.flight_number+'</span></center></small>';
                  html += '<span style="top:0px;position: absolute;height: 15px;right: 0px;width:10px;background-color:'+data.fnotification_color+'"></span>';
                  html += '</a>';
                html +='</div>'

                // ##########Flight Pax Loading
                html += '<div id="flight_pax_main'+data.fsm_id+'" style="position: relative;height: 100%;width: 100%;display:none;">';
                html += '<div class="flight_pax<?php //echo $FlightSchedule->fsm_id;?>" style="position: absolute;z-index: 99;width:830px;top:40px;right:-220%;height: 100%;">';
                html += '<div style="background-color:#fff;border-radius: 4px;border:1px solid #777;">';
                html += '<div class="flight_box_title" style=";padding:10px;">';
                html += '<div style="text-align: center;border-bottom:1px solid #eee;">';
                html += '<a href="#" class="btn btn-sm btn-primary">FLIGHT</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">PAX</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">REMARK</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">SWAP FLIGHT</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">DIVERTED FLIGHT</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">CANCEL FLIGHT</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">REQUEST FLIGHT</a>';
                html += '<a href="#" class="btn btn-sm btn-primary">RETIME</a>';
                html += '</div>';
                html += '<div style="padding:10px;line-height: 25px;">';
                // html += '<div class="row"> <b>Flight Number : </b> $FlightSchedule->flight_number</div>';
                html += '<div class="row" style="z-index:9999;">';
                  html += '<div class="col-sm-6">';
                    html += '<div class="row"> <b>Aircraft Registration : </b> U-113</div>';
                    html += '<div class="row"> <b>Captain(s) : </b> Sineth</div>';
                    html += '<div class="row"> <b>FO : </b> J Brenner</div>';
                    html += '<div class="row"> <b>Created By : </b> J Sovanna on 8/03/ 13:00</div>';
                    html += '<div class="row"> <b>ATD : </b> 12:30</div>';
                    html += '<div class="row"> <b>ATA : </b> 02:40</div>';
                  html += '</div>';

                  html += '<div class="col-sm-6">'
                    html += '<div class="row"> <b>Route Info : </b>';
                    html += '<br>';
                    html += '<div style="padding-left: 20px;">';
                    html += 'PNH - REP (TBA 03/01/2016 [150 PAX]';
                  html += '</div>';
                  html += '<div class="clearfix"></div>';
                html += '</div>';

                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '<div class="clearfix"></div>';
                html += '</div>';
                // ######## End Pax

                html += '<div class="pull-left" style="top:0px;position: absolute;right: -30px;">';
                html += '<small>&nbsp; '+data.destination_name+' &nbsp;</small>'; 
                html += '<div style="font-size:10px;position:absolute;">'+STA_minute+'</div>';
                html += '</div>';
                html += '<div style="position: absolute center;">';
                html += '<center>';
                html += '<div style="font-size:10px;">';
                html += '<span style="background:yellow;cursor: pointer;">';
                // Function CalculateTime & CalculateMinute stay in public/js/common.js 
                html += CalculateTime(STA_Time,STD_Time);
                html += CalculateMinute(STA_Time,STD_Time);
                
                html += '</span>';
                html += '</div>';
                html += '</center>';
                html += '</div>';
                html += '</span>';
                html += '<div class="clearfix"></div>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                
              }

            });
            // }

            var aircraft_num = $("#aircraft_num").val();
            var j=1;
            for(j=1;j<=aircraft_num;j++){
              html += '<!-- Aircraft-Cell -->';
              html += '<div class="column" style="position: relative;display: block;width:100%;">';
              html += '<!-- grid-flight-time perday -->';
              // alert(data.countAircraft);
              html += '<div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div><div class="cell"></div>';
              html += '</div>';
            }
            
            html += '</div>';

            html += '<!-- gt-timeline ###################-->';
            html += '<div class="main_line"></div><div class="bottom_line"></div><div class="gt-timeline" style="z-index: -100"><div class="horizontal-line month-line even-month" style="left:12.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:25px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:37.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:62.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:75px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:87.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:112.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:125px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:137.5px"><div class="second">45</div></div><!-- second --><div class="horizontal-line month-line even-month" style="left:162.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:175px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:187.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:212.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:225px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:237.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:262.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:275px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:287.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:312.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:325px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:337.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:362.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:375px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:387.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:412.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:425px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:437.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:462.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:475px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:487.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:512.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:525px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:537.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:562.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:575px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:587.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:612.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:625px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:637.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:662.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:675px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:687.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:712.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:725px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:737.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:762.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:775px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:787.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:812.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:825px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:837.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:862.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:875px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:887.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:912.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:925px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:937.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:962.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:975px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:987.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1012.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1025px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1037.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1062.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1075px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1087.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1112.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1125px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1137.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1162.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1175px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1187.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line leftend" style="left:0px"><div class="year">0000</div></div><div class="horizontal-line leftend" style="left:50px"><div class="year">0100</div></div><div class="horizontal-line leftend" style="left:100px"><div class="year">0200</div></div><div class="horizontal-line leftend" style="left:150px"><div class="year">0300</div></div><div class="horizontal-line leftend" style="left:200px"><div class="year">0400</div></div><div class="horizontal-line leftend" style="left:250px"><div class="year">0500</div></div><div class="horizontal-line leftend" style="left:300px"><div class="year">0600</div></div><div class="horizontal-line leftend" style="left:350px"><div class="year">0700</div></div><div class="horizontal-line leftend" style="left:400px"><div class="year">0800</div></div><div class="horizontal-line leftend" style="left:450px"><div class="year">0900</div></div><div class="horizontal-line leftend" style="left:500px"><div class="year">1000</div></div><div class="horizontal-line leftend" style="left:550px"><div class="year">1100</div></div><div class="horizontal-line leftend" style="left:600px"><div class="year">1200</div></div><div class="horizontal-line leftend" style="left:650px"><div class="year">1300</div></div><div class="horizontal-line leftend" style="left:700px"><div class="year">1400</div></div><div class="horizontal-line leftend" style="left:750px"><div class="year">1500</div></div><div class="horizontal-line leftend" style="left:800px"><div class="year">1600</div></div><div class="horizontal-line leftend" style="left:850px"><div class="year">1700</div></div><div class="horizontal-line leftend" style="left:900px"><div class="year">1800</div></div><div class="horizontal-line leftend" style="left:950px"><div class="year">1900</div></div><div class="horizontal-line leftend" style="left:1000px"><div class="year">2000</div></div><div class="horizontal-line leftend" style="left:1050px"><div class="year">2100</div></div><div class="horizontal-line leftend" style="left:1100px"><div class="year">2200</div></div><div class="horizontal-line leftend" style="left:1150px"><div class="year">2300</div></div></div></div>';
        

      $("#displya_dynamic_time_schedule").append(html);
        // $.eventallDatfVa();
      }
    });

    // eventallData
    $.eventallData = function(event){
      // Prevent All Script Event
      $("#flight_pax_double a").dblclick(function(e){
        e.preventDefault();
        var flight_pax_id = $("#flight_pax_id").val();
        // alert(flight_pax_id);
        var href = "{{url('')}}/admin/schedule_monitor/flight_log?id="+flight_pax_id;
        // window.location = href;
      });
    }
    // #END function
  </script>

  <!-- Action Retime Flight Schedule ##################-->
  <script type="text/javascript">

    // initFlight#############
    function initFlight(fsm_id){
      
      var fsm_atd = $("input[name='fsm_atd"+fsm_id+"']");
      var fsm_ata = $("input[name='fsm_ata"+fsm_id+"']");

      var v_fsm_atd = fsm_atd.val();
      var v_fsm_ata = fsm_ata.val();

      if (ValidateNumber(v_fsm_atd) || v_fsm_atd==""){
        alert("{!!trans('flightschedule/schedulemonitor.input_number_only')!!}!");
        return false;
      }

      var c = confirm("{!!trans('flightschedule/schedulemonitor.do_you_want_to_save')!!}");
      if(c){
        $.ajax({
          url: "{{url('admin/schedule_monitor/Flight_Status')}}",
          type:'post',
          data:{
            fsm_id: fsm_id,
            fsm_atd: fsm_atd.val(),
            fsm_ata: fsm_ata.val(),
          },
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
          success: function(json) {
            alert("{!!trans('flightschedule/schedulemonitor.you_have_modified_schedule')!!}");
            // location.reload(true);
            console.log(json);
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
        });
      }
      // });
    }

    // initRetimeFlight
    function initRetimeFlight(fsm_id){
      // alert(fsm_id);
      // $('#save_product_customize').on('click',function(){
      // r_std means retime schedule departure
      // r_sta means retime schedule arrival
      var r_std = $("input[name='r_std"+fsm_id+"']");
      var r_sta = $("input[name='r_sta"+fsm_id+"']");

      var v_fsm_atd = r_std.val();
      var v_fsm_ata = r_sta.val();

      if (ValidateNumber(v_fsm_atd) || v_fsm_atd==""){
        alert("{!!trans('flightschedule/schedulemonitor.input_number_only')!!}!");
        return false;
      }
      
      // alert(r_std.val());

      var c = confirm("{!!trans('flightschedule/schedulemonitor.do_you_want_to_save')!!}");
      if(c){
        $.ajax({
          url: "{{url('admin/schedule_monitor/RetimeFlightStatus')}}",
          type:'post',
          data:{
            fsm_id: fsm_id,
            r_std: r_std.val(),
            r_sta: r_std.val(),
          },
          // data:  $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
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
          success: function(json) {
            alert("{!!trans('flightschedule/schedulemonitor.you_have_modified_schedule')!!}");
            // location.reload(true);
            console.log(json);
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
        });
      }
    // });
    }
    // initDelayFlight
    function initDelayFlight(fsm_id){
      // $('#save_product_customize').on('click',function(){
      // d_std means Delay schedule departure
      // d_sta means Delay schedule arrival
      var d_std = $("input[name='d_std"+fsm_id+"']");
      var d_sta = $("input[name='d_sta"+fsm_id+"']");

      var c = confirm("Do you want to save?");
      if(c){
        $.ajax({
          url: "{{url('admin/schedule_monitor/DelayFlightStatus')}}",
          type:'post',
          data:{
            fsm_id: fsm_id,
            d_std: d_std.val(),
            d_sta: d_sta.val(),
          },
          // data:  $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
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
          success: function(json) {
            alert("You have update flight schedule!");
            // location.reload(true);
            console.log(json);
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
        });
      }
    // });
    }

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

  <script type="text/javascript">
    var now = moment();
    var time = now.hour() + ':' + now.minutes() + ':' + now.seconds();
    time = time + ((now.hour()) >= 12 ? ' PM' : ' AM');
  </script>
  
@endsection