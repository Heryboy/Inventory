@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
        @include('admin.stock_mgr.actual_stock.sidebar')
        <!-- include('admin.stock_mgr.actual_stock.form_purchase') -->
      </div>

      <!-- top navigation -->
      <div class="top_nav">
         <div class="nav_menu">
           <nav class="" role="navigation">
             <div class="nav toggle" style="margin-bottom:10px;">
               <a id="menu_toggle"><i class="fa fa-bars"></i></a>
             </div>
           </nav>
           {{-- @include("admin.common.advance_search") --}}
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
                    <h2><i class="fa fa-wa fa-flag"></i> {!!trans('stock_mgr/actual_stock.entry_title')!!}</h2>
                    <div class="-row">
                      <span class="pull-right">
                        <div class="btn-group pull-left">
                          <button form-id="form-actual-stock" data-toggle="tooltip" type="submit" data-placement="top" class="btn btn-sm btn-success" name="submit"><i class="fa fa-wa fa-cogs"></i> Generate</button>
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
                    
                    {!! Form::open(['url' => 'admin/stock_mgr/actual_stock','id'=>'form-actual-stock','files'=> true,'class'=>'form-horizontal']) !!}
                      <!-- search-filter -->
                      @include("admin.stock_mgr.actual_stock.filter")
                      <table id="_example1" class="table table-bordered table-striped dataTable">

                        <thead>
                          <tr>
                            <th>{!!trans('stock_mgr/actual_stock.entry_item_list')!!}</th>
                            <th>{!!trans('stock_mgr/actual_stock.entry_item_code')!!}</th>
                            <th>{!!trans('stock_mgr/actual_stock.entry_unit')!!}</th>
                            <th>{!!trans('stock_mgr/actual_stock.entry_qty')!!}</th>
                          </tr>
                        </thead>

                        <tbody>
                        
                          <?php $i = 1;?>
                          @if(isset($actual_stock_items))
                            @foreach ($actual_stock_items as $stock_item)
                                <tr>
                                  <td>{{ $stock_item->item_name }}<input type="hidden" value="{{$stock_item->item_id}}" name="item_id[]"/></td>
                                  <td>{{ $stock_item->item_code }}</td>
                                  <td>{{ $stock_item->unit }} <input type="hidden" value="{{$stock_item->unit_id}}" name="unit_id[]"/></td>
                                  <td>
                                    <input style="width: 150px;" placeholder="Quantity" type="number" name="qty[]" class="form-control" value="{{ $stock_item->hello }}">
                                  </td>
                                </tr>
                               <?php $i++; ?>
                            @endforeach
                          @endif
                        
                        </tbody>
                      </table>
                    {!! Form::close() !!}
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
