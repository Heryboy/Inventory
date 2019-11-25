<?php if(count($errors) > 0): ?>
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
   	<ul>
    <?php foreach($errors->all() as $error): ?>
      <li><?php echo e($error); ?></li>
    <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>
<?php 
  // if (count($errors) > 0){
  //   echo $errors->first('item_category_id');
  // }
?>