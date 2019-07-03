<?php
//all config goes here and only this will be loaded by index.php


require_once('bootstrap.php');
require_once('helper_funcs.php');

define('DEFAULT_CONTROLLER', 'Home');
define('DEFAULT_ACTION', 'index_action');

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', 'elvaroot');
define('DB_NAME', 'moji-ciljevi');
?>