<!-- search-filter -->
<div class="group-filter">
  <div class="row padding-top">
    <div class="row">
      <div class="col-sm-12">
        <!-- <form method="put" id="form-search" action="{{url('admin/report/sales_pos_item')}}"> -->
        <form method="put" id="form-search" action="{{url('admin/item_mgr/item_base_store/create')}}">
          
          <div class="col-sm-3">
            {{trans('report/drawer_transaction.entry_branch')}}
            {!! Form::select('branch_id', $Branch, null, ['id'=>'branch_id','class'=>'form-control']) !!}
          </div>
          <div class="col-sm-3">
            {{trans('report/drawer_transaction.entry_from_date')}}
            {!! Form::text('from_date', $from_date, ['placeholder'=>'From Date','id'=>'from_date','class'=>'date-picker form-control']) !!}
          </div>
          <div class="col-sm-3">
            {{trans('report/drawer_transaction.entry_to_date')}}
            {!! Form::text('to_date', $to_date, ['placeholder'=>'To Date','id'=>'to_date','class'=>'date-picker form-control']) !!}
          </div>
          <div class="col-sm-3">
            <br/>
            <button form-id="form-search" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-wa fa-search"></i> SEARCH</button>
            <a target="_blank" href="/admin/report/print_drawer_transaction?branch_id=<?php echo $branchid;?>&from_date=<?php echo $start_date;?>&to_date=<?php echo $end_date;?>" form-id="form-itembasestore" class="btn btn-sm btn-success"><i class="fa fa-wa fa-print"></i> {{trans('report/revenue_report.entry_print')}}</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>