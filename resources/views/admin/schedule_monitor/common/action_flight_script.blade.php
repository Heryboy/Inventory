<!-- Action Retime Flight Schedule ##################-->
<script type="text/javascript">
  // disableAction
  function disableAction(){
    toastr.warning("{!!trans('flightschedule/schedulemonitor.you_can_not_update_flight_info')!!}");
  }

  // initChangeAircraft
  function initChangeAircraft(fsm_id,flight_status_id,total_distance,schedule_date){
    $('#show_option_settings').toggle("slide", { direction: "left" }, 100);
    
    $("#aircraft_fsm_id").val(fsm_id);
    $("#aircraft_flight_status_id").val(flight_status_id);
    $("#aircraft_total_distance").val(total_distance);
    $("#aircraft_schedule_date").val(schedule_date);
  }
  
  // initReActiveStatus ############
  function initReActiveStatus(fsm_id,flight_status_id,total_distance,schedule_date,fsm_flight_group,pax_movement_id){
    var utc_default_time = $('#DEFAULT_UTC_TIME').val();
    var c = confirm("{!!trans('flightschedule/schedulemonitor.are_you_sure_u_want_to_reactive_flight')!!}");
    if(c){
      $.ajax({
        url: "{{url('admin/schedule_monitor/ReactiveFlight')}}",
        type:'post',
        data:{
          fsm_id: fsm_id,
          fsm_flight_group:fsm_flight_group,
          pax_movement_id:pax_movement_id,
          flight_status_id:flight_status_id,
          utc_default_time: utc_default_time,
          schedule_date: schedule_date,
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
        success: function(data) {
          $.getLayoutByActionOnFlight(data,utc_default_time,total_distance,schedule_date);
          toastr.success("{!!trans('flightschedule/schedulemonitor.you_have_modified_schedule')!!}");
          $("#loading").hide();
          // remove cancel flight schedule when user reinstate schedule
          location.reload(true);
          $('#'+fsm_id+'').remove();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    }
  } 

  // initFlight#############
  function initFlight(fsm_id,total_distance,schedule_date,origin_id,destination_id,aircraft_id,fsm_STD,fsm_STA,flight_number,local_hour,std_t){
    var capture_current_date = $("#capture_current_date").val();
    var utc_default_time = $('#DEFAULT_UTC_TIME').val();
    var block_off = $("input[name='block_off"+fsm_id+"']");
    var block_on = $("input[name='block_on"+fsm_id+"']");
    var fnotification_status = $("select[name='fnotification_status"+fsm_id+"']");
    var adult = $("input[name='adult"+fsm_id+"']");
    var child = $("input[name='child"+fsm_id+"']");
    var enfant = $("input[name='enfant"+fsm_id+"']");
    var f = $("input[name='first_class_"+fsm_id+"']");
    var c = $("input[name='business_class_"+fsm_id+"']");
    var y = $("input[name='economic_class_"+fsm_id+"']");
    var cargo = $("input[name='cargo"+fsm_id+"']");
    var block_fuel = $("input[name='block_fuel"+fsm_id+"']");
    var used_fuel = $("input[name='used_fuel"+fsm_id+"']");
    var distance = $("input[name='distance"+fsm_id+"']");

    var fsm_atd = $("input[name='fsm_atd"+fsm_id+"']");
    var fsm_ata = $("input[name='fsm_ata"+fsm_id+"']");
    var fsm_remark = $("textarea[name='fsm_remark"+fsm_id+"']");
    var fsm_fg  = $("input[name='fsm_fg"+fsm_id+"']");
    var pax_movement = $("select[name='pax_movement"+fsm_id+"']");
    
    var v_fsm_atd = fsm_atd.val();
    var v_fsm_ata = fsm_ata.val();

    if(fsm_atd.val()>SlitTime(fsm_STD)){
      var flight_status_id = 4;
    }else{
      var flight_status_id = 1;
    }

    if(ValidateNumber(block_off.val())){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.block_off_must_be_number_only')!!}");  
      $(".group_block_off"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_block_off"+fsm_id+"").removeClass("has-error");
    }
    // ATD
    if(schedule_date<=capture_current_date){
      if((parseInt(local_hour)-7) >= std_t){
        if (v_fsm_atd==""){
          toastr.warning("{!!trans('flightschedule/schedulemonitor.provide_ATD')!!}");
          $(".group_atd_"+fsm_id+"").addClass("has-error");
          return false;
        }else if(ValidateNumber(v_fsm_atd)){
          toastr.warning("{!!trans('flightschedule/schedulemonitor.atd_must_be_number_only')!!}");
          return false;
        }else if(v_fsm_atd.length<4){
          toastr.warning("{!!trans('flightschedule/schedulemonitor.atd_must_be_4_digit')!!}");
          return false;
        }else{
          $(".group_atd_"+fsm_id+"").removeClass("has-error");
        }
      }
    }
    // ATA
    if(ValidateNumber(v_fsm_ata)){ 
      toastr.warning("{!!trans('flightschedule/schedulemonitor.ata_must_be_number_only')!!}");
      $(".group_ata_"+fsm_id+"").addClass("has-error");
      return false;
    }else if(v_fsm_ata!=''){
      if(v_fsm_ata.length<4){
        toastr.warning("{!!trans('flightschedule/schedulemonitor.ata_must_be_4_digit')!!}");
        return false;
      }else{
        $(".group_ata_"+fsm_id+"").removeClass("has-error");  
      }
    }else{
      $(".group_ata_"+fsm_id+"").removeClass("has-error");
    }
    // Block ON
    if(ValidateNumber(block_on.val())){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.block_on_must_be_number_only')!!}");
      $(".group_block_on"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_block_on"+fsm_id+"").removeClass("has-error");
    }


    // Group Adult
    if(ValidateNumber(adult.val())){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.adult_must_be_number_only')!!}");
      $(".group_adult"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_adult"+fsm_id+"").removeClass("has-error");
    }

    // Group Child
    if(ValidateNumber(child.val())){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.child_must_be_number_only')!!}");
      $(".group_child"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_child"+fsm_id+"").removeClass("has-error");
    }

    // Group Enfant
    if(ValidateNumber(enfant.val())){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.enfant_must_be_number_only')!!}");
      $(".group_enfant"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_enfant"+fsm_id+"").removeClass("has-error");
    }

    // Group F
    if(ValidateNumber(f.val())){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.f_must_be_number_only')!!}");
      $(".group_f"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_f"+fsm_id+"").removeClass("has-error");
    }

    // Group C
    if(ValidateNumber(c.val())){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.c_must_be_number_only')!!}");
      $(".group_c"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_c"+fsm_id+"").removeClass("has-error");
    }

    // Group Y
    if(ValidateNumber(y.val())){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.y_must_be_number_only')!!}");
      $(".group_y"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_y"+fsm_id+"").removeClass("has-error");
    }

    var confirm_data = confirm("{!!trans('flightschedule/schedulemonitor.are_you_sure_you_want_to_modified_the_schedule')!!}");
    if(confirm_data){
      $.ajax({
        url: "{{url('admin/schedule_monitor/Flight_Status')}}",
        type:'post',
        data:{
          fsm_id: fsm_id,
          fsm_atd: fsm_atd.val(),
          fsm_ata: fsm_ata.val(),
          fsm_fg: fsm_fg.val(),
          fsm_STD: SlitTime(fsm_STD),
          fsm_STA: SlitTime(fsm_STA),
          aircraft_id: aircraft_id,
          origin_id: origin_id,
          destination_id: destination_id,
          // flight_status_id: flight_status_id,
          fsm_remark:fsm_remark.val(),
          block_off: block_off.val(),
          block_on: block_on.val(),
          fnotification_status: fnotification_status.val(),
          adult: adult.val(),
          child: child.val(),
          enfant: enfant.val(),
          f: f.val(),
          c: c.val(),
          y: y.val(),
          flight_number:flight_number,
          cargo: cargo.val(),
          block_fuel: block_fuel.val(),
          used_fuel: used_fuel.val(),
          distance: distance.val(),
          utc_default_time: utc_default_time,
          schedule_date: schedule_date,
          pax_movement: pax_movement.val(),
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
        success: function(data) {
          $.getLayoutByActionOnFlight(data,utc_default_time,total_distance,schedule_date);
          toastr.success("{!!trans('flightschedule/schedulemonitor.you_have_modified_schedule')!!}");
          // location.reload(true);
          // console.log(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          toastr.warning(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    }
    // });
  }

  // initRetimeFlight
  function initRetimeFlight(fsm_id,flight_status_id,total_distance,schedule_date,origin_id,destination_id,aircraft_id,flight_number){
    var utc_default_time = $('#DEFAULT_UTC_TIME').val();
    // alert(fsm_id);
    // $('#save_product_customize').on('click',function(){
    // r_std means retime schedule departure
    // r_sta means retime schedule arrival
    var r_std = $("input[name='r_std"+fsm_id+"']");
    var r_sta = $("input[name='r_sta"+fsm_id+"']");
    var retime_remark = $("textarea[name='retime_remark"+fsm_id+"']");

    var v_fsm_std = r_std.val();
    var v_fsm_sta = r_sta.val();

    // if (ValidateNumber(v_fsm_atd) || v_fsm_atd==""){
    if(v_fsm_std==""){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.please_input_STD_time')!!}");
      $(".group_retime_std"+fsm_id+"").addClass("has-error");
      return false;
    }else if(v_fsm_std.length<4){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.std_must_be_4_digit')!!}");
      $(".group_retime_std"+fsm_id+"").addClass("has-error");
      return false;
    }else if(ValidateNumber(v_fsm_std)){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.std_must_be_number_only')!!}");
      $(".group_retime_std"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_retime_std"+fsm_id+"").removeClass("has-error");
    }

    if(v_fsm_sta==""){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.please_input_STA_time')!!}");
      $(".group_retime_sta"+fsm_id+"").addClass("has-error");
      return false;
    }else if(v_fsm_sta.length<4){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.sta_must_be_4_digit')!!}");
      $(".group_retime_sta"+fsm_id+"").addClass("has-error");
      return false;
    }else if(ValidateNumber(v_fsm_sta)){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.sta_must_be_number_only')!!}");
      $(".group_retime_sta"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_retime_sta"+fsm_id+"").removeClass("has-error");
    }

    // else if(v_fsm_ata<=v_fsm_atd){
    //   alert("{!!trans('flightschedule/schedulemonitor.time_you_input_is_not_valid')!!}");
    //   return false;
    // }

    // alert(r_std.val());
    var c = confirm("{!!trans('flightschedule/schedulemonitor.are_you_sure_you_want_to_modified_the_schedule')!!}");
    if(c){
      $.ajax({
        url: "{{url('admin/schedule_monitor/RetimeFlightStatus')}}",
        type:'post',
        data:{
          fsm_id: fsm_id,
          flight_number:flight_number,
          r_std: r_std.val(),
          r_sta: r_sta.val(),
          flight_status_id:flight_status_id,
          utc_default_time: utc_default_time,
          schedule_date: schedule_date,
          origin_id:origin_id,
          destination_id:destination_id,
          aircraft_id:aircraft_id,
          retime_remark:retime_remark.val(),
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
        success: function(data) {
          $.getLayoutByActionOnFlight(data,utc_default_time,total_distance,schedule_date);

          toastr.success("{!!trans('flightschedule/schedulemonitor.you_have_modified_schedule')!!}");
          // location.reload(true);
          // console.log(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    }
  }

  // initRescheduleFlight
  function initRescheduleFlight(fsm_id,flight_status_id,total_distance,schedule_date,origin_id,destination_id,aircraft_id,flight_number){
    var utc_default_time = $('#DEFAULT_UTC_TIME').val();
    var re_std = $("input[name='re_std"+fsm_id+"']");
    var re_sta = $("input[name='re_sta"+fsm_id+"']");
    var reschedule_remark = $("textarea[name='reschedule_remark"+fsm_id+"']");
    var v_fsm_std = re_std.val();
    var v_fsm_sta = re_sta.val();

    // if (ValidateNumber(v_fsm_atd) || v_fsm_atd==""){
    if(v_fsm_std==""){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.please_input_divert_STD_time')!!}");
      $(".group_reschedule_std"+fsm_id+"").addClass("has-error");
      return false;
    }else if(v_fsm_std.length<4){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.std_must_be_4_digit')!!}");
      $(".group_reschedule_std"+fsm_id+"").addClass("has-error");
      return false;
    }else if(ValidateNumber(v_fsm_std)){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.std_must_be_number_only')!!}");
      $(".group_reschedule_std"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_reschedule_std"+fsm_id+"").removeClass("has-error");
    }

    if(v_fsm_sta==""){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.please_input_divert_STA_time')!!}");
      $(".group_reschedule_sta"+fsm_id+"").addClass("has-error");
      return false;
    }else if(v_fsm_sta.length<4){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.sta_must_be_4_digit')!!}");
      $(".group_reschedule_sta"+fsm_id+"").addClass("has-error");
      return false;
    }else if(ValidateNumber(v_fsm_sta)){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.sta_must_be_number_only')!!}");
      $(".group_reschedule_std"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_reschedule_sta"+fsm_id+"").removeClass("has-error");
    }

    // alert(r_std.val());
    var c = confirm("{!!trans('flightschedule/schedulemonitor.are_you_sure_you_want_to_modified_the_schedule')!!}");
    if(c){
      $.ajax({
        url: "{{url('admin/schedule_monitor/initRescheduleFlight')}}",
        type:'post',
        data:{
          fsm_id: fsm_id,
          flight_number:flight_number,
          re_std: re_std.val(),
          re_sta: re_sta.val(),
          reschedule_remark:reschedule_remark.val(),
          flight_status_id:flight_status_id,
          utc_default_time: utc_default_time,
          schedule_date: schedule_date,
          origin_id:origin_id,
          destination_id:destination_id,
          aircraft_id:aircraft_id,
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

          toastr.success("{!!trans('flightschedule/schedulemonitor.you_have_modified_schedule')!!}");
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    }
  }

  // initDivertFlight
  function initDivertFlight(fsm_id,flight_status_id,total_distance,schedule_date,aircraft_id,flight_schedule_id,flight_number,fsm_flight_group){

    var utc_default_time = $('#DEFAULT_UTC_TIME').val();
    var s_origin_id = $("select[name='d_origin_id"+fsm_id+"']");
    var s_destination_id = $("select[name='divert_destination_id"+fsm_id+"']");
    var s_std = $("input[name='s_STD"+fsm_id+"']");
    var s_sta = $("input[name='s_STA"+fsm_id+"']");
    var nd_origin_id = $("select[name='nd_divert_location_id"+fsm_id+"']");
    var nd_destination_id = $("select[name='nd_destination_id"+fsm_id+"']");
    var nd_std = $("input[name='nd_STD"+fsm_id+"']");
    var nd_sta = $("input[name='nd_STA"+fsm_id+"']");
    var divert_remark = $("textarea[name='divert_remark"+fsm_id+"']");
    var is_diverted = $("input[name='is_diverted"+fsm_id+"']").val();
    
    if(s_destination_id.val()==""){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.please_select_arrival')!!}");
      $(".group_diverted_arrival"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_diverted_arrival"+fsm_id+"").removeClass("has-error");
    }

    if(s_sta.val()==""){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.please_input_arrival_time_sector')!!}");
      $(".group_diverted_sta"+fsm_id+"").addClass("has-error");
      return false;
    }else if(s_sta.val().length<4){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.sta_must_be_4_digit')!!}");
      $(".group_diverted_sta"+fsm_id+"").addClass("has-error");
      return false;
    }else if(ValidateNumber(s_sta.val())){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.sta_must_be_number_only')!!}");
      $(".group_diverted_sta"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_diverted_sta"+fsm_id+"").removeClass("has-error");
    }
    // else if(s_sta.val() <= s_std.val()){
    //   alert("{!!trans('flightschedule/schedulemonitor.time_you_input_is_not_valid')!!}");
    //   return false;
    // }

    if(is_diverted!=""){
      if(nd_std.val()==""){
        toastr.warning("{!!trans('flightschedule/schedulemonitor.please_input_divert_STD_time')!!}");
        $(".group_diverted_to_std"+fsm_id+"").addClass("has-error");
        return false;
      }else{
        $(".group_diverted_to_std"+fsm_id+"").removeClass("has-error");
      }

      // else if(nd_std.val() <= s_sta.val()){
      //   alert("{!!trans('flightschedule/schedulemonitor.time_you_input_is_not_valid')!!}");
      //   return false;
      // }

      if(nd_sta.val()==""){
        toastr.warning("{!!trans('flightschedule/schedulemonitor.please_input_divert_STA_time')!!}");
        $(".group_diverted_to_sta"+fsm_id+"").addClass("has-error");
        return false;
      }else if(nd_sta.val().length<4){
        toastr.warning("{!!trans('flightschedule/schedulemonitor.sta_must_be_4_digit')!!}");
        $(".group_diverted_to_sta"+fsm_id+"").addClass("has-error");
        return false;
      }else if(ValidateNumber(nd_sta.val())){
        toastr.warning("{!!trans('flightschedule/schedulemonitor.sta_must_be_number_only')!!}");
        $(".group_diverted_to_sta"+fsm_id+"").addClass("has-error");
        return false;
      }else{
        $(".group_diverted_to_sta"+fsm_id+"").removeClass("has-error");
      }

      // else{
      //   $(".group_diverted_to_sta"+fsm_id+"").removeClass("has-error");
      // }

      // else if(nd_sta.val() <= nd_std.val()){
      //   alert("{!!trans('flightschedule/schedulemonitor.time_you_input_is_not_valid')!!}");
      //   return false;
      // }
    }

    // alert(s_origin_id.val());
    var c = confirm("{!!trans('flightschedule/schedulemonitor.are_you_sure_you_want_to_modified_the_schedule')!!}");
    if(c){
      $.ajax({
        url: "{{url('admin/schedule_monitor/initDivertFlight')}}",
        type:'post',
        data:{
          fsm_id:fsm_id,
          flight_number:flight_number,
          fsm_flight_group:fsm_flight_group,
          aircraft_id: aircraft_id,
          s_origin_id: s_origin_id.val(),
          s_destination_id: s_destination_id.val(),
          s_std: s_std.val(),
          s_sta: s_sta.val(),
          flight_schedule_id: flight_schedule_id,
          nd_origin_id: nd_origin_id.val(),
          nd_destination_id: nd_destination_id.val(),
          nd_std: nd_std.val(),
          nd_sta: nd_sta.val(),
          divert_remark: divert_remark.val(),
          utc_default_time: utc_default_time,
          schedule_date: schedule_date,
          flight_status_id: flight_status_id,
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
        success: function(data) {
          $.getLayoutByActionOnFlight(data,utc_default_time,total_distance,schedule_date);
          toastr.success("{!!trans('flightschedule/schedulemonitor.you_have_modified_schedule')!!}");
          // location.reload(true);
          // console.log(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    }
  }

  // initSwapFlight
  function initSwapFlight(){

    var utc_default_time = $('#DEFAULT_UTC_TIME').val();
    var schedule_swap = $("input[name='schedule_swap']");
    var aircraft_swap = $("input[name='aircraft_swap']");
    var swap_schedule = schedule_swap.val();
    var swap_aircraft = aircraft_swap.val();

    // var result=$(row).val().split('|');
    var result = swap_schedule.split('=>');
    var result_distance = swap_schedule.split(',');
    // alert(result[1]);
    var schedule_date = result[1];
    var fsm_id = result[0];
    var total_distance = result[7];

    // var result_distance_explode = total_distance.split(',');
    // alert(total_distance);
    // alert(utc_default_time);
    // alert(total_distance.split(','));
    // alert(schedule_date);
    
    // alert(s_origin_id.val());
    var n = swap_aircraft.length;
    
  
    if(swap_schedule==''){
      alert('Please, Choose Flight You Want to Swap Flight!');
      return false;
    }else if(swap_aircraft==''){
      alert('Please, Choose Choose Aircraft to swap flight!');
      return false;
    }

    if(n!=3){
      alert("Warning!, Choose At Least Two Aircarft!");
      return false;
    }else if(n>3){
      alert("Warning!, Choose Only Two Aircarft!");
      return false;
    }

    var c = confirm("Are you sure you want to swap flights?");
    if(c){
      $.ajax({
        url: "{{url('admin/schedule_monitor/initSwapFlight')}}",
        type:'post',
        data:{
          schedule_swap: schedule_swap.val(),
          aircraft_swap: aircraft_swap.val(),
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
          toastr.success("{!!trans('flightschedule/schedulemonitor.you_have_modified_schedule')!!}");
          // $("#schedule_swap").val("");
          // $("#aircraft_swap").val("");
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    }
  }

  // init_Swap_remove
  function init_Swap_remove(){
    $("#init_Swap_remove").show();
  }

  // initDelayFlight
  function initDelayFlight(fsm_id,flight_status_id,total_distance,schedule_date,origin_id,destination_id,aircraft_id,flight_number){
    var utc_default_time = $('#DEFAULT_UTC_TIME').val();
    var d_std = $("input[name='d_std"+fsm_id+"']");
    var d_sta = $("input[name='d_sta"+fsm_id+"']");
    var delay_remark = $("textarea[name='delay_remark"+fsm_id+"']");


    if(d_std.val()==""){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.please_input_STD_time')!!}");
      $(".group_delay_std"+fsm_id+"").addClass("has-error");
      return false;
    }else if(d_std.val().length<4){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.std_must_be_4_digit')!!}");
      $(".group_delay_std"+fsm_id+"").addClass("has-error");
      return false;
    }else if(ValidateNumber(d_std.val())){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.std_must_be_number_only')!!}");
      $(".group_delay_std"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_delay_std"+fsm_id+"").removeClass("has-error");
    }

    if(d_sta.val()==""){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.please_input_STA_time')!!}");
      $(".group_delay_sta"+fsm_id+"").addClass("has-error");
      return false;
    }else if(d_sta.val().length<4){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.sta_must_be_4_digit')!!}");
      $(".group_delay_sta"+fsm_id+"").addClass("has-error");
      return false;
    }else if(ValidateNumber(d_sta.val())){
      toastr.warning("{!!trans('flightschedule/schedulemonitor.sta_must_be_number_only')!!}");
      $(".group_delay_sta"+fsm_id+"").addClass("has-error");
      return false;
    }else{
      $(".group_delay_sta"+fsm_id+"").removeClass("has-error");
    }

    var c = confirm("{!!trans('flightschedule/schedulemonitor.are_you_sure_you_want_to_modified_the_schedule')!!}");
    if(c){
      $.ajax({
        url: "{{url('admin/schedule_monitor/DelayFlightStatus')}}",
        type:'post',
        data:{
          fsm_id: fsm_id,
          flight_number:flight_number,
          d_std: d_std.val(),
          d_sta: d_sta.val(),
          flight_status_id:flight_status_id,
          utc_default_time: utc_default_time,
          schedule_date: schedule_date,
          origin_id:origin_id,
          destination_id:destination_id,
          aircraft_id:aircraft_id,
          delay_remark: delay_remark.val(),
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
        success: function(data) {
          $.getLayoutByActionOnFlight(data,utc_default_time,total_distance,schedule_date);
          toastr.success("{!!trans('flightschedule/schedulemonitor.you_have_modified_schedule')!!}");
          // location.reload(true);
          // console.log(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    }
  // });
  }

  // InitCancelFlight
  function initCancelFlight(fsm_id,flight_status_id,total_distance,schedule_date,pax_movement_id,fsm_flight_group,flight_number){
    //alert(fsm_flight_group);
    // alert(fsm_flight_group);
    var utc_default_time = $('#DEFAULT_UTC_TIME').val();
    // alert(utc_default_timess);
    // alert(action_flight_append);
    var date = $("#date"+fsm_id+"").val();
    var remark = $("#remark"+fsm_id+"").val();
    var c = confirm("{!!trans('flightschedule/schedulemonitor.are_you_sure_you_want_to_modified_the_schedule')!!}");
    if(c){
      $.ajax({
        url: "{{url('admin/schedule_monitor/initCancelFlight')}}",
        type:'post',
        data:{
          fsm_id: fsm_id,
          flight_number:flight_number,
          date:date,
          pax_movement_id: pax_movement_id,
          utc_default_time: utc_default_time,
          fsm_flight_group:fsm_flight_group,
          schedule_date: schedule_date,
          flight_status_id: flight_status_id,
          remark: remark,
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
          $.getLayoutByActionOnFlight(data,utc_default_time,total_distance,schedule_date);
          toastr.success("{!!trans('flightschedule/schedulemonitor.you_have_modified_schedule')!!}");
          location.reload(true);
          // console.log(data);
          $("#loading").hide();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    }
  }

  // InitCancelFlight del_remark
  function initDeleteFlight(fsm_id,flight_status_id,total_distance,schedule_date,flight_number){
    var utc_default_time = $('#DEFAULT_UTC_TIME').val();
    var remark = $("#del_remark"+fsm_id+"").val();
    var c = confirm("{!!trans('flightschedule/schedulemonitor.are_you_sure_you_want_to_modified_the_schedule')!!}");
    if(c){
      $.ajax({
        url: "{{url('admin/schedule_monitor/initDeleteFlight')}}",
        type:'post',
        data:{
          fsm_id: fsm_id,
          flight_number:flight_number,
          utc_default_time: utc_default_time,
          schedule_date: schedule_date,
          flight_status_id: flight_status_id,
          remark: remark,
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
          $.getLayoutByActionOnFlight(data,utc_default_time,total_distance,schedule_date);
          toastr.success("Flight has been deleted!");
          // location.reload(true);
          // console.log(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    }
  }

  // ########## Action Select Button ##################
  // Diverted Flight
  function initSelectDestinationDivert(fsm_id){
    // alert(fsm_id);
    var divert_destination_id = $("select[name='divert_destination_id"+fsm_id+"']");
    // $.getDivertDestination();
    // $.getDivertDestination = function(){
    if(divert_destination_id.val()==''){
     return false; 
    }

    $.ajax({
        url: "{{url('admin/schedule_monitor/getDivertLocation')}}",
        dataType: "json",
        timeout: 3000,
        data: {
          fsm_id:fsm_id,
          divert_destination_id: divert_destination_id.val(),
        },
        error: function(x, t, m) {
          
          if(t==="timeout") {
              // alert("got timeout");
           } else {
            alert(t);
          }
        },
        success: function( data ) {
          if(data.length==0){
            $("#loading").hide();
            alert("The page you requested is not found!");
            return;
          }
          // console.log(data);
          html = "";
          $.each(data,function(id,destination){
            html += '<option value="'+destination.id+'">'+destination.alias+'</option>';
          });
          $("#nd_divert_location_id"+fsm_id+"").html(html); 
        }
    });
    // }
  }
</script>