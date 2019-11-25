<!-- UTC TIMZONE -->
<script type="text/javascript">
  // initUTCTime
  function initUTCTime(utc_default_time_id){
    var filter_from = $("input[name='filter_from']").val();
    var filter_to = $("input[name='filter_to']").val();
    var flight_number = $("#flight_number").val();
    var company = $("#company").val();
    window.location.href = '{{url("admin/schedule_monitor")}}?filter_from='+filter_from+'&filter_to='+filter_to+'&flight_number='+flight_number+'&company='+company+'&utc_default='+utc_default_time_id+'';
  }
  // Function
  $(function(){
    // Function Get Schedule Reference by filter from and filter to another condition
    //*** if  filter_from &  filter to not null get Record flight schedule
    // ** if of ajax_load_date not null get record from flight schedule
    // Onchange Loading By Calendar to get Record from FLight Schedules
    var isFirstLoad = true;
    //initSearchFlightNumber
    $("#initSearchFlightNumber").click(function(){
      // console.log("Flight Number");
      // $.reservationListRequest(1);
      isFirstLoad = true;
      var DEFAULT_UTC_TIME = $("#DEFAULT_UTC_TIME").val();
      var filter_to = $("#filter_to").val();
      var flight_number = $("#flight_number").val();
      var current_date = $("#filter_from").val();
      var company = $("#company").val();
      var date = new Date(current_date);
      var increase_date = date.setDate(date.getDate() + 6);
      var new_date = date.toString('yyyy-MM-dd');
      $("#filter_to").val(new_date);
      $("#ajax_load_date").val(increase_date);
      // $.getSchedule();
      window.location.href = '{{url("admin/schedule_monitor")}}?filter_from='+current_date+'&filter_to='+new_date+'&flight_number='+flight_number+'&company='+company+'&utc_default='+DEFAULT_UTC_TIME+'';
    });

    // Filter From Date& Filter To Date
    $("#filter_from").change(function(){
      var DEFAULT_UTC_TIME = $("#DEFAULT_UTC_TIME").val();
      isFirstLoad = true;
      var swap_action = $("#swap_action").val();
      var filter_to = $("#filter_to").val();
      var flight_number = $("#flight_number").val();
      var company = $("#company").val();
      var current_date = $("#filter_from").val();
      var date = new Date(current_date);
      var increase_date = date.setDate(date.getDate() + 6);
      var new_date = date.toString('yyyy-MM-dd');
      $("#filter_to").val(new_date);
      $("#ajax_load_date").val(increase_date);
      // $.getSchedule();
      window.location.href = '{{url("admin/schedule_monitor")}}?filter_from='+current_date+'&filter_to='+new_date+'&flight_number='+flight_number+'&company='+company+'&swap='+swap_action+'&utc_default='+DEFAULT_UTC_TIME+'';
    });

    $("#filter_to").change(function(){
      var DEFAULT_UTC_TIME = $("#DEFAULT_UTC_TIME").val();
      isFirstLoad = true;
      var swap_action = $("#swap_action").val();
      var filter_from = $("#filter_from").val();
      var filter_to = $("#filter_to").val();
      var flight_number = $("#flight_number").val();
      var company = $("#company").val();
      $("#ajax_load_date").val(filter_to);
      // $.getSchedule();
      window.location.href = '{{url("admin/schedule_monitor")}}?filter_from='+filter_from+'&filter_to='+filter_to+'&flight_number='+flight_number+'&company='+company+'&swap='+swap_action+'&utc_default='+DEFAULT_UTC_TIME+'';
    });

    

    //getSchedule
    $.getSchedule = function(){
      $("#loading").show();
      $.ajax({
          url: "{{url('admin/getScheduleMgrByBetweenDate')}}",
          dataType: "json",
          timeout: 3000,
          data: {
            filter_from_date: filter_from.val(),
            filter_to_date: filter_to.val(),
            flight_number: flight_number.val(),
            company: company.val(),
            utc_default_time: utc_default_time,
          },
          error: function(x, t, m) {
            if(t==="timeout") {
              // alert("got timeout");
            } else {
              // alert(t);
            }
            $(window).unbind('beforeunload');
            // location.reload();
            // window.location =  "{{url('/counter')}}";
          },
          success: function( data ) {
            // alert("testing");
            // console.log(data);
            if(data.length==0){
              $("#loading").hide();
              // return;
            }
            $("#loading").hide();
            // console.log(data);
            // $.each(data, function(schedule_id, schedule_data){
            //   $.each(schedule_data['flight_schedule_mgr'], function(schedule_id, schedule_data){
            //     alert(schedule_data['aircraft_name']);
            //   });
            // });
            $.getLayoutTimeLineHtml(data);

            if(utc_default_time==1){
              var visible_utc = 'style="display: block;cursor: pointer;"';
              var visible_local = 'style="display: none;cursor: pointer;"';
            }else if(utc_default_time==2){
              var visible_utc = 'style="display: none;cursor: pointer;"';
              var visible_local = 'style="display: block;cursor: pointer;"';
            }
            var utc_option='';

            utc_option += '<a href="javascript:void();" onClick="initUTCTime(1)"><div id="local-time-title" class="utc-time-title" '+visible_local+'>Local Time<span class="pull-right"><i class="fa fa-wa fa-chevron-circle-right"></i></span></div></a>';

            utc_option += '<a href="javascript:void();" onClick="initUTCTime(2)"><div id="utc-time-title" class="utc-time-title" '+visible_utc+'>UTC Time<span class="pull-right"><i class="fa fa-wa fa-chevron-circle-right"></i></span></div></a>';
            
            $("#utc-default-content").html(utc_option);

          }
      });
    };

    // getLayoutTimeLineHtml
    $.getLayoutTimeLineHtml = function(data,flag_check){
      // #################Block
      // Show Current Time IN local
      var capture_current_date = $("#capture_current_date").val();
      var capture_date_from_load = $("#capture_date_from_load").val();
      // Drag Hidden Date
      var curr_decrease_date = $("#filter_date_hidden").val();
      var curr_inrease_date = $("#ajax_load_date").val();
      // Number Increase
      var number_decrease = $("#number_decrease").val();
      var number_increase = $("#number_increase").val();
      // #################END Block

      // var flag_check='';
      var totalDistance='';
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
      var schedule_date = new Date(start_date);
      var t = schedule_date.setHours(0,0,0,0)==today.setHours(0,0,0,0);
      
      // if(data!=null){
      //sreyleak add
      var distance_between_utc = 0;
      var bevious_distance = 0;
      var bevious_aircraft = 0;
      //end
      // timeline += $.timeline(t);
      // alert(totalCountDate);      
      for(i==0;i<=totalCountDate;i++){
        var total_distance = i*100;
        var current_date = $("#filter_from").val();
        var date = new Date(current_date);
        var increase_date = date.setDate(date.getDate() + i);
        var new_date = date.toString('yyyy-MM-dd');
        
        html += $.getLayoutTopTime(total_distance,new_date,i);

        // $.each(data, function(schedule_id, schedule_data){
        html += $.getLayoutTime(data,distance_between_utc,bevious_distance,bevious_aircraft,new_date,total_distance);
        // });

        html += $.getLayoutGridTime();
        // alert(i);
        $("#number_increase").val(i*100);

        // Check to display timeline ##################
        //###### timelineDraggable ###########
        var capture_current_date = $("#capture_current_date").val();
        if(new_date==capture_current_date){
          timeline = $.timeline();
          if(utc_default_timess!=2){
            $("#time_line_show").css("margin-left", total_distance + "%");
          }
          $("#time_line_show").html(timeline);
        }
      }
      
      // displya_dynamic_time_schedule ##########
      $("#displya_dynamic_time_schedule").html(html);
      // $("#time_line_show").html(timeline);
      $.eventallData();
      // $.eventallDatfVa();
    }

    // ###############
    // getLayoutScheduleByDrag
    $.getLayoutScheduleByDrag = function(data,flag_check){
      var utc_default_timess = $('#DEFAULT_UTC_TIME').val();
      // alert(flag_check);
      // var flag_check='';
      var totalDistance='';
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
      var schedule_date = new Date(start_date);
      var t = schedule_date.setHours(0,0,0,0)==today.setHours(0,0,0,0);
      
      // if(data!=null){
      //sreyleak add
      var distance_between_utc = 0;
      var bevious_distance = 0;
      var bevious_aircraft = 0;
      //end

      // timeline += $.timeline(t);
      // alert(totalCountDate);
      // timeline += $.timeline(t);
      if(flag_check==1){
        // alert(flag_check);
        var total_distance = $('#number_increase').val();
        var new_date = $('#ajax_load_date').val();

      }else{
        var total_distance = $('#number_decrease').val();
        // alert(totalDistance);
        var new_date = $('#filter_date_hidden').val();
        // alert(new_date);
      }

      // alert(total_distance);
      html += $.getLayoutTopTime(total_distance,new_date);

      // $.each(data, function(schedule_id, schedule_data){
      html += $.getLayoutTime(data,distance_between_utc,bevious_distance,bevious_aircraft,new_date,total_distance);
      // });
      html += $.getLayoutGridTime();
      // }
      
      // Check to display timeline ##################
      // timelineDraggable
      var capture_current_date = $("#capture_current_date").val();
      var capture_date_from_load = $("#capture_date_from_load").val();
      // Drag Hidden Date
      var curr_decrease_date = $("#filter_date_hidden").val();
      var curr_inrease_date = $("#ajax_load_date").val();
      // Number Increase
      var number_decrease = $("#number_decrease").val();
      var number_increase = $("#number_increase").val();
      if(curr_inrease_date==capture_current_date){
        timeline = $.timeline();
        if(utc_default_timess!=2){
          $("#time_line_show").css("margin-left", number_increase + "%");
        }
        $("#time_line_show").html(timeline);
      }else if(curr_decrease_date==capture_current_date){
        timeline = $.timeline();
        if(utc_default_timess!=2){
          $("#time_line_show").css("margin-left", number_decrease + "%");
        }
        $("#time_line_show").html(timeline);
      }else if(capture_date_from_load>0){
        timeline = $.timeline();
        if(utc_default_timess!=2){
          $("#time_line_show").css("margin-left", capture_date_from_load + "%");
        }else{
          $("#time_line_show").css("margin-left", (capture_date_from_load-100) + "%");
        }
        $("#time_line_show").html(timeline);
      }

      $("#displya_dynamic_time_schedule").append(html);
      $.eventallData();
    }

    // getLayoutByActionOnFlight
    $.getLayoutByActionOnFlight = function(data,utc_default_time,total_distance,new_date){
      var flag_check='';
      var totalDistance='';
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
      var schedule_date = new Date(start_date);
      var t = schedule_date.setHours(0,0,0,0)==today.setHours(0,0,0,0);
      
      var distance_between_utc = 0;
      var bevious_distance = 0;
      var bevious_aircraft = 0;
      
      html += $.getLayoutTopTime(total_distance,new_date);
      html += $.getLayoutTime(data,distance_between_utc,bevious_distance,bevious_aircraft,new_date,total_distance);
      html += $.getLayoutGridTime();
      $('#grid-date-7-day'+total_distance+'').html(html);

      $.eventallData();
    }
    
    // getLayoutTopTime
    $.getLayoutTopTime = function(total_distance,new_date,i){

      var n_date = new Date(new_date);
      var day_num = n_date.getDay();
      var day='';
      switch(day_num) {
        case 1:
          day='Mon';   
        break;
      
        case 2:
          day='Tue';
        break;

        case 3:
          day='Wed';
        break;

        case 4:
          day='Thu';
        break;

        case 5:
          day='Fri';
        break;

        case 6:
          day='Sat';
        break;

        default:
          day='Sun';
        break;
      }

      // alert(n_date);
      // html
      html ='';

      // ####hidden block to return when we change flight ###########
      html += '<input type="hidden" name="display_action_flight'+i+'" id="display_action_flight'+total_distance+'" value="'+total_distance+'">';

      // block layout time ##############
      html += '<div id="grid-date-7-day'+total_distance+'">';
        // ##capture_date_current ####
        // html += '<div id="capture_date_current" style="height:185px;position:absolute;top:0px;width:100%;left:'+total_distance+'%;">';
        html += '<div id="capture_date_current" style="position:absolute;top:0px;width:100%;left:'+total_distance+'%;">';

        html += '<div class="border-grid-line" style="border-left:1px solid #f00;height:100%;position:absolute;top:5px;"></div>'
        html += '<span class="schedule_date"><b>Date: '+new_date+' '+day+'</b></span>';
        html += '<!--########### container-time-date 3 Apri - 2016-->';
        html += '<div class="container-time" style="margin-left:-3px;">';
      return html;
      // }
    }

  });   
</script>