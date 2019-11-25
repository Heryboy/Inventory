@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  <form action="#" novalidate="" action="#" id="demo-form2" data-parsley-validate="" class="">
    
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
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('report/sale_item.entry_title')!!}</h2>
                  <div class="clearfix"></div>
                </div>
              </div>
              {{-- filter --}}
              @include("admin.report.sale_item.filter")

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                        <td>{!!trans('report/sale_item.entry_no')!!}</td>
                        <td>{!!trans('report/sale_item.entry_branch')!!}</td>
                        <th>{!!trans('report/sale_item.entry_code')!!}</th>
                        <th>{!!trans('report/sale_item.entry_name')!!}</th>
                        <th>{!!trans('report/sale_item.entry_unit')!!}</th>
                        <th>{!!trans('report/sale_item.entry_sale_qty')!!}</th>
                        <th>{!!trans('report/sale_item.entry_void_qty')!!}</th>
                        <th>{!!trans('report/sale_item.entry_discount')!!}</th>
                        <!-- <th>{!!trans('report/sale_item.entry_tax')!!}</th> -->
                        <th>{!!trans('report/sale_item.entry_gross_sale')!!}</th>
                        <th>{!!trans('report/sale_item.entry_net_sale')!!}</th>
                        <!-- <th>{!!trans('report/sale_item.entry_cost_of_goods')!!}</th> -->
                        <th>{!!trans('report/sale_item.entry_margin')!!}</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                    @foreach($saleItems as $row)
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$row->branch_name}}</td>
                        <td>{{$row->item_code}}</td>
                        <td>{{$row->item_name}}</td>
                        <td>{{$row->unit}}</td>
                        <td>{{$row->sale_qty}}</td>
                        <td>{{$row->void_qty}}</td>
                        <td>{{$row->discount_amount}}</td>
                        <td>{{$row->grand_total}}</td>
                        <td>{{floatval($row->grand_total) - ( floatval($row->discount_amount))}}</td>
                        <!-- <td>$row->total_cost_price}}</td> -->
                        <td>
                          {{'0'}}
                        </td>
                      </tr>
                      <?php $i++; ?>
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
