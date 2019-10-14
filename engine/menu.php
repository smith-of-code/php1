<?php

function renderMenu($menu){
    $result = "";
    foreach ($menu as $item) {
        if (isset($item['subitem'])){
            $result .=
                "<li class='menu__item drop__item'><a href='{$item['link']}'>{$item['title']}</a><ul class='sub__menu'>".
                renderMenu($item['subitem']) ."</ul></li>";
        }else{
            $result .= "<li class='menu__item'><a href='{$item['link']}'>{$item['title']}</a></li>";
        }
    }
    return $result;
}



function getMenu(){
    $sql = "SELECT * FROM menu";
    $menuFromDb = getAssocResult($sql);
    $menu = [];
    foreach ($menuFromDb as $item){
        $menu[$item['id']] = $item;
    }

    $timberMenu = [];

    foreach ($menu as $id => &$item){
        if(!$item['parent']){
            $timberMenu[$id] = &$item;
        }else{
            $menu[$item['parent']]['childs'][$id] = &$item;
        }
    }
    return $timberMenu;
}
var_dump(getMenu());