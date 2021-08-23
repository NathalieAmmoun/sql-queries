<?php
function factorialOf($n) {
    $factorial=1;
    for ($i=2; $i<$n+1; $i++) {
        $factorial*=$i;
    }
    return $factorial;
}
$fac_n=factorialOf(5);
echo "$fac_n";
?>

