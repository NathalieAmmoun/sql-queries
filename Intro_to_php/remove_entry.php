<?php
function removeEntry($ar, $entry){
    $key = array_keys($ar);
    $len= count($key);
    $new_arr;
    for ($i =0; $i<$len; $i++){
        if ($ar[$key[$i]] == $entry){
            $new_arr = array_merge(array_slice($ar, 0, $i, true), array_slice($ar,$i+1, $len, true));
            break;
        }
    }
    return $new_arr;
}

$list = array(4,5,2,6,44);
print_r(removeEntry($list, 5));