<script type="text/javascript">
  // Function
  $(function(){
    var utc_default_timess = $('#DEFAULT_UTC_TIME').val();
    var filter_from = $("input[name='filter_from']");
    var filter_to = $("input[name='filter_to']");
    var flight_number = $("input[name='flight_number']");
    var company = $("select[name='company']");
    var ajax_load_date = $("input[name='ajax_load_date']");
    var utc_default_time = $("#DEFAULT_UTC_TIME").val();
    var flag_check='';
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
        var increate_new_date = new Date(filter_date_hidden);
        
        $("#loading").show();
        stop = ui.position.left;

        if(start > stop){
          var starts = 1;
          var number_increases = $("#number_increase").val();
          var total_num_increase = Number(number_increases)+Number(100);
          $("#number_increase").val(total_num_increase);
          // date.setDate(date.getDate() + 1);
          // var schedule_time = $('#ajax_load_date').val(date.toString('yyyy-MM-dd'));
          var date_drag_previous = $("#ajax_load_date").val();
          var date_new_previous = new Date(date_drag_previous);
          var increase_date = date_new_previous.setDate(date_new_previous.getDate() + 1);
          var new_input_previous_date = date_new_previous.toString('yyyy-MM-dd');
          $('#ajax_load_date').val(new_input_previous_date);
          // alert(new_input_previous_date);
          // Loop Date Repeat to another date
          $.ajax({
            url: "{{url('admin/getScheduleMgrByBetweenDate')}}",
            dataType: "json",
            timeout: 3000,
            data: {
              schedule_date: new_input_previous_date,
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
              window.location =  "{{url('admin/schedule_monitor')}}";
            },
            success: function( data ) {
              // console.log(data);
              $("#loading").hide();
              $.getLayoutScheduleByDrag(data,starts);
            }
          });
        }else{
          var date_drag_previous = $("#filter_date_hidden").val();
          var date_new_previous = new Date(date_drag_previous);
          var increase_date = date_new_previous.setDate(date_new_previous.getDate() - 1);
          var new_input_previous_date = date_new_previous.toString('yyyy-MM-dd');
          $('#filter_date_hidden').val(new_input_previous_date);

          var number_decrease = $("#number_decrease").val();
          var total_num_decrease = Number(number_decrease)+Number(-100);
          $("#number_decrease").val(total_num_decrease);
        
          // previousdate
          $.ajax({
            url: "{{url('admin/getScheduleMgrByBetweenDate')}}",
            dataType: "json",
            timeout: 3000,
            data: {
              schedule_date: new_input_previous_date,
              flight_number: flight_number.val(),
              company: company.val(),
              utc_default_time: utc_default_time,
            },
            
            error: function(x, t, m) {
              if(t==="timeout"){
                // alert("got timeout");
              } else {
                // alert(t);
              }

              $(window).unbind('beforeunload');
              // location.reload();
              window.location =  "{{url('admin/schedule_monitor')}}";
            },

            success: function(data) {
              // console.log(data);
              $("#loading").hide();
              $.getLayoutScheduleByDrag(data,stop);
            }

          });
          // alert("previouse date");
        }
      }

    });
  })
</script>