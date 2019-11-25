@extends('admin.common.layout') 
@section('content')
  
   <!-- color status -->
  <input type="hidden" name="color_updated" id="color_updated" value="{{$color_updated}}">
  <input type="hidden" name="color_completed" id="color_completed" value="{{$color_completed}}">
  <input type="hidden" name="color_no_update" id="color_no_update" value="{{$color_no_update}}">
  
  <!-- Schedule Swap -->
  <input type="hidden" placeholder="Swap Schedule" name="schedule_swap" id="schedule_swap"></div>
  <input type="hidden" placeholder="Swap Aircraft" name="aircraft_swap" id="aircraft_swap"></div>
  <input type="hidden" name="filter_date_hidden" id="filter_date_hidden">
  <input type="hidden" name="number_decrease" id="number_decrease">
  <input type="hidden" name="flight_pax_id" id="flight_pax_id" value="Flight Pax ID">
  <input type="hidden" name="ajax_load_date" id="ajax_load_date">
  <input type="hidden" value="100" name="number_increase" id="number_increase">
  <input type="hidden" value="<?php echo $countAircraft;?>" name="aircraft_num" id="aircraft_num">

  <!-- <input type="text" name="from_date" id="from_date" value="" />
  <input type="text" name="to_date", id="to_date" value="" /> -->
  <!-- div -->
  <div style="width:100%;margin: 0 auto;">
    <center>
      <h2><b>AIRCRAFT ROTATION PLAN, SCHEDULE FLT</b></h2>

      <h3><b>From <?php echo date('d',strtotime($_REQUEST['filter_from'])).' '.date('M',strtotime($_REQUEST['filter_from']));?> - <?php echo date('d',strtotime($_REQUEST['filter_to'])).' '.date('M Y',strtotime($_REQUEST['filter_to']));?></b></h3>

    </center>
    <div style="float:left;font-size:16px;">
      <center>
        @if($_REQUEST['default_utc']==1)
          <b>(All Time in UTC)</b>
        @else
          <b>(All Time in LTC)</b>
        @endif
      </center>
    </div>
    <div style="float:right;font-size:16px;color:#f00;"><b>DATED: {{date('d-M-Y')}}</b></div>
  </div>

  <!-- block -->
  <div>
    <!-- block -->
    <div class="flight-search">
      <div class="container-fluid">
        <!-- <div class="row">
          <div class="col-sm-2">{!!trans('common.filter_from')!!}</div>
          <div class="col-sm-2">{!!trans('common.filter_to')!!}<br></div>
        </div> -->
        <div class="row">
          
          <input value="<?php if(isset($_REQUEST['flight_number'])){echo $_REQUEST['flight_number'];}?>" name="flight_number" class="form-control has-feedback-left" id="flight_number" placeholder="{!!trans('common.flight_number')!!}" type="hidden">

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
                  <input required="required" value="{{$_REQUEST['filter_from']}}" name="filter_from" class="date-picker form-control has-feedback-left" id="filter_from" placeholder="Effective Date From" aria-describedby="inputSuccess2Status2" type="hidden">
                </div>
              </div>
            </div>
            <!-- col-sm-6 -->
            <div class="col-sm-2">
              <div class="">
                <div class="form-group">
                  <input required="required" value="{{$_REQUEST['filter_to']}}" name="filter_to" class="date-picker form-control has-feedback-left" id="filter_to" placeholder="Effective Date From" aria-describedby="inputSuccess2Status2" type="hidden">
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
                  <input required="required" value="{{ date('Y-m-d')}}" name="filter_from" class="date-picker form-control has-feedback-left" id="filter_from" placeholder="Effective Date From" aria-describedby="inputSuccess2Status2" type="hidden">
                </div>
              </div>
            </div>
            <!-- col-sm-6 -->
            <div class="col-sm-2">
              <div class="">
                <div class="form-group">
                  <input required="required" value="<?php echo $newDate;?>" name="filter_to" class="date-picker form-control has-feedback-left" id="filter_to" placeholder="Effective Date From" aria-describedby="inputSuccess2Status2" type="hidden">
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
        
          
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- search-flight -->
    <div class="flight-remark">
      
       <!-- Request a Flight ########### -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button> -->
                <!-- <h2 class="modal-title" id="myModalLabel2">!!trans('common.request_flight')!!}</h2> -->
              </div>
              <div class="modal-body">
                {!! Form::open(['url' => 'admin/setup_mgr/schedule','files'=> true,'class'=>'form-horizontal']) !!}

                {!! Form::close() !!}

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
      // print_r($diff);
      if($diff->i<=9){
        echo '0'.$diff->h;
        echo '0'.$diff->i;  
      }
    ?>
    
    <!-- main-container -->
    <div class="main_container">
      <!-- utc-time-switch -->
      <div style="width:100%;margin:0 auto;">
        <div class="utc-time">
          <center>
            <input type="hidden" id="DEFAULT_UTC_TIME" name="DEFAULT_UTC_TIME" value="{{DEFAULT_UTC_TIME}}">
            <div id="utc-default-content"></div>
            <input type="hidden" name="swap_aircraft_option" id="swap_aircraft_option">
            <!-- <div class="grid-flight">XU-112</div> -->
            <div class="grid-title-flight">
              <!-- <?php $i=1;?>
              @foreach($Aircrafts as $Aircraft)
                <div class="column">
                  <div style="position:absolute;z-index:100;" class="aircraft_swap" data-value="{{$Aircraft->id}}">
                    <input style="display:none;" type="checkbox" class="-hidden-lg" value="{{$Aircraft->id}}" id="aircraft_option_{{$Aircraft->id}}" name="flight_schedule_mgr[]">
                  </div>
                  <label for="aircraft_option_{{$Aircraft->id}}">
                    <div class="grid-cell airplane_value"><div class="flight-title aircraft-line-height">{{$Aircraft->name}}</div></div>
                    <input type="checkbox" name="aircraft[]" id="checkbox{{$Aircraft->id}}" style="display: none;">
                  </label>
                </div>
              <?php $i++;?>
              @endforeach -->
            </div>
          </center>
        </div>
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
        $total_d_co = intval($numberDays)*1177;
        $total_d_h = intval($numberDays)*1200;
     ?>


      <div id="-draggable2" class="draggable ui-widget-content" style="width:100%;margin:0 auto;">
        <!-- block-timeline -->
        <div class="gt-timeline" style="width:100%;cursor: move;">
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
  <!-- Correct Schedule -->
  @include('admin.schedule_monitor.common_print.print_schedule')

  <!-- Script Schedule -->
  <script type="text/javascript">
    // function printSchedule(){
    //   var filter_to = $('#filter_to').val();
    //   var filter_from = $('#filter_from').val();

    //   $('#from_date').val(filter_from);
    //   $('#to_date').val(filter_to);
    // }
  </script>
@endsection

