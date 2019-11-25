@extends('admin.common.layout') 
@section('content')
  <!-- header -->
  @include('admin.common.header')
  <form novalidate="" action="#" id="demo-form2" data-parsley-validate="" class="">
    
    <!-- main-container -->
    <div class="main_container">
      <!-- col-md-3 -->
      <div class="col-md-3 left_col">
       @include('admin.common.sidebar')
      </div>
      <!-- top navigation -->
      <div class="top_nav">
         <div class="nav_menu">
           <nav class="" role="navigation">
             <div class="nav toggle" style="margin-bottom:10px;">
               <a id="menu_toggle"><i class="fa fa-bars"></i></a>
             </div>
             <!-- block button -->
             <div class="pull-right" style="padding-top:10px;">
              <!-- action top -->
              <!-- <a data-original-title="!! trans('common.create') !!}"  data-toggle="tooltip" data-placement="top" href='{{url('admin/setup_mgr/aircraft/create')}}' class="btn btn-primary" name="submit"><i class="fa fa-wa fa-plus"></i> <span class="hidden-xs">{!! trans('common.create') !!}</span></a> -->

              <!-- <a data-original-title="!! trans('common.delete') !!}"  data-toggle="tooltip" data-placement="top" href='#' class="btn btn-danger" name="submit"><i class="fa fa-wa fa-trash"></i> <span class="hidden-xs">{!! trans('common.delete') !!}</span></a> -->
             </div> 
           </nav>
         </div>
      </div><!-- /top navigation -->
      <!-- page content -->
      <div style="min-height: 650px;" class="right_col" role="main">
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            @include('admin.common.message')
            <div class="x_panel">
              <div class="x_title">
                <h2>Flight Notification Lists</h2>
                @include('admin.common.tool_box')
              </div>

              <!-- row -->
              <div class="row">
                <!-- x_content -->
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                       <?php $i = 1;?>
                      @foreach($notification_flight as $data)
                        <li role="presentation" class="">
                            <a href="#tab_content{{$i}}" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">
                                {{$data['notification_group']}}
                               <span class="badge bg-red ">{{$data['total_notification']}}</span>
                             
                            </a>

                        </li>
                      <?php $i++; ?>

                     @endforeach
                    </ul>
                    <div id="myTabContent" class="tab-content">
                       <?php $i = 1;?>
                    @foreach($notification_flight as $data)
                    <?php
                     $active="";
                     if($i==1){
                        $active = 'active';
                     }
                    ?>
                        <div role="tabpanel" class="tab-pane fade {{$active}} in"  id="tab_content<?php echo $i;?>" aria-labelledby="home-tab">
                          <table id="" class="table table-striped responsive-utilities jambo_table bulk_action dataTable no-footer">
                            <thead>
                              <tr>
                                <th>{!!trans('common.no')!!}</th>
                                <th>Notification Group</th>
                                <th>Crew</th>
                                <th>{!!trans('common.action')!!}</th>
                              </tr>
                            </thead>
                            <tbody>
                            
                                 @foreach($data['notifications'] as $d)
                                 <td>{{$i}}</td>
                                 <td>{{$d['notification_name']}}</td>
                                 <td>{{$d['url']}}</td>
                                 <td></td>
                                 @endforeach

                            </tbody>
                          </table>
                      </div>
                      <?php $i++;?>
                    @endforeach

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
    </div>

  </form>

@endsection

