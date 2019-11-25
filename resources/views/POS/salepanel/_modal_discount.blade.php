{{-- modal-discount proccess payment --}}
<div class="modal fade modal-discount" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
	      </button>
	      <h4 class="modal-title" id="myModalLabel"><i class="fa fa-wa fa-tag"></i> Please, choose discount method.</h4>
	    </div>
	    <div class="modal-body">
	    	<div class="col-sm-6">
	    		<div class="col-sm-12">
					<div class="row payment">
		    			<div class="_pull-left">Discount %</div>
		    			{{-- <div class="pull-right"><span id="amount_percentage_discount"></span>%</div> --}}
		    			<div class="col-sm-12"><input type="text" disabled="" id="amount_percentage_discount" name="discount_per_val"/></div>
		    			{{-- <div class="clearfix"></div> --}}
		    		</div>
		    	</div>
				<section class="number_cal">
					<a class="btn-group btn-num-modal btnDiscountByPercent" data-id="7" href="javascript:void(0);">
					7
					</a>
					<a class="btn-group btn-num-modal btnDiscountByPercent" data-id="8" href="javascript:void(0);">
					8
					</a>
					<a class="btn-group btn-num-modal btnDiscountByPercent" data-id="9" href="javascript:void(0);">
					9
					</a>
					<a class="btn-group btn-num-modal btnDiscountByPercent" data-id="4" href="javascript:void(0);">
					4
					</a>
					<a class="btn-group btn-num-modal btnDiscountByPercent" data-id="5" href="javascript:void(0);">
					5
					</a>
					<a class="btn-group btn-num-modal btnDiscountByPercent" data-id="6" href="javascript:void(0);">
					6
					</a>
					<a class="btn-group btn-num-modal btnDiscountByPercent" data-id="1" href="javascript:void(0);">
					1
					</a>
					<a class="btn-group btn-num-modal btnDiscountByPercent" data-id="2" href="javascript:void(0);">
					2
					</a>
					<a class="btn-group btn-num-modal btnDiscountByPercent" data-id="3" href="javascript:void(0);">
					3
					</a>
					<a class="btn-group btn-num-modal btnDiscountByPercent" data-id="0" href="javascript:void(0);">
					0
					</a>
					<a class="btn-group btn-num-modal btnDiscountByPercent" data-id="00" href="javascript:void(0);">
					00
					</a>
					<a class="btn-group btn-num-modal btnDiscountByPercent" data-id="." href="javascript:void(0);">
					.
					</a>
					<a class="btn-pay btn-group btn-num-modal-alt" id="initDiscountByPercent" href="javascript:void(0);">
					OK
					</a>
					<a class="btn-clear btn-group btn-num-modal-alt btnClear" href="javascript:void(0);">
					Clear
					</a>
					<div class="clearfix"></div>
				</section>
			</div>
	    	<div class="col-sm-6">
	    		<div class="col-sm-12">
					<div class="row payment">
		    			<div class="pull-left">Discount ($)</div>
		    			<div class="col-sm-12"><input type="text" disabled="" id="amount_price_total" name="discount_per_val"/></div>
		    			<div class="clearfix"></div>
		    			{{-- <div class="pull-right">$ <span id="amount_price_total"></span></div> --}}
		    			{{-- <input type="text" name="discount_price_val"/> --}}
		    		</div>
		    	</div>
				<section class="number_cal">
					<a class="btn-group btn-num-modal init_price_discount" data-id="7" href="javascript:void(0);">
					7
					</a>
					<a class="btn-group btn-num-modal init_price_discount" data-id="8" href="javascript:void(0);">
					8
					</a>
					<a class="btn-group btn-num-modal init_price_discount" data-id="9" href="javascript:void(0);">
					9
					</a>
					<a class="btn-group btn-num-modal init_price_discount" data-id="4" href="javascript:void(0);">
					4
					</a>
					<a class="btn-group btn-num-modal init_price_discount" data-id="5" href="javascript:void(0);">
					5
					</a>
					<a class="btn-group btn-num-modal init_price_discount" data-id="6" href="javascript:void(0);">
					6
					</a>
					<a class="btn-group btn-num-modal init_price_discount" data-id="1" href="javascript:void(0);">
					1
					</a>
					<a class="btn-group btn-num-modal init_price_discount" data-id="2" href="javascript:void(0);">
					2
					</a>
					<a class="btn-group btn-num-modal init_price_discount" data-id="3" href="javascript:void(0);">
					3
					</a>
					<a class="btn-group btn-num-modal init_price_discount" data-id="0" href="javascript:void(0);">
					0
					</a>
					<a class="btn-group btn-num-modal init_price_discount" data-id="00" href="javascript:void(0);">
					00
					</a>
					<a class="btn-group btn-num-modal init_price_discount" data-id="." href="javascript:void(0);">
					.
					</a>
					<a class="btn-pay btn-group btn-num-modal-alt" id="initDiscountByPrice" href="javascript:void(0);">
					OK
					</a>
					<a class="btn-clear btn-group btn-num-modal-alt btnClear" href="javascript:void(0);">
					Clear
					</a>
					<div class="clearfix"></div>
				</section>
			</div>
			<div class="clearfix"></div>
	    </div> 
	    <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    </div>

	  </div>
	</div>
</div>


<script type="text/javascript">
	$(".btnDiscountByPercent").click(function(){
		var id = $(this).data('id');
		var currentVal = $('#amount_percentage_discount').val();
		var percent_val = currentVal + id;
		var discount_max = $('input[name="discount_max"]').val();
		if(discount_max==0){
			toastr.warning("Sorry, you don't have permission to discount!");
			return false;
		}else{
			if(parseFloat(percent_val) <= parseFloat(discount_max)){
				$('#amount_percentage_discount').val(percent_val);
			}else{
				toastr.warning("Sorry, you have limited permission discount only "+discount_max+" !");
			}
		}
		
		// $("#amount_percentage_discount").val(id);
	});

	$("#initDiscountByPercent").click(function(){
		var discount_method_id=2;
		var order_id = $("input[name='order_id']").val();
		var percent_val = $('#amount_percentage_discount').val();
		var dataString = {"_token": "{{ csrf_token() }}",'order_id':order_id,'percent_val':percent_val,'discount_method_id':discount_method_id};
		$.ajax({  
			type: "POST",  
			url: "{{url("/pos/salepanel/ProcessDiscount")}}",  
			data: dataString,
			cache:true,
  			dataType:"json",
			// beforeSend: function() 
			// {
			// 	$("#previewed_video").html($("#v_loading_btn").val());
			// 	//return false;
			// },  
			success: function(response)
			{
				$.getDisplayHTMLVal(response);
				$('.modal-discount').modal('hide');
				toastr.success("You have processed discount.");
				$("#amount_percentage_discount").val('');
			}
		}).fail(function(error_response) 
		{
			toastr.warning("System has problem please, contact administrator!");
			// setTimeout("vpb_remove_added_video();", 1000);
		});
	});

	$("#initDiscountByPrice").click(function(){
		var discount_method_id=1;
		var percent_val = $('#amount_percentage_discount').val();
	});

	// init_price_discount
	$(".init_price_discount").click(function(){
		var id = $(this).data('id');
		var currentVal = $('#amount_price_total').val();
		var newVal = currentVal + id;
		$('#amount_price_total').val(newVal);
		// $("#amount_price_total").val(id);
	});

	
</script>	