<h2>Корзина</h2>
<form action="/confirmation/" method="post">
    <legend>Имя: <input type="text" name="name" required></legend>
    <legend>Номер телефона: <input type="text" name="phone" required></legend>
    <button type="submit">Оформить корзину</button>
</form>
<? foreach ($cart as $item):?>
    <div id="<?=$item['cart_id']?>" data-id="<?=$item['cart_id']?>">
        <a href="/product/<?=$item['id']?>"><h3><?=$item['name']?></h3></a>
        <a href="/product/<?=$item['id']?>"><img src="<?=CATALOG_IMG?>/small/<?=$item['image']?>" alt="<?=$item['image']?>"></a>
        <a href="/product/<?=$item['id']?>"><?=$item['short_desc']?></a>

        <p> цена <span id="item-price_<?=$item['cart_id']?>"><?=$item['price']?></span></p>

        <p>Колличество <span id="item-count_<?=$item['cart_id']?>"><?=$item['count']?></span></p>

        <p>Общая цена: <span id="item-sum_<?=$item['cart_id']?>"><?=$item['price'] * $item['count']?></span></p>

        <button class="delete" data-id="<?=$item['cart_id']?>">удалить</button>
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

                document.getElementById('item-count_'+id).innerText = answer['itemCount'];
                document.getElementById('item-sum_'+id).innerText = answer['itemCount'] * document.getElementById
                ('item-price_'+id).innerText;

                document.getElementById('count').innerText = answer.count;

                if (answer.itemCount < 1){
                    document.getElementById(id).remove();
                }

            })();
        })
    });

</script>
