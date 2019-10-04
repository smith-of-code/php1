<?php
function getTime($hour = null , $minute = null){
   if (is_null($hour) ||is ){
       $hour = date('G');
   }
    if (is_null($minute)){
        $minute = date('i');
    }

    if ($hour >= 5 && $hour <= 20 || $hour % 10 === 0 ){
        $hour = $hour . ' часов';
    }elseif ($hour === 1|| $hour === 21){
        $hour = $hour . ' час';
    }else {
        $hour = $hour . ' часа';
    }

    if ($minute === 1 || $minute === 21 || $minute === 31 || $minute === 41 || $minute === 51){
        $minute = $minute . ' минута';
    }elseif ($minute >= 5 && $minute <= 20 || $hour % 10 === 0 ){
        $minute = $minute . ' минут';
    }else{
        $minute = $minute . 'минуты';
    }
    return "$hour $minute" ;
}
echo getTime();