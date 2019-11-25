@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  <!-- <form novalidate="" method="patch" action="{{url('admin/setup_mgr/schedule/create')}}" id="demo-form2" data-parsley-validate="" class=""> -->
   
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
             <!-- block button -->
             <div class="pull-right" style="padding-top:10px;">
              
              <!-- <button type="submmit" value="Submit" data-toggle="tooltip" data-placement="top" href='{{url('admin/users/create')}}' class="btn btn-primary">{!! trans('common.create') !!}</button> -->

              <!-- action top -->
              
              <a data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" href='{{url('setup/sale/stock/item_category/create')}}' class="btn btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> <span class="hidden-xs">{!! trans('common.create') !!}</span></a>

              <!-- <a data-original-title="{!! trans('common.delete') !!}"  data-toggle="tooltip" data-placement="top" href='#' class="btn btn-danger" name="submit"><i class="fa fa-wa fa-trash"></i> <span class="hidden-xs">{!! trans('common.delete') !!}</span></a> -->

             </div> 
           </nav>
         </div>
      </div><!-- /top navigation -->
      <!-- page content -->
      <div style="min-height: 650px;" class="right_col" role="main">
        @include('admin.common.message')
        <div class="row">

          <div class="clearfix"></div>

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><i class="fa fa-group"></i>  {!! trans('setup_mgr/item_category.title') !!}</h2>
                @include('admin.common.tool_box')
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                      
                        <th>{!! trans('common.no') !!}</th>
                        <th>{!! trans('setup_mgr/item_category.name') !!}</th>
                                                            
                        <th>{!! trans('common.action') !!}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1;?>
                      @foreach ($item_category as $item_categories)
                        <tr>
                          <td><?php echo($i); ?></td>
                          <td>{{ $item_categories -> name }}</td>
                         
                          <td>
                            <a href="{{route('setup.sale.stock.item_category.show',$item_categories->id)}}" class="btn btn-sm btn-info" data-original-title="{!! trans('common.show') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-info"></i></a>
                            <a href="{{route('setup.sale.stock.item_category.edit',$item_categories->id)}}" class="btn btn-sm btn-primary" data-original-title="{!! trans('common.edit') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                            <a href="{{route('setup.sale.stock.item_category.destroy',$item_categories->id)}}" class="btn btn-sm btn-danger" data-original-title="{!! trans('common.delete') !!}"  data-toggle="tooltip" data-placement="top" data-method="delete" data-confirm="{!! trans('common.are_you_sure') !!}">
                              <i class="fa fa-trash"></i>
                            </a>
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

  <!-- </form> -->

@endsection
