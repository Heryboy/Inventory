 
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
             <!-- block button -->
             <div class="pull-right" style="padding-top:10px;">
              <?php echo $__env->make('admin.common.action_top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
             </div> 
           </nav>
         </div>
      </div><!-- /top navigation -->
      <!-- page content -->
      <div style="min-height: 650px;" class="right_col" role="main">
        <?php echo $__env->make('admin.common.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="row">

          <div class="clearfix"></div>

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Configuration</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                        <th>No.</th>
                       
                        <th>Config Group</th>
                        <th>Name</th>
                        <!-- <th>Keywords</th> -->
                        <th>Value</th>
                        <th>Action</th>
                      </tr>
                    </thead> 
                    <tbody>
                      <?php $i = 1;?>
                      <?php
                      //print_r($alldata); exit;
                      foreach($alldata as $data){
                      ?>
                        <tr>
                          <td width="50"><?php echo($i); ?></td>
                          <td><?php echo e($data->cg_name); ?></td>
                          <td><?php echo e($data->name); ?> </td>
                          <!-- <td><?php echo e($data->keywords); ?></td> -->
                          <td><?php echo e(substr($data->value,0,70)); ?></td>
                          <td width="250">
                            <a href="<?php echo e(route('admin.config.configuration.show',$data->id)); ?>" class="btn btn-info" data-original-title="View"  data-toggle="tooltip" data-placement="top"><i class="fa fa-info"></i></a>
                            <a href="<?php echo e(route('admin.config.configuration.edit',$data->id)); ?>" class="btn btn-primary" data-original-title="Edit"  data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger" data-original-title="Delete"  data-toggle="tooltip" data-placement="top" data-method="delete" data-confirm="Are you sure?">
                              <i class="fa fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                     <?php $i++; ?>
                    <?php  }?>
                    </tbody>
                    
                  </table>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.common.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>