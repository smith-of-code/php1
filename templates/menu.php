<?
function renderMainMenu($menu){
    $result = "";
    foreach ($menu as $item) {
        if (isset($item['subitem'])){
            $result .=
                "<li class='menu__item drop__item'>
                    <a href='{$item['link']}'>{$item['title']}</a>
                    <ul class='sub__menu'>". renderMainMenu($item['subitem']) ."</ul>
                </li>";
        }else{
            $result .= "<li class='menu__item'>
                            <a href='{$item['link']}'>{$item['title']}</a>
                        </li>";
        }
    }
    return $result;
}
?>

<?if (!$allow) :?>

    <form action="/auth/login/" method="post">
        <input type='text' name='login' placeholder='Логин'>
        <input type='password' name='pass' placeholder='Пароль'>
        Save? <input type='checkbox' name='save'>
        <input type='submit' name='send'>
    </form>

<? else: ?>
    Добро пожаловать! <?=$user?> <a href="/auth/logout">Выход</a><br>
<? endif; ?>
<ul class="menu">
    <?= renderMainMenu($nav)?>
    <li> товаров в корзине <span id="count"><?=$count?></span></li>
    <? if ($admin):?>
        <li ><a class="admin" href="/admin/">Админка</a></li>
    <? endif;?>



</ul>

