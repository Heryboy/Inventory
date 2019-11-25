 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
     <?php echo $__env->make('admin.common.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
     <?php echo Form::model($user,['method' => 'PATCH','files'=> true,'class'=>'form-horizontal','route'=>['admin.users.update',$user->id]]); ?>

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
            <div class="x_panel">
              <div class="x_title">
                <h2><i class="fa fa-pencil"></i> <?php echo trans('users/users.edit'); ?></h2>
                <div class="row">
                 <!-- block button -->
                 <div class="pull-right">
                 <?php if($action=='edit'): ?>
                  <button type="submit" name="save" href='<?php echo e(url('admin/users')); ?>' class="btn btn-primary" data-original-title="<?php echo trans('common.save'); ?>"  data-toggle="tooltip" data-placement="top"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs"><?php echo trans('common.save'); ?></span></button>
                 <?php endif; ?>
                  <a href="<?php echo e(url('admin/users')); ?>" class="btn btn-default" name="submit" data-original-title="<?php echo trans('common.back_to_list'); ?>"  data-toggle="tooltip" data-placement="top"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs"><?php echo trans('common.back_to_list'); ?></span></a>
                 </div> 
                </div>
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <!-- col-sm-12 -->
                  <div class="col-sm-12">
                    <div class="form-group">
                        <label  class="col-sm-3 control-label"><?php echo trans('users/users.image'); ?></label>
                        <div class="col-sm-6">
                          <!-- <input type="file" name="image" id="image"> -->
                          <div style="position:relative;">
                            
                            <!--e-logo-->
                            <div class="e-logo">
                              <?php if($user->photo!=''): ?>
                                <img width="150px" src="<?php echo e(url('/images/uploads/user')); ?>/<?php echo e($user->photo); ?>" id="t" />
                                <input type="hidden" value="<?php echo e($user->photo); ?>" name="photo_hidden">
                              <?php else: ?>
                                <img width="150px" src="<?php echo e(url('/images/img/no-image.png')); ?>" id="t" />
                              <?php endif; ?>
                              <a class="file"><span>Choose Image</span>
                              <?php echo Form::file('image',['id'=>'image','accept'=>'image/x-png, image/gif, image/jpeg']); ?>

                              </a>
                            </div><!--#END e-logo-->
                            
                          </div>
                        </div>
                    </div>

                     <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('users/users.username'); ?> :<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             <?php echo Form::text('username',null,['class'=>'form-control has-feedback-left','placeholder'=>trans('users/users.username')]); ?>

                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('users/users.email'); ?>:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                              <?php echo Form::email('email',null,['class'=>'form-control has-feedback-left','placeholder'=>trans('users/users.email')]); ?>

                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('users/users.user_group'); ?>:<span class="validate_label_red">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::select('group_id', $user_groups, null, ['placeholder' => trans('users/users.select_user_group'),'class'=>'form-control has-feedback-left']); ?>

                        <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="x_title" style="margin-top:20px;"><h2>*If you don't want to update your password just keep in blank.</h2>
                      <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('users/users.password'); ?>:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                             <?php echo Form::password('password',['class'=>'form-control has-feedback-left','placeholder'=>trans('users/users.password')]); ?>

                            <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo trans('users/users.confirm_password'); ?>:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php echo Form::password('password_confirmation',['class'=>'form-control has-feedback-left','placeholder'=>trans('users/users.confirm_password')]); ?>

                        <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
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
    <?php echo Form::close(); ?>

    <!-- /page content -->
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>