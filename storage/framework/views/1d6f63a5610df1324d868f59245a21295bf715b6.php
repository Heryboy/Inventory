<?php echo Form::open(['url' => 'admin/stock_mgr/purchase_order','class'=>'form-horizontal']); ?>

  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Branch : Main Store</h4>
        </div>
        <div class="modal-body">
          <!-- #################### -->
          <!-- row -->
          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <div class="row">
                    <center><div style="font-weight: bold;font-size:20px;"><?php echo trans('stock_mgr/purchase_order.entry_invoice'); ?></div></center>
                  </div>
                </div>

                <!-- <div class="x_title">
                  <div class="row">
                    <form class="form-horizontal form-label-left">
                      <div class="-form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12"><i class="fa fa fa-th-large"></i> Item Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control" placeholder="Item Category" type="text">
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="clearfix"></div>
                </div> -->

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
                                <td><input type="text" class="pull-left" onblur="Onshipping();" value="0.00" name="sub_total"></td>
                              </tr>
                              <tr>
                                <th>Shipping:</th>
                                <td><input type="text" class="pull-left" onblur="Onshipping();" value="0.00" name="shipping"></td>
                              </tr>
                              <tr>
                                <th>Discount:</th>
                                <td><input type="text" class="pull-left" onblur="subDiscount();" value="0.00" name="sub_discount"></td>
                              </tr>
                              <tr>
                                <th>Vat (%)</th>
                                <td><input type="text" class="pull-left" onblur="vat();" value="0.00" name="vat_amount"></td>
                              </tr>
                              <tr>
                                <th>Grand Total: <input type="hidden" name="grand_total"></th>
                                <td id="grand_total"><b>0.00</b></td>
                              </tr>
                              <tr>
                                <td>
                                  <!-- <label><input type="checkbox" class="flat" name="is_vat"> Include Vat</label> -->
                                </td>
                                <td><label><input type="checkbox" class="flat" name="is_approve">Is Approved?</label></td>
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

                <!-- this row will not appear when printing -->
                <!-- <div class="row no-print">
                  <div class="col-xs-12">
                    <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                    <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                    <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                  </div>
                </div> -->
              </div>

            </div>

          </div>
          <!-- #################### -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </div>
    </div>
  </div>
<?php echo Form::close(); ?>


<?php echo $__env->make('admin.stock_mgr.purchase_order.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>