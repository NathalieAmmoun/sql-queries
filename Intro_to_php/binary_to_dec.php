<?php
function convertBinToDec($num){
    $decimal=0;
    $i=0;
    while ($num >0){
        $decimal += $num%10 * pow(2, $i);
        $num = $num/10;
        $i++;
    }
    return $decimal;
}
$binary = 1010110;
print("The decimal of $binary is: " . convertBinToDec($binary));