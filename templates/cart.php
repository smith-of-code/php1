<h2>Корзина</h2>
<form action="/confirmation/" method="post">
    <legend>Номер телефона: <input type="text" name="phone" required></legend>
    <button type="submit">Оформить корзину</button>
</form>
<? foreach ($cart as $item):?>
    <div>
        <a href="/product/<?=$item['id']?>"><h3><?=$item['name']?></h3></a>
        <a href="/product/<?=$item['id']?>"><img src="<?=CATALOG_IMG?>/small/<?=$item['image']?>" alt="<?=$item['image']?>"></a>
        <a href="/product/<?=$item['id']?>"><?=$item['short_desc']?></a>
        <p>Колличество <?=$item['count']?></p>
        <p>Общая цена: <?=$item['price'] * $item['count']?></p>
        <button class="delete" data-id="<?=$item['id']?>">удалить</button>
        <hr>
    </div>

<? endforeach;?>

<script>
    let buttons = document.querySelectorAll('.delete');

    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async ()=>{
                const response = await fetch('/api/delete/'+id);
                const answer = await response.json();
                // document.getElementById('count').innerText = answer.count;
            })();
        })
    });

</script>
