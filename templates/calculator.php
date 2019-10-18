<?
var_dump($_POST);
//$first = '';
//$second = '';
//$action = '';
//$error = [];
$answer = calculator($_POST);

function calculator($data){

    if (empty($data['first']) && !is_numeric($data['first'])){
        $answer['error'][] = 'Некорректное первое число';
    }else{
        $answer['first'] = $data['first'];
    }

    if (empty($data['second']) && !is_numeric($data['second'])){
        $answer['error'][] = 'Некорректное второе число';
    }else{
        $answer['second'] = $data['first'];
    }

    if (empty($_POST['action'])){
        $answer['error'][] = 'Отсутствует оператор';
    }


    return $answer;
}
var_dump($answer);

?>


<? foreach ($answer['error'] as $item):?>
<p><?=$item?></p>
<? endforeach;?>

<form action="" method="post">
    <input type="text" name="first">
    <select name="action" >
        <option value=""></option>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="/">/</option>
        <option value="*">*</option>
    </select>
    <input type="text" name="second">
    <input type="submit">
</form>