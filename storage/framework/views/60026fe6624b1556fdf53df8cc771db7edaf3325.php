 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
        <?php echo $__env->make('admin.stock_mgr.purchase_order.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
         <div class="nav_menu">
           <nav class="" role="navigation">
             <div class="nav toggle" style="margin-bottom:10px;">
               <a id="menu_toggle"><i class="fa fa-bars"></i></a>
             </div>
           </nav>
           <?php echo $__env->make("admin.common.advance_search", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
         </div>
      </div><!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo $__env->make('admin.common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="x_panel">
              <?php if(!isset($PurchaseOrders)): ?>
                <?php echo Form::open(['url' => 'admin/stock_mgr/purchase_order','class'=>'form-horizontal']); ?>

              <?php else: ?>
                <?php echo Form::model($PurchaseOrders,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.stock_mgr.purchase_order.update',$PurchaseOrders->id]]); ?>

              <?php endif; ?>
                <div class="row">
                  <div class="x_title">
                    <h2><i class="fa fa-wa fa-flag"></i> <?php echo trans('stock_mgr/purchase_order.entry_title'); ?></h2>
                    <div class="-row">
                      <span class="pull-right">

                        <div class="pull-left">
                          <a data-original-title="<?php echo trans('common.back_to_list'); ?>"  data-toggle="tooltip" data-placement="top" href="<?php echo e(url('admin/stock_mgr/purchase_order')); ?>" type="submit" class="btn btn-sm btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs"><?php echo trans('common.back_to_list'); ?></span></a>
                        </div>
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
                          <?php if($PurchaseOrders->is_approve != 1): ?>
                            <button data-original-title="<?php echo trans('common.save'); ?>" data-target=".bs-example-modal-lg"  data-toggle="tooltip" type="submit" data-placement="top" href="javascript:void(0);" class="btn btn-sm btn-primary" name="submit"><i class="fa fa-wa fa-save"></i> <?php echo trans('common.save'); ?></button>
                          <?php endif; ?>
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
                  <div class="x_content">
                    <div class="x_title">
                      <div class="row">
                        <!-- col-sm-4 -->
                        <div class="col-sm-7">
                          <form class="form-horizontal form-label-left input_mask">
                            <div class="-form-group">
                              <label class="-control-label col-md-4 col-sm-4 col-xs-12 pull-left"> <?php echo trans('stock_mgr/purchase_order.entry_invoice_no'); ?></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 form-group">
                                <?php echo Form::text('po_number',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("stock_mgr/purchase_order.entry_invoice_no")]); ?>

                                <i class="fa fa-edit form-control-feedback left" aria-hidden="true"></i>
                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-4 col-sm-4 col-xs-12 pull-left"> <?php echo trans('stock_mgr/purchase_order.entry_invoice_date'); ?></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 form-group has-feedback">
                                <?php echo Form::text('po_date',null,['class'=>'date-picker form-control has-feedback-left','placeholder'=>trans("stock_mgr/purchase_order.entry_invoice_date")]); ?>

                                <i class="fa fa-calendar form-control-feedback left" aria-hidden="true"></i>
                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-4 col-sm-4 col-xs-12 pull-left"> <?php echo trans('stock_mgr/purchase_order.entry_supplier'); ?></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 form-group has-feedback">
                                <?php echo Form::select('supplier_id', $Suppliers, null, ['placeholder' => trans('stock_mgr/purchase_order.choose_supplier'),'id'=>'supplier_id','class'=>'form-control']); ?>

                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-4 col-sm-4 col-xs-12 pull-left"> <?php echo trans('stock_mgr/purchase_order.entry_description'); ?></label>
                              <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="input-group">
                                  <?php echo Form::textarea('description',null,['class'=>'form-control','placeholder'=>trans("stock_mgr/purchase_order.entry_description")]); ?>

                                  <!-- <textarea style="min-width: 100%;width:120%;" name="description" class="form-control"><?php echo trans('stock_mgr/purchase_order.entry_description'); ?></textarea> -->
                                </div>
                                <!-- <input class="form-control" id="inputSuccess2" placeholder="First Name" type="text"> -->
                              </div>
                            </div>

                          </form>
                        </div>

                        <!-- col-sm-4 -->
                        <div class="col-sm-1">
                          <!-- <center><div style="font-weight: bold;font-size:30px;text-decoration: underline;">Quotation</div></center> -->
                        </div>

                        <!-- col-sm-4 -->
                        <div class="col-sm-4">
                          <!-- <p class="lead">Amount Due 2/22/2014</p> -->
                          <div class="table-responsive">
                            <table class="table table-bordered table-striped dataTable">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Subtotal:</th>
                                  <td>
                                    <?php if(isset($PurchaseOrders)): ?>
                                      <input type="text" class="pull-left" onblur="Onshipping();" value="<?php echo e($PurchaseOrders->sub_total); ?>" name="sub_total">
                                    <?php else: ?>
                                      <input type="text" class="pull-left" onblur="Onshipping();" value="0.00" name="sub_total">
                                    <?php endif; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <th>Shipping:</th>
                                  <td>
                                    <?php if(isset($PurchaseOrders)): ?>
                                      <input type="text" class="pull-left" onblur="Onshipping();" value="<?php echo e($PurchaseOrders->shipping); ?>" name="shipping">
                                    <?php else: ?>
                                      <input type="text" class="pull-left" onblur="Onshipping();" value="0.00" name="shipping">
                                    <?php endif; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <th>Discount:</th>
                                  <td>
                                    <?php if(isset($PurchaseOrders)): ?>
                                      <input type="text" class="pull-left" onblur="subDiscount();" value="<?php echo e($PurchaseOrders->sub_discount); ?>" name="sub_discount">
                                    <?php else: ?>
                                      <input type="text" class="pull-left" onblur="subDiscount();" value="0.00" name="sub_discount">
                                    <?php endif; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <th>Vat (%)</th>
                                  <td>
                                    <?php if(isset($PurchaseOrders)): ?>
                                      <input type="text" class="pull-left" onblur="vat();" value="<?php echo e($PurchaseOrders->vat_amount); ?>" name="vat_amount">
                                    <?php else: ?>
                                      <input type="text" class="pull-left" onblur="vat();" value="0.00" name="vat_amount">
                                    <?php endif; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <?php if(isset($PurchaseOrders)): ?>
                                    <th>Grand Total: <input type="hidden" value="<?php echo e($PurchaseOrders->grand_total); ?>" name="grand_total"></th>
                                    <td id="grand_total"><b><?php echo e($PurchaseOrders->grand_total); ?></b></td>
                                  <?php else: ?>
                                    <th>Grand Total: <input type="hidden" name="grand_total"></th>
                                    <td id="grand_total"><b>0.00</b></td>
                                  <?php endif; ?>
                                </tr>
                                <tr>
                                  <td>
                                    <!-- <label><input type="checkbox" class="flat" name="is_vat"> Include Vat</label> -->
                                  </td>
                                  <td><label><input type="checkbox" <?php if($PurchaseOrders->is_approve == 1): ?> <?php echo e("checked='checked'"); ?> <?php endif; ?> class="flat" name="is_approve"> Is Approved?</label></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>

                          <!-- <form class="form-horizontal form-label-left input_mask">
                            <div class="-form-group">
                              <label class="control-label col-md-4 col-sm-4 col-xs-12">Sub Total</label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control pull-right" id="inputSuccess2" placeholder="$00.00" type="text">
                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="control-label col-md-4 col-sm-4 col-xs-12">Discount Item</label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control pull-right" id="inputSuccess2" placeholder="$00.00" type="text">
                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="control-label col-md-4 col-sm-4 col-xs-12">Discount Sub Total</label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control pull-right" id="inputSuccess2" placeholder="$00.00" type="text">
                              </div>
                            </div>
                          </form> -->
                        </div>

                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- content -->
                        <!-- ############# -->
                        <!-- Table row -->
                        <div class="row">
                          <div class="col-xs-12 table">
                            <div class="row">
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
                                    <th>Discount</th>
                                    <th>Total</th>
                                    <th>Remark</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $attribute_row = 0;?>
                                  <?php if(isset($PurchaseOrders)): ?>
                                    <?php foreach($PurchaseOrderDetails as $PurchaseOrderDetail): ?>
                                      <tr id="attribute-row-item<?php echo e($attribute_row); ?>">
                                        <td><div id="group_barcode<?php echo e($attribute_row); ?>"><?php echo Form::text("barcode[]",$PurchaseOrderDetail->Item->item_barcode,["class"=>"form-control","id"=>"item_barcode","placeholder"=>trans("stock_mgr/purchase_order.entry_barcode")]); ?></div></td>
                                        <td width="150px">
                                          <div id="group_item<?php echo e($attribute_row); ?>"><?php echo Form::select("item_id[]", $Items, $PurchaseOrderDetail->item->id, ["placeholder" => trans("stock_mgr/purchase_order.choose_item"),"id"=>"item_id","class"=>"form-control"]); ?></div>
                                        </td>
                                        <td width="150px">

                                          <?php echo Form::select("unit_id[]", $Units, $PurchaseOrderDetail->unit_id, ["placeholder" => trans("stock_mgr/purchase_order.choose_unit"),"id"=>"unit","class"=>"form-control"]); ?>


                                        </td>

                                        <td><div id="group_price_dollar<?php echo e($attribute_row); ?>"><input name="price_dollar[]" onblur="OnsetPrice(<?php echo e($attribute_row); ?>);" id="setPrice" type="text" value="<?php echo e($PurchaseOrderDetail->price); ?>" class="form-control" placeholder="<?php echo trans("stock_mgr/purchase_order.entry_price_dollar"); ?>"></div></td>

                                        <td><div id="group_price_reil<?php echo e($attribute_row); ?>">
                                          <?php 
                                            $price_reil = (float)$PurchaseOrderDetail->price * (float)$exchange_rate_reil;
                                          ?>
                                          <?php echo Form::text("price_reil[]",$price_reil,["class"=>"form-control","disabled"=>"disabled","placeholder"=>trans("stock_mgr/purchase_order.entry_price_reil")]); ?>

                                        </div></td>

                                        <td id="group_qty<?php echo e($attribute_row); ?>">
                                          <input name="qty[]" onblur="setTotal(<?php echo e($attribute_row); ?>);" type="text" class="form-control" value="<?php echo e($PurchaseOrderDetail->qty); ?>" placeholder="<?php echo trans("stock_mgr/purchase_order.entry_price_quantity"); ?>">
                                        </td>

                                        <td id="group_discount<?php echo e($attribute_row); ?>">
                                          <input name="discount_amount[]" onblur="setDiscount(<?php echo e($attribute_row); ?>);" type="text" value="<?php echo e($PurchaseOrderDetail->discount_amount); ?>" class="form-control" placeholder="<?php echo trans("stock_mgr/purchase_order.entry_price_discount"); ?>">
                                        </td>

                                        <td id="group_total<?php echo e($attribute_row); ?>"><?php echo Form::text("total[]",$PurchaseOrderDetail->total,["class"=>"form-control total","id"=>"total","placeholder"=>trans("stock_mgr/purchase_order.entry_price_total")]); ?></td>

                                        <td><?php echo Form::text("remark[]",$PurchaseOrderDetail->remark,["class"=>"form-control","placeholder"=>trans("stock_mgr/purchase_order.entry_price_remark")]); ?></td>

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
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- ############### -->
                      </div>
                    </div>
                  </div>
                </div>
              <?php echo Form::close(); ?>


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
  <?php echo $__env->make('admin.stock_mgr.purchase_order.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>