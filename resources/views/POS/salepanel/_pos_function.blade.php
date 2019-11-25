<section class="pos_function">
	<div class="row">
		<center>
			<a class="btn btn-app" id="initPrintPreview" href="javascript:void(0);" data-toggle="modal" data-target="@if($order_id!='') ._modal-printview-invoice @else .order-modal @endif">
			  <i class="fa fa-print"></i> Print
			</a>
			<a class="btn btn-app">
			  <i class="fa fa-users"></i> Customers
			</a>
			<a class="btn btn-app">
			  <i class="fa fa-lock" href="javascript:void(0);" data-toggle="modal" data-target="@if($order_id!='') .modal-drawer @else .order-modal @endif"></i> Drawer
			</a>

			<a class="btn btn-app" data-toggle="modal" data-target="@if($order_id!='') .modal-currency-exchange @else .order-modal @endif">
			  <i class="fa fa-money"></i> Exchange
			</a>
			
			<a class="btn btn-app">
			  <i class="fa fa-bullhorn"></i> Sale Summary
			</a>
			<a class="btn btn-app" id="initRefresh">
			  <i class="fa fa-repeat"></i> Refresh
			</a>
			
			<a class="btn btn-app" data-toggle="modal" data-target=".order--modal">
	          <i class="fa fa-clock-o"></i> Dialy Commit
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
	        <a class="btn btn-app" data-toggle="modal" data-target=".new-order-modal">
	          <i class="fa fa-calculator"></i> New Order
	        </a>
	    </center>
	</div>
</section>