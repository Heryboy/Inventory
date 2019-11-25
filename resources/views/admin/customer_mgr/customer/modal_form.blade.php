<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background-color: #3c8dbc;color:#fff;">
        <button style="color:#fff;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true" >×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-wa fa-pencil"></i> Item Form</h4>
      </div>
      <div class="modal-body">
        @if(!isset($customer))
          {!! Form::open(['url' => 'admin/customer_mgr/customer','class'=>'form-horizontal']) !!}
        @else
          {!! Form::model($customer,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.customer_mgr.customer.update',$customer->id]]) !!}
        @endif
          <!-- row -->
          <div class="row">
            <!-- x_content -->
            <div class="x_content">
              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-users"></i> Customers</a>
                  </li>
                  <!-- <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil"></i> Conversion</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false"><i class="fa fa-code-fork"></i> Related Items</a>
                  </li> -->
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                    <!-- col-sm-12 -->
                    <div class="col-sm-10" style="padding-top:30px;">

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('customer_mgr/customer.customer_group')!!}<span class="validate_label_red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          {!! Form::select('customer_group_id', $customer_groups, null, ['placeholder' => trans('customer_mgr/customer.select_customer_group'),'class'=>'form-control has-feedback-left']) !!}
                          <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('customer_mgr/customer.name')!!}<span class="validate_label_red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          {!! Form::text('name',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("customer_mgr/customer.name")]) !!}
                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('customer_mgr/customer.phone')!!}<span class="validate_label_red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          {!! Form::text('phone',null,['class'=>'form-control has-feedback-left','placeholder'=>trans('customer_mgr/customer.phone')]) !!}
                          <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('customer_mgr/customer.email')!!}:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          {!! Form::email('email',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("customer_mgr/customer.email")]) !!}
                          <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{!!trans('customer_mgr/customer.address')!!}:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          {!! Form::text('address',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("customer_mgr/customer.address")]) !!}
                          <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                    </div>

                    <div class="col-sm-2">
                      <div class="pull-left">
                        <img class="img-responsive" src="{{url('images/user.png')}}">
                      </div>
                    </div>
                  </div>
                  <!-- <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                      booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                      booth letterpress, commodo enim craft beer mlkshk </p>
                  </div> -->
                </div>
              </div>
              
            </div>
          </div>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>

    </div>
  </div>
</div>