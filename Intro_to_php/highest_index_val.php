<?php
$arr=array("a"=>45, "b"=> 6, "c"=>73, "d"=>23, "e" =>31);
$max = -60000;
$max_index;
foreach($arr as $index=>$val){
    if ($val>$max){
        $max = $val;
        $max_index = $index;
    }
}
print_r($arr);
echo "\n The index of the highest value in the array is: $max_index ";