{{-- new order --}}
<div class="modal fade modal-check-out" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	  	<center>
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		      </button>
		      <h4 class="modal-title" id="myModalLabel">Are you sure, you want to checkout?</h4>
		    </div>
		    <div class="modal-body">
		    	<button id="initCheckOut" class="btn btn-lg btn-success">Yes</button>
		    	<button class="btn btn-lg btn-default" data-dismiss="modal">No</button>
				<div class="clearfix"></div>
		    </div>
		</center>
	  </div>
	</div>
</div>

{{-- new order --}}
<div class="modal fade modal-success-checkout" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	  	<center>
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		      </button>
		      <h4 class="modal-title" id="myModalLabel">Congratulation! You have successfully checkout! Please walk in to cashier to get your invoice</h4>
		    </div>
		    {{-- <div class="modal-body">
		    	<button id="initContinueOrder" class="btn btn-lg btn-success">Continue Order</button>
				<div class="clearfix"></div>
		    </div> --}}
		</center>
	  </div>
	</div>
</div>

<script type="text/javascript">
	$("#initCheckOut").click(function(){
		$(".modal-check-out").modal('hide');
		var order_id = $("input[name='order_id']").val();
		var dataString = {"_token": "{{ csrf_token() }}","order_id":order_id};
		$.ajax({  
			type: "POST",  
			url: "{{url("/pos/salepanel/POSCusCheckOut")}}",  
			data: dataString,
			dataType: 'json',
			beforeSend: function() 
			{
				toastr.info("Processing ...");
			},  
			success: function(response)
			{
				toastr.success("You have checkout successfully.");
				$(".modal-success-checkout").modal('show');
				window.location.href="{{url('pos/salepanel/customer_salepanel')}}";
			}
		}).fail(function(error_response) 
		{
			toastr.warning("Problem occur while you are trying to process checkout!");
			// setTimeout("vpb_remove_added_video();", 1000);
		});
		// $(".modal-success-checkout").modal('show');
	});
	$("#initContinueOrder").click(function(){
		window.location.href="{{url('pos/salepanel/customer_dashboard')}}";
	});
</script>