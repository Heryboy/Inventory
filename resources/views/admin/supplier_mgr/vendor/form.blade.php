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

    @if(!isset($vendor))
      {!! Form::open(['url' => 'admin/vendor','class'=>'form-horizontal']) !!}
    @else
      {!! Form::model($vendor,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.vendor.update',$vendor->id]]) !!}
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
                  <h2><i class="fa fa-wa fa-pencil"></i> {!!trans('supplier_mgr/vendor.entry_title')!!}</h2>
                  <div class="row">
                    <span class="pull-right">
                      @if($action=='Edit')
                        <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/vendor')}}" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!! trans('common.back_to_list') !!}</span></a>

                        <button type="submit" data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" class="btn btn-primary" name="submit" title="{!!trans('supplier_mgr/vendor.save')!!}"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs">{!!trans('supplier_mgr/vendor.save')!!}</span></button>
                      @else
                        <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/vendor')}}" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!! trans('common.back_to_list') !!}</span></a>
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
                  <div class="col-sm-8">

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.vendor_name')!!}<span class="validate_label_red">*</span></label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('vendor_name',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.vendor_name")]) !!}
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!! trans('supplier_mgr/vendor.branch_name') !!}<span class="validate_label_red">*</span></label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::select('branch_id', $branch, null, ['placeholder' => trans('supplier_mgr/vendor.choose_branch'),'class'=>'form-control has-feedback-left']) !!}
                        <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.vendor_code')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('vendor_code',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.vendor_code")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.contact')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('contact',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.contact")]) !!}
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.email')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::email('email',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.email")]) !!}
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.website')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('website',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.website")]) !!}
                        <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.account_number')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('account_number',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.account_number")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.vat_no')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('vat_no',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.vat_no")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.terms_of_payment')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('terms_of_payment',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.terms_of_payment")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.delivery_day')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('delivery_day',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.delivery_day")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.address1')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('address1',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.address1")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.address2')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('address2',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.address2")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.tel1')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('tel1',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.tel1")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.tel2')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('tel2',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.tel2")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.tel3')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('tel3',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.tel4")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.fax1')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('fax1',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.fax1")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.fax2')!!}</label>
                      <div class="col-md-7 col-sm-7 col-xs-12 ">
                        {!! Form::text('fax2',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("supplier_mgr/vendor.fax2")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <!-- row -->
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.is_vat')!!}</label>
                      <!-- col-sm-7 -->
                      <div class="col-sm-7" >
                        {!! Form::checkbox('is_vat',null,null,['class' => 'flat form-control']) !!}
                      </div>
                    </div>

                    <!-- row -->
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-12">{!!trans('supplier_mgr/vendor.is_active')!!}</label>
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
