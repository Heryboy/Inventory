@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
 
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
     @include('admin.sale_mgr.return.sidebar')
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
              
              @include('admin.common.error_input')
              @include('admin.common.message')

              <div class="x_title">
                <div class="row">
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('sale_mgr/return.entry_return_list')!!}</h2>
                  <div class="row">
                    <span class="pull-right">
                    <a data-original-title="{!!trans("sale_mgr/return.entry_new_transfer")!!}"  data-toggle="tooltip" type="button" data-placement="top" href='{{url('admin/sale_mgr/return/create')}}' class="btn btn-sm btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> {!!trans("sale_mgr/return.entry_new_transfer")!!}</a>
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

                  <div class="-x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- content -->
                        <!-- ############# -->
                        <!-- Table row -->
                        <div class="row">
                          <div class="col-xs-12">
                            {{-- @include("admin.sale_mgr.return.filter") --}}
                            <!-- <table class="table table-striped"> -->
                            <table id="example1" class="table table-bordered table-striped dataTable">
                              <thead>
                                <tr>
                                  <th>{!!trans('sale_mgr/return.entry_branch')!!}</th>
                                  <th>{!!trans('sale_mgr/return.entry_customer')!!}</th>
                                  <th>{!!trans('sale_mgr/return.entry_bill_no')!!}</th>
                                  <th>{!!trans('sale_mgr/return.entry_return_no')!!}</th>
                                  <th>{!!trans('sale_mgr/return.entry_return_date')!!}</th>
                                  <th>{!!trans('sale_mgr/return.entry_return_by')!!}</th>
                                  <th>{!!trans('sale_mgr/return.entry_action')!!}</th>
                                </tr>
                              </thead>
                              <tbody>
                                @if(isset($Return))
                                  @foreach($Return as $row)
                                    <tr>
                                      <td>{{$row->Branch->branch_name}}</td>
                                      <td>{{$row->Customer->name}}</td>
                                      <td>{{$row->bill_no}}</td>
                                      <td>{{$row->return_no}}</td>
                                      <td>{{$row->return_date}}</td>
                                      <td>{{$row->return_by}}</td>
                                      <td>
                                        <center>
                                          <a href="{{route('admin.sale_mgr.return.edit',$row->id)}}" class="btn btn-xs btn-success" data-original-title="{!! trans('setup_mgr/item.show') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-eye"></i></a>                         
                                          <a href="{{route('admin.sale_mgr.return.edit',$row->id)}}" class="btn btn-xs btn-primary" data-original-title="{!! trans('setup_mgr/item.edit') !!}" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                                          <!-- <a href="{{route('admin.sale_mgr.return.destroy',$row->id)}}" class="btn btn-xs btn-danger" title="{!!trans('setup_mgr/item.delete')!!}" data-method="delete" data-confirm="{!!trans('setup_mgr/item.are_you_sure')!!}" data-original-title="{!! trans('setup_mgr/item.delete') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a> -->
                                        </center>
                                      </td>
                                    </tr>
                                  @endforeach
                                @endif
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
