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

  @if(!isset($stock))
      {!! Form::open(['url' => 'setup/sale/stock/stock','files'=> true,'class'=>'form-horizontal']) !!}
    @else
      {!! Form::model($stock,['method' => 'PATCH','class'=>'form-horizontal','route'=>['setup.sale.stock.stock.update',$stock->id]]) !!}
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
               <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('setup/sale/stock/stock')}}" class="btn btn-default"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!!trans('common.back_to_list')!!}</span></a>

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
                <h2><i class="fa fa-pencil"></i> Stock Form</h2>
                 @include('admin.common.tool_box')
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <!-- col-sm-12 -->
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/stock.name') !!}:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::text('name',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-info-circle form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                      <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/stock.parent_id') !!}:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                              {!! Form::select('parent_id', $stockList, null, ['optional' => 'Select a user...','class'=>'form-control has-feedback-left','placeholder'=>'--Choose Stock--']) !!}
                            <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                      <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/stock.stock_type_id') !!}:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                              {!! Form::select('stock_type_id', $stock_type, null, ['optional' => 'Select a user...','class'=>'form-control has-feedback-left','placeholder'=>'--Choose Stock Type--']) !!}
                            <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>
                      
                      <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/stock.alias') !!}:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::text('alias',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-info-circle  form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>
                  
                     <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/stock.amount') !!}:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::number('amount',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-usd form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                      <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/stock.amount_alert') !!}:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             {!! Form::number('amount_alert',null,['class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-usd form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/stock.is_debt')!!}?</label>
                      <!-- col-sm-6 -->
                      <div class="col-sm-6" >
                        <input class="flat" type="checkbox" value="1" name="is_debt" <?php if(isset($stock)&& $stock->is_debt==1){echo "checked=''";}?>>
                        
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

