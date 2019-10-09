<h2>Каталог</h2>

<div>
    <? foreach ($catalog as $item): ?>
        <div>
            <?=$item['name']?><br>
            Цена: <?=$item['price']?><br>
            <button>Купить</button>
            <hr>
        </div>
    <? endforeach; ?>

</div>
