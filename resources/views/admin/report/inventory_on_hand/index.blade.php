@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  <!-- <form target="_blank" action="{{url('admin/report/print_inventory_on_hand')}}" novalidate="" action="#" id="demo-form2" data-parsley-validate="" class=""> -->
    
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
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('report/inventory_on_hand.entry_title')!!}</h2>
                  <div class="clearfix"></div>
                </div>
              </div>
              {{-- filter --}}
              @include("admin.report.inventory_on_hand.filter")

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                      <th>{!!trans('item_mgr/item_in_stock.entry_code')!!}</th>
                      <th>{!!trans('item_mgr/item_in_stock.entry_name')!!}</th>
                      <th>{!!trans('item_mgr/item_in_stock.entry_unit')!!}</th>
                      <th>{!!trans('item_mgr/item_in_stock.entry_adjust_qty')!!}</th>
                      <th>{!!trans('item_mgr/item_in_stock.entry_purchase_qty')!!}</th>
                      <th>{!!trans('item_mgr/item_in_stock.entry_lost_qty')!!}</th>
                      <th>{!!trans('item_mgr/item_in_stock.entry_damage_qty')!!}</th>
                      <th>{!!trans('item_mgr/item_in_stock.entry_return_qty')!!}</th>
                      <th>{!!trans('item_mgr/item_in_stock.entry_sale_qty')!!}</th>
                      <th>{!!trans('item_mgr/item_in_stock.entry_transfer_qty')!!}</th>
                      <th>{!!trans('item_mgr/item_in_stock.entry_begin_balance')!!}</th>
                      <!-- <th>{!!trans('item_mgr/item_in_stock.entry_balance')!!}</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                          $sum_inventory_count = 0;
                          $sum_purchase_qty = 0;
                          $sum_lost_qty = 0;
                          $sum_damage_qty = 0;
                          $sum_return_qty = 0;
                          $sum_sale_qty = 0;
                          $sum_transfer_qty = 0;
                          $sum_available_instock = 0;
                      ?>
                      @foreach($ItemInStocks as $row)
                      <tr>
                        <td>{{$row->item_code}}</td>
                        <td>{{$row->item_name}}</td>
                        <td>{{$row->unit}}</td>
                        <td>{{floatval($row->adjust_qty)}}</td>
                        <td>{{floatval($row->purchase_qty)}}</td>
                        <td>{{floatval($row->lost_qty)}}</td>
                        <td>{{floatval($row->damage_qty)}}</td>
                        <td>{{floatval($row->return_qty)}}</td>
                        <td>{{floatval($row->sale_qty)+floatval($row->sale_order_qty)}}</td>                        
                        <td>{{floatval($row->transfer_qty)}}</td>
                        <td>{{(floatval($row->purchase_qty)+floatval($row->adjust_qty))-(floatval($row->return_qty) + floatval($row->sale_qty)+floatval($row->sale_order_qty)+floatval($row->transfer_qty)+floatval($row->lost_qty)+floatval($row->damage_qty))}}</td>
                        <!-- <td></td> -->
                      </tr>
                      <?php 
                        // $sum_inventory_count += $row->adjust_qty;
                        // $sum_purchase_qty += floatval($row->purchase_qty);
                        // $sum_lost_qty += $row->lost_qty;
                        // $sum_damage_qty += $row->damage_qty;
                        // $sum_return_qty += $row->return_qty;
                        // $sum_sale_qty += (floatval($row->sale_qty)+floatval($row->sale_order_qty));
                        // $sum_transfer_qty += $row->transfer_qty;
                        // $sum_available_instock += (floatval($row->purchase_qty)+floatval($row->adjust_qty))-(floatval($row->return_qty) + floatval($row->sale_qty)+floatval($row->sale_order_qty)+floatval($row->transfer_qty)+floatval($row->lost_qty)+floatval($row->damage_qty));
                      ?>
                      @endforeach
                    
                    </tbody>
                    <!-- <tfoot>
                      <tr> 
                        <td colspan="3" style="text-align: right; font-size:16px;background-color:#5c5c5c;color:#fff;"><b>Total</b></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_inventory_count}}</b></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_purchase_qty}}</b></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_lost_qty}}</b></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_damage_qty}}</b></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_return_qty}}</b></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_sale_qty}}</b></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_transfer_qty}}</b></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_available_instock}}</b></td>
                      </tr>
                    </tfoot> -->
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

  <!-- </form> -->

@endsection
