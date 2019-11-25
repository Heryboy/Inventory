<section class="cart-status">
	<div class="col-sm-12">
		<div class="pull-left">
			{{-- void-modal --}}
			<div class="modal fade void-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">

				    <div class="modal-header">
				      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				      </button>
				      <h4 class="modal-title" id="myModalLabel"><i class="fa fa-wa fa-list-alt"></i> Void Order Listing.</h4>
				    </div>
				    <div class="modal-body">
				    	@foreach($POSCusVoidOrders as $row)
					    	<a class="btn btn-app @if($row->id==$order_id) btn-red @endif" href="javascript:void(0);">
							  Order # <br/> <b>{{$row->id}}</b>
							</a>
						@endforeach
						<div class="clearfix"></div>
				    </div> 
				    <div class="modal-footer">
				      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>

				  </div>
				</div>
			</div>
			<a class="btn btn-app" data-toggle="modal" data-target=".void-modal">
	          <span class="badge bg-red">{{$data['countVoid']}}</span>
	          <i class="fa fa-minus-circle"></i> Void #
	        </a>
	        
	        <a class="btn btn-app" data-toggle="modal" data-target=".order-modal">
	          <span class="badge bg-red">{{$data['countOrder']}}</span>
	          <i class="fa fa-calculator"></i> Order #
	        </a>
	     </div>

	     <div class="pull-right">
	     	<h2 class="total_sale">Total Sale: {{Helpers::getTotalSale()}}</h2>
	     </div>
        <div class="clearfix"></div>
	</div>	
</section>