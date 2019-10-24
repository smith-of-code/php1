<table width="100%" border="1px">
    <tr class="main-row">
        <td>Имя</td>
        <td>Телефон</td>
        <td>Товары</td>
        <td>Статус</td>
    </tr>
<? foreach ($carts as $cart):?>
    <tr id="carts_item" >
        <td><?=$cart['name']?></td>
        <td><?=$cart['phone']?></td>
        <td><button class="get_products" data-session="<?=$cart['session_id']?>">посмотреть товары</button></td>
        <td id="cart-status_<?=$cart['id']?>"><?=$cart['status']?></td>
        <td>
            <button class="confirm" data-id="<?=$cart['id']?>">подвердить заказ</button>
            <button class="cancel" data-id="<?=$cart['id']?>">отвергнуть заказ</button>
        </td>
    </tr>
<? endforeach;?>
</table>
<div id="products">

</div>
<script>
    let getProducts = document.querySelectorAll('.get_products');

    let confirm = document.querySelectorAll('.confirm');

    let cancel = document.querySelectorAll('.cancel');

    getProducts.forEach((elem) => {
        elem.addEventListener('click', () => {
            let session = elem.getAttribute('data-session');
            (async ()=>{
                const response = await fetch('/api/getproducts/?session='+session);
                const answer = await response.json();
                let divprod = document.querySelector('#products');
                divprod.innerHTML = '';
                for (let item in answer){
                    console.log(answer[item]);
                    let result =`
                <div id="${answer[item]['cart_id']}" data-id="${answer[item]['cart_id']}">
                <a href="/product/${answer[item]['cart_id']}"><h3>${answer[item]['name']}</h3></a>
                <p>Колличество <span id="item-count_${answer[item]['cart_id']}">${answer[item]['count']}</span></p>
                <p>Общая цена: <span id="item-sum_${answer[item]['cart_id']}">${answer[item]['price'] * answer[item]['count']}</span></p>
            <hr>
    </div>
                `;
                    divprod.innerHTML += result;
                }
            })();
        })
    });

    confirm.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async ()=>{
                const response = await fetch('/api/aprovecart/'+id);
                const answer = await response.json();

                document.getElementById('cart-status_'+id).innerText = answer['cartStatus'];

            })();
        })
    });
    cancel.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async ()=>{
                const response = await fetch('/api/disaprovecart/'+id);
                const answer = await response.json();

                document.getElementById('cart-status_'+id).innerText = answer['cartStatus'];

            })();
        })
    });




</script>
