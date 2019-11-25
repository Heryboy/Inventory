var site_url = '/';

function getURLVar(key) {
  var value = [];

  var query = String(document.location).split('?');

  if (query[1]) {
    var part = query[1].split('&');

    for (i = 0; i < part.length; i++) {
      var data = part[i].split('=');

      if (data[0] && data[1]) {
        value[data[0]] = data[1];
      }
    }

    if (value[key]) {
      return value[key];
    } else {
      return '';
    }
  }
}

$(document).ready(function() {
  //Form Submit for IE Browser
  $('button[type=\'submit\']').on('click', function() {
    $("form[id*='form-']").submit();
  });

  // Highlight any found errors
  $('.text-danger').each(function() {
    var element = $(this).parent().parent();

    if (element.hasClass('form-group')) {
      element.addClass('has-error');
    }
  });

  // Set last page opened on the menu
  $('#menu a[href]').on('click', function() {
    sessionStorage.setItem('menu', $(this).attr('href'));
  });

  if (!sessionStorage.getItem('menu')) {
    $('#menu #dashboard').addClass('active');
  } else {
    // Sets active and open to selected page in the left column menu.
    $('#menu a[href=\'' + sessionStorage.getItem('menu') + '\']').parents('li').addClass('active open');
  }

  if (localStorage.getItem('column-left') == 'active') {
    $('#button-menu i').replaceWith('<i class="fa fa-dedent fa-lg"></i>');

    $('#column-left').addClass('active');

    // Slide Down Menu
    $('#menu li.active').has('ul').children('ul').addClass('collapse in');
    $('#menu li').not('.active').has('ul').children('ul').addClass('collapse');
  } else {
    $('#button-menu i').replaceWith('<i class="fa fa-indent fa-lg"></i>');

    $('#menu li li.active').has('ul').children('ul').addClass('collapse in');
    $('#menu li li').not('.active').has('ul').children('ul').addClass('collapse');
  }

  // Menu button
  $('#button-menu').on('click', function() {
    // Checks if the left column is active or not.
    if ($('#column-left').hasClass('active')) {
      localStorage.setItem('column-left', '');

      $('#button-menu i').replaceWith('<i class="fa fa-indent fa-lg"></i>');

      $('#column-left').removeClass('active');

      $('#menu > li > ul').removeClass('in collapse');
      $('#menu > li > ul').removeAttr('style');
    } else {
      localStorage.setItem('column-left', 'active');

      $('#button-menu i').replaceWith('<i class="fa fa-dedent fa-lg"></i>');

      $('#column-left').addClass('active');

      // Add the slide down to open menu items
      $('#menu li.open').has('ul').children('ul').addClass('collapse in');
      $('#menu li').not('.open').has('ul').children('ul').addClass('collapse');
    }
  });

  // Menu
  $('#menu').find('li').has('ul').children('a').on('click', function() {
    if ($('#column-left').hasClass('active')) {
      $(this).parent('li').toggleClass('open').children('ul').collapse('toggle');
      $(this).parent('li').siblings().removeClass('open').children('ul.in').collapse('hide');
    } else if (!$(this).parent().parent().is('#menu')) {
      $(this).parent('li').toggleClass('open').children('ul').collapse('toggle');
      $(this).parent('li').siblings().removeClass('open').children('ul.in').collapse('hide');
    }
  });

  // Override summernotes image manager
  $('button[data-event=\'showImageDialog\']').attr('data-toggle', 'image').removeAttr('data-event');

  $(document).delegate('button[data-toggle=\'image\']', 'click', function() {
    $('#modal-image').remove();

    $(this).parents('.note-editor').find('.note-editable').focus();

    $.ajax({
      url: 'index.php?route=common/filemanager&token=' + getURLVar('token'),
      dataType: 'html',
      beforeSend: function() {
        $('#button-image i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
        $('#button-image').prop('disabled', true);
      },
      complete: function() {
        $('#button-image i').replaceWith('<i class="fa fa-upload"></i>');
        $('#button-image').prop('disabled', false);
      },
      success: function(html) {
        $('body').append('<div id="modal-image" class="modal">' + html + '</div>');

        $('#modal-image').modal('show');
      }
    });
  });

  // Image Manager
  $(document).delegate('a[data-toggle=\'image\']', 'click', function(e) {
    e.preventDefault();

    $('.popover').popover('hide', function() {
      $('.popover').remove();
    });

    var element = this;

    $(element).popover({
      html: true,
      placement: 'right',
      trigger: 'manual',
      content: function() {
        return '<button type="button" id="button-image" class="btn btn-primary"><i class="fa fa-pencil"></i></button> <button type="button" id="button-clear" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>';
      }
    });

    $(element).popover('show');

    $('#button-image').on('click', function() {
      $('#modal-image').remove();

      $.ajax({
        url: 'index.php?route=common/filemanager&token=' + getURLVar('token') + '&target=' + $(element).parent().find('input').attr('id') + '&thumb=' + $(element).attr('id'),
        dataType: 'html',
        beforeSend: function() {
          $('#button-image i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
          $('#button-image').prop('disabled', true);
        },
        complete: function() {
          $('#button-image i').replaceWith('<i class="fa fa-pencil"></i>');
          $('#button-image').prop('disabled', false);
        },
        success: function(html) {
          $('body').append('<div id="modal-image" class="modal">' + html + '</div>');

          $('#modal-image').modal('show');
        }
      });

      $(element).popover('hide', function() {
        $('.popover').remove();
      });
    });

    $('#button-clear').on('click', function() {
      $(element).find('img').attr('src', $(element).find('img').attr('data-placeholder'));

      $(element).parent().find('input').attr('value', '');

      $(element).popover('hide', function() {
        $('.popover').remove();
      });
    });
  });

  // tooltips on hover
  $('[data-toggle=\'tooltip\']').tooltip({container: 'body', html: true});

  // Makes tooltips work on ajax generated content
  $(document).ajaxStop(function() {
    $('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
  });

  // https://github.com/opencart/opencart/issues/2595
  $.event.special.remove = {
    remove: function(o) {
      if (o.handler) {
        o.handler.apply(this, arguments);
      }
    }
  }

  $('[data-toggle=\'tooltip\']').on('remove', function() {
    $(this).tooltip('destroy');
  });
});

// Autocomplete */
(function($) {
  $.fn.autocomplete = function(option) {
    return this.each(function() {
      this.timer = null;
      this.items = new Array();

      $.extend(this, option);

      $(this).attr('autocomplete', 'off');

      // Focus
      $(this).on('focus', function() {
        this.request();
      });

      // Blur
      $(this).on('blur', function() {
        setTimeout(function(object) {
          object.hide();
        }, 200, this);
      });

      // Keydown
      $(this).on('keydown', function(event) {
        switch(event.keyCode) {
          case 27: // escape
            this.hide();
            break;
          default:
            this.request();
            break;
        }
      });

      // Click
      this.click = function(event) {
        event.preventDefault();

        value = $(event.target).parent().attr('data-value');

        if (value && this.items[value]) {
          this.select(this.items[value]);
        }
      }

      // Show
      this.show = function() {
        var pos = $(this).position();

        $(this).siblings('ul.dropdown-menu').css({
          top: pos.top + $(this).outerHeight(),
          left: pos.left
        });

        $(this).siblings('ul.dropdown-menu').show();
      }

      // Hide
      this.hide = function() {
        $(this).siblings('ul.dropdown-menu').hide();
      }

      // Request
      this.request = function() {
        clearTimeout(this.timer);

        this.timer = setTimeout(function(object) {
          object.source($(object).val(), $.proxy(object.response, object));
        }, 200, this);
      }

      // Response
      this.response = function(json) {
        html = '';

        if (json.length) {
          for (i = 0; i < json.length; i++) {
            this.items[json[i]['value']] = json[i];
          }

          for (i = 0; i < json.length; i++) {
            if (!json[i]['category']) {
              html += '<li data-value="' + json[i]['value'] + '"><a href="#">' + json[i]['label'] + '</a></li>';
            }
          }

          // Get all the ones with a categories
          var category = new Array();

          for (i = 0; i < json.length; i++) {
            if (json[i]['category']) {
              if (!category[json[i]['category']]) {
                category[json[i]['category']] = new Array();
                category[json[i]['category']]['name'] = json[i]['category'];
                category[json[i]['category']]['item'] = new Array();
              }

              category[json[i]['category']]['item'].push(json[i]);
            }
          }

          for (i in category) {
            html += '<li class="dropdown-header">' + category[i]['name'] + '</li>';

            for (j = 0; j < category[i]['item'].length; j++) {
              html += '<li data-value="' + category[i]['item'][j]['value'] + '"><a href="#">&nbsp;&nbsp;&nbsp;' + category[i]['item'][j]['label'] + '</a></li>';
            }
          }
        }

        if (html) {
          this.show();
        } else {
          this.hide();
        }

        $(this).siblings('ul.dropdown-menu').html(html);
      }

      $(this).after('<ul class="dropdown-menu"></ul>');
      $(this).siblings('ul.dropdown-menu').delegate('a', 'click', $.proxy(this.click, this));

    });
  }
})(window.jQuery);


  // get show page #########################
  function ShowPage(PageName,DivName,PageTitle,menu_code){
    var loading;
    loading = "<img src='http://inventory.localhost:81/images/loading.gif' border=0>";
    document.getElementById(DivName).innerHTML = loading;
    url = PageName+"?menuCode="+PageTitle+"&session="+ new Date().getTime();
    getTranDetail(url, DivName);
    // $.eventallData();
  }

  // JavaScript Document
  var xmlHttp;
  var theDiv;
  function getTranDetail(url, div){
    theDiv = div;

    if (url.length==0){ 
      document.getElementById(theDiv).innerHTML=""
      return
    }
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null){
      alert ("Browser does not support HTTP Request")
      return
    } 

    xmlHttp.onreadystatechange=stateChanged 
    xmlHttp.open("GET",url,false)
    xmlHttp.send(null)
  }
  // End function

  function stateChanged(){ 
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
      document.getElementById(theDiv).innerHTML=xmlHttp.responseText
    } 
  } 
  // End function

  function GetXmlHttpObject(handler){
    var objXMLHttp=null
    // Firefox, Opera 8.0+, Safari
    if (window.XMLHttpRequest){
      objXMLHttp=new XMLHttpRequest()
      }
    // Internet Explorer
    else if (window.ActiveXObject){
      objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
    }

    return objXMLHttp
  }
  // End function

  // get Menu Code #####################
  function getMenucode(){
    var str = "?menuCode=";
    var menu_code = $("#menuCode").val();
    var url = str+menu_code;
    return url;
  }

  // CalculateDateCounter ################
  function CalculateDateCounter (date1,date2){
    // Here are the two dates to compare
    var date1 = date1;//'2011-12-24';
    var date2 = date2;//'2012-01-01';

    // First we split the values to arrays date1[0] is the year, [1] the month and [2] the day
    date1 = date1.split('-');
    date2 = date2.split('-');

    // Now we convert the array to a Date object, which has several helpful methods
    date1 = new Date(date1[0], date1[1], date1[2]);
    date2 = new Date(date2[0], date2[1], date2[2]);

    // We use the getTime() method and get the unixtime (in milliseconds, but we want seconds, therefore we divide it through 1000)
    date1_unixtime = parseInt(date1.getTime() / 1000);
    date2_unixtime = parseInt(date2.getTime() / 1000);

    // This is the calculated difference in seconds
    var timeDifference = date2_unixtime - date1_unixtime;

    // in Hours
    var timeDifferenceInHours = timeDifference / 60 / 60;

    // and finaly, in days :)
    var timeDifferenceInDays = timeDifferenceInHours  / 24;

    return timeDifferenceInDays;
    // alert(timeDifferenceInDays);
  }

  // CalculateTime ###############
  function CalculateTime(starttime,endtime) {

    // var str = '12:56';
    // var strshortened = str.slice(3,5);
    // alert(strshortened); //=> '12345678'

    var time=0; 
    var time_in=0;
    var minute_in=0;
    // var hours = parseInt(starttime.split(':')[0], 10) - parseInt(endtime.split(':')[0], 10);
    var stime_h = starttime.slice(0,2);
    var etime_h = endtime.slice(0,2);
    var stime_m = starttime.slice(3,5);
    var etime_m = endtime.slice(3,5);


    if(stime_h>etime_h){
      if(stime_m > etime_m){
        time = ((24+parseInt(etime_h)-1)) - parseInt(stime_h);
      }else{
        time = ((24+parseInt(etime_h))-1) - parseInt(stime_h);
      }
    }else{
      if(stime_m > etime_m){
        time = (parseInt(etime_h)-1) - parseInt(stime_h);
      }else{
        time = (parseInt(etime_h)) - parseInt(stime_h);
      }
    }

    if(stime_m > etime_m){
      minute = (60+parseInt(etime_m)) - parseInt(stime_m);
    }else{
      minute = parseInt(etime_m) - parseInt(stime_m);
    }
    
    if(time<=9){
      time_in = '0'+time;
    }else{
      time_in = time;
    }

    if(minute<=9){
      minute_in = '0'+minute;
    }else{
      minute_in = minute;
    }

    var calculate_time = time_in + minute_in;

    return calculate_time;
  }

  // CalculateMinute ################
  function CalculateMinute(endtime,starttime) {
    var minutes = parseInt(starttime.split(':')[1], 10) - parseInt(endtime.split(':')[1], 10);
    // alert(minutes);
    // if(minutes > 1) minutes = 60 + minutes;
    if(minutes < 0) minutes = 60 + minutes;

    if(minutes<=9){
      var minutes_custom = "0"+minutes;
    }else{
      var minutes_custom = minutes;
    }
    return minutes_custom;
  }

 // Check Validate Numeric if it is number or not
 function ValidateNumber(val) {
     return isNaN(val);
 }

  // Slit or remove time example 12:30:00 change to => 1230
 function SlitTime(time){         
  var time = time.split(":");
  var new_time = time[0]+time[1];
  return new_time;
 }

  // Change Format Date
  function formatDate(date) {
    var date = new Date(date);
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return date.getMonth()+1 + "/" + date.getDate() + "/" + date.getFullYear() + " " + strTime;
  }

  function ValidateTimeFormat(obj){
  var maxlength=4;
  var objl = obj.value.length;

  var data = '';

  if(objl>=1){
    var obj1 = obj.value.substring(0, 1)
    if((obj1==0)||(obj1==1)||(obj1==2))
      data=obj1;
    else data = 1;

  }
  if(objl>=2){        
    var obj2 = obj.value.substring(1, 2);
    //alert(obj2);

    if(obj1==2){
      if((obj2==0)||(obj2==1)||(obj2==2)||(obj2==3))
        data =  obj1+obj2;
      else data = obj1+3;
    }else{ 
      if((obj2==0)||(obj2==1)||(obj2==2)||(obj2==3)||(obj2==4)||(obj2==5)||(obj2==6)||(obj2==7)||(obj2==8)||(obj2==9))        
        data = obj1+obj2;
      else data = obj1+0;
    }

  }
  if(objl>=3){        
    var obj3 = obj.value.substring(2, 3);
    
    if((obj3==0)||(obj3==1)||(obj3==2)||(obj3==3)||(obj3==4)||(obj3==5))
      data =  obj1 + obj2 + obj3;
    else data = obj1+obj2+5;
    
  }
  if(objl>=4){        
    var obj4 = obj.value.substring(3, 4);

    if((obj4==0)||(obj4==5))
      data =  obj1+obj2+obj3+ obj4;
    else{ 
      //alert(obj4);
      data = obj1 + obj2 + obj3 + "5";
    }
  }      
  obj.value = data;
  return obj.value;
  }

  //script for export btn
  function exported(url,task,target,menuCode='',CITS='',action='',crew=''){
  //alert('hi');
  if(menuCode==''){
    var menuCode = document.getElementById("menuCode").value;
  }
  var filter_from = document.getElementById("filter_from").value;
  var filter_to = document.getElementById("filter_to").value;
  var aircraft_id = document.getElementById("haircraft_id").value;
  var flight_status_id = document.getElementById("hfs_id").value;
  var fnotification_id = document.getElementById("hfn_id").value;
  var fn = document.getElementById("fn").value;

  var Task = task;
  var time_zone = document.getElementById("time_zone").value;
  var print_title = document.getElementById("print_title").value;
  var origin_id = document.getElementById("ho_id").value;
  var destination_id = document.getElementById("hd_id").value;

  url += "?menuCode="+menuCode;      
  url += "&filter_from="+filter_from+"&filter_to="+filter_to;
  url += "&aircraft_id="+aircraft_id+"&flight_status_id="+flight_status_id;
  url += "&fnotification_id="+fnotification_id+"&fn="+fn;
  url += "&Task="+Task;
  url += "&origin_id="+origin_id+"&destination_id="+destination_id;
  url += "&time_zone="+time_zone+"&print_title="+print_title;

  if(CITS=='1'){
    var pax_movement_id = document.getElementById("hpax_id").value;
    var flight_group = document.getElementById("hg_id").value;
    url += "&pax_movement_id="+pax_movement_id+"&flight_group="+flight_group;
  }
  if(action=='1'){
    var id = document.getElementById("custom_id").value;
    url += "&id="+id;
  }
  if(crew=='1'){
    var crew_id = document.getElementById("crew_id").value;
    url += "&crew_id="+crew_id;
  }

  //alert(url);
  //window.location = url;
  if(target=='_blank'){
    window.open(url, '_blank');
  }else{ window.location = url;}

  }
  // });
