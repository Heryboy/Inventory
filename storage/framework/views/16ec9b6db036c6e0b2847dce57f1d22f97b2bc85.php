<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background-color: #3c8dbc;color:#fff;">
        <button style="color:#fff;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true" >×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-wa fa-pencil"></i> Item Form</h4>
      </div>
      <div class="modal-body">

        <?php if(!isset($item)): ?>
          <?php echo Form::open(['url' => 'admin/setup_mgr/item','id'=>'form-item','class'=>'form-horizontal']); ?>

        <?php else: ?>
          <?php echo Form::model($item,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.setup_mgr.item.update',$item->id]]); ?>

        <?php endif; ?>

          <!-- row -->
          <div class="row">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-pencil"></i> Items</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil"></i> Conversion</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false"><i class="fa fa-code-fork"></i> Related Items</a>
                </li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  <!-- col-sm-12 -->
                  <div class="col-sm-12" style="padding-top:30px;">

                    <div class="form-group item_category_group col-sm-6">
                      <label for="middle-name" class="-control-label col-sm-4 col-xs-12 pull-left"><?php echo trans('setup_mgr/item.item_category'); ?> <span class="validate_label_red">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12 ">
                        <?php echo Form::text('item_category_name',null,['placeholder' => trans('setup_mgr/item.item_category'),'class'=>'form-control has-feedback-left']); ?>

                        <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                        <input type="hidden" name="item_category_id">
                      </div>
                    </div>

                    <div class="form-group item_code_group col-sm-6">
                      <label for="middle-name" class="-control-label col-sm-4 col-xs-12 pull-left"><?php echo trans('setup_mgr/item.item_code'); ?> <span class="validate_label_red">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12 ">
                        <?php echo Form::text('item_code',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.item_code")]); ?>

                        <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group item_name_group col-sm-6">
                      <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12"><?php echo trans('setup_mgr/item.item_name'); ?> <span class="validate_label_red">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12 ">
                        <?php echo Form::text('name',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.item_name")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group item_type_group col-sm-6">
                      <label for="middle-name" class="-control-label col-sm-4 col-xs-12 pull-left"><?php echo trans('setup_mgr/item.item_type'); ?> <span class="validate_label_red">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12 ">
                        <?php echo Form::text('item_type_name', null, ['placeholder' => trans('setup_mgr/item.item_type'),'class'=>'form-control has-feedback-left']); ?>

                        <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                        <input type="hidden" name="item_type_id">
                      </div>
                    </div>

                    <div class="form-group col-sm-6">
                      <label for="middle-name" class="-control-label col-sm-4 col-xs-12 pull-left"><?php echo trans('setup_mgr/item.item_status'); ?> <span class="validate_label_red">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12 ">
                        <?php echo Form::select('item_status_id', $item_status, null, ['placeholder' => trans('setup_mgr/item.choose_item_status'),'class'=>'form-control has-feedback-left']); ?>

                        <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group col-sm-6">
                      <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12"><?php echo trans('setup_mgr/item.item_alias'); ?> </label>
                      <div class="col-md-8 col-sm-8 col-xs-12 ">
                        <?php echo Form::text('alias',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.item_alias")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group item_net_price_group col-sm-6">
                      <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12"><?php echo trans('setup_mgr/item.net_price'); ?> <span class="validate_label_red">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12 ">
                        <?php echo Form::text('net_price',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.net_price")]); ?>

                        <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="form-group item_quantity_group col-sm-6">
                      <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12"><?php echo trans('setup_mgr/item.qty'); ?> <span class="validate_label_red">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12 ">
                        <?php echo Form::text('qty',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.qty")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <!-- row -->
                    <div class="form-group col-sm-6">
                      <label class="-control-label col-sm-4 col-xs-12"><?php echo trans('setup_mgr/item.is_active'); ?></label>
                      <!-- col-sm-6 -->
                      <div class="col-sm-6" >
                        <?php echo Form::checkbox('is_active',null,null,['class' => 'flat form-control']); ?>

                      </div>
                    </div>
                  </div>
                </div>
                <!-- tabpanel -->
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                  <div class="col-sm-12" style="padding-top:20px;">
                    <!-- form-group -->
                    <div class="form-group col-sm-6">
                      <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12"><?php echo trans('setup_mgr/item.qty1'); ?> </label>
                      <div class="col-md-8 col-sm-8 col-xs-12 ">
                        <?php echo Form::text('qty1',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.qty1")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <!-- form-group -->
                    <div class="form-group col-sm-6">
                      <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12"><?php echo trans('setup_mgr/item.qty2'); ?> </label>
                      <div class="col-md-8 col-sm-8 col-xs-12 ">
                        <?php echo Form::text('qty2',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.qty2")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <!-- form-group -->
                    <div class="form-group col-sm-6">
                      <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12"><?php echo trans('setup_mgr/item.unit1'); ?> </label>
                      <div class="col-md-8 col-sm-8 col-xs-12 ">
                        <?php echo Form::text('unit_id1',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.unit1")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <!-- form-group -->
                    <div class="form-group col-sm-6">
                      <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12"><?php echo trans('setup_mgr/item.unit2'); ?> </label>
                      <div class="col-md-8 col-sm-8 col-xs-12 ">
                        <?php echo Form::text('unit_id2',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.unit2")]); ?>

                        <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                  <?php 
                    $attribute_row = 0;
                  ?>
                  <!-- col-sm-12 -->
                  <div class="col-sm-12 table-responsive">
                    <table id="item_row" class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Item Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(isset($item_data)): ?>
                        <tr>
                          <td>1</td>
                          <td><input type="text" class="form-control" name="item_name" placeholder="Item"></td>
                          <td><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-wa fa-minus"></i></button></td>
                        </tr>
                        <?php endif; ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td><button type="button" onclick="addItem();" class="btn btn-primary btn-sm"><i class="fa fa-wa fa-plus"></i></button></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php echo Form::close(); ?>

      </div>
      <div class="modal-footer">
        <button form="form-item" type="submit" id="initSaveItem" name="initSaveItem" class="btn btn-primary">Save changes</button>
      </div>

    </div>
  </div>
</div>

<!-- add dynamic related item -->
<script type="text/javascript">
  // attribute_row
  var attribute_row = <?php echo $attribute_row; ?>;
  // addImage
  function addItem() {
    var html = '';
    html += '<tr id="attribute-row-item'+ attribute_row +'">';
      html += '<td>'+attribute_row+'</td>';
      html += '<td>';
        html += '<input type="text" id="item_attribute" name="item_attribute[' + attribute_row + '][item_id]" value="" placeholder="Item Product" class="form-control" />';

        // html += '<input type="text" id="item_data'+attribute_row+'" name="item_data['+attribute_row+']["item_id"]">';
      html += '</td>';

      html += '<td><button type="button" onclick="$(\'#attribute-row-item' + attribute_row + '\').remove();" data-toggle="tooltip" title="Remove Image" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';

    html += '</tr>';
    $('#item_row tbody').append(html);

    autocompleteGetItem(attribute_row);
    
    attribute_row++;
  }
  // autocompleteGetItem
  function autocompleteGetItem(attribute_row) {
    $('input[name=\'item_attribute[' + attribute_row + '][item_id]\']').autocomplete({
      'source': function(request, response) {
        $.ajax({
          url: '<?php echo e(url('')); ?>/admin/getItem?filter_name='+request,
          dataType: 'json',
          success: function(json) {
            response($.map(json, function(item) {
              return {
                label: item.name,
                value: item.id
              }
            }));
          }
        });
      },
      'select': function(item) {
        $('input[name=\'product_attribute[' + attribute_row + '][name]\']').val(item['label']);
        // $('input[name=\'product_attribute[' + attribute_row + '][attribute_id]\']').val(item['value']);
      }
    });
  }

  $('#item_row tbody tr').each(function(index, element) {
    attributeautocomplete(index);
  });

  // filter_category_name
  $('input[name=\'item_category_name\']').autocomplete({
    'source': function(request, response) {
      // console.log(request);
      $.ajax({
        url: '<?php echo e(url('')); ?>/admin/getItemCategory?filter_name=' +  encodeURIComponent(request),
        dataType: 'json',
        success: function(json) {
          response($.map(json, function(item) {
            console.log(item);
            return {
              label: item['name'],
              value: item['id']
            }
          }));
        }
      });
    },
    'select': function(item) {
      $('input[name="item_category_name"]').val(item['label']);
      $('#item_category_id').val(item['value']);
    }
  });

  // item_type
  $('input[name=\'item_type_name\']').autocomplete({
    'source': function(request, response) {
      // console.log(request);
      $.ajax({
        url: '<?php echo e(url('')); ?>/admin/getItemType?filter_name=' +  encodeURIComponent(request),
        dataType: 'json',
        success: function(json) {
          response($.map(json, function(item) {
            console.log(item);
            return {
              label: item['name'],
              value: item['id']
            }
          }));
        }
      });
    },
    'select': function(item) {
      $('input[name="item_type_name"]').val(item['label']);
      $('#item_type_id').val(item['value']);
    }
  });

  //initSaveItem
  $("#initSaveItem").click(function(){
    var item_category_name = $("input[name='item_category_name']").val();
    var itemCatID = $("input[name='item_category_id']").val();
    var item_type_name = $("input[name='item_type_name']").val();
    var itemTypeID = $("input[name='item_type_id']").val();
    var item_name = $("input[name='name']").val();
    var item_code = $("input[name='item_code']").val();
    var item_net_price = $("input[name='net_price']").val();
    var item_quantity = $("input[name='qty']").val();

    // var item_attribute = $("input[name='item_attribute[]']").val();
    // item_category_name
    if(item_category_name==''){
      $("div.item_category_group").addClass("has-error");
      toastr.warning("<?php echo trans('setup_mgr/item.warning_choose_item_category'); ?>");
      return false;
    }else{
      $("div.item_category_group").removeClass("has-error");
    }

    // item_type_name
    if(item_type_name==''){
      $("div.item_type_group").addClass("has-error");
      toastr.warning("<?php echo trans('setup_mgr/item.warning_choose_item_type'); ?>");
      return false;
    }else{
      $("div.item_type_group").removeClass("has-error");
    }

    // item_name
    if(item_name==''){
      $("div.item_name_group").addClass("has-error");
      toastr.warning("<?php echo trans('setup_mgr/item.warning_item_name'); ?>");
      return false;
    }else{
      $("div.item_name_group").removeClass("has-error");
    }

    // item_code
    if(item_code==''){
      $("div.item_code_group").addClass("has-error");
      toastr.warning("<?php echo trans('setup_mgr/item.warning_item_code'); ?>");
      return false;
    }else{
      $("div.item_code_group").removeClass("has-error");
    }

    // item_code
    if(item_net_price==''){
      $("div.item_net_price_group").addClass("has-error");
      toastr.warning("<?php echo trans('setup_mgr/item.warning_item_net_price'); ?>");
      return false;
    }else{
      $("div.item_net_price_group").removeClass("has-error");
    }

    // item_code
    if(item_quantity==''){
      $("div.item_quantity_group").addClass("has-error");
      toastr.warning("<?php echo trans('setup_mgr/item.warning_item_qty'); ?>");
      return false;
    }else{
      $("div.item_quantity_group").removeClass("has-error");
    }
  });
</script>

