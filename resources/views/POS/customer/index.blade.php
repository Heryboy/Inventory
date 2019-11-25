@extends('POS.customer.shared.layout') 
@section('content')
	<div class="content-dashboard">
		<div class="container-fluid">
			@foreach($ItemCategory as $row)
				<div class="col-sm-3" style="position:relative;">
					<div class="row">
						<a style="color:#fff !important;" title="{{$row->item_category_name}}" href="{{url('pos/salepanel/customer_subcategory')}}/{{$row->id}}">
							<img height="350px" width="100%" src="{{url('images/uploads/catalog')}}/{{$row->image}}"/>
							<div style="background:rgba(0,0,0,0.8);height: 40px;width:100%;position: absolute;bottom: 0px;text-align: center;line-height: 40px;font-size:16px;">
								{{$row->item_category_name}}
							</div>
						</a>
					</div>
				</div>
			@endforeach
			<div class="clearfix"></div>
		</div>
	</div>
@endsection