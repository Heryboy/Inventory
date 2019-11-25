<!-- <!DOCTYPE html>
<html>
<head>
	<title>!! subject !!}</title>
</head>
<body> -->
	<p>
	  <center>
	  	<img width="150px;" src="{!! SITE_HTTP_URL !!}images/logo.png">
	  </center>
	</p>
		<center style="font-size:14px;">You have received a new message from Bassaka Air.</center>
	<h4 class="subject"><center>System Notifications : {!! subject !!}</center><hr></h4>
	<div class="v-info"><p><center>{!! message !!}</center></p></div>

	<hr>
	<small>
		<center>
			Contact: {!! CONTACT_NUMBER !!},<br>
			Email: {!! CONTACT_EMAIL !!},
			Website: {!! WEBSITE !!}<br>
			Address: {!! CONTACT_ADDRESS !!}<br>
		</center>
	</small>

	<style type="text/css">
		ul.list-form li {line-height: 25px;}
		.subject{text-transform: uppercase;}
		.v-info{font-weight: bold;width:250px;margin:15px auto;color:#2196F3;}
	</style>

<!-- </body>
</html> -->