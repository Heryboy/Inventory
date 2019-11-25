@extends('admin.common.layout') 
@section('content')
<!-- header -->
@include('admin.common.header')
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
     @include('admin.common.sidebar')
    </div>

      {!! Form::open(['url' => 'setup/sale/quotation','files'=> true,'class'=>'form-horizontal']) !!}
  
      <!-- top navigation -->
      <div class="top_nav">
         <div class="nav_menu">
           <nav class="" role="navigation">
             <div class="nav toggle" style="margin-bottom:10px;">
               <a id="menu_toggle"><i class="fa fa-bars"></i></a>
             </div>
             <!-- block button -->
             <div class="pull-right" style="padding-top:10px;">
            
            
              <button type="submit" data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" class="btn btn-primary" name="submit" title="Save"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs">{!!trans('common.save')!!}</span></button>
          
               <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="" class="btn btn-default"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!!trans('common.back_to_list')!!}</span></a>

             </div> 
           </nav>
         </div>
      </div><!-- /top navigation -->
      <!-- page content -->
      <div style="min-height: 650px;" class="right_col" role="main">
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            @include('admin.common.error_input')
            <div class="x_panel">
              <div class="x_title">
                <h2><i class="fa fa-pencil"></i> Quotation Form</h2>
                 @include('admin.common.tool_box')
              </div>

                <!-- row -->
                <div class="row">
                  <div class="col-lg-6">  
                    <!-- x_content -->
                    <div class="x_content">
                      <!-- col-sm-12 -->
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Quote to:<span class="validate_label_red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          <select class="form-control">
                            <option>--Select Quote to--</option>
                            <option value="1">Agency</option>
                            <option value="2">Customer</option>
                          </select>
                        </div>
                      </div>  
                      
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Customer Name:<span class="validate_label_red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                             <!-- <select name="name" id="customer_id" class="form-control required">
                              </select> -->
                              {!! Form::select('customer_id', $ListCustomer, null,['optional'=>'Select a customer..','class'=>'form-control has-feedback-left','id'=>'customer_id']) !!}
                               <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Company:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                            <input class="form-control input-alt goods_data required" id="company" name="company" readonly="" value="" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Currency:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                            {!! Form::select('currency_id', $ListCurrency, null, ['placeholder' => 'Select a currency...','class'=>'form-control has-feedback-left']) !!}
                            <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="col-lg-6">  
                    <!-- x_content -->
                    <div class="x_content">
                      <!-- col-sm-12 -->
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No:<span class="validate_label_red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          <input class="form-control input-alt goods_data required" id="quote_no" readonly="" name="quote_no" value="" type="text">
                        </div>
                      </div>  

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Date:<span class="validate_label_red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          <input class="form-control input-alt goods_data required" id="issue_date" readonly="" name="issue_date" value="" type="text">
                        </div>
                      </div>  

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Expire Date:<span class="validate_label_red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          <input class="form-control input-alt goods_data required" id="expire_date" readonly="" name="expire_date" value="" type="text">
                        </div>
                      </div>  
                      
                     
                    </div>
                  </div>

                </div>

              </div>

            </div>
          </div>
        </div>

        <!-- footer content -->
        @include('admin.common.footer')
        <!-- /footer content -->
      </div>
      <!-- /page content -->
    {!! Form::close() !!}
  </div>
<script type="text/javascript">
  // select compnay name
  $(function(){
     $('#customer_id').change(function(){
        var customer_id = $('#customer_id').val();
        //alert(customer_id);
        $.ajax({
          url: "{{url('/setup/sale/quotation/get_company')}}",
          headers: {'X-CSRF-TOKEN':  "{{ csrf_token()}}"},
          type: 'POST',
          dataType: "json",
          data: {
              customer_id:customer_id
          },
          success: function(data){
            //alert("success");
            console.log(data);
            // alert(data['company_name']);
            $("#company").val(data.company_name);
          }
        });
     });
  });

  $(window).load(function(){
    $.ajax({
        url: "{{url('/setup/sale/quotation/get_quote_no')}}",
        dataType: "json",
        // data: {
        //     type:"CODE"
        // },
        success: function( data ) {
          alert('Hello world');
          console.log(data);
          response($.map(data, function(item) {
            return {
                //label: item.sender_name,
                //name: item.sender_name,
                //contact: item.contact,
                //id: item.id,
            }
          }));
        }
      });
  });

 
</script>

<script>
$(document).ready(function(){
    $("#test").change(function(){

      var url = $('#test').val();
       $("#map").attr("src", url);
        // alert(url);
    });
});
</script>
@endsection

