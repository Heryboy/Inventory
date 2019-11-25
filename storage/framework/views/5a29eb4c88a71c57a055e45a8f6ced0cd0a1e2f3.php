 
<?php $__env->startSection('content'); ?>
  <?php
  define('IN_CB', true);
  ?>
    
    <?php
      if (!defined('IN_CB')) { die('You are not allowed to access to this page.'); }

      if (version_compare(phpversion(), '5.0.0', '>=') !== true) {
          exit('Sorry, but you have to run this script with PHP5... You currently have the version <b>' . phpversion() . '</b>.');
      }

      if (!function_exists('imagecreate')) {
          exit('Sorry, make sure you have the GD extension installed before running this script.');
      }

      include_once('barcodegen/html/include/function.php');

      // FileName & Extension
      $system_temp_array = explode('/', $_SERVER['PHP_SELF']);
      $filename = $system_temp_array[count($system_temp_array) - 1];
      $system_temp_array2 = explode('.', $filename);
      $availableBarcodes = listBarcodes();
      $barcodeName = findValueFromKey($availableBarcodes, $filename);
      $code = $system_temp_array2[0];

      // Check if the code is valid
      if (file_exists('config' . DIRECTORY_SEPARATOR . $code . '.php')) {
          include_once('config' . DIRECTORY_SEPARATOR . $code . '.php');
      }

      $default_value['start'] = '';
      $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : $default_value['start'];
      registerImageKey('start', $start);
      registerImageKey('code', 'BCGcode128');
  ?>

  <?php
    $default_value = array();
    $default_value['filetype'] = $filetype;
    $default_value['dpi'] = $dpi;
    // $default_value['scale'] = isset($defaultScale) ? $defaultScale : 1;
    $default_value['rotation'] = $rotation;
    $default_value['font_family'] = $font_family;
    $default_value['font_size'] = $font_size;
    $default_value['scale'] = $scale;
    $default_value['text'] = '';
    $default_value['thickness']=$thickness;
    $default_value['a1'] = '';
    $default_value['a2'] = '';
    $default_value['a3'] = '';

    $filetype = isset($_REQUEST['filetype']) ? $_REQUEST['filetype'] : $default_value['filetype'];
    $dpi = isset($_REQUEST['dpi']) ? $_REQUEST['dpi'] : $default_value['dpi'];
    $scale = intval(isset($_REQUEST['scale']) ? $_REQUEST['scale'] : $default_value['scale']);
    $rotation = intval(isset($_REQUEST['rotation']) ? $_REQUEST['rotation'] : $default_value['rotation']);
    $font_family = isset($_REQUEST['font_family']) ? $_REQUEST['font_family'] : $default_value['font_family'];
    $font_size = intval(isset($_REQUEST['font_size']) ? $_REQUEST['font_size'] : $default_value['font_size']);
    $text = isset($_REQUEST['text']) ? $_REQUEST['text'] : $default_value['text'];

    registerImageKey('filetype', $filetype);
    registerImageKey('dpi', $dpi);
    registerImageKey('scale', $scale);
    registerImageKey('rotation', $rotation);
    registerImageKey('font_family', $font_family);
    registerImageKey('font_size', $font_size);
    registerImageKey('text', stripslashes($text));

    // Text in form is different than text sent to the image
    $text = convertText($text);
    // start
    $default_value['start'] = '';
    $start = isset($_GET['start']) ? $_GET['start'] : $default_value['start'];
    registerImageKey('start', $start);
    registerImageKey('code', 'BCGcode128');

    $vals = array();
    for($i = 0; $i <= 127; $i++) {
        $vals[] = '%' . sprintf('%02X', $i);
    }
    $characters = array(
        'NUL', 'SOH', 'STX', 'ETX', 'EOT', 'ENQ', 'ACK', 'BEL', 'BS', 'TAB', 'LF', 'VT', 'FF', 'CR', 'SO', 'SI', 'DLE', 'DC1', 'DC2', 'DC3', 'DC4', 'NAK', 'SYN', 'ETB', 'CAN', 'EM', 'SUB', 'ESC', 'FS', 'GS', 'RS', 'US',
        '&nbsp;', '!', '"', '#', '$', '%', '&', '\'', '(', ')', '*', '+', ',', '-', '.', '/', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', ':', ';', '<', '=', '>', '?',
        '@', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '[', '\\', ']', '^', '_',
        '`', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '{', '|', '}', '~', 'DEL'
    );
  ?>


  <?php
  if (!defined('IN_CB')) { die('You are not allowed to access to this page.'); }
  ?>

  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
      <?php echo $__env->make('admin.common.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav class="" role="navigation">
          <div class="nav toggle" style="margin-bottom:10px;">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
        </nav>
      </div>
    </div><!-- /top navigation -->
    <!-- page content -->
      <div class="right_col" role="main">
        
        <!-- row -->
        <div class="row">
          <!-- col-md-8 col-xs-8 -->
          <div class="col-md-12 col-xs-12">
            <div class="x_panel">
              <div class="row">
                <div class="x_title">
                  <h2><i class="fa fa-wa fa-flag"></i> <?php echo trans('item_mgr/item_barcode.entry_title'); ?></h2>
                  <div class="-row">
                    <span class="pull-right">
                      <div class="btn-group pull-left">
                        <button style="margin-right: 10px;" onclick="initPrintBarcode();" data-original-title="<?php echo trans('item_mgr/item_barcode.entry_print'); ?>"  data-toggle="tooltip" type="button" data-placement="top" href='<?php echo e(url('admin/item_mgr/item_base_store/create')); ?>' class="btn btn-sm btn-success" name="print"><i class="fa fa-wa fa-print"></i> <?php echo trans('item_mgr/item_barcode.entry_print'); ?></button>

                        <button form-id="form-barcode" data-original-title="<?php echo trans('item_mgr/item_barcode.entry_generate'); ?>"  data-toggle="tooltip" type="submit" data-placement="top" href='<?php echo e(url('admin/item_mgr/item_base_store/create')); ?>' class="btn btn-sm btn-primary" name="submit"><i class="glyphicon glyphicon-cog"></i> <?php echo trans('item_mgr/item_barcode.entry_generate'); ?></button>
                      </div>
                    </span>
                    <span class="pull-right">
                    </span>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              
              <?php /* new order */ ?>
              <div class="modal fade modal-barcode" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <center>
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Barcode Scanner</h4>
                      </div>
                      <div class="modal-body">
                        <button id="initCancelAllItem" class="btn btn-lg btn-success">Print</button>
                        <button class="btn btn-lg btn-default" data-dismiss="modal">No</button>
                      <div class="clearfix"></div>
                      </div>
                  </center>
                  </div>
                </div>
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content padding-top">
                  <?php echo $__env->make("admin.item_mgr.item_barcode.filter", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <!-- search-filter -->
                  
                  <div class="padding-top-md">
                    <div class="col-sm-12">
                      <?php echo $__env->make('admin.item_mgr.item_barcode._barcode', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <?php echo $__env->make('admin.common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- /footer content -->
      </div>
    <!-- /page content -->
  </div>
  <script type="text/javascript">
    function initPrintBarcode(){
      var cid = $("select[name='category_id']").val();
      var scid = $("select[name='sub_category_id']").val();
      var URL = "<?php echo e(url('/')); ?>/admin/item_mgr/print_barcode?category_id="+cid+"&sub_category_id="+scid+"&font_family=Arial.ttf&font_size=10&type=barcodegen%2Fhtml%2FBCGcode128.php&filetype=PNG&dpi=72&scale=2&thickness=50&rotation=0&barcode_type=NULL";
      // window.print();
      PopupCenter(URL,'Print Invoice','900','500');
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>