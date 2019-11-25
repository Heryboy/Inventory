 
<?php $__env->startSection('content'); ?>
  <!-- header -->
  <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <form novalidate="" action="#" id="demo-form2" data-parsley-validate="" class="">
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
      <div style="min-height: 650px;" class="right_col" role="main">
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo $__env->make('admin.common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="x_panel">
              <div class="x_title">
                <div class="row">
                  <h2><i class="fa fa fa-th-large"></i> <?php echo trans('store/main_store.entry_title'); ?></h2>
                  <div class="clearfix"></div>
                </div>
              </div>

              <!-- row -->
              <div class="row">
                <div class="col-sm-12">

                  <!-- Main content -->
                  <section class="content">

                    <div class="row" style="margin-top:10px;">
                      <?php foreach($branches as $branch): ?>
                        <a href="javascript:void(0);" onclick="initChageBranch(<?php echo e($branch->id); ?>);" class="btn btn-app <?php if($branch->is_default==1): ?>btn-active <?php endif; ?>">
                          <i class="fa fa-home"></i> <?php echo e($branch->branch_name); ?>

                        </a>
                      <?php endforeach; ?>

                    </div><!-- /.row -->

                    <!-- =========================================================== -->
                  </section><!-- /.content -->

                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- footer content -->
        <?php echo $__env->make('admin.common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- /footer content -->
      </div>
      <!-- /page content -->
    </div>
  </form>

  <style type="text/css">
   .btn.btn-app.btn-active{background-color:#1479B8;color:#fff;}
  </style>

  <script type="text/javascript">
    function initChageBranch(branch_id){
      var dataString = {"_token": "<?php echo e(csrf_token()); ?>","branch_id":branch_id};
      $.ajax({  
        type: "POST",  
        url: "<?php echo e(url("/admin/store/ChangeStore")); ?>",  
        data: dataString,
        dataType: 'json',
        beforeSend: function() 
        {
          toastr.info("Loading ...");
        },  
        success: function(response)
        {
          toastr.success("Store has been changed.");
          window.location.reload(true);
        }
      }).fail(function(error_response) 
      {
        toastr.warning("Problem occur while you are trying to change store!");
        // setTimeout("vpb_remove_added_video();", 1000);
      });
    }
  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>