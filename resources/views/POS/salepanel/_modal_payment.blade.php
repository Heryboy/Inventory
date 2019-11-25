{{-- modal-pay proccess payment --}}
<div class="modal fade modal-pay" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
	      </button>
	      <h4 class="modal-title" id="myModalLabel"><i class="fa fa-wa fa-money"></i> Process your payment.</h4>
	    </div>
	    <div class="modal-body">
	    	<div class="col-sm-6">
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
	    		<div class="payment">
	    			<div class="pull-left">Total</div>
	    			<div class="pull-right"><span id="amount_total">{{Helpers::FormatCurrentcy($data['total'])}}</span></div>
	    			<input type="hidden" id="amount_total_hidden" value="{{$data['total']}}"/>
	    			<div class="clearfix"></div>
	    		</div>

				<table class="table table-bordered">
					<tr>
						<td>Amount($)</td>
						<td><span class="pull-right" id="amount_dolar">$ 0.00</span></td>
					</tr>
					<tr>
						<td>Amount(R)</td>
						<td><span class="pull-right" id="amount_reil">R 0.00</span></td>
					</tr>
					<tr>
						<td>Change(s)</td>
						<td><span class="pull-right" id="amount_change_d">$ 0.00</span></td>
					</tr>
				</table>
	    	</div>
	    	<div class="col-sm-6">
				<section class="number_cal">
					<input type="hidden" id="amountNum" value="" name="amountNum"/>
					<input type="hidden" id="debitPay" name="debitPay">
					<a class="btn-pay btn-group btn-num-modal-alt" id="processPay" toggle="modal" data-target=".modal-print-invoice" href="javascript:void(0);">
					Pay
					</a>
					<a class="btn-clear btn-group btn-num-modal-alt btnClear" href="javascript:void(0);">
					Clear
					</a>
					<a id="initPrintPreview" class="btn-discount btn-group btn-num-modal-alt" href="javascript:void(0);">
					Print
					</a>
					<a class="btn-group btn-num-modal btnNum" data-id="10" href="javascript:void(0);">
					10
					</a>
					<a class="btn-group btn-num-modal btnNum" data-id="20" href="javascript:void(0);">
					20
					</a>
					<a class="btn-group btn-num-modal btnNum" data-id="50" href="javascript:void(0);">
					50
					</a>
					<a class="btn-group btn-num-modal btnNum" data-id="7" href="javascript:void(0);">
					7
					</a>
					<a class="btn-group btn-num-modal btnNum" data-id="8" href="javascript:void(0);">
					8
					</a>
					<a class="btn-group btn-num-modal btnNum" data-id="9" href="javascript:void(0);">
					9
					</a>
					<a class="btn-group btn-num-modal btnNum" data-id="4" href="javascript:void(0);">
					4
					</a>
					<a class="btn-group btn-num-modal btnNum" data-id="5" href="javascript:void(0);">
					5
					</a>
					<a class="btn-group btn-num-modal btnNum" data-id="6" href="javascript:void(0);">
					6
					</a>
					<a class="btn-group btn-num-modal btnNum" data-id="1" href="javascript:void(0);">
					1
					</a>
					<a class="btn-group btn-num-modal btnNum" data-id="2" href="javascript:void(0);">
					2
					</a>
					<a class="btn-group btn-num-modal btnNum" data-id="3" href="javascript:void(0);">
					3
					</a>
					<a class="btn-group btn-num-modal btnNum" data-id="0" href="javascript:void(0);">
					0
					</a>
					<a class="btn-group btn-num-modal btnNum" data-id="00" href="javascript:void(0);">
					00
					</a>
					<a class="btn-group btn-num-modal btnNum" data-id="." href="javascript:void(0);">
					.
					</a>
					<div class="clearfix"></div>
				</section>
			</div>
			<div class="clearfix"></div>
	    </div> 
	    <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      {{-- <button type="button" class="btn btn-primary">Settlement</button>
	      <button type="button" class="btn btn-primary">Print</button> --}}
	    </div>

	  </div>
	</div>
</div>

{{-- modal_print_invoice --}}
<div class="modal fade modal-print-invoice" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-md">
	  <div class="modal-content">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
	      </button>
	      <center><h4 class="modal-title" id="myModalLabel"><i class="fa fa-wa fa-money"></i> Option Payment.</h4></center>
	    </div>
	    <div class="modal-body">
	    	<div class="payment" style="margin-bottom:5px;">
    			<div class="pull-left">Change($)</div>
    			<div class="pull-right"><span id="amount_change_d"></span></div>
    			<div class="clearfix"></div>
    		</div>

    		<div class="payment">
    			<div class="pull-left">Change(R)</div>
    			<div class="pull-right"><span id="amount_change_r"></span></div>
    			<div class="clearfix"></div>
    		</div>
	    	<center>
		    	<a class="btn-pay btn-group btn-num-modal-alt btn-print-option" onclick="initPayPrint(1);" href="javascript:void(0);">
					<i class="fa fa-wa fa-print"></i> Pay & Print
				</a>
				<a class="btn-pay btn-group btn-print-option" id="initPay" onclick="initPayPrint(0);" href="javascript:void(0);">
					<i class="fa fa-wa fa-money"></i> Pay
				</a>
			</center>
			<div class="clearfix"></div>
	    </div> 
	  </div>
	</div>
</div>


<script type="text/javascript">
	$(".btnNum").click(function(){
		var amount_change_tmp = 0;
		var numVal=$(this).data('id');
		var exchage_reil = $("#exchage_reil").val();
		var currentVal = $('#amountNum').val();
		var newBalance = currentVal + numVal;
		$("#amountNum").val(newBalance);
		$("#debitPay").val(newBalance);
		var total_amount = $("#amount_total_hidden").val();
		
		// if((parseFloat(total_amount)-parseFloat(newBalance))==0){
		var price_dollar = parseFloat(newBalance);
		var price_reil = parseFloat(price_dollar)*(parseFloat(exchage_reil)*100);
		// }else{
		// 	var price_dollar = 0;
		// 	var price_reil = 0;
		// }
		var amount_change_d = parseFloat(total_amount)-parseFloat(newBalance);
		var amount_change_r = (parseFloat(newBalance)-parseFloat(total_amount))*(parseFloat(exchage_reil)*100);

		$("span#amount_dolar").html(formatCurrency(price_dollar,'$'));
		$("span#amount_reil").html(formatCurrency(price_reil,'R'));
		$("span#amount_change_d").html(formatCurrency((parseFloat(newBalance)-parseFloat(total_amount)),'$'));
		$("span#amount_change_r").html(formatCurrency(amount_change_r,'R'));

		if(parseFloat(newBalance) >= parseFloat(total_amount)){
			$('.modal-print-invoice').modal('show');
		}else{
			return false;
		}
	});

	$("#processPay").click(function(){
		var debitPay = $("#debitPay").val();
		var total_amount = $("#amount_total_hidden").val();
		if(parseFloat(debitPay)>=parseFloat(total_amount) && debitPay!=''){
			$('.modal-print-invoice').modal('show');
		}else{
			toastr.warning("Please, place banlance or balance is not enough!");
			return false;
		}
	});
	// initPayPrint
	function initPayPrint(is_print){
		var order_id = $("input[name='order_id']").val();
		var dataString = {"_token": "{{ csrf_token() }}","order_id":order_id};
		$.ajax({  
			type: "POST",  
			url: "{{url("/pos/salepanel/ProcessPayment")}}",  
			data: dataString,
			dataType: 'json',
			beforeSend: function() 
			{
				toastr.info("Processing ...");
			},  
			success: function(response)
			{
				if(parseInt(is_print)==1){
					// window.location.href="{{url('pos/salepanel/print_invoice')}}?order_id="+order_id+'&print=1';
					var URL = "{{url('pos/salepanel/print_invoice')}}?order_id="+order_id+'&print=1'
					PopupCenter(URL,'Print Invoice','900','500');
					toastr.success("Order# "+order_id+" has been paid - view invoice.");
					window.location.href="{{url('pos/salepanel/dashboard')}}";

				}else{
					window.location.href="{{url('pos/salepanel/dashboard')}}";
					toastr.success("Order# "+order_id+" has been paid.");

				}
			}
		}).fail(function(error_response) 
		{
			toastr.warning("Problem occur while you are trying to process payment!");
			// setTimeout("vpb_remove_added_video();", 1000);
		});
		// if is print = 1 will print the invoice

	}

	function PopupCenter(url, title, w, h) {
        // Fixes dual-screen position                         Most browsers      Firefox
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

        var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

        // Puts focus on the newWindow
        if (window.focus) {
            newWindow.focus();
        }
        // window.close();

    }
</script>