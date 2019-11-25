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
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('report/item_information_report.entry_title')!!}</h2>
                  <div class="clearfix"></div>
                </div>
              </div>
              {{-- filter --}}
              @include("admin.report.item_information.filter")

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="example1" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr>
                        <th><input type="checkbox" class="flat" name=""></th>
                        <th>{!!trans('setup_mgr/item.item_name')!!}</th>
                        <th>{!!trans('setup_mgr/item.item_barcode')!!}</th>
                        <th>{!!trans('setup_mgr/item.item_code')!!}</th>
                        <th>{!!trans('setup_mgr/item.net_price')!!}</th>
                        <th>{!!trans('setup_mgr/item.cost')!!}</th>
                        <th>{!!trans('setup_mgr/item.retail_price')!!}</th>
                        <th>{!!trans('setup_mgr/item.item_category')!!}</th>
                        <th>{!!trans('setup_mgr/item.item_sub_category')!!}</th>
                        <th>{!!trans('setup_mgr/item.item_type')!!}</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php $i = 1;?>
                      @foreach ($items as $item)
                        <tr>
                          <td><input type="checkbox" class="flat" name=""></td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->item_barcode }}</td>
                          <td>{{ $item->item_code }}</td>
                          <td>{{ $item->net_price }}</td>
                          <td>{{ $item->cost }}</td>
                          <td>{{ $item->price }}</td>
                          <td>{{ $item->item_cat_name }}</td>
                          <td>{{ $item->item_sub_catName }}</td>               
                          <td>{{ $item->item_type_name }}</td>         
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
