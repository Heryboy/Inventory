 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <form novalidate="" action="#" id="demo-form2" data-parsley-validate="" class="">
    
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
                  <h2><i class="fa fa-wa fa-flag"></i> <?php echo trans('report/sale_pos_receipt.entry_title'); ?></h2>
                  <div class="clearfix"></div>
                </div>
              </div>
              <?php /* filter */ ?>
              <?php echo $__env->make("admin.report.sale_pos_receipt.filter", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                        <td><?php echo trans('report/sale_pos_receipt.entry_no'); ?></td>
                        <td><?php echo trans('report/sale_pos_receipt.entry_branch'); ?></td>
                        <th><?php echo trans('report/sale_pos_receipt.entry_receipt_no'); ?></th>
                        <th><?php echo trans('report/sale_pos_receipt.entry_sale_by'); ?></th>
                        <th><?php echo trans('report/sale_pos_receipt.entry_transaction_date'); ?></th>
                        <th><?php echo trans('report/sale_pos_receipt.entry_amount'); ?></th>
                        <th><?php echo trans('report/sale_pos_receipt.entry_status'); ?></th>
                        <th><?php echo trans('report/sale_pos_receipt.entry_action'); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $total_amount = 0;
                    ?>
                    <?php $i = 1;?>
                    <?php foreach($saleItems as $row): ?>
                      <tr>
                        <td><?php echo e($i); ?></td>
                        <td>Default</td>
                        <td><?php echo e($row->receipt_no); ?></td>
                        <td><?php echo e($row->user_drawer_name); ?></td>
                        <td><?php echo e($row->transaction_date); ?></td>
                        <td><?php echo e($row->amount); ?></td>
                        <td>Paid</td>
                        <td>
                          <a href="javascript:void(0);" class="btn btn-xs btn-info" data-original-title="<?php echo trans('report/sale_pos_receipt.entry_print'); ?>"  data-toggle="tooltip" data-placement="top"><i class="fa fa-print"></i></a>                         
                          <a href="javascript:void(0);" class="btn btn-xs btn-primary" data-original-title="<?php echo trans('report/sale_pos_receipt.entry_view'); ?>" data-toggle="tooltip" data-placement="top"><i class="fa fa-info"></i></a>
                        </td>
                      </tr>
                      <?php 
                        $total_amount += $row->amount;
                      ?>
                      <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr> 
                        <td colspan="5" style="text-align: right; font-size:16px;background-color:#5c5c5c;color:#fff;"><b>Total</b></td>
                        <td colspan="3" style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_amount, 3)); ?></b></td>
                      </tr>
                    </tfoot>
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