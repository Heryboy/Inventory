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
    @if(!isset($GroupRole))
      {!! Form::open(['url' => 'admin/users_group_role','class'=>'form-horizontal']) !!}
    @else
      {!! Form::model($GroupRole,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.users_group_role.update',$GroupRole->id]]) !!}
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

              <button type="submit" data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" class="btn btn-primary" name="submit" title="{!!trans('common.save')!!}"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs">{!!trans('common.save')!!}</span></button>
              
              <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/users_group_role')}}" class="btn btn-default"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!!trans('common.back_to_list')!!}</span></a>

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
                <h2>{!! trans('users_group.users_group_form') !!}</h2>
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
                    @include('admin.common.message')
                    <div class="box-body">

                      <div class="form-group">
                        <label  class="col-sm-4 control-label">{!!trans('users/group_role.group_role')!!}<span class="validate_label_red">*</span></label>
                        <div class="col-sm-4">
                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'name']) !!}
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label  class="col-sm-4 control-label">{!!trans('users/group_role.user_group')!!}<span class="validate_label_red">*</span></label>
                        <div class="col-sm-4">
                          {!! Form::select('group_id',$UserGroup,null, ['option' => 'Select Position','class'=>'form-control']) !!}
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label  class="col-sm-4 control-label">{!!trans('users/group_role.remark')!!}</label>
                        <div class="col-sm-4">
                          {!! Form::textarea('remark',null,['class'=>'form-control','placeholder'=>'Remark']) !!}
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
