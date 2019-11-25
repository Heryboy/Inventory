<!DOCTYPE html>
<html>
<head>
	<title>Report - Sale Item</title>
</head>
<body>

	<div class="logo">
		<div>
			<img width="100px" src="<?php echo e(url('images/uploads/company')); ?>/<?php echo e($Company->image); ?>"/>
		</div>
	</div>
	<div style="font-size: 14px;line-height: 20px;">
		Due Date: <?php echo e(date('Y-m-d')); ?><br/>

		From Date: <?php echo e($_REQUEST['from_date']); ?><br/>

		To Date: <?php echo e($_REQUEST['to_date']); ?> <br/>

		Branch: <?php echo e($Branch); ?>

	</div>
	<div><center><h2>POS Sale Item</h2></center></div>
	<table id="example1" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
			<td><?php echo trans('report/sale_item.entry_no'); ?></td>
			<td><?php echo trans('report/sale_item.entry_branch'); ?></td>
			<th><?php echo trans('report/sale_item.entry_code'); ?></th>
			<th><?php echo trans('report/sale_item.entry_name'); ?></th>
			<th><?php echo trans('report/sale_item.entry_unit'); ?></th>
			<th><?php echo trans('report/sale_item.entry_sale_qty'); ?></th>
			<th><?php echo trans('report/sale_item.entry_void_qty'); ?></th>
			<th><?php echo trans('report/sale_item.entry_discount'); ?></th>
			<!-- <th><?php echo trans('report/sale_item.entry_tax'); ?></th> -->
			<th><?php echo trans('report/sale_item.entry_gross_sale'); ?></th>
			<th><?php echo trans('report/sale_item.entry_net_sale'); ?></th>
			<!-- <th><?php echo trans('report/sale_item.entry_cost_of_goods'); ?></th> -->
			<th><?php echo trans('report/sale_item.entry_margin'); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php $i = 1;?>
		<?php 
			$total_discount = 0;
			$total_gross_sale = 0;
			$total_net_sale = 0;
			$total_margin = 0;
		?>
		<?php foreach($saleItems as $row): ?>
			<tr>
			<td><?php echo e($i); ?></td>
			<td><?php echo e($row->branch_name); ?></td>
			<td><?php echo e($row->item_code); ?></td>
			<td><?php echo e($row->item_name); ?></td>
			<td><?php echo e($row->unit); ?></td>
			<td><?php echo e($row->sale_qty); ?></td>
			<td>0</td>
			<td><?php echo e(number_format($row->discount_amount, 3)); ?></td>
			<td><?php echo e(number_format($row->sub_total, 3)); ?></td>
			<td><?php echo e(number_format(floatval($row->sub_total) - ( floatval($row->discount_amount)), 3)); ?></td>
			<td>
				<?php echo e(number_format(((floatval($row->sub_total) - floatval($row->discount_amount)) - floatval($row->total_netprice)), 3)); ?>

			</td>
			</tr>
			<?php 
			$total_discount += $row->discount_amount;
			$total_gross_sale += $row->sub_total;
			$total_net_sale += ($row->sub_total - $row->discount_amount);
			$total_margin += ($row->sub_total - $row->cost_amount);
			?>
			<?php $i++; ?>
		<?php endforeach; ?>
		
		</tbody>
		<tfoot>
			<tr> 
			<td colspan="7" style="text-align: right; font-size:16px;background-color:#5c5c5c;color:#fff;"><b>Total</b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_discount, 3)); ?></b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_gross_sale, 3)); ?></b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_net_sale, 3)); ?></b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_margin, 3)); ?></b></td>
			</tr>
		</tfoot>
		</table>

	<style type="text/css">
	html body{font-family: arial;}


		table.table-bordered.dataTable {
    border-collapse: separate !important;
}	table.dataTable {
    clear: both;
    margin-top: 6px !important;
    margin-bottom: 6px !important;
    max-width: none !important;
}

table.table {
    font-size: 13px;
}
.table-bordered {
    border: 1px solid #ddd;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
table {
    background-color: transparent;
}
table {
    border-spacing: 0;
    border-collapse: collapse;
}

.table-striped > tbody > tr:nth-of-type(2n+1) {
    background-color: #f9f9f9;
}

table.table-bordered tbody th, table.table-bordered tbody td {
    border-left-width: 0;
    border-bottom-width: 0;
}
.table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
    border: 1px solid #ddd;
        border-bottom-width: 1px;
        border-left-width: 1px;
}
.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
	</style>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>