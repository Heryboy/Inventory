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
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('setup_mgr/pos_table.entry_title')!!}</h2>
                  <div class="row">
                    <span class="pull-right">
                      <a data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" href='{{url('admin/setup_mgr/pos_table/create')}}' class="btn btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> <span class="hidden-xs">{!! trans('common.create') !!}</span></a>
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
                        <th>{!!trans('setup_mgr/pos_table.entry_no')!!}</th>
                        <th>{!!trans('setup_mgr/pos_table.entry_outlet')!!}</th>
                        <th>{!!trans('setup_mgr/pos_table.entry_name')!!}</th>
                        <th>{!!trans('setup_mgr/pos_table.entry_pax')!!}</th>
                        <th>{!!trans('setup_mgr/pos_table.entry_status')!!}</th>
                        <th>{!!trans('common.action')!!}</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php $i = 1;?>
                      @foreach ($pos_tables as $pos_table)
                        <tr>
                          <td><?php echo($i); ?></td>
                          <td>{{ $pos_table->Outlet->name }}</td>
                          <td>{{ $pos_table->name }}</td>
                          <td>{{ $pos_table->pax }}</td>
                          <td>
                            @if($pos_table->status == 1)
                              <span class="label label-success">{!!trans('setup_mgr/pos_table.entry_active')!!}</span>
                            @else
                              <span class="label label-danger">{!!trans('setup_mgr/pos_table.entry_inactive')!!}</span>
                            @endif
                          </td>
                          <td>
                            <center>
                              <a href="{{route('admin.setup_mgr.pos_table.show',$pos_table->id)}}" class="btn btn-xs btn-info" data-original-title="{!! trans('setup_mgr/pos_table.entry_show') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-info"></i></a>                         
                              <a href="{{route('admin.setup_mgr.pos_table.edit',$pos_table->id)}}" class="btn btn-xs btn-primary" data-original-title="{!! trans('setup_mgr/pos_table.entry_edit') !!}" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                              <a href="{{route('admin.setup_mgr.pos_table.destroy',$pos_table->id)}}" class="btn btn-xs btn-danger" title="{!!trans('setup_mgr/pos_table.entry_delete')!!}" data-method="delete" data-confirm="{!!trans('setup_mgr/pos_table.entry_are_you_sure')!!}" data-original-title="{!! trans('setup_mgr/pos_table.entry_delete') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
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
