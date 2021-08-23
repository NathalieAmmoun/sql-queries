<?php
function union_array($ar1, $ar2){
    $ar3 = array_unique($ar1);
    $key = array_keys($ar2);
    foreach($ar2 as $i =>$value){
        if(in_array($ar2[$i], $ar3)==false){
            if(is_numeric($i) && array_search($i, $key) == $i){
                $ar3[] = $ar2[$i];
                }
            else{
                $ar3[$i]= $ar2[$i];
            }
        }
    }
    return $ar3;
}
$ar1 = array("color" => "red", 2, 4);
$ar2 = array("a", "b", "color" => "green", 'blue' => 'ocean',45 => 6, 4);
print_r(union_array($ar1, $ar2));