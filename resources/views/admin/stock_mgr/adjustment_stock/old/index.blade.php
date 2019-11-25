@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
        @include('admin.stock_mgr.adjustment_stock.sidebar')
        <!-- include('admin.stock_mgr.adjustment_stock.form_purchase') -->
      </div>

      <!-- top navigation -->
      <div class="top_nav">
         <div class="nav_menu">
           <nav class="" role="navigation">
             <div class="nav toggle" style="margin-bottom:10px;">
               <a id="menu_toggle"><i class="fa fa-bars"></i></a>
             </div>
           </nav>
           @include("admin.common.advance_search")
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
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('stock_mgr/adjustment_stock.entry_title')!!}</h2>
                  <div class="-row">
                    <span class="pull-right">
                      <div class="btn-group pull-left">
                        <a data-toggle="modal" data-target=".bs-example-modal-lg"  data-toggle="tooltip" type="button" data-placement="top" href="javascript:void(0);" class="btn btn-sm btn-success" name="submit"><i class="fa fa-wa fa-save"></i> {!!trans('stock_mgr/adjustment_stock.entry_save')!!}</a>
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
                  <!-- search-filter -->
                  @include("admin.stock_mgr.adjustment_stock.filter")
                  <table id="example1" class="table table-bordered table-striped dataTable">

                    <thead>
                      <tr>
                        <th>{!!trans('stock_mgr/adjustment_stock.entry_item_list')!!}</th>
                        <th>{!!trans('stock_mgr/adjustment_stock.entry_unit')!!}</th>
                        <th>{!!trans('stock_mgr/adjustment_stock.entry_adjust_add')!!}</th>
                        <th>{!!trans('stock_mgr/adjustment_stock.entry_adjust_substract')!!}</th>
                        <th>{!!trans('stock_mgr/adjustment_stock.entry_adjust_by')!!}</th>
                        <th>{!!trans('stock_mgr/adjustment_stock.entry_remark')!!}</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    
                      <?php $i = 1;?>
                      @if(isset($adjustment_stock_items))
                        @foreach ($adjustment_stock_items as $stock_item)
                            <tr>
                              <td>{{ $stock_item->item_name }}</td>
                              <td>{{ $stock_item->unit }}</td>
                              <td><center><input type="text" placeholder="{!!trans('stock_mgr/adjustment_stock.entry_adjust_add')!!}" value="0" class="form-control" name=""></center></td>
                              <td><center><input type="text" placeholder="{!!trans('stock_mgr/adjustment_stock.entry_adjust_substract')!!}" value="0" class="form-control" name=""></center></td>
                              <td><center><input type="text" placeholder="{!!trans('stock_mgr/adjustment_stock.entry_adjust_by')!!}" value="0" class="form-control" name=""></center></td>
                              <td><center><input type="text" placeholder="{!!trans('stock_mgr/adjustment_stock.entry_remark')!!}" value="0" class="form-control" name=""></center></td>
                            </tr>
                           <?php $i++; ?>
                        @endforeach
                      @endif
                    
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
  <!-- </form> -->

@endsection
