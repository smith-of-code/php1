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

function mathOperation($arg1, $arg2, $operation){
    switch ($operation){
        case ('sum'):
            return sum($arg1, $arg2);
        case ('mult'):
            return mult($arg1, $arg2);
        case ('deduc'):
            return deduc($arg1, $arg2);
        case ('divis'):
            return divis($arg1, $arg2);
    }
}

echo mathOperation(3,4, 'sum');
echo mathOperation(3,4, 'mult');
echo mathOperation(3,4, 'deduc');
echo mathOperation(3,4, 'divis');