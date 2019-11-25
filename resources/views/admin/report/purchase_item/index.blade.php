@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  <form target="_blank" action="{{url('admin/report/print_purchase_order_vendor')}}" novalidate="" action="#" id="demo-form2" data-parsley-validate="" class="">
    
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
       @include('admin.report.sidebar')
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
      <div style="min-height: 650px;" class="right_col" role="main">
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            @include('admin.common.message')
            <div class="x_panel">
              <div class="x_title">
                <div class="row">
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('report/purchase_order.entry_purchase_order_by_vendor')!!}</h2>
                  <div class="clearfix"></div>
                </div>
              </div>
              {{-- filter --}}
              @include("admin.report.purchase_item.filter")

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                        <td>{!!trans('report/purchase_order.entry_no')!!}</td>
                        <td>{!!trans('report/purchase_order.entry_branch')!!}</td>
                        <td>{!!trans('report/purchase_order.entry_vendor')!!}</td>
                        <th>{!!trans('report/purchase_order.entry_name')!!}</th>
                        <th>{!!trans('report/purchase_order.entry_unit')!!}</th>
                        <th>{!!trans('report/purchase_order.entry_purchase_qty')!!}</th>				
                        <th>{!!trans('report/purchase_order.entry_discount')!!}</th>	
                        <th>{!!trans('report/purchase_order.entry_grand_total')!!}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1;?>
                      @foreach($purchaseOrderByVendor as $row)
                        <tr>
                          <td>{{ $i }}</td>
                          <td>{{$row->branch_name}}</td>
                          <td>{{$row->vendor_name}}</td>
                          <td>{{$row->item_name}}</td>
                          <td>{{$row->unit}}</td>
                          <td>{{floatval($row->qty)}}</td>
                          <td>{{floatval($row->discount_amount)}}</td>
                          <td>{{floatval($row->total_amount)}}</td>
                        </tr>
                        <?php $i ++;?>
                      @endforeach
                    </tbody>
                  </table>
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
    </div>

  </form>

@endsection
