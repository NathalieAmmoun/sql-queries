<?php
$arr = array(3,5,6,9,23,45,74,42,90,15,32,65);
$even_arr;
$odd_arr;
$len=count($arr);
for ($i=0; $i<$len; $i++){
    if ($arr[$i]%2==0) {
        $even_arr[] = $arr[$i];
    }else{
        $odd_arr[]=$arr[$i];
    }
}
echo "Original Array: ";
print_r($arr);
echo "\n Even Array: ";
print_r($even_arr);
echo "\n Odd Array: ";
print_r($odd_arr);