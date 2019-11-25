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

    @if(!isset($company))
      {!! Form::open(['url' => 'admin/setup_mgr/company','files'=>true,'class'=>'form-horizontal']) !!}
    @else
      {!! Form::model($company,['method' => 'PATCH','files'=>true,'class'=>'form-horizontal','route'=>['admin.setup_mgr.company.update',$company->id]]) !!}
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
            @include('admin.common.message')
            @include('admin.common.error_input')
            <div class="x_panel">

              <div class="x_title">
                <div class="row">
                  <h2><i class="fa fa-wa fa-home"></i> {!!trans('setup_mgr/company.entry_title')!!}</h2>
                  <div class="row">
                    <span class="pull-right">
                      @if($action=='Edit')
                        <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/setup_mgr/company')}}" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!! trans('common.back_to_list') !!}</span></a>

                        <button type="submit" data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" class="btn btn-primary" name="submit" title="{!!trans('setup_mgr/company.save')!!}"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs">{!!trans('setup_mgr/company.save')!!}</span></button>
                      @else
                        <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/setup_mgr/company')}}" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!! trans('common.back_to_list') !!}</span></a>
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

                  {{-- form-group --}}
                  <div class="col-sm-2">
                    <label  class="col-sm-4 control-label">Logo</label>
                    <div class="col-sm-4">
                      <!-- <input type="file" name="image" id="image"> -->
                      <div style="position:relative;">
                        <!--e-logo-->
                        <div class="e-logo">
                          @if(isset($company))
                            @if($company->image!='')
                              <img width="140px" src="{{url('images/uploads/company')}}/{{$company->image}}" id="t" />
                              <input type="hidden" name="image_hidden" value="{{$company->image}}">
                            @else
                              <img width="140px" src="{{url('images/no_image.png')}}" id="t" />
                            @endif
                          @else
                            <img width="140px" src="{{url('images/no_image.png')}}" id="t" /> 
                          @endif   
                          <a class="file"><span>Choose Logo</span>
                          {!! Form::file('image',['id'=>'image','accept'=>'image/x-png, image/gif, image/jpeg']) !!}
                          </a>
                        </div><!--#END e-logo-->
                      </div>
                    </div>
                  </div>

                  <!-- col-sm-12 -->
                  <div class="col-sm-8">
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/company.company_kh')!!} <span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::text('company_kh',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/company.company_kh")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/company.company_eng')!!} <span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::text('company_en',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/company.company_eng")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/company.phone')!!}</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::text('phone',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/company.phone")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/company.email')!!}</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::text('email',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/company.email")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/company.website')!!}</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::text('website',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/company.website")]) !!}
                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/company.address')!!}:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::textarea('address',null,['class'=>'form-control','placeholder'=>trans("setup_mgr/company.address")]) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/company.description')!!}:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>trans("setup_mgr/company.description")]) !!}
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
