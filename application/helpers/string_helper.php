<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('strip_str_ellipsis')){
    function strip_str_ellipsis($str,$length){
        
        if(strlen($str) <= $length){ 
            return $str;
        }
        else {
            return substr($str,0,$length - 3) . "..."; 
        }
    }
}

if ( ! function_exists('format_food_id')){
    function format_food_id($food_id){
        return "FD" . str_pad($food_id,6,'0',STR_PAD_LEFT);
    }
}

if ( ! function_exists('pad_zeros')){
    function pad_zeros($day){
        return str_pad($day,2,'0',STR_PAD_LEFT);
    }
}

if ( ! function_exists('convert_to_utf8')){
    function convert_to_utf8($arr){
        array_walk_recursive($arr, function(&$item, $key){
            if(!mb_detect_encoding($item, 'utf-8', true)){
                    $item = utf8_encode($item);
            }
        });
        return $arr;
    }
}

if ( ! function_exists('format_meal_allowance_no')){
    function format_meal_allowance_no($meal_allowance_id){
        return "MA" . str_pad($meal_allowance_id,5,'0',STR_PAD_LEFT);
    }
}
