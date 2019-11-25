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
	<div><center><h2>Drawer Transaction</h2></center></div>
	<table id="example1" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
			<td>{!!trans('report/drawer_transaction.entry_no')!!}</td>
			<th>{!!trans('report/drawer_transaction.entry_work_shift')!!}</th>
			<th>{!!trans('report/drawer_transaction.entry_open_by')!!}</th>
			<th>{!!trans('report/drawer_transaction.entry_close_by')!!}</th>
			<th>{!!trans('report/drawer_transaction.entry_open_amount')!!}</th>
			<th>{!!trans('report/drawer_transaction.entry_close_amount')!!}</th>
			<th>{!!trans('report/drawer_transaction.entry_actual_amount')!!}</th>
			<th>{!!trans('report/drawer_transaction.entry_open_date')!!}</th>
			<th>{!!trans('report/drawer_transaction.entry_close_date')!!}</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			@foreach($drawerTransactions as $row)
			<tr>
				<td>{{ $i }}</td>
				<td>{{ $row->workshift }}</td>
				<td>{{ $row->open_by_user }}</td>
				<td>{{ $row->close_by_user }}</td>
				<td>{{ $row->open_amount }}</td>
				<td>{{ $row->close_amount }}</td>
				<td>{{ $row->actual_amount }}</td>
				<td>{{ $row->open_date }}</td>
				<td>{{ $row->close_date }}</td>
			</tr>
			<?php $i ++ ;?>
			@endforeach
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