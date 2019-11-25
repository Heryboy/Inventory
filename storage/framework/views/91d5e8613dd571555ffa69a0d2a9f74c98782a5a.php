 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
        <?php echo $__env->make('admin.stock_mgr.actual_stock.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- include('admin.stock_mgr.actual_stock.form_purchase') -->
      </div>

      <!-- top navigation -->
      <div class="top_nav">
         <div class="nav_menu">
           <nav class="" role="navigation">
             <div class="nav toggle" style="margin-bottom:10px;">
               <a id="menu_toggle"><i class="fa fa-bars"></i></a>
             </div>
           </nav>
           <?php /* <?php echo $__env->make("admin.common.advance_search", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> */ ?>
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
                    <h2><i class="fa fa-wa fa-flag"></i> <?php echo trans('stock_mgr/actual_stock.entry_title'); ?></h2>
                    <div class="-row">
                      <span class="pull-right">
                        <div class="btn-group pull-left">
                          <button form-id="form-actual-stock" data-toggle="tooltip" type="submit" data-placement="top" class="btn btn-sm btn-success" name="submit"><i class="fa fa-wa fa-cogs"></i> Generate</button>
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
                    
                    <?php echo Form::open(['url' => 'admin/stock_mgr/actual_stock','id'=>'form-actual-stock','files'=> true,'class'=>'form-horizontal']); ?>

                      <!-- search-filter -->
                      <?php echo $__env->make("admin.stock_mgr.actual_stock.filter", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      <table id="_example1" class="table table-bordered table-striped dataTable">

                        <thead>
                          <tr>
                            <th><?php echo trans('stock_mgr/actual_stock.entry_item_list'); ?></th>
                            <th><?php echo trans('stock_mgr/actual_stock.entry_item_code'); ?></th>
                            <th><?php echo trans('stock_mgr/actual_stock.entry_unit'); ?></th>
                            <th><?php echo trans('stock_mgr/actual_stock.entry_qty'); ?></th>
                          </tr>
                        </thead>

                        <tbody>
                        
                          <?php $i = 1;?>
                          <?php if(isset($actual_stock_items)): ?>
                            <?php foreach($actual_stock_items as $stock_item): ?>
                                <tr>
                                  <td><?php echo e($stock_item->item_name); ?><input type="hidden" value="<?php echo e($stock_item->item_id); ?>" name="item_id[]"/></td>
                                  <td><?php echo e($stock_item->item_code); ?></td>
                                  <td><?php echo e($stock_item->unit); ?> <input type="hidden" value="<?php echo e($stock_item->unit_id); ?>" name="unit_id[]"/></td>
                                  <td>
                                    <input style="width: 150px;" placeholder="Quantity" type="number" name="qty[]" class="form-control" value="<?php echo e($stock_item->hello); ?>">
                                  </td>
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