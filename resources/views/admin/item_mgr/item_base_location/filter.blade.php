<!-- search-filter -->
<div class="group-filter">
  <div class="row padding-top">
    
    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-12">
          <form method="put" id="form-search" action="{{url('admin/item_mgr/item_base_location/create')}}">
            <div class="col-sm-4">
              {!! Form::select('branch_id', $Branch, $branch_id, ['id'=>'brand_id','class'=>'form-control']) !!}
            </div>
            <div class="col-sm-4">
              {!! Form::select('category_id', $item_category, $category_id, ['id'=>'brand_id','class'=>'form-control']) !!}
            </div>
            <div class="col-sm-4">
              {!! Form::select('location_id', $ItemLocation, null, ['id'=>'location_id','class'=>'form-control']) !!}
            </div>
            <div class="col-sm-4">
              <button form-id="form-search" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-wa fa-search"></i> SEARCH</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
    

    <div class="col-sm-3">
      <span class="pull-right">
        <a class="btn btn-sm btn-primary" href="{{url('admin/item_mgr/item_base_location')}}"><i class="fa fa-wa fa-reply"></i> {{trans('item_mgr/item_base_store.back_to_list')}}</a>
        <button form-id="form-itembasestore" type="submit" class="btn btn-sm btn-success"><i class="fa fa-wa fa-save"></i> {{trans('item_mgr/item_base_store.save')}}</button>
        {{-- <button class="btn btn-sm btn-danger"><i class="fa fa-wa fa-trash"></i> {{trans('item_mgr/item_base_store.delete')}}</button>     --}}
      </span>
    </div>

  </div>
</div>