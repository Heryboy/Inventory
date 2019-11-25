<section class="customer-info">
	<div class="row-cus">
		{!! Form::select('customer_id', $customers, $customer_id, ['id'=>'customer_id','class'=>'form-control']) !!}
	</div>
	{{-- <div class="row-cus">
		<div class="lbl-customer">ID</div>
		<div><b>00022111</b></div>
	</div>
	<div class="row-cus">
		<div class="lbl-customer">Customer Name</div>
		<div><b>Jhon Doe</b></div>
	</div>
	<div class="row-cus">
		<div class="lbl-customer">Address</div>
		<div><b>Jhon Doe</b></div>
	</div>
	<div class="row-cus">
		<div class="lbl-customer">Tell</div>
		<div><b>Jhon Doe</b></div>
	</div> --}}
</section>