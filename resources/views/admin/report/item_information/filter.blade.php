<!-- search-filter -->
<div class="group-filter">
  <div class="row padding-top">
    <div class="row">
      <div class="col-sm-12">
        <form method="put" id="form-search" action="{{url('admin/item_mgr/item_base_store/create')}}">
          
          <div class="col-sm-3">
            {{trans('report/item_information_report.entry_branch')}}
            {!! Form::select('branch_id', $Branch, null, ['id'=>'branch_id','class'=>'form-control']) !!}
          </div>
          <div class="col-sm-3">
            {{trans('report/item_information_report.entry_category')}}
            {!! Form::select('item_category_id', $ItemCategory, $item_category_id, ['placeholder' => trans('setup_mgr/item.choose_item_category'),'id'=>'item_category_id','class'=>'form-control']) !!}
          </div>

          <div class="col-sm-3">
            {{trans('report/item_information_report.entry_subcategory')}}
            <select id="item_sub_category_id" name="item_sub_category_id" class="form-control">
              <option>{!!trans('setup_mgr/item.choose_item_sub_category')!!}</option>
              @if(isset($ItemSubCategory) && $ItemSubCategory != '')
                @foreach($ItemSubCategory as $itemSubCat)
                  <option @if($itemSubCat->id==$_REQUEST['item_sub_category_id']) {{"selected='selected'"}} @endif value="{{$itemSubCat->id}}">{{$itemSubCat->name}}</option>
                @endforeach
              @endif
            </select>
          </div>
          <div class="col-sm-3">
            <br/>
            <button form-id="form-search" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-wa fa-search"></i> SEARCH</button>
            <a target="_blank" href="/admin/report/print_item_information?branch_id=<?php echo $branchid;?>&item_category_id=<?php echo $item_category_id;?>&item_sub_category_id=<?php echo $item_sub_category_id;?>&from_date=<?php echo $start_date;?>&to_date=<?php echo $end_date;?>" form-id="form-itembasestore" class="btn btn-sm btn-success"><i class="fa fa-wa fa-print"></i> {{trans('report/revenue_report.entry_print')}}</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  // item_category_id
  $(function(){
    $("#item_category_id").change(function(){
      var item_category_id = $(this).val();

      $.ajax({
          url: "{{url('admin/setup_mgr/getItemSubCategory')}}",
          dataType: "json",
          timeout: 3000,
          data: {
            item_category_id: item_category_id,
          },
          error: function(x, t, m) {
            if(t==="timeout") {
              // alert("got timeout");
            } else {
              // alert(t);
            }
            $(window).unbind('beforeunload');
          },
          success: function( data ) {
            var html='';
            console.log(data);
            if(data==""){
              html += '<option>{!!trans("setup_mgr/item.choose_item_sub_category")!!}</option>';
            }else{
              html += '<option>{!!trans("setup_mgr/item.choose_item_sub_category")!!}</option>';
              $.each(data, function(id, value){
                html += '<option value="'+value.id+'">';
                  html += value.name;  
                html += '</option>';
              });
            }

            // if(utc_default_time==1){
            //   var visible_utc = 'style="display: block;cursor: pointer;"';
            //   var visible_local = 'style="display: none;cursor: pointer;"';
            // }else if(utc_default_time==2){
            //   var visible_utc = 'style="display: none;cursor: pointer;"';
            //   var visible_local = 'style="display: block;cursor: pointer;"';
            // }
            // var utc_option='';

            // utc_option += '<a href="javascript:void();" onClick="initUTCTime(1)"><div id="local-time-title" class="utc-time-title" '+visible_local+'>Local Time<span class="pull-right"><i class="fa fa-wa fa-chevron-circle-right"></i></span></div></a>';

            // utc_option += '<a href="javascript:void();" onClick="initUTCTime(2)"><div id="utc-time-title" class="utc-time-title" '+visible_utc+'>UTC Time<span class="pull-right"><i class="fa fa-wa fa-chevron-circle-right"></i></span></div></a>';
            
            $("#item_sub_category_id").html(html);

          }
      });

    });
  });
</script>