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
                <button type="submit" form="form-backup" data-toggle="tooltip" title="Export" class="btn btn-primary"><i class="fa fa-download"></i> Export</button>
                <button type="submit" form="form-restore" data-toggle="tooltip" title="Import" class="btn btn-primary"><i class="fa fa-upload"></i> Import</button>

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
                  <h2>Import/Export</h2>
                  @include('admin.common.tool_box')
                </div>

                <!-- row -->
                <div class="row">
                  <!-- x_content -->
                  <div class="x_content">

                    {!! Form::open(['url' => 'admin/tool_mgr/restore','files'=> true,'class'=>'form-horizontal','id' => 'form-restore']) !!}
                      <!-- form -->
                      <div class="form-group">
                        <div class="form-group">
                          <label class="col-sm-2 control-label" for="input-import">Import</label>
                          <div class="col-sm-10">
                            <input type="file" name="import" id="input-import" />
                          </div>
                        </div>
                      </div>
                    {!! Form::close() !!}

                    {!! Form::open(['url' => 'admin/tool_mgr/backup','files'=> true,'class'=>'form-horizontal','id' => 'form-backup']) !!}
                      <!-- form -->
                      <div class="form-group">
                      <label class="col-sm-2 control-label">Export</label>
                      <div class="col-sm-10">
                        <div class="well well-sm" style="height: 500px; overflow: auto;">
                          @foreach($db_tables as $table)
                            @foreach($table as $key => $value)
                              <div class="col-sm-4">
                                <div style="font-size:16px;font-weight:bold;padding-top:10px;">
                                    <label>
                                    <input type="checkbox" name="backup[]" value="<?php echo $value; ?>" checked="checked" />
                                    <?php echo $value; ?></label>
                                    </label>
                                </div>
                              </div>
                            @endforeach
                          @endforeach
                        </div>
                        <a onclick="$(this).parent().find(':checkbox').prop('checked', true);">Select All</a> / <a onclick="$(this).parent().find(':checkbox').prop('checked', false);">Unselect All</a></div>
                      </div>
                    {!! Form::close() !!}
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

  
@endsection
