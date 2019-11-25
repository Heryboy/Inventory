@extends('admin.common.layout') 
@section('content')
<!-- header -->
@include('admin.common.header')
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
     @include('admin.setup_mgr.item_sub_category._sidebar')
    </div>

    @if(!isset($item_sub_category))
      {!! Form::open(['url' => 'admin/setup_mgr/item_sub_category','files'=> true,'class'=>'form-horizontal']) !!}
    @else
      {!! Form::model($item_sub_category,['method' => 'PATCH','files'=> true,'class'=>'form-horizontal','route'=>['admin.setup_mgr.item_sub_category.update',$item_sub_category->id]]) !!}
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
                  <h2><i class="fa fa-wa fa-fa-users"></i> {!!trans('setup_mgr/item_sub_category.entry_title')!!}</h2>
                  <div class="row">
                    <span class="pull-right">
                      @if($action=='Edit')
                        <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/setup_mgr/item_sub_category')}}" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!! trans('common.back_to_list') !!}</span></a>

                        <button type="submit" data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" class="btn btn-primary" name="submit" title="{!!trans('setup_mgr/item_sub_category.save')!!}"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs">{!!trans('setup_mgr/item_sub_category.save')!!}</span></button>
                      @else
                        <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/setup_mgr/item_sub_category')}}" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!! trans('common.back_to_list') !!}</span></a>
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
                   <!-- col-sm-2 -->
                    <div class="col-sm-1">
                      <div style="position:relative;">
                        <!--e-logo-->
                        <div class="e-logo">
                          @if(isset($item_sub_category))
                            <img src="{{url('images/uploads/catalog')}}/{{$item_sub_category->image}}" id="t" width="150px">
                            <input value="{{$item_sub_category->image}}" name="image_hidden" type="hidden"/>
                          @else
                            <img src="{{url('images/no_image.png')}}" id="t" width="150px">
                          @endif
                          
                          <a class="file"><span>Choose Image</span>
                            <input id="image" accept="image/x-png, image/gif, image/jpeg" name="image" type="file">
                          </a>
                        </div><!--#END e-logo-->
                      </div>
                    </div>

                    <!-- col-sm-12 -->
                    <div class="col-sm-8">

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/item_sub_category.item_sub_category_name')!!}:<span class="validate_label_red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          {!! Form::text('name',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item_sub_category.item_sub_category_name")]) !!}
                          <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/item_sub_category.category')!!}:<span class="validate_label_red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          {!! Form::select('item_category_id', $ItemCategory, null, ['placeholder' => trans('setup_mgr/item_sub_category.choose_category'),'class'=>'form-control has-feedback-left']) !!}
                          <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('setup_mgr/item_sub_category.printer')!!}:<span class="validate_label_red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          {!! Form::select('pos_kitchens_id', $POSKitchens, null, ['placeholder' => trans('setup_mgr/item_sub_category.choose_kitchen_printer'),'class'=>'form-control has-feedback-left']) !!}
                          <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('setup_mgr/item_sub_category.branch_name') !!}<span class="validate_label_red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          {!! Form::select('branch_id', $branch, null, ['placeholder' => trans('setup_mgr/item_sub_category.choose_branch'),'class'=>'form-control has-feedback-left']) !!}
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

@endsection