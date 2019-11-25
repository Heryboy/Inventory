  
  <!-- search-filter -->
  <div class="group-filter">
    <div class="row padding-top">
      <div>
        <div class="col-sm-3">
          <div class="input-prepend input-group">
            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-pencil"></i></span>
            <!-- <input name="filter_name" value="<?php echo e($filter_name); ?>" class="form-control active" placeholder="Item Name" type="text"> -->
            <?php echo Form::select('branch_id', $Branch, $branch_id, ['id'=>'brand_id','class'=>'form-control']); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-prepend input-group">
            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-pencil"></i></span>
            <!-- <input name="filter_name" value="<?php echo e($filter_name); ?>" class="form-control active" placeholder="Item Name" type="text"> -->
            <select class="form-control">
              <option value="0">--All Location--</option>
              <?php foreach($LocationBaseBranches as $LocationBaseBranch): ?>
                <option value="<?php echo e($LocationBaseBranch->ItemLocation->id); ?>"><?php echo e($LocationBaseBranch->ItemLocation->name); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-prepend input-group">
            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
            <input name="filter_date" class="date-picker form-control active" value="<?php echo e($filter_date); ?>" type="text">
          </div>
          <!-- <input type="hidden" name="branch_id" value="<?php echo e($branch_id); ?>" class="date-picker form-lg form-control"> -->
        </div>
        <input type="hidden" name="sub_catID" value="<?php echo e($sub_catID); ?>"/>
        <div class="col-sm-2">
          <button type="button" id="initSearch"  class="btn btn-sm btn-primary"><i class="fa fa-wa fa-search"></i> <?php echo trans('stock_mgr/adjustment_stock.entry_search'); ?></button>
        </div>

      </div>
    </div>
  </div>

  <script type="text/javascript">
    $("#initSearch").click(function(){
      var filter_date = $("input[name='filter_date']").val();
      var filter_name = '';//$("input[name='filter_name']").val();
      var branch_id = $("select[name='branch_id']").val();
      var sub_catID = $("input[name='sub_catID']").val();
      window.location.href="/admin/stock_mgr/adjustment_stock?filter_name="+filter_name+'&filter_date='+filter_date+'&branch_id='+branch_id + '&sub_catID=' + sub_catID;
    });
</script>
