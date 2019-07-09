<?php
//all config goes here and only this will be loaded by index.php

ini_alter('session.cookie_lifetime', '31556926');
ini_alter('session.gc_lifetime', '31556926');
// bolje idi sa gc probability i divisor
//https://stackoverflow.com/questions/7828975/php-garbage-collection-clarification

require_once('bootstrap.php');
require_once('helper_funcs.php');

define('DEFAULT_CONTROLLER', 'Home');
define('DEFAULT_ACTION', 'daily_goals_action');

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', 'elvaroot');
define('DB_NAME', 'moji_ciljevi');
?>