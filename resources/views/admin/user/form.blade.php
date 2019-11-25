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

    @if(!isset($user))
      {!! Form::open(['url' => 'admin/users','files'=> true,'class'=>'form-horizontal']) !!}
    @else
      {!! Form::model($user,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.users.update',$user->id]]) !!}
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
              <!-- <button type="submit" data-original-title="{!! trans('common.save') !!}"  data-toggle="tooltip" data-placement="top" class="btn btn-primary btn-md" name="submit" title="{!! trans('common.save') !!}"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs">{!! trans('common.save') !!}</span></button> -->
              @if($action=='edit')
              <button type="submit" data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" class="btn btn-primary" name="submit" title="{!!trans('common.save')!!}"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs">{!!trans('common.save')!!}</span></button>
              @endif
               <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/users')}}" class="btn btn-default"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!!trans('common.back_to_list')!!}</span></a>

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
            <div class="x_panel">
              <div class="x_title">
                <h2><i class="fa fa-pencil"></i> User Form</h2>
                 @include('admin.common.tool_box')
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <!-- col-sm-12 -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label  class="col-sm-4 control-label">Image</label>
                      <div class="col-sm-4">
                        <!-- <input type="file" name="image" id="image"> -->
                        <div style="position:relative;">
                          <!--e-logo-->
                          <div class="e-logo">
                         
                        
                            <img src="{{url('/images/img/no-image.png')}}" id="t" />
                          
                              <a class="file"><span>Choose Image</span>
                              {!! Form::file('image',['id'=>'image','accept'=>'image/x-png, image/gif, image/jpeg']) !!}
                              </a>
                          </div><!--#END e-logo-->
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Username:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::text('username',null,['class'=>'form-control has-feedback-left','placeholder'=>'username']) !!}
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::password('password',null,['class'=>'form-control has-feedback-left','placeholder'=>'Password']) !!}
                            <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::password('password_confirmation',null,['class'=>'form-control has-feedback-left','placeholder'=>'Confirm Password']) !!}
                            <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                              {!! Form::email('email',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-envelop form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Group:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                              {!! Form::select('group_id', $user_groups, null, ['optional' => 'Select a user...','class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
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

  @include('admin.setup_mgr.schedule.common')

<script>
  $('#userfile').on('change', function(ev) {
      var f = ev.target.files[0];
    var fr = new FileReader();
    
    fr.onload = function(ev2) {
      console.dir(ev2);
      $('#l').attr('src', ev2.target.result);
    };
    fr.readAsDataURL(f);
  });


</script> 
@endsection

