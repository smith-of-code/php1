<h2>Каталог</h2>

<div>
    <? foreach ($catalog as $item): ?>
        <div>
            <a href="/product/<?=$item['id']?>"><h3><?=$item['name']?></h3></a>
            <a href="/product/<?=$item['id']?>"><img src="<?=CATALOG_IMG?>/small/<?=$item['image']?>" alt="<?=$item['image']?>"></a>
            <a href="/product/<?=$item['id']?>"><?=$item['short_desc']?></a>
            <p>Цена: <?=$item['price']?></p>
            <button>Купить</button>
            <hr>
        </div>
    <? endforeach; ?>

</div>
