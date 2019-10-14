<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';


dumpLoad();

$url_array = explode("/", $_SERVER['REQUEST_URI']);

if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
}


$params = prepareVariables($page);

echo render($page, $params);