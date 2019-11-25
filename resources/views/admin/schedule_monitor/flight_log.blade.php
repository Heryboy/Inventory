@extends('admin.common.layout') 
@section('content')
<!-- header -->
@include('admin.common.header')
@include('admin.schedule_monitor.common.flight_real_time')
  <!-- !!$view_title!!} -->
  <!-- main-container -->
  <div class="main_container">
    <!-- col-md-3 -->
    <div class="col-md-3 left_col">
     @include('admin.schedule_monitor.common.sidebar')
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
            @include('admin.common.action_top')
           </div> 
         </nav>
       </div>
    </div><!-- /top navigation -->
    <!-- page content -->
    <div class="right_col" role="main">
     <!-- Content Inner -->
     <div class="row">
      <div class="row">
       <table class="table table-striped responsive-utilities jambo_table bulk_action">
         <thead>
           <tr>
             <th rowspan="2" style="border-right: 1px solid #f4f4f4;vertical-align: middle;"><center>Leg<br>#</center></th>
             <th rowspan="2" style="border-right: 1px solid #f4f4f4;vertical-align: middle;"><center>Flight <br>Date</center></th>
             <th rowspan="2" style="border-right: 1px solid #f4f4f4;vertical-align: middle;"><center>Pax<br>#</center></th>
             <th colspan="2" style="border-right: 1px solid #f4f4f4;vertical-align: middle;"><center>AirPort ID</center></th>
             <th colspan="4" style="border-right: 1px solid #f4f4f4;vertical-align: middle;"><center>Block & Flight Time</center></th>
             <th rowspan="2" style="border-right: 1px solid #f4f4f4;vertical-align: middle;"><center>Flit Time</center></th>
             <th rowspan="2" style="border-right: 1px solid #f4f4f4;vertical-align: middle;"><center>Blk Time</center></th>
             <th rowspan="2" style="border-right: 1px solid #f4f4f4;vertical-align: middle;"><center>Fuel/lbs <br> Burn</center></th>
             <th colspan="2" style="border-right: 1px solid #f4f4f4;vertical-align: middle;"><center>Land</center></th>
             <!-- <th rowspan="2" style="border-right: 1px solid #f4f4f4;vertical-align: middle;"><center>Inst Time</center></th> -->
             <!-- <th rowspan="2" style="border-right: 1px solid #f4f4f4;vertical-align: middle;"><center>Appr Type</center></th> -->
             <!-- <th rowspan="2" style="border-right: 1px solid #f4f4f4;vertical-align: middle;"><center>PT91<br>135</center></th> -->
             <th rowspan="2" style="border-right: 1px solid #f4f4f4;vertical-align: middle;"><center>Miles</center></th>
           </tr>
           <tr>
             <th style="border-right: 1px solid #f4f4f4;vertical-align: middle;">From</th>
             <th style="border-right: 1px solid #f4f4f4;vertical-align: middle;">To</th>
             <th style="border-right: 1px solid #f4f4f4;vertical-align: middle;">ATD</th>
             <th style="border-right: 1px solid #f4f4f4;vertical-align: middle;">ATA</th>
             <th style="border-right: 1px solid #f4f4f4;vertical-align: middle;">STD</th>
             <th style="border-right: 1px solid #f4f4f4;vertical-align: middle;">STA</th>
             <th style="border-right: 1px solid #f4f4f4;vertical-align: middle;">Day</th>
             <th style="border-right: 1px solid #f4f4f4;vertical-align: middle;">Ngt</th>
           </tr>
         </thead>
         <tbody>
           <tr class="even pointer">
             <td>01</td>
             <td>01/02/2016</td>
             <td>1</td>
             <td>PNH</td>
             <td>REP</td>
             <td><input type="text" style="width:40px" value="0730" name="ATD"></td>
             <td><input type="text" style="width:40px" value="0850" name="ATA"></td>
             <td>0850</td>
             <td>0930</td>
             <td>1.3</td>
             <td>1.7</td>
             <td>2408</td>
             <td>1</td>
             <td>0</td>
             <!-- <td>0.2</td>
             <td>ILS</td> -->
             <!-- <td>135</td> -->
             <td>387</td>
           </tr>

           <tr class="odd pointer">
             <td>02</td>
             <td>01/05/2015</td>
             <td>2</td>
             <td>PNH</td>
             <td>REP</td>
             <td><input type="text" style="width:40px" value="0330" name="ATD"></td>
             <td><input type="text" style="width:40px" value="0640" name="ATA"></td>
             <td>0850</td>
             <td>0900</td>
             <td>1.3</td>
             <td>1.7</td>
             <td>2408</td>
             <td>1</td>
             <td>0</td>
             <!-- <td>0.2</td>
             <td>ILS</td> -->
             <!-- <td>135</td> -->
             <td>387</td>
           </tr>

         </tbody>
         <!-- <tbody>
           <tr>
             <th scope="row">1</th>
             <td>Mark</td>
             <td>Otto</td>
             <td>@mdo</td>
           </tr>
           <tr>
             <th scope="row">2</th>
             <td>Jacob</td>
             <td>Thornton</td>
             <td>@fat</td>
           </tr>
           <tr>
             <th scope="row">3</th>
             <td>Larry</td>
             <td>the Bird</td>
             <td>@twitter</td>
           </tr>
         </tbody> -->
       </table>
      </div>
     </div>
     <!-- #END content  -->
     <!-- footer content -->
     @include('admin.common.footer')
     <!-- /footer content -->
    </div>
    <!-- /page content -->
  </div>

@endsection