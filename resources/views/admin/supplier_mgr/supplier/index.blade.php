@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  <form novalidate="" action="#" id="demo-form2" data-parsley-validate="" class="">
    
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
        @include('admin.supplier_mgr.supplier.sidebar')
        <!-- include('admin.stock_mgr.actual_stock.form_purchase') -->
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
                  <h2><i class="fa fa-wa fa-users"></i> {!!trans('supplier_mgr/supplier.entry_title')!!}</h2>
                  <div class="row">
                    <span class="pull-right">
                      <a data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" href='{{url('admin/supplier_mgr/supplier/create')}}' class="btn btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> <span class="hidden-xs">{!! trans('common.create') !!}</span></a>
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
                  {{-- <table id="example1" class="table table-bordered table-striped dataTable"> --}}
                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                        <th>{!!trans('supplier_mgr/supplier.no')!!}</th>
                        <th>{!!trans('supplier_mgr/supplier.supplier_name')!!}</th>
                        <th>{!!trans('supplier_mgr/supplier.branch_name')!!}</th>
                        <th>{!!trans('supplier_mgr/supplier.contact')!!}</th>
                        <th>{!!trans('common.action')!!}</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php $i = 1;?>
                      @foreach ($suppliers as $supplier)
                        <tr>
                          <td><?php echo($i); ?></td>
                          <td>{{ $supplier->name }}</td>
                          <td>{{ $supplier->Branch->branch_name }}</td>
                          <td>{{ $supplier->contact }}</td>
                          <td>
                            <center>
                              <a href="{{route('admin.supplier_mgr.supplier.show',$supplier->id)}}" class="btn btn-xs btn-info" data-original-title="{!! trans('supplier_mgr/supplier.show') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-info"></i></a>                         
                              <a href="{{route('admin.supplier_mgr.supplier.edit',$supplier->id)}}" class="btn btn-xs btn-primary" data-original-title="{!! trans('supplier_mgr/supplier.edit') !!}" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                              <a href="{{route('admin.supplier_mgr.supplier.destroy',$supplier->id)}}" class="btn btn-xs btn-danger" title="{!!trans('supplier_mgr/supplier.delete')!!}" data-method="delete" data-confirm="{!!trans('supplier_mgr/supplier.are_you_sure')!!}" data-original-title="{!! trans('supplier_mgr/supplier.delete') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
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
