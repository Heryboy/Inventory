<!DOCTYPE html>
<html>
<head>
	<title>Report - Sale Item</title>
</head>
<body>

	<div class="logo">
		<div>
			<img width="100px" src="{{url('images/uploads/company')}}/{{$Company->image}}"/>
		</div>
	</div>
	<div style="font-size: 14px;line-height: 20px;">
		Due Date: {{date('Y-m-d')}}<br/>

		From Date: {{$_REQUEST['from_date']}}<br/>

		To Date: {{$_REQUEST['to_date']}} <br/>

		Branch: {{$Branch}}
	</div>
	<div><center><h2>POS Sale By Drawer</h2></center></div>
	<table id="example1" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
			<td>{!!trans('report/sale_pos_item_by_drawer.entry_no')!!}</td>
			<td>{!!trans('report/sale_pos_item_by_drawer.entry_branch')!!}</td>
			<th>{!!trans('report/sale_pos_item_by_drawer.entry_sale_by')!!}</th>
			<th>{!!trans('report/sale_pos_item_by_drawer.entry_code')!!}</th>
			<th>{!!trans('report/sale_pos_item_by_drawer.entry_name')!!}</th>
			<th>{!!trans('report/sale_pos_item_by_drawer.entry_unit')!!}</th>
			<th>{!!trans('report/sale_pos_item_by_drawer.entry_sale_qty')!!}</th>
			<th>{!!trans('report/sale_pos_item_by_drawer.entry_void_qty')!!}</th>
			<th>{!!trans('report/sale_pos_item_by_drawer.entry_discount')!!}</th>
			<!-- <th>{!!trans('report/sale_pos_item_by_drawer.entry_tax')!!}</th> -->
			<th>{!!trans('report/sale_pos_item_by_drawer.entry_gross_sale')!!}</th>
			<th>{!!trans('report/sale_pos_item_by_drawer.entry_net_sale')!!}</th>
			<!-- <th>{!!trans('report/sale_pos_item_by_drawer.entry_cost_of_goods')!!}</th> -->
			<th>{!!trans('report/sale_pos_item_by_drawer.entry_margin')!!}</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$total_discount = 0;
			$total_gross_sale = 0;
			$total_net_sale = 0;
			$total_margin = 0;
		?>
		<?php $i = 1;?>
		@foreach($saleItems as $row)
			<tr>
			<td>{{$i}}</td>
			<td>{{$row->branch_name}}</td>
			<td>{{ $row->user_drawer_name }}</td>
			<td>{{$row->item_code}}</td>
			<td>{{$row->item_name}}</td>
			<td>{{$row->unit}}</td>
			<td>{{$row->sale_qty}}</td>
			<td>0</td>
			<td>{{ number_format($row->discount_amount, 3) }}</td>
			<td>{{ number_format($row->sub_total, 3) }}</td>
			<td>{{ number_format(floatval($row->sub_total) - ( floatval($row->discount_amount)), 3) }}</td>
			<!-- <td>$row->total_cost_price}}</td> -->
			<td>
				{{ number_format(((floatval($row->sub_total) - floatval($row->discount_amount)) - floatval($row->total_netprice)), 3) }}
			</td>
			</tr>
			<?php 
			$total_discount += $row->discount_amount;
			$total_gross_sale += $row->sub_total;
			$total_net_sale += ($row->sub_total - $row->discount_amount);
			$total_margin += ($row->sub_total - $row->cost_amount);
			?>
			<?php $i++; ?>
		@endforeach
		
		</tbody>
		<tfoot>
			<tr> 
			<td colspan="8" style="text-align: right; font-size:16px;background-color:#5c5c5c;color:#fff;"><b>Total</b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{number_format($total_discount, 3)}}</b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{number_format($total_gross_sale, 3)}}</b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{number_format($total_net_sale, 3)}}</b></td>
			<td style="font-size:16px;background-color:#5c5c5c;color:#fff;"><b>{{number_format($total_margin, 3)}}</b></td>
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