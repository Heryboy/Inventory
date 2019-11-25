@extends('POS.shared.layout') 
@section('content')	
	{{-- modal-include --}}
	@include('POS.salepanel._modal_discount')
	@include('POS.salepanel._modal_payment')
	@include('POS.salepanel._modal_void')
	@include('POS.salepanel._customer_modal_order')
	@include('POS.salepanel._customer_check_out')
	@include('POS.salepanel._modal_exchange')
	@include('POS.salepanel._modal_drawer')

	<input type="hidden" name="order_id" value="{{$order_id}}" />
	<input type="hidden" name="currency_sign" value="{{Helpers::getCurrencyDefault('currency_sign')}}" />
	<input type="hidden" id="exchage_reil" name="exchage_reil" value="{{Helpers::getReilFraction()}}" />
	<input type="hidden" name="discount_max" value="@if(Helpers::getDiscountPermission('max_discount')){{Helpers::getDiscountPermission('max_discount')}}@else{{"0"}}@endif" />
	<input type="hidden" name="discount_method" value="@if(Helpers::getDiscountPermission('discount_method_id')){{(Helpers::getDiscountPermission('discount_method_id'))}}@else{{"0"}}@endif" />

	{{-- <div class="row"> --}}
	<div class="col-sm-7">
		@include('POS.salepanel._customer_item_list')
	</div>

	{{-- cart-status --}}
	@include('POS.salepanel._customer_cart_status')

	<div class="col-sm-2">
		{{-- @include('POS.salepanel._customer_select') --}}
		{{-- <div class="clearfix"></div> --}}
		<section class="pos_function">
			<div class="row">
				<center>

					<a class="btn btn-app" href="javascript:void(0);" data-toggle="modal" data-target="@if($order_id!='') .modal-currency-exchange @else .order-modal @endif">
					  <i class="fa fa-money"></i> Exchange
					</a>
					
					<a class="btn btn-app" href="javascript:void(0);" id="initRefresh">
					  <i class="fa fa-repeat"></i> Refresh
					</a>

					<a class="btn btn-app" href="javascript:void(0);" data-toggle="modal" data-target=".new-order-modal">
			          <i class="fa fa-calculator"></i> New Order
			        </a>

			        <a class="btn btn-app" href="{{url('pos/salepanel/customer_dashboard')}}">
			          <i class="fa fa-reply"></i> Search Category
			        </a>

					{{-- new order --}}
					<div class="modal fade new-order-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
						<div class="modal-dialog modal-lg">
						  <div class="modal-content">

						    <div class="modal-header">
						      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
						      </button>
						      <h4 class="modal-title" id="myModalLabel">Are you sure, you want to procceed new order?</h4>
						    </div>
						    <div class="modal-body">
						    	<button id="initGenerateOrder" class="btn btn-lg btn-success">Yes</button>
						    	<button class="btn btn-lg btn-default" data-dismiss="modal">No</button>
								<div class="clearfix"></div>
						    </div> 
						    {{-- <div class="modal-footer">
						      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						    </div> --}}
						  </div>
						</div>
					</div>
			    </center>
			</div>
		</section>
	</div>

	<div class="col-sm-3">
		<div class="row">
			{{-- sidebard --}}
			<div class="pos_sidebar">
				<input type="text" name="barcode_txt" id="keyupfunction" class="form-control" style="height: 50px;" placeholder="Search barcode,name,brand" />
				<div class="pos_innner">
					<section class="pos_item_list">
						<table id="table-item">
							<tr class="row-th">
								<div class="item_inner">
									<th class="item_name">Name</th>
									<th class="item_qty">Price</th>
									<th class="item_qty">Qty</th>
									<th class="item_price">Sub Total</th>
								</div>
							</tr>
							<tbody id="pos-item-data">
								<?php $attributeItem = 0;?>
								@if(isset($POSCusOrderDetail) && $POSCusOrderDetail!='')
									@foreach($POSCusOrderDetail as $row)
										<tr id="attribute-item{{$row->id}}" @if($row->is_cancel==1) class="cancell-item" @endif>
											<td class="item_name">{{$row->Item->name}}</td>
											<td class="item_price">{{Helpers::FormatCurrentcy($row->unit_price)}}</td>
											<td class="item_qty">
												x <span class="item-qty">{{$row->qty}}</span>
												<button value="+" onclick="initIncreasePrice({{$row->id}});" class="increase_item btn btn-xs btn-primary" type="button" name="increase_item"><i class="fa fa-wa fa-plus"></i></button><button onclick="initDecreasePrice({{$row->id}});" value="-" class="decrease_item btn btn-xs btn-primary" type="button" name="decrease_item"><i class="fa fa-wa fa-minus"></i></button>
											</td>
											<td class="item_sub_total"><span class="sub_total_item">{{Helpers::FormatCurrentcy($row->price)}}</span> <span class="pull-right"><a class="btn btn-xs btn-danger" onclick="initRemoveItem({{$row->id}});" href="javascript:void(0);"><i class="fa fa-wa fa-minus"></i></a></span></td>
										</tr>
										<?php $attributeItem++ ;?>
									@endforeach
								@endif
							</tbody>
						</table>
					</section>
					<section class="discount">
						<div class="col-sm-12">
							<span class="pull-left"> Discount</span>
							<span class="pull-right"><span id="discount_total">{{$data['discount']}}</span>%</span>
						</div>
						<div class="clearfix"></div>
					</section>
					<section class="tax">
						<div class="col-sm-12">
							<span class="pull-left"> Tax</span>
							<span class="pull-right">{{TAX}}%</span>
						</div>
						<div class="clearfix"></div>
					</section>
					<section class="tax">
						<div class="col-sm-12">
							<span class="pull-left"> Sub Total</span>
							<span class="pull-right"><span id="amount_sub_total">{{Helpers::FormatCurrentcy($data['sub_total'])}}</span></span>
						</div>
						<div class="clearfix"></div>
					</section>
					<section class="total">
						<span class="lbl_total" class="pull-left">Total </span> <span id="amount_total" class="pull-right amount_total">{{Helpers::FormatCurrentcy($data['total'])}}</span>
						<div class="clearfix"></div>
					</section>
				</div>

				<section class="number_cal">
					

					{{-- new order --}}
					<div class="modal fade modal-cancel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
						<div class="modal-dialog modal-lg">
						  <div class="modal-content">
						  	<center>
							    <div class="modal-header">
							      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
							      </button>
							      <h4 class="modal-title" id="myModalLabel">Are you sure, you want to cancel all items?</h4>
							    </div>
							    <div class="modal-body">
							    	<button id="initCancelAllItem" class="btn btn-lg btn-success">Yes</button>
							    	<button class="btn btn-lg btn-default" data-dismiss="modal">No</button>
									<div class="clearfix"></div>
							    </div>
							</center>
						  </div>
						</div>
					</div>

					<a data-toggle="modal" data-target="@if($order_id!='') .modal-check-out @else .order-modal @endif" class="btn-discount btn-group btn-num" href="javascript:void(0);">
						<i class="fa fa-wa fa-sign-out"></i><br/>
						Checkout
					</a>

					<a id="initCancelAllItem" data-toggle="modal" data-target="@if($order_id!='') .modal-cancel @else .order-modal @endif" class="btn-clear btn-group btn-num" href="javascript:void(0);">
						<i class="fa fa-wa fa-times-circle"></i><br/> Cancel
					</a>

					<a id="initVoid" data-toggle="modal" data-target="@if($order_id!='') .modal-void @else .order-modal @endif" class="btn-discount btn-group btn-num" href="javascript:void(0);">
						<i class="fa fa-wa fa-minus-circle"></i><br/> Void
					</a>

				</section>
			</div>
		</div>
	</div>
	{{-- </div> --}}

	@include('POS.commonjs.customerSalePanel')
@endsection