@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  @include('admin.setup_mgr.item_category._form')

  <form novalidate="" action="#" id="demo-form2" data-parsley-validate="" class="">
    
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
       @include('admin.setup_mgr.item_category._sidebar')
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
                  <h2><i class="fa fa-wa fa-users"></i> {!!trans('setup_mgr/item_category.entry_title')!!}</h2>
                  <div class="row">
                    <span class="pull-right">
                      <a data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/setup_mgr/item_category/create')}}" class="btn btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> <span class="hidden-xs">{!! trans('common.create') !!}</span></a>
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
                  <table id="example1" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr>
                        <th>{!!trans('setup_mgr/item_category.no')!!}</th>
                        <th>{!!trans('setup_mgr/item_category.item_category_name')!!}</th>
                        <th>{!!trans('setup_mgr/item_category.branch_name')!!}</th>
                        <th>{!!trans('common.action')!!}</th>
                      </tr>
                    </thead>
                    <tbody class="list-data">
                    
                    <?php $attribute_row = 1;?>
                      @foreach ($item_categories as $item_category)
                        <tr>
                          <td><?php echo($attribute_row); ?></td>
                          <td>{{ $item_category->item_category_name }}</td>
                          <td>{{ $item_category->Branch->branch_name }}</td>
                          <td>
                            <center>
                              <a href="{{route('admin.setup_mgr.item_category.show',$item_category->id)}}" class="btn btn-xs btn-info" data-original-title="{!! trans('setup_mgr/item_category.show') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-info"></i></a>                         
                              <a href="{{route('admin.setup_mgr.item_category.edit',$item_category->id)}}" class="btn btn-xs btn-primary" data-original-title="{!! trans('setup_mgr/item_category.edit') !!}" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                              <a href="{{route('admin.setup_mgr.item_category.destroy',$item_category->id)}}" class="btn btn-xs btn-danger" title="{!!trans('setup_mgr/item_category.delete')!!}" data-method="delete" data-confirm="{!!trans('setup_mgr/item_category.are_you_sure')!!}" data-original-title="{!! trans('setup_mgr/item_category.delete') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
                            </center>
                          </td>
                          
                        </tr>
                        
                       <?php $attribute_row++; ?>

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
