<?php
  date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html>

<html class="no-js" lang="en" ng-app="myApp">

<head>
  <link rel="apple-touch-icon" sizes="57x57" href="assets/icon-favico/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/icon-favico/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/icon-favico/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/icon-favico/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/icon-favico/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/icon-favico/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/icon-favico/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/icon-favico/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/icon-favico/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="assets/icon-favico/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/icon-favico/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/icon-favico/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/icon-favico/favicon-16x16.png">
  <!-- <link rel="manifest" href="assets/icon-favico/manifest.json"> -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <meta name="csrf-param" content="_token" />

  <title><?php if(isset($view_title)): ?><?php echo trans($view_title); ?><?php else: ?> <?php echo e(SITE_NAME); ?> <?php endif; ?></title>

  <link media="screen" rel="stylesheet" type="text/css" href="<?php echo e(url('css/bootstrap.min.css')); ?>">
  <link href="<?php echo e(url('fonts/css/font-awesome.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('css/custom.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('css/kg_custom.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('css/select/select2.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('css/icheck/flat/green.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('css/select/select2.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('css/style.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('css/image_load.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('css/jquery-ui.css')); ?>" rel="stylesheet">  
  <link rel="stylesheet" href="<?php echo e(url('js/plugins/datatables/dataTables.bootstrap.css')); ?>">
  <link rel="stylesheet" type="text/css')}}" href="<?php echo e(url('css/select/select2.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('js/plugins/timepicker/bootstrap-timepicker.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('js/plugins/datetimepicker/bootstrap-datetimepicker.min.css')); ?>">
  <link rel="stylesheet" type="text/css')}}" href="<?php echo e(url('js/plugins/datatables/buttons.bootstrap.min.css')); ?>">
  <link rel="stylesheet" type="text/css')}}" href="<?php echo e(url('js/plugins/datatables/buttons.bootstrap.min.css')); ?>">
  <link rel="stylesheet" type="text/css')}}" href="<?php echo e(url('css/colorpicker/bootstrap-colorpicker.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('js/toast/toastr.css')); ?>">
  <script src="<?php echo e(url('js/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
</head>

<body class="nav-md">
  <?php /* loading */ ?>
  <div class="waiting_loading"><img src="<?php echo e(url('images/loading.gif')); ?>"/></div>
  <!-- loading -->
  <!-- <div id="loading"><img src="images/loading.gif"></div> -->
  <!-- container body -->
  <div class="container body">
    <?php echo $__env->yieldContent('content'); ?>
  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed-notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
</body>

</html>


<script type="text/javascript" src="<?php echo e(url('js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/custom.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/rails.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/pace/pace.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/tags/jquery.tagsinput.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/moment/moment.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/datepicker/daterangepicker.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/image_load.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/progressbar/bootstrap-progressbar.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/icheck/icheck.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/chartjs/chart.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/select/select2.full.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/moment/moment.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/datepicker/daterangepicker.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/parsley/parsley.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/colorpicker/bootstrap-colorpicker.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/colorpicker/docs.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/flot/jquery.flot.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/flot/jquery.flot.pie.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/flot/jquery.flot.orderBars.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/flot/jquery.flot.time.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/flot/date.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/flot/jquery.flot.spline.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/flot/jquery.flot.stack.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/flot/curvedLines.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/select/select2.full.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/maps/jquery-jvectormap-2.0.3.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/maps/jquery-jvectormap-world-mill-en.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/maps/jquery-jvectormap-us-aea-en.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/pace/pace.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/datetimepicker/bootstrap-datetimepicker.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/skycons/skycons.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/timepicker/bootstrap-timepicker.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/plugins/chartjs/chart.min.js')); ?>"></script>
<script type="text/javascript" type="text/javascript" src="<?php echo e(url('js/common.js')); ?>"></script>
<script type="text/javascript" type="text/javascript" src="<?php echo e(url('js/kg_custom.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/toast/toastr.js')); ?>"></script>
<?php /* ##################### Languages ############################## */ ?>
<script type="text/javascript" src="<?php echo e(url('assets/lang/en/item_category.js')); ?>"></script>
<?php /* ##################### Assets ############################## */ ?>
<script type="text/javascript" src="<?php echo e(url('assets/js/item_category.js')); ?>"></script>