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
                  <h2><i class="fa fa-wa fa-users"></i> {!!trans('supplier_mgr/vendor.entry_title')!!}</h2>
                  <div class="row">
                    <span class="pull-right">
                      <a data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" href='{{url('admin/vendor/create')}}' class="btn btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> <span class="hidden-xs">{!! trans('common.create') !!}</span></a>
                    </span>
                  </div>
                  <!-- include('admin.common.tool_box') -->
                  <div class="clearfix"></div>
                </div>
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                        <th>{!!trans('supplier_mgr/vendor.no')!!}</th>
                        <th>{!!trans('supplier_mgr/vendor.vendor_name')!!}</th>
                        <th>{!!trans('supplier_mgr/vendor.branch_name')!!}</th>
                        <th>{!!trans('supplier_mgr/vendor.contact')!!}</th>
                        <th>{!!trans('common.action')!!}</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php $i = 1;?>
                      @foreach ($vendors as $vendor)
                        <tr>
                          <td><?php echo($i); ?></td>
                          <td>{{ $vendor->vendor_name }}</td>
                          <td>{{ $vendor->Branch->branch_name }}</td>
                          <td>{{ $vendor->contact }}</td>
                          <td>
                            <center>
                              <a href="{{route('admin.vendor.show',$vendor->id)}}" class="btn btn-xs btn-info" data-original-title="{!! trans('supplier_mgr/vendor.show') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-info"></i></a>                         
                              <a href="{{route('admin.vendor.edit',$vendor->id)}}" class="btn btn-xs btn-primary" data-original-title="{!! trans('supplier_mgr/vendor.edit') !!}" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                              <!-- <a href="{{route('admin.vendor.destroy',$vendor->id)}}" class="btn btn-xs btn-danger" title="{!!trans('supplier_mgr/vendor.delete')!!}" data-method="delete" data-confirm="{!!trans('supplier_mgr/vendor.are_you_sure')!!}" data-original-title="{!! trans('supplier_mgr/vendor.delete') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a> -->
                            </center>
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
