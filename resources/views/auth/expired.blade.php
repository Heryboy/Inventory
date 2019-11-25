<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Bassaka Air - Schedule Management System</title>

  <!-- Bootstrap core CSS -->
  <link href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('/fonts/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{url('/css/animate.min.css')}}" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="{{url('/css/custom.css')}}" rel="stylesheet">
  <link href="{{url('/css/icheck/flat/green.css')}}" rel="stylesheet">
  <link href="{{url('/css/style.css')}}" rel="stylesheet">
  <!-- time-line -->
  <link href="{{url('/css/timeline/jquery.jqtimeline.css')}}" rel="stylesheet">
  <script type="text/javascript" src="{{url('/js/jquery-1.9.1.min.js')}}"></script>

  <!--[if lt IE 9]>
  <script src="../assets/js/ie8-responsive-file-warning.js"></script>
  <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<style type="text/css">
  html body{
    background-image: url();
  }
</style>

<body style="background:#F7F7F7;">

  <div class="">
    <!-- <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>
 -->
    <form method="POST" action="{{ url('/auth/login') }}">
      <input type="hidden" name="dir" value="">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div id="wrapper">
        <div id="login" class="animate form">
          <div class="row">
            <center><img src="{{url('images/logo.png')}}" width="150px"></center>
          </div>
          <center><h3>License Expired!</h3></center>
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <center><strong>Warning!</strong> your system have expired!<br>Please contact your provider for more information.<br></center>
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

          <section class="login_content">
            <div class="alert alert-danger">
              <center><strong>Warning!</strong> your system have expired!<br>
                Please contact your provider for more information.<br>
                Thanks
              </center>
              
            </div>
            <div class="clearfix"></div>
            <div class="separator">
              <div class="clearfix"></div>
              <br />
              <div>
                  <p>©Copyright Bassaka Air Limited. All Rights Reserved. Powered by <a href="http://y5net.com.kh">Y5Net</a></p>
              </div>
            </div>
           
            <!-- form -->
          </section>
          <!-- content -->
        </div>
      </div>
    </form>

  </div>

</body>

</html>
