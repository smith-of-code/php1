<?php

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
            $menu[$item['parent']]['subitem'][$id] = &$item;
        }
    }
    return $timberMenu;
}

