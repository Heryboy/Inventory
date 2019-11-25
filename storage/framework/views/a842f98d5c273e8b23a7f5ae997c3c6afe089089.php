 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
     <?php echo $__env->make('admin.common.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>  

    
    <?php echo Form::open(['url' => 'admin/users_group_role_update?group_role_id='.$group_role_id,'class'=>'form-horizontal']); ?>

      <!-- top navigation -->
      <div class="top_nav">
         <div class="nav_menu">
           <nav class="" role="navigation">
             <div class="nav toggle" style="margin-bottom:10px;">
               <a id="menu_toggle"><i class="fa fa-bars"></i></a>
             </div>
             <!-- block button -->
             <div class="pull-right" style="padding-top:10px;">
              <!-- action-top -->

              <button type="submit" data-original-title="<?php echo trans('common.create'); ?>"  data-toggle="tooltip" data-placement="top" class="btn btn-primary" name="submit" title="<?php echo trans('common.save'); ?>"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs"><?php echo trans('common.save'); ?></span></button>
              
              <a data-original-title="<?php echo trans('common.back_to_list'); ?>"  data-toggle="tooltip" data-placement="top" href="<?php echo e(url('admin/users_group_role')); ?>" class="btn btn-default"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs"><?php echo trans('common.back_to_list'); ?></span></a>

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
                <h2><?php echo trans('users_group.users_group_form'); ?></h2>
                <?php echo $__env->make('admin.common.tool_box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              </div>
              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <!-- col-sm-12 -->
                  <div class="col-sm-12">
                    <!-- error_message -->
                    <?php echo $__env->make('admin.common.error_input', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="box-body">
                      <div class="sform-groudp">
                        <div style="padding-top:30px;">
                          <label class="col-sm-2 control-label" for="input-name">Permission Access</label>
                          <div class="col-sm-10">
                              <div class="well well-sm" style="height: 500px; overflow: auto;">
                                <input type="hidden" name="id" value="<?php echo $GroupRole->id;?>"> 
                                <!-- foreach ($permissionOnMenu as $permission) -->
                                  <?php 
                                    $permission = $permissionOnMenu;
                                    $menu_arr='';
                                    $menu_id_arr='';
                                    $menu_parent_id_arr='';
                                  ?>

                                  <?php foreach($permission["group_role_detail_arr"] as $group_role_detail): ?>
                                    <?php
                                      $menu_arr .= $group_role_detail['menu_code'].":";
                                      $menu_id_arr .= $group_role_detail['menu_id'].":";
                                      $menu_parent_id_arr .= $group_role_detail['menu_parent_id'].":";
                                    ?>
                                  <?php endforeach; ?>

                                  <?php
                                    $menu_sep = explode(':',$menu_arr);
                                    $menu_id_sep = explode(':',$menu_id_arr);
                                    $menu_parent_id_sep = explode(':',$menu_parent_id_arr);
                                  ?>

                                  <?php foreach($permission['parents_menu_arr'] as $parent_menu): ?>
                                    <?php
                                      $mtitle = $parent_menu['parent_menu_name'];
                                      $mcode = $parent_menu['menu_code'];
                                      $mparent_id = $parent_menu['parent_id'];
                                      $mid = $parent_menu['mid'];
                                      $default = $parent_menu['default'];
                                      $read = $parent_menu['read'];
                                      $write = $parent_menu['write'];
                                    ?>
                                    <div class="col-sm-12">
                                      <div class="col-sm-4">
                                        <div style="font-size:16px;font-weight:bold;padding-top:10px;">
                                          <?php if($default==1): ?>
                                          <label style="display: none;">
                                            <input checked="checked" id="selecctall<?php echo e($mid); ?>" value="<?php echo e($mcode); ?>" name="menu_code[]" type="checkbox">&nbsp;&nbsp;<?php echo e($mtitle); ?>

                                            <p style="display:none;">
                                            <input checked="checked" class="chk_item<?php echo e($mid); ?> check_item_hidden<?php echo e($mid); ?>" type="checkbox" value="<?php echo e($mid); ?>" name="menu_id[]" >
                                            <input checked="checked" class="chk_item<?php echo e($mid); ?> check_item_hidden<?php echo e($mid); ?>" type="checkbox" value="<?php echo e($mparent_id); ?>" name="parent_menu_id[]" >
                                            </p>
                                          </label>
                                          <?php else: ?>
                                          <label>
                                            <input id="selecctall<?php echo e($mid); ?>" value="<?php echo e($mcode); ?>" name="menu_code[]" <?php if(in_array($mcode, $menu_sep)){echo "checked='checked'";}?> type="checkbox">&nbsp;&nbsp;<?php echo e($mtitle); ?>

                                            <p style="display:none;">
                                            <input <?php if(in_array($mid, $menu_id_sep)){echo "checked='checked'";}?> class="chk_item<?php echo e($mid); ?> check_item_hidden<?php echo e($mid); ?>" type="checkbox" value="<?php echo e($mid); ?>" name="menu_id[]" >
                                            <input <?php if(in_array($mparent_id, $menu_parent_id_sep)){echo "checked='checked'";}?> class="chk_item<?php echo e($mid); ?> check_item_hidden<?php echo e($mid); ?>" type="checkbox" value="<?php echo e($mparent_id); ?>" name="parent_menu_id[]" >
                                            </p>
                                          </label>
                                          <?php endif; ?>
                                        </div>
                                      </div>
                                      <?php if($default==1): ?>
                                        <span style="display: none;">
                                          <div style="font-size:16px;font-weight:bold;padding-top:10px;" class="col-sm-4">
                                            <label><input class="chk_item<?php echo e($mid); ?>" id="selecctall_read<?php echo e($mid); ?>" type="checkbox" checked="checked" name="chk_read[]" value="<?php echo e($mcode); ?>"> Read</label>
                                          </div>

                                          <div style="font-size:16px;font-weight:bold;padding-top:10px;margin-left: -20px;" class="col-sm-4">
                                            <label><input class="chk_item<?php echo e($mid); ?>" id="selecctall_write<?php echo e($mid); ?>" type="checkbox" checked="checked" name="chk_write[]" value="<?php echo e($mcode); ?>"> Write</label>
                                          </div>
                                        </span>
                                      <?php else: ?>
                                        <div style="font-size:16px;font-weight:bold;padding-top:10px;" class="col-sm-4">
                                          <label><input class="chk_item<?php echo e($mid); ?>" id="selecctall_read<?php echo e($mid); ?>" type="checkbox" <?php if($read==1){echo'checked="checked"';}?> name="chk_read[]" value="<?php echo e($mcode); ?>"> Read</label>
                                        </div>

                                        <div style="font-size:16px;font-weight:bold;padding-top:10px;margin-left: -20px;" class="col-sm-4">
                                          <label><input class="chk_item<?php echo e($mid); ?>" id="selecctall_write<?php echo e($mid); ?>" type="checkbox" <?php if($write==1){echo'checked="checked"';}?> name="chk_write[]" value="<?php echo e($mcode); ?>"> Write</label>
                                        </div>
                                      <?php endif; ?>
                                    </div>

                                    <?php foreach($parent_menu['sub_menus'] as $sub_menu): ?>
                                      <?php 
                                        $s_id='';
                                        $s_code='';
                                        $sread='';
                                        $swrite='';
                                        $s_parent_id='';
                                        $sparent_id = $sub_menu['s_parent_id'];
                                        $sid = $sub_menu['s_mid'];
                                        $smtitle = $sub_menu['s_menu_name'];
                                        $smcode = $sub_menu['s_menu_code'];
                                        $sread = $sub_menu['s_read'];
                                        $swrite = $sub_menu['s_write'];
                                      ?>

                                      <div class="col-sm-12" style="padding-left:50px;">

                                        <div class="checkbox">

                                          <div class="col-sm-4">
                                            <label>
                                              <input id="chk_sub_menu<?php echo e($sid); ?>" class="chk_item<?php echo e($mid); ?>" value="<?php echo e($smcode); ?>" <?php if(in_array($smcode, $menu_sep)){echo "checked='checked'";}?> type="checkbox" name="menu_code[]"/> <?php echo $smtitle;?>
                                              <p style="display:none;">
                                                <input class="chk_sub_item<?php echo e($sid); ?> chk_item<?php echo e($mid); ?>" type="checkbox" <?php if(in_array($sid, $menu_id_sep)){echo "checked='checked'";}?> value="<?php echo e($sid); ?>" name="menu_id[]" >
                                                <input class="chk_sub_item<?php echo e($sid); ?> chk_item<?php echo e($mid); ?>" type="checkbox" <?php if(in_array($sparent_id, $menu_parent_id_sep)){echo "checked='checked'";}?> value="<?php echo e($sparent_id); ?>" name="parent_menu_id[]" >
                                              </p>
                                            </label>
                                          </div>

                                          <div class="col-sm-4">
                                            <label><input class="chk_read_main<?php echo e($sid); ?> chk_item_read<?php echo e($mid); ?> chk_item<?php echo e($mid); ?>" type="checkbox" <?php if($sread==1){echo'checked="checked"';}?> name="chk_read[]" value="<?php echo e($smcode); ?>"></label>
                                          </div>

                                          <div class="col-sm-4">
                                            <label><input class="chk_write_main<?php echo e($sid); ?> chk_item_write<?php echo e($mid); ?> chk_item<?php echo e($mid); ?>" type="checkbox" <?php if($swrite==1){echo'checked="checked"';}?> name="chk_write[]" value="<?php echo e($smcode); ?>"></label>
                                          </div>

                                          <!-- sreyleak add more sub menu -->
                                          <?php foreach($sub_menu['sub_menus'] as $sub_sub_menu): ?>

                                            <?php
                                              $sub_s_id='';
                                              $sub_s_code='';
                                              $sub_sread='';
                                              $sub_swrite='';
                                              $sub_s_parent_id='';
                                              $child_sub_sparent_id = $sid;
                                              $child_sub_sid = $sub_sub_menu['s_mid'];
                                              $child_sub_smtitle = $sub_sub_menu['s_menu_name'];
                                              $child_sub_smcode = $sub_sub_menu['s_menu_code'];
                                              $child_sub_sread = $sub_sub_menu['s_read'];
                                              $child_sub_swrite = $sub_sub_menu['s_write'];
                                            ?>

                                            <div class="col-sm-12" style="padding-left:50px;"> 
                                              <div class="checkbox">
                                                <div class="col-sm-4">
                                                  <label>
                                                    <input id="chk_sub_sub_menu<?php echo e($child_sub_sid); ?>" class="chk_sub_item<?php echo e($child_sub_sid); ?>" value="<?php echo e($child_sub_smcode); ?>" <?php if(in_array($child_sub_smcode, $menu_sep)){echo "checked='checked'";}?> type="checkbox" name="menu_code[]"/> <?php echo $child_sub_smtitle;?>
                                                    <p style="display:none;">
                                                      <input class="ch_child_sub_menu<?php echo e($child_sub_sid); ?> chk_sub_item<?php echo e($child_sub_sid); ?>" type="checkbox" <?php if(in_array($child_sub_sid, $menu_id_sep)){echo "checked='checked'";}?> value="<?php echo e($child_sub_sid); ?>" name="menu_id[]" >
                                                      <input class="ch_child_sub_parent_menu<?php echo e($child_sub_sid); ?> chk_sub_item<?php echo e($child_sub_sid); ?>" type="checkbox" <?php if(in_array($child_sub_sid, $menu_parent_id_sep)){echo "checked='checked'";}?> value="<?php echo e($child_sub_sid); ?>" name="parent_menu_id[]" >
                                                    </p>
                                                  </label>
                                                </div>
                                                <div class="col-sm-4">
                                                  <label><input class="chk_read_sub_main<?php echo e($child_sub_sid); ?> chk_item_sub_read<?php echo e($child_sub_sid); ?>" type="checkbox" <?php if($child_sub_sread==1){echo'checked="checked"';}?> name="chk_read[]" value="<?php echo e($child_sub_smcode); ?>"></label>
                                                </div>
                                                <div class="col-sm-4">
                                                  <label><input class="chk_write_sub_main<?php echo e($child_sub_sid); ?> chk_item_sub_write<?php echo e($child_sub_sid); ?>" type="checkbox" <?php if($child_sub_swrite==1){echo'checked="checked"';}?> name="chk_write[]" value="<?php echo e($child_sub_smcode); ?>"></label>
                                                </div>

                                              </div>
                                            </div>

                                            <!-- ####script_check_group_check_sub_child_menu-->
                                            <script type="text/javascript">
                                              //chk_sub_menu
                                              $('#chk_sub_sub_menu<?php echo e($child_sub_sid); ?>').click(function(event) {  //on click
                                                if(this.checked) { // check select status
                                                  $('.chk_read_sub_main<?php echo e($child_sub_sid); ?>,.chk_write_sub_main<?php echo e($child_sub_sid); ?>,.ch_child_sub_menu<?php echo e($child_sub_sid); ?>,.ch_child_sub_parent_menu<?php echo e($child_sub_sid); ?>').each(function() { //loop through each checkbox
                                                    this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                  });
                                                }else{
                                                  $('.chk_read_sub_main<?php echo e($child_sub_sid); ?>,.chk_write_sub_main<?php echo e($child_sub_sid); ?>,.ch_child_sub_menu<?php echo e($child_sub_sid); ?>,.ch_child_sub_parent_menu<?php echo e($child_sub_sid); ?>').each(function() { //loop through each checkbox
                                                    this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                                  });        
                                                }
                                              });

                                              //selecctall_read_subMain
                                              $('.chk_read_sub_main<?php echo e($child_sub_sid); ?>').click(function(event) {  //on click
                                                if(this.checked) { // check select status
                                                  $('#chk_sub_sub_menu<?php echo e($child_sub_sid); ?>,.chk_write_sub_main<?php echo e($child_sub_sid); ?>,.ch_child_sub_menu<?php echo e($child_sub_sid); ?>,.ch_child_sub_parent_menu<?php echo e($child_sub_sid); ?>').each(function() { //loop through each checkbox
                                                    this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                  });
                                                }else{
                                                  $('#chk_sub_sub_menu<?php echo e($child_sub_sid); ?>,.chk_write_sub_main<?php echo e($child_sub_sid); ?>,.ch_child_sub_menu<?php echo e($child_sub_sid); ?>,.ch_child_sub_parent_menu<?php echo e($child_sub_sid); ?>').each(function() { //loop through each checkbox
                                                    this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                                  });        
                                                }
                                              });
                                              
                                              // //selecctall_write_subMain
                                              $('.chk_write_sub_main<?php echo e($child_sub_sid); ?>').click(function(event) {  //on click
                                                if(this.checked) { // check select status
                                                  $('.check_item_hidden<?php echo e($child_sub_sid); ?>,.ch_child_sub_menu<?php echo e($child_sub_sid); ?>,.ch_child_sub_parent_menu<?php echo e($child_sub_sid); ?>').each(function() { //loop through each checkbox
                                                    this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                  });
                                                }else{
                                                  $('.check_item_hidden<?php echo e($child_sub_sid); ?>,.ch_child_sub_menu<?php echo e($child_sub_sid); ?>,.ch_child_sub_parent_menu<?php echo e($child_sub_sid); ?>').each(function() { //loop through each checkbox
                                                    this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                                  });        
                                                }
                                              });
                                            </script>

                                          <?php endforeach; ?>
                                          <!--  end  -->

                                          <!-- ####script_check_group_check_child_menu-->
                                          <script type="text/javascript">
                                            //chk_sub_menu
                                            $('#chk_sub_menu<?php echo e($sid); ?>,.chk_read_main<?php echo e($sid); ?>').click(function(event) {  //on click
                                              if(this.checked) { // check select status
                                                $('.chk_read_main<?php echo e($sid); ?>,#chk_sub_menu<?php echo e($sid); ?>,.chk_sub_item<?php echo e($sid); ?>,.chk_write_main<?php echo e($sid); ?>,#selecctall<?php echo e($mid); ?>,#selecctall_read<?php echo e($mid); ?>,#selecctall_write<?php echo e($mid); ?>,.check_item_hidden<?php echo e($mid); ?>').each(function() { //loop through each checkbox
                                                  this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                });
                                              }else{
                                                $('.chk_read_main<?php echo e($sid); ?>,#chk_sub_menu<?php echo e($sid); ?>,.chk_sub_item<?php echo e($sid); ?>,.chk_write_main<?php echo e($sid); ?>').each(function() { //loop through each checkbox
                                                  this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                                });        
                                              }
                                            });

                                            //selecctall_read_subMain
                                            $('.chk_read_main<?php echo e($sid); ?>').click(function(event) {  //on click
                                              if(this.checked) { // check select status
                                                $('.chk_read<?php echo e($sid); ?>').each(function() { //loop through each checkbox
                                                  this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                });
                                              }else{
                                                $('.chk_read<?php echo e($sid); ?>').each(function() { //loop through each checkbox
                                                  this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                                });        
                                              }
                                            });
                                            
                                            //selecctall_write_subMain
                                            $('.chk_write_main<?php echo e($sid); ?>').click(function(event) {  //on click
                                              if(this.checked) { // check select status
                                                $('.chk_write<?php echo e($sid); ?>,#selecctall_write<?php echo e($mid); ?>').each(function() { //loop through each checkbox
                                                  this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                });
                                              }else{
                                                $('.chk_write<?php echo e($sid); ?>').each(function() { //loop through each checkbox
                                                  this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                                });        
                                              }
                                            });
                                          </script>

                                        </div>
                                      </div>
                                    <?php endforeach; ?>

                                    <!--check and un check form-->
                                    <script>
                                      $(document).ready(function() {
                                        //SELECT
                                        $('#selecctall<?php echo e($mid); ?>').click(function(event) {  //on click
                                          if(this.checked) { // check select status
                                              $('.chk_item<?php echo e($mid); ?>').each(function() { //loop through each checkbox
                                                  this.checked = true;  //select all checkboxes with class "checkbox1"              
                                              });
                                          }else{
                                              $('.chk_item<?php echo e($mid); ?>').each(function() { //loop through each checkbox
                                                  this.checked = false; //desfelect all checkboxes with class "checkbox1"                      
                                              });        
                                          }
                                        });
                                        //selecctall_read
                                        $('#selecctall_read<?php echo e($mid); ?>').click(function(event) {  //on click
                                          if(this.checked) { // check select status
                                              $('.chk_item_read<?php echo e($mid); ?>,#selecctall<?php echo e($mid); ?>,.chk_item<?php echo e($mid); ?>').each(function() { //loop through each checkbox
                                                  this.checked = true;  //select all checkboxes with class "checkbox1"              
                                              });
                                          }else{
                                              $('.chk_item_read<?php echo e($mid); ?>,#selecctall<?php echo e($mid); ?>,.chk_item<?php echo e($mid); ?>').each(function() { //loop through each checkbox
                                                  this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                              });        
                                          }
                                        });

                                        //selecctall_write
                                        $('#selecctall_write<?php echo e($mid); ?>').click(function(event) {  //on click
                                          
                                          if(this.checked) { // check select status
                                              $('.chk_item_write<?php echo e($mid); ?>,#selecctall<?php echo e($mid); ?>,.chk_item<?php echo e($mid); ?>').each(function() { //loop through each checkbox
                                                  this.checked = true;  //select all checkboxes with class "checkbox1"              
                                              });
                                          }else{
                                              $('.chk_item_write<?php echo e($mid); ?>').each(function() { //loop through each checkbox
                                                  this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                              });        
                                          }
                                        });

                                      });
                                    </script>

                                  <?php endforeach; ?>
                                <!-- endforeach -->
                              </div>
                              <a onclick="$(this).parent().find(':checkbox').prop('checked', true);">Check All</a> | 
                              <a onclick="$(this).parent().find(':checkbox').prop('checked', false);">Uncheck All</a></div>

                              
                        </div>
                      </div>   
                    </div><!-- /.box-body -->
                    
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- footer content -->
        <?php echo $__env->make('admin.common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- /footer content -->
      </div>
    <?php echo Form::close(); ?>

    <!-- /page content -->
  </div>

   <!--check and un check form-->
                                      

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>