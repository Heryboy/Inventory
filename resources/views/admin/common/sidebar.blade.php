<!-- sidebar menu -->
<div class="left_col scroll-view">
  {{-- @include('admin.common.sidebar_logo') --}}

  <!-- <div class="clearfix"></div> -->
  <!-- menu prile quick info -->
  <!-- <div class="profile">
    <div class="profile_pic">
      <img src="{{url('/images/uploads/user')}}/{{Auth::user()->photo}}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>{!! trans('common.welcome') !!},</span><br>
      <b>{{Auth::user()->username}}</b>
    </div>
  </div> -->
  
  <!-- <br /> -->
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">   
    <div class="menu_section">
     <div class="clearfix"></div>
     <div class="lbl-cat">
      <h3 class="lbl-focus active">Menu</h3>
     </div>
     {{-- <ul class="nav side-menu">
      <li class="active"><a><i class="fa fa-laptop"></i> Landing Page </a></li>
     </ul> --}}
    </div>
  </div>
  <!-- /sidebar menu -->

  <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
   <a href="{{url('admin/config/configuration')}}" data-toggle="tooltip" data-placement="top" title="Settings">
     <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
   </a>
   <a href="#" data-toggle="tooltip" data-placement="top" title="User">
     <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
   </a>
   <a href="#" data-toggle="tooltip" data-placement="top" title="Notification">
     <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
   </a>
   <a href="{{url('auth/logout')}}" data-toggle="tooltip" data-placement="top" title="Logout">
     <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
   </a>
  </div>
  <!-- /menu footer buttons -->
</div><!-- /sidebar menu -->



  
