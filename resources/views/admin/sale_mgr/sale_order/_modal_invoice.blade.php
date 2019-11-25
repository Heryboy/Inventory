{{-- new order --}}
<div class="modal fade modal-print-invoice" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	  	{{-- <center> --}}
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		      </button>
		      <h4 class="modal-title" id="myModalLabel"><i class="fa fa-wa fa-print"></i> Print Preview Invoice.</h4>
		    </div>
		    <div class="modal-bod">
		    	@include('admin.sale_mgr.sale_order._print_invoice')
		    </div>
		    <div class="modal-footer">
		    	<a target="_blank" href="{{url('admin/sale_mgr/print_invoice?print=1')}}" id="initPrintOutInvoice" class="btn btn-sm btn-success">Print</a>
		    	<button class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
				<div class="clearfix"></div>
		    </div>
		{{-- </center> --}}
	  </div>
	</div>
</div>