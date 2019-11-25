@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  
  @include('admin.setup_mgr.item.modal_form')

  <!-- <form novalidate="" action="#" id="demo-form2" data-parsley-validate="" class=""> -->
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
        @include('admin.setup_mgr.item.sidebar')
      </div>

      <!-- top navigation -->
      <div class="top_nav">
         <div class="nav_menu">
           <nav class="" role="navigation">
             <div class="nav toggle" style="margin-bottom:10px;">
               <a id="menu_toggle"><i class="fa fa-bars"></i></a>
             </div>
           </nav>
           {{-- @include("admin.common.advance_search") --}}
         </div>
      </div><!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            @include('admin.common.message')
            <div class="x_panel">
              <div class="row">
                <div class="x_title">
                  <h2><i class="fa fa-wa fa-flag"></i> {!!trans('setup_mgr/item.entry_title')!!}</h2>
                  <div class="-row">
                    <span class="pull-right">
                       {{-- <div class="dropdown pull-left">
                        <button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Action
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#">HTML</a></li>
                          <li><a href="#">CSS</a></li>
                          <li><a href="#">JavaScript</a></li>
                        </ul>
                      </div> --}}
                      <!-- <div class="btn-group">
                        <button type="button" class="btn btn-danger btn-sm">Action</button>
                        <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Action</a>
                          </li>
                          <li><a href="#">Another action</a>
                          </li>
                          <li><a href="#">Something else here</a>
                          </li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a>
                          </li>
                        </ul>
                      </div> -->
                      <div class="btn-group pull-left">
                        <a data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" type="button" data-placement="top" href='{{url('admin/setup_mgr/item/create')}}' class="btn btn-sm btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> {!! trans('common.create') !!}</a>
                        <!-- <a data-original-title="{!! trans('common.create') !!}"  data-toggle="modal" data-target=".bs-example-modal-lg" type="button" data-placement="top" href='javascript:void(0);' class="btn btn-sm btn-default" name="submit"><i class="fa fa-wa fa-plus"></i> {!! trans('common.create') !!}</a> -->
                      </div>
                      
                    </span>

                    <span class="pull-right">
                    </span>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content padding-top">
                  <!-- search-filter -->
                  <!-- include("admin.setup_mgr.item.filter") -->
                  <table id="example1" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr>
                        <th><input type="checkbox" class="flat" name=""></th>
                        <th>{!!trans('setup_mgr/item.item_name')!!}</th>
                        <th>Item Code</th>
                        <th>{!!trans('setup_mgr/item.item_category')!!}</th>
                        <th>{!!trans('setup_mgr/item.item_sub_category')!!}</th>
                        <th>{!!trans('setup_mgr/item.item_type')!!}</th>
                        <!-- <th>{!!trans('setup_mgr/item.item_status')!!}</th> -->
                        <th>{!!trans('common.action')!!}</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php $i = 1;?>
                      @foreach ($items as $item)
                        <tr>
                          <td><input type="checkbox" class="flat" name=""></td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->item_code }}</td>
                          <td>{{ $item->item_cat_name }}</td>
                          <td>{{ $item->item_sub_catName }}</td>
                          <td>{{ $item->item_type_name }}</td>
                          <!-- <td>{{ $item->item_status_name }}</td> -->
                          <td>
                            <center>
                              <a href="{{route('admin.setup_mgr.item.show',$item->id)}}" class="btn btn-xs btn-success" data-original-title="{!! trans('setup_mgr/item.show') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-eye"></i></a>                         
                              <a href="{{route('admin.setup_mgr.item.edit',$item->id)}}" class="btn btn-xs btn-primary" data-original-title="{!! trans('setup_mgr/item.edit') !!}" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                              <a href="{{route('admin.setup_mgr.item.destroy',$item->id)}}" class="btn btn-xs btn-danger" title="{!!trans('setup_mgr/item.delete')!!}" data-method="delete" data-confirm="{!!trans('setup_mgr/item.are_you_sure')!!}" data-original-title="{!! trans('setup_mgr/item.delete') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
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
  <!-- </form> -->

  <script type="text/javascript">
    // Category
    $('input[name=\'catTest\']').autocomplete({
      'source': function(request, response) {
        // console.log(request);
        $.ajax({
          url: '{{url('')}}/admin/getItem?filter_name=' +  encodeURIComponent(request),
          dataType: 'json',
          success: function(json) {
            response($.map(json, function(item) {
              console.log(item);
              return {
                label: item['name'],
                value: item['id']
              }
            }));
          }
        });
      },
      'select': function(item) {
        $('input[name="catTest"]').val(item['label']);
        // $('#item_data').val(item['value']);
      }
    });

    // filter_item_cat
    $('input[name=\'filter_item_cat\']').autocomplete({
      'source': function(request, response) {
        // console.log(request);
        $.ajax({
          url: '{{url('')}}/admin/getItemCategory?filter_name=' +  encodeURIComponent(request),
          dataType: 'json',
          success: function(json) {
            response($.map(json, function(item) {
              console.log(item);
              return {
                label: item['name'],
                value: item['id']
              }
            }));
          }
        });
      },
      'select': function(item) {
        $('input[name="filter_item_cat"]').val(item['label']);
        // $('#item_data').val(item['value']);
      }
    });

    // filter_item_type
    $('input[name=\'filter_item_type\']').autocomplete({
      'source': function(request, response) {
        // console.log(request);
        $.ajax({
          url: '{{url('')}}/admin/getItemType?filter_name=' +  encodeURIComponent(request),
          dataType: 'json',
          success: function(json) {
            response($.map(json, function(item) {
              console.log(item);
              return {
                label: item['name'],
                value: item['id']
              }
            }));
          }
        });
      },
      'select': function(item) {
        $('input[name="filter_item_type"]').val(item['label']);
        // $('#item_data').val(item['value']);
      }
    });

    // filter_item_name
    $('input[name=\'filter_item_name\']').autocomplete({
      'source': function(request, response) {
        // console.log(request);
        $.ajax({
          url: '{{url('')}}/admin/getItemName?filter_name=' +  encodeURIComponent(request),
          dataType: 'json',
          success: function(json) {
            response($.map(json, function(item) {
              console.log(item);
              return {
                label: item['name'],
                value: item['id']
              }
            }));
          }
        });
      },
      'select': function(item) {
        $('input[name="filter_item_name"]').val(item['label']);
        // $('#item_data').val(item['value']);
      }
    });

  </script>

@endsection
