<!-- sidebar menu -->
<div class="left_col scroll-view">
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">   
    <div class="menu_section">
     <div class="clearfix"></div>
     <div class="lbl-cat">
     	<h3 class="lbl-focus active"><?php echo trans('transfer/transfer.entry_title'); ?></h3>
     </div>
     <ul class="nav side-menu">
      <?php 
        $i=1;
      ?>
        <li class="active">
          <a><i class="fa fa-th-large"></i> <?php echo trans('transfer/transfer.entry_customer'); ?> <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" style="display: block;">
            <?php foreach($getData_arr as $getData): ?>
              <li><a href="<?php echo e(url('admin/transfer/transfer_list')); ?>?customer_id=<?php echo e($getData['id']); ?>"><?php echo e($getData['name']); ?></a></li>
              <?php 
                $i++;
              ?>
            <?php endforeach; ?>
          </ul>
        </li>
     </ul>
    </div>
  </div>
  <!-- /sidebar menu -->

  <div id="contextMenuOption"></div>

  <script type="text/javascript">
    $(document).on("contextmenu", "#contextMenuOption", function(e){
      alert("testing");
      // var fsm_id = $(this).data("value");
      // var fsm_id_val = $("#fsm_id").val(fsm_id);
      // // show option settings
      // // $('#show_option_settings').show();
      // $('#arrow-up-right-click'+fsm_id+'').show(); 
      // $('#flight_pax_main_UTC_right_click'+fsm_id+'').show();

      // $('#flight_pax_main_UTC'+fsm_id+'').hide();//toggle("slide", { direction: "top" }, 100);
      // $('#arrow-up'+fsm_id+'').hide();//toggle("slide", { direction: "top" }, 100);

      return false;
    });
  </script>

  <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
   <a href="<?php echo e(url('admin/config/configuration')); ?>" data-toggle="tooltip" data-placement="top" title="Settings">
     <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
   </a>
   <a href="#" data-toggle="tooltip" data-placement="top" title="User">
     <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
   </a>
   <a href="#" data-toggle="tooltip" data-placement="top" title="Notification">
     <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
   </a>
   <a href="<?php echo e(url('auth/logout')); ?>" data-toggle="tooltip" data-placement="top" title="Logout">
     <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
   </a>
  </div>
  <!-- /menu footer buttons -->
</div><!-- /sidebar menu -->


  
