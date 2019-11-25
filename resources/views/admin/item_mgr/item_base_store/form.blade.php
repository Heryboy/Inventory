@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
      @include('admin.item_mgr.item_base_store.sidebar')
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
    <div class="right_col" role="main">
      
      <!-- row -->
      <div class="row">
        @include('admin.common.message')
        <div class="col-sm-12">
          @include("admin.item_mgr.item_base_store.filter")
        </div>
        {!! Form::open(['url' => 'admin/item_mgr/item_base_store','id'=>'form-itembasestore','class'=>'form-horizontal']) !!}
          <!-- col-sm-4 -->
          <div class="col-sm-3">
            <div class="x_panel">
              <div class="x_content">
                <div class="row">
                  <div style="border-bottom:1px solid #eee;"><i class="fa fa-wa fa-list"></i> Item List</div>
                
                  <table id="arribute-item" class="table table-bordered table-striped responsive-utilities jambo_table">
                    <thead>
                      <th>#</th>
                      <th>Category</th>
                      <th>Code</th>
                      <th>Item Name</th>
                    </thead>
                    <tbody>

                      @if(isset($items))
                        @foreach($items as $item)
                          <tr id="attribute-row{{$item->id}}" class="initRowItem" data-id="{{$item->id}}" data-catid="{{$item->ItemCategory->id}}" data-cat="{{$item->ItemCategory->item_category_name}}" data-code="{{$item->item_code}}" data-name="{{$item->name}}" class="even pointer">
                            <td><i class="fa fa-wa fa-play"></i></td>
                            <td>{{$item->ItemCategory->item_category_name}}</td>
                            <td>{{$item->item_code}}</td>
                            <td>{{$item->name}}</td>
                          </tr>
                        @endforeach
                      @endif

                    </tbody>
                  </table>  
                
                </div>
              </div>
            </div>
          </div>

          <!-- col-md-8 col-xs-8 -->
          <div class="col-sm-9">
            <div class="x_panel">
              <input type="hidden" name="hidden_branch_id" value="" />
              <input type="hidden" name="hidden_category_id" value="" />
              <!-- x_content -->
              <div class="x_content">
                <div style="border-bottom:1px solid #eee;"><i class="fa fa-wa fa-list"></i> Item Assign Listing</div>
                <div class="clearfix"></div>
                {{-- <div style="padding-top:10px;"></div> --}}
                {{-- <div class="pull-left title-label">
                  <div class="row">
                    <div class="col-sm-6">
                      {!! Form::select('brand_id', $Branch, null, ['placeholder' => trans('item_mgr/item_base_store.entry_select_branch'),'id'=>'brand_id','class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-6">
                      {!! Form::select('category_id', $item_category, null, ['placeholder' => trans('item_mgr/item_base_store.entry_all_category'),'id'=>'brand_id','class'=>'form-control']) !!}
                    </div>
                  </div>
                </div>
                <div class="pull-right">
                  <button class="btn btn-xs btn-primary"><i class="fa fa-wa fa-reply"></i> {{trans('item_mgr/item_base_store.back_to_list')}}</button>
                  <button class="btn btn-xs btn-success"><i class="fa fa-wa fa-save"></i> {{trans('item_mgr/item_base_store.save')}}</button>
                  <button class="btn btn-xs btn-danger"><i class="fa fa-wa fa-trash"></i> {{trans('item_mgr/item_base_store.delete')}}</button>
                </div> --}}
                <table id="attribute-assign" class="table table-bordered table-striped responsive-utilities jambo_table">
                <!-- <table id="example1" class="table table-bordered table-striped dataTable"> -->
                  <thead>
                    <tr>
                      <th>Category</th>
                      <th>Barcode</th>
                      <th>Item Name</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($itemBaseStore))
                      @foreach($itemBaseStore as $row)
                        <tr id="attr-row{{$row->item_id}}">
                          <td>{{$row->ItemCategory->item_category_name}}</td>
                          <td>{{$row->Item->item_code}}</td>
                          <td>
                            {{$row->Item->name}}
                            <input type="hidden" value="{{$row->item_id}}" name="item_id[]"/>
                          </td>
                          <td>
                            <center>
                              <button type="button" onClick="initRemoveRow({{$row->item_id}},{{$row->item_category_id}},'{{$row->ItemCategory->item_category_name}}','{{$row->Item->item_code}}','{{$row->Item->name}}');" class="btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                            </center>
                          </td>
                        </tr>
                      @endforeach
                    @endif
                    {{-- <tr><td colspan="3"><center>No record found!</center></td></tr>                   --}}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        {!! Form::close() !!}
      </div>
        
      <!-- /page content -->

      <!-- footer content -->
      @include('admin.common.footer')
      <!-- /footer content -->

    </div>
  </div>


  <script type="text/javascript">
    $(".initRowItem").click(function(){
      var itemID = $(this).data('id');
      var itemcatID = $(this).data('catid');
      var itemcat = $(this).data('cat');
      var itemcode = $(this).data('code');
      var itemname = $(this).data('name');
        
      $("#attribute-row"+itemID+"").remove();

      var html = "";
      html += '<tr id="attr-row'+itemID+'">';
        html += '<td>'+itemcat+'</td>';
        html += '<td>'+itemcode+'</td>';
        html += '<td>'+itemname+'<input type="hidden" value="'+itemID+'" name="item_id[]"/></td>';
        html += '<td><center><button onClick="initRemoveRow('+itemID+','+itemcatID+',\'' + itemcat + '\',\'' + itemcode + '\',\'' + itemname + '\');" data-id="'+itemID+'" data-catid="'+itemcatID+'" data-cat="'+itemcat+'" data-code="'+itemcode+'" data-name="'+itemname+'" type="button" class="btn btn-danger btn-xs"><i class="fa fa-wa fa-minus"></i></button></center></td>';
      html += '</tr>';
      $("#attribute-assign tbody").append(html);
    });

    function initRemoveRow(itemID,itemcatID,itemcat,itemcode,itemname){
      $("#attr-row"+itemID+"").remove();
      var html ="";
      html +='<tr id="attribute-row'+itemID+'" onClick="initRowItemFuc('+itemID+','+itemcatID+',\'' + itemcat + '\',\'' + itemcode + '\',\'' + itemname + '\');" data-id="'+itemID+'" data-catid="'+itemcatID+'" data-cat="'+itemcat+'" data-code="'+itemcode+'" data-name="'+itemname+'">';
        html +='<td><i class="fa fa-wa fa-play"></i></td>';
        html +='<td>'+itemcat+'</td>';
        html +='<td>'+itemcode+'</td>';
        html +='<td>'+itemname+'</td>';
      html +='</tr>';
      $("#arribute-item tbody").append(html);
      
    }

    function initRowItemFuc(itemID,itemcatID,itemcat,itemcode,itemname){
      $("#attribute-row"+itemID+"").remove();
      var html = "";
      html += '<tr id="attr-row'+itemID+'">';
        html += '<td>'+itemcat+'</td>';
        html += '<td>'+itemcode+'</td>';
        html += '<td>'+itemname+'<input type="hidden" value="'+itemID+'" name="item_id[]"/></td>';
        html += '<td><center><button onClick="initRemoveRow('+itemID+','+itemcatID+',\'' + itemcat + '\',\'' + itemcode + '\',\'' + itemname + '\');" data-id="'+itemID+'" data-catid="'+itemcatID+'" data-cat="'+itemcat+'" data-code="'+itemcode+'" data-name="'+itemname+'" type="button" class="btn btn-danger btn-xs"><i class="fa fa-wa fa-minus"></i></button></center></td>';
      html += '</tr>';
      $("#attribute-assign tbody").append(html);
    }

    // filter onChange
    $("select[name='branch_id']").change(function(){
      var branch_id = $(this).val();
      $("input[name='hidden_branch_id']").val(branch_id);
    });
    $("select[name='category_id']").change(function(){
      var category_id = $(this).val();
      $("input[name='hidden_category_id']").val(category_id);
    });
    $(window).load(function(){
      var branch_id = $("select[name='branch_id'").val();
      $("input[name='hidden_branch_id']").val(branch_id);

      var category_id = $("select[name='category_id'").val();
      $("input[name='hidden_category_id']").val(category_id);
    });
  </script>

@endsection
