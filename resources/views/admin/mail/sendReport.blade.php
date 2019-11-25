<!-- Start Form Sendmail modal -->
      <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
      
               

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">Send Email</h4>
            </div>
            <form action="{{url("admin/sendhtmlemail")}}" method="put" class="form-horizontal form-label-left" enctype="multipart/data" target="_blank">
              <div class="modal-body">
                  <div id="testmodal" style="padding: 5px 20px;">
                  <?php /*  
                  <input type="hidden" name="time_zone" id="time_zone" value="<?php echo $time_zone;?>" />
                  <input type="hidden" name="filter_from" id="filter_from" value="<?php echo $filter_from;?>">
                  <input type="hidden" name="filter_to" id="filter_to" value="<?php echo $filter_to;?>">
                  <input type="hidden" name="aircraft_id" id="aircraft_id" value="<?php echo $aircraft_id;?>">
                  <input type="hidden" name="flight_status_id" id="flight_status_id" value="<?php echo $flight_status_id;?>">
                  <input type="hidden" name="fnotification_id" id="fnotification_id" value="<?php echo $fnotification_id;?>">
                  <input type="hidden" name="fn" id="fn" value="<?php echo $fn;?>">
                  <input type="hidden" name="pax_movement_id" id="pax_movement_id" value="<?php echo $pax_movement_id;?>">
                  <input type="hidden" name="origin_id" id="origin_id" value="<?php echo $origin_id;?>">
                  <input type="hidden" name="destination_id" id="destination_id" value="<?php echo $destination_id;?>">
                  <input type="hidden" name="Task" value="SendMail">
                   */?> 
                    <div class="form-group">
                      <label class="col-sm-3 control-label">To</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="mailTo" name="mailTo" value="sreyleakyem@hotmail.com">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Subject</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="subject" name="subject">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Description</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary antosubmit">Send</button>
              </div>

            </div>
            </form>
        </div>
      </div>
      

      <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
      <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>

      <!-- End Form Sendmail modal -->