<?php
$h1 = "Информация обо мне";
$title = "Главная страница - страница обо мне";
$year = date('Y');
$content = file_get_contents('main2.tmpl');
$content = str_replace("{{h1}}","$h1","$content");
$content = str_replace("{{title}}","$title","$content");
$content = str_replace("{{year}}","$year","$content");
echo $content;