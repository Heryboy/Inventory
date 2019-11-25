{{-- order-modal --}}
<div class="modal fade order-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
	      </button>
	      <h4 class="modal-title" id="myModalLabel"><i class="fa fa-wa fa-list-alt"></i> Order No.</h4>
	    </div>
	    <div class="modal-body">
	    	@foreach($POSCusOrders as $row)
	    		<a class="btn btn-app @if($row->id==$order_id) btn-red @endif" href="{{url('pos/salepanel/customer_salepanel')}}?order_id={{$row->id}}">
				  Order # <br/> <b>{{$row->id}}</b>
				</a>
	    	@endforeach
	    	{{-- <a class="btn btn-app" href="{{url('pos/salepanel/dashboard')}}?order_id=1">
			  Order # <br/> <b>001</b>
			</a>
			<a class="btn btn-app" href="{{url('pos/salepanel/dashboard')}}?order_id=2">
			  Order # <br/> <b>002</b>
			</a>
			<a class="btn btn-app" href="{{url('pos/salepanel/dashboard')}}?order_id=3">
			  Order # <br/> <b>003</b>
			</a>
			<a class="btn btn-app" href="{{url('pos/salepanel/dashboard')}}?order_id=4">
			  Order # <br/> <b>004</b>
			</a> --}}
			<div class="clearfix"></div>
	    </div> 
	    <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    </div>

	  </div>
	</div>
</div>