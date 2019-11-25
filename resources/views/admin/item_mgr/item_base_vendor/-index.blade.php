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
    <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="row">
            <div class="x_panel">
              <div class="x_title">
                <div class="row">
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('setup_mgr/company.entry_title')!!}</h2>
                  <div class="row">
                    <span class="pull-right">
                      <button data-original-title="{!! trans('common.create') !!}" data-placement="top" data-toggle="modal" data-target=".bs-example-modal-lg" type="button" class="btn btn-primary"><i class="fa fa-wa fa-pencil"></i> {!! trans('common.create') !!}</button>
                    </span>
                  </div>
                  <!-- include('admin.common.tool_box') -->
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>

            <!-- row -->
            <div class="row">
              <!-- col-md-8 col-xs-8 -->
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">

                  <!-- x_content -->
                  <div class="x_content">
                    <!-- <table class="table table-bordered table-striped responsive-utilities jambo_table"> -->
                    <table id="example1" class="table table-bordered table-striped dataTable">
                      <thead>
                        <tr>
                          <th>{!!trans('item_mgr/item_base_vendor.no')!!}</th>
                          <th>{!!trans('item_mgr/item_base_vendor.entry_vendor')!!}</th>
                          <th>{!!trans('item_mgr/item_base_vendor.entry_item')!!}</th>
                          <th>{!!trans('item_mgr/item_base_vendor.is_active')!!}</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1;?>
                        @foreach($ItemBaseVendors as $ItemBaseVendor)
                          <tr class="even pointer">
                            <th>{{$i}}</th>
                            <td>{{$ItemBaseVendor->Vendor->vendor_name}}</td>
                            <td>{{$ItemBaseVendor->Item->name}}</td>
                            <td>{{$ItemBaseVendor->is_active}}</td>
                          </tr>
                          <?php $i++;?>
                        @endforeach
                      </tbody>
                    </table>
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
