<? if (isset($calculate['error'])):?>
<?foreach ($calculate['error'] as $item): ?>
<p><?=$item?></p>
<? endforeach;?>
<? endif;?>
<p>Результат: <?=$calculate[3]?></p>
<form action="/calculator/" method="post">
    <input type="text" name="first" value="<?=$calculate[0]?>">
    <select name="action" >
        <option value=""></option>
        <option <? if($calculate[1] === '+'):?> selected <? endif;?> value="+">+</option>
        <option <? if($calculate[1] === '-'):?> selected <? endif;?> value="-">-</option>
        <option <? if($calculate[1] === '/'):?> selected <? endif;?> value="/">/</option>
        <option <? if($calculate[1] === '*'):?> selected <? endif;?> value="*">*</option>
    </select>
    <input type="text" name="second" value="<?=$calculate[2]?>">
    <input type="submit">
</form>