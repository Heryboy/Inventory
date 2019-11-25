<!DOCTYPE html>
<html>
<head>
    <title>Barcode Scanner</title>
</head>
<body>  
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

    <div class="contain-invoice">
        <div class="row-logo">
            <center><div class="title-invoice">BARCODE ITEM</div></center>
            <!-- <div style="margin-bottom: 20px;">
                <b>
                    Category: {{$cname}} <br/>
                    Sub Category: {{$sname}}
                </b>
            </div> -->
        </div>

        <div>
           @include('admin.item_mgr.item_barcode._barcode')
        </div>
        <div class="clearfix"></div>
        <div class="desc-footer" style="margin-top:70px;">
            <center><b>Powered By: SambaSoft Group.</b></center>
        </div>
    </div>
    @if(isset($_REQUEST['print']) && $_REQUEST['print']==1)
        <script type="text/javascript">
            var url = '/pos/salepanel/dashboard';
            window.print();
            // window.location = url;
        </script>
    @endif
    <style type="text/css">
        html body{font-family: arial;}
        .clearfix{clear: both;}
        .desc-footer{font-size:14px;}
        .enquiry{line-height: 20px;font-size:15px;}
        .thanks{padding:10px 0;font-weight: bold;}
        .customer-no,.invoice-no{font-size:16px;font-weight: bold;padding-top:5px;padding-bottom: 5px;}
        .title-invoice{font-size:25px;font-weight: bold;color:#0065b8;padding-bottom: 30px;}
        .contain-invoice{width:100%;/*height: 841.9pt;*/margin:0 auto;}
        table#table-row{border-collapse:collapse;width:100%;}
        table#table-row tr th{background-color:#0065b8;color:#fff;text-transform: uppercase;padding:4px !important;font-size:15px;}
        table#table-row tbody tr td{border:1px solid #444;padding:5px;font-size:15px;}
        table#table-row tfoot tr td{border:1px solid #ddd;padding:5px;font-size:16px;font-weight: bold;}
        .pull-left{float: left}
        .pull-right{float: right !important;}
        div.bg-info{background-color:#0065b8;width:100%;color:#fff;}
        div.title_inner{padding:3px;font-size:15px;font-weight: bold;}
        .general-info{font-size:14px;line-height: 20px;}
        div.client-info,div.bill-info{
            width:280pt;
            padding-bottom: 10px;
        }
        div.client-info{
            float: left;
        }
        div.bill-info{
            float: right;
        }
    </style>
</body>
</html>

<script type="text/javascript">
    window.print();
</script>