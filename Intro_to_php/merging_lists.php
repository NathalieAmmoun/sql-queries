<?php

$list1 = "5, 6, 8, 90, 46";
$list2="1, 2, 50, 6, 23, 77";
$list3='';
$arr1=explode(", ", $list1);
sort($arr1);
$arr2 = explode(", ", $list2);
sort($arr2);
$len1 = count($arr1);
$len2 = count($arr2);
$i = 0;
$j = 0;
function appendToList3($list, $arr, $index){
    if (strpos($list, $arr[$index]) == false){
        $list .=$arr[$index] .', ';
    }
    return $list;
}
while ($i<$len1 && $j< $len2){
    if ((int)$arr1[$i] <= (int)$arr2[$j]){
        $list3 = appendToList3($list3, $arr1, $i);
        $i++;
    }else{
        $list3 = appendToList3($list3, $arr2, $j);
        $j++;
    }
}
//append remaining values of either lists to $list3
if ($i<$len1){
    while ($i<$len1){
        $list3 = appendToList3($list3, $arr1, $i);
        $i++;
    }
}else{
    while ($j<$len2){
        $list3 = appendToList3($list3, $arr2, $j);
        $j++;
    }
}

$list3 = rtrim($list3, ', ');
print($list3);