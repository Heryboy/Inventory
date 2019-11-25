 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('admin.customer_mgr.customer.modal_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                      <center><div style="font-weight: bold;font-size:30px;"><?php echo trans('sale_mgr/sale_order.entry_title'); ?></div></center>
                    </div>
                  </div>

                  <?php if(!isset($SaleOrders)): ?>
                    <?php echo Form::open(['url' => 'admin/sale_mgr/sale_order','class'=>'form-horizontal']); ?>

                  <?php else: ?>
                    <?php echo Form::model($SaleOrders,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.sale_mgr.sale_order.update',$SaleOrders->id]]); ?>

                  <?php endif; ?>

                    <!-- x_content -->
                    <div class="x_content">
                      <div class="x_title">
                        <div class="row">
                          <!-- col-sm-4 -->
                          <div class="col-sm-5">
                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-pencil"></i> <?php echo trans('sale_mgr/sale_order.entry_sale_order_no'); ?></label> 
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <?php if(isset($SaleOrders)): ?>
                                  <?php echo Form::text('sale_order_sequence',$SaleOrders->sale_order_no,['disabled'=>'disabled','class'=>'form-control','placeholder'=>trans("sale_mgr/sale_order.entry_sale_order_no")]); ?>

                                  <input type="hidden" value="<?php echo e($SaleOrders->sale_order_no); ?>" name="sale_order_no"/>
                                <?php else: ?>
                                  <?php echo Form::text('sale_order_sequence',$sale_order_sequence,['disabled'=>'disabled','class'=>'form-control','placeholder'=>trans("sale_mgr/sale_order.entry_sale_order_no")]); ?>

                                  <input type="hidden" value="<?php echo e($sale_order_sequence); ?>" name="sale_order_no"/>
                                <?php endif; ?>
                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-calendar"></i> <?php echo trans('sale_mgr/sale_order.entry_sale_order_date'); ?></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <?php if(isset($SaleOrders)): ?>
                                  <?php echo Form::text('sale_order_date',Helpers::FormatDateSql($SaleOrders->sale_order_date),['class'=>'date-picker form-control','placeholder'=>trans("sale_mgr/sale_order.entry_sale_order_date")]); ?>

                                <?php else: ?>
                                  <?php echo Form::text('sale_order_date',date("Y-m-d"),['class'=>'date-picker form-control','placeholder'=>trans("sale_mgr/sale_order.entry_sale_order_date")]); ?>

                                <?php endif; ?>
                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-calendar"></i> <?php echo trans('sale_mgr/sale_order.entry_expired_date'); ?></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <?php if(isset($SaleOrders)): ?>
                                  <?php echo Form::text('expired_date',Helpers::FormatDateSql($SaleOrders->expired_date),['class'=>'date-picker form-control','placeholder'=>trans("sale_mgr/sale_order.entry_expired_date")]); ?>

                                <?php else: ?>
                                  <?php echo Form::text('expired_date',null,['class'=>'date-picker form-control','placeholder'=>trans("sale_mgr/sale_order.entry_expired_date")]); ?>

                                <?php endif; ?>
                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-users"></i> <?php echo trans('sale_mgr/sale_order.entry_customer_name'); ?></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                  <!-- !! Form::text('customer_id',null,['class'=>'form-control','placeholder'=>trans("sale_mgr/sale_order.entry_customer_name")]) !!} -->
                                  <?php echo Form::select('customer_id', $customers, null, ['id'=>'customer_id','class'=>'form-control']); ?>

                                  <span class="input-group-btn">
                                    <button data-toggle="modal" data-target=".bs-example-modal-lg" type="button" class="btn btn-primary"><i class="fa fa-wa fa-location-arrow"></i></button>
                                  </span>
                                </div>
                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-pencil"></i> <?php echo trans('sale_mgr/sale_order.entry_description'); ?></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <?php echo Form::textarea('description',null,['rows'=>'4','class'=>'form-control','placeholder'=>trans("sale_mgr/sale_order.entry_description")]); ?>

                              </div>
                            </div>
                          </div>

                          <!-- col-sm-4 -->
                          <div class="col-sm-2">
                            <!-- <center><div style="font-weight: bold;font-size:30px;text-decoration: underline;">Quotation</div></center> -->
                          </div>

                          <!-- col-sm-4 -->
                          <div class="col-sm-5">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="table-responsive">
                                  <table class="table table-bordered table-striped dataTable">
                                    <tbody>
                                      <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>
                                          <?php if(isset($SaleOrders)): ?>
                                            <input type="text" class="pull-left form-control" disabled="" onblur="Onshipping();" value="<?php echo e(Helpers::FormatCurrentcy($SaleOrders->sub_total)); ?>" name="sub_total_val">
                                            <input type="hidden" value="<?php echo e($SaleOrders->sub_total); ?>" name="sub_total">
                                          <?php else: ?>
                                            <input type="text" class="pull-left form-control" disabled="" onblur="Onshipping();" value="" name="sub_total_val">
                                            <input type="hidden" name="sub_total">
                                          <?php endif; ?>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th>Shipping:</th>
                                        <td>
                                          <?php if(isset($SaleOrders)): ?>
                                            <input type="text" class="pull-left form-control" disabled="" onblur="Onshipping();" value="<?php echo e($SaleOrders->shipping); ?>" name="shipping">
                                          <?php else: ?>
                                            <input type="text" class="pull-left form-control" disabled="" onblur="Onshipping();" value="0.00" name="shipping">
                                          <?php endif; ?>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th>Discount %</th>
                                        <td>
                                          <?php if(isset($SaleOrders)): ?>
                                            <input type="text" class="pull-left form-control" disabled="" onblur="subDiscount();" value="<?php echo e($SaleOrders->sub_discount); ?>" name="sub_discount">
                                          <?php else: ?>
                                            <input type="text" class="pull-left form-control" disabled="" onblur="subDiscount();" value="" name="sub_discount">
                                          <?php endif; ?>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th>Tax (%)</th>
                                        <td>
                                          <?php if(isset($SaleOrders)): ?>
                                            <input disabled="" type="text" class="pull-left form-control" onblur="vat();" value="<?php echo e($SaleOrders->vat_percentage); ?>" name="tax">
                                          <?php else: ?>
                                            <input disabled="" type="text" class="pull-left form-control" onblur="vat();" value="<?php echo e(TAX); ?>" name="tax">
                                          <?php endif; ?>
                                        </td>
                                      </tr>
                                      <tr>
                                        <?php if(isset($SaleOrders)): ?>
                                          <th>Grand Total: <input type="hidden" value="<?php echo e($SaleOrders->grand_total); ?>" name="grand_total"></th>
                                          <td id="grand_total"><b><?php echo e(Helpers::FormatCurrentcy($SaleOrders->grand_total)); ?></b></td>
                                        <?php else: ?>
                                          <th>Grand Total: <input type="hidden" name="grand_total"></th>
                                          <td id="grand_total"><b>0.00</b></td>
                                        <?php endif; ?>
                                      </tr>
                                      <tr>
                                        <td colspan="2">
                                          <label>
                                            <?php if(isset($SaleOrders)): ?>
                                              <input <?php if($SaleOrders->is_approve==1): ?> checked='checked' <?php endif; ?> type="checkbox" class="flat" name="is_approve"> Is Approved?
                                            <?php else: ?>
                                              <input type="checkbox" class="flat" name="is_approve"> Is Approved?
                                            <?php endif; ?>
                                          </label>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <table class="table table-bordered table-striped dataTable">
                                  <tbody>
                                    <tr>
                                      <th style="width:50%">Paid Amount:</th>
                                      <td>
                                        <input type="text" class="pull-left form-control" disabled="" value="0" name="paid_amount">
                                      </td>
                                    </tr>
                                    <tr>
                                      <th style="width:50%">Due Amount:</th>
                                      <td>
                                        <input type="text" class="pull-left form-control" value="0" name="due_amount">
                                      </td>
                                    </tr>
                                    <tr>
                                      <th style="width:50%">Add Due Amount:</th>
                                      <td>
                                        <input type="text" class="pull-left form-control" value="0" name="add_due_amount">
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
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
                          <?php /* <button class="btn btn-default"><i class="fa fa-print"></i> Print</button> */ ?>
                          <button class="btn btn-success pull-right" name="submit" type="submit"><i class="fa fa-save"></i> Save</button>
                          <a href="<?php echo e(url('admin/sale_mgr/sale_order')); ?>" class="btn btn-default pull-right"  style="margin-right: 5px;"><i class="fa fa-reply"></i> Back to Listing</a>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <!-- content -->
                          <!-- ############# -->
                          <!-- Table row -->
                          <div class="row">
                            <div class="col-xs-12 table">
                              <?php $attribute_row = 0;?>
                                <table id="item_row" class="table table-bordered table-striped dataTable">
                                  <thead>
                                    <tr>
                                      <th>Barcode</th>
                                      <th>Item Name</th>
                                      <th>Unit</th>
                                      <th>Price ($)</th>
                                      <th>Price (R)</th>
                                      <th>Quantity</th>
                                      <th>Discount %</th>
                                      <th>Total</th>
                                      <th>Remark</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $attribute_row = 0;?>
                                    <?php if(isset($SaleOrderDetails)): ?>
                                      <?php foreach($SaleOrderDetails as $row): ?>
                                        <tr id="attribute-row-item<?php echo e($attribute_row); ?>">
                                          <td><div id="group_barcode<?php echo e($attribute_row); ?>"><?php echo Form::text("barcode[]",$row->Item->item_barcode,["disabled"=>"","class"=>"form-control","id"=>"item_barcode","placeholder"=>trans("stock_mgr/purchase_order.entry_barcode")]); ?></div></td>

                                          <td width="150px">
                                            <div id="group_item<?php echo e($attribute_row); ?>"><?php echo Form::select("item_id[]", $Items, $row->item_id, ["placeholder" => trans("stock_mgr/purchase_order.choose_item"),"id"=>"item_id","class"=>"form-control"]); ?></div>
                                          </td>
                                          <td id="select_unit_item<?php echo e($attribute_row); ?>" width="150px">
                                            <?php echo Form::select("unit_id[]", $Units, $row->unit_id, ["placeholder" => trans("stock_mgr/purchase_order.choose_unit"),"id"=>"unit","class"=>"form-control"]); ?>

                                          </td>

                                          <td><div id="group_price_dollar<?php echo e($attribute_row); ?>"><input name="price_dollar[]" onblur="OnsetPrice(<?php echo e($attribute_row); ?>);" id="setPrice" type="text" value="<?php echo e($row->sale_order_price); ?>" class="form-control" placeholder="<?php echo trans("stock_mgr/purchase_order.entry_price_dollar"); ?>"></div></td>

                                          <td><div id="group_price_reil<?php echo e($attribute_row); ?>">
                                            <?php 
                                              $price_reil = floatval($row->sale_order_price) * floatval($exchange_rate_reil);
                                            ?>
                                            <?php echo Form::text("price_reil[]",$price_reil,["class"=>"form-control","disabled"=>"disabled","placeholder"=>trans("stock_mgr/purchase_order.entry_price_reil")]); ?>

                                          </div></td>

                                          <td id="group_qty<?php echo e($attribute_row); ?>">
                                            <input name="sale_order_qty[]" onblur="setTotal(<?php echo e($attribute_row); ?>);" type="text" class="form-control" value="<?php echo e($row->sale_order_qty); ?>" placeholder="<?php echo trans("stock_mgr/purchase_order.entry_price_quantity"); ?>">
                                          </td>

                                          <td id="group_discount<?php echo e($attribute_row); ?>">
                                            <input name="discount_amount[]" onblur="setDiscount(<?php echo e($attribute_row); ?>);" type="text" value="<?php echo e($row->discount); ?>" class="form-control" placeholder="<?php echo trans("stock_mgr/purchase_order.entry_price_discount"); ?>">
                                          </td>

                                          <td id="group_total<?php echo e($attribute_row); ?>"><?php echo Form::text("total_hidden[]",Helpers::FormatCurrentcy($row->total),["disabled"=>"","class"=>"form-control total","id"=>"total","placeholder"=>trans("stock_mgr/purchase_order.entry_price_total")]); ?>

                                          <input name="total[]" value="<?php echo e($row->total); ?>" type="hidden"/>
                                          </td>

                                          <td><?php echo Form::text("remark[]",$row->remark,["class"=>"form-control","placeholder"=>trans("stock_mgr/purchase_order.entry_price_remark")]); ?></td>

                                          <td><button type="button" onclick="$('#attribute-row-item<?php echo e($attribute_row); ?>').remove();" data-toggle="tooltip" title="<?php echo trans("stock_mgr/purchase_order.entry_remove"); ?>" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>
                                          <input type="hidden" value="2" id="data_length" name="data_length">
                                        </tr>
                                      <?php $attribute_row++;?>
                                      <?php endforeach; ?>
                                    <?php endif; ?>
                                    <!-- <tr id="attribute-row-item<?php echo $attribute_row;?>">
                                      <td>1dsdf</td>
                                      <td>
                                        !! Form::select('item_id', $Items, null, ['placeholder' => trans('stock_mgr/purchase_order.choose_item'),'id'=>'item_id','class'=>'form-control']) !!}
                                      </td>
                                      <td>455-981-221</td>
                                      <td>122</td>
                                      <td>$64.50</td>
                                      <td>1222</td>
                                      <td>$64.50</td>
                                      <td>2233</td>
                                      <td>$64.50</td>
                                      <td><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="<?php echo trans('stock_mgr/purchase_order.entry_remove'); ?>"><i class="fa fa-wa fa-minus"></i></button></td>
                                    </tr> -->
                                  </tbody>

                                  <tfoot>
                                    <tr>
                                      <td colspan="9">&nbsp;</td>
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
        <?php echo $__env->make('admin.sale_mgr.sale_order.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
    <!-- /page content -->
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>