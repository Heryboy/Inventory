@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  <!-- include('admin.sale_mgr.sale_order._modal_invoice') -->
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
      @include('admin.sale_mgr.sale_order.sidebar')
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
            @include('admin.common.message')
            <div class="x_panel">
              <div class="x_title">
                <div class="row">
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('sale_mgr/sale_order.entry_sale_order_list')!!}</h2>
                  <div class="row">
                    <span class="pull-right">
                    <a data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" type="button" data-placement="top" href='{{url('admin/sale_mgr/sale_order/create')}}' class="btn btn-sm btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> New Order</a>
                    </span>
                  </div>
                  <!-- include('admin.common.tool_box') -->
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>

            <!-- row -->
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <!-- <div class="x_title">
                    <div class="row">
                      <form class="form-horizontal form-label-left">
                        <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-12"><i class="fa fa fa-th-large"></i> Item Category</label>
                          <div class="col-md-8 col-sm-8 col-xs-12">
                            <input class="form-control" placeholder="Item Category" type="text">
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="clearfix"></div>
                  </div> -->
                  <div class="-x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- content -->
                        <!-- ############# -->
                        <!-- Table row -->
                        <div class="row">
                          <div class="col-xs-12">
                            {{-- @include("admin.quotation.filter") --}}
                            <!-- <table class="table table-striped"> -->
                            <table id="example1" class="table table-bordered table-striped dataTable">
                              <thead>
                                <tr>
                                  <th>{!!trans('sale_mgr/sale_order.entry_no')!!}</th>
                                  <th>{!!trans('sale_mgr/sale_order.entry_sale_order_no')!!}</th>
                                  <th>{!!trans('sale_mgr/sale_order.entry_customer_name')!!}</th>
                                  <th>{!!trans('sale_mgr/sale_order.entry_tax_amount')!!}</th>
                                  <th>{!!trans('sale_mgr/sale_order.entry_sub_total')!!}</th>
                                  <th>{!!trans('sale_mgr/sale_order.entry_paid_amount')!!}</th>
                                  <th>{!!trans('sale_mgr/sale_order.entry_remaining_amount')!!}</th>
                                  <th>{!!trans('sale_mgr/sale_order.entry_action')!!}</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i = 1;?>
                                @foreach($SaleOrders as $row)
                                  <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$row->order_no}}</td>
                                    <td>{{$row->Customer->name}}</td>
                                    <td>{{$row->tax_amount}}</td>
                                    <td>{{Helpers::FormatCurrentcy($row->sub_total_amount)}}</td>
                                    <td>{{Helpers::FormatCurrentcy(0)}}</td>
                                    <td>{{Helpers::FormatCurrentcy($row->sub_total_amount)}}</td>
                                    <td>
                                      <center>
                                        <a target="_blank" href="{{url('admin/sale_mgr/print_invoice/'.$row->id)}}" class="btn btn-xs btn-primary" data-original-title="Print"  data-toggle="tooltip" data-placement="top"><i class="fa fa-print"></i></a>
                                        <a href="{{route('admin.sale_mgr.sale_order.edit',$row->id)}}" class="btn btn-xs btn-success" data-original-title="{!! trans('sale_mgr/sale_order.add_payment') !!}" data-toggle="tooltip" data-placement="top"><i class="fa fa-money"></i></a>
                                        <a href="{{route('admin.sale_mgr.sale_order.edit',$row->id)}}" class="btn btn-xs btn-primary" data-original-title="{!! trans('sale_mgr/sale_order.edit') !!}" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                                      </center>
                                    </td>
                                  </tr>
                                  <?php $i ++ ;?>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- ############### -->
                      </div>
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
