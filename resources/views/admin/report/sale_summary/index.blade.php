@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  <form action="#" novalidate="" id="demo-form2" data-parsley-validate="" class="">
    
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
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('report/summary_report.entry_title')!!}</h2>
                  <div class="clearfix"></div>
                </div>
              </div>
              {{-- filter --}}
              @include("admin.report.sale_summary.filter")
              <!-- row -->
              <div style="padding-top:10px;">
                <center>
                  <?php 
                    $total_gross_sale = 0;
                    $total_discount = 0;
                    $total_netsale = 0;
                    $total_cost_product = 0;
                    $total_gross_profit = 0;
                    $total_tax = 0;
                    $total_margin = 0;
                  ?>
                  @foreach($summaryReports as $row)
                    <?php 
                      $total_gross_sale += number_format($row->sub_total_amount, 3);
                      $total_discount += number_format($row->total_discount, 3);
                      $total_netsale += number_format(($row->sub_total_amount - $row->total_discount), 3);
                      $total_cost_product += number_format($row->total_cost_amount, 3);
                      $total_gross_profit += number_format(($row->sub_total_amount - $row->total_cost_amount), 3);
                      $total_tax += number_format($row->total_tax_amount, 3);
                      $total_margin += number_format(($row->sub_total_amount - $row->total_cost_amount), 3);
                    ?>
                  @endforeach
                  <!-- row top_tiles -->
                  <div class="row top_tiles">
                    <div class="animated flipInY col-sm-3 col-xs-12">
                      <div class="tile-stats">
                        <!-- <div class="icon"><i class="fa fa-users"></i></div> -->
                        <div class="count"><center>{{ number_format($total_gross_sale, 3) }} $</center></div>
                        <center><h4>Gross Sales</h4></center>
                        <!-- <p> <a href="{{url('admin/customer_mgr/customer')}}">View more customers ...</a></p> -->
                      </div>
                    </div>
                    
                    <div class="animated flipInY col-sm-3 col-xs-12">
                      <div class="tile-stats">
                        <!-- <div class="icon"><i class="fa fa-users"></i></div> -->
                        <div class="count"><center>{{ number_format($total_discount, 3) }} $</center></div>
                        <center><h4>Discounts</h4></center>
                        <!-- <p> <a href="{{url('admin/customer_mgr/customer')}}">View more customers ...</a></p> -->
                      </div>
                    </div>

                    <div class="animated flipInY col-sm-3 col-xs-12">
                      <div class="tile-stats">
                        <!-- <div class="icon"><i class="fa fa-users"></i></div> -->
                        <div class="count"><center>{{ number_format($total_netsale, 3) }} $</center></div>
                        <center><h4>Net Sales</h4></center>
                        <!-- <p> <a href="{{url('admin/customer_mgr/customer')}}">View more customers ...</a></p> -->
                      </div>
                    </div>

                    <div class="animated flipInY col-sm-3 col-xs-12">
                      <div class="tile-stats">
                        <!-- <div class="icon"><i class="fa fa-users"></i></div> -->
                        <div class="count"><center>{{ number_format($total_gross_profit, 3) }} $</center></div>
                        <center><h4>Gross Profit</h4></center>
                        <!-- <p> <a href="{{url('admin/customer_mgr/customer')}}">View more customers ...</a></p> -->
                      </div>
                    </div>

                    <div class="animated flipInY col-sm-3 col-xs-12">
                      <div class="tile-stats">
                        <!-- <div class="icon"><i class="fa fa-users"></i></div> -->
                        <div class="count"><center>{{ number_format($total_tax, 3) }} $</center></div>
                        <center><h4>Taxes</h4></center>
                        <!-- <p> <a href="{{url('admin/customer_mgr/customer')}}">View more customers ...</a></p> -->
                      </div>
                    </div>
                  </center>
                </div>
              </div>

              <!--start-summary-->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="_example1" class="table table-bordered table-striped dataTable">
                      <thead>
                        <tr>
                          <th>{{'Date'}}</th>
                          <th>{{'Gross Sale'}}</th>
                          <th>{{'Discounts'}}</th>
                          <th>{{'Net Sales'}}</th>
                          <th>{{'Cost Of Product'}}</th>
                          <th>{{'Gross Profit'}}</th>
                          <th>{{'Taxes'}}</th>
                          <th>{{'Margin'}}</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                          @foreach($summaryReports as $row)
                            <tr>
                              <td>{{ $row->date }}</td>
                              <td>{{ number_format($row->sub_total_amount, 3) }}</td>
                              <td>{{ number_format($row->total_discount, 3) }}</td>
                              <td>{{ number_format(($row->sub_total_amount - $row->total_discount), 3) }}</td>
                              <td>{{ number_format($row->total_cost_amount, 3) }}</td>
                              <td>{{ number_format(($row->sub_total_amount - $row->total_cost_amount), 3) }}</td>
                              <td>{{ number_format($row->total_tax_amount, 3) }}</td>
                              <td>{{ number_format(($row->sub_total_amount - $row->total_cost_amount), 3) }}</td>
                            </tr>
                          @endforeach
                      </tbody>
                      <tfoot>
                        <tr> 
                          <td style="text-align: right; font-size:16px;background-color:#5c5c5c;color:#fff;"><b>Total: </b></td>
                          <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{number_format($total_gross_sale, 3)}}</b> <span class="pull-right">$</span></td>
                          <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{number_format($total_discount, 3)}}</b></b> <span class="pull-right">$</span></td>
                          <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{number_format($total_netsale, 3)}}</b></b> <span class="pull-right">$</span></td>
                          <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{number_format($total_cost_product, 3)}}</b></b> <span class="pull-right">$</span></td>
                          <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{number_format($total_gross_profit, 3)}}</b></b> <span class="pull-right">$</span></td>
                          <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{number_format($total_tax, 3)}}</b></b> <span class="pull-right">$</span></td>
                          <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{number_format($total_margin, 3)}}</b></b> <span class="pull-right">$</span></td>
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
