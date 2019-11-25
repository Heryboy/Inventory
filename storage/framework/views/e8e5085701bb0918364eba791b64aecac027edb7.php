<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- main-container -->
  <div class="main_container">

    <!-- page content -->
      <div role="main">
        <div class="">
           <!--  <div class="x_panel">
            </div> -->

            <!-- row -->
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <?php echo $__env->make('admin.common.error_input', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <?php echo $__env->make('admin.common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <div class="x_title">
                    <div class="row">
                      <center><div style="font-weight: bold;font-size:30px;"><?php echo trans('sale_mgr/return.entry_return_form'); ?></div></center>
                    </div>
                  </div>

                  <?php if(!isset($Return)): ?>
                    <?php echo Form::open(['url' => 'admin/sale_mgr/return','class'=>'form-horizontal']); ?>

                  <?php else: ?>
                    <?php echo Form::model($Return,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.sale_mgr.return.update',$Return->id]]); ?>

                  <?php endif; ?>

                    <!-- x_content -->
                    <div class="x_content">
                      <div class="_x_title">
                        <div class="row">

                          <!-- col-sm-4 -->
                          <div class="col-sm-4">

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-calendar"></i> <?php echo trans('sale_mgr/return.entry_return_no'); ?> <span class="validate-required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <?php if(isset($Return)): ?>
                                  <?php echo Form::text('return_val',$Return->return_no,['disabled'=>'disabled','class'=>'form-control','placeholder'=>trans("sale_mgr/return.entry_return_no")]); ?>

                                <input type="hidden" value="<?php echo e($Return->return_no); ?>" name="return_no"/>
                                <?php else: ?>
                                  <?php echo Form::text('return_val',$ReturnSequence,['disabled'=>'disabled','class'=>'form-control','placeholder'=>trans("sale_mgr/return.entry_return_no")]); ?>

                                <input type="hidden" value="<?php echo e($ReturnSequence); ?>" name="return_no"/>
                                <?php endif; ?>
                                
                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-list"></i> <?php echo trans('sale_mgr/return.entry_bill_no'); ?> <span class="validate-required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <?php echo Form::text('bill_no',null,['class'=>'form-control', 'required' => 'required' ,'placeholder'=>trans("sale_mgr/return.entry_bill_no")]); ?>

                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-calendar"></i> <?php echo trans('sale_mgr/return.entry_return_date'); ?> <span class="validate-required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <?php if(isset($Return)): ?>
                                  <?php echo Form::text('return_date',$Return->return_date,['class'=>'date-picker form-control','placeholder'=>trans("sale_mgr/return.entry_return_date")]); ?>

                                <?php else: ?>
                                  <?php echo Form::text('return_date',$current_date,['class'=>'date-picker form-control','placeholder'=>trans("sale_mgr/return.entry_return_date")]); ?>

                                <?php endif; ?>
                                
                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-list"></i> <?php echo trans('sale_mgr/return.entry_return_form'); ?> <span class="validate-required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <?php if(isset($Return)): ?>
                                  <?php echo Form::select('branch_id', $Branches, $Return->branch_id, ['id'=>'branch_id','class'=>'form-control']); ?>

                                <?php else: ?>
                                  <?php echo Form::select('branch_id', $Branches, $default_branch, ['id'=>'branch_id','class'=>'form-control']); ?>

                                <?php endif; ?>
                              </div>
                            </div>
                          </div>

                          <!-- col-sm-4 -->
                          <div class="col-sm-4">
                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-list"></i> <?php echo trans('sale_mgr/return.entry_customer'); ?> <span class="validate-required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <?php echo Form::select('customer_id', $customers, null, ['id'=>'customer_id','class'=>'form-control']); ?>

                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-list"></i> <?php echo trans('sale_mgr/return.entry_return_by'); ?> <span class="validate-required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <?php echo Form::text('return_by',null,['class'=>'form-control','required' => 'required', 'placeholder'=>trans("sale_mgr/return.entry_return_by")]); ?>

                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-list"></i> <?php echo trans('sale_mgr/return.entry_verify_by'); ?></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <?php echo Form::text('verify_by',null,['class'=>'form-control','placeholder'=>trans("sale_mgr/return.entry_verify_by")]); ?>

                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-list"></i> <?php echo trans('sale_mgr/return.entry_description'); ?></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <?php echo Form::textarea('description',null,['rows'=>'1','class'=>'form-control','placeholder'=>trans("sale_mgr/return.entry_description")]); ?>

                              </div>
                            </div>

                          </div>

                          <!-- col-sm-4 -->
                          <div class="col-sm-4">
                            <div class="table-responsive">
                              <table class="table table-bordered table-striped dataTable">
                                <tbody>
                                  <tr>
                                    <th colspan="2">Option :</th>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>
                                        <?php if(isset($Return)): ?>
                                          <input type="checkbox" <?php if($Return->is_returned==1): ?> checked="" <?php endif; ?> class="flat" name="is_returned"> <?php echo trans('sale_mgr/return.entry_is_returned'); ?>

                                        <?php else: ?>
                                          <input type="checkbox" class="flat" name="is_returned"> <?php echo trans('sale_mgr/return.entry_is_returned'); ?>

                                        <?php endif; ?>
                                      </label>
                                    </td>
                                    <td>
                                      
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <!-- form></form> class="form-horizontal form-label-left input_mask">
                              <div class="-form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Sub Total</label>
                                <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                                  <input class="form-control pull-right" id="inputSuccess2" placeholder="$00.00" type="text">
                                </div>
                              </div>

                              <div class="-form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Discount Item</label>
                                <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                                  <input class="form-control pull-right" id="inputSuccess2" placeholder="$00.00" type="text">
                                </div>
                              </div>

                              <div class="-form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Discount Sub Total</label>
                                <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                                  <input class="form-control pull-right" id="inputSuccess2" placeholder="$00.00" type="text">
                                </div>
                              </div>
                            </form> -->
                          </div>

                        </div>
                        <div class="clearfix"></div>
                      </div>

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                          <button data-original-title="<?php echo trans('sale_mgr/return.entry_save'); ?>"  data-toggle="tooltip" class="btn btn-sm btn-success pull-right" name="submit" type="submit"><i class="fa fa-save"></i> Save</button>
                          <a data-original-title="<?php echo trans('sale_mgr/return.entry_back_to_list'); ?>"  data-toggle="tooltip" type="button" data-placement="top" href="<?php echo e(url('admin/sale_mgr/return')); ?>" class="btn btn-sm btn-default pull-right"  style="margin-right: 5px;"><i class="fa fa-reply"></i> <?php echo trans('sale_mgr/return.entry_back_to_list'); ?></a>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <!-- content -->
                          <!-- ############# -->
                          <!-- Table row -->
                          <div class="row">
                            <div class="col-xs-12 table">
                                <table id="item_row" class="table table-bordered table-striped dataTable">
                                  <thead>
                                    <tr>
                                      <th><?php echo trans('sale_mgr/return.entry_barcode'); ?></th>
                                      <th><?php echo trans('sale_mgr/return.entry_item_name'); ?></th>
                                      <th><?php echo trans('sale_mgr/return.entry_unit'); ?></th>
                                      <th><?php echo trans('sale_mgr/return.entry_quantity'); ?></th>
                                      <th><?php echo trans('sale_mgr/return.entry_remark'); ?></th>
                                      <th><?php echo trans('sale_mgr/return.entry_action'); ?></th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                    <?php $attribute_row = 0;?>
                                    <?php if(isset($ReturnDetail)): ?>
                                      <?php foreach($ReturnDetail as $row): ?>
                                        <tr id="attribute-row-item<?php echo e($attribute_row); ?>">
                                          <td><div id="group_barcode<?php echo e($attribute_row); ?>"><?php echo Form::text("barcode[]",$row->Item->item_barcode,["class"=>"form-control","id"=>"item_barcode","disabled"=>"","placeholder"=>trans("stock_mgr/purchase_order.entry_barcode")]); ?></div></td>
                                          <td width="150px">
                                            <div id="group_item<?php echo e($attribute_row); ?>"><?php echo Form::select("item_id[]", $Items, $row->item_id, ["placeholder" => trans("stock_mgr/purchase_order.choose_item"),"id"=>"item_id","data-id"=>$attribute_row,"class"=>"item_id form-control"]); ?></div>
                                          </td>
                                          <td width="150px">
                                            <?php echo Form::select("unit_id[]", $Units, $row->unit_id, ["placeholder" => trans("stock_mgr/purchase_order.choose_unit"),"id"=>"unit","class"=>"form-control"]); ?>

                                          </td>

                                          <td id="group_qty<?php echo e($attribute_row); ?>">
                                            <input name="qty[]" onblur="setTotal(<?php echo e($attribute_row); ?>);" type="text" class="form-control" value="<?php echo e($row->qty); ?>" placeholder="<?php echo trans("stock_mgr/purchase_order.entry_price_quantity"); ?>">
                                          </td>

                                          <td><?php echo Form::text("remark[]",$row->remark,["class"=>"form-control","placeholder"=>trans("stock_mgr/purchase_order.entry_price_remark")]); ?></td>

                                          <td><button type="button" onclick="$('#attribute-row-item<?php echo e($attribute_row); ?>').remove();" data-toggle="tooltip" title="<?php echo trans("stock_mgr/purchase_order.entry_remove"); ?>" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>
                                          <input type="hidden" value="2" id="data_length" name="data_length">
                                        </tr>
                                      <?php $attribute_row++;?>
                                      <?php endforeach; ?>
                                    <?php endif; ?>
                                    
                                  </tbody>

                                  <tfoot>
                                    <tr>
                                      <td colspan="5">&nbsp;</td>
                                      <td>
                                        <button type="button" data-toggle="tooltip" data-placement="top" title="<?php echo trans('stock_mgr/purchase_order.entry_add'); ?>" onclick="addItem();" class="btn btn-primary btn-sm"><i class="fa fa-wa fa-plus"></i></button>
                                      </td>
                                    </tr>
                                  </tfoot>

                                </table>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                          <!-- ############### -->
                        </div>
                      </div>
                    </div>

                  <?php echo Form::close(); ?>


                </div>
              </div>

            </div>

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php echo $__env->make('admin.common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- /footer content -->
        <?php echo $__env->make('admin.sale_mgr.return.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
    <!-- /page content -->
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>