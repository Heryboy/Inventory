<?php 
	namespace App\Helpers;
	use Carbon\Carbon;
	
	class TimeHelper{
		public static function test(){
			return "good";
		}
		
		/*
		 * strTime formate must be h:m AM
		 */
		public static function getTime($strTime){
			$text = explode(":",$strTime);
			$subText = explode(" ", $text[1]);
			$hour = (int)$text[0];
			$minute = (int)$subText[0];
			$format = strtoupper($subText[1]);
			if($format == "PM" && $hour != 12){
				$hour += 12;
			}
			$time = array(
					'hour'=> $hour,
					'minute'=> $minute
			);
			return $time;
		}
		//compare time A & B,
		/* 1  => A>B
		 * -1 => A<B
		 * 0  => A=B
		 */
		public static function compareTime(Carbon $time1,$time2){
			 if($time1->hour > $time2['hour'] ||
					($time1->hour == $time2['hour'] && $time1->minute > $time2['minute'])){
						return 1;
			}else if($time1->hour == $time2['hour'] && $time1->minute == $time2['minute']){
				return 0;
			}
			return -1;
		}
		
		public static function compareTime2($time1,$time2){
			if($time1['hour'] > $time2['hour'] ||
					($time1['hour'] == $time2['hour'] && $time1['minute'] > $time2['minute'])){
						return 1;
			}else if($time1['hour'] == $time2['hour'] && $time1['minute'] == $time2['minute']){
				return 0;
			}
			return -1;
		}
		
		public static function isBetweenTime(Carbon $test, $time_start, $time_end){
			if(TimeHelper::compareTime($test,$time_start)>0 && TimeHelper::compareTime($test,$time_end)<0){
				return true;
			}
			return false;
		}
		
		public static function isBetweenTimeOrBeforeMinutes(Carbon $test, $time_start, $time_end ,$minute_before){
			$time_start = TimeHelper::subtractTime($time_start,$minute_before);
			if(TimeHelper::compareTime($test,$time_start)>0 && TimeHelper::compareTime($test,$time_end)<0){
				return true;
			}
			return false;
		}
		
		public static function subtractTime($time,$minutes){
			$total_minute = $time['hour']*60 + $time['minute'];
			$total_minute -= $minutes;
			$time['hour'] = intval($total_minute / 60) ;
			$time['minute'] = $total_minute % 60;
			return $time;
		}
		

		public static function DateNow(){
	    	$datetime = datetime('Y-m-d H:i:s');
	    	return $datetime;
	    }
	}
?>