 
<?php $__env->startSection('content'); ?>
<!-- header -->
<?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
     <?php echo $__env->make('admin.common.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <?php if(!isset($company)): ?>
      <?php echo Form::open(['url' => 'admin/setup_mgr/company','files'=>true,'class'=>'form-horizontal']); ?>

    <?php else: ?>
      <?php echo Form::model($company,['method' => 'PATCH','files'=>true,'class'=>'form-horizontal','route'=>['admin.setup_mgr.company.update',$company->id]]); ?>

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
            <?php echo $__env->make('admin.common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin.common.error_input', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="x_panel">

              <div class="x_title">
                <div class="row">
                  <h2><i class="fa fa-wa fa-home"></i> <?php echo trans('setup_mgr/company.entry_title'); ?></h2>
                  <div class="row">
                    <span class="pull-right">
                      <?php if($action=='Edit'): ?>
                        <a data-original-title="<?php echo trans('common.back_to_list'); ?>"  data-toggle="tooltip" data-placement="top" href="<?php echo e(url('admin/setup_mgr/company')); ?>" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs"><?php echo trans('common.back_to_list'); ?></span></a>

                        <button type="submit" data-original-title="<?php echo trans('common.create'); ?>"  data-toggle="tooltip" data-placement="top" class="btn btn-primary" name="submit" title="<?php echo trans('setup_mgr/company.save'); ?>"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs"><?php echo trans('setup_mgr/company.save'); ?></span></button>
                      <?php else: ?>
                        <a data-original-title="<?php echo trans('common.back_to_list'); ?>"  data-toggle="tooltip" data-placement="top" href="<?php echo e(url('admin/setup_mgr/company')); ?>" type="submit" class="btn btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs"><?php echo trans('common.back_to_list'); ?></span></a>
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

                  <?php /* form-group */ ?>
                  <div class="col-sm-2">
                    <label  class="col-sm-4 control-label">Logo</label>
                    <div class="col-sm-4">
                      <!-- <input type="file" name="image" id="image"> -->
                      <div style="position:relative;">
                        <!--e-logo-->
                        <div class="e-logo">
                          <?php if(isset($company)): ?>
                            <?php if($company->image!=''): ?>
                              <img width="140px" src="<?php echo e(url('images/uploads/company')); ?>/<?php echo e($company->image); ?>" id="t" />
                              <input type="hidden" name="image_hidden" value="<?php echo e($company->image); ?>">
                            <?php else: ?>
                              <img width="140px" src="<?php echo e(url('images/no_image.png')); ?>" id="t" />
                            <?php endif; ?>
                          <?php else: ?>
                            <img width="140px" src="<?php echo e(url('images/no_image.png')); ?>" id="t" /> 
                          <?php endif; ?>   
                          <a class="file"><span>Choose Logo</span>
                          <?php echo Form::file('image',['id'=>'image','accept'=>'image/x-png, image/gif, image/jpeg']); ?>

                          </a>
                        </div><!--#END e-logo-->
                      </div>
                    </div>
                  </div>

                  <!-- col-sm-12 -->
                  <div class="col-sm-8">
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/company.company_kh'); ?> <span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::text('company_kh',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/company.company_kh")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/company.company_eng'); ?> <span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::text('company_en',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/company.company_eng")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/company.phone'); ?></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::text('phone',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/company.phone")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/company.email'); ?></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::text('email',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/company.email")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/company.website'); ?></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::text('website',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/company.website")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/company.address'); ?>:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::textarea('address',null,['class'=>'form-control','placeholder'=>trans("setup_mgr/company.address")]); ?>

                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('setup_mgr/company.description'); ?>:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::textarea('description',null,['class'=>'form-control','placeholder'=>trans("setup_mgr/company.description")]); ?>

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