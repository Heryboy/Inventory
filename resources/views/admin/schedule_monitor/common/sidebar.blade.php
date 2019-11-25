<!-- sidebar menu -->
<div class="left_col scroll-view">
  <div class="navbar nav_title" style="border: 0;">
    <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>Bassaka Air Limited</span></a>
  </div>
  <div class="clearfix"></div>
  <!-- menu prile quick info -->
  <!-- <div class="profile">
    <div class="profile_pic">
      <img src="images/img.jpg" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h4><b>Piset</b></h4>
    </div>
  </div> -->
  <!-- /menu prile quick info -->
  <!-- <br /> -->
  <!-- sidebar menu -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

   <div class="menu_section">
     <!--<h3>Menu</h3>-->
     <ul class="nav side-menu">
       <li><a href="{{url('crew?id=1')}}"><i class="fa fa-users"></i> Crew</a></li>
       <li><a href="{{url('schedule_monitor/flight_log?id=1')}}"><i class="fa fa-plane"></i> Flight Logs</a></li>
       <li><a><i class="fa fa-desktop"></i> Swap Flight</a></li>
       <li><a><i class="fa fa-table"></i> Divert Flight</a>
       </li>
       <li><a><i class="fa fa-bar-chart-o"></i> Flight Delay</a>
       </li>
       <li><a><i class="fa fa-clock-o"></i> Re-time Schedule</a></li>
       <li><a><i class="fa fa-upload"></i> Upload</a>
       </li>
       <li><a><i class="fa fa-times-circle"></i> Cancel Flight</a></li>
       <li><a><i class="fa fa-trash"></i> Delete Flight</a></li>
     </ul>
   </div>
 </div>
  <!-- /sidebar menu -->

  <!-- /menu footer buttons -->
 <div class="sidebar-footer hidden-small">
   <a href="{{url('config/configuration')}}" data-toggle="tooltip" data-placement="top" title="Settings">
     <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
   </a>
   <a href="#" data-toggle="tooltip" data-placement="top" title="User">
     <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
   </a>
   <a href="#" data-toggle="tooltip" data-placement="top" title="Notification">
     <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
   </a>
   <a href="{{url('login')}}" data-toggle="tooltip" data-placement="top" title="Logout">
     <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
   </a>
 </div>
  <!-- /menu footer buttons -->
</div>
<!-- /sidebar menu -->