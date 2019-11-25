<!DOCTYPE html>
<html>
<head>
	<title>Summary Reports</title>
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
	<div><center><h2>Sale Summary</h2></center></div>
	<?php 
		$total_gross_sale = 0;
		$total_discount = 0;
		$total_netsale = 0;
		$total_cost_product = 0;
		$total_gross_profit = 0;
		$total_tax = 0;
		$total_margin = 0;
	?>
	<?php foreach($summaryReports as $row): ?>
	<?php 
		$total_gross_sale += number_format($row->sub_total_amount, 3);
		$total_discount += number_format($row->total_discount, 3);
		$total_netsale += number_format(($row->sub_total_amount - $row->total_discount), 3);
		$total_cost_product += number_format($row->total_cost_amount, 3);
		$total_gross_profit += number_format(($row->sub_total_amount - $row->total_cost_amount), 3);
		$total_tax += number_format($row->total_tax_amount, 3);
		$total_margin += number_format(($row->sub_total_amount - $row->total_cost_amount), 3);
	?>
	<?php endforeach; ?>
	<!-- row -->
	<div style="padding-top:10px;">
		<!-- row top_tiles -->
		<div class="row top_tiles">
		<div class="box-grid col-sm-3 col-xs-12">
			<div class="tile-stats">
			<!-- <div class="icon"><i class="fa fa-users"></i></div> -->
			<h4>Gross Sales: <?php echo e(number_format($total_gross_sale, 3)); ?> $</h4>
			<!-- <p> <a href="<?php echo e(url('admin/customer_mgr/customer')); ?>">View more customers ...</a></p> -->
			</div>
		</div>
		
		<div class="box-grid col-sm-3 col-xs-12">
			<div class="tile-stats">
			<!-- <div class="icon"><i class="fa fa-users"></i></div> -->
			<h4>Discounts: <?php echo e(number_format($total_discount, 3)); ?> $</h4>
			<!-- <p> <a href="<?php echo e(url('admin/customer_mgr/customer')); ?>">View more customers ...</a></p> -->
			</div>
		</div>

		<div class="box-grid col-sm-3 col-xs-12">
			<div class="tile-stats">
			<!-- <div class="icon"><i class="fa fa-users"></i></div> -->
			<h4>Net Sales: <?php echo e(number_format($total_netsale, 3)); ?> $</h4>
			<!-- <p> <a href="<?php echo e(url('admin/customer_mgr/customer')); ?>">View more customers ...</a></p> -->
			</div>
		</div>

		<div class="box-grid col-sm-3 col-xs-12">
			<div class="tile-stats">
			<!-- <div class="icon"><i class="fa fa-users"></i></div> -->
			<h4>Gross Profit: <?php echo e(number_format($total_cost_product, 3)); ?> $</h4>
			<!-- <p> <a href="<?php echo e(url('admin/customer_mgr/customer')); ?>">View more customers ...</a></p> -->
			</div>
		</div>

		<div class="box-grid col-sm-3 col-xs-12">
			<div class="tile-stats">
			<!-- <div class="icon"><i class="fa fa-users"></i></div> -->
			<h4>Taxes: <?php echo e(number_format($total_tax, 3)); ?> $</h4>
			<!-- <p> <a href="<?php echo e(url('admin/customer_mgr/customer')); ?>">View more customers ...</a></p> -->
			</div>
		</div>
	</div>
	</div>

	<!--start-summary-->
	<div class="row">
	<!-- x_content -->
	<div class="x_content">
		<table id="_example1" class="table table-bordered table-striped dataTable">
			<thead>
			<tr>
				<th><?php echo e('Date'); ?></th>
				<th><?php echo e('Gross Sale'); ?></th>
				<th><?php echo e('Discounts'); ?></th>
				<th><?php echo e('Net Sales'); ?></th>
				<th><?php echo e('Cost Of Product'); ?></th>
				<th><?php echo e('Gross Profit'); ?></th>
				<th><?php echo e('Taxes'); ?></th>
				<th><?php echo e('Margin'); ?></th>
			</tr>
			</thead>
			<tbody>
			
				<?php foreach($summaryReports as $row): ?>
				<tr>
					<td><?php echo e($row->date); ?></td>
					<td><?php echo e(number_format($row->sub_total_amount, 3)); ?></td>
					<td><?php echo e(number_format($row->total_discount, 3)); ?></td>
					<td><?php echo e(number_format(($row->sub_total_amount - $row->total_discount), 3)); ?></td>
					<td><?php echo e(number_format($row->total_cost_amount, 3)); ?></td>
					<td><?php echo e(number_format(($row->sub_total_amount - $row->total_cost_amount), 3)); ?></td>
					<td><?php echo e(number_format($row->total_tax_amount, 3)); ?></td>
					<td><?php echo e(number_format(($row->sub_total_amount - $row->total_cost_amount), 3)); ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
			<tr> 
				<td style="text-align: right; font-size:16px;background-color:#5c5c5c;color:#fff;"><b>Total: </b></td>
				<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_gross_sale, 3)); ?></b> <span class="pull-right">$</span></td>
				<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_discount, 3)); ?></b></b> <span class="pull-right">$</span></td>
				<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_netsale, 3)); ?></b></b> <span class="pull-right">$</span></td>
				<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_cost_product, 3)); ?></b></b> <span class="pull-right">$</span></td>
				<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_gross_profit, 3)); ?></b></b> <span class="pull-right">$</span></td>
				<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_tax, 3)); ?></b></b> <span class="pull-right">$</span></td>
				<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b><?php echo e(number_format($total_margin, 3)); ?></b></b> <span class="pull-right">$</span></td>
			</tr>
		</tfoot>
		</table>
	</div>
	</div>

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
.box-grid{
	float: left; 
	width: 19.8%;
	text-align: center;
	border: 1px solid #f4f4f4;
}
	</style>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>