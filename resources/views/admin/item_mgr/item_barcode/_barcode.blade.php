{{-- <form id="form-barcode" action="" method="patch"> --}}
    
   

        @foreach($Item as $row)
            <div style="width: 260px; float: left;">
                <div style="font-size: 14px; margin-right: 30px;float: left;margin-bottom: 20px;">
                    <div><center><b>{{$row->name}}</b></center></div>
                    <img src="{{url('/')}}/barcodegen/html/image.php?filetype={{$filetype}}&dpi={{$dpi}}&scale={{$scale}}&rotation={{$rotation}}&font_family={{$font_family}}&font_size={{$font_size}}&text={{$row->item_barcode}}&start=NULL&code=BCGcode128" alt="Barcode Image" />
                </div>
            </div>
        @endforeach

    <div class="output" style="display: none;">
        <section class="output">
            <h3>Output</h3>
            <?php
                $imageKeys='';
                $finalRequest = '';
                foreach (getImageKeys() as $key => $value) {
                    $finalRequest .= '&' . $key . '=' . urlencode($value);
                }
                if (strlen($finalRequest) > 0) {
                    $finalRequest[0] = '?';
                }
                // echo $finalRequest;
            ?>
            <div id="imageOutput">
                <?php if (isset($_REQUEST['text']) && $_REQUEST['text']!== '') { ?>
                    <img src="/barcodegen/html/image.php<?php echo $finalRequest; ?>" alt="Barcode Image" />
                    <?php }
                else { ?>Fill the form to generate a barcode.<?php } ?>
            </div>
        </section>
    </div>
{{-- </form> --}}


<?php
// include('barcodegen/html/include/footer.php');
?>