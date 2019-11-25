<!-- search-filter -->
<div class="group-filter">
  <div class="row padding-top">
    <div class="row">
      <div class="col-sm-12">
        <form method="put" id="form-search" action="<?php echo e(url('admin/item_mgr/item_base_store/create')); ?>">
          
          <div class="col-sm-3">
            <?php echo e(trans('report/purchase_order.entry_branch')); ?>            
            <?php echo Form::select('branch_id', $Branch, null, ['id'=>'branch_id','class'=>'form-control']); ?>

          </div>
          <div class="col-sm-3">
            <?php echo e(trans('report/purchase_order.entry_from_date')); ?>            
            <?php echo Form::text('from_date', $from_date, ['placeholder'=>'From Date','id'=>'from_date','class'=>'date-picker form-control']); ?>

          </div>
          <div class="col-sm-3">
            <?php echo e(trans('report/purchase_order.entry_to_date')); ?>            
            <?php echo Form::text('to_date', $to_date, ['placeholder'=>'To Date','id'=>'to_date','class'=>'date-picker form-control']); ?>

          </div>
          <div class="col-sm-3">
            <br/>
            <button form-id="form-search" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-wa fa-search"></i> SEARCH</button>
            <button form-id="form-itembasestore" type="submit" class="btn btn-sm btn-success"><i class="fa fa-wa fa-print"></i> <?php echo e(trans('report/revenue_report.entry_print')); ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>