<!-- search-filter -->
<div class="group-filter">
  <div class="row padding-top">
    
    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-12">
          <form method="put" id="form-search" action="{{url('admin/item_mgr/item_base_store/create')}}">
            
            <div class="col-sm-3">
              {!! Form::select('branch_id', $Branch, null, ['id'=>'branch_id','class'=>'form-control']) !!}
            </div>
            <div class="col-sm-3">
              {!! Form::text('from_date', $from_date, ['placeholder'=>'From Date','id'=>'from_date','class'=>'date-picker form-control']) !!}
            </div>
            <div class="col-sm-3">
              {!! Form::text('to_date', $to_date, ['placeholder'=>'To Date','id'=>'to_date','class'=>'date-picker form-control']) !!}
            </div>
            <div class="col-sm-12">
              <br/>
              <button form-id="form-search" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-wa fa-search"></i> SEARCH</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-sm-3">
      <span class="pull-right">
        <button form-id="form-itembasestore" type="submit" class="btn btn-sm btn-success"><i class="fa fa-wa fa-print"></i> {{trans('report/revenue_report.entry_print')}}</button>
      </span>
    </div>

  </div>
</div>