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
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('report/revenue_report.entry_sale_detail')!!}</h2>
                  <div class="clearfix"></div>
                </div>
              </div>
              {{-- filter --}}
              @include("admin.report.revenue_reports.sale_detail.filter")

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="_example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Branch</th>
                        <th>Code</th>
                        <th>Item Name</th>
                        <th>Sold QTY</th>
                        <th>Unit</th>
                        <th>Retail Price</th>
                        <th>Dis.On item</th>
                        <th>Total Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;?>
                      @foreach($SaleDetailReports as $row)
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$row->branch_name}}</td>
                          <td>{{$row->item_code}}</td>
                          <td>{{$row->item_name}}</td>
                          <td>{{$row->sold_qty}}</td>
                          <td>{{$row->unit_name}}</td>
                          <td>{{Helpers::FormatCurrentcy($row->retail_price)}}</td>
                          <td>{{$row->discount_amount}} %</td>
                          <td>{{Helpers::FormatCurrentcy($row->total_price)}}</td>
                        </tr>
                        <?php $i++;?>
                      @endforeach
                      
                    </tbody>
                    <tfoot>
                      <tr> 
                        <td colspan="7"></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>Sub Total</b></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{Helpers::FormatCurrentcy($GetCalculate->sub_total)}}</b></td>
                      </tr>
                      <tr> 
                        <td colspan="7"></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>Grand Total</b></td>
                        <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{Helpers::FormatCurrentcy($GetCalculate->grand_total)}}</b></td>
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
