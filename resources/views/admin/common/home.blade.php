@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  <!-- main-container -->
  <div class="main_container" id="main_container" style="background-color:#f4f4f4;">
    <!-- page content -->
    <div role="main"> 
      <div class="nav_menu">
        <nav class="" role="navigation">
          <div class="nav toggle padding-bottom-sm">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <div class="pull-right padding-bottom-sm">
            @include('admin.common.action_top')
          </div> 
        </nav>
      </div>

      <div class="container-fluid" style="padding:20px;min-height:100vh;">
        <!-- row top_tiles -->
        <div class="row top_tiles">
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-users"></i>
              </div>
              <div class="count">{{$customers}}</div>
              <h3>Customers</h3>
              <p> <a href="{{url('admin/customer_mgr/customer')}}">View more customers ...</a></p>
            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-cubes"></i>
              </div>
              <div class="count">{{$suppliers}}
              </div>
              <h3>Suppliers</h3>
              <p><a href="{{url('admin/supplier_mgr/supplier')}}">View More Suppliers ...</a></p>
            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-edit"></i></div>
              <div class="count">{{$items}}</div>
              <h3>Items</h3>
              <p> <a href="{{url('admin/setup_mgr/item')}}">View More Items ...</a></p>
            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-line-chart"></i>
              </div>
              <div class="count">
                {{$quotations}}
              </div>
              <h3>Quotations</h3>
              <p><a href="{{url('admin/quotation')}}">View More Quotations ...</a></p>
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
@endsection