<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <form novalidate="" action="#" id="demo-form2" data-parsley-validate="" class="">
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
        <?php echo $__env->make('admin.common.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav class="pull-left" role="navigation">
             <div class="nav toggle" style="margin-bottom:10px;">
               <a id="menu_toggle"><i class="fa fa-bars"></i></a>
             </div>
          </nav>
        </div>
      </div>

      <!-- /top navigation -->
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo $__env->make('admin.common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="x_panel">
              <div class="row">
                <div class="x_title">
                  <h2><i class="fa fa-wa fa-flag"></i> <?php echo trans('setup_mgr/branch_group.entry_title'); ?></h2>
                  <div class="-row">
                    <span class="pull-right">
                      <div class="btn-group">
                        <a data-original-title="<?php echo trans('common.create'); ?>"  data-toggle="tooltip" data-placement="top" href='<?php echo e(url('admin/setup_mgr/branch_group/create')); ?>' class="btn btn-sm btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> <?php echo trans('common.create'); ?></a>
                      </div>
                      
                    </span>

                    <span class="pull-right">
                    </span>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content padding-top">
                  <!-- search-filter -->
                  <!-- include("admin.setup_mgr.branch_group.filter") -->

                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                        <th><input type="checkbox" class="flat" name=""></th>
                        <!-- <th><?php echo trans('setup_mgr/branch_group.no'); ?></th> -->
                        <th><?php echo trans('setup_mgr/branch_group.branch_group_name'); ?></th>
                        <th><?php echo trans('setup_mgr/branch_group.status'); ?></th>
                        <th><center><?php echo trans('common.action'); ?></center></th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php $i = 1;?>
                      <?php foreach($branch_groups as $branch_group): ?>
                        <tr>
                          <td><input type="checkbox" class="flat" name=""></td>
                          <!-- <td><?php echo($i); ?></td> -->
                          <td><?php echo e($branch_group->branch_group_name); ?></td>
                          <td>
                            <?php if($branch_group->is_active==1): ?>
                              <button class="btn btn-xs btn-success"><?php echo trans('setup_mgr/branch_group.active'); ?></button>
                            <?php else: ?>
                              <button class="btn btn-xs btn-danger"><?php echo trans('setup_mgr/branch_group.inactive'); ?></button>
                            <?php endif; ?>
                          </td>
                          <td>
                            <center>

                              <a href="<?php echo e(route('admin.setup_mgr.branch_group.show',$branch_group->id)); ?>" class="btn btn-xs btn-success" data-original-title="<?php echo trans('setup_mgr/branch_group.show'); ?>"  data-toggle="tooltip" data-placement="top"><i class="fa fa-eye"></i></a>                         
                              <a href="<?php echo e(route('admin.setup_mgr.branch_group.edit',$branch_group->id)); ?>" class="btn btn-xs btn-primary" data-original-title="<?php echo trans('setup_mgr/branch_group.edit'); ?>" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>

                              <a href="<?php echo e(route('admin.setup_mgr.branch_group.destroy',$branch_group->id)); ?>" class="btn btn-xs btn-danger" title="<?php echo trans('setup_mgr/branch_group.delete'); ?>" data-method="delete" data-confirm="<?php echo trans('setup_mgr/branch_group.are_you_sure'); ?>" data-original-title="<?php echo trans('setup_mgr/branch_group.delete'); ?>"  data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>

                            </center>
                          </td>
                          
                        </tr>
                        
                       <?php $i++; ?>

                     <?php endforeach; ?>
                    
                    </tbody>
                    
                  </table>
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
    </div>

  </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>