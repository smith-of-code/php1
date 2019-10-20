<h2><?=$product['name']?></h2>

        <div>
            <a href=""><img src="/<?=CATALOG_IMG?>/big/<?=$product['image']?>" alt="<?=$product['image']?>"></a>
            <p><?=$product['full_desc']?></p>
            <p>Цена: <?=$product['price']?></p>
            <button>Купить</button>
            <hr>
        </div>

<form action="/feedback/add/<?=$product['id']?>" method="post">
    <fieldset>
    <legend>Добавить отзыв</legend>
        <label>Имя<input type="text" name="name"></label><br>
        <label>Текст<textarea name="content" id="" cols="30" rows="10"></textarea></label>
        <input type="submit">
    </fieldset>

</form>
<div>
    <h3>Отзывы</h3>
<? foreach ($feedback as $item):?>
    <h4>Имя: <?=$item['name']?></h4>
<p>Текст: <?=$item['content']?></p>
<p>Дата: <?=$item['date']?></p>
<a href="/feedback/delete/<?=$item['id']?>">X</a>
    <a href="/feedback/update/<?=$item['id']?>">Редактировать</a>
<? endforeach;?>
</div>