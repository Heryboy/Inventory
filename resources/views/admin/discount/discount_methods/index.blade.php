@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  <form novalidate="" action="#" id="demo-form2" data-parsley-validate="" class="">
    
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
       @include('admin.discount.discount_permission.sidebar')
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
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('discount/discount_method.entry_title')!!}</h2>
                  <div class="row">
                    {{-- <span class="pull-right">
                      <a data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" href='{{url('admin/discount/discount_method/create')}}' class="btn btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> <span class="hidden-xs">{!! trans('common.create') !!}</span></a>
                    </span> --}}
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
                        <th>{!!trans('discount/discount_method.no')!!}</th>
                        <th>{!!trans('discount/discount_method.abbr')!!}</th>
                        <th>{!!trans('discount/discount_method.name')!!}</th>
                        <th>{!!trans('common.action')!!}</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php $i = 1;?>
                      @foreach ($discount_methods as $row)
                        <tr>
                          <td><?php echo($i); ?></td>
                          <td>{{ $row->abbr }}</td>
                          <td>{{ $row->name }}</td>
                          <td>
                            <center>
                              <a href="{{route('admin.discount.discount_permission.show',$row->id)}}" class="btn btn-xs btn-info" data-original-title="{!! trans('discount/discount_method.show') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-info"></i></a>                         
                              <a href="{{route('admin.discount.discount_permission.edit',$row->id)}}" class="btn btn-xs btn-primary" data-original-title="{!! trans('discount/discount_method.edit') !!}" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                              <a href="{{route('admin.discount.discount_permission.destroy',$row->id)}}" class="btn btn-xs btn-danger" title="{!!trans('discount/discount_method.delete')!!}" data-method="delete" data-confirm="{!!trans('discount/discount_method.are_you_sure')!!}" data-original-title="{!! trans('discount/discount_method.delete') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
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
