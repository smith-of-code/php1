<?php
function sum($a,$b){
    return $a + $b . PHP_EOL;
}

function mult($a,$b){
    return $a * $b . PHP_EOL;
}

function deduc($a,$b){
    return $a - $b . PHP_EOL;
}

function divis($a,$b){
    return $a / $b . PHP_EOL;
}

echo sum(3,4);
echo mult(6,3);
echo deduc(80,43);
echo divis(40, 2);