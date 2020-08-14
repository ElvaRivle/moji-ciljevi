<?php
//all config goes here and only this will be loaded by index.php

ini_alter('session.cookie_lifetime', '31556926');
ini_alter('session.gc_lifetime', '31556926');
// bolje idi sa gc probability i divisor
//https://stackoverflow.com/questions/7828975/php-garbage-collection-clarification

require_once('bootstrap.php');
require_once('helper_funcs.php');

define('DEFAULT_CONTROLLER', 'DailyGoalsController');
define('DEFAULT_ACTION', 'index_action');
#napraviti novog korisnika na bazi, vezat ga i za localhost i za % i to staviti u user i pass
define('DB_HOST', 'localhost');
define('DB_USER', 'moci');
define('DB_PASS', 'moci123');
define('DB_NAME', 'moci');
?>
