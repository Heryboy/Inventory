@extends('admin.common.layout') 
@section('content')
<!-- header -->
@include('admin.common.header')
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
     @include('admin.common.sidebar')
    </div>

    @if(!isset($employee))
      {!! Form::open(['url' => 'admin/setup_mgr/employee','class'=>'form-horizontal']) !!}
    @else
      {!! Form::model($employee,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.setup_mgr.employee.update',$employee->id]]) !!}
    @endif
      <!-- top navigation -->
      <div class="top_nav">
         <div class="nav_menu">
           <nav class="" role="navigation">
             <div class="nav toggle" style="margin-bottom:10px;">
               <a id="menu_toggle"><i class="fa fa-bars"></i></a>
             </div>
           </nav>
         </div>
      </div><!-- /top navigation -->
      <!-- page content -->
      <div style="min-height: 650px;" class="right_col" role="main">
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            @include('admin.common.error_input')
            @include('admin.common.message')
            <div class="x_panel">

              <div class="x_title">
                <div class="row">
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('setup_mgr/employee.entry_title')!!}</h2>
                  <div class="row">
                    <span class="pull-right">
                      @if($action=='Edit')
                        <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/setup_mgr/employee')}}" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!! trans('common.back_to_list') !!}</span></a>

                        <button type="submit" data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" class="btn btn-primary" name="submit" title="{!!trans('setup_mgr/employee.save')!!}"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs">{!!trans('setup_mgr/employee.save')!!}</span></button>
                      @else
                        <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/setup_mgr/employee')}}" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!! trans('common.back_to_list') !!}</span></a>
                      @endif
                    </span>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <!-- col-sm-12 -->
                  <div class="col-sm-12">

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/employee.name')!!}<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::text('emp_name',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/employee.name")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/employee.position')!!}<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::select('position_id', $position, null, ['placeholder' => trans('setup_mgr/employee.choose_position'),'class'=>'form-control has-feedback-left']) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/employee.department')!!}<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::select('department_id', $department, null, ['placeholder' => trans('setup_mgr/employee.choose_department'),'class'=>'form-control has-feedback-left']) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/employee.dob')!!}</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::text('emp_dob',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/employee.dob")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/employee.contact')!!}</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::text('emp_contact',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/employee.contact")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/employee.website')!!}</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::text('emp_website',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/employee.website")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/employee.current_living')!!}</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::text('emp_current_living',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/employee.current_living")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/employee.relative')!!}</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::text('emp_relative',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/employee.relative")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <!-- row -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/employee.is_active')!!}</label>
                      <!-- col-sm-6 -->
                      <div class="col-sm-6" >
                        <!-- <input class="flat" type="checkbox" value="1" name="is_alert_email"> -->
                        {!! Form::checkbox('is_active',null,null,['class' => 'flat form-control']) !!}
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- footer content -->
        @include('admin.common.footer')
        <!-- /footer content -->
      </div>
      <!-- /page content -->
    {!! Form::close() !!}
  </div>


@endsection
