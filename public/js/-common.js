 // $(function () {
      function getMenucode(){
        var str = "?menuCode=";
        var menu_code = $("#menuCode").val();
        var url = str+menu_code;
        return url;
      }

      // CalculateDateCounter
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

     // CalculateTime
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
        if(stime_h==00){
          stime_h_cal = 24;
        }


        if(stime_h>etime_h){
          time = ((24+parseInt(etime_h)) -1) - parseInt(stime_h);
        }else{
          time = (parseInt(etime_h)-1) - parseInt(stime_h);
        }

        if(stime_m > etime_m){
          minute = (60 + parseInt(etime_m)) - parseInt(stime_m);
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
        // if(time_in=='00') time_in='';
        var calculate_time = time_in + minute_in;
        // if(hours < 0){
        //   hours_re = 24 + hours;
        // }else{
        //   hours_re = hours-1;
        // }

        // if(hours_re<=9){
        //   var hours_custom = "0"+hours_re;
        // }else{
        //   var hours_custom = hours_re;
        // }

        return calculate_time;
     }

     // CalculateMinute
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