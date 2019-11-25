<!-- sidebar menu -->
<div class="left_col scroll-view">
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">   
    <div class="menu_section">
     <div class="clearfix"></div>
     <!-- <div class="padding-top-sm"></div> -->
     <div class="lbl-cat">
     	<h3 class="lbl-focus active">Category</h3>
     </div>
     <ul class="nav side-menu">
      <?php 
        $i=1;
      ?>
      @foreach($getData_arr as $getData)
        <li class="active">
          <a><i class="fa fa-th-large"></i> {{$getData['branch_group_name']}} <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" style="display: block;">
            @foreach($getData['Branch_Array'] as $branch)
              <li><a href="{{url('admin/discount/discount_item')}}?branch_id={{$branch['id']}}">{{$branch['branch_name']}}</a></li>
            @endforeach
          </ul>
        </li>
        <?php 
          $i++;
        ?>
      @endforeach
      <!-- <li class="active"><a><i class="fa fa-users"></i> Vendor List </a></li>
      <li class="active"><a><i class="fa fa-list"></i> Search Code </a></li>
      <li class="active"><a><i class="fa fa-list"></i> Search Item </a></li> -->
     </ul>
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


  
