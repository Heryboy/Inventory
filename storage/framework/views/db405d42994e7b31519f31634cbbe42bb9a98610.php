 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
     <?php echo $__env->make('admin.common.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php if(!isset($GroupRole)): ?>
      <?php echo Form::open(['url' => 'admin/users_group_role','class'=>'form-horizontal']); ?>

    <?php else: ?>
      <?php echo Form::model($GroupRole,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.users_group_role.update',$GroupRole->id]]); ?>

    <?php endif; ?>
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
                    <?php echo $__env->make('admin.common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="box-body">

                      <div class="form-group">
                        <label  class="col-sm-4 control-label"><?php echo trans('users/group_role.group_role'); ?><span class="validate_label_red">*</span></label>
                        <div class="col-sm-4">
                            <?php echo Form::text('name',null,['class'=>'form-control','placeholder'=>'name']); ?>

                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label  class="col-sm-4 control-label"><?php echo trans('users/group_role.user_group'); ?><span class="validate_label_red">*</span></label>
                        <div class="col-sm-4">
                          <?php echo Form::select('group_id',$UserGroup,null, ['option' => 'Select Position','class'=>'form-control']); ?>

                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label  class="col-sm-4 control-label"><?php echo trans('users/group_role.remark'); ?></label>
                        <div class="col-sm-4">
                          <?php echo Form::textarea('remark',null,['class'=>'form-control','placeholder'=>'Remark']); ?>

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>