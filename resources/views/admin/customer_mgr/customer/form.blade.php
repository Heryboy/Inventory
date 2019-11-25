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

    @if(!isset($customer))
      {!! Form::open(['url' => 'admin/customer_mgr/customer','class'=>'form-horizontal']) !!}
    @else
      {!! Form::model($customer,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.customer_mgr.customer.update',$customer->id]]) !!}
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
                  <h2><i class="fa fa-wa fa-user"></i> {!!trans('customer_mgr/customer.entry_title')!!}</h2>
                  <div class="row">
                    <span class="pull-right">
                      @if($action=='Edit')
                        <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/customer_mgr/customer')}}" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!! trans('common.back_to_list') !!}</span></a>

                        <button type="submit" data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" class="btn btn-primary" name="submit" title="{!!trans('customer_mgr/customer.save')!!}"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs">{!!trans('customer_mgr/customer.save')!!}</span></button>
                      @else
                        <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/customer_mgr/customer')}}" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!! trans('common.back_to_list') !!}</span></a>
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
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('customer_mgr/customer.customer_group')!!}<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::select('customer_group_id', $customer_groups, null, ['placeholder' => trans('customer_mgr/customer.select_customer_group'),'class'=>'form-control has-feedback-left']) !!}
                        <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('customer_mgr/customer.name')!!}<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::text('name',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("customer_mgr/customer.name")]) !!}
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('customer_mgr/customer.phone')!!}<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::text('phone',null,['class'=>'form-control has-feedback-left','placeholder'=>trans('customer_mgr/customer.phone')]) !!}
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('customer_mgr/customer.email')!!}:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::email('email',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("customer_mgr/customer.email")]) !!}
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('customer_mgr/customer.address')!!}:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::text('address',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("customer_mgr/customer.address")]) !!}
                        <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
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
