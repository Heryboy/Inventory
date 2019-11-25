<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background-color: #3c8dbc;color:#fff;">
        <button style="color:#fff;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true" >×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-wa fa-pencil"></i> Item Form</h4>
      </div>
      <div class="modal-body">
      <!-- form example -->
      <div class="x_content">
            <div class="x_panel">
                <div class="x_content">
                  <br />
                  <form class="form-horizontal form-label-left input_mask">

                    
                  </form>
                </div>
              </div>


              <div class="x_panel">
                <div class="x_title">
                  <h2>Registration Form <small>Click to validate</small></h2>
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
                <div class="x_content">

                  <!-- start form for validation -->
                  <form id="demo-form" class="form-horizontal form-label-left input_mask" data-parsley-validate>
                    <label for="fullname">Full Name * :</label>
                    <input type="text" id="fullname" class="form-control" name="fullname" required />

                    <label for="email">Email * :</label>
                    <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required />

                    <label>Gender *:</label>
                    <p>
                      M:
                      <input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required /> F:
                      <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                    </p>

                    <label>Hobbies (2 minimum):</label>
                    <p style="padding: 5px;">
                      <input type="checkbox" name="hobbies[]" id="hobby1" value="ski" data-parsley-mincheck="2" required class="flat" /> Skiing
                      <br />

                      <input type="checkbox" name="hobbies[]" id="hobby2" value="run" class="flat" /> Running
                      <br />

                      <input type="checkbox" name="hobbies[]" id="hobby3" value="eat" class="flat" /> Eating
                      <br />

                      <input type="checkbox" name="hobbies[]" id="hobby4" value="sleep" class="flat" /> Sleeping
                      <br />
                      <p>

                        <label for="heard">Heard us by *:</label>
                        <select id="heard" class="form-control" required>
                          <option value="">Choose..</option>
                          <option value="press">Press</option>
                          <option value="net">Internet</option>
                          <option value="mouth">Word of mouth</option>
                        </select>

                        <label for="message">Message (20 chars min, 100 max) :</label>
                        <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                          data-parsley-validation-threshold="10"></textarea>

                        <br/>
                        <span class="btn btn-primary">validate form</span>

                  </form>
                  <!-- end form for validations -->

                </div>
              </div>
          </div>
      <!-- /form example -->

        @if(!isset($item))
          {!! Form::open(['url' => 'admin/setup_mgr/item','class'=>'form-horizontal']) !!}
        @else
          {!! Form::model($item,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.setup_mgr.item.update',$item->id]]) !!}
        @endif
          <!-- row -->
          <div class="row">
            <!-- x_content -->
            <div class="x_content">
              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-pencil"></i> Items</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil"></i> Conversion</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false"><i class="fa fa-code-fork"></i> Related Items</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                    <!-- col-sm-12 -->
                    <div class="col-sm-12" style="padding-top:30px;">

                      <div class="form-group col-sm-6">
                        <label for="middle-name" class="-control-label col-sm-4 col-xs-12 pull-left">{!! trans('setup_mgr/item.item_category') !!} <span class="validate_label_red">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12 ">
                          {!! Form::select('item_category_id', $item_category, null, ['placeholder' => trans('setup_mgr/item.choose_item_category'),'class'=>'form-control has-feedback-left']) !!}
                          <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="middle-name" class="-control-label col-sm-4 col-xs-12 pull-left">{!! trans('setup_mgr/item.item_code') !!} <span class="validate_label_red">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12 ">
                          {!! Form::text('item_code',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.item_name")]) !!}
                          <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12">{!!trans('setup_mgr/item.item_name')!!} <span class="validate_label_red">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12 ">
                          {!! Form::text('name',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.item_name")]) !!}
                          <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="middle-name" class="-control-label col-sm-4 col-xs-12 pull-left">{!! trans('setup_mgr/item.item_type') !!} <span class="validate_label_red">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12 ">
                          {!! Form::select('item_type_id', $item_type, null, ['placeholder' => trans('setup_mgr/item.choose_item_type'),'class'=>'form-control has-feedback-left']) !!}
                          <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="middle-name" class="-control-label col-sm-4 col-xs-12 pull-left">{!! trans('setup_mgr/item.item_status') !!} <span class="validate_label_red">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12 ">
                          {!! Form::select('item_status_id', $item_status, null, ['placeholder' => trans('setup_mgr/item.choose_item_status'),'class'=>'form-control has-feedback-left']) !!}
                          <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12">{!!trans('setup_mgr/item.alias')!!} <span class="validate_label_red">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12 ">
                          {!! Form::text('alias',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.alias")]) !!}
                          <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12">{!!trans('setup_mgr/item.net_price')!!} <span class="validate_label_red">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12 ">
                          {!! Form::text('net_price',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.net_price")]) !!}
                          <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12">{!!trans('setup_mgr/item.qty')!!} <span class="validate_label_red">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12 ">
                          {!! Form::text('qty',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.qty")]) !!}
                          <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <!-- row -->
                      <div class="form-group col-sm-6">
                        <label class="-control-label col-sm-4 col-xs-12">{!!trans('setup_mgr/item.is_active')!!}</label>
                        <!-- col-sm-6 -->
                        <div class="col-sm-6" >
                          {!! Form::checkbox('is_active',null,null,['class' => 'flat form-control']) !!}
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <div class="col-sm-12" style="padding-top:20px;">
                      <!-- form-group -->
                      <div class="form-group col-sm-6">
                        <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12">{!!trans('setup_mgr/item.qty1')!!} <span class="validate_label_red">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12 ">
                          {!! Form::text('qty1',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.qty1")]) !!}
                          <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <!-- form-group -->
                      <div class="form-group col-sm-6">
                        <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12">{!!trans('setup_mgr/item.qty2')!!} <span class="validate_label_red">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12 ">
                          {!! Form::text('qty2',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.qty2")]) !!}
                          <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <!-- form-group -->
                      <div class="form-group col-sm-6">
                        <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12">{!!trans('setup_mgr/item.unit1')!!} <span class="validate_label_red">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12 ">
                          {!! Form::text('unit_id1',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.unit1")]) !!}
                          <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <!-- form-group -->
                      <div class="form-group col-sm-6">
                        <label for="middle-name" class="-control-label col-sm-4 col-x pull-lefts-12">{!!trans('setup_mgr/item.unit2')!!} <span class="validate_label_red">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12 ">
                          {!! Form::text('unit_id2',null,['class'=>'form-control has-feedback-left','placeholder'=>trans("setup_mgr/item.unit2")]) !!}
                          <span class="fa fa-edit form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                    <?php 
                      $attribute_item = 0;
                    ?>
                    <!-- col-sm-12 -->
                    <div class="col-sm-12 table-responsive">
                      <table id="item_row" class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Item Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(isset($item_data))
                          <tr>
                            <td>1</td>
                            <td><input type="text" class="form-control" name="item_name" placeholder="Item"></td>
                            <td><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-wa fa-minus"></i></button></td>
                          </tr>
                          @endif
                        </tbody>
                        <tfoot>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><button type="button" onclick="addItem();" class="btn btn-primary btn-sm"><i class="fa fa-wa fa-plus"></i></button></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
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

<!-- add dynamic related item -->
<script type="text/javascript">
  // attribute_item
  var attribute_item = <?php echo $attribute_item;?>;
  // addImage
  function addItem() {
    var html = '';
    html += '<tr id="attribute-row-item'+ attribute_item +'">';
      
      html += '<td>'+attribute_item+'</td>';
      html += '<td>';
        html += '<input type="text" class="form-control" name="item_name'+attribute_item+'" placeholder="Item Name">';

        html += '<input type="text" id="item_data'+attribute_item+'" name="item_data['+attribute_item+']["item_id"]">';
      html += '</td>';

      html += '<td><button type="button" onclick="$(\'#attribute-row-item' + attribute_item + '\').remove();" data-toggle="tooltip" title="Remove Image" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';

    html += '</tr>';
    $('#item_row tbody').append(html);
    attributeautocomplete(attribute_item);
    // $.eventallData(attribute_item);
    attribute_item++;
  }

  // attributeautocomplete
  function attributeautocomplete(attribute_item){
    // Category
    $('input[name=\'item_name'+attribute_item+'\']').autocomplete({
      'source': function(request, response) {
        // console.log(request);
        $.ajax({
          url: '{{url('')}}/admin/getItem'+getMenucode()+'filter_name=' +  encodeURIComponent(request),
          dataType: 'json',
          success: function(json) {
            response($.map(json, function(item) {
              console.log(item);
              return {
                label: item['name'],
                value: item['id']
              }
            }));
          }
        });
      },
      'select': function(item) {
        $('input[name="item_name'+attribute_item+'"]').val(item['label']);
        $('#item_data'+attribute_item+'').val(item['value']);
      }
    });

  }
</script>

