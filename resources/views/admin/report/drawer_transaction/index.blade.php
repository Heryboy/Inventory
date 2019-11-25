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
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('report/drawer_transaction.entry_title')!!}</h2>
                  <div class="clearfix"></div>
                </div>
              </div>
              {{-- filter --}}
              @include("admin.report.drawer_transaction.filter")

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                        <td>{!!trans('report/drawer_transaction.entry_no')!!}</td>
                        <th>{!!trans('report/drawer_transaction.entry_work_shift')!!}</th>
                        <th>{!!trans('report/drawer_transaction.entry_open_by')!!}</th>
                        <th>{!!trans('report/drawer_transaction.entry_close_by')!!}</th>
                        <th>{!!trans('report/drawer_transaction.entry_open_amount')!!}</th>
                        <th>{!!trans('report/drawer_transaction.entry_close_amount')!!}</th>
                        <th>{!!trans('report/drawer_transaction.entry_actual_amount')!!}</th>
                        <th>{!!trans('report/drawer_transaction.entry_open_date')!!}</th>
                        <th>{!!trans('report/drawer_transaction.entry_close_date')!!}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      @foreach($drawerTransactions as $row)
                        <tr>
                          <td>{{ $i }}</td>
                          <td>{{ $row->workshift }}</td>
                          <td>{{ $row->open_by_user }}</td>
                          <td>{{ $row->close_by_user }}</td>
                          <td>{{ $row->open_amount }}</td>
                          <td>{{ $row->close_amount }}</td>
                          <td>{{ $row->actual_amount }}</td>
                          <td>{{ $row->open_date }}</td>
                          <td>{{ $row->close_date }}</td>
                        </tr>
                        <?php $i ++ ;?>
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
