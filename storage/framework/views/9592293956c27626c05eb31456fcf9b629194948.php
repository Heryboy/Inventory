<!DOCTYPE html>
<html>
<head>
	<title>Inventory On Hand</title>
</head>
<body>

	<div class="logo">
		<div>
			<img width="100px" src="<?php echo e(url('images/uploads/company')); ?>/<?php echo e($Company->image); ?>"/>
		</div>
	</div>

	<div style="font-size: 14px;line-height: 20px;">
		Current Date: <?php echo e(date('Y-M-d H:i a')); ?><br/>

		From Date: <?php echo e($_REQUEST['from_date']); ?><br/>

		To Date: <?php echo e($_REQUEST['to_date']); ?> <br/>

		Branch: <?php echo e($Branch); ?>

	</div>
	<div><center><h2>Inventory On Hand</h2></center></div>
	<table id="example1" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
			<th><?php echo trans('item_mgr/item_in_stock.entry_code'); ?></th>
			<th><?php echo trans('item_mgr/item_in_stock.entry_name'); ?></th>
			<th><?php echo trans('item_mgr/item_in_stock.entry_unit'); ?></th>
			<th><?php echo trans('item_mgr/item_in_stock.entry_adjust_qty'); ?></th>
			<th><?php echo trans('item_mgr/item_in_stock.entry_purchase_qty'); ?></th>
			<th><?php echo trans('item_mgr/item_in_stock.entry_lost_qty'); ?></th>
			<th><?php echo trans('item_mgr/item_in_stock.entry_damage_qty'); ?></th>
			<th><?php echo trans('item_mgr/item_in_stock.entry_return_qty'); ?></th>
			<th><?php echo trans('item_mgr/item_in_stock.entry_sale_qty'); ?></th>
			<th><?php echo trans('item_mgr/item_in_stock.entry_transfer_qty'); ?></th>
			<th><?php echo trans('item_mgr/item_in_stock.entry_begin_balance'); ?></th>
			<!-- <th><?php echo trans('item_mgr/item_in_stock.entry_balance'); ?></th> -->
			</tr>
		</thead>
		<tbody>
			<?php 
				$sum_inventory_count = 0;
				$sum_purchase_qty = 0;
				$sum_lost_qty = 0;
				$sum_damage_qty = 0;
				$sum_return_qty = 0;
				$sum_sale_qty = 0;
				$sum_transfer_qty = 0;
				$sum_available_instock = 0;
			?>
			<?php foreach($ItemInStocks as $row): ?>
			<tr>
				<td><?php echo e($row->item_code); ?></td>
				<td><?php echo e($row->item_name); ?></td>
				<td><?php echo e($row->unit); ?></td>
				<td><?php echo e(floatval($row->adjust_qty)); ?></td>
				<td><?php echo e(floatval($row->purchase_qty)); ?></td>
				<td><?php echo e(floatval($row->lost_qty)); ?></td>
				<td><?php echo e(floatval($row->damage_qty)); ?></td>
				<td><?php echo e(floatval($row->return_qty)); ?></td>
				<td><?php echo e(floatval($row->sale_qty)+floatval($row->sale_order_qty)); ?></td>
				<td><?php echo e(floatval($row->transfer_qty)); ?></td>
				<td><?php echo e((floatval($row->purchase_qty)+floatval($row->adjust_qty))-(floatval($row->return_qty) + floatval($row->sale_qty)+floatval($row->sale_order_qty)+floatval($row->transfer_qty)+floatval($row->lost_qty)+floatval($row->damage_qty))); ?></td>
				<!-- <td></td> -->
			</tr>
			<?php 
				// $sum_inventory_count += $row->adjust_qty;
				// $sum_purchase_qty += floatval($row->purchase_qty);
				// $sum_lost_qty += $row->lost_qty;
				// $sum_damage_qty += $row->damage_qty;
				// $sum_return_qty += $row->return_qty;
				// $sum_sale_qty += (floatval($row->sale_qty)+floatval($row->sale_order_qty));
				// $sum_transfer_qty += $row->transfer_qty;
				// $sum_available_instock += (floatval($row->purchase_qty)+floatval($row->adjust_qty))-(floatval($row->return_qty) + floatval($row->sale_qty)+floatval($row->sale_order_qty)+floatval($row->transfer_qty)+floatval($row->lost_qty)+floatval($row->damage_qty));
			?>
			<?php endforeach; ?>
		</tbody>
		<!-- <tfoot>
			<tr> 
			<td colspan="3" style="text-align: right; font-size:16px;background-color:#5c5c5c;color:#fff;"><b>Total</b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e($sum_inventory_count); ?></b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e($sum_purchase_qty); ?></b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e($sum_lost_qty); ?></b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e($sum_damage_qty); ?></b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e($sum_return_qty); ?></b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e($sum_sale_qty); ?></b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e($sum_transfer_qty); ?></b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e($sum_available_instock); ?></b></td>
			</tr>
		</tfoot> -->
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