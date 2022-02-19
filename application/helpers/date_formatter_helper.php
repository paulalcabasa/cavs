<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('format_date_slash')){
    function format_date_slash($date){
 		$date = date_create($date);
		return date_format($date,"m/d/Y");
    }
}

if ( ! function_exists('get_month_name')){
    function get_month_name($month){
 		$month_name = "";
		
	    switch($month){
	        case '01' : 
	            $month_name = "January";
	        break;
	         case '02' : 
	            $month_name = "February";
	        break;
	         case '03' : 
	            $month_name = "March";
	        break;
	         case '04' : 
	            $month_name = "April";
	        break;
	         case '05' : 
	            $month_name = "May";
	        break;
	         case '06' : 
	            $month_name = "June";
	        break;
	         case '07' : 
	            $month_name = "July";
	        break;
	         case '08' : 
	            $month_name = "August";
	        break;
	         case '09' : 
	            $month_name = "September";
	        break;
	         case '10' : 
	            $month_name = "October";
	        break;
	         case '11' : 
	            $month_name = "November";
	        break;
	         case '12' : 
	            $month_name = "December";
	        break;
	    }
	    return $month_name;
    }
}


/*if ( ! function_exists('format_date_word')){
    function format_date_word($date){
 		$date = date_create($date);
		return date_format($date,"F d, Y");
    }
}
*/

