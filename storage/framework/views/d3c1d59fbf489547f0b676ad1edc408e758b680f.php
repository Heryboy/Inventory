 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
        <?php echo $__env->make('admin.stock_mgr.adjustment_stock.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                  <h2><i class="fa fa-wa fa-flag"></i> <?php echo trans('stock_mgr/adjustment_stock.entry_title'); ?></h2>
                  <div class="-row">
                    <span class="pull-right">
                      <div class="btn-group pull-left">
                        <button type="submit" form="form-submit" data-toggle="modal" data-target=".bs-example-modal-lg"  data-toggle="tooltip" type="button" data-placement="top" href="javascript:void(0);" class="btn btn-sm btn-success" name="submit"><i class="fa fa-wa fa-save"></i> <?php echo trans('stock_mgr/adjustment_stock.entry_save'); ?></button>
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
                  <?php echo Form::open(['url' => 'admin/stock_mgr/adjustment_stock','id' => 'form-submit','class'=>'form-horizontal']); ?>

                    <?php echo $__env->make("admin.stock_mgr.adjustment_stock.filter", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <table id="_example1" class="table table-bordered table-striped dataTable">

                      <thead>
                        <tr>
                          <th><?php echo trans('stock_mgr/adjustment_stock.entry_item_list'); ?></th>
                          <th><?php echo trans('stock_mgr/adjustment_stock.entry_unit'); ?></th>
                          <th>Inventory Count</th>
                          <th>Lost Quantity</th>
                          <th>Damage Quantity</th>
                          <th>Adjustment By</th>
                          <th><?php echo trans('stock_mgr/adjustment_stock.entry_reason'); ?></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                        <?php $i = 1;?>
                        <?php if(isset($adjustment_stock_items_stock_items)): ?>
                          <?php foreach($adjustment_stock_items_stock_items as $stock_item): ?>
                            <tr>
                              <td><?php echo e($stock_item->item_name); ?><input value="<?php echo e($stock_item->item_id); ?>" type="hidden" name="item_id[]"></td>
                              <td><?php echo e($stock_item->unit); ?><input type="hidden" value="<?php echo e($stock_item->unit_id); ?>" name="unit_id[]"></td>
                              <td><center><input style="width:100px;" autocomplete="off" type="number" class="form-control" value="<?php echo e($stock_item->qty); ?>" name="adjust_qty[]"></center></td>
                              <td><center><input style="width:100px;" autocomplete="off" type="number" class="form-control" value="<?php echo e($stock_item->lost_qty); ?>" name="lost_qty[]"></center></td>
                              <td><center><input style="width:100px;" autocomplete="off" type="number" class="form-control" value="<?php echo e($stock_item->damage_qty); ?>" name="damage_qty[]"></center></td>
                              <td><center><input style="width:100px;" autocomplete="off" value="<?php echo e($stock_item->adjust_by); ?>" type="text" class="form-control" name="adjust_by[]"></center></td>
                              <td><center><input autocomplete="off" type="text" class="form-control" value="<?php echo e($stock_item->reason); ?>" name="reason[]"></center></td>
                            </tr>
                            <?php $i++; ?>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      
                      </tbody>
                    </table>
                  <?php echo Form::close(); ?>

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