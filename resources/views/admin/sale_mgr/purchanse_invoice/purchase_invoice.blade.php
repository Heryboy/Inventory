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
            <div class="x_panel">
              <div class="x_title">
                <div class="row">
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('quotation/quotation.entry_quotation_list')!!}</h2>
                  <div class="row">
                    <span class="pull-right">
                      <button type="button" class="btn btn-success btn-sm"><i class="fa fa-wa fa-home"></i> Main Branch</button>
                    </span>
                  </div>
                  <!-- include('admin.common.tool_box') -->
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>

            <!-- row -->
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <!-- <div class="x_title">
                    <div class="row">
                      <form class="form-horizontal form-label-left">
                        <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-12"><i class="fa fa fa-th-large"></i> Item Category</label>
                          <div class="col-md-8 col-sm-8 col-xs-12">
                            <input class="form-control" placeholder="Item Category" type="text">
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="clearfix"></div>
                  </div> -->

                  <div class="x_title">
                    <div class="row">
                      <div class="-pull-right">
                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                          <select class="form-control" name="branch">
                            <option value="">--All Branch--</option>
                          </select>
                          <!-- <input class="form-control" id="inputSuccess2" placeholder="Item Category" type="text"> -->
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                          <input class="form-control has-feedback-left" id="inputSuccess2" placeholder="From Date" type="text">
                          <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                          <input class="form-control has-feedback-left" id="inputSuccess2" placeholder="To Date" type="text">
                          <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                        </div>

                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- content -->
                        <!-- ############# -->
                        <!-- Table row -->
                        <div class="row">
                          <div class="col-xs-12 table">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Qty</th>
                                  <th>Product</th>
                                  <th>Serial #</th>
                                  <th style="width: 59%">Description</th>
                                  <th>Subtotal</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>Call of Duty</td>
                                  <td>455-981-221</td>
                                  <td>El snort testosterone trophy driving gloves handsome gerry Richardson helvetica tousled street art master testosterone trophy driving gloves handsome gerry Richardson
                                  </td>
                                  <td>$64.50</td>
                                </tr>
                                <tr>
                                  <td>1</td>
                                  <td>Need for Speed IV</td>
                                  <td>247-925-726</td>
                                  <td>Wes Anderson umami biodiesel</td>
                                  <td>$50.00</td>
                                </tr>
                                <tr>
                                  <td>1</td>
                                  <td>Monsters DVD</td>
                                  <td>735-845-642</td>
                                  <td>Terry Richardson helvetica tousled street art master, El snort testosterone trophy driving gloves handsome letterpress erry Richardson helvetica tousled</td>
                                  <td>$10.70</td>
                                </tr>
                                <tr>
                                  <td>1</td>
                                  <td>Grown Ups Blue Ray</td>
                                  <td>422-568-642</td>
                                  <td>Tousled lomo letterpress erry Richardson helvetica tousled street art master helvetica tousled street art master, El snort testosterone</td>
                                  <td>$25.99</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- ############### -->
                      </div>
                    </div>
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
