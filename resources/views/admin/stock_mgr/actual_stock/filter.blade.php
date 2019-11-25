
<!-- search-filter -->
<div class="group-filter">
  <div class="row padding-top">
    <div>
      <!-- <div class="col-sm-3">
        <div class="input-prepend input-group">
          <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-pencil"></i></span>
          <input name="filter_name" value="{{$filter_name}}" class="form-control active" placeholder="Item Name" type="text">
        </div>
      </div> -->
      <div class="col-sm-3">
        <div class="input-prepend input-group">
          <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
          <input name="filter_date" disabled class="date-picker form-control active" value="{{$filter_date}}" type="text">
        </div>
        <!-- <input type="text" name="" placeholder="Choose Date" class="date-picker form-lg form-control"> -->
      </div>

      <!-- <div class="col-sm-2">
        <button type="button" id="initSearch"  class="btn btn-sm btn-primary"><i class="fa fa-wa fa-search"></i> SEARCH</button>
      </div> -->
    </div>
  </div>
</div>

<script type="text/javascript">
    $("#initSearch").click(function(){
      var filter_date = $("input[name='filter_date']").val();
      var filter_name = $("input[name='filter_name']").val();
      window.location.href="/admin/stock_mgr/actual_stock?filter_name="+filter_name+'&filter_date='+filter_date;
    });
</script>