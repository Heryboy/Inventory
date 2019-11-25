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

  @if(!isset($agency))
      {!! Form::open(['url' => 'setup/sale/agency','files'=> true,'class'=>'form-horizontal']) !!}
    @else
      {!! Form::model($agency,['method' => 'PATCH','class'=>'form-horizontal','route'=>['setup.sale.agency.update',$agency->id]]) !!}
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
               <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('setup/sale/agency')}}" class="btn btn-default"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!!trans('common.back_to_list')!!}</span></a>

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
                <h2><i class="fa fa-pencil"></i> Agency Form</h2>
                 @include('admin.common.tool_box')
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <!-- col-sm-12 -->
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/agency.name') !!}:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::text('name',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-info-circle form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/agency.group_invoice_due_id') !!}:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                              {!! Form::select('group_invoice_due_id', $group_invoice_due, null, ['optional' => 'Select a user...','class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/agency.company_name') !!}:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::text('company_name',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-info-circle form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    

                   <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/agency.phone') !!}:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::number('phone',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/agency.fax') !!}:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::text('fax',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/agency.email') !!}:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::text('email',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/agency.website') !!}:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::text('website',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-chain form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/agency.address') !!}:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::text('address',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/agency.map_url') !!}:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::text('map_url',null,['class'=>'form-control has-feedback-left','id'=>'test']) !!}
                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

  
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Preview:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                            @if(isset($agency))
                              @if($agency->map_url!='')
                               <div style="text-decoration:none; overflow:hidden; height:500px; width:500px; max-width:100%;"><div id="gmap_display" style="height:100%; width:100%;max-width:100%;"><iframe id="map" style="height:100%;width:100%;border:0;" frameborder="0" src="{{$agency->map_url}}"></iframe></div><a class="google-map-enabler" href="https://www.dog-checks.com/greyhound-checks" id="enable-map-info">greyhound checks</a><style>#gmap_display img{max-width:none!important;background:none!important;font-size: inherit;}</style></div><script src="https://www.dog-checks.com/google-maps-authorization.js?id=931d4f67-8722-2acb-890b-c710929fd9ef&c=google-map-enabler&u=1473222560" defer="defer" async="async"></script>
                             
                            
                              @endif
                            @else
                             <div style="text-decoration:none; overflow:hidden; height:500px; width:500px; max-width:100%;"><div id="gmap_display" style="height:100%; width:100%;max-width:100%;"><iframe id="map" style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31270.052276931725!2d104.9231174!3d11.5693034!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951485ef17763%3A0xefe3565a3c51a780!2sK+K+International+Travel!5e0!3m2!1sen!2skh!4v1473223338811"></iframe></div><a class="google-map-enabler" href="https://www.dog-checks.com/greyhound-checks" id="enable-map-info">greyhound checks</a><style>#gmap_display img{max-width:none!important;background:none!important;font-size: inherit;}</style></div><script src="https://www.dog-checks.com/google-maps-authorization.js?id=931d4f67-8722-2acb-890b-c710929fd9ef&c=google-map-enabler&u=1473222560" defer="defer" async="async"></script>
                            @endif
                      
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


<script>
$(document).ready(function(){
    $("#test").change(function(){

      var url = $('#test').val();
       $("#map").attr("src", url);
        // alert(url);
    });
});
</script>
@endsection

