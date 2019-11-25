<?php
  date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html>

<html class="no-js" lang="en" ng-app="myApp">

<head>
  <!-- Favico ICon All Tablet -->
  <link rel="apple-touch-icon" sizes="57x57" href="{{url('assets/icon-favico/apple-icon-57x57.png')}}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{url('assets/icon-favico/apple-icon-60x60.png')}}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{url('assets/icon-favico/apple-icon-72x72.png')}}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{url('assets/icon-favico/apple-icon-76x76.png')}}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{url('assets/icon-favico/apple-icon-114x114.png')}}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{url('assets/icon-favico/apple-icon-120x120.png')}}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{url('assets/icon-favico/apple-icon-144x144.png')}}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{url('assets/icon-favico/apple-icon-152x152.png')}}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{url('assets/icon-favico/apple-icon-180x180.png')}}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{url('assets/icon-favico/android-icon-192x192.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{url('assets/icon-favico/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{url('assets/icon-favico/favicon-96x96.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{url('assets/icon-favico/favicon-16x16.png')}}">
  <link rel="manifest" href="{{url('assets/icon-favico/manifest.json')}}">

  <meta name="csrf-token" content="{{ csrf_token()}}" />
  <meta name="csrf-param" content="_token" />
  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@if(isset($view_title)){!! trans($view_title) !!}@else {{SITE_NAME}} @endif</title>
  
  <!-- Bootstrap core CSS -->
  <link media="screen" rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
  <!-- font-awesome -->
  <link href="{{url('fonts/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="{{url('css/custom.css')}}" rel="stylesheet">
  <link href="{{url('css/select/select2.min.css')}}" rel="stylesheet">
  <link href="{{url('css/icheck/flat/green.css')}}" rel="stylesheet">
  <!-- select2 -->
  <link href="{{url('css/select/select2.min.css')}}" rel="stylesheet">
  
  <!-- ajax Load Image View Display -->
  <link href="{{url('css/image_load.css')}}" rel="stylesheet">

  <!-- adminLTE -->
  <link href="{{url('css/AdminLTE.min.css')}}" rel="stylesheet">

  <!-- jquery-ui.css -->
  <link href="{{url('css/jquery-ui.css')}}" rel="stylesheet">  

  <!-- DataTable -->
  <link rel="stylesheet" href="{{url('js/plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- Select 2-->
  <link rel="stylesheet" type="text/css" href="{{url('css/select/select2.min.css')}}">  
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{url('js/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- DateTime Picker -->
  <link rel="stylesheet" href="{{url('js/plugins/datetimepicker/bootstrap-datetimepicker.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{url('js/plugins/datatables/buttons.bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('js/plugins/datatables/buttons.bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('css/colorpicker/bootstrap-colorpicker.min.css')}}">

</head>

<body class="nav-md" >
  <!-- get menucode -->
  @if(isset($_REQUEST['menuCode']))
    <input type="hidden" value="<?php echo $_REQUEST['menuCode'];?>" name="menuCode" id="menuCode">
  @else
    <input type="hidden" value="y5_m01" name="menuCode" id="menuCode">
  @endif

  <!-- loading -->
  <div id="loading" style="z-index: 100000;display: none;position: absolute;top:25%;bottom:0px;left:50%;right:0;"><img src="{{url('images/loading.gif')}}"></div>
  <!-- container body -->
  <div class="container body">
    @yield('content')
  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div> 

</body>

</html>
  
  <!-- jQuery 2.1.4 -->
  <script src="{{url('js/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  <script src="{{url('js/plugins/pace/pace.min.js')}}"></script>
  <!-- commonscript Use General Script -->
  <script type="text/javascript" src="{{url('js/common.js')}}"></script>
  <!-- Use for deleting by tag <a> -->
  <script src="{{url('js/rails.js')}}"></script>
  <!-- tagsinput -->
  <script src="{{url('js/plugins/tags/jquery.tagsinput.min.js')}}"></script>
  <!-- JQuery Draggable Layout -->
  <script src="{{url('js/ui-dragdraw/jquery-ui.js')}}"></script>
  <!--[if lt IE 9]>
  <script src="../assets/js/ie8-responsive-file-warning.js"></script>
  <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- bootstrap script -->
  <script src="{{url('js/bootstrap.min.js')}}"></script>

  <!-- daterangepicker -->
  <script type="text/javascript" src="{{url('js/plugins/moment/moment.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/plugins/datepicker/daterangepicker.js')}}"></script>

  <!-- ajax Load Image View Display -->
  <script type="text/javascript" src="{{url('js/image_load.js')}}"></script>
  <!-- jquery-ui.min.js -->
  <script type="text/javascript" src="{{url('js/jquery-ui.min.js')}}"></script>
  <!-- gauge js -->
  <script type="text/javascript" src="{{url('js/plugins/gauge/gauge.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/plugins/gauge/gauge_demo.js')}}"></script>
  <!-- bootstrap progress js -->
  <script src="{{url('js/plugins/progressbar/bootstrap-progressbar.min.js')}}"></script>
  <script src="{{url('js/plugins/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <!-- icheck -->
  <script src="{{url('js/plugins/icheck/icheck.min.js')}}"></script>  
  <!-- chart js -->
  <script src="{{url('js/plugins/chartjs/chart.min.js')}}"></script>
  <!-- multiple select -->
  <script type="text/javascript" src="{{url('js/plugins/select/select2.full.js')}}"></script>
  
  <!-- customize script -->
  <script src="{{url('js/custom.js')}}"></script>
   <!-- datatable Setting -->
  <script type="text/javascript" src="{{url('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

  <!-- daterangepicker -->
  <script type="text/javascript" src="{{url("js/plugins/moment/moment.min.js")}}"></script>
  <script type="text/javascript" src="{{url("js/plugins/datepicker/daterangepicker.js")}}"></script>
  <!-- form validation -->
  <script type="text/javascript" src="{{url('js/plugins/parsley/parsley.min.js')}}"></script>
  <!-- Color Picker  -->
  <script type="text/javascript" src="{{url('js/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
  <!-- script -->
  <script type="text/javascript" src="{{url('js/plugins/colorpicker/docs.js')}}"></script>

   <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="{{url('')}}/js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="{{url('js/plugins/flot/jquery.flot.js')}}"></script>
  <script type="text/javascript" src="{{url('js/plugins/flot/jquery.flot.pie.js')}}"></script>
  <script type="text/javascript" src="{{url('js/plugins/flot/jquery.flot.orderBars.js')}}"></script>
  <script type="text/javascript" src="{{url('js/plugins/flot/jquery.flot.time.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/plugins/flot/date.js')}}"></script>
  <script type="text/javascript" src="{{url('js/plugins/flot/jquery.flot.spline.js')}}"></script>
  <script type="text/javascript" src="{{url('js/plugins/flot/jquery.flot.stack.js')}}"></script>
  <script type="text/javascript" src="{{url('js/plugins/flot/curvedLines.js')}}"></script>
  <script type="text/javascript" src="{{url('js/plugins/flot/jquery.flot.resize.js')}}"></script>

  <!-- select2 -->
  <script src="{{url('js/plugins/select/select2.full.js')}}"></script>
  <!-- worldmap -->
  <script type="text/javascript" src="{{url('js/plugins/maps/jquery-jvectormap-2.0.3.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/plugins/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
  <script type="text/javascript" src="{{url('js/plugins/maps/jquery-jvectormap-us-aea-en.js')}}"></script>
  <!-- pace -->
  <script src="{{url('js/plugins/pace/pace.min.js')}}"></script>
  <!-- DateTime Picker -->
  <script src="{{url('js/plugins/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
  <!-- skycons -->
  <script src="{{url('js/plugins/skycons/skycons.min.js')}}"></script>
  <!-- Bootstrap time Picker -->
  <script src="{{url('js/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>

  <!-- form validation -->
  <script type="text/javascript">
    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form .btn').on('click', function() {
        $('#demo-form').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });

    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form2 .btn').on('click', function() {
        $('#demo-form2').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form2').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });
    try {
      hljs.initHighlightingOnLoad();
    } catch (err) {}
  </script>
  <!-- /form validation -->
 
  <script> 
    $(function () {
        // $("#example1").DataTable();
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
  </script>

  <script>
    // place_all_url_menu_code to grant permission
    function addURLMenuCode(element)
    {
      
      $(element).attr('href', function() {
        var menu_code = $("#menuCode").val();
        return this.href +'?menuCode='+menu_code;
      });
    }


    // other script
    $(document).ready(function() {
      // [17, 74, 6, 39, 20, 85, 7]
      //[82, 23, 66, 9, 99, 6, 2]
      var data1 = [
        [gd(2012, 1, 1), 17],
        [gd(2012, 1, 2), 74],
        [gd(2012, 1, 3), 6],
        [gd(2012, 1, 4), 39],
        [gd(2012, 1, 5), 20],
        [gd(2012, 1, 6), 85],
        [gd(2012, 1, 7), 7]
      ];

      var data2 = [
        [gd(2012, 1, 1), 82],
        [gd(2012, 1, 2), 23],
        [gd(2012, 1, 3), 66],
        [gd(2012, 1, 4), 9],
        [gd(2012, 1, 5), 119],
        [gd(2012, 1, 6), 6],
        [gd(2012, 1, 7), 9]
      ];
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: false,
            fill: true
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            radius: 0,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          verticalLines: true,
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",
          tickSize: [1, "day"],
          //tickLength: 10,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 10
            //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
        },
        yaxis: {
          ticks: 8,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
    });
  </script>

  <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'right',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };

      $('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

      $('#reportrange_right').daterangepicker(optionSet1, cb);

      $('#reportrange_right').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange_right').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange_right').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange_right').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });

      $('#options1').click(function() {
        $('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
      });

      $('#options2').click(function() {
        $('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
      });

      $('#destroy').click(function() {
        $('#reportrange_right').data('daterangepicker').remove();
      });
    });
  </script>

  <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };
      $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
      $('#reportrange').daterangepicker(optionSet1, cb);
      $('#reportrange').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });
      $('#options1').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
      });
      $('#options2').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
      });
      $('#destroy').click(function() {
        $('#reportrange').data('daterangepicker').remove();
      });
    });
  </script>

  <!--############## datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#single_cal1').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_1"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
      $('#single_cal2').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_2"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
      $('#single_cal22').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_2"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
      $('#single_cal3').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_3"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
      $('#single_cal4').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_4"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#reservation').daterangepicker(null, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
    });
  </script>

  <!-- select2 -->
  <script>
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Select a state",
        allowClear: true
      });
      $(".select2_group").select2({});
      $(".select2_multiple").select2({
        maximumSelectionLength: 10,
        placeholder: "With Max Selection limit 10",
        allowClear: true
      });
    });
  </script>


  <!-- skycons -->
  <script>
    var icons = new Skycons({
        "color": "#73879C"
      }),
      list = [
        "clear-day", "clear-night", "partly-cloudy-day",
        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
        "fog"
      ],
      i;

    for (i = list.length; i--;)
      icons.set(list[i], list[i]);

    icons.play();
  </script>
  

  <!-- Bootstrap time Picker -->
  
  <script>
    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

    $('.date-picker').datepicker({ 
    format: 'yyyy-mm-dd',
    autoclose: true,
    //startDate: today 
    });

    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

    $('.date-picker1').datepicker({ 
    format: 'dd-M-yyyy',
    autoclose: true,
    startDate: today 
    });         
  </script>

  <!-- input tags -->
  <script>
    function onAddTag(tag) {
      alert("Added a tag: " + tag);
    }

    function onRemoveTag(tag) {
      alert("Removed a tag: " + tag);
    }

    function onChangeTag(input, tag) {
      alert("Changed a tag: " + tag);
    }

    $(function() {
      $('#tags_1').tagsInput({
        width: 'auto'
      });
    });
  </script>
  
  <script>
    var handleDataTableButtons = function() {
        "use strict";
        0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
          dom: "Bfrtip",
          buttons: [{
            extend: "copy",
            className: "btn-sm"
          }, {
            extend: "csv",
            className: "btn-sm"
          }, {
            extend: "excel",
            className: "btn-sm"
          }, {
            extend: "pdf",
            className: "btn-sm"
          }, {
            extend: "print",
            className: "btn-sm"
          }],
          responsive: !0
        })
      },
      TableManageButtons = function() {
        "use strict";
        return {
          init: function() {
            handleDataTableButtons()
          }
        }
      }();
  </script>

  <script>  
    var hh = 0;
    function clickColor(hex, seltop, selleft, html5) {
      var c, cObj, colormap, areas, i, areacolor, cc;
      if (html5 && html5 == 5)  {
          c = document.getElementById("html5colorpicker").value;
      } else {
          if (hex == 0) {
              c = document.getElementById("entercolor").value;
          } else {
              c = hex;
          }
      }
      cObj = w3color(c);
      colorhex = cObj.toHexString();
      if (cObj.valid) {
          clearWrongInput();
      } else {
          wrongInput();
          return;
      }
      r = cObj.red;
      g = cObj.green;
      b = cObj.blue;
      document.getElementById("colornamDIV").innerHTML = (cObj.toName() || "");
      document.getElementById("colorhexDIV").innerHTML = cObj.toHexString();
      document.getElementById("colorrgbDIV").innerHTML = cObj.toRgbString();
      document.getElementById("colorhslDIV").innerHTML = cObj.toHslString();    
      if ((!seltop || seltop == -1) && (!selleft || selleft == -1)) {
          colormap = document.getElementById("colormap");
          areas = colormap.getElementsByTagName("AREA");
          for (i = 0; i < areas.length; i++) {
              areacolor = areas[i].getAttribute("onmouseover").replace('mouseOverColor("', '');
              areacolor = areacolor.replace('")', '');
              if (areacolor.toLowerCase() == colorhex) {
                  cc = areas[i].getAttribute("onclick").replace(')', '').split(",");
                  seltop = Number(cc[1]);
                  selleft = Number(cc[2]);
              }
          }
      }
      if ((seltop+200)>-1 && selleft>-1) {
          document.getElementById("selectedhexagon").style.top=seltop + "px";
          document.getElementById("selectedhexagon").style.left=selleft + "px";
          document.getElementById("selectedhexagon").style.visibility="visible";
    } else {
          document.getElementById("divpreview").style.backgroundColor = cObj.toHexString();
          document.getElementById("selectedhexagon").style.visibility = "hidden";
    }
      document.getElementById("selectedcolor").style.backgroundColor = cObj.toHexString();
      document.getElementById("html5colorpicker").value = cObj.toHexString();  
    document.getElementById('slideRed').value = r;
    document.getElementById('slideGreen').value = g;
    document.getElementById('slideBlue').value = b;
    changeRed(r);changeGreen(g);changeBlue(b);
    changeColor();
    document.getElementById("fixed").style.backgroundColor = cObj.toHexString();
  }
  </script>
