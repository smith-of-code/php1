<h2>Каталог</h2>

<div>
    <? foreach ($catalog as $item): ?>
        <div>
            <a href="/product/<?=$item['id']?>"><h3><?=$item['name']?></h3></a>
            <a href="/product/<?=$item['id']?>"><img src="<?=CATALOG_IMG?>/small/<?=$item['image']?>" alt="<?=$item['image']?>"></a>
            <a href="/product/<?=$item['id']?>"><?=$item['short_desc']?></a>
            <p>Цена: <?=$item['price']?></p>
            <button class="buy" data-id="<?=$item['id']?>">Купить</button>
            <hr>
        </div>
    <? endforeach; ?>

</div>


<script>
    let buttons = document.querySelectorAll('.buy');

    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async ()=>{
                const response = await fetch('/api/buy/'+id);

                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
            })();
        })
    });
</script>