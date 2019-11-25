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
    @if(!isset($user_group))
      {!! Form::open(['url' => 'admin/user_groups','class'=>'form-horizontal']) !!}
    @else
      {!! Form::model($user_group,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.user_groups.update',$user_group->id]]) !!}
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
            <div class="x_panel">
              <div class="x_title">
                <h2><i class="fa fa-wa fa-user"></i> {!! trans('usergroup/user_group.entry_title') !!}</h2>
                <!-- block button -->
                <div class="row">
                  <span class="pull-right">
                    @if($action=='Edit' || $action=='Create')
                      <a data-original-title="{!! trans('usergroup/user_group.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/user_groups')}}" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!!trans('usergroup/user_group.back_to_list')!!}</span></a>

                      <button type="submit" data-original-title="{!! trans('usergroup/user_group.create') !!}"  data-toggle="tooltip" data-placement="top" href='{{url('admin/setup_mgr/schedule/create')}}' class="btn btn-primary" name="submit" title="Quick Save"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs">{!!trans('usergroup/user_group.save')!!}</span></button>
                    @else
                      <a data-original-title="{!! trans('usergroup/user_group.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/user_groups')}}" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!!trans('usergroup/user_group.back_to_list')!!}</span></a>
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
                    <div class="box-body">

                      <div class="form-group">
                        <label  class="col-sm-4 control-label">{!! trans('usergroup/user_group.name') !!}<span class="validate_label_red"> *</span></label>
                        <div class="col-sm-4">
                          {!! Form::text('name',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("usergroup/user_group.name")]) !!}
                          <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label  class="col-sm-4 control-label">{!!trans('usergroup/user_group.remark')!!}</label>
                        <div class="col-sm-4">
                            {!! Form::textarea('remark',null,['class'=>'form-control','placeholder'=>trans("usergroup/user_group.remark")]) !!}
                        </div>
                      </div>
                        
                    </div><!-- /.box-body -->
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
