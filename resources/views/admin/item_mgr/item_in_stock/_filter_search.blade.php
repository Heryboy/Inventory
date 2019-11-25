<!-- search-filter -->
<form action="" method="patch">
  <div class="group-filter" style="margin-bottom: 10px;">
    <div class="row padding-top">
      <div>
        <div class="col-sm-3">
          <input type="text" placeholder="From Date" value="{{$start_date}}" name="from_date" class="date-picker form-lg form-control">
        </div>
        <div class="col-sm-3">
          <input type="text" placeholder="To Date" value="{{$end_date}}" name="to_date" class="date-picker form-lg form-control">
        </div>
        <div class="col-sm-2">
          <button class="btn btn-sm btn-primary"><i class="fa fa-wa fa-search"></i> FILTER</button>
        </div>
      </div>
    </div>
  </div>
</form>