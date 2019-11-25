@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  <!-- main-container -->
  <div class="main_container">

    <!-- page content -->
      <div role="main">
        <div class="">
           <!--  <div class="x_panel">
            </div> -->

            <!-- row -->
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  @include('admin.common.error_input')
                  @include('admin.common.message')
                  <div class="x_title">
                    <div class="row">
                      <center><div style="font-weight: bold;font-size:30px;">{!!trans('transfer/transfer.entry_transfer_form')!!}</div></center>
                    </div>
                  </div>

                  @if(!isset($Transfer))
                    {!! Form::open(['url' => 'admin/transfer','class'=>'form-horizontal']) !!}
                  @else
                    {!! Form::model($Transfer,['method' => 'PATCH','class'=>'form-horizontal','route'=>['admin.transfer.update',$Transfer->id]]) !!}
                  @endif

                    <!-- x_content -->
                    <div class="x_content">
                      <div class="_x_title">
                        <div class="row">

                          <!-- col-sm-4 -->
                          <div class="col-sm-4">

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-calendar"></i> {!!trans('transfer/transfer.entry_transfer_no')!!} <span class="validate-required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                @if(isset($Transfer))
                                  {!! Form::text('transfer_number',$Transfer->transfer_no,['disabled'=>'disabled','class'=>'form-control','placeholder'=>trans("transfer/transfer.entry_transfer_no")]) !!}
                                <input type="hidden" value="{{$Transfer->transfer_no}}" name="transfer_no"/>
                                @else
                                  {!! Form::text('transfer_number',$TransferSequence,['disabled'=>'disabled','class'=>'form-control','placeholder'=>trans("transfer/transfer.entry_transfer_no")]) !!}
                                <input type="hidden" value="{{$TransferSequence}}" name="transfer_no"/>
                                @endif
                                
                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-calendar"></i> {!!trans('transfer/transfer.entry_transfer_date')!!} <span class="validate-required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                @if(isset($Transfer))
                                  {!! Form::text('transfer_date',$Transfer->transfer_date,['class'=>'date-picker form-control','placeholder'=>trans("transfer/transfer.entry_transfer_date")]) !!}
                                @else
                                  {!! Form::text('transfer_date',$current_date,['class'=>'date-picker form-control','placeholder'=>trans("transfer/transfer.entry_transfer_date")]) !!}
                                @endif
                                
                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-list"></i> {!!trans('transfer/transfer.entry_transfer_form')!!} <span class="validate-required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                @if(isset($Transfer))
                                  {!! Form::select('from_branch_id', $Branches, null, ['placeholder' => trans('transfer/transfer.choose_from_branch'),'id'=>'customer_id','class'=>'form-control']) !!}
                                @else
                                  {!! Form::select('from_branch_id', $Branches, $default_branch, ['placeholder' => trans('transfer/transfer.choose_from_branch'),'id'=>'customer_id','class'=>'form-control']) !!}
                                @endif
                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-list"></i> {!!trans('transfer/transfer.entry_transfer_to')!!} <span class="validate-required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              {!! Form::select('to_branch_id', $Branches, null, ['placeholder' => trans('transfer/transfer.choose_to_branch'),'id'=>'customer_id','class'=>'form-control']) !!}
                              </div>
                            </div>

                          </div>

                          <!-- col-sm-4 -->
                          <div class="col-sm-4">

                            <!-- <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-list"></i> {!!trans('transfer/transfer.entry_voucher_no')!!}</label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                {!! Form::text('voucher_no',null,['class'=>'form-control','placeholder'=>trans("transfer/transfer.entry_voucher_no")]) !!}
                              </div>
                            </div> -->

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-list"></i> {!!trans('transfer/transfer.entry_transferor')!!} <span class="validate-required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                {!! Form::text('transferor',null,['class'=>'form-control','required'=>'required','placeholder'=>trans("transfer/transfer.entry_transferor")]) !!}
                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-list"></i> {!!trans('transfer/transfer.entry_receiver')!!} <span class="validate-required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                {!! Form::text('receiver',null,['class'=>'form-control','required'=>'required','placeholder'=>trans("transfer/transfer.entry_receiver")]) !!}
                              </div>
                            </div>

                            <div class="-form-group">
                              <label class="-control-label col-md-5 col-sm-5 col-xs-12 pull-left"><i class="fa fa-wa fa-list"></i> {!!trans('transfer/transfer.entry_description')!!}</label>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                {!! Form::textarea('description',null,['rows'=>'1','class'=>'form-control','placeholder'=>trans("transfer/transfer.entry_description")]) !!}
                              </div>
                            </div>

                          </div>

                          <!-- col-sm-4 -->
                          <div class="col-sm-4">
                            <div class="table-responsive">
                              <table class="table table-bordered table-striped dataTable">
                                <tbody>
                                  <tr>
                                    <th colspan="2">Option :</th>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label>
                                        @if(isset($Transfer))
                                          <input type="checkbox" @if($Transfer->is_transfered==1) checked="" @endif class="flat" name="is_transfered"> {!!trans('transfer/transfer.entry_is_transfered')!!}
                                        @else
                                          <input type="checkbox" class="flat" name="is_transfered"> {!!trans('transfer/transfer.entry_is_transfered')!!}
                                        @endif
                                      </label>
                                    </td>
                                    <td>
                                      <label>
                                        @if(isset($Transfer))
                                          <input type="checkbox" @if($Transfer->is_received==1) checked="" @endif class="flat" name="is_received"> {!!trans('transfer/transfer.entry_is_received')!!}
                                        @else
                                          <input type="checkbox" class="flat" name="is_received"> {!!trans('transfer/transfer.entry_is_received')!!}
                                        @endif
                                        
                                      </label>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <!-- form></form> class="form-horizontal form-label-left input_mask">
                              <div class="-form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Sub Total</label>
                                <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                                  <input class="form-control pull-right" id="inputSuccess2" placeholder="$00.00" type="text">
                                </div>
                              </div>

                              <div class="-form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Discount Item</label>
                                <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                                  <input class="form-control pull-right" id="inputSuccess2" placeholder="$00.00" type="text">
                                </div>
                              </div>

                              <div class="-form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Discount Sub Total</label>
                                <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                                  <input class="form-control pull-right" id="inputSuccess2" placeholder="$00.00" type="text">
                                </div>
                              </div>
                            </form> -->
                          </div>

                        </div>
                        <div class="clearfix"></div>
                      </div>

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                          <button data-original-title="{!!trans('transfer/transfer.entry_save')!!}"  data-toggle="tooltip" class="btn btn-sm btn-success pull-right" name="submit" type="submit"><i class="fa fa-save"></i> Save</button>
                          <a data-original-title="{!!trans('transfer/transfer.entry_back_to_list')!!}"  data-toggle="tooltip" type="button" data-placement="top" href="{{url('admin/transfer')}}" class="btn btn-sm btn-default pull-right"  style="margin-right: 5px;"><i class="fa fa-reply"></i> {!!trans('transfer/transfer.entry_back_to_list')!!}</a>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">

                          <!-- content -->
                          <!-- ############# -->
                          <!-- Table row -->
                          <div class="row">
                            

                            <div class="col-xs-12 table">
                              <?php $attribute_row = 0;?>
                                <table id="item_row" class="table table-bordered table-striped dataTable">
                                  <thead>
                                    <tr>
                                      <th>{!!trans('transfer/transfer.entry_barcode')!!}</th>
                                      <th>{!!trans('transfer/transfer.entry_item_name')!!}</th>
                                      <th>{!!trans('transfer/transfer.entry_unit')!!}</th>
                                      <th>{!!trans('transfer/transfer.entry_quantity')!!}</th>
                                      <!-- <th>{!!trans('transfer/transfer.entry_total')!!}</th> -->
                                      <th>{!!trans('transfer/transfer.entry_remark')!!}</th>
                                      <th>{!!trans('transfer/transfer.entry_action')!!}</th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                    <?php $attribute_row = 0;?>
                                    @if(isset($TransferDetail))
                                      @foreach($TransferDetail as $row)
                                        <tr id="attribute-row-item{{$attribute_row}}">
                                          <td><div id="group_barcode{{$attribute_row}}">{!! Form::text("barcode[]",$row->Item->item_barcode,["class"=>"form-control","id"=>"item_barcode","disabled"=>"","placeholder"=>trans("stock_mgr/purchase_order.entry_barcode")]) !!}</div></td>
                                          <td width="150px">
                                            <div id="group_item{{$attribute_row}}">{!! Form::select("item_id[]", $Items, $row->item_id, ["placeholder" => trans("stock_mgr/purchase_order.choose_item"),"id"=>"item_id","data-id"=>$attribute_row,"class"=>"item_id form-control"]) !!}</div>
                                          </td>
                                          <td width="150px">
                                            {!! Form::select("unit_id[]", $Units, $row->unit_id, ["placeholder" => trans("stock_mgr/purchase_order.choose_unit"),"id"=>"unit","class"=>"form-control"]) !!}
                                          </td>

                                          <td id="group_qty{{$attribute_row}}">
                                            <input name="qty[]" onblur="setTotal({{$attribute_row}});" type="text" class="form-control" value="{{$row->qty}}" placeholder="{!!trans("stock_mgr/purchase_order.entry_price_quantity")!!}">
                                          </td>

                                          <!-- <td id="group_total{{$attribute_row}}">{!! Form::text("total[]",$row->total,["class"=>"form-control total","id"=>"total","placeholder"=>trans("stock_mgr/purchase_order.entry_price_total")]) !!}</td> -->

                                          <td>{!! Form::text("remark[]",$row->remark,["class"=>"form-control","placeholder"=>trans("stock_mgr/purchase_order.entry_price_remark")]) !!}</td>

                                          <td><button type="button" onclick="$('#attribute-row-item{{$attribute_row}}').remove();" data-toggle="tooltip" title="{!!trans("stock_mgr/purchase_order.entry_remove")!!}" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>
                                          <input type="hidden" value="2" id="data_length" name="data_length">
                                        </tr>
                                      <?php $attribute_row++;?>
                                      @endforeach
                                    @endif
                                    
                                  </tbody>

                                  <tfoot>
                                    <tr>
                                      <td colspan="5">&nbsp;</td>
                                      <td>
                                        <button type="button" data-toggle="tooltip" data-placement="top" title="{!!trans('stock_mgr/purchase_order.entry_add')!!}" onclick="addItem();" class="btn btn-primary btn-sm"><i class="fa fa-wa fa-plus"></i></button>
                                      </td>
                                    </tr>
                                  </tfoot>

                                </table>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                          <!-- ############### -->
                        </div>
                      </div>
                    </div>

                  {!! Form::close() !!}

                </div>
              </div>

            </div>

        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('admin.common.footer')
        <!-- /footer content -->
        @include('admin.transfer.script')
      </div>
    <!-- /page content -->
  </div>
@endsection
