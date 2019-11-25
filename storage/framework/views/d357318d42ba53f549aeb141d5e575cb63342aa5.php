 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- <form novalidate="" method="patch" action="<?php echo e(url('admin/setup_mgr/schedule/create')); ?>" id="demo-form2" data-parsley-validate="" class=""> -->
   
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
       <?php echo $__env->make('admin.common.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
      <!-- top navigation -->
      <div class="top_nav">
         <div class="nav_menu">
           <nav class="" role="navigation">
             <div class="nav toggle" style="margin-bottom:10px;">
               <a id="menu_toggle"><i class="fa fa-bars"></i></a>
             </div>
             <!-- block button -->
             <div class="pull-right" style="padding-top:10px;">
              
              <!-- <button type="submmit" value="Submit" data-toggle="tooltip" data-placement="top" href='<?php echo e(url('admin/users/create')); ?>' class="btn btn-primary"><?php echo trans('common.create'); ?></button> -->

              <!-- action top -->
              
              <a data-original-title="<?php echo trans('common.create'); ?>"  data-toggle="tooltip" data-placement="top" href='<?php echo e(url('setup/sale/stock/bank_account/create')); ?>' class="btn btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> <span class="hidden-xs"><?php echo trans('common.create'); ?></span></a>

              <!-- <a data-original-title="<?php echo trans('common.delete'); ?>"  data-toggle="tooltip" data-placement="top" href='#' class="btn btn-danger" name="submit"><i class="fa fa-wa fa-trash"></i> <span class="hidden-xs"><?php echo trans('common.delete'); ?></span></a> -->

             </div> 
           </nav>
         </div>
      </div><!-- /top navigation -->
      <!-- page content -->
      <div style="min-height: 650px;" class="right_col" role="main">
        <?php echo $__env->make('admin.common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="row">

          <div class="clearfix"></div>

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><i class="fa fa-group"></i>  <?php echo trans('setup_mgr/bank_account.title'); ?></h2>
                <?php echo $__env->make('admin.common.tool_box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                      
                        <th><?php echo trans('common.no'); ?></th>
                        <th><?php echo trans('setup_mgr/bank_account.name'); ?></th>
                        <th><?php echo trans('setup_mgr/bank_account.alias'); ?></th>
                        <th><?php echo trans('setup_mgr/bank_account.amount'); ?></th>                    
                        <th><?php echo trans('common.action'); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1;?>
                      <?php foreach($bank_account as $bank_accounts): ?>
                        <tr>
                          <td><?php echo($i); ?></td>
                          <td><?php echo e($bank_accounts -> name); ?></td>
                          <td><?php echo e($bank_accounts -> alias); ?></td>
                          <td><?php echo e($bank_accounts -> amount); ?></td>
                        
                          <td>
                            <a href="<?php echo e(route('setup.sale.stock.bank_account.show',$bank_accounts->id)); ?>" class="btn btn-sm btn-info" data-original-title="<?php echo trans('common.show'); ?>"  data-toggle="tooltip" data-placement="top"><i class="fa fa-info"></i></a>
                            <a href="<?php echo e(route('setup.sale.stock.bank_account.edit',$bank_accounts->id)); ?>" class="btn btn-sm btn-primary" data-original-title="<?php echo trans('common.edit'); ?>"  data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                            <a href="<?php echo e(route('setup.sale.stock.bank_account.destroy',$bank_accounts->id)); ?>" class="btn btn-sm btn-danger" data-original-title="<?php echo trans('common.delete'); ?>"  data-toggle="tooltip" data-placement="top" data-method="delete" data-confirm="<?php echo trans('common.are_you_sure'); ?>">
                              <i class="fa fa-trash"></i>
                            </a>
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

  <!-- </form> -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>