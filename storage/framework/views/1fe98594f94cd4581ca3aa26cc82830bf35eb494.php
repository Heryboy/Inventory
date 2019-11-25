 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
        <?php echo $__env->make('admin.stock_mgr.purchase_order.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('admin.stock_mgr.purchase_order.form_purchase', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
      <div class="right_col" role="main">
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo $__env->make('admin.common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="x_panel">
              <div class="row">
                <div class="x_title">
                  <h2><i class="fa fa-wa fa-flag"></i> <?php echo trans('stock_mgr/purchase_order.entry_title'); ?></h2>
                  <div class="-row">
                    <span class="pull-right">
                      <!-- <div class="btn-group">
                        <button type="button" class="btn btn-danger btn-sm">Action</button>
                        <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Action</a>
                          </li>
                          <li><a href="#">Another action</a>
                          </li>
                          <li><a href="#">Something else here</a>
                          </li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a>
                          </li>
                        </ul>
                      </div> -->
                      <div class="btn-group pull-left">
                        <a data-toggle="modal" data-target=".bs-example-modal-lg"  data-toggle="tooltip" type="button" data-placement="top" href="javascript:void(0);" class="btn btn-sm btn-default" name="submit"><i class="fa fa-wa fa-plus"></i> <?php echo trans('common.create'); ?></a>
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
                  <?php echo $__env->make("admin.setup_mgr.item.filter", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <table id="example1" class="table table-bordered table-striped dataTable">

                    <thead>
                      <tr>
                        <th><input type="checkbox" class="flat" name=""></th>
                        <th><?php echo trans('stock_mgr/purchase_order.entry_invoice_no'); ?></th>
                        <th><?php echo trans('stock_mgr/purchase_order.entry_supplier_name'); ?></th>
                        <th><?php echo trans('stock_mgr/purchase_order.entry_issued_date'); ?></th>
                        <th><?php echo trans('stock_mgr/purchase_order.entry_shipping'); ?></th>
                        <th><?php echo trans('stock_mgr/purchase_order.entry_vat_amount'); ?></th>
                        <th><?php echo trans('stock_mgr/purchase_order.entry_sub_total'); ?></th>
                        <th><?php echo trans('stock_mgr/purchase_order.entry_grand_total'); ?></th>
                        <th><?php echo "Is Approved"; ?>?</th>
                        <th><?php echo trans('stock_mgr/purchase_order.entry_action'); ?></th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    
                      <?php $i = 1;?>
                      <?php if(isset($PurchaseOrders)): ?>
                        <?php foreach($PurchaseOrders as $purchase_order): ?>
                            <tr>
                              <td><input type="checkbox" class="flat" name=""></td>
                              <td><?php echo e($purchase_order->po_number); ?></td>
                              <td><?php echo e($purchase_order->supplier_name); ?></td>
                              <td><?php echo e(Helpers::FormatDate($purchase_order->po_date)); ?></td>
                              <td><?php echo e($purchase_order->shipping); ?></td>
                              <td><?php echo e($purchase_order->vat_amount); ?></td>
                              <td><?php echo e($purchase_order->sub_total); ?></td>
                              <td><?php echo e($purchase_order->sub_total); ?></td>
                              <td>
                                <?php if($purchase_order->is_approve == 1): ?>
                                  <?php echo e("Yes"); ?>

                                <?php else: ?>
                                  <?php echo e("No"); ?>

                                <?php endif; ?>
                              </td>
                              <td>
                                <center>
                                  <a href="<?php echo e(route('admin.stock_mgr.purchase_order.show',$purchase_order->id)); ?>" class="btn btn-xs btn-success" data-original-title="<?php echo trans('stock_mgr/purchase_order.entry_show'); ?>"  data-toggle="tooltip" data-placement="top"><i class="fa fa-eye"></i></a>                         
                                  <a href="<?php echo e(route('admin.stock_mgr.purchase_order.edit',$purchase_order->id)); ?>" class="btn btn-xs btn-primary" data-original-title="<?php echo trans('stock_mgr/purchase_order.entry_edit'); ?>" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                                  <!-- <a href="<?php echo e(route('admin.stock_mgr.purchase_order.destroy',$purchase_order->id)); ?>" class="btn btn-xs btn-danger" title="<?php echo trans('stock_mgr/purchase_order.entry_delete'); ?>" data-method="delete" data-confirm="<?php echo trans('stock_mgr/purchase_order.are_you_sure'); ?>" data-original-title="<?php echo trans('stock_mgr/purchase_order.entry_delete'); ?>"  data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a> -->
                                </center>
                              </td>
                             
                             </tr>
                            
                           <?php $i++; ?>

                        <?php endforeach; ?>
                      <?php endif; ?>
                    
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