 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
     <?php echo $__env->make('admin.quotation.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                  <h2><i class="fa fa-wa fa-flag"></i> <?php echo trans('quotation/quotation.entry_quotation_list'); ?></h2>
                  <div class="row">
                    <span class="pull-right">
                    <a data-original-title="<?php echo trans('common.create'); ?>"  data-toggle="tooltip" type="button" data-placement="top" href='<?php echo e(url('admin/quotation/create')); ?>' class="btn btn-sm btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> New Quotation</a>
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
                                  <th><?php echo trans('quotation/quotation.entry_quotation_no'); ?></th>
                                  <th><?php echo trans('quotation/quotation.entry_customer_name'); ?></th>
                                  <th><?php echo trans('quotation/quotation.entry_sub_total'); ?></th>
                                  <th><?php echo trans('quotation/quotation.entry_vat_amount'); ?></th>
                                  <th><?php echo trans('quotation/quotation.entry_grand_total'); ?></th>
                                  <td><?php echo trans('quotation/quotation.is_sale_order'); ?></td>
                                  <td><?php echo trans('quotation/quotation.is_approved'); ?></td>
                                  <th><?php echo trans('quotation/quotation.entry_action'); ?></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($Quotations as $row): ?>
                                  <tr>
                                    <td><?php echo e($row->quotation_no); ?></td>
                                    <td><?php echo e($row->Customer->name); ?></td>
                                    <td><?php echo e(Helpers::FormatCurrentcy($row->sub_total)); ?></td>
                                    <td><?php echo e($row->vat_amount); ?></td>
                                    <td><?php echo e(Helpers::FormatCurrentcy($row->grand_total)); ?></td>
                                    <td> 
                                      <center>
                                        <?php if($row->is_sale_order==1): ?>
                                          <button class="btn btn-success btn-xs">Yes</button>
                                        <?php else: ?>
                                          <button class="btn btn-danger btn-xs">No</button>
                                        <?php endif; ?>
                                      </center>
                                    </td>
                                    <td>
                                      <center>
                                        <?php if($row->is_approve==1): ?>
                                          <button class="btn btn-success btn-xs">Yes</button>
                                        <?php else: ?>
                                          <button class="btn btn-danger btn-xs">No</button>
                                        <?php endif; ?>
                                      </center>
                                    </td>
                                    <td>
                                      <center>
                                        <a target="_blank" href="<?php echo e(url('admin/quotation/print_invoice/'.$row->id)); ?>" class="btn btn-xs btn-primary" data-original-title="Print"  data-toggle="tooltip" data-placement="top"><i class="fa fa-print"></i></a>
                                        <?php if($row->is_approve==1): ?>
                                          <a onclick="initSend2SaleOrder(<?php echo e($row->id); ?>,<?php echo e($row->is_sale_order); ?>);" href="javascript:void(0);" class="btn btn-xs btn-success" data-original-title="<?php echo trans('quotation/quotation.send_saleorder'); ?>"  data-toggle="tooltip" data-placement="top"><i class="fa fa-file"></i></a>
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('admin.quotation.show',$row->id)); ?>" class="btn btn-xs btn-info" data-original-title="<?php echo trans('setup_mgr/item.show'); ?>"  data-toggle="tooltip" data-placement="top"><i class="fa fa-eye"></i></a>                         
                                        <a href="<?php echo e(route('admin.quotation.edit',$row->id)); ?>" class="btn btn-xs btn-primary" data-original-title="<?php echo trans('setup_mgr/item.edit'); ?>" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                                        <!-- <a href="<?php echo e(route('admin.quotation.destroy',$row->id)); ?>" class="btn btn-xs btn-danger" title="<?php echo trans('setup_mgr/item.delete'); ?>" data-method="delete" data-confirm="<?php echo trans('setup_mgr/item.are_you_sure'); ?>" data-original-title="<?php echo trans('setup_mgr/item.delete'); ?>"  data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a> -->
                                      </center>
                                    </td>
                                  </tr>
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

  <script type="text/javascript">
    function initSend2SaleOrder(qid,is_sale_order){
      var dataString = {'qid':qid,'is_sale_order':is_sale_order};
      $.ajax({  
        type: "POST",  
        url: "<?php echo e(url("admin/quotation_send2SaleOrder")); ?>",  
        data: dataString,
        dataType: 'json',
        beforeSend: function() 
        {
          toastr.info("Loading ...");
        },  
        success: function(response)
        {
          if(response==1){
            toastr.success("Quotation has been sent to sale order.");
            window.location.reload(true);
          }else{
            toastr.warning("Quotation has already sent to sale order!");
          }
        }
      }).fail(function(error_response) 
      {
        toastr.warning("Problem occur while you are trying to decrease item!");
        // setTimeout("vpb_remove_added_video();", 1000);
      });
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>