 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <form action="#" novalidate="" id="demo-form2" data-parsley-validate="" class="">
    
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
                  <h2><i class="fa fa-wa fa-flag"></i> <?php echo trans('report/summary_report.entry_title'); ?></h2>
                  <div class="clearfix"></div>
                </div>
              </div>
              <?php /* filter */ ?>
              <?php echo $__env->make("admin.report.sale_summary.filter", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <!-- row -->
              <div style="padding-top:10px;">
                <center>
                  <?php 
                    $total_gross_sale = 0;
                    $total_discount = 0;
                    $total_netsale = 0;
                    $total_cost_product = 0;
                    $total_gross_profit = 0;
                    $total_tax = 0;
                    $total_margin = 0;
                  ?>
                  <?php foreach($summaryReports as $row): ?>
                    <?php 
                      $total_gross_sale += number_format($row->sub_total_amount, 3);
                      $total_discount += number_format($row->total_discount, 3);
                      $total_netsale += number_format(($row->sub_total_amount - $row->total_discount), 3);
                      $total_cost_product += number_format($row->total_cost_amount, 3);
                      $total_gross_profit += number_format(($row->sub_total_amount - $row->total_cost_amount), 3);
                      $total_tax += number_format($row->total_tax_amount, 3);
                      $total_margin += number_format(($row->sub_total_amount - $row->total_cost_amount), 3);
                    ?>
                  <?php endforeach; ?>
                  <!-- row top_tiles -->
                  <div class="row top_tiles">
                    <div class="animated flipInY col-sm-3 col-xs-12">
                      <div class="tile-stats">
                        <!-- <div class="icon"><i class="fa fa-users"></i></div> -->
                        <div class="count"><center><?php echo e(number_format($total_gross_sale, 3)); ?> $</center></div>
                        <center><h4>Gross Sales</h4></center>
                        <!-- <p> <a href="<?php echo e(url('admin/customer_mgr/customer')); ?>">View more customers ...</a></p> -->
                      </div>
                    </div>
                    
                    <div class="animated flipInY col-sm-3 col-xs-12">
                      <div class="tile-stats">
                        <!-- <div class="icon"><i class="fa fa-users"></i></div> -->
                        <div class="count"><center><?php echo e(number_format($total_discount, 3)); ?> $</center></div>
                        <center><h4>Discounts</h4></center>
                        <!-- <p> <a href="<?php echo e(url('admin/customer_mgr/customer')); ?>">View more customers ...</a></p> -->
                      </div>
                    </div>

                    <div class="animated flipInY col-sm-3 col-xs-12">
                      <div class="tile-stats">
                        <!-- <div class="icon"><i class="fa fa-users"></i></div> -->
                        <div class="count"><center><?php echo e(number_format($total_netsale, 3)); ?> $</center></div>
                        <center><h4>Net Sales</h4></center>
                        <!-- <p> <a href="<?php echo e(url('admin/customer_mgr/customer')); ?>">View more customers ...</a></p> -->
                      </div>
                    </div>

                    <div class="animated flipInY col-sm-3 col-xs-12">
                      <div class="tile-stats">
                        <!-- <div class="icon"><i class="fa fa-users"></i></div> -->
                        <div class="count"><center><?php echo e(number_format($total_gross_profit, 3)); ?> $</center></div>
                        <center><h4>Gross Profit</h4></center>
                        <!-- <p> <a href="<?php echo e(url('admin/customer_mgr/customer')); ?>">View more customers ...</a></p> -->
                      </div>
                    </div>

                    <div class="animated flipInY col-sm-3 col-xs-12">
                      <div class="tile-stats">
                        <!-- <div class="icon"><i class="fa fa-users"></i></div> -->
                        <div class="count"><center><?php echo e(number_format($total_tax, 3)); ?> $</center></div>
                        <center><h4>Taxes</h4></center>
                        <!-- <p> <a href="<?php echo e(url('admin/customer_mgr/customer')); ?>">View more customers ...</a></p> -->
                      </div>
                    </div>
                  </center>
                </div>
              </div>

              <!--start-summary-->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="_example1" class="table table-bordered table-striped dataTable">
                      <thead>
                        <tr>
                          <th><?php echo e('Date'); ?></th>
                          <th><?php echo e('Gross Sale'); ?></th>
                          <th><?php echo e('Discounts'); ?></th>
                          <th><?php echo e('Net Sales'); ?></th>
                          <th><?php echo e('Cost Of Product'); ?></th>
                          <th><?php echo e('Gross Profit'); ?></th>
                          <th><?php echo e('Taxes'); ?></th>
                          <th><?php echo e('Margin'); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                          <?php foreach($summaryReports as $row): ?>
                            <tr>
                              <td><?php echo e($row->date); ?></td>
                              <td><?php echo e(number_format($row->sub_total_amount, 3)); ?></td>
                              <td><?php echo e(number_format($row->total_discount, 3)); ?></td>
                              <td><?php echo e(number_format(($row->sub_total_amount - $row->total_discount), 3)); ?></td>
                              <td><?php echo e(number_format($row->total_cost_amount, 3)); ?></td>
                              <td><?php echo e(number_format(($row->sub_total_amount - $row->total_cost_amount), 3)); ?></td>
                              <td><?php echo e(number_format($row->total_tax_amount, 3)); ?></td>
                              <td><?php echo e(number_format(($row->sub_total_amount - $row->total_cost_amount), 3)); ?></td>
                            </tr>
                          <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                        <tr> 
                          <td style="text-align: right; font-size:16px;background-color:#5c5c5c;color:#fff;"><b>Total: </b></td>
                          <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_gross_sale, 3)); ?></b> <span class="pull-right">$</span></td>
                          <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_discount, 3)); ?></b></b> <span class="pull-right">$</span></td>
                          <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_netsale, 3)); ?></b></b> <span class="pull-right">$</span></td>
                          <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_cost_product, 3)); ?></b></b> <span class="pull-right">$</span></td>
                          <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_gross_profit, 3)); ?></b></b> <span class="pull-right">$</span></td>
                          <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_tax, 3)); ?></b></b> <span class="pull-right">$</span></td>
                          <td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_margin, 3)); ?></b></b> <span class="pull-right">$</span></td>
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