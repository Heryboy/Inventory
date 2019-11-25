@if(Session::has('message'))
  <div class="alert alert-danger">
  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
   	<ul>
    	{{Session::get('message')}}
    </ul>
</div>
@endif