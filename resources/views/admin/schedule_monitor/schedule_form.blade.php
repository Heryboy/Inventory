<!-- !! Form::open(['url' => 'admin/setup_mgr/schedule','files'=> true,'class'=>'form-horizontal']) !!} -->

  <!-- page content -->
  <div style="min-height: 650px;" class="right_col" role="main">
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
              <div class="col-sm-4">
                <?php
                  // $aircraft = ['0' => 'Select Branch'] + $aircraft; 
                ?>
                {!! Form::select('aircraft_id', $aircraft, null,['class'=>'form-control','placeholder'=>'--Choose Aircraft--']) !!} 

                <!-- !! Form::select('branch_id',[null => 'Select Branch'] +$branch_info,null,['class'=>'form-control']) !!} -->
              </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/schedule.pax_movement')!!}</label>
              <div class="col-sm-4">
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
                <label for="sun" style="margin-right:10px;">
                  {!!trans('setup_mgr/schedule.sun')!!} <input class="flat" type="checkbox" value="7" name="flight_day[]">
                </label>
                <label for="mon" style="margin-right:10px;">
                  {!!trans('setup_mgr/schedule.mon')!!} <input class="flat" type="checkbox" value="1" name="flight_day[]">
                </label>
                <label for="tue" style="margin-right:10px;">
                  {!!trans('setup_mgr/schedule.tue')!!} <input class="flat" type="checkbox" value="2" name="flight_day[]">
                </label>
                <label for="wed" style="margin-right:10px;">
                  {!!trans('setup_mgr/schedule.wed')!!} <input class="flat" type="checkbox" value="3" name="flight_day[]">
                </label>
                <label for="thu" style="margin-right:10px;">
                  {!!trans('setup_mgr/schedule.thu')!!} <input class="flat" type="checkbox" value="4" name="flight_day[]">
                </label>
                <label for="fri" style="margin-right:10px;">
                  {!!trans('setup_mgr/schedule.fri')!!} <input class="flat" type="checkbox" value="5" name="flight_day[]">
                </label>
                <label for="sat" style="margin-right:10px;">
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
<!-- !! Form::close() !!} -->