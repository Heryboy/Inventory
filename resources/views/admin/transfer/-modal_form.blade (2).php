@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
 
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
     @include('admin.common.sidebar')
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
    <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="row">
            <div class="col-sm-12">
              <div class="x_panel">
                <div class="x_title">
                  <div class="-row">
                    <h2><i class="fa fa-wa fa-flag"></i> {!!trans('transfer/transfer.transfer_list')!!}</h2>
                    <div class="-row">
                      <span class="pull-right">
                        <a data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" href='{{url('admin/transfer/transfer_list')}}' class="btn btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> <span class="hidden-xs">{!! trans('common.create') !!}</span></a>
                      </span>
                    </div>
                    <!-- include('admin.common.tool_box') -->
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- row -->
            <div class="-row">
              <div class="col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="row">
                      <!-- wel -->
                      <div class="well" style="overflow: auto">
                        <div class="col-sm-3 form-group">
                          <div style="cursor: pointer;">
                            <input class="col-sm-3 form-control has-feedback-left" id="inputSuccess2" placeholder="Transferor" type="text">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                          </div>
                        </div>

                        <div class="col-sm-3 form-group">
                          <div style="cursor: pointer;">
                            <input class="col-sm-3 form-control has-feedback-left" id="inputSuccess2" placeholder="Transfer No" type="text">
                            <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                          </div>
                        </div>

                        <div class="col-sm-3 form-group">
                          <div style="cursor: pointer;">
                            <input class="col-sm-3 form-control has-feedback-left" id="inputSuccess2" placeholder="Transfer From" type="text">
                            <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                          </div>
                        </div>

                        <div class="col-sm-3 form-group">
                          <div style="cursor: pointer;">
                            <input class="col-sm-6 form-control has-feedback-left" id="inputSuccess2" placeholder="Transfer To" type="text">
                            <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                          </div>
                        </div>

                        <div class="col-sm-3">
                          <div style="cursor: pointer;">
                            <input class="col-sm-6 form-control has-feedback-left" id="inputSuccess2" placeholder="Item Category" type="text">
                            <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                          </div>
                        </div>

                        <div class="col-sm-1">
                          <div style="cursor: pointer;">
                            <button class="btn btn-success btn-md"><i class="fa fa-wa fa-search"></i> Filter</button>
                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- <table class="table table-bordered table-striped responsive-utilities jambo_table"> -->
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Transfer No</th>
                          <th>Branch</th>
                          <th>Transfer From</th>
                          <th>Transfer To</th>
                          <th>Is Received?</th>
                          <th>Is transferd?</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- transfer data -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('admin.common.footer')
        <!-- /footer content -->

      </div>
    <!-- /page content -->
  </div>
@endsection
