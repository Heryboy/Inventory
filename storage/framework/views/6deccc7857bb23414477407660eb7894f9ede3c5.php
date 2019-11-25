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
		Branch: <?php echo e($Branch); ?>

	</div>
	<div><center><h2>Item Information</h2></center></div>
	<table id="example1" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
				<th><?php echo trans('setup_mgr/item.item_name'); ?></th>
				<th><?php echo trans('setup_mgr/item.item_barcode'); ?></th>
				<th><?php echo trans('setup_mgr/item.item_code'); ?></th>
				<th><?php echo trans('setup_mgr/item.net_price'); ?></th>
				<th><?php echo trans('setup_mgr/item.cost'); ?></th>
				<th><?php echo trans('setup_mgr/item.retail_price'); ?></th>
				<th><?php echo trans('setup_mgr/item.item_category'); ?></th>
				<th><?php echo trans('setup_mgr/item.item_sub_category'); ?></th>
				<th><?php echo trans('setup_mgr/item.item_type'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($items as $row): ?>
			<tr>
				<td><?php echo e($row->name); ?></td>
				<td><?php echo e($row->item_barcode); ?></td>
				<td><?php echo e($row->item_code); ?></td>
				<td><?php echo e($row->net_price); ?></td>
				<td><?php echo e($row->cost); ?></td>
				<td><?php echo e($row->price); ?></td>
				<td><?php echo e($row->item_cat_name); ?></td>
				<td><?php echo e($row->item_sub_catName); ?></td>               
				<td><?php echo e($row->item_type_name); ?></td>   
			</tr>
			<?php endforeach; ?>
		</tbody>
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