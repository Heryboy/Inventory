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
                <h2>{!!trans('users/users.users_listing')!!}</h2>
                <div class="row">
                  <!-- block button -->
                   <span class="pull-right">
                    <a data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" href='{{url('admin/users/create')}}' class="btn btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> <span class="hidden-xs">{!! trans('common.create') !!}</span></a>

                   </span> 
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
                        <th>{!! trans('common.no') !!}.</th>
                        <!-- <th>Photo</th> -->
                        <th>User</th>
                        <th>User Group</th>
                        <th>{!! trans('common.action') !!}</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php $i = 1;?>
                      @foreach ($users as $user)
                        <tr>
                          <td width="50"><?php echo($i); ?></td>
                          <!-- <td><div class="profile_pic" style="width:60px; height:60px; margin-top:-12px;">
                          
                            @if($user->photo)
                              <img style="width:50px; height:50px; margin-top:5px;margin-left:5px;" src="{{url('images/uploads/user')}}/{{$user->photo}}" alt="Image" class="profile_img">
                            @else
                              <img style="width:50px; height:50px; margin-top:5px;margin-left:5px;" src="{{url('images/no-image.png')}}" alt="Image" class="profile_img">
                            @endif
                              </div></td> -->
                          <td>{{ $user->username }}</td>
                          <td>{{ $UserGroup[$user->group_id]}}</td>
                          <td width="250">
                            <center>
                              <a href="{{route('admin.users.show',$user->id)}}" class="btn btn-xs btn-info" data-original-title="{!! trans('common.view') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-info"></i></a>                         
                              <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-xs btn-primary" data-original-title="{!! trans('common.edit') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                              <a href="{{route('admin.users.destroy',$user->id)}}" class="btn btn-xs btn-danger" title="{!!trans('common.delete')!!}" data-method="delete" data-confirm="{!!trans('common.are_you_sure')!!}" data-original-title="{!! trans('common.delete') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
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

@endsection
