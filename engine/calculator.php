<?php
function mathOperation(){

    $result =[];
    $a = $_POST['first'];
    $b = $_POST['second'];
    $operation = $_POST['action'];

        if (!is_numeric($a)){
            $result['error'][] = 'первое число некорректно';
        }
        if (!is_numeric($b)){
            $result['error'][] = 'второе число некорректно';
        }
        if ($operation === ''){
            $result['error'][] = 'операция не выбранна';
        }

        if (!empty($result)){
            return $result;
        }

    $result = [$a,$operation,$b];

    switch ($operation){
        case ('+'):
            $result[] = $a + $b;
            break;
        case ('*'):
            $result[] = $a * $b;
            break;
        case ('-'):
            $result[] = $a - $b;
            break;
        case ('/'):
            if($b !== 0){
                $result[] = $a / $b;
            }else{
                $result[] = 'На ноль делить нельзя';
            }
    }
    return $result;
}