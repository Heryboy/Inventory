@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  @include('admin.item_mgr.item_base_vendor.modal_form')
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
      @include('admin.item_mgr.item_in_stock.sidebar')
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
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            @include('admin.common.message')
            <div class="x_panel">
              <div class="row">
                <div class="x_title">
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('item_mgr/item_in_stock.entry_title')!!}</h2>
                  <div class="-row">
                    <span class="pull-right">
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
                <div class="x_content">
                  <!-- search-filter -->
                  @include("admin.item_mgr.item_in_stock._filter_search")
                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                       <tr>
                        <th>{!!trans('item_mgr/item_in_stock.entry_code')!!}</th>
                        <th>{!!trans('item_mgr/item_in_stock.entry_name')!!}</th>
                        <th>{!!trans('item_mgr/item_in_stock.entry_unit')!!}</th>
                        
                        <th>{!!trans('item_mgr/item_in_stock.entry_purchase_qty')!!}</th>
                        <th>{!!trans('item_mgr/item_in_stock.entry_adjust_qty')!!}</th>
                        <th>{!!trans('item_mgr/item_in_stock.entry_sale_qty')!!}</th>
                        <th>{!!trans('item_mgr/item_in_stock.entry_transfer_qty')!!}</th>
                        <th>{!!trans('item_mgr/item_in_stock.entry_begin_balance')!!}</th>
                        <!-- <th>{!!trans('item_mgr/item_in_stock.entry_balance')!!}</th> -->
                      </tr>
                    </thead>
                    <tbody>
                    
                      @foreach($ItemInStocks as $row)
                        <tr>
                          <td>{{$row->item_code}}</td>
                          <td>{{$row->item_name}}</td>
                          <td>{{$row->unit}}</td>
                          
                          <td>{{floatval($row->purchase_qty)}}</td>
                          <td>{{floatval($row->adjust_qty)}}</td>
                          <td>{{floatval($row->sale_qty)+floatval($row->sale_order_qty)}}</td>
                          <td>{{floatval($row->transfer_qty)}}</td>
                          <td>{{(floatval($row->purchase_qty)+floatval($row->adjust_qty))-(floatval($row->sale_qty)+floatval($row->sale_order_qty)+floatval($row->transfer_qty))}}</td>
                          <!-- <td></td> -->
                        </tr>
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

  <script type="text/javascript">
    // autocompleteGetItem
    function autocompleteGetItem(attribute_row) {
      $('input[name=\'item_attribute[' + attribute_row + '][item_id]\']').autocomplete({
        'source': function(request, response) {
          $.ajax({
            url: '{{url('')}}/admin/getItem?filter_name='+request,
            dataType: 'json',
            success: function(json) {
              response($.map(json, function(item) {
                return {
                  label: item.name,
                  value: item.id
                }
              }));
            }
          });
        },
        'select': function(item) {
          $('input[name=\'item_attribute[' + attribute_row + '][item_id]\']').val(item['label']);
          $('input[name=\'item_attribute_hidden[' + attribute_row + '][item_id]\']').val(item['value']);
        }
      });
    }
  </script>

@endsection
