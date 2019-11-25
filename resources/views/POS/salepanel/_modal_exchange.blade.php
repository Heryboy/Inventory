{{-- modal-pay proccess payment --}}
<div class="modal fade modal-currency-exchange" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
	      </button>
	      <h4 class="modal-title" id="myModalLabel"><i class="fa fa-wa fa-money"></i> Currency Exchange ($).</h4>
	    </div>
	    <div class="modal-body">
	    	<div class="col-sm-6">
	    		<div class="payment">
	    			<div class="pull-left">Change ($)</div>
	    			<div class="pull-right"><span id="exchange_dolar"></span></div>
	    			<div class="clearfix"></div>
	    		</div>
	    		<br/>
	    		<div class="payment">
	    			<div class="pull-left">Change (R)</div>
	    			<div class="pull-right"><span id="exchange_reil"></span></div>
	    			<div class="clearfix"></div>
	    		</div>

				
	    	</div>
	    	<div class="col-sm-6">
				<section class="number_cal">
					<input type="hidden" name="ExchangeAmount" id="ExchangeAmount"/>

					<a class="btn-group btn-num-modal btnKeyNum" data-id="10" href="javascript:void(0);">
					10
					</a>
					<a class="btn-group btn-num-modal btnKeyNum" data-id="20" href="javascript:void(0);">
					20
					</a>
					<a class="btn-group btn-num-modal btnKeyNum" data-id="50" href="javascript:void(0);">
					50
					</a>
					<a class="btn-group btn-num-modal btnKeyNum" data-id="7" href="javascript:void(0);">
					7
					</a>
					<a class="btn-group btn-num-modal btnKeyNum" data-id="8" href="javascript:void(0);">
					8
					</a>
					<a class="btn-group btn-num-modal btnKeyNum" data-id="9" href="javascript:void(0);">
					9
					</a>
					<a class="btn-group btn-num-modal btnKeyNum" data-id="4" href="javascript:void(0);">
					4
					</a>
					<a class="btn-group btn-num-modal btnKeyNum" data-id="5" href="javascript:void(0);">
					5
					</a>
					<a class="btn-group btn-num-modal btnKeyNum" data-id="6" href="javascript:void(0);">
					6
					</a>
					<a class="btn-group btn-num-modal btnKeyNum" data-id="1" href="javascript:void(0);">
					1
					</a>
					<a class="btn-group btn-num-modal btnKeyNum" data-id="2" href="javascript:void(0);">
					2
					</a>
					<a class="btn-group btn-num-modal btnKeyNum" data-id="3" href="javascript:void(0);">
					3
					</a>
					<a class="btn-group btn-num-modal btnKeyNum" data-id="0" href="javascript:void(0);">
					0
					</a>
					<a class="btn-group btn-num-modal btnKeyNum" data-id="00" href="javascript:void(0);">
					00
					</a>
					<a class="btn-group btn-num-modal btnKeyNum" data-id="." href="javascript:void(0);">
					.
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
	      {{-- <button type="button" class="btn btn-primary">Settlement</button>
	      <button type="button" class="btn btn-primary">Print</button> --}}
	    </div>

	  </div>
	</div>
</div>

<script type="text/javascript">
	$(".btnKeyNum").click(function(){
		var numVal = $(this).data('id');
		var currentVal = $('#ExchangeAmount').val();
		var newBalance = currentVal + numVal;
		$("#ExchangeAmount").val(newBalance);
		var exchange_reil = $("#exchage_reil").val();
		var new_change_reil = (parseFloat(exchange_reil)*100)*newBalance;
		$("span#exchange_dolar").html(formatCurrency(newBalance,'$'));
		$("span#exchange_reil").html(formatCurrency(new_change_reil,'R'));
	});
</script>