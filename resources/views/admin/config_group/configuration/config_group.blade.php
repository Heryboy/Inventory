@extends('admin.common.layout') 
@section('content')
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
            @include('admin.common.action_top')
           </div> 
         </nav>
       </div>
    </div><!-- /top navigation -->
    <!-- page content -->
    <div style="min-height: 650px;" class="right_col" role="main">

      <div class="row">

        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Config Group <small>(Config Group)</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">

              <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> -->

              <table class="table table-striped responsive-utilities jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th>
                      <div style="position: relative;" class="icheckbox_flat-green"><input style="position: absolute; opacity: 0;" id="check-all" class="flat" type="checkbox"><ins style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;" class="iCheck-helper"></ins></div>
                    </th>
                    <th class="column-title">No</th>
                    <th class="column-title">Name</th>
                    <th class="column-title">Action</th>
                  </tr>
                </thead>

                <tbody>
                  <tr class="even pointer">
                    <td class="a-center">
                      <div style="position: relative;" class="icheckbox_flat-green"><input style="position: absolute; opacity: 0;" class="flat" name="table_records" type="checkbox"><ins style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;" class="iCheck-helper"></ins></div>
                    </td>
                    <td class=" ">01</td>
                    <td class=" ">Site</td>
                    <td> 
                      <button class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></button>
                      <button class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></button> <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                  <tr class="odd pointer">
                    <td class="a-center">
                      <div style="position: relative;" class="icheckbox_flat-green"><input style="position: absolute; opacity: 0;" class="flat" name="table_records" type="checkbox"><ins style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;" class="iCheck-helper"></ins></div>
                    </td>
                    <td class=" ">02</td>
                    <td class=" ">Contact Info</td>
                    <td> 
                      <button class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></button>
                      <button class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></button> <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                  <tr class="even pointer">
                    <td class="a-center">
                      <div style="position: relative;" class="icheckbox_flat-green"><input style="position: absolute; opacity: 0;" class="flat" name="table_records" type="checkbox"><ins style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;" class="iCheck-helper"></ins></div>
                    </td>
                    <td class=" ">03</td>
                    <td class=" ">Image Upload</td>
                    <td> 
                      <button class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></button>
                      <button class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></button> <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                  <tr class="odd pointer">
                    <td class="a-center">
                      <div style="position: relative;" class="icheckbox_flat-green"><input style="position: absolute; opacity: 0;" class="flat" name="table_records" type="checkbox"><ins style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;" class="iCheck-helper"></ins></div>
                    </td>
                    <td class=" ">04</td>
                    <td class=" ">Expired Date</td>
                    <td> 
                      <button class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></button>
                      <button class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></button> <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                </tbody>

              </table>
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

@endsection