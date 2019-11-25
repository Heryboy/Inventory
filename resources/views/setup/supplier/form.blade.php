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

  @if(!isset($supplier))
      {!! Form::open(['url' => 'setup/sale/stock/supplier','files'=> true,'class'=>'form-horizontal']) !!}
    @else
      {!! Form::model($supplier,['method' => 'PATCH','class'=>'form-horizontal','route'=>['setup.sale.stock.supplier.update',$supplier->id]]) !!}
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
               <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('setup/sale/stock/supplier')}}" class="btn btn-default"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!!trans('common.back_to_list')!!}</span></a>

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
                <h2><i class="fa fa-pencil"></i> Supplier Form</h2>
                 @include('admin.common.tool_box')
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <!-- col-sm-12 -->
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/supplier.name') !!}:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::text('name',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-info-circle form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>


                   <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/supplier.phone') !!}:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::number('phone',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

    

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/supplier.email') !!}:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::text('email',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/supplier.address') !!}:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::text('address',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/supplier.website') !!}:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::text('website',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-chain form-control-feedback left" aria-hidden="true"></span>
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

