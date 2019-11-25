@extends('admin.common.layout') 
@section('content')
<!-- header -->
@include('admin.common.header')
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <!--<div class="col-md-3 left_col">-->
     {{--@include('admin.common.sidebar')--}}
    <!-- </div> -->

    @if(!isset($supplier))
      {!! Form::open(['url' => 'admin/supplier_mgr/supplier','class'=>'form-horizontal']) !!}
    @else
      {!! Form::model($supplier,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.supplier_mgr.supplier.update',$supplier->id]]) !!}
    @endif
    
      <!-- page content -->
      <div>
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            @include('admin.common.error_input')
            @include('admin.common.message')
            <div class="x_panel">

              <div class="x_title">
                <div class="row">
                  <h2><i class="fa fa-wa fa-pencil"></i> {!!trans('supplier_mgr/supplier.entry_title')!!}</h2>
                  <div class="row">
                    <span class="pull-right">
                      @if($action=='Edit')
                        <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/supplier_mgr/supplier')}}" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!! trans('common.back_to_list') !!}</span></a>

                        <button type="submit" data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" class="btn btn-primary" name="submit" title="{!!trans('supplier_mgr/supplier.save')!!}"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs">{!!trans('supplier_mgr/supplier.save')!!}</span></button>
                      @else
                        <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/supplier_mgr/supplier')}}" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!! trans('common.back_to_list') !!}</span></a>
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
                  <!-- col-sm-10 -->
                  <div class="col-sm-8">

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/supplier.supplier_name')!!}<span class="validate_label_red">*</span></label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('name',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/supplier.supplier_name")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!! trans('supplier_mgr/supplier.branch_name') !!}<span class="validate_label_red">*</span></label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::select('branch_id', $branch, null, ['placeholder' => trans('supplier_mgr/supplier.choose_branch'),'class'=>'form-control has-feedback-left']) !!}
                        <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>
                    

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/supplier.contact')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('contact',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/supplier.contact")]) !!}
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/supplier.email')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::email('email',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/supplier.email")]) !!}
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/supplier.website')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('website',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/supplier.website")]) !!}
                        <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                   
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/supplier.address')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('address',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/supplier.address")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <!-- row -->
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/supplier.is_active')!!}</label>
                      <!-- col-sm-7 -->
                      <div class="col-sm-7" >
                        {!! Form::checkbox('is_active',null,null,['class' => 'flat form-control']) !!}
                      </div>
                    </div>  
                  </div>
                  <!-- col-sm-2 -->
                  <div class="col-sm-2">
                    <div class="pull-left">
                      <img class="img-responsive" src="{{url('images/user.png')}}">
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
