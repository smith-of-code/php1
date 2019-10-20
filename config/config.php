<?php
define('DIR_ROOT',dirname(__DIR__) );
define('TEMPLATES_DIR', DIR_ROOT.'/templates/');
define('LAYOUTS_DIR', '/layouts/');
define('GALLERY_DIR', './img/gallery');
define('CATALOG_IMG', './img/catalog');
define('DUMP_DIR', './data');

define('HOST', 'localhost');
define('USER', 'andy');
define('PASS', '12345');
define('DB','php1');


require_once DIR_ROOT . "/engine/db.php";
require_once DIR_ROOT . "/engine/functions.php";
require_once DIR_ROOT . "/engine/menu.php";
require_once DIR_ROOT . "/engine/gallery.php";
require_once DIR_ROOT . "/engine/catalog.php";
require_once DIR_ROOT . "/engine/feedback.php";
require_once DIR_ROOT . "/engine/calculator.php";


