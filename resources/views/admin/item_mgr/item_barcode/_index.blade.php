@extends('admin.common.layout') 
@section('content')

  <!-- header -->
  @include('admin.common.header')
  @include('admin.item_mgr.item_base_vendor.modal_form')
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
      @include('admin.common.sidebar')
    </div>
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
      <div class="right_col" role="main">
        @include('admin.item_mgr.item_barcode._barcode')
        <!-- row -->
        <div class="row">
          <!-- col-md-8 col-xs-8 -->
          <div class="col-md-12 col-xs-12">
            <div class="x_panel">
              <div class="row">
                <div class="x_title">
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('item_mgr/item_barcode.entry_title')!!}</h2>
                  <div class="-row">
                    <span class="pull-right">
                      <div class="btn-group pull-left">
                        <a data-original-title="{!! trans('item_mgr/item_barcode.entry_generate') !!}"  data-toggle="tooltip" type="button" data-placement="top" href='{{url('admin/item_mgr/item_base_store/create')}}' class="btn btn-sm btn-primary" name="submit"><i class="glyphicon glyphicon-cog"></i> {!! trans('item_mgr/item_barcode.entry_generate') !!}</a>
                      </div>
                    </span>
                    <span class="pull-right">
                    </span>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              
              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content padding-top">
                  @include("admin.item_mgr.item_barcode.filter")
                  <!-- search-filter -->
                  
                  <div class="padding-top-md">
                    <div class="col-sm-2">
                      Barcode
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        @include('admin.common.footer')
        <!-- /footer content -->
      </div>
    <!-- /page content -->
  </div>

@endsection
