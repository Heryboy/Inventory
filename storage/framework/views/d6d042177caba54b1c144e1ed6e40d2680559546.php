 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <form target="_blank" action="<?php echo e(url('admin/report/print_purchase_order_by_supplier')); ?>" novalidate="" action="#" id="demo-form2" data-parsley-validate="" class="">
    
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
       <?php echo $__env->make('admin.report.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
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
            <div class="x_panel">
              <div class="x_title">
                <div class="row">
                  <h2><i class="fa fa-wa fa-flag"></i> <?php echo trans('report/purchase_order.entry_purchase_order_by_supplier'); ?></h2>
                  <div class="clearfix"></div>
                </div>
              </div>
              <?php /* filter */ ?>
              <?php echo $__env->make("admin.report.purchase_order_by_supplier.filter", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                        <td><?php echo trans('report/purchase_order.entry_no'); ?></td>
                        <td><?php echo trans('report/purchase_order.entry_branch'); ?></td>
                        <td><?php echo trans('report/purchase_order.entry_vendor'); ?></td>
                        <th><?php echo trans('report/purchase_order.entry_name'); ?></th>
                        <th><?php echo trans('report/purchase_order.entry_unit'); ?></th>
                        <th><?php echo trans('report/purchase_order.entry_purchase_qty'); ?></th>				
                        <th><?php echo trans('report/purchase_order.entry_discount'); ?></th>	
                        <th><?php echo trans('report/purchase_order.entry_grand_total'); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1;?>
                      <?php foreach($purchaseOrderBySupplier as $row): ?>
                        <tr>
                          <td><?php echo e($i); ?></td>
                          <td><?php echo e($row->branch_name); ?></td>
                          <td><?php echo e($row->name); ?></td>
                          <td><?php echo e($row->item_name); ?></td>
                          <td><?php echo e($row->unit); ?></td>
                          <td><?php echo e(floatval($row->qty)); ?></td>
                          <td><?php echo e(floatval($row->discount_amount)); ?></td>
                          <td><?php echo e(floatval($row->total_amount)); ?></td>
                        </tr>
                        <?php $i ++;?>
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