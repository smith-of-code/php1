<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';


dumpLoad();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}



$params = prepareVariables($page);

echo render($page, $params);