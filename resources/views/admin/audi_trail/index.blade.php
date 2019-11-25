@extends('admin.common.layout') 
@section('content')
<!-- header -->
@include('admin.common.header')
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
              <h2>Audit Trail <small>(Audit Trail)</small></h2>
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
              <table id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                  <tr class="headings">
                    <th class="column-title">{!!trans('audit_trail/audit_trail.no')!!}</th>
                    <th class="column-title">{!!trans('audit_trail/audit_trail.activity_description')!!}</th>
                    <th class="column-title no-link last"><span class="nobr">{!!trans('audit_trail/audit_trail.modified_date')!!}</span>
                    </th>
                  </tr>
                </thead>
  
                <?php $i=1;?>
                @foreach($audiTrail as $data)
                  <tr class="even pointer">
                    <td><?php echo $i;?></td>
                    <td><b><i><?php echo $data->username;?></i></b> : <?php echo $data->action;?> <?php echo Helpers::getMenusName(2,$data->menu_code);?></td>
                    <td><center><?php echo $data->datetime;?></center></td>
                  </tr>
                <?php $i++;?>
                @endforeach

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