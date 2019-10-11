<?php
function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
            'content' => renderTemplate($page, $params),
            'menu' => renderTemplate('menu',$params)
        ]
    );
}

function renderTemplate($page, $params = [])
{

    ob_start();
    if (!is_null($params))
        extract($params);

    $fileName = TEMPLATES_DIR . $page . ".php";

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Такой страницы не существует. 404");
    }

    return ob_get_clean();
}

function renderMenu($menu){
    $result = "";
    foreach ($menu as $item) {
            if (isset($item['subitem'])){
                $result .= "<li class='menu__item drop__item'><a href='{$item['link']}'>{$item['title']}</a><ul class='sub__menu'>".
                renderMenu($item['subitem']) ."</ul></li>";
            }else{
                $result .= "<li class='menu__item'><a href='{$item['link']}'>{$item['title']}</a></li>";
            }
    }
    return $result;
}

function renderGallery($folder){
    $result = '<div class="gallery">';
    $imgFolderBig = array_slice(scandir($folder .'/big'), 2);
    foreach ($imgFolderBig as $item){
    $result .= "<a class='gallery__item' href='". $folder . "/big/". $item . "'><img src='". $folder . "/small/".
        $item .  "'></a>" ;
    }
    $result .= '</div>';
    return $result;
}
?>




