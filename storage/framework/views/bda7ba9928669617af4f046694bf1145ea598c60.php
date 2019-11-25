 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- include('admin.sale_mgr.sale_order._modal_invoice') -->
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
      <?php echo $__env->make('admin.sale_mgr.sale_order.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
    <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="row"> 
            <?php echo $__env->make('admin.common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="x_panel">
              <div class="x_title">
                <div class="row">
                  <h2><i class="fa fa-wa fa-flag"></i> <?php echo trans('sale_mgr/sale_order.entry_sale_order_list'); ?></h2>
                  <div class="row">
                    <span class="pull-right">
                    <a data-original-title="<?php echo trans('common.create'); ?>"  data-toggle="tooltip" type="button" data-placement="top" href='<?php echo e(url('admin/sale_mgr/sale_order/create')); ?>' class="btn btn-sm btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> New Order</a>
                    </span>
                  </div>
                  <!-- include('admin.common.tool_box') -->
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>

            <!-- row -->
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <!-- <div class="x_title">
                    <div class="row">
                      <form class="form-horizontal form-label-left">
                        <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-12"><i class="fa fa fa-th-large"></i> Item Category</label>
                          <div class="col-md-8 col-sm-8 col-xs-12">
                            <input class="form-control" placeholder="Item Category" type="text">
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="clearfix"></div>
                  </div> -->
                  <div class="-x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- content -->
                        <!-- ############# -->
                        <!-- Table row -->
                        <div class="row">
                          <div class="col-xs-12">
                            <?php /* <?php echo $__env->make("admin.quotation.filter", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> */ ?>
                            <!-- <table class="table table-striped"> -->
                            <table id="example1" class="table table-bordered table-striped dataTable">
                              <thead>
                                <tr>
                                  <th><?php echo trans('sale_mgr/sale_order.entry_no'); ?></th>
                                  <th><?php echo trans('sale_mgr/sale_order.entry_sale_order_no'); ?></th>
                                  <th><?php echo trans('sale_mgr/sale_order.entry_customer_name'); ?></th>
                                  <th><?php echo trans('sale_mgr/sale_order.entry_tax_amount'); ?></th>
                                  <th><?php echo trans('sale_mgr/sale_order.entry_sub_total'); ?></th>
                                  <th><?php echo trans('sale_mgr/sale_order.entry_paid_amount'); ?></th>
                                  <th><?php echo trans('sale_mgr/sale_order.entry_remaining_amount'); ?></th>
                                  <th><?php echo trans('sale_mgr/sale_order.entry_action'); ?></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i = 1;?>
                                <?php foreach($SaleOrders as $row): ?>
                                  <tr>
                                    <td><?php echo e($i); ?></td>
                                    <td><?php echo e($row->order_no); ?></td>
                                    <td><?php echo e($row->Customer->name); ?></td>
                                    <td><?php echo e($row->tax_amount); ?></td>
                                    <td><?php echo e(Helpers::FormatCurrentcy($row->sub_total_amount)); ?></td>
                                    <td><?php echo e(Helpers::FormatCurrentcy(0)); ?></td>
                                    <td><?php echo e(Helpers::FormatCurrentcy($row->sub_total_amount)); ?></td>
                                    <td>
                                      <center>
                                        <a target="_blank" href="<?php echo e(url('admin/sale_mgr/print_invoice/'.$row->id)); ?>" class="btn btn-xs btn-primary" data-original-title="Print"  data-toggle="tooltip" data-placement="top"><i class="fa fa-print"></i></a>
                                        <a href="<?php echo e(route('admin.sale_mgr.sale_order.edit',$row->id)); ?>" class="btn btn-xs btn-success" data-original-title="<?php echo trans('sale_mgr/sale_order.add_payment'); ?>" data-toggle="tooltip" data-placement="top"><i class="fa fa-money"></i></a>
                                        <a href="<?php echo e(route('admin.sale_mgr.sale_order.edit',$row->id)); ?>" class="btn btn-xs btn-primary" data-original-title="<?php echo trans('sale_mgr/sale_order.edit'); ?>" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                                      </center>
                                    </td>
                                  </tr>
                                  <?php $i ++ ;?>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- ############### -->
                      </div>
                    </div>
                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php echo $__env->make('admin.common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- /footer content -->

      </div>
    <!-- /page content -->
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>