<div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Category Form</h4>
      </div>
      <!-- x_content -->
      <div class="x_content">
        <!-- col-sm-12 -->
        <div class="col-sm-12">
          <div class="form-group cate-name">
            <label for="middle-name" class="control-label col-sm-4 col-xs-12">{!!trans('setup_mgr/item_category.item_category_name')!!}:<span class="validate_label_red">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12 ">
              {!! Form::text('item_category_name',null,['required'=>'','class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item_category.item_category_name")]) !!}
              <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="form-group brand-name">
            <label for="middle-name" class="control-label col-sm-4 col-xs-12">{!! trans('setup_mgr/item_category.branch_name') !!}<span class="validate_label_red">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12 ">
              {!! Form::select('branch_id', $branch, null, ['placeholder' => trans('setup_mgr/item_category.choose_branch'),'class'=>'form-control']) !!}
            </div>
            <div class="clearfix"></div>
          </div>
          <!-- row -->
          {{-- <div class="form-group">
            <label class="control-label col-sm-4 col-xs-12">{!!trans('setup_mgr/item_category.is_active')!!}</label>
            <div class="col-sm-6" >
              {!! Form::checkbox('is_active',null,null,['class' => 'flat form-control']) !!}
            </div>
            <div class="clearfix"></div>
          </div> --}}
        </div>
      </div>
      <div class="modal-footer">
        <div class="form-group">
          <label class="control-label col-sm-4 col-xs-12">&nbsp;</label>
          <div class="col-sm-6" >
            <button type="button" class="btn btn-default" data-dismiss="modal">{!!trans('setup_mgr/item_category.close')!!}</button>
            <button type="button" id="saveItemCategory" class="btn btn-primary">{!!trans('setup_mgr/item_category.save')!!}</button>
          </div>
          <div class="clearfix"></div>
        </div>
        
      </div>

    </div>
  </div>
</div>