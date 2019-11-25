@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
      @include('admin.item_mgr.item_base_location.sidebar')
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
        <!-- row -->
        <div class="row">
          <!-- col-md-8 col-xs-8 -->
          <div class="col-md-12 col-xs-12">
            <div class="x_panel">
              <!-- <div class="x_title">
                <h2><i class="fa fa-list"></i> Item Base Vendor</h2>
                <div class="clearfix"></div>
              </div> -->
              <div class="row">
                <div class="x_title">
                  <h2><i class="fa fa-wa fa-flag"></i> Item Base Location</h2>
                  <div class="-row">
                    <span class="pull-right">
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
                        <a data-original-title="{!! trans('item_mgr/item_base_location.assign') !!}"  data-toggle="tooltip" type="button" data-placement="top" href='{{url('admin/item_mgr/item_base_location/create')}}' class="btn btn-sm btn-primary" name="submit"><i class="fa fa-wa fa-pencil"></i> {!! trans('item_mgr/item_base_location.assign') !!}</a>
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
                  <table id="example1" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr>
                        <th>Branch</th>
                        <th>Location</th>
                        <th>Code</th>
                        <th>Item</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($ItemBaseLocations as $ItemBaseLocation)
                        <tr class="even pointer">
                          <td>{{$ItemBaseLocation->branch_name}}</td>
                          <td>{{$ItemBaseLocation->location_name}}</td>
                          <td>{{$ItemBaseLocation->item_code}}</td>
                          <td>{{$ItemBaseLocation->item_name}}</td>
                        </tr>
                      @endforeach
                    </tbody>

                  </table>
                  
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



  <script type="text/javascript">
    // autocompleteGetItem
    function autocompleteGetItem(attribute_row) {
      $('input[name=\'item_attribute[' + attribute_row + '][item_id]\']').autocomplete({
        'source': function(request, response) {
          $.ajax({
            url: '{{url('')}}/admin/getItem?filter_name='+request,
            dataType: 'json',
            success: function(json) {
              response($.map(json, function(item) {
                return {
                  label: item.name,
                  value: item.id
                }
              }));
            }
          });
        },
        'select': function(item) {
          $('input[name=\'item_attribute[' + attribute_row + '][item_id]\']').val(item['label']);
          $('input[name=\'item_attribute_hidden[' + attribute_row + '][item_id]\']').val(item['value']);
        }
      });
    }
    // 
    // $(function(){
    
    // });
  </script>

@endsection
