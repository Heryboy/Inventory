@if(Session::has('message'))
  <div class="alert alert-success" style="margin-top:10px;">
  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <span>
      <i class="fa fa-wa fa-info-circle"></i> {!!Session::get('message')!!}
    </span>  
  </div>
@endif