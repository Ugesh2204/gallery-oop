<?php

/*defining path for photo */
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
/*  /c/wamp64/www/gallery  */
define('SITE_ROOT', DS . 'c' . DS . 'wamp64' . DS . 'www' . DS . 'gallery');

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');


require_once("functions.php");
require_once("new_config.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once("photo.php");
require_once("session.php");


?>