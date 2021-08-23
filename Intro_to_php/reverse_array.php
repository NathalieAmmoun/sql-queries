<?php
function reverse($arr) {
    $ar_len= count($arr);
    for ($i =0; $i<$ar_len/2; $i++){
        $temp = $arr[$i];
        $arr[$i]= $arr[$ar_len-1-$i];
        $arr[$ar_len-1-$i] = $temp;
    }
    return $arr;
}

$example = array("are","hello", "green", "blue", "red");
print_r($example);
print_r(reverse($example));