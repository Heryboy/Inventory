<!-- Context Menu################ -->
<!-- Other plugins stylesheets for this demo page, unrelated to BootstrapMenu -->
<script src="{{url('js/context_menu/js/toastr.js')}}"></script>
<link rel="stylesheet" href="{{url('js/context_menu/css/toastr.css')}}">
<!-- <link rel="stylesheet" href="{{url('js/context_menu/css/highlight-8.6.default.min.css')}}"> -->
<!-- #END CONTEXT MENU SCRIPT -->
<!-- Context Menu################ -->
<!-- Other plugins used in this demo page -->
<script src="{{url('js/context_menu/dist/BootstrapMenu.min.js')}}"></script>
<!-- #END Context Menu ################ -->
<script>

  // var actions = [{
  //   name: 'Change Aircrafts',
  //   iconClass: 'fa-wa fa-pencil',
  //   onClick: function() {
  //     var att = $("#contextMenuOption").attr('id');
  //     alert(att);
  //     $('#show_option_settings').toggle("slide", { direction: "top" }, 100);
  //     toastr.info("Choose Aircrafts to Change!");
  //   }
  // }, {
  //   name: 'Reactive Flight',
  //   iconClass: 'fa-wa fa-check',
  //   onClick: function() {
  //     toastr.info("You Have Reactive Flight!");
  //   }
  // }];
  // var menu2 = new BootstrapMenu(".contextMenuOption", {
  //   menuEvent: 'right-click',
  //   menuSource: 'element',
  //   menuPosition: 'belowLeft',
  //   actions: actions
  // });

  // initAircraftMD
  function initAircraftMD(){
    var utc_default_time = $('#DEFAULT_UTC_TIME').val();

    var aircraft_id = $("#aircraft_change_id").val();
    var fsm_id = $("#aircraft_fsm_id").val();
    var flight_status_id = $("#aircraft_flight_status_id").val();
    var total_distance = $("#aircraft_total_distance").val();
    var schedule_date = $("#aircraft_schedule_date").val();

    var fsm_id = $("#fsm_id").val();
    if(aircraft_id==''){
      toastr.warning("{!!trans('operation_mgr/schedule_assignment.warning_choose_aircraft')!!}");
      return false;
    }

    var c = confirm("{!!trans('operation_mgr/schedule_assignment.are_you_sure_you_want_to_change_aircraft')!!}");
    if(c){
      $.ajax({
        url: "{{url('admin/schedule_monitor/ChangeAircraft')}}",
        type:'post',
        data:{
          fsm_id: fsm_id,
          flight_status_id:flight_status_id,
          utc_default_time: utc_default_time,
          schedule_date: schedule_date,
          aircraft_id: aircraft_id,
        },
        dataType: 'json',
        beforeSend: function() {
          $("#loading").show();
        },
        complete: function() {
          $("#loading").hide();
        },
        success: function(data) {
          $.getLayoutByActionOnFlight(data,utc_default_time,total_distance,schedule_date);
          toastr.success("{!!trans('operation_mgr/schedule_assignment.aircraft_has_been_changed')!!}");
          $('#show_option_settings').toggle("slide", { direction: "top" }, 100);
          // location.reload(true);
          // console.log(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    }

  }

  // function initGetByAircraft(aircraft_id,aircraft_name){
  //   $(this).toggleClass('active-status');
  //   toastr.success("You Aelected Aircraft ("+aircraft_name+")!");
  // }
  
  function initGetByAircraft(aircraft_id,aircraft_name){
    var air = $("#aircraft_change_id").val(aircraft_id);
    $(".initGetByAircraft-"+aircraft_id+"").toggleClass('active-status');
    toastr.success("{!!trans('operation_mgr/schedule_assignment.you_have_selected')!!} ("+aircraft_name+")!");
  }
  // initClose
  function initClose(){
    $('#show_option_settings').toggle("slide", { direction: "top" }, 100);
    toastr.success("{!!trans('operation_mgr/schedule_assignment.you_have_closed_form')!!}");
  }

  // initDragChangeSchedule
  function initDragChangeSchedule(){    
    var utc_default_time = $('#DEFAULT_UTC_TIME').val();
    var fsm_id = $("#draggable_fsm_id").val();
    var aircraft_id = $("#draggable_aircraft").val();
    var STD = $("#STD").val();
    var STA = $("#STA").val();
    var total_distance = $("#draggable_total_distance").val();
    var schedule_date = $("#draggable_schedule_date").val();

    var c = confirm("{!!trans('operation_mgr/schedule_assignment.are_you_sure_you_want_to_modify_this_schedule')!!}");
    if(c){
      $.ajax({
        url: "{{url('admin/schedule_monitor/ReTimeScheduleByOneFlightDrag')}}",
        type:'post',
        data:{
          fsm_id: fsm_id,
          STD: STD,
          STA: STA,
          aircraft_id: aircraft_id,
          utc_default_time: utc_default_time,
          schedule_date: schedule_date,
        },
        dataType: 'json',
        beforeSend: function() {
          $("#loading").show();
        },
        complete: function() {
          $("#loading").hide();
        },
        success: function(data) {
          $.getLayoutByActionOnFlight(data,utc_default_time,total_distance,schedule_date);
          toastr.success("{!!trans('operation_mgr/schedule_assignment.aircraft_has_been_changed')!!}");
          $('#show_time_setting_grid_time').toggle("slide", { direction: "top" }, 100);
          location.reload(true);
          // console.log(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    }
  }

  // initDragActionClose
  function initDragActionClose(){
    $('#show_time_setting_grid_time').toggle("slide", { direction: "top" }, 100);
    toastr.success("You have close from!");

    var fsm_id = $("#draggable_aircraft").val();
    var flight_status_id = $("#draggable_schedule_date").val();
    var total_distance = $("#draggable_total_distance").val();
    var schedule_date = $("#aircraft_schedule_date").val();

    // dragg Clear
    $("#draggable_aircraft").val("");
    $("#draggable_fsm_id").val("");
    $("#draggable_schedule_date").val("");
    $("#draggable_total_distance").val("");
    location.reload(true);
  }

</script>

<!-- <div style="-display: none;" id="show_option_settings" class="-modal -fade -bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="-true" style="position:absolute !important;left: 0px !important;right: 0px !important;top: -100px !important;"> -->

<!-- show_option_settings########### -->
<div id="show_option_settings" class="-modal -fade -bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="-true" style="position: fixed !important;z-index: 10000;display: none;left: 0px !important;right: 0px !important;top: 0px !important;bottom: 0 !important;">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" onclick="initClose();" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-wa fa-plane"></i> {!!trans('operation_mgr/schedule_assignment.choose_aircrafts')!!}</h4>
      </div>
      <div class="modal-body">
        <div style="font-size:14px;"><i class="fa fa-wa fa-dashboard"></i> SECTORS => PHN - REP</div>
        <input type="hidden" name="aircraft_change_id" id="aircraft_change_id">
        <input type="hidden" name="aircraft_fsm_id" id="aircraft_fsm_id">
        <input type="hidden" name="aircraft_flight_status_id" id="aircraft_flight_status_id">
        <input type="hidden" name="aircraft_total_distance" id="aircraft_total_distance">
        <input type="hidden" name="aircraft_schedule_date" id="aircraft_schedule_date">
        <article style="margin-top:20px;">
          @foreach($Aircrafts as $Aircraft)
            <button onclick="initGetByAircraft('{{$Aircraft->id}}','{{$Aircraft->name}}');" data-need="{{$Aircraft->name}}" data-value="{{$Aircraft->id}}" class="btn btn-primary btn-md initGetByAircraft-{{$Aircraft->id}}">{{$Aircraft->name}}</button>
          @endforeach
          <!-- <button class="btn btn-success btn-md">XU-112</button>
          <button class="btn btn-success btn-md">XU-113</button>
          <button class="btn btn-success btn-md">XU-114</button> -->
        </article>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="initClose();"  data-dismiss="modal">Close</button>
        <button type="button"  onclick="initAircraftMD();" class="btn btn-primary">Save changes</button>
      </div>

    </div>
  </div>
</div>

<!-- show_time_setting_grid_time############## -->
<div id="show_time_setting_grid_time" class="-modal -fade -bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="-true" style="position: fixed !important;z-index: 10000;display: none;left: 0px !important;right: 0px !important;top: 0px !important;bottom: 0 !important;">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <!-- draggable_text -->
      <input type="hidden" placeholder="aircraft id" name="draggable_aircraft" id="draggable_aircraft">
      <input type="hidden" placeholder="fsm_id" name="draggable_fsm_id" id="draggable_fsm_id">
      <input type="hidden" placeholder="draggable_schedule_date" name="draggable_schedule_date" id="draggable_schedule_date">
      <input type="hidden" placeholder="draggable_total_distance" name="draggable_total_distance" id="draggable_total_distance">


      <div class="modal-header">
        <button type="button" class="close" id="initDragActionClose" onclick="initDragActionClose();" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-wa fa-plane"></i> SETUP TIME SCHEDULE</h4>
      </div>
      <div class="modal-body">
        <div class="col-sm-12" style="padding-bottom:10px;">
          <label class="col-sm-2"><i class="fa fa-wa fa-clock-o"></i> STD <span class="validate_label_red">*</span></label>
          <div class="col-sm-6" style="font-size:14px;"><input maxlength="4" type="text" class="form-control" id="STD" name="STD"></div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-12" style="padding-bottom:10px;">
          <label class="col-sm-2"><i class="fa fa-wa fa-clock-o"></i> STA <span class="validate_label_red">*</span></label>
          <div class="col-sm-6" style="font-size:14px;"><input maxlength="4" type="text" class="form-control" id="STA" name="STA"></div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="initDragActionClose" onclick="initDragActionClose();"  data-dismiss="modal">Close</button>
        <button type="button"  onclick="initDragChangeSchedule();" class="btn btn-primary">Save changes</button>
      </div>

    </div>
  </div>
</div>