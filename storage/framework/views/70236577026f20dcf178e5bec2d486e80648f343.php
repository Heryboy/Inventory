<?php /* <form id="form-barcode" action="" method="patch"> */ ?>
    
   

        <?php foreach($Item as $row): ?>
            <div style="width: 260px; float: left;">
                <div style="font-size: 14px; margin-right: 30px;float: left;margin-bottom: 20px;">
                    <div><center><b><?php echo e($row->name); ?></b></center></div>
                    <img src="<?php echo e(url('/')); ?>/barcodegen/html/image.php?filetype=<?php echo e($filetype); ?>&dpi=<?php echo e($dpi); ?>&scale=<?php echo e($scale); ?>&rotation=<?php echo e($rotation); ?>&font_family=<?php echo e($font_family); ?>&font_size=<?php echo e($font_size); ?>&text=<?php echo e($row->item_barcode); ?>&start=NULL&code=BCGcode128" alt="Barcode Image" />
                </div>
            </div>
        <?php endforeach; ?>

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
<?php /* </form> */ ?>


<?php
// include('barcodegen/html/include/footer.php');
?>