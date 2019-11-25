 
<?php $__env->startSection('content'); ?>
<!-- header -->
<?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
     <?php echo $__env->make('admin.common.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <?php if(!isset($pos_work_shift)): ?>
      <?php echo Form::open(['url' => 'admin/setup_mgr/pos_work_shift','class'=>'form-horizontal']); ?>

    <?php else: ?>
      <?php echo Form::model($pos_work_shift,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.setup_mgr.pos_work_shift.update',$pos_work_shift->id]]); ?>

    <?php endif; ?>
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
            <?php echo $__env->make('admin.common.error_input', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin.common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="x_panel">

              <div class="x_title">
                <div class="row">
                  <h2><i class="fa fa-wa fa-flag"></i> <?php echo trans('setup_mgr/pos_work_shift.entry_title'); ?></h2>
                  <div class="row">
                    <span class="pull-right">
                      <?php if($action=='Edit'): ?>
                        <a data-original-title="<?php echo trans('common.back_to_list'); ?>"  data-toggle="tooltip" data-placement="top" href="<?php echo e(url('admin/setup_mgr/pos_work_shift')); ?>" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs"><?php echo trans('common.back_to_list'); ?></span></a>

                        <button type="submit" data-original-title="<?php echo trans('common.create'); ?>"  data-toggle="tooltip" data-placement="top" class="btn btn-primary" name="submit" title="<?php echo trans('setup_mgr/pos_work_shift.entry_save'); ?>"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs"><?php echo trans('setup_mgr/pos_work_shift.entry_save'); ?></span></button>
                      <?php else: ?>
                        <a data-original-title="<?php echo trans('common.back_to_list'); ?>"  data-toggle="tooltip" data-placement="top" href="<?php echo e(url('admin/setup_mgr/pos_work_shift')); ?>" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs"><?php echo trans('common.back_to_list'); ?></span></a>
                      <?php endif; ?>
                    </span>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->`
                <div class="x_content">
                  <!-- col-sm-12 -->
                  <div class="col-sm-12">

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/pos_work_shift.entry_workshift_name'); ?>:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::text('workshift_name',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/pos_work_shift.entry_workshift_name")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/pos_work_shift.entry_start_time'); ?>:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::text('start_time',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/pos_work_shift.entry_start_time")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/pos_work_shift.entry_end_time'); ?>:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::text('end_time',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/pos_work_shift.entry_end_time")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/pos_work_shift.entry_description'); ?>:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::textarea('description',null,['class'=>'form-control','placeholder'=>trans('setup_mgr/pos_work_shift.entry_description')]); ?>

                      </div>
                    </div>

                    <!-- row -->
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/pos_work_shift.entry_is_active'); ?></label>
                      <!-- col-sm-6 -->
                      <div class="col-sm-6" >
                        <?php echo Form::checkbox('is_active',null,null,['class' => 'flat form-control']); ?>

                      </div>
                    </div>
                    
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
      <!-- /page content -->
    <?php echo Form::close(); ?>

  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>