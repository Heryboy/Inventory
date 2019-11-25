<header class="header">
	<div class="container-fluid header-inner">
		<div class="col-sm-6">
			<img width="250px" src="{{url('images/uploads/company')}}/{{$Company->image}}"/>
		</div>
		@if(isset($flag_back))
			<div class="col-sm-6">
				<div class="pull-right">
					<a href="{{url('pos/salepanel/customer_dashboard')}}" style="font-size:40pt;color:#f04368;" title="Back to Category" class="fa fa-wa fa-reply"></a>
				</div>
			</div>
		@endif
		
	</div>
	<div class="clearfix"></div>
</header>