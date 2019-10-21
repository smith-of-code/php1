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
<p></p>
<ul class="menu">
    <?= renderMainMenu($nav)?>
    <li>товаров в корзине <?=$count?></li>

</ul>

