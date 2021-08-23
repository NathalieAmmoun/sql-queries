<?php
$arr = array(3,5,89,23,45,66,74);
$max = -500000;
$min = 500000;
foreach($arr as $num) {
    if ($num<$min) {
        $min = $num;
    }
    if($num > $max) {
        $max =$num;
    }
}

echo "$min , $max";
