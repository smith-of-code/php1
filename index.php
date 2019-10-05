<?php

echo renderTemplate('layout', renderTemplate('index'), renderTemplate('menu'));


function renderTemplate($page, $content = '', $menu = '')
{
    ob_start();
    include "./templates/{$page}.php";
    return ob_get_clean();
}