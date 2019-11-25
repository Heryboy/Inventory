 
<?php $__env->startSection('content'); ?>
<!-- header -->
<?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
     <?php echo $__env->make('admin.setup_mgr.item.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
      <div style="min-height: 650px;" class="right_col" role="main">
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo $__env->make('admin.common.error_input', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin.common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="x_panel">
              
              <div class="x_title">
                <div class="row">
                  <h2><i class="fa fa-wa fa-th"></i> <?php echo trans('setup_mgr/item.entry_title'); ?></h2>
                  <span class="pull-right">
                    <?php if($action=='Edit'): ?>
                      <a data-original-title="<?php echo trans('common.back_to_list'); ?>"  data-toggle="tooltip" data-placement="top" href="<?php echo e(url('admin/setup_mgr/item')); ?>" type="button" class="btn btn-sm btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs"><?php echo trans('common.back_to_list'); ?></span></a>

                      <button type="submit" data-original-title="<?php echo trans('common.create'); ?>"  data-toggle="tooltip" form-id="form-item" data-placement="top" class="btn btn-sm btn-success" name="submit" title="<?php echo trans('setup_mgr/item.save'); ?>"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs"><?php echo trans('setup_mgr/item.save'); ?></span></button>
                    <?php else: ?>
                      <a data-original-title="<?php echo trans('common.back_to_list'); ?>"  data-toggle="tooltip" data-placement="top" href="<?php echo e(url('admin/setup_mgr/item')); ?>" type="button" class="btn btn-sm btn-default" name="submit"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs"><?php echo trans('common.back_to_list'); ?></span></a>
                    <?php endif; ?>
                  </span>
                  <div class="clearfix"></div>
                </div>
              </div>

              <?php if(!isset($item)): ?>
                <?php echo Form::open(['url' => 'admin/setup_mgr/item','id'=>'form-item','files'=> true,'class'=>'form-horizontal']); ?>

              <?php else: ?>
                <!-- !! Form::model($item,['method' => 'post','class'=>'form-horizontal','route'=>['admin.setup_mgr.item.update',$item->id]]) !!} -->
                <?php echo Form::model($item,['method' => 'PATCH','id'=>'form-item','files'=> true,'class'=>'form-horizontal','route'=>['admin.setup_mgr.item.update',$item->id]]); ?>

              <?php endif; ?>
                
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-wa fa-th"></i> <?php echo trans('setup_mgr/item.entry_title'); ?></a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-wa fa-th"></i> <?php echo trans('setup_mgr/item.item_unit'); ?></a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false"><i class="fa fa-wa fa-th"></i> <?php echo trans('setup_mgr/item.item_gallary'); ?></a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false"><i class="fa fa-wa fa-th"></i> Item Related</a>
                    </li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="padding-top-md tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                      <!-- row -->
                      <div class="bg-title"><i class="fa fa-wa fa-th"></i> <?php echo trans('setup_mgr/item.entry_title'); ?></div>
                      <div class="row">
                        <!-- x_content -->
                        <div class="x_content">
                          <!-- col-sm-2 -->
                          <div class="col-sm-2">
                            <div style="position:relative;">
                              <!--e-logo-->
                              <div class="e-logo">
                                <?php if(isset($item)): ?>
                                  <img src="<?php echo e(url('images/uploads/products')); ?>/<?php echo e($item->image); ?>" id="t" width="150px">
                                  <input value="<?php echo e($item->image); ?>" name="image_hidden" type="hidden"/>
                                <?php else: ?>
                                  <img src="<?php echo e(url('images/no_image.png')); ?>" id="t" width="150px">
                                <?php endif; ?>
                                
                                <a class="file"><span>Choose Image</span>
                                  <input id="image" accept="image/x-png, image/gif, image/jpeg" name="image" type="file">
                                </a>
                              </div><!--#END e-logo-->
                            </div>
                          </div>

                          <!-- col-sm-12 -->
                          <div class="col-sm-5">

                            <div class="form-group <?php if($errors->first('name')): ?> <?php echo e("has-error"); ?> <?php endif; ?> col-sm-12">
                              <label for="middle-name" class="control-label col-md-5 col-sm-5 col-xs-12"><?php echo trans('setup_mgr/item.item_name'); ?> <span class="validate_label_red">*</span></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 ">
                                <?php echo Form::text('name',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.item_name")]); ?>

                                <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>

                            <div class="form-group col-sm-12">
                              <label for="middle-name" class="control-label col-md-5 col-sm-5 col-xs-12"><?php echo trans('setup_mgr/item.item_alias'); ?> <span class="validate_label_red">*</span></label></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 ">
                                <?php echo Form::text('alias',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.item_alias")]); ?>

                                <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>

                            <div class="form-group <?php if($errors->first('item_code')): ?> <?php echo e("has-error"); ?> <?php endif; ?> col-sm-12">
                              <label for="middle-name" class="control-label col-md-5 col-sm-5 col-xs-12"><?php echo trans('setup_mgr/item.item_code'); ?> <span class="validate_label_red">*</span></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 ">
                                <?php echo Form::text('item_code',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.item_code")]); ?>

                                <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>

                            <div class="form-group col-sm-12">
                              <label for="middle-name" class="control-label col-md-5 col-sm-5 col-xs-12"><?php echo trans('setup_mgr/item.item_barcode'); ?> </label>
                              <div class="col-md-7 col-sm-7 col-xs-12 ">
                                <?php echo Form::text('item_barcode',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.item_barcode")]); ?>

                                <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>

                            <div class="form-group <?php if($errors->first('item_category_id')): ?> <?php echo e("has-error"); ?> <?php endif; ?> col-sm-12">
                              <label for="middle-name" class="control-label col-md-5 col-sm-5 col-xs-12"><?php echo trans('setup_mgr/item.item_category'); ?> <span class="validate_label_red">*</span></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 ">
                                <?php echo Form::select('item_category_id', $item_category, null, ['placeholder' => trans('setup_mgr/item.choose_item_category'),'id'=>'item_category_id','class'=>'form-control has-feedback-left']); ?>

                                <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>

                            <div class="form-group <?php if($errors->first('item_category_id')): ?> <?php echo e("has-error"); ?> <?php endif; ?> col-sm-12">
                              <label for="middle-name" class="control-label col-md-5 col-sm-5 col-xs-12"><?php echo trans('setup_mgr/item.item_sub_category'); ?> <span class="validate_label_red">*</span></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 ">
                                <select id="item_sub_category_id" name="item_sub_category_id" class="form-control has-feedback-left">
                                  <option><?php echo trans('setup_mgr/item.choose_item_sub_category'); ?></option>
                                  <?php if(isset($item)): ?>
                                    <?php foreach($item_sub_category as $itemSubCat): ?>
                                      <option <?php if($itemSubCat->id==$item->item_sub_category_id): ?> <?php echo e("selected='selected'"); ?> <?php endif; ?> value="<?php echo e($itemSubCat->id); ?>"><?php echo e($itemSubCat->name); ?></option>
                                    <?php endforeach; ?>
                                  <?php endif; ?>
                                </select>
                                <!-- !! Form::select('item_sub_category_id', $item_sub_category, null, ['placeholder' => trans('setup_mgr/item.choose_item_sub_category'),'class'=>'form-control has-feedback-left']) !!} -->
                                <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>

                          </div>

                          <!-- col-sm-4 -->
                          <div class="col-sm-5">
                            <div class="form-group <?php if($errors->first('item_type_id')): ?> <?php echo e("has-error"); ?> <?php endif; ?> col-sm-12">
                              <label for="middle-name" class="control-label col-md-5 col-sm-5 col-xs-12"><?php echo trans('setup_mgr/item.item_type'); ?> <span class="validate_label_red">*</span></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 ">
                                <?php echo Form::select('item_type_id', $item_type, null, ['placeholder' => trans('setup_mgr/item.choose_item_type'),'class'=>'form-control has-feedback-left']); ?>

                                <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>

                            <div class="form-group <?php if($errors->first('item_status_id')): ?> <?php echo e("has-error"); ?> <?php endif; ?> col-sm-12">
                              <label for="middle-name" class="control-label col-md-5 col-sm-5 col-xs-12"><?php echo trans('setup_mgr/item.item_status'); ?> <span class="validate_label_red">*</span></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 ">
                                <?php echo Form::select('item_status_id', $item_status, null, ['placeholder' => trans('setup_mgr/item.choose_item_status'),'class'=>'form-control has-feedback-left']); ?>

                                <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>

                            <div class="form-group <?php if($errors->first('item_size_id')): ?> <?php echo e("has-error"); ?> <?php endif; ?> col-sm-12">
                              <label for="middle-name" class="control-label col-md-5 col-sm-5 col-xs-12"><?php echo trans('setup_mgr/item.item_size'); ?> <span class="validate_label_red">*</span></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 ">
                                <?php echo Form::select('item_size_id', $item_size, null, ['placeholder' => trans('setup_mgr/item.choose_item_size'),'class'=>'form-control has-feedback-left']); ?>

                                <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>

                            <div class="form-group <?php if($errors->first('qty')): ?> <?php echo e("has-error"); ?> <?php endif; ?> col-sm-12">
                              <label for="middle-name" class="control-label col-md-5 col-sm-5 col-xs-12"><?php echo trans('setup_mgr/item.order_qty'); ?> <span class="validate_label_red">*</span></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 ">
                                <?php echo Form::text('qty', 1,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.qty")]); ?>

                                <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>

                            <div class="form-group <?php if($errors->first('item_code')): ?> <?php echo e("has-error"); ?> <?php endif; ?> col-sm-12">
                              <label for="middle-name" class="control-label col-md-5 col-sm-5 col-xs-12"> <?php echo e(trans('setup_mgr/item.default_sale_unit')); ?> <span class="validate_label_red">*</span></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 ">
                                <?php echo Form::select('default_unit', $units, null, ['placeholder' => trans('setup_mgr/item.choose_unit'),'class'=>'form-control has-feedback-left']); ?>

                                <!-- !! Form::text('item_code',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.item_code")]) !!} -->
                                <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                              </div>
                              <!-- col-sm-1 -->
                              <!-- <div class="col-sm-1"><button class="btn btn-primary btn-sm"><i class="fa fa-wa fa-reply"></i></button></div> -->
                            </div>

                            <!-- row -->
                            <div class="form-group col-sm-12">
                              <label class="control-label col-md-5 col-sm-5 col-xs-12"><?php echo trans('setup_mgr/item.is_active'); ?></label>
                              <!-- col-sm-6 -->
                              <div class="col-sm-7" >
                                <div class="checkbox">
                                  <?php echo Form::checkbox('is_active',null,true,['class' => 'flat']); ?>

                                </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>

                      <!-- row -->
                      <div class="bg-title"><i class="fa fa-wa fa-th"></i> <?php echo e(trans('setup_mgr/item.price_package')); ?></div>
                      <div class="row">
                        <!-- x_content -->
                        <div class="x_content">
                          <!-- col-sm-12 -->
                          <div class="col-sm-12">

                            <div class="row form-group <?php if($errors->first('net_price')): ?> <?php echo e("has-error"); ?> <?php endif; ?> col-sm-6">
                              <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo trans('setup_mgr/item.net_price'); ?> <span class="validate_label_red">*</span></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 ">
                                <?php echo Form::text('net_price',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.net_price")]); ?>

                                <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>

                            <div class="row form-group <?php if($errors->first('cost')): ?> <?php echo e("has-error"); ?> <?php endif; ?> col-sm-6">
                              <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo trans('setup_mgr/item.cost'); ?> <span class="validate_label_red">*</span></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 ">
                                <?php echo Form::text('cost',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.cost")]); ?>

                                <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>

                            <!-- row -->
                            <div class="row form-group <?php if($errors->first('price')): ?> <?php echo e("has-error"); ?> <?php endif; ?> col-sm-6">
                              <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo trans('setup_mgr/item.retail_price'); ?> <span class="validate_label_red">*</span></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 ">
                                <?php echo Form::text('price',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.retail_price")]); ?>

                                <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>

                            <!-- row -->
                            <!-- <div class="form-group <?php if($errors->first('default_currency')): ?> <?php echo e("has-error"); ?> <?php endif; ?> col-sm-6">
                              <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo trans('setup_mgr/item.currency'); ?> <span class="validate_label_red">*</span></label>
                              <div class="col-md-7 col-sm-7 col-xs-12 ">
                                <?php echo Form::select('default_currency', $currency, null, ['placeholder' => trans('setup_mgr/item.choose_currency'),'class'=>'form-control has-feedback-left']); ?>

                                <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div> -->
                            
                          </div>
                        </div>
                      </div>

                    </div>
                    <div role="tabpanel" class="padding-top-md tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                      <!-- bg-title -->
                      <!-- <div class="bg-title"><i class="fa fa-wa fa-th"></i> <?php echo trans('setup_mgr/item.item_conversion'); ?></div> -->
                      <div class="row">
                        <!-- x_content -->
                        <div class="x_content">
                          <!-- col-sm-12 -->
                          <div class="col-sm-12">
                            Sample Item Conversion: <br/>
                            1 Box = 1 Box <br/>
                            1 Case = 12 Box
                            <div class="x_content">
                              <table id="item_row_conversion" class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th><?php echo trans('setup_mgr/item.qty1'); ?></th>
                                    <th><?php echo trans('setup_mgr/item.unit1'); ?></th>
                                    <th> # </th>
                                    <th><?php echo trans('setup_mgr/item.qty2'); ?></th>
                                    <th><?php echo trans('setup_mgr/item.unit2'); ?></th>
                                    <th><?php echo trans('setup_mgr/item.action'); ?></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $attribute_conversion = 0;?>
                                  <?php if(isset($ItemConversion)): ?>
                                    <?php foreach($ItemConversion as $ItemCon): ?>
                                      <tr id="attribute-item-conversion<?php echo $attribute_conversion;?>">
                                        <td>
                                          <?php echo Form::text('item_conversion['.$attribute_conversion.'][qty1]',$ItemCon->qty1,['class'=>'form-control','placeholder'=>trans("setup_mgr/item.qty1")]); ?>

                                          
                                        </td>
                                        <td>
                                          <?php echo Form::select('item_conversion['.$attribute_conversion.'][unit1]', $units, $ItemCon->unit1, ['placeholder' => trans('setup_mgr/item.choose_unit'),'class'=>'form-control']); ?>

                                        </td>
                                        <td> <center><b>=</b></center> </td>
                                        <td>
                                          <?php echo Form::text('item_conversion['.$attribute_conversion.'][qty2]',$ItemCon->qty2,['class'=>'form-control','placeholder'=>trans("setup_mgr/item.qty2")]); ?>

                                        </td>
                                        <td>
                                          <?php echo Form::select('item_conversion['.$attribute_conversion.'][unit2]', $units, $ItemCon->unit2, ['placeholder' => trans('setup_mgr/item.choose_unit'),'class'=>'form-control']); ?>

                                        </td>
                                        <td>
                                          <button type="button" onclick="$('#attribute-item-conversion<?php echo $attribute_conversion;?>').remove();" data-toggle="tooltip" title="<?php echo trans('setup_mgr/item.remove_item'); ?>" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
                                        </td>
                                      </tr>
                                      <?php $attribute_conversion ++; ?>
                                    <?php endforeach; ?>
                                  <?php endif; ?>
                                  
                                </tbody>

                                <tfoot>
                                  <tr>
                                    <td colspan="5">&nbsp;</td>
                                    <td>
                                      <button type="button" data-toggle="tooltip" data-placement="top" title="<?php echo trans('setup_mgr/item.add_item_conversion'); ?>" onclick="addItemCoversion();" class="btn btn-primary btn-sm"><i class="fa fa-wa fa-plus"></i></button>
                                    </td>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>

                    <div role="tabpanel" class="padding-top-md tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                      <!-- bg-title -->
                      <!-- <div class="bg-title"><i class="fa fa-wa fa-th"></i> Item Related</div> -->
                      <div class="row">
                        <!-- x_content -->
                        <div class="x_content">
                          <!-- col-sm-12 -->
                          <div class="col-sm-12">
                            <?php $gallary_row=0;?>
                            <table id="gallary_row" class="table table-bordered">
                              <thead>
                                <tr>
                                  <th><?php echo e(trans('setup_mgr/item.gallary_name')); ?></th>
                                  <th><?php echo e(trans('setup_mgr/item.image_gallary')); ?></th>
                                  <th><?php echo e(trans('setup_mgr/item.order_level')); ?></th>
                                  <th><?php echo e(trans('setup_mgr/item.action')); ?></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if(isset($ItemGallary)): ?>
                                  <?php foreach($ItemGallary as $row): ?>
                                    <tr id="attribute-row-gallary<?php echo $gallary_row;?>">

                                      <td>
                                        <input type="text" id="item_attribute" name="attribute_image[<?php echo e($gallary_row); ?>][name]" value="<?php echo e($row->name); ?>" placeholder="Item Product" class="form-control" />
                                      </td>
                                      <td>
                                        <div style="position:relative;">

                                          <div class="e-logo">
                                            <?php if($row->image_gallary==null): ?>
                                              <img width="120px" src="<?php echo e(url("images/no_image.png")); ?>" id="p<?php echo e($gallary_row); ?>"/>
                                            <?php else: ?>
                                              <img width="120px" src="<?php echo e(url("images/uploads/products")); ?>/<?php echo e($row->image_gallary); ?>" id="p<?php echo e($gallary_row); ?>" />
                                            <?php endif; ?>
                                            <input type="hidden" value="<?php echo e($row->image_gallary); ?>" name="attribute_image[<?php echo e($gallary_row); ?>][image_gallary_hidden]">
                                            <a class="file"><span>Image Gallary</span>
                                              <input id="photo<?php echo e($gallary_row); ?>" accept="image/x-png, image/gif, image/jpeg" name="attribute_image[<?php echo e($gallary_row); ?>][image_gallary]" type="file">
                                            </a>
                                          </div>
                                        </div>
                                      </td>
                                      <td><input type="text" id="item_attribute" name="attribute_image[<?php echo e($gallary_row); ?>][order_level]" value="<?php echo e($row->order_level); ?>" placeholder="Item Product" class="form-control" /></td>
                                      <td>
                                        <button type="button" onclick="$('#attribute-row-gallary<?php echo e($gallary_row); ?>').remove();" data-toggle="tooltip" title="<?php echo trans('setup_mgr/item.remove_item'); ?>" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
                                      </td>
                                    </tr>
                                    <script type="text/javascript">
                                      $(document).ready(function() {
                                       $('#photo<?php echo e($gallary_row); ?>').on('change', function(ev) {
                                          var f = ev.target.files[0];
                                          var fr = new FileReader();
                                          fr.onload = function(ev2) {
                                            console.dir(ev2);
                                            $('#p<?php echo e($gallary_row); ?>').attr('src', ev2.target.result);
                                          };
                                          
                                          fr.readAsDataURL(f);
                                        });
                                     });
                                    </script>
                                    <?php $gallary_row++;?>
                                  <?php endforeach; ?>
                                <?php endif; ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td colspan="3">&nbsp;</td>
                                  <td>
                                    <button type="button" data-toggle="tooltip" data-placement="top" title="<?php echo trans('setup_mgr/item.add_related_item'); ?>" onclick="addGallary();" class="btn btn-primary btn-sm"><i class="fa fa-wa fa-plus"></i></button>
                                  </td>
                                </tr>
                              </tfoot>
                            </table>
                            
                          </div>
                        </div>
                      </div>
                    </div>


                    <div role="tabpanel" class="padding-top-md tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                      <!-- bg-title -->
                      <!-- <div class="bg-title"><i class="fa fa-wa fa-th"></i> Item Related</div> -->
                      <div class="row">
                        <!-- x_content -->
                        <div class="x_content">
                          <!-- col-sm-12 -->
                          <div class="col-sm-12">
                            <?php $attribute_row=0;?>
                            <table id="item_row" class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>Item Name</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if(isset($ItemRelated)): ?>
                                  <?php foreach($ItemRelated as $Item): ?>
                                    <tr id="attribute-row-item<?php echo e($attribute_row); ?>">
                                      <td>
                                        <input type="text" id="item_attribute" name="item_attribute['<?php echo $attribute_row;?>'][item_id]" value="<?php echo e($Item->name); ?>" placeholder="Item Product" class="form-control" />
                                        <input type="hidden" id="item_attribute" name="item_attribute_hidden[<?php echo e($attribute_row); ?>][item_id]" value="<?php echo e($Item->id); ?>" placeholder="Item Product" class="form-control" />
                                      </td>

                                      <td>
                                        <button type="button" onclick="$('#attribute-row-item<?php echo e($Item->id); ?>').remove();" data-toggle="tooltip" title="<?php echo trans('setup_mgr/item.remove_item'); ?>" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
                                      </td>
                                    </tr>
                                    <?php $attribute_row++;?>
                                  <?php endforeach; ?>
                                <?php endif; ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>
                                    <button type="button" data-toggle="tooltip" data-placement="top" title="<?php echo trans('setup_mgr/item.add_related_item'); ?>" onclick="addItem();" class="btn btn-primary btn-sm"><i class="fa fa-wa fa-plus"></i></button>
                                  </td>
                                </tr>
                              </tfoot>
                            </table>
                            
                          </div>
                        </div>
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



  <!-- add dynamic related item -->
<script type="text/javascript">

  // item_category_id
  $(function(){
    $("#item_category_id").change(function(){
      var item_category_id = $(this).val();

      $.ajax({
          url: "<?php echo e(url('admin/setup_mgr/getItemSubCategory')); ?>",
          dataType: "json",
          timeout: 3000,
          data: {
            item_category_id: item_category_id,
          },
          error: function(x, t, m) {
            if(t==="timeout") {
              // alert("got timeout");
            } else {
              // alert(t);
            }
            $(window).unbind('beforeunload');
          },
          success: function( data ) {
            var html='';
            console.log(data);
            if(data==""){
              html += '<option><?php echo trans("setup_mgr/item.choose_item_sub_category"); ?></option>';
            }else{
              html += '<option><?php echo trans("setup_mgr/item.choose_item_sub_category"); ?></option>';
              $.each(data, function(id, value){
                html += '<option value="'+value.id+'">';
                  html += value.name;  
                html += '</option>';
              });
            }

            // if(utc_default_time==1){
            //   var visible_utc = 'style="display: block;cursor: pointer;"';
            //   var visible_local = 'style="display: none;cursor: pointer;"';
            // }else if(utc_default_time==2){
            //   var visible_utc = 'style="display: none;cursor: pointer;"';
            //   var visible_local = 'style="display: block;cursor: pointer;"';
            // }
            // var utc_option='';

            // utc_option += '<a href="javascript:void();" onClick="initUTCTime(1)"><div id="local-time-title" class="utc-time-title" '+visible_local+'>Local Time<span class="pull-right"><i class="fa fa-wa fa-chevron-circle-right"></i></span></div></a>';

            // utc_option += '<a href="javascript:void();" onClick="initUTCTime(2)"><div id="utc-time-title" class="utc-time-title" '+visible_utc+'>UTC Time<span class="pull-right"><i class="fa fa-wa fa-chevron-circle-right"></i></span></div></a>';
            
            $("#item_sub_category_id").html(html);

          }
      });

    });
  });

  // attribute_row
  var attribute_row = <?php echo $attribute_row; ?>;

  // addImage
  function addItem() {
    var html = '';
    html += '<tr id="attribute-row-item'+ attribute_row +'">';
      html += '<td>';
        html += '<input type="text" id="item_attribute" name="item_attribute[' + attribute_row + '][item_id]" value="" placeholder="Item Product" class="form-control" />';
        html += '<input type="hidden" id="item_attribute" name="item_attribute_hidden[' + attribute_row + '][item_id]" value="" placeholder="<?php echo trans("setup_mgr/item.remove_item"); ?>" class="form-control" />';
      html += '</td>';
      html += '<td><button type="button" onclick="$(\'#attribute-row-item' + attribute_row + '\').remove();" data-toggle="tooltip" title="<?php echo trans("setup_mgr/item.remove_item"); ?>" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
    $('#item_row tbody').append(html);
    autocompleteGetItem(attribute_row);
    attribute_row++;
  }

  // var attribute_gallary_row = <?php echo $gallary_row; ?>;
  // // addGallary
  // function addGallary() {
  //   var html = '';
  //   html += '<tr id="attribute-row-item'+ attribute_gallary_row +'">';
  //     html += '<td>';
  //       html += '<input type="file" id="gallary" name="gallary[' + attribute_gallary_row + '][gallary_image]"/>';
  //     html += '</td>';
  //     html += '<td><button type="button" onclick="$(\'#attribute-row-gallary' + attribute_gallary_row + '\').remove();" data-toggle="tooltip" title="<?php echo trans("setup_mgr/item.remove_item"); ?>" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';
  //   html += '</tr>';
  //   $('#gallary_row tbody').append(html);
  //   attribute_gallary_row++;
  // }

  // attribute_image_row
  var attribute_image_row = <?php echo $gallary_row;?>;
  // addImage
  function addGallary() {
    var html = '';
    html += '<tr id="attribute-row-gallary'+ attribute_image_row +'">';
      html += '<td valign="center" style="width: 20%;"><input type="text" name="attribute_image[' + attribute_image_row + '][name]" value="" placeholder="<?php echo trans("setup_mgr/item.gallary_name"); ?>" class="form-control" /></td>';
      html += '<td>';
        html += '<div style="position:relative;">';
          html += '<div class="e-logo">';
            html += '<img width="120px" src="<?php echo e(url("images/no_image.png")); ?>" id="p'+attribute_image_row+'" />';
            html += '<a class="file"><span>Image</span>';
            html += '<input id="photo'+attribute_image_row+'" accept="image/x-png, image/gif, image/jpeg" name="attribute_image['+attribute_image_row+'][image_gallary]" type="file">';
            html += '<input type="hidden" name="attribute_image['+attribute_image_row+'][image_gallary_hidden]"/>';
            html += '</a>';
          html += '</div>';
        html += '</div>';
      html += '</td>';
      
      html += '<td>';
        html += '<input type="text" placeholder="Order Level" class="form-control" name="attribute_image['+attribute_image_row+'][order_level]"/>';
      html += '</td>';

      html += '<td><button type="button" onclick="$(\'#attribute-row-gallary' + attribute_image_row + '\').remove();" data-toggle="tooltip" title="Remove Image" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';

    html += '</tr>';

    $('#gallary_row tbody').append(html);
    $.eventallData(attribute_image_row);
    attribute_image_row++;
  }

  // event all script #####
  $(function(){
    $.eventallData = function(attribute_row){
      $(document).ready(function() {
        $('#photo'+attribute_row+'').on('change', function(ev) {
          var f = ev.target.files[0];
          var fr = new FileReader();
          
          fr.onload = function(ev2) {
            console.dir(ev2);
            $('#p'+attribute_row+'').attr('src', ev2.target.result);
          };
          
          fr.readAsDataURL(f);
        });
      });
    }
  });
  // }

  // addItemCoversion
  var attribute_conversion = <?php echo $attribute_conversion; ?>;
  function addItemCoversion(){
    var html = '';
    html += '<tr id="attribute-item-conversion'+ attribute_conversion +'">';
      html += '<td>';
        html += '<input type="text" name="item_conversion[' + attribute_conversion + '][qty1]" value="" placeholder="<?php echo trans("setup_mgr/item.qty1"); ?>" class="form-control" />';
      html += '</td>';

      html += '<td>';
        html += '<select class="form-control" name="item_conversion['+attribute_conversion+'][unit1]">';
          <?php foreach($unitGroups as $unit): ?>
            html += '<option value="<?php echo e($unit->id); ?>"><?php echo e($unit->name); ?></option>';
          <?php endforeach; ?>
        html += '</select>';
      html += '</td>';

      html += '<td>';
        html += '<center><b>=</b></center>';
      html += '</td>';

      html += '<td>';
        html += '<input type="text" name="item_conversion[' + attribute_conversion + '][qty2]" value="" placeholder="<?php echo trans("setup_mgr/item.qty2"); ?>" class="form-control" />';
      html += '</td>';

      html += '<td>';
        html += '<select class="form-control" name="item_conversion['+attribute_conversion+'][unit2]">';
          <?php foreach($unitGroups as $unit): ?>
            html += '<option value="<?php echo e($unit->id); ?>"><?php echo e($unit->name); ?></option>';
          <?php endforeach; ?>
        html += '</select>';
      html += '</td>';

      html += '<td><button type="button" onclick="$(\'#attribute-item-conversion' + attribute_conversion + '\').remove();" data-toggle="tooltip" title="<?php echo trans("setup_mgr/item.remove_item"); ?>" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
    $('#item_row_conversion tbody').append(html);
    attribute_conversion++;
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
        $('input[name=\'item_attribute[' + attribute_row + '][item_id]\']').val(item['label']);
        $('input[name=\'item_attribute_hidden[' + attribute_row + '][item_id]\']').val(item['value']);
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

  // item_category_id

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>