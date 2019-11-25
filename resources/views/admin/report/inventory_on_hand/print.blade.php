<!DOCTYPE html>
<html>
<head>
	<title>Inventory On Hand</title>
</head>
<body>

	<div class="logo">
		<div>
			<img width="100px" src="{{url('images/uploads/company')}}/{{$Company->image}}"/>
		</div>
	</div>

	<div style="font-size: 14px;line-height: 20px;">
		Current Date: {{date('Y-M-d H:i a')}}<br/>

		From Date: {{$_REQUEST['from_date']}}<br/>

		To Date: {{$_REQUEST['to_date']}} <br/>

		Branch: {{$Branch}}
	</div>
	<div><center><h2>Inventory On Hand</h2></center></div>
	<table id="example1" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
			<th>{!!trans('item_mgr/item_in_stock.entry_code')!!}</th>
			<th>{!!trans('item_mgr/item_in_stock.entry_name')!!}</th>
			<th>{!!trans('item_mgr/item_in_stock.entry_unit')!!}</th>
			<th>{!!trans('item_mgr/item_in_stock.entry_adjust_qty')!!}</th>
			<th>{!!trans('item_mgr/item_in_stock.entry_purchase_qty')!!}</th>
			<th>{!!trans('item_mgr/item_in_stock.entry_lost_qty')!!}</th>
			<th>{!!trans('item_mgr/item_in_stock.entry_damage_qty')!!}</th>
			<th>{!!trans('item_mgr/item_in_stock.entry_return_qty')!!}</th>
			<th>{!!trans('item_mgr/item_in_stock.entry_sale_qty')!!}</th>
			<th>{!!trans('item_mgr/item_in_stock.entry_transfer_qty')!!}</th>
			<th>{!!trans('item_mgr/item_in_stock.entry_begin_balance')!!}</th>
			<!-- <th>{!!trans('item_mgr/item_in_stock.entry_balance')!!}</th> -->
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
			@foreach($ItemInStocks as $row)
			<tr>
				<td>{{$row->item_code}}</td>
				<td>{{$row->item_name}}</td>
				<td>{{$row->unit}}</td>
				<td>{{floatval($row->adjust_qty)}}</td>
				<td>{{floatval($row->purchase_qty)}}</td>
				<td>{{floatval($row->lost_qty)}}</td>
				<td>{{floatval($row->damage_qty)}}</td>
				<td>{{floatval($row->return_qty)}}</td>
				<td>{{floatval($row->sale_qty)+floatval($row->sale_order_qty)}}</td>
				<td>{{floatval($row->transfer_qty)}}</td>
				<td>{{(floatval($row->purchase_qty)+floatval($row->adjust_qty))-(floatval($row->return_qty) + floatval($row->sale_qty)+floatval($row->sale_order_qty)+floatval($row->transfer_qty)+floatval($row->lost_qty)+floatval($row->damage_qty))}}</td>
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
			@endforeach
		</tbody>
		<!-- <tfoot>
			<tr> 
			<td colspan="3" style="text-align: right; font-size:16px;background-color:#5c5c5c;color:#fff;"><b>Total</b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_inventory_count}}</b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_purchase_qty}}</b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_lost_qty}}</b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_damage_qty}}</b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_return_qty}}</b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_sale_qty}}</b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_transfer_qty}}</b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{$sum_available_instock}}</b></td>
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