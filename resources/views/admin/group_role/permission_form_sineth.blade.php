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

    {!! Form::open(['url' => 'admin/users_group_role_update','class'=>'form-horizontal']) !!}
      <!-- top navigation -->
      <div class="top_nav">
         <div class="nav_menu">
           <nav class="" role="navigation">
             <div class="nav toggle" style="margin-bottom:10px;">
               <a id="menu_toggle"><i class="fa fa-bars"></i></a>
             </div>
             <!-- block button -->
             <div class="pull-right" style="padding-top:10px;">
              <!-- action-top -->

              <button type="submit" data-original-title="{!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" class="btn btn-primary" name="submit" title="{!!trans('common.save')!!}"><i class="fa fa-wa fa-save"></i> <span class="hidden-xs">{!!trans('common.save')!!}</span></button>
              
              <a data-original-title="{!! trans('common.back_to_list') !!}"  data-toggle="tooltip" data-placement="top" href="{{url('admin/users_group_role')}}" class="btn btn-default"><i class="fa fa-wa fa-reply"></i> <span class="hidden-xs">{!!trans('common.back_to_list')!!}</span></a>

             </div> 
           </nav>
         </div>
      </div><!-- /top navigation -->
      <!-- page content -->
      <div style="min-height: 650px;" class="right_col" role="main">
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>{!! trans('users_group.users_group_form') !!}</h2>
                @include('admin.common.tool_box')
              </div>
              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                  <!-- col-sm-12 -->
                  <div class="col-sm-12">
                    <!-- error_message -->
                    @include('admin.common.error_input')
                    <div class="box-body">
                      <div class="sform-groudp">
                        <div style="padding-top:30px;">
                          <label class="col-sm-2 control-label" for="input-name">Permission Access</label>
                          <div class="col-sm-10">
                              <div class="well well-sm" style="height: 500px; overflow: auto;">
                                  <input type="hidden" name="id" value="<?php echo $GroupRole->id;?>">

                                  <?php
                                    $menu_arr='';
                                    $menu_id_arr='';
                                    $menu_parent_id_arr='';
                                    
                                    $group_id = $GroupRole->id;
                                    $menu = DB::table('group_role_detail')
                                            ->where('group_role_id','=',$group_id)
                                            ->get();
                                    
                                    foreach ($menu as $key => $value) {
                                        $menu_arr .= $value->menu_code.":";
                                        $menu_id_arr .= $value->menu_id.":";
                                        $menu_parent_id_arr .= $value->parent_menu_id.":";
                                       
                                    }
                                        
                                    $menu_sep = explode(':',$menu_arr);
                                    $menu_id_sep = explode(':',$menu_id_arr);
                                    $menu_parent_id_sep = explode(':',$menu_parent_id_arr);

                                    // parent_menu
                                    $parent_menus = DB::table("menu as m")
                                        ->JOIN('menu_description as md','m.id','=','md.menu_id')
                                        ->WHERE('m.parent_id',0)
                                        // ->WHERE('m.menu_type_id',$menu_type_id)
                                        ->WHERE('md.language_id',Session::get('applangId'))
                                        ->SELECT('m.id as id','m.parent_id as parent_id','m.menu_code as menu_code','m.fa_icon as fa_icon','m.menu_link as p_menu_link','md.name as parent_menu_name','m.id as parent_menu_id')
                                        ->OrderBy('m.ordering')
                                        ->get();

                                    foreach ($parent_menus as $key => $value) 
                                    {
                                      $mm_id='';
                                      $mmcode='';
                                      $mparent_id='';
                                      $read='';
                                      $write='';

                                      $mtitle = $value->parent_menu_name;
                                      $mcode = $value->menu_code;
                                      $mparent_id = $value->parent_id;
                                      $mid = $value->id;
                                      // dd($mcode);
                                      if(in_array($mcode, $menu_sep)){
                                        $mm_id = $value->id;
                                        $mmcode = $value->menu_code;

                                      }

                                      $read='';
                                      $write='';
                                      $reads = DB::table('group_role_detail')
                                                  ->where('menu_code',$mcode)
                                                  ->where('group_role_id',$group_id)
                                                  ->get();
                                      foreach ($reads as $read12){
                                        $read = $read12->read;
                                      }
                                      
                                      $writes = DB::table('group_role_detail')->where('menu_code','=',$mcode)->where('group_role_id','=',$group_id)->get();
                                      foreach ($writes as $writes12){
                                        $write = $writes12->write;
                                      }
                                    ?>
                                      <div class="col-sm-12">

                                        <div class="col-sm-4">
                                          <div style="font-size:16px;font-weight:bold;padding-top:10px;">
                                            <label>
                                              <input id="selecctall{{$mid}}" value="{{$mcode}}" <?php if(in_array($mcode, $menu_sep)){echo "checked='checked'";}?> name="menu_code[]" type="checkbox">&nbsp;&nbsp;{{$mtitle}}
                                              <p style="display:none;">
                                              <input class="chk_item{{$mid}} check_item_hidden{{$mid}}" type="checkbox" <?php if(in_array($mid, $menu_id_sep)){echo "checked='checked'";}?> value="{{$mid}}" name="menu_id[]" >
                                              <input class="chk_item{{$mid}} check_item_hidden{{$mid}}" type="checkbox" <?php if(in_array($mparent_id, $menu_parent_id_sep)){echo "checked='checked'";}?> value="{{$mparent_id}}" name="parent_menu_id[]" >
                                              </p>
                                            </label>
                                          </div>
                                        </div>

                                        <div style="font-size:16px;font-weight:bold;padding-top:10px;" class="col-sm-4">
                                          <label><input class="chk_item{{$mid}}" id="selecctall_read{{$mid}}" type="checkbox" <?php if($read==1){echo'checked="checked"';}?> name="chk_read[]" value="{{$mcode}}"> Read</label>
                                        </div>

                                        <div style="font-size:16px;font-weight:bold;padding-top:10px;margin-left: -20px;" class="col-sm-4">
                                          <label><input class="chk_item{{$mid}}" id="selecctall_write{{$mid}}" type="checkbox" <?php if($write==1){echo'checked="checked"';}?> name="chk_write[]" value="{{$mcode}}"> Write</label>
                                        </div>

                                      </div>

                                    <?php
                                      

                                    $submenu = DB::table("menu as m")
                                        ->JOIN('menu_description as md','m.id','=','md.menu_id')
                                        ->WHERE('m.parent_id',$mid)
                                        // ->WHERE('m.menu_type_id',$menu_type_id)
                                        ->WHERE('md.language_id',Session::get('applangId'))
                                        ->SELECT('m.id as id','m.parent_id as parent_id','m.menu_code as menu_code','m.fa_icon as fa_icon','m.menu_link as p_menu_link','md.name as parent_menu_name','m.id as parent_menu_id')
                                        ->OrderBy('m.ordering')
                                        ->get();
                                        
                                      //foreach ($submenu as $submenus) {
                                      foreach ($submenu as $key => $value) {
                                        $s_id='';
                                        $s_code='';
                                        $sread='';
                                        $swrite='';
                                        $s_parent_id='';

                                        $sid = $value->id;
                                        $smtitle = $value->parent_menu_name;
                                        $smcode = $value->menu_code;
                                        $sparent_id = $value->parent_id;
                                        
                                        if(in_array($smcode, $menu_sep)){
                                          $s_id = $value->id;
                                          $s_code = $value->menu_code;
                                          $s_parent_id = $value->parent_id;

                                          
                                          $sub_reads = DB::table('group_role_detail')->where('menu_code','=',$s_code)->where('group_role_id','=',$group_id)->get();

                                          foreach ($sub_reads as $sub_read){
                                            $sread = $sub_read->read;
                                          }
                                          
                                          $sub_writes = DB::table('group_role_detail')->where('menu_code','=',$s_code)->where('group_role_id','=',$group_id)->get();
                                          foreach ($sub_writes as $sub_write){
                                            $swrite = $sub_write->write;
                                          }


                                        }

                                        echo'
                                          <div class="col-sm-12" style="padding-left:50px;"> 
                                            <div class="checkbox">
                                              <div class="col-sm-4">';
                                    ?>    
                                            <label>
                                              <input id="chk_sub_menu{{$sid}}" class="chk_item{{$mid}}" value="{{$smcode}}" <?php if(in_array($smcode, $menu_sep)){echo "checked='checked'";}?> type="checkbox" name="menu_code[]"/> <?php echo $smtitle;?>
                                              <p style="display:none;">
                                                <input class="chk_sub_item{{$sid}} chk_item{{$mid}}" type="checkbox" <?php if(in_array($sid, $menu_id_sep)){echo "checked='checked'";}?> value="{{$sid}}" name="menu_id[]" >
                                                <input class="chk_sub_item{{$sid}} chk_item{{$mid}}" type="checkbox" <?php if(in_array($sparent_id, $menu_parent_id_sep)){echo "checked='checked'";}?> value="{{$sparent_id}}" name="parent_menu_id[]" >
                                              </p>
                                            </label>
                                    <?php
                                          echo'</div>';
                                    ?>
                                                <div class="col-sm-4">
                                                  <label><input class="chk_read_main{{$sid}} chk_item_read{{$mid}} chk_item{{$mid}}" type="checkbox" <?php if($sread==1){echo'checked="checked"';}?> name="chk_read[]" value="{{$smcode}}"></label>
                                                </div>
                                              
                                                <div class="col-sm-4">
                                                  <label><input class="chk_write_main{{$sid}} chk_item_write{{$mid}} chk_item{{$mid}}" type="checkbox" <?php if($swrite==1){echo'checked="checked"';}?> name="chk_write[]" value="{{$smcode}}"></label>
                                                </div>

                                                <script type="text/javascript">
                                                    //chk_sub_menu
                                                    $('#chk_sub_menu{{$sid}},.chk_read_main{{$sid}}').click(function(event) {  //on click
                                                      if(this.checked) { // check select status
                                                          $('.chk_read_main{{$sid}},#chk_sub_menu{{$sid}},.chk_sub_item{{$sid}},.chk_write_main{{$sid}},#selecctall{{$mid}},#selecctall_read{{$mid}},#selecctall_write{{$mid}},.check_item_hidden{{$mid}}').each(function() { //loop through each checkbox
                                                              this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                          });
                                                      }else{
                                                          $('.chk_read_main{{$sid}},#chk_sub_menu{{$sid}},.chk_sub_item{{$sid}},.chk_write_main{{$sid}}').each(function() { //loop through each checkbox
                                                              this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                                          });        
                                                      }
                                                    });

                                                    //selecctall_read_subMain
                                                    $('.chk_read_main{{$sid}}').click(function(event) {  //on click
                                                      if(this.checked) { // check select status
                                                          $('.chk_read{{$sid}}').each(function() { //loop through each checkbox
                                                              this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                          });
                                                      }else{
                                                          $('.chk_read{{$sid}}').each(function() { //loop through each checkbox
                                                              this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                                          });        
                                                      }
                                                    });
                                                    
                                                    //selecctall_write_subMain
                                                    $('.chk_write_main{{$sid}}').click(function(event) {  //on click
                                                      if(this.checked) { // check select status
                                                          $('.chk_write{{$sid}},#selecctall_write{{$mid}}').each(function() { //loop through each checkbox
                                                              this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                          });
                                                      }else{
                                                          $('.chk_write{{$sid}}').each(function() { //loop through each checkbox
                                                              this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                                          });        
                                                      }
                                                    });
                                                </script>

                                    <?php
                                          echo'</div>
                                            </div>
                                          ';
                                        }
                                    ?>
                                        <!--check and un check form-->
                                      <script>
                                        $(document).ready(function() {
                                          //SELECT
                                          $('#selecctall{{$mid}}').click(function(event) {  //on click
                                            if(this.checked) { // check select status
                                                $('.chk_item{{$mid}}').each(function() { //loop through each checkbox
                                                    this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                });
                                            }else{
                                                $('.chk_item{{$mid}}').each(function() { //loop through each checkbox
                                                    this.checked = false; //desfelect all checkboxes with class "checkbox1"                      
                                                });        
                                            }
                                          });
                                          //selecctall_read
                                          $('#selecctall_read{{$mid}}').click(function(event) {  //on click
                                            if(this.checked) { // check select status
                                                $('.chk_item_read{{$mid}},#selecctall{{$mid}},.chk_item{{$mid}}').each(function() { //loop through each checkbox
                                                    this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                });
                                            }else{
                                                $('.chk_item_read{{$mid}},#selecctall{{$mid}},.chk_item{{$mid}}').each(function() { //loop through each checkbox
                                                    this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                                });        
                                            }
                                          });

                                          //selecctall_write
                                          $('#selecctall_write{{$mid}}').click(function(event) {  //on click
                                            
                                            if(this.checked) { // check select status
                                                $('.chk_item_write{{$mid}},#selecctall{{$mid}},.chk_item{{$mid}}').each(function() { //loop through each checkbox
                                                    this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                });
                                            }else{
                                                $('.chk_item_write{{$mid}}').each(function() { //loop through each checkbox
                                                    this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                                });        
                                            }
                                          });

                                        });
                                      </script>

                                    <?php
                                      }
                                    ?>
                              </div>
                            <a onclick="$(this).parent().find(':checkbox').prop('checked', true);">Check All</a> / <a onclick="$(this).parent().find(':checkbox').prop('checked', false);">Uncheck All</a></div>
                        </div>
                      </div>   
                    </div><!-- /.box-body -->
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
    {!! Form::close() !!}
    <!-- /page content -->
  </div>

@endsection
