 
<?php $__env->startSection('content'); ?>
<!-- header -->
<?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
     <?php echo $__env->make('admin.common.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <?php if(!isset($branch)): ?>
      <?php echo Form::open(['url' => 'admin/setup_mgr/branch','class'=>'form-horizontal']); ?>

    <?php else: ?>
      <?php echo Form::model($branch,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.setup_mgr.branch.update',$branch->id]]); ?>

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
                  <h2><i class="fa fa-wa fa-home"></i> <?php echo trans('setup_mgr/branch.entry_title'); ?></h2>
                  <div class="row">
                    <span class="pull-right">
                      <?php if($action=='Edit'): ?>
                        <a data-original-title="<?php echo trans('common.back_to_list'); ?>"  data-toggle="tooltip" data-placement="top" href="<?php echo e(url('admin/setup_mgr/branch')); ?>" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs"><?php echo trans('common.back_to_list'); ?></span></a>

                        <button type="submit" data-original-title="<?php echo trans('common.create'); ?>"  data-toggle="tooltip" data-placement="top" class="btn btn-primary" name="submit" title="<?php echo trans('setup_mgr/branch.save'); ?>"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs"><?php echo trans('setup_mgr/branch.save'); ?></span></button>
                      <?php else: ?>
                        <a data-original-title="<?php echo trans('common.back_to_list'); ?>"  data-toggle="tooltip" data-placement="top" href="<?php echo e(url('admin/setup_mgr/branch')); ?>" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs"><?php echo trans('common.back_to_list'); ?></span></a>
                      <?php endif; ?>
                    </span>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <!-- col-sm-12 -->
                  <div class="col-sm-12">


                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/branch.branch_group'); ?><span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::select('branch_group_id', $branch_group, null, ['placeholder' => trans('setup_mgr/branch.choose_branch_group'),'class'=>'form-control has-feedback-left']); ?>

                        <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/branch.company'); ?><span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::select('company_id', $company, null, ['placeholder' => trans('setup_mgr/branch.choose_company'),'class'=>'form-control has-feedback-left']); ?>

                        <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/branch.branch_name'); ?>:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::text('branch_name',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/branch.branch_name")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/branch.description'); ?>:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::textarea('description',null,['class'=>'form-control','placeholder'=>trans("setup_mgr/branch.description")]); ?>

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