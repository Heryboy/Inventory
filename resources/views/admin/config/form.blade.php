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
    @if(!isset($config))
      {!! Form::open(['url' => 'admin/config/create','class'=>'form-horizontal']) !!}
    @else
      {!! Form::model($config,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.config.configuration.update',$config->id]]) !!}
    @endif
      <!-- top navigation -->
      <div class="top_nav">
         <div class="nav_menu">
           <nav class="" role="navigation">
             <div class="nav toggle" style="margin-bottom:10px;">
               <a id="menu_toggle"><i class="fa fa-bars"></i></a>
             </div>
             <!-- block button -->
             <div class="pull-right" style="padding-top:10px;">
              <!-- action-top -->
              @if($action=='edit')
              <button type="submit" data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" class="btn btn-primary" name="submit" title="{!!trans('common.save')!!}"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs">{!!trans('common.save')!!}</span></button>
              @endif
              
              <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/config/configuration')}}" class="btn btn-default"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!!trans('common.back_to_list')!!}</span></a>

             </div> 
           </nav>
         </div>
      </div><!-- /top navigation -->
      <!-- page content -->
      <div style="min-height: 650px;" class="right_col" role="main">
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Configuration</h2>
                @include('admin.common.tool_box')
              </div>
              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <!-- col-sm-12 -->
                  <div class="col-sm-12">
                    <!-- error_message -->
                    @include('admin.common.error_input')
                    <div class="box-body">
                    
                    <div class="form-group">
                      <label  class="col-sm-4 control-label">Config Group<span class="validate_label_red">*</span></label>
                      <div class="col-sm-4">
                        <!-- !! Form::select('config_group_id',[null => 'Select Config Group'] +$config_group,null,['class'=>'form-control']) !!} -->
                        {!! Form::select('config_group_id', $config_group, null,['class'=>'form-control','placeholder'=>'--Choose Config Group--']) !!} 
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-4 control-label">Name<span class="validate_label_red">*</span></label>
                      <div class="col-sm-4">
                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Config Name']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-4 control-label">Keyword<span class="validate_label_red">*</span></label>
                      <div class="col-sm-4">
                        {!! Form::text('keywords',null,['class'=>'form-control','placeholder'=>'Keyword']) !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-4 control-label">Value<span class="validate_label_red">*</span></label>
                      <div class="col-sm-4">
                        {!! Form::text('value',null,['class'=>'form-control','placeholder'=>'value']) !!}
                      </div>
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
    {!! Form::close() !!}
    <!-- /page content -->
  </div>

@endsection
