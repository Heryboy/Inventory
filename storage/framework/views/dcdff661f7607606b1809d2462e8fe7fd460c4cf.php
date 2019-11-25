<!-- add more item -->
<script type="text/javascript">
  var attribute_row = <?php echo $attribute_row;?>;
  // addItem
  function addItem() {
    var html = '';
    html = $.purchaseDataAttribute(attribute_row);
    $('#item_row tbody').append(html);
    $.getItem(attribute_row);
    //autocompleteGetItem(attribute_row);
    attribute_row++;
  }
  // purchase_data_attribute
  $.purchaseDataAttribute = function(attribute_row){
    var html = '';
     html +='<tr id="attribute-row-item'+attribute_row+'">';
      html +='<td><div id="group_barcode'+attribute_row+'"><?php echo Form::text("barcode[]",null,["class"=>"form-control","id"=>"item_barcode","placeholder"=>trans("stock_mgr/purchase_order.entry_barcode")]); ?></div></td>';
      html +='<td width="150px">';
        html += '<div id="group_item'+attribute_row+'"><?php echo Form::select("item_id[]", $Items, null, ["placeholder" => trans("stock_mgr/purchase_order.choose_item"),"id"=>"item_id","class"=>"form-control"]); ?></div>';
      html +='</td>';
      html +='<td id="select_unit_item'+attribute_row+'" width="150px">';
        html += '<?php echo Form::select("unit_id[]", $Units, null, ["placeholder" => trans("stock_mgr/purchase_order.choose_unit"),"id"=>"unit","class"=>"form-control"]); ?>';
      html += '</td>';

      html +='<td><div id="group_price_dollar'+attribute_row+'"><input name="price_dollar[]" onblur="OnsetPrice(' + attribute_row + ');" id="setPrice" type="text" class="form-control" placeholder="<?php echo trans("stock_mgr/purchase_order.entry_price_dollar"); ?>"></div></td>';

      html +='<td><div id="group_price_reil'+attribute_row+'"><?php echo Form::text("price_reil[]",null,["class"=>"form-control","disabled"=>"disabled","placeholder"=>trans("stock_mgr/purchase_order.entry_price_reil")]); ?></div></td>';

      html +='<td id="group_qty'+attribute_row+'">';
        html += '<input name="qty[]" onblur="setTotal(' + attribute_row + ');" type="text" class="form-control" placeholder="<?php echo trans("stock_mgr/purchase_order.entry_price_quantity"); ?>">';
      html += '</td>';

      html +='<td id="group_discount'+attribute_row+'">';
        html += '<input name="discount_amount[]" onblur="setDiscount(' + attribute_row + ');" type="text" class="form-control" placeholder="<?php echo trans("stock_mgr/purchase_order.entry_price_discount"); ?>">';
      html += '</td>';

      html +='<td id="group_total'+attribute_row+'"><?php echo Form::text("total[]",null,["class"=>"form-control total","id"=>"total","placeholder"=>trans("stock_mgr/purchase_order.entry_price_total")]); ?></td>';

      html +='<td><?php echo Form::text("remark[]",null,["class"=>"form-control","placeholder"=>trans("stock_mgr/purchase_order.entry_price_remark")]); ?></td>';

      html += '<td><button type="button" onclick="$(\'#attribute-row-item' + attribute_row + '\').remove();" data-toggle="tooltip" title="<?php echo trans("stock_mgr/purchase_order.entry_remove"); ?>" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';
      html += '<input type="hidden" value="2" id="data_length" name="data_length">';
    html += '</tr>';
    return html;
  }

  // edit_data
  $(function(){
    $(".edit_data").click(function(){
      var po_id = $(this).attr("data-id");

      $.ajax({
        url: "<?php echo e(url('admin/stock_mgr/getPurchaseItem')); ?>",
        type:'post',
        timeout: 3000,
        data:{
          po_id: po_id,
        },
        dataType: 'json',
        beforeSend: function() {
          $("#loading").show();
          // $('#button-cart-customize').button('loading');
          // alert('beforesend');
        },
        complete: function() {
          $("#loading").hide();
          // $('#button-cart-customize').button('reset');
          // alert('testing');
        },
        success: function(data) {
          var html = '';

          $.each(data, function(app_data, app_val){

          });

        },
        error: function(xhr, ajaxOptions, thrownError){
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });

    });
  }); 

  // setPrice
  function OnsetPrice(attribute_row){    
    global_cal(attribute_row);
    global_grandTotal();
    // $('#paymentSum').val(sum);
  }

  // setTotal
  function setTotal(attribute_row){
    global_cal(attribute_row);
    global_grandTotal();
  }

  // setDiscount
  function setDiscount(attribute_row){
    global_cal(attribute_row);
    global_grandTotal();
  }


  // Onshipping
  function Onshipping(){
    global_grandTotal();
  }

  // subDiscount
  function subDiscount(){
    global_grandTotal();
  }

  // vat
  function vat(){
    global_grandTotal();
  }

  // global_grandTotal
  function global_grandTotal(){
    var sumary_total = 0;
    var vat = 0;
    var sub_discount = 0;
    var shipping = 0;
    var total = 0;
    var grand_total = 0;
    var tmp_grand_total = 0;

    var shipping_txt = $("input[name='shipping']").val();
    var sub_discount_txt = $("input[name='sub_discount']").val();
    var vat_txt = $("input[name='vat_amount']").val();
    

    if(shipping_txt!=""){
      shipping = $("input[name='shipping']").val();
    }else{
      shipping = 0;
    }

    if(sub_discount_txt!=""){
      sub_discount = $("input[name='sub_discount']").val();
    }else{
      sub_discount = 0;
    }

    if(vat_txt!=""){
      vat = $("input[name='vat_amount']").val();
    }else{
      vat = 0;
    }
    
    sumary_total = parseFloat(shipping) + parseFloat(sub_discount);
    
    // dynamic text sum
    $("input[name='total[]']").each(function () {
      if (!isNaN(this.value) && this.value.length != 0) {
        total += parseFloat(this.value);
      }
    });

    if(vat_txt>0){
      tmp_grand_total = (parseFloat(total)-parseFloat(sumary_total)) * vat / 100;
      grand_total = parseFloat(total) - tmp_grand_total
    }else{
      grand_total = parseFloat(total)-parseFloat(sumary_total);
    }

    $("#grand_total").html(grand_total);
    $("input[name='grand_total']").val(grand_total);
  }

  // global_cal
  function global_cal(attribute_row){
    var total = 0;
    var exchange_rate = <?php echo $exchange_rate_reil;?>;

    var price_item = $("#group_price_dollar"+attribute_row+" input[name='price_dollar[]']").val();
    var cal_price_reil = parseFloat(price_item) * parseFloat(exchange_rate);
    $("#group_price_reil"+attribute_row+" input[name='price_reil[]']").val(cal_price_reil);

    // Quantity
    var item_qty = $("#group_qty"+attribute_row+" input[name='qty[]']").val();
    total = parseFloat(price_item)*parseFloat(item_qty);

    // discount
    var discount = $("#group_discount"+attribute_row+" input[name='discount_amount[]']").val();
    if(discount>0){
      total = parseFloat(total)-parseFloat(discount);
    }

    $("#group_total"+attribute_row+" input[name='total[]']").val(total);

    // dynamic text sum
    var total = 0;
    $("input[name='total[]']").each(function () {
      if (!isNaN(this.value) && this.value.length != 0) {
        total += parseFloat(this.value);
      }
    });
      
    // global_grandTotal();
    // display_sub_total
    $("input[name='sub_total']").val(total);
    $("#grand_total").html(total);
    $("input[name='grand_total']").val(total);
  }

 // getItem
 $.getItem = function(attribute_row){
    // alert(attribute_row);
    $(function(){
      $("#group_item"+attribute_row+" #item_id").change(function(){
        var item_id = $(this).val();
        if(item_id == ''){
          var html_unit = '<select class="form-control" name="unit_id[]"><option>--None--</option></select>';
          $('td#select_unit_item' + attribute_row).html(html_unit);
          return false;
        }
        $.ajax({
          url: "<?php echo e(url('admin/item/getUnitBaseItem')); ?>",
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
          success: function(data) {
            var item_code = data['itemCode'];
            var units = data.units;
            console.log("data", data);
            $("#group_barcode"+attribute_row+" #item_barcode").val(item_code);
            var html_unit = '';
            html_unit += '<select class="form-control" name="unit_id[]">';
              for(var i = 0; i < units.length; i ++){
                html_unit +='<option value='+ units[i]["unit_id"] +'>'+ units[i]["unit_name"] +'</option>';
              }
            html_unit += '</select>';
            $("#group_barcode"+attribute_row+" #item_barcode").val(item_code);
            $('td#select_unit_item' + attribute_row).html(html_unit);
          }
        });
      });
    });
  }
</script>