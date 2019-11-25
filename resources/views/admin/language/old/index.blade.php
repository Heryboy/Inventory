@extends('admin.common.layout') 
@section('content')
  
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
             <!-- block button -->
             <div class="pull-right" style="padding-top:10px;">
              @include('admin.common.action_top')
             </div> 
           </nav>
         </div>
      </div><!-- /top navigation -->
      <!-- page content -->
      <div style="min-height: 650px;" class="right_col" role="main">
        @if(Session::has('message'))
          <!-- <div class="alert alert-success"> -->
          <span style="color:green">
            {{Session::get('message')}}
          </span>  
          <!-- </div> -->
        @endif
        <div class="row">

          <div class="clearfix"></div>

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Flight Setup Listing <small>(Flight Setup)</small></h2>
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

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                        <th>No.</th>                 
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Code</th>
                        
                        <th>Ordering</th>
                        
                        <th>Is Active</th>
                        <th>Action</th>
                      </tr>
                    </thead> 
                    <tbody>
                      <?php $i = 1;?>
                      <?php                           
                      foreach ($languages as $language){
                      ?>
                        <tr>
                          <td width="50"><?php echo($i); ?></td>
                          <td><img src="{{SITE_HTTP_URL.$language->image}}"> </td>
                          <td>{{ $language->name }}</td>
                          <th>{{ $language->code }}</th>
                          <td>{{ $language->ordering }}</td>
                          
                          <td>
                            @if($language->is_active==1)
                              Active
                            @else
                              Inactive
                            @endif
                          </td>
                          
                          <td width="250">
                            <a title="View" href="{{route('admin.config.language.show',$language->id)}}" class="btn btn-info"><i class="fa fa-info"></i></a>
                            
                            <a href="{{route('admin.config.language.edit',$language->id)}}" class="btn btn-primary" title="Edit"><i class="fa fa-pencil"></i> </a>

                            <a href="{{route('admin.config.language.edit',$language->id)}}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> </a>
                          </td>
                          
                        </tr>
                    <?php $i++; ?>
                    <?php  }?>
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
