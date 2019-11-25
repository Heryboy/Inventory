{{-- modal_print_invoice --}}
<div class="modal fade modal-drawer" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-md">
	  <div class="modal-content">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
	      </button>
	      <center><h4 class="modal-title" id="myModalLabel"><i class="fa fa-wa fa-money"></i> Drawer Optoins.</h4></center>
	    </div>
	    <div class="modal-body">
	    	<center>
		    	<a class="btn-pay btn-group btn-num-modal-alt btn-print-option" onclick="initOpenDrawer(1);" href="javascript:void(0);">
					<i class="fa fa-wa fa-print"></i> Open Drawer
				</a>
				<a class="btn-pay btn-group btn-print-option" onclick="initOpenDrawer(0);" href="javascript:void(0);">
					<i class="fa fa-wa fa-money"></i> Close Drawer
				</a>
			</center>
			<div class="clearfix"></div>
	    </div> 
	  </div>
	</div>
</div>