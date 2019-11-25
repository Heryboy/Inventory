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

    
    {!! Form::open(['url' => 'admin/users_group_role_update?group_role_id='.$group_role_id,'class'=>'form-horizontal']) !!}
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
                                <!-- foreach ($permissionOnMenu as $permission) -->
                                  <?php 
                                    $permission = $permissionOnMenu;
                                    $menu_arr='';
                                    $menu_id_arr='';
                                    $menu_parent_id_arr='';
                                  ?>

                                  @foreach($permission["group_role_detail_arr"] as $group_role_detail)
                                    <?php
                                      $menu_arr .= $group_role_detail['menu_code'].":";
                                      $menu_id_arr .= $group_role_detail['menu_id'].":";
                                      $menu_parent_id_arr .= $group_role_detail['menu_parent_id'].":";
                                    ?>
                                  @endforeach

                                  <?php
                                    $menu_sep = explode(':',$menu_arr);
                                    $menu_id_sep = explode(':',$menu_id_arr);
                                    $menu_parent_id_sep = explode(':',$menu_parent_id_arr);
                                  ?>

                                  @foreach($permission['parents_menu_arr'] as $parent_menu)
                                    <?php
                                      $mtitle = $parent_menu['parent_menu_name'];
                                      $mcode = $parent_menu['menu_code'];
                                      $mparent_id = $parent_menu['parent_id'];
                                      $mid = $parent_menu['mid'];
                                      $default = $parent_menu['default'];
                                      $read = $parent_menu['read'];
                                      $write = $parent_menu['write'];
                                    ?>
                                    <div class="col-sm-12">
                                      <div class="col-sm-4">
                                        <div style="font-size:16px;font-weight:bold;padding-top:10px;">
                                          @if($default==1)
                                          <label style="display: none;">
                                            <input checked="checked" id="selecctall{{$mid}}" value="{{$mcode}}" name="menu_code[]" type="checkbox">&nbsp;&nbsp;{{$mtitle}}
                                            <p style="display:none;">
                                            <input checked="checked" class="chk_item{{$mid}} check_item_hidden{{$mid}}" type="checkbox" value="{{$mid}}" name="menu_id[]" >
                                            <input checked="checked" class="chk_item{{$mid}} check_item_hidden{{$mid}}" type="checkbox" value="{{$mparent_id}}" name="parent_menu_id[]" >
                                            </p>
                                          </label>
                                          @else
                                          <label>
                                            <input id="selecctall{{$mid}}" value="{{$mcode}}" name="menu_code[]" <?php if(in_array($mcode, $menu_sep)){echo "checked='checked'";}?> type="checkbox">&nbsp;&nbsp;{{$mtitle}}
                                            <p style="display:none;">
                                            <input <?php if(in_array($mid, $menu_id_sep)){echo "checked='checked'";}?> class="chk_item{{$mid}} check_item_hidden{{$mid}}" type="checkbox" value="{{$mid}}" name="menu_id[]" >
                                            <input <?php if(in_array($mparent_id, $menu_parent_id_sep)){echo "checked='checked'";}?> class="chk_item{{$mid}} check_item_hidden{{$mid}}" type="checkbox" value="{{$mparent_id}}" name="parent_menu_id[]" >
                                            </p>
                                          </label>
                                          @endif
                                        </div>
                                      </div>
                                      @if($default==1)
                                        <span style="display: none;">
                                          <div style="font-size:16px;font-weight:bold;padding-top:10px;" class="col-sm-4">
                                            <label><input class="chk_item{{$mid}}" id="selecctall_read{{$mid}}" type="checkbox" checked="checked" name="chk_read[]" value="{{$mcode}}"> Read</label>
                                          </div>

                                          <div style="font-size:16px;font-weight:bold;padding-top:10px;margin-left: -20px;" class="col-sm-4">
                                            <label><input class="chk_item{{$mid}}" id="selecctall_write{{$mid}}" type="checkbox" checked="checked" name="chk_write[]" value="{{$mcode}}"> Write</label>
                                          </div>
                                        </span>
                                      @else
                                        <div style="font-size:16px;font-weight:bold;padding-top:10px;" class="col-sm-4">
                                          <label><input class="chk_item{{$mid}}" id="selecctall_read{{$mid}}" type="checkbox" <?php if($read==1){echo'checked="checked"';}?> name="chk_read[]" value="{{$mcode}}"> Read</label>
                                        </div>

                                        <div style="font-size:16px;font-weight:bold;padding-top:10px;margin-left: -20px;" class="col-sm-4">
                                          <label><input class="chk_item{{$mid}}" id="selecctall_write{{$mid}}" type="checkbox" <?php if($write==1){echo'checked="checked"';}?> name="chk_write[]" value="{{$mcode}}"> Write</label>
                                        </div>
                                      @endif
                                    </div>

                                    @foreach($parent_menu['sub_menus'] as $sub_menu)
                                      <?php 
                                        $s_id='';
                                        $s_code='';
                                        $sread='';
                                        $swrite='';
                                        $s_parent_id='';
                                        $sparent_id = $sub_menu['s_parent_id'];
                                        $sid = $sub_menu['s_mid'];
                                        $smtitle = $sub_menu['s_menu_name'];
                                        $smcode = $sub_menu['s_menu_code'];
                                        $sread = $sub_menu['s_read'];
                                        $swrite = $sub_menu['s_write'];
                                      ?>

                                      <div class="col-sm-12" style="padding-left:50px;">

                                        <div class="checkbox">

                                          <div class="col-sm-4">
                                            <label>
                                              <input id="chk_sub_menu{{$sid}}" class="chk_item{{$mid}}" value="{{$smcode}}" <?php if(in_array($smcode, $menu_sep)){echo "checked='checked'";}?> type="checkbox" name="menu_code[]"/> <?php echo $smtitle;?>
                                              <p style="display:none;">
                                                <input class="chk_sub_item{{$sid}} chk_item{{$mid}}" type="checkbox" <?php if(in_array($sid, $menu_id_sep)){echo "checked='checked'";}?> value="{{$sid}}" name="menu_id[]" >
                                                <input class="chk_sub_item{{$sid}} chk_item{{$mid}}" type="checkbox" <?php if(in_array($sparent_id, $menu_parent_id_sep)){echo "checked='checked'";}?> value="{{$sparent_id}}" name="parent_menu_id[]" >
                                              </p>
                                            </label>
                                          </div>

                                          <div class="col-sm-4">
                                            <label><input class="chk_read_main{{$sid}} chk_item_read{{$mid}} chk_item{{$mid}}" type="checkbox" <?php if($sread==1){echo'checked="checked"';}?> name="chk_read[]" value="{{$smcode}}"></label>
                                          </div>

                                          <div class="col-sm-4">
                                            <label><input class="chk_write_main{{$sid}} chk_item_write{{$mid}} chk_item{{$mid}}" type="checkbox" <?php if($swrite==1){echo'checked="checked"';}?> name="chk_write[]" value="{{$smcode}}"></label>
                                          </div>

                                          <!-- sreyleak add more sub menu -->
                                          @foreach($sub_menu['sub_menus'] as $sub_sub_menu)

                                            <?php
                                              $sub_s_id='';
                                              $sub_s_code='';
                                              $sub_sread='';
                                              $sub_swrite='';
                                              $sub_s_parent_id='';
                                              $child_sub_sparent_id = $sid;
                                              $child_sub_sid = $sub_sub_menu['s_mid'];
                                              $child_sub_smtitle = $sub_sub_menu['s_menu_name'];
                                              $child_sub_smcode = $sub_sub_menu['s_menu_code'];
                                              $child_sub_sread = $sub_sub_menu['s_read'];
                                              $child_sub_swrite = $sub_sub_menu['s_write'];
                                            ?>

                                            <div class="col-sm-12" style="padding-left:50px;"> 
                                              <div class="checkbox">
                                                <div class="col-sm-4">
                                                  <label>
                                                    <input id="chk_sub_sub_menu{{$child_sub_sid}}" class="chk_sub_item{{$child_sub_sid}}" value="{{$child_sub_smcode}}" <?php if(in_array($child_sub_smcode, $menu_sep)){echo "checked='checked'";}?> type="checkbox" name="menu_code[]"/> <?php echo $child_sub_smtitle;?>
                                                    <p style="display:none;">
                                                      <input class="ch_child_sub_menu{{$child_sub_sid}} chk_sub_item{{$child_sub_sid}}" type="checkbox" <?php if(in_array($child_sub_sid, $menu_id_sep)){echo "checked='checked'";}?> value="{{$child_sub_sid}}" name="menu_id[]" >
                                                      <input class="ch_child_sub_parent_menu{{$child_sub_sid}} chk_sub_item{{$child_sub_sid}}" type="checkbox" <?php if(in_array($child_sub_sid, $menu_parent_id_sep)){echo "checked='checked'";}?> value="{{$child_sub_sid}}" name="parent_menu_id[]" >
                                                    </p>
                                                  </label>
                                                </div>
                                                <div class="col-sm-4">
                                                  <label><input class="chk_read_sub_main{{$child_sub_sid}} chk_item_sub_read{{$child_sub_sid}}" type="checkbox" <?php if($child_sub_sread==1){echo'checked="checked"';}?> name="chk_read[]" value="{{$child_sub_smcode}}"></label>
                                                </div>
                                                <div class="col-sm-4">
                                                  <label><input class="chk_write_sub_main{{$child_sub_sid}} chk_item_sub_write{{$child_sub_sid}}" type="checkbox" <?php if($child_sub_swrite==1){echo'checked="checked"';}?> name="chk_write[]" value="{{$child_sub_smcode}}"></label>
                                                </div>

                                              </div>
                                            </div>

                                            <!-- ####script_check_group_check_sub_child_menu-->
                                            <script type="text/javascript">
                                              //chk_sub_menu
                                              $('#chk_sub_sub_menu{{$child_sub_sid}}').click(function(event) {  //on click
                                                if(this.checked) { // check select status
                                                  $('.chk_read_sub_main{{$child_sub_sid}},.chk_write_sub_main{{$child_sub_sid}},.ch_child_sub_menu{{$child_sub_sid}},.ch_child_sub_parent_menu{{$child_sub_sid}}').each(function() { //loop through each checkbox
                                                    this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                  });
                                                }else{
                                                  $('.chk_read_sub_main{{$child_sub_sid}},.chk_write_sub_main{{$child_sub_sid}},.ch_child_sub_menu{{$child_sub_sid}},.ch_child_sub_parent_menu{{$child_sub_sid}}').each(function() { //loop through each checkbox
                                                    this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                                  });        
                                                }
                                              });

                                              //selecctall_read_subMain
                                              $('.chk_read_sub_main{{$child_sub_sid}}').click(function(event) {  //on click
                                                if(this.checked) { // check select status
                                                  $('#chk_sub_sub_menu{{$child_sub_sid}},.chk_write_sub_main{{$child_sub_sid}},.ch_child_sub_menu{{$child_sub_sid}},.ch_child_sub_parent_menu{{$child_sub_sid}}').each(function() { //loop through each checkbox
                                                    this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                  });
                                                }else{
                                                  $('#chk_sub_sub_menu{{$child_sub_sid}},.chk_write_sub_main{{$child_sub_sid}},.ch_child_sub_menu{{$child_sub_sid}},.ch_child_sub_parent_menu{{$child_sub_sid}}').each(function() { //loop through each checkbox
                                                    this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                                  });        
                                                }
                                              });
                                              
                                              // //selecctall_write_subMain
                                              $('.chk_write_sub_main{{$child_sub_sid}}').click(function(event) {  //on click
                                                if(this.checked) { // check select status
                                                  $('.check_item_hidden{{$child_sub_sid}},.ch_child_sub_menu{{$child_sub_sid}},.ch_child_sub_parent_menu{{$child_sub_sid}}').each(function() { //loop through each checkbox
                                                    this.checked = true;  //select all checkboxes with class "checkbox1"              
                                                  });
                                                }else{
                                                  $('.check_item_hidden{{$child_sub_sid}},.ch_child_sub_menu{{$child_sub_sid}},.ch_child_sub_parent_menu{{$child_sub_sid}}').each(function() { //loop through each checkbox
                                                    this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                                                  });        
                                                }
                                              });
                                            </script>

                                          @endforeach
                                          <!--  end  -->

                                          <!-- ####script_check_group_check_child_menu-->
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

                                        </div>
                                      </div>
                                    @endforeach

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

                                  @endforeach
                                <!-- endforeach -->
                              </div>
                              <a onclick="$(this).parent().find(':checkbox').prop('checked', true);">Check All</a> | 
                              <a onclick="$(this).parent().find(':checkbox').prop('checked', false);">Uncheck All</a></div>

                              
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

   <!--check and un check form-->
                                      

@endsection
