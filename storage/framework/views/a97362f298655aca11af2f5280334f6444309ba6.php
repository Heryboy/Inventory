<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <meta name="csrf-param" content="_token" />
  
  <title><?php echo e(SITE_NAME); ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo e(url('/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('/fonts/css/font-awesome.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('/css/animate.min.css')); ?>" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="<?php echo e(url('/css/custom.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('/css/icheck/flat/green.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('/css/style.css')); ?>" rel="stylesheet">
  <!-- time-line -->
  <link href="<?php echo e(url('/css/timeline/jquery.jqtimeline.css')); ?>" rel="stylesheet">
  <script type="text/javascript" src="<?php echo e(url('/js/jquery-1.9.1.min.js')); ?>"></script>

  <!--[if lt IE 9]>
  <script src="../assets/js/ie8-responsive-file-warning.js"></script>
  <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>

  <div class="col-sm-4 col-sm-offset-4" style="margin-top:50px;">
    <!-- <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>
 -->
    <form method="POST" action="<?php echo e(url('/auth/login')); ?>">
      <input type="hidden" name="dir" value="">
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
      <div id="wrapper">
        <div id="login" class="animate form">
          <div class="row">
            <center><img src="<?php echo e(url('images/logo.png')); ?>" width="100px"></center>
          </div>
          <center><h2 style="color:#ffffff"><b><?php echo e(SITE_NAME); ?></b></h2></center>
            <?php if(count($errors) > 0): ?>
              <div class="alert alert-danger">
                <center><strong>Whoops!</strong> Problems with your login!<br><br></center>
                <ul>
                  <?php foreach($errors->all() as $error): ?>
                    <li><?php echo e($error); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>

          <section class="register-box login_content">

              <div style="padding-bottom:10px;">
                <?php /* <input type="text" name="username" class="form-control" placeholder="Username"/> */ ?>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                  <input name="username" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Username" type="text">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div style="padding-bottom:10px;">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                  <input name="password" class="form-control has-feedback-left" id="inputSuccess2" placeholder="password" type="password">
                  <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                </div>
                <?php /* <input type="password" name="password" class="form-control" placeholder="Password"/> */ ?>
              </div>
              <div>
                <button type="submit" class="btn btn-danger submit" href="<?php echo e(url('schedule_monitor')); ?>">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>
              <div class="clearfix"></div>
              
              <div class="separator">

                
                <div class="clearfix"></div>
                <br />
                <div>
                  <p><?php echo e(FOOTER_TEXT); ?>. <br>Powered by <a target="_blank" href="">Samba Softwre</a></p>
                </div>
              </div>
           
            <!-- form -->
          </section>
          <!-- content -->
        </div>
      </div>
    </form>

  </div>

  <style>
    /* background:#5f6e7b; */
    html body{
      background: url(../images/bg.jpg) center no-repeat;
      background-size: cover;
      height: 100vh;
    }
  </style>
</body>

</html>
