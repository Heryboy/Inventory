@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  <form novalidate="" action="#" id="demo-form2" data-parsley-validate="" class="">
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
      <div style="min-height: 650px;" class="right_col" role="main">
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            @include('admin.common.message')
            <div class="x_panel">
              <div class="x_title">
                <div class="row">
                  <h2><i class="fa fa fa-th-large"></i> {!!trans('store/main_store.entry_title')!!}</h2>
                  <div class="clearfix"></div>
                </div>
              </div>

              <!-- row -->
              <div class="row">
              	<div class="col-sm-12">

                	<!-- Main content -->
					        <section class="content">

					          <div class="row">
                      @foreach($branches as $branch)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="success-box">
                            <span class="info-box-icon bg-aqua"><i class="fa fa fa fa-th-large"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text">{{$branch->branch_name}}</span>
                              <span class="info-box-number">1,410</span>
                            </div><!-- /.info-box-content -->
                          </div><!-- /.info-box -->
                        </div><!-- /.col -->
                      @endforeach

					          </div><!-- /.row -->

					          <!-- =========================================================== -->
					        </section><!-- /.content -->

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
