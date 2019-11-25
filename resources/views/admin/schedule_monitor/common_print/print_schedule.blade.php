<style>
  #table_cell{position: absolute;}table #table_cell {padding:0px;border-collapse: collapse;}table #table_cell, td, th{border-left:1px solid #999;border-top:1px solid #999;border-right:1px solid #999;padding:0px;height: 40px;width:80px;text-align: center;}
  table{border-spacing:0;border-collapse:collapse} td,th{font-size:14px;}
  /*a{background-color:transparent;font-size:14px;}
  a:active,a:hover{outline:0}*/
  a #utc-time-title{font-size:14px;}
</style>


<script type="text/javascript">
  // getSchedule
  $.getSchedule = function(){
    $("#loading").show();
    $.ajax({
        url: "{{url('/admin/getScheduleMgrByBetweenDate')}}",
        dataType: "json",
        timeout: 3000,
        data: {
          filter_from_date: filter_from.val(),
          filter_to_date: filter_to.val(),
          flight_number: flight_number.val(),
          utc_default_time: utc_default_time,
        },
        error: function(x, t, m) {
          if(t==="timeout") {
            alert("got timeout");
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
          }
          $("#loading").hide();
          $.getLayoutTimeLineHtml(data);

          if(utc_default_time==1){
            var visible_utc = 'style="display: block;cursor: pointer;"';
            var visible_local = 'style="display: none;cursor: pointer;"';
          }else if(utc_default_time==2){
            var visible_utc = 'style="display: none;cursor: pointer;"';
            var visible_local = 'style="display: block;cursor: pointer;"';
          }
          var utc_option='';

          utc_option += '<a href="javascript:void();" onClick="initUTCTime(2)"><div id="utc-time-title" class="utc-time-title" '+visible_utc+'>VERSION 0<span class="pull-right"><i class="fa fa-wa fa-chevron-circle-right"></i></span></div></a>';

          // utc_option += '<a href="javascript:void();" onClick="initUTCTime(1)"><div id="local-time-title" class="utc-time-title" '+visible_local+'>Local Time<span class="pull-right"><i class="fa fa-wa fa-chevron-circle-right"></i></span></div></a>';

          // utc_option += '<a href="javascript:void();" onClick="initUTCTime(2)"><div id="utc-time-title" class="utc-time-title" '+visible_utc+'>UTC Time<span class="pull-right"><i class="fa fa-wa fa-chevron-circle-right"></i></span></div></a>';

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
    var color_grid='';
    // alert(totalCountDate);
    // $gridTime ############
    html +='<div style="margin-left:161px;">';
      html += $.gridTimeAssignment();
    html +='</div>';

    for(i==0;i<=totalCountDate;i++){
      if(i%2==0){
        color_grid = '#ebf2ff';
      }else{
        color_grid = '#fff6cc';
      }

      var total_distance = i*100;
      var current_date = $("#filter_from").val();
      var date = new Date(current_date);
      var increase_date = date.setDate(date.getDate() + i);
      var new_date = date.toString('yyyy-MM-dd');

      html += $.getLayoutTopTime(total_distance,new_date,i,color_grid);

      // $.each(data, function(schedule_id, schedule_data){
      html += $.getLayoutTime(data,distance_between_utc,bevious_distance,bevious_aircraft,new_date,total_distance);
      // });

      html += $.getLayoutGridTime(color_grid);
      // alert(i);
      $("#number_increase").val(i*100);
    }
    $("#displya_dynamic_time_schedule").html(html);

    $.eventallData();
    // $.eventallDatfVa();
  }

  // gridTime #########
  $.gridTimeAssignment = function(){
    var html_str = '';
    var gt_timeline_class = '';
    @if(isset($_REQUEST['default_utc']))
      gt_timeline_class = 'gt_timeline_schedule';
    @else
      gt_timeline_class = 'gt-timeline';
    @endif

    html_str += '<!-- gt-timeline ###################-->';
    html_str = '<div class="main_line"></div><div class="bottom_line"></div>';
    html_str += '<div class="'+gt_timeline_class+'" style="z-index: -100"><div class="horizontal-line month-line even-month" style="left:12.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:25px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:37.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:62.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:75px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:87.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:112.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:125px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:137.5px"><div class="second">45</div></div><!-- second --><div class="horizontal-line month-line even-month" style="left:162.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:175px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:187.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:212.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:225px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:237.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:262.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:275px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:287.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:312.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:325px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:337.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:362.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:375px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:387.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:412.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:425px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:437.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:462.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:475px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:487.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:512.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:525px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:537.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:562.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:575px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:587.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:612.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:625px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:637.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:662.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:675px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:687.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:712.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:725px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:737.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:762.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:775px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:787.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:812.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:825px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:837.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:862.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:875px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:887.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:912.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:925px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:937.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:962.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:975px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:987.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1012.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1025px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1037.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1062.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1075px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1087.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1112.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1125px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1137.5px"><div class="second">45</div></div><!-- Second --><div class="horizontal-line month-line even-month" style="left:1162.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1175px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1187.5px"><div class="second">45</div></div><!-- Second --> <div class="horizontal-line month-line even-month" style="left:1212.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1225px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1237.5px"><div class="second">45</div></div><!-- Second -->';

    html_str += '<div class="horizontal-line month-line even-month" style="left:1262.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1275px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1287.5px"><div class="second">45</div></div><!-- Second -->';

    html_str += '<div class="horizontal-line month-line even-month" style="left:1312.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1325px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1337.5px"><div class="second">45</div></div><!-- Second -->';

    html_str += '<div class="horizontal-line month-line even-month" style="left:1362.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1375px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1387.5px"><div class="second">45</div></div><!-- Second -->';

    html_str += '<div class="horizontal-line month-line even-month" style="left:1412.5px"><div class="second">15</div></div><div class="horizontal-line month-line even-month" style="left:1425px"><div class="second">30</div></div><div class="horizontal-line month-line even-month" style="left:1437.5px"><div class="second">45</div></div><!-- Second -->';

    html_str += '<div class="horizontal-line leftend" style="left:0px"><div class="year">2100</div></div><div class="horizontal-line leftend" style="left:50px"><div class="year">2200</div></div><div class="horizontal-line leftend" style="left:100px"><div class="year">2300</div></div><div class="horizontal-line leftend" style="left:150px"><div class="year">0000</div></div><div class="horizontal-line leftend" style="left:200px"><div class="year">0100</div></div><div class="horizontal-line leftend" style="left:250px"><div class="year">0200</div></div><div class="horizontal-line leftend" style="left:300px"><div class="year">0300</div></div><div class="horizontal-line leftend" style="left:350px"><div class="year">0400</div></div><div class="horizontal-line leftend" style="left:400px"><div class="year">0500</div></div><div class="horizontal-line leftend" style="left:450px"><div class="year">0600</div></div><div class="horizontal-line leftend" style="left:500px"><div class="year">0700</div></div><div class="horizontal-line leftend" style="left:550px"><div class="year">0800</div></div><div class="horizontal-line leftend" style="left:600px"><div class="year">0900</div></div><div class="horizontal-line leftend" style="left:650px"><div class="year">1000</div></div><div class="horizontal-line leftend" style="left:700px"><div class="year">1100</div></div><div class="horizontal-line leftend" style="left:750px"><div class="year">1200</div></div><div class="horizontal-line leftend" style="left:800px"><div class="year">1300</div></div><div class="horizontal-line leftend" style="left:850px"><div class="year">1400</div></div><div class="horizontal-line leftend" style="left:900px"><div class="year">1500</div></div><div class="horizontal-line leftend" style="left:950px"><div class="year">1600</div></div><div class="horizontal-line leftend" style="left:1000px"><div class="year">1700</div></div><div class="horizontal-line leftend" style="left:1050px"><div class="year">1800</div></div><div class="horizontal-line leftend" style="left:1100px"><div class="year">1900</div></div><div class="horizontal-line leftend" style="left:1150px"><div class="year">2000</div></div> <div class="horizontal-line leftend" style="left:1200px"><div class="year">2100</div></div> <div class="horizontal-line leftend" style="left:1250px"><div class="year">2200</div></div> <div class="horizontal-line leftend" style="left:1300px"><div class="year">2300</div></div> <div class="horizontal-line leftend" style="left:1350px"><div class="year">0000</div></div> <div class="horizontal-line leftend" style="left:1400px"><div class="year">0100</div></div> </div></div>';

      return html_str;
  }
  // getLayoutTopTime
  $.getLayoutTopTime = function(total_distance,new_date,i,color_grid){
    html ='';

    var date = new Date(new_date);
    var newDate = date.toString('dd');
    var d = date.getDay();
    var weekday = new Array(7);
    weekday[0] = "SUN";
    weekday[1] = "MON";
    weekday[2] = "TUE";
    weekday[3] = "WED";
    weekday[4] = "THU";
    weekday[5] = "FRI";
    weekday[6] = "SAT";

    var n = weekday[date.getDay()];


    // ####hidden block to return when we change flight ###########
    html += '<input type="hidden" name="display_action_flight'+i+'" id="display_action_flight'+total_distance+'" value="'+total_distance+'">';
    // block layout time ##############
    html += '<div id="grid-date-7-day'+total_distance+'">';
      html += '<div style="margin-top:51px;">&nbsp;test</div>';
      html += '<div class="pull-left" style="">';

        html ='<table id="table_cell" style="background-color:'+color_grid+';margin-top:50px;"><tr><td rowspan="4">'+n+'-'+newDate+'</td></tr>';
          @foreach($Aircrafts as $Aircraft)
            html += '<tr><td>{{$Aircraft->name}}</td></tr>';
          @endforeach
        // '<tr><td>XU-113</td></tr><tr><td>3rd A/C</td></tr>';
        html += '</table>';
      html += '</div>';
      // ##capture_date_current ####
      html += '<div id="capture_date_current" style="height:123px;position:relative;width:100%;">';

      html += '<div style="height:100%;position:absolute;top:5px;"></div>'
      // html += '<span class="schedule_date"><b>Date: '+new_date+'</b></span>';

      html += '<!--########### container-time-date 3 Apri - 2016-->';
      // html += '<div class="container-time" style="margin-left:-3px;">';
      html += '<div class="container-time" style="margin-left:158px;">';
      // html += '<hr>';
    return html;
    // }
  }
  
  // Layout Grid Time ################
  $.getLayoutGridTime = function(color_grid){
    var html = "";
    var html_str = "";
    var aircraft_num = $("#aircraft_num").val();
    var j=1;
    html += '<div style="padding-left:2px;position: absolute;width: 1502px;z-index: -1;">';
    for(j=1;j<=aircraft_num;j++){

      html += '<!-- Aircraft-Cell -->';
      html += '<div class="column" style="background-color:'+color_grid+';position: relative;display: block;">';
      html += '<!-- grid-flight-time perday -->';
      // alert(schedule_data.countAircraft);
      html += '<div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div>';
      html += '<div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div><div class="cell-schedule"></div>';
      html += '</div>';
    }
      html += '<div style="border-bottom:1px solid #000;width:100%;position:absolute;bottom:1px;z-index:100;"></div>';
    html += '</div>';


    html += '</div>';
    // html += $.gridTime();

    // block layout time ##############
      html +='</div>';
    html +='</div>';


    $("#number_increases").val(i*100);
    return html;
  }

</script>
