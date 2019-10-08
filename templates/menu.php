<?
function getMenuItem($menu){
    $result = "";
    foreach ($menu as $title => $link){
        if (is_array($link)){
            $result .= "<li class='menu__item drop__item'>$title<ul class='sub__menu'>". getMenuItem($link) ."</ul></li>";
        }else{
            $result .= "<li class='menu__item'><a href='$link'>$title</a></li>";
        }
    }
    return $result;
}
?>
<ul class="menu">
 <?=getMenuItem($nav)?>
</ul>

