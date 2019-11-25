<div class="col-sm-1">{!! trans('report/flight.filter_from') !!} <span class="validate_label_red">*</span></div>
<div class="col-sm-2 form-group">                          
  <input onchange="this.form.submit()" type="text" aria-describedby="inputSuccess2Status2" placeholder="Effective Date From" id="filter_from" class="date-picker form-control has-feedback-left" name="filter_from" value="{{$filter_from}}" required="required">
  <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
  <span id="inputSuccess2Status2" class="sr-only">(success)</span>
</div>
                      
<div class="col-sm-1">{!! trans('report/flight.filter_to') !!} <span class="validate_label_red">*</span></div>
<div class="col-sm-2 form-group">
  <input onchange="this.form.submit()" type="text" aria-describedby="inputSuccess2Status2" placeholder="Effective Date To" id="filter_to" class="date-picker form-control has-feedback-left" name="filter_to" value="{{$filter_to}}" required="required">
  <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
  <span id="inputSuccess2Status2" class="sr-only">(success)</span>
</div>
                        
<!-- <div class="col-sm-1">{!! trans('report/flight.flight_number') !!}</div>
<div class="col-sm-2">
  <input type="text" onchange="this.form.submit()" value="<?php echo $fn;?>" name="fn" id="fn" class="form-control has-feedback-left" />
  <span class="fa fa-plane form-control-feedback left" aria-hidden="true"></span> 
</div> -->

<div class="col-sm-1">{!! trans('report/flight.time_zone') !!}</div>
<div class="col-sm-2">
  <select name="time_zone" id="time_zone" class="form-control" onchange="this.form.submit()">
    <option value="UTC" <?php if(($_REQUEST['time_zone']=='UTC')||(!isset($_REQUEST['time_zone']))){echo 'selected';}?>>{!! trans('report/flight.utc_time') !!}</option>
    <option value="LT" <?php if($_REQUEST['time_zone']=='LT'){echo 'selected';}?>>{!! trans('report/flight.ltc_time') !!}</option>
  </select>
</div>
<?php
if($company_id>0){
?>
<div class="col-sm-1">{!! trans('report/flight.company') !!}</div>
<div class="col-sm-2">
  <select name="company_id" id="company_id" class="form-control" onchange="this.form.submit()">
  <?php
  while ( ($com = current($companyList)) !== FALSE ) {
    $selected = '';
    $key = key($companyList);

    if($key==$company_id) $selected = 'selected="selected"';
    
    echo '<option value="'.$key.'" '.$selected.'>'.$companyList[$key].'</option>';
    next($companyList);
  }?>
    
  </select>
</div>
<?php }?>
<div class="clearfix"></div>
<div class="col-sm-1"></div>

<div class="col-sm-11">

<div class="btn-group">
  <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false"> {!! trans('report/flight.flight_number') !!}<span class="caret"></span></button>
  <ul role="menu" class="dropdown-menu fliter-dropdown">  
    <li> <table cellspacing="3" cellspadding="3">
    <?php
    $i=1;
    $col=0;
    while ( ($fnu = current($fnList)) !== FALSE ) {
      $col++;
      if($col==1) echo '<tr>';
      $key = key($fnList);
    ?>
    <td class="fn_flat" style="padding-right:9px;">        
      <label>
        <input type="checkbox" value="{{$key}}"  <?php if(in_array($key, explode(':',$fn))){echo 'checked="checked"';}?>> <?php echo $fnList[$key];?>
      </label>        
    </td>
    <?php 
      if($col==4){
        $col=0;
        echo '</tr>';
      }
      next($fnList);

      $i++;
    }?>
  </table>
    </li>
  </ul>
</div>

<?php if(isset($crew)&&($crew==1)){?>
<div class="btn-group">
  <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">Crews <span class="caret"></span></button>
  <ul role="menu" class="dropdown-menu fliter-dropdown">   
    <?php
    $i=1;
    while ( ($cr = current($crewList)) !== FALSE ) {
      $key = key($crewList);
    ?>
    <li class="crew_flat">        
      <label>
        <input type="checkbox" value="{{$key}}"  <?php if(in_array($key, explode(':',$crew_id))){echo 'checked="checked"';}?>> <?php echo $crewList[$key];?>
      </label>        
    </li>
    <?php 
      next($crewList);

      $i++;
    }?>
  </ul>
</div>
<?php }?>
<div class="btn-group">
  <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">{!! trans('report/flight.s_aircraft') !!} <span class="caret"></span></button>
  <ul role="menu" class="dropdown-menu fliter-dropdown">
    <li class="aircraft_flat">
      <label>
        <input type="checkbox" value='0' name="aircraft_id[]" class="aircraft_flat" <?php if(in_array(0, explode(':',$aircraft_id))&&($aircraft_id!='')){echo 'checked="checked"';}?>> No Aircraft
      </label>
    </li>
    <?php
    $i=1;
    while ( ($a = current($aircraftList)) !== FALSE ) {
      $key = key($aircraftList);
    ?>
    <li class="aircraft_flat">        
      <label>
        <input type="checkbox" value="{{$key}}"  <?php if(in_array($key, explode(':',$aircraft_id))){echo 'checked="checked"';}?>> <?php echo $aircraftList[$key];?>
      </label>        
    </li>
    <?php 
      next($aircraftList);

      $i++;
    }?>
  </ul>
</div>
<div class="btn-group" <?php if(isset($exclude_fs)){echo 'style="display:none;"';}?>>
  <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">{!! trans('report/flight.flight_status') !!} <span class="caret"></span></button>
  <ul role="menu" class="dropdown-menu fliter-dropdown">    
    <?php
    while ( ($b = current($flight_statusList)) !== FALSE ) {
      $key = key($flight_statusList);
    ?>
    <li class="fs_flat"><label>
        <input type="checkbox" id="flight_status_id" value="{{$key}}" <?php if(in_array($key, explode(':',$flight_status_id))){echo 'checked="checked"';}?>> <?php echo $flight_statusList[$key];?>
        </label>
    </li>
    <?php 
      next($flight_statusList);
    }?>
  </ul>
</div>


<div class="btn-group">
  <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">{!! trans('report/flight.flight_notification') !!} <span class="caret"></span></button>
  <ul role="menu" class="dropdown-menu fliter-dropdown">

    <?php
    while ( ($b = current($fnotificationList)) !== FALSE ) {
      $key = key($fnotificationList);
    ?>
    <li class="fnote_flat"><label>
        <input type="checkbox" value="{{$key}}" <?php if(in_array($key, explode(':',$fnotification_id))){echo 'checked="checked"';}?>> <?php echo $fnotificationList[$key];?>
        </label>
    </li>
    <?php 
      next($fnotificationList);
    }?>
  </ul>
</div>

<div class="btn-group">
  <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">{!! trans('report/flight.origin') !!} <span class="caret"></span></button>
  <ul role="menu" class="dropdown-menu fliter-dropdown">
    <?php
    $origin = $location;
    while ( ($c = current($origin)) !== FALSE ) {
      $key = key($origin);
    ?>
     <li class="o_flat"><label>
        <input type="checkbox" id="origin_id" value="{{$key}}" <?php if(in_array($key, explode(':',$origin_id))){echo 'checked="checked"';}?>> <?php echo $origin[$key];?>
        </label>
    </li>
    <?php 
      next($origin);
    }?>
  </ul>
</div>

<div class="btn-group">
  <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">{!! trans('report/flight.destination') !!} <span class="caret"></span></button>
  <ul role="menu" class="dropdown-menu fliter-dropdown">
    
    <?php
    $destination = $location;
    while ( ($c = current($destination)) !== FALSE ) {
      $key = key($destination);
    ?>
    <li class="d_flat"><label>
        <input type="checkbox" value="{{$key}}" <?php if(in_array($key, explode(':',$destination_id))){echo 'checked="checked"';}?>> <?php echo $destination[$key];?>
        </label>
    </li>
    <?php 
      next($destination);
    }?>
  </ul>
</div>

<?php
if($company_id>0){
?>
<div class="btn-group">
  <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">{!! trans('report/flight.pax_movement') !!} <span class="caret"></span></button>
  <ul role="menu" class="dropdown-menu fliter-dropdown">
   
    <?php
    while ( ($d = current($paxmvtList)) !== FALSE ) {
      $key = key($paxmvtList);
    ?>
    <li class="pax_flat"><label>
        <input type="checkbox" value="{{$key}}" <?php if(in_array($key, explode(':',$pax_movement_id))){echo 'checked="checked"';}?>> <?php echo $paxmvtList[$key];?>
        </label>
    </li>
    <?php 
      next($paxmvtList);
    }?>
  </ul>
</div>

<div class="btn-group">
  <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">Flight {!! trans('report/flight.group') !!} <span class="caret"></span></button>
  <ul role="menu" class="dropdown-menu fliter-dropdown">
    <li> <table cellspacing="3" cellspadding="3">
    <?php
    $i=1;
    $col=0;
    while ( ($f = current($groupList)) !== FALSE ) {
      $key = key($groupList);
      $col++;
      if($col==1) echo '<tr>';
      
    ?>
    <td class="g_flat" style="padding-right:9px;">        
      <label>
        <input type="checkbox" value="{{$key}}"  <?php if(in_array($key, explode(':',$flight_group))){echo 'checked="checked"';}?>> <?php echo $groupList[$key];?>
      </label>        
    </td>
    <?php 
      if($col==2){
        $col=0;
        echo '</tr>';
      }
      next($groupList);

      $i++;
    }?>
  </table>
    
  </ul>
</div>
<?php }?>

<div class="btn-group">
  <button type="button" class="btn btn-primary" onclick="this.form.submit()"><i class="fa fa-search"></i></button>
</div>
</div>
<input type="hidden" id="fn" name="fn" value="{{$fn}}" /> 
<input type="hidden" id="haircraft_id" name="aircraft_id" value="{{$aircraft_id}}" /> 
<input type="hidden" id="hfs_id" name="flight_status_id" value="{{$flight_status_id}}" /> 
<input type="hidden" id="hfn_id" name="fnotification_id" value="{{$fnotification_id}}" /> 
<input type="hidden" id="ho_id" name="origin_id" value="{{$origin_id}}" /> 
<input type="hidden" id="hd_id" name="destination_id" value="{{$destination_id}}" />
<?php if(isset($company_id)&&($company_id>0)){?>
<input type="hidden" id="hpax_id" name="pax_movement_id" value="{{$pax_movement_id}}" /> 
<input type="hidden" id="hg_id" name="flight_group" value="{{$flight_group}}" /> 
<?php }?>
<?php if(isset($crew)&&($crew==1)){?>
<input type="hidden" id="hcrew_id" name="crew_id" value="{{$crew_id}}" /> 
<?php }?>
<script type="text/javascript">

// $(function(){
  $('.fn_flat').click(function(){
    // alert("aircraft_fat");
    var tempValue='';
    tempValue=$('.fn_flat input:checkbox').map(function(n){
      if(this.checked){
        return  this.value;
      };
    }).get().join(':');
    // console.log(tempValue);
    $('#fn').val(tempValue);
  })

  $('.aircraft_flat').click(function(){
    // alert("aircraft_fat");
    var tempValue='';
    tempValue=$('.aircraft_flat input:checkbox').map(function(n){
      if(this.checked){
        return  this.value;
      };
    }).get().join(':');
    // console.log(tempValue);
    $('#haircraft_id').val(tempValue);
  })
// });
  $('.crew_flat').click(function(){
    // alert("aircraft_fat");
    var tempValue='';
    tempValue=$('.crew_flat input:checkbox').map(function(n){
      if(this.checked){
        return  this.value;
      };
    }).get().join(':');
    // console.log(tempValue);
    $('#hcrew_id').val(tempValue);
  })
  
  $('.fs_flat').click(function(){   
    var tempValue='';
    tempValue=$('.fs_flat input:checkbox').map(function(n){
      if(this.checked){
        return  this.value;
      };
    }).get().join(':');    
    $('#hfs_id').val(tempValue);
  })

  $('.fnote_flat').click(function(){   
    var tempValue='';
    tempValue=$('.fn_flat input:checkbox').map(function(n){
      if(this.checked){
        return  this.value;
      };
    }).get().join(':');    
    $('#hfn_id').val(tempValue);
  })

  $('.o_flat').click(function(){   
    var tempValue='';
    tempValue=$('.o_flat input:checkbox').map(function(n){
      if(this.checked){
        return  this.value;
      };
    }).get().join(':');    
    $('#ho_id').val(tempValue);
  })

  $('.d_flat').click(function(){   
    var tempValue='';
    tempValue=$('.d_flat input:checkbox').map(function(n){
      if(this.checked){
        return  this.value;
      };
    }).get().join(':');    
    $('#hd_id').val(tempValue);
  })

  $('.pax_flat').click(function(){   
    var tempValue='';
    tempValue=$('.pax_flat input:checkbox').map(function(n){
      if(this.checked){
        return  this.value;
      };
    }).get().join(':');    
    $('#hpax_id').val(tempValue);
  })

  $('.g_flat').click(function(){   
    var tempValue='';
    tempValue=$('.g_flat input:checkbox').map(function(n){
      if(this.checked){
        return  this.value;
      };
    }).get().join(':');    
    $('#hg_id').val(tempValue);
  })

</script>