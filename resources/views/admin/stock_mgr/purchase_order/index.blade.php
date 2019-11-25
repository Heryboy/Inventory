@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
        @include('admin.stock_mgr.purchase_order.sidebar')
        @include('admin.stock_mgr.purchase_order.form_purchase')
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
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('stock_mgr/purchase_order.entry_title')!!}</h2>
                  <div class="-row">
                    <span class="pull-right">
                      <!-- <div class="btn-group">
                        <button type="button" class="btn btn-danger btn-sm">Action</button>
                        <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Action</a>
                          </li>
                          <li><a href="#">Another action</a>
                          </li>
                          <li><a href="#">Something else here</a>
                          </li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a>
                          </li>
                        </ul>
                      </div> -->
                      <div class="btn-group pull-left">
                        <a data-toggle="modal" data-target=".bs-example-modal-lg"  data-toggle="tooltip" type="button" data-placement="top" href="javascript:void(0);" class="btn btn-sm btn-default" name="submit"><i class="fa fa-wa fa-plus"></i> {!! trans('common.create') !!}</a>
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
                  @include("admin.setup_mgr.item.filter")
                  <table id="example1" class="table table-bordered table-striped dataTable">

                    <thead>
                      <tr>
                        <th><input type="checkbox" class="flat" name=""></th>
                        <th>{!!trans('stock_mgr/purchase_order.entry_invoice_no')!!}</th>
                        <th>{!!trans('stock_mgr/purchase_order.entry_supplier_name')!!}</th>
                        <th>{!!trans('stock_mgr/purchase_order.entry_issued_date')!!}</th>
                        <th>{!!trans('stock_mgr/purchase_order.entry_shipping')!!}</th>
                        <th>{!!trans('stock_mgr/purchase_order.entry_vat_amount')!!}</th>
                        <th>{!!trans('stock_mgr/purchase_order.entry_sub_total')!!}</th>
                        <th>{!!trans('stock_mgr/purchase_order.entry_grand_total')!!}</th>
                        <th>{!!"Is Approved"!!}?</th>
                        <th>{!!trans('stock_mgr/purchase_order.entry_action')!!}</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    
                      <?php $i = 1;?>
                      @if(isset($PurchaseOrders))
                        @foreach ($PurchaseOrders as $purchase_order)
                            <tr>
                              <td><input type="checkbox" class="flat" name=""></td>
                              <td>{{ $purchase_order->po_number }}</td>
                              <td>{{ $purchase_order->supplier_name }}</td>
                              <td>{{ Helpers::FormatDate($purchase_order->po_date) }}</td>
                              <td>{{ $purchase_order->shipping }}</td>
                              <td>{{ $purchase_order->vat_amount }}</td>
                              <td>{{ $purchase_order->sub_total }}</td>
                              <td>{{ $purchase_order->sub_total }}</td>
                              <td>
                                @if($purchase_order->is_approve == 1)
                                  {{"Yes"}}
                                @else
                                  {{"No"}}
                                @endif
                              </td>
                              <td>
                                <center>
                                  <a href="{{route('admin.stock_mgr.purchase_order.show',$purchase_order->id)}}" class="btn btn-xs btn-success" data-original-title="{!! trans('stock_mgr/purchase_order.entry_show') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-eye"></i></a>                         
                                  <a href="{{route('admin.stock_mgr.purchase_order.edit',$purchase_order->id)}}" class="btn btn-xs btn-primary" data-original-title="{!! trans('stock_mgr/purchase_order.entry_edit') !!}" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                                  <!-- <a href="{{route('admin.stock_mgr.purchase_order.destroy',$purchase_order->id)}}" class="btn btn-xs btn-danger" title="{!!trans('stock_mgr/purchase_order.entry_delete')!!}" data-method="delete" data-confirm="{!!trans('stock_mgr/purchase_order.are_you_sure')!!}" data-original-title="{!! trans('stock_mgr/purchase_order.entry_delete') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a> -->
                                </center>
                              </td>
                             
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
