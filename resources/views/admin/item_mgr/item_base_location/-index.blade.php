@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  @include('admin.item_mgr.item_base_vendor.modal_form')
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
        <!-- row -->
        <div class="row">
          <!-- col-sm-4 -->
          <div class="col-sm-2">
            <div class="x_panel">
              <div class="x_content">
                <div class="row">
                  <div style="border-bottom:1px solid #eee;"><i class="fa fa-wa fa-users"></i> Vendor List</div>
                  <div>
                    <ul style="padding:6px;margin:0 10px;font-size:13px;">
                      <li><a href="">Vendor List</a></li>
                      <li><a href="">Search By Code</a></li>
                      <li><a href="">Search By Name</a></li>
                    </ul>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <!-- col-sm-4 -->
          <div class="col-sm-3">
            <div class="x_panel">
              <div class="x_content">
                <div class="row">
                  <div style="border-bottom:1px solid #eee;"><i class="fa fa-wa fa-list"></i> Item List</div>
                
                  <table class="table table-bordered table-striped responsive-utilities jambo_table">
                    <thead>
                      <th>Code</th>
                      <th>Name</th>
                    </thead>
                    <tbody>
                      
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                      <tr>
                        <td>00111</td>
                        <td>Caption lasdf asdf</td>
                      </tr>
                    </tbody>
                  </table>  
                
                </div>
              </div>
            </div>
          </div>

          <!-- col-md-8 col-xs-8 -->
          <div class="col-md-7 col-xs-7">
            <div class="x_panel">
              <!-- x_content -->
              <div class="x_content">
                <div style="border-bottom:1px solid #eee;"><i class="fa fa-wa fa-list"></i> History Price of Items</div>
                <fieldset style="margin-top:10px;">
                  <legend>Item Information</legend>
                    <div class="form-group">
                      <div class="col-sm-6">
                        <div class="col-sm-5">Item Code</div>
                        <div class="col-sm-6"><input placeholder="Item Code" type="text" placeholder="" name=""></div>
                      </div>
                      <div class="col-sm-6">
                        <div class="col-sm-5">Item Name</div>
                        <div class="col-sm-6"><input type="text" placeholder="Item Name" name=""></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-6">
                        <div class="col-sm-5">Vendor Code</div>
                        <div class="col-sm-6"><input placeholder="Vendor Code" type="text" placeholder="" name=""></div>
                      </div>
                      <div class="col-sm-6">
                        <div class="col-sm-5">Vendor Name</div>
                        <div class="col-sm-6"><input placeholder="Vendor Name" type="text" placeholder="" name=""></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                </fieldset>

                <fieldset style="margin-top:10px;">
                  <legend>Exchage Price</legend>
                    <div class="form-group">
                      <div class="col-sm-6">
                        <div class="col-sm-5">Price</div>
                        <div class="col-sm-6"><input type="text" placeholder="Price" name=""></div>
                      </div>
                      <div class="col-sm-6">
                        <div class="col-sm-5">Start Date</div>
                        <div class="col-sm-6"><input type="text" placeholder="Start Date" name=""></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    
                </fieldset>
                <div class="clearfix"></div>
                <div style="padding-top:10px;"></div>
                <div class="pull-left title-label">History Exchange Rate</div>
                <div class="pull-right">
                  <button class="btn btn-xs btn-success"><i class="fa fa-wa fa-save"></i> Save</button>
                  <button class="btn btn-xs btn-primary"><i class="fa fa-wa fa-plus"></i> New</button>
                  <button class="btn btn-xs btn-danger"><i class="fa fa-wa fa-trash"></i> Delete</button>
                </div>
                <table class="table table-bordered table-striped responsive-utilities jambo_table">
                <!-- <table id="example1" class="table table-bordered table-striped dataTable"> -->
                  <thead>
                    <tr>
                      <th><input type="checkbox" name=""></th>
                      <th>{!!trans('item_mgr/item_base_vendor.entry_item')!!}</th>
                      <th>{!!trans('item_mgr/item_base_vendor.entry_vendor')!!}</th>
                      <th>Price</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr class="even pointer">
                      <td><input type="checkbox" name=""></td>
                      <td>Store Name</td>
                      <td>Vendor Name</td>
                      <td>Store Name</td>
                      <td>Vendor Name</td>
                      <td>Store Name</td>
                    </tr>
                    
                  </tbody>
                </table>
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
