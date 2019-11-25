 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- main-container -->
  <div class="main_container" id="main_container" style="background-color:#f4f4f4;">
    <!-- page content -->
    <div role="main"> 
      <div class="nav_menu">
        <nav class="" role="navigation">
          <div class="nav toggle padding-bottom-sm">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <div class="pull-right padding-bottom-sm">
            <?php echo $__env->make('admin.common.action_top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div> 
        </nav>
      </div>

      <div class="container-fluid" style="padding:20px;min-height:100vh;">
        <!-- row top_tiles -->
        <div class="row top_tiles">
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-users"></i>
              </div>
              <div class="count"><?php echo e($customers); ?></div>
              <h3>Customers</h3>
              <p> <a href="<?php echo e(url('admin/customer_mgr/customer')); ?>">View more customers ...</a></p>
            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-cubes"></i>
              </div>
              <div class="count"><?php echo e($suppliers); ?>

              </div>
              <h3>Suppliers</h3>
              <p><a href="<?php echo e(url('admin/supplier_mgr/supplier')); ?>">View More Suppliers ...</a></p>
            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-edit"></i></div>
              <div class="count"><?php echo e($items); ?></div>
              <h3>Items</h3>
              <p> <a href="<?php echo e(url('admin/setup_mgr/item')); ?>">View More Items ...</a></p>
            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-line-chart"></i>
              </div>
              <div class="count">
                <?php echo e($quotations); ?>

              </div>
              <h3>Quotations</h3>
              <p><a href="<?php echo e(url('admin/quotation')); ?>">View More Quotations ...</a></p>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>