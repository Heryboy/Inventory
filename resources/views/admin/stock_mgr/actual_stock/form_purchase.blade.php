<style type="text/css">
  .modal-lg {
    width: 1200px !important;
  }
</style>

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
                  <center><div style="font-weight: bold;font-size:20px;">{!!trans('stock_mgr/purchase.entry_invoice')!!}</div></center>
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
                          <label class="-control-label col-md-4 col-sm-4 col-xs-12 pull-left"> {!!trans('stock_mgr/purchase.entry_invoice_no')!!}</label>
                          <div class="col-md-7 col-sm-7 col-xs-12 form-group">
                            {!! Form::text('item_barcode',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("stock_mgr/purchase.entry_invoice_no")]) !!}
                            <i class="fa fa-edit form-control-feedback left" aria-hidden="true"></i>
                          </div>
                        </div>

                        <div class="-form-group">
                          <label class="-control-label col-md-4 col-sm-4 col-xs-12 pull-left"> {!!trans('stock_mgr/purchase.entry_invoice_date')!!}</label>
                          <div class="col-md-7 col-sm-7 col-xs-12 form-group has-feedback">
                            {!! Form::text('item_barcode',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("stock_mgr/purchase.entry_invoice_date")]) !!}
                            <i class="fa fa-calendar form-control-feedback left" aria-hidden="true"></i>
                          </div>
                        </div>

                        <div class="-form-group">
                          <label class="-control-label col-md-4 col-sm-4 col-xs-12 pull-left"> {!!trans('stock_mgr/purchase.entry_suppliers')!!}</label>
                          <div class="col-md-7 col-sm-7 col-xs-12 form-group has-feedback">
                            {!! Form::select('vendor_id', $Suppliers, null, ['placeholder' => trans('stock_mgr/purchase.choose_vendor'),'id'=>'vendor_id','class'=>'form-control']) !!}
                          </div>
                        </div>

                        <div class="-form-group">
                          <label class="-control-label col-md-4 col-sm-4 col-xs-12 pull-left"> {!!trans('stock_mgr/purchase.entry_description')!!}</label>
                          <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="input-group">
                              <textarea style="min-width: 100%;width:120%;" name="description" class="form-control">{!!trans('stock_mgr/purchase.entry_description')!!}</textarea>
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
                              <td><input type="text" class="pull-left" value="0.00" disabled="" name="subtotal"></td>
                            </tr>
                            <tr>
                              <th>Shipping:</th>
                              <td><input type="text" class="pull-left" onblur="shipping();" value="0.00" name="shipping"></td>
                            </tr>
                            <tr>
                              <th>Discount:</th>
                              <td><input type="text" class="pull-left" onblur="subDiscount();" value="0.00" name="sub_discount"></td>
                            </tr>
                            <tr>
                              <th>Vat (%)</th>
                              <td><input type="text" class="pull-left" onblur="vat();" value="0.00" name="vat"></td>
                            </tr>
                            <tr>
                              <th>Grand Total: </th>
                              <td id="grand_total"><b>0.00</b></td>
                            </tr>
                            <tr>
                              <td><label><input type="checkbox" class="flat" name=""> Include Vat</label></td>
                              <td><label><input type="checkbox" class="flat" name=""> Approved</label></td>
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
                                  !! Form::select('item_id', $Items, null, ['placeholder' => trans('stock_mgr/purchase.choose_item'),'id'=>'item_id','class'=>'form-control']) !!}
                                </td>
                                <td>455-981-221</td>
                                <td>122</td>
                                <td>$64.50</td>
                                <td>1222</td>
                                <td>$64.50</td>
                                <td>2233</td>
                                <td>$64.50</td>
                                <td><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="{!!trans('stock_mgr/purchase.entry_remove')!!}"><i class="fa fa-wa fa-minus"></i></button></td>
                              </tr> -->
                            </tbody>

                            <tfoot>
                              <tr>
                                <td colspan="9">&nbsp;</td>
                                <td>
                                  <button type="button" data-toggle="tooltip" data-placement="top" title="{!!trans('stock_mgr/purchase.entry_add')!!}" onclick="addItem();" class="btn btn-primary btn-sm"><i class="fa fa-wa fa-plus"></i></button>
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
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>

    </div>
  </div>
</div>


</select>

<!-- add more item -->
<script type="text/javascript">
  var attribute_row = <?php echo $attribute_row;?>;
  // addItem
  function addItem() {
    var html = '';
    html +='<tr id="attribute-row-item'+attribute_row+'">';
      html +='<td><div id="group_barcode'+attribute_row+'">{!! Form::text("barcode",null,["class"=>"form-control","id"=>"item_barcode","placeholder"=>trans("stock_mgr/purchase.entry_barcode")]) !!}</div></td>';
      html +='<td width="150px">';
        html += '<div id="group_item'+attribute_row+'">{!! Form::select("item_id", $Items, null, ["placeholder" => trans("stock_mgr/purchase.choose_item"),"id"=>"item_id","class"=>"form-control"]) !!}</div>';
      html +='</td>';
      html +='<td width="150px">';

        html += '{!! Form::select("unit", $Units, null, ["placeholder" => trans("stock_mgr/purchase.choose_unit"),"id"=>"unit","class"=>"form-control"]) !!}';

      html += '</td>';

      html +='<td><div id="group_price_dollar'+attribute_row+'"><input name="price_dollar" onblur="setPrice(' + attribute_row + ');" id="setPrice" type="text" class="form-control" placeholder="{!!trans("stock_mgr/purchase.entry_price_dollar")!!}"></div></td>';

      html +='<td><div id="group_price_reil'+attribute_row+'">{!! Form::text("price_reil",null,["class"=>"form-control","disabled"=>"disabled","placeholder"=>trans("stock_mgr/purchase.entry_price_reil")]) !!}</div></td>';

      html +='<td id="group_qty'+attribute_row+'">';
        html += '<input name="qty" onblur="setTotal(' + attribute_row + ');" type="text" class="form-control" placeholder="{!!trans("stock_mgr/purchase.entry_price_quantity")!!}">';
      html += '</td>';

      html +='<td id="group_discount'+attribute_row+'">';
        html += '<input name="discount" onblur="setDiscount(' + attribute_row + ');" type="text" class="form-control" placeholder="{!!trans("stock_mgr/purchase.entry_price_discount")!!}">';
      html += '</td>';

      html +='<td id="group_total'+attribute_row+'">{!! Form::text("total",null,["class"=>"form-control","id"=>"total","placeholder"=>trans("stock_mgr/purchase.entry_price_total")]) !!}</td>';

      html +='<td>{!! Form::text("remark",null,["class"=>"form-control","placeholder"=>trans("stock_mgr/purchase.entry_price_remark")]) !!}</td>';

      html += '<td><button type="button" onclick="$(\'#attribute-row-item' + attribute_row + '\').remove();" data-toggle="tooltip" title="{!!trans("stock_mgr/purchase.entry_remove")!!}" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';
      html += '<input type="hidden" value="2" id="data_length" name="data_length">';
    html += '</tr>';
    $('#item_row tbody').append(html);
    $.getItem(attribute_row);
    //autocompleteGetItem(attribute_row);
    attribute_row++;
  }

  // setPrice
  function setPrice(attribute_row){    
    global_cal(attribute_row);
  }

  // setTotal
  function setTotal(attribute_row){
    global_cal(attribute_row);
  }

  // setDiscount
  function setDiscount(attribute_row){
    global_cal(attribute_row);
  }

  // shipping
  function shipping(){
    var total_item = $("input[name='grand_total_hidden']").val();
    var shipping = $("input[name='shipping']").val();

    // if(shipping>0){
    //   var grand_total = parseFloat(total_item)-parseFloat(shipping);
    //   $("#grand_total").html(grand_total);
    //   $("input[name='grand_total_hidden']").val(grand_total);
    // }else{
    //   var shipping = $("input[name='shipping']").val();
    // }
  }

  // subDiscount
  function subDiscount(){
    var total_item = $("input[name='total']").val();
    var sub_discount = $("input[name='sub_discount']").val();
    if(sub_discount>0){
      var grand_total = parseFloat(total_item)-parseFloat(sub_discount);
      $("#grand_total").html(grand_total);
      $("input[name='grand_total_hidden']").val(grand_total);
    }
  }

  // vat
  function vat(){
    var total_item = $("input[name='total']").val();
    var vat = $("input[name='vat']").val();
    var grand_total = parseFloat(total_item) * parseFloat(vat) / 100;
    $("#grand_total").html(grand_total);
    $("input[name='grand_total_hidden']").val(grand_total);
  }

  function global_cal(attribute_row){
    var total = 0;
    var exchange_rate = <?php echo $exchange_rate_reil;?>;
    var price_item = $("#group_price_dollar"+attribute_row+" input[name='price_dollar']").val();
    var cal_price_reil = parseFloat(price_item) * parseFloat(exchange_rate);
    $("#group_price_reil"+attribute_row+" input[name='price_reil']").val(cal_price_reil);

    // Quantity
    var item_qty = $("#group_qty"+attribute_row+" input[name='qty']").val();
    total = parseFloat(price_item)*parseFloat(item_qty);

    // discount
    var discount = $("#group_discount"+attribute_row+" input[name='discount']").val();
    if(discount>0){
      total = parseFloat(total)-parseFloat(discount);
    }

    $("#group_total"+attribute_row+" input[name='total']").val(total);

    // display_subtotal
    $("input[name='subtotal']").val(total);
    $("#grand_total").html(total);
    $("input[name='grand_total_hidden']").val(total);
  }

  // getItem
  $.getItem = function(attribute_row){
    // alert(attribute_row);
    $(function(){
      $("#group_item"+attribute_row+" #item_id").change(function(){
        var item_id = $(this).val();
        $.ajax({
          url: "{{url('admin/stock_mgr/getBarcode')}}",
          dataType: "json",
          timeout: 3000,
          data: {
            item_id: item_id,
          },
          error: function(x, t, m) {
            if(t==="timeout") {
              // alert("got timeout");
            } else {
              // alert(t);
            }
            $(window).unbind('beforeunload');
          },
          success: function(item_barcode) {
            $("#group_barcode"+attribute_row+" #item_barcode").val(item_barcode);
          }
        });
      });
    });
  }

</script>