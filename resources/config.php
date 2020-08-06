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
#napraviti novog korisnika na bazi, vezat ga i za localhost i za % i to staviti u user i pass
define('DB_HOST', '192.168.0.202');
define('DB_USER', 'root');
define('DB_PASS', 'elvaroot');
define('DB_NAME', 'moji_ciljevi');
?>
