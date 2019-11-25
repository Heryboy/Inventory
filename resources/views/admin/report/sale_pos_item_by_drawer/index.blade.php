@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  <form novalidate="" action="#" id="demo-form2" data-parsley-validate="" class="">
    
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
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('report/sale_pos_item_by_drawer.entry_title')!!}</h2>
                  <div class="clearfix"></div>
                </div>
              </div>
              {{-- filter --}}
              @include("admin.report.sale_pos_item_by_drawer.filter")

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                        <td>{!!trans('report/sale_pos_item_by_drawer.entry_no')!!}</td>
                        <td>{!!trans('report/sale_pos_item_by_drawer.entry_branch')!!}</td>
                        <th>{!!trans('report/sale_pos_item_by_drawer.entry_sale_by')!!}</th>
                        <th>{!!trans('report/sale_pos_item_by_drawer.entry_code')!!}</th>
                        <th>{!!trans('report/sale_pos_item_by_drawer.entry_name')!!}</th>
                        <th>{!!trans('report/sale_pos_item_by_drawer.entry_unit')!!}</th>
                        <th>{!!trans('report/sale_pos_item_by_drawer.entry_sale_qty')!!}</th>
                        <th>{!!trans('report/sale_pos_item_by_drawer.entry_void_qty')!!}</th>
                        <th>{!!trans('report/sale_pos_item_by_drawer.entry_discount')!!}</th>
                        <!-- <th>{!!trans('report/sale_pos_item_by_drawer.entry_tax')!!}</th> -->
                        <th>{!!trans('report/sale_pos_item_by_drawer.entry_gross_sale')!!}</th>
                        <th>{!!trans('report/sale_pos_item_by_drawer.entry_net_sale')!!}</th>
                        <!-- <th>{!!trans('report/sale_pos_item_by_drawer.entry_cost_of_goods')!!}</th> -->
                        <th>{!!trans('report/sale_pos_item_by_drawer.entry_margin')!!}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $total_discount = 0;
                      $total_gross_sale = 0;
                      $total_net_sale = 0;
                      $total_margin = 0;
                    ?>
                    <?php $i = 1;?>
                    @foreach($saleItems as $row)
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$row->branch_name}}</td>
                        <td>{{ $row->user_drawer_name }}</td>
                        <td>{{$row->item_code}}</td>
                        <td>{{$row->item_name}}</td>
                        <td>{{$row->unit}}</td>
                        <td>{{$row->sale_qty}}</td>
                        <td>0</td>
                        <td>{{ number_format($row->discount_amount, 3) }}</td>
                        <td>{{ number_format($row->sub_total, 3) }}</td>
                        <td>{{ number_format(floatval($row->sub_total) - ( floatval($row->discount_amount)), 3) }}</td>
                        <!-- <td>$row->total_cost_price}}</td> -->
                        <td>
                          {{ number_format(((floatval($row->sub_total) - floatval($row->discount_amount)) - floatval($row->total_netprice)), 3) }}
                        </td>
                      </tr>
                      <?php 
                        $total_discount += $row->discount_amount;
                        $total_gross_sale += $row->sub_total;
                        $total_net_sale += ($row->sub_total - $row->discount_amount);
                        $total_margin += ($row->sub_total - $row->cost_amount);
                      ?>
                      <?php $i++; ?>
                    @endforeach
                    
                    </tbody>
                    <tfoot>
                      <tr> 
                        <td colspan="8" style="text-align: right; font-size:16px;background-color:#5c5c5c;color:#fff;"><b>Total</b></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{number_format($total_discount, 3)}}</b></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{number_format($total_gross_sale, 3)}}</b></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{number_format($total_net_sale, 3)}}</b></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{number_format($total_margin, 3)}}</b></td>
                      </tr>
                    </tfoot>
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
