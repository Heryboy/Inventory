<form id="form-barcode" action="" method="patch">
  
  <!-- search-filter -->
  <div class="group-filter">
    <div class="row padding-top">
      <div>
        <div class="col-sm-3">
          <div class="input-prepend input-group">
            <span class="add-on input-group-addon"><i class="fa fa-list"></i></span>
            {!! Form::select('item_category_id', $ItemCategory, $item_category_id, ['placeholder' => trans('setup_mgr/item.choose_item_category'),'id'=>'item_category_id','class'=>'form-control']) !!}
          </div>
        </div>

        <div class="col-sm-3">
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
          <div class="input-prepend input-group">
            <span class="add-on input-group-addon"><i class="fa fa-list"></i></span>
            <select size="1" id="font_family" name="font_family" class="form-control"><option value="0" selected="selected">No Label</option><option value="Arial.ttf" selected="selected">Arial.ttf</option></select>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="input-prepend input-group">
            <span class="add-on input-group-addon"><i class="fa fa-list"></i></span>
            <input class="form-control" placeholder="Font Size" id="font_size" name="font_size" type="number" min="1" max="30" required="required" value="10">
          </div>
        </div>

        {{-- <div class="col-sm-2">
          <button type="button" id="initSearch"  class="btn btn-sm btn-primary"><i class="fa fa-wa fa-search"></i> {!!trans('item_mgr/item_barcode.entry_filter')!!}</button>
        </div> --}}
        
      </div>
    </div>

    <div class="row padding-top">
      <div>
        <div class="col-sm-3">
          <div class="input-prepend input-group">
            <span class="add-on input-group-addon"><i class="fa fa-list"></i></span>
            <?php 
              //echo getSelectHtml('type', $filename, $availableBarcodes); 
            ?>
            <select class="form-control" name="type">
              <option value="">--Select Symbology--</option>
              <option selected="" value="barcodegen/html/BCGcode39.php">Code 39</option>
              <option selected="" value="barcodegen/html/BCGcode128.php">Code 128</option>
            </select>
            {{-- <a class="info explanation" href="#"><img src="info.gif" alt="Explanation" /></a> --}}
          </div>
        </div>

        <div class="col-sm-3">
          <div class="input-prepend input-group">
            <span class="add-on input-group-addon"><i class="fa fa-list"></i></span>
            <select class="form-control" name="filetype">
              <option value="">--Select File Type--</option>
              <option selected="" value="PNG">PNG - Portable Network Graphics</option>
              <option value="JPEG">JPEG - Joint Photographic Experts Group</option>
              <option value="GIF">GIF - Graphics Interchange Format</option>
            </select>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="input-prepend input-group">
            <span class="add-on input-group-addon"><i class="fa fa-list"></i></span>
            {!! Form::number('dpi',72,['required' => 'required','placeholder'=>'DPI','min'=>72,'max'=>300,'class'=>'form-control']) !!}
          </div>
        </div>

        <div class="col-sm-3">
          <div class="input-prepend input-group">
            <span class="add-on input-group-addon"><i class="fa fa-list"></i></span>
            {!! Form::number('scale',2,['required' => 'required','placeholder'=>'Scale','min'=>1,'max'=>4,'class'=>'form-control']) !!}
          </div>
        </div>

        <div class="col-sm-3">
          <div class="input-prepend input-group">
            <span class="add-on input-group-addon"><i class="fa fa-list"></i></span>
            <input class="form-control" placeholder="Thickness" id="thickness" name="thickness" value="{{$thickness}}" type="number" min="20" max="90" step="5" required="required">
          </div>
        </div>

        <div class="col-sm-3">
          <div class="input-prepend input-group">
            <span class="add-on input-group-addon"><i class="fa fa-list"></i></span>
            <select class="form-control" name="rotation">
              <option value="">--Choose Rotation--</option>
              <option selected="" value="0">No rotation0</option>
              <option value="90">90&deg; clockwise</option>
              <option value="180">180&deg; clockwise</option>
              <option value="270">270&deg; clockwise</option>
            </select>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="input-prepend input-group">
            <span class="add-on input-group-addon"><i class="fa fa-list"></i></span>
            <select class="form-control" name="barcode_type">
              <option value="">--Starts with--</option>
              <option selected="" value="NULL">Auto</option>
              <option value="A">Code 128-A</option>
              <option value="B">Code 128-B</option>
              <option value="C">Code 128-C</option>
            </select>
          </div>
        </div>

        

        {{-- <div class="col-sm-2">
          <button type="button" id="initSearch"  class="btn btn-sm btn-primary"><i class="fa fa-wa fa-search"></i> {!!trans('item_mgr/item_barcode.entry_filter')!!}</button>
        </div> --}}
        
      </div>
    </div>
  </div>
</form>

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