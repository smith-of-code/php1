<?php
define('DIR_ROOT',dirname(__DIR__) );
define('TEMPLATES_DIR', DIR_ROOT.'/templates/');
define('LAYOUTS_DIR', '/layouts/');
define('GALLERY_DIR', './img');

define('HOST', 'localhost');
define('USER', 'andy');
define('PASS', '12345');
define('DB','php1');


require_once DIR_ROOT . "/engine/db.php";
require_once DIR_ROOT . "/engine/functions.php";
require_once DIR_ROOT . "/engine/gallery.php";


