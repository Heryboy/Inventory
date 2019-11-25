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
                <h2><i class="fa fa-wa fa-lock"></i> {!!trans('users/group_role.group_role_listing')!!}</h2>
                <div class="row">
                  <!-- block button -->
                   <div class="pull-right">
                    <!-- action top -->
                    <a data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" href='{{url('admin/users_group_role/create')}}' class="btn btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> <span class="hidden-xs">{!! trans('common.create') !!}</span></a>

                    <!-- <a data-original-title="{!! trans('common.delete') !!}"  data-toggle="tooltip" data-placement="top" href='#' class="btn btn-danger" name="submit"><i class="fa fa-wa fa-trash"></i> <span class="hidden-xs">{!! trans('common.delete') !!}</span></a> -->
                  </div> 
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
                        <th>{!!trans('common.no')!!}</th>
                        <th>{!!trans('users/group_role.name')!!}</th>
                        <th>{!!trans('users/group_role.user_group')!!}</th>
                        <th>{!!trans('users/group_role.remark')!!}</th>
                        <th>{!!trans('common.action')!!}</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php $i = 1;?>
                    
                      @foreach ($GroupRoles as $GroupRole)
                      
                        <tr>
                          <td><?php echo($i); ?></td>
                          <td>{{ $GroupRole->name }}</td>
                          <td><?php //print_r($GroupRole->group_id)
                          ?>
                            {{ $UserGroup[$GroupRole->group_id] }}
                          </td>
                          <td>{{ $GroupRole->remark }}</td>
                          
                          <td>
                            <center>
                              <a href="{{route('admin.users_group_role.show',$GroupRole->id)}}"class="btn btn-xs btn-success" data-original-title="{!! trans('users/group_role.permission') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-key"></i></a>

                              <!-- <a href="{{route('admin.users_group_role.show',$GroupRole->id)}}?menu_code=y5_s26" class="btn btn-xs btn-success" data-original-title="{!! trans('users/group_role.permission') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-key"></i></a> -->

                              <a href="{{route('admin.users_group_role.edit',$GroupRole->id)}}" class="btn btn-xs btn-primary" data-original-title="{!! trans('common.edit') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>

                              <!-- <a href="{{route('admin.users_group_role.edit',$GroupRole->id)}}" class="btn btn-xs btn-primary" data-original-title="{!! trans('common.edit') !!}" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a> -->

                              <a href="{{route('admin.users_group_role.destroy',$GroupRole->id)}}" class="btn btn-xs btn-danger" title="{!!trans('common.delete')!!}" data-method="delete" data-confirm="{!!trans('common.are_you_sure')!!}" data-original-title="{!! trans('common.delete') !!}"  data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
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
