<?php

define('DIR', __DIR__);

require_once(DIR."/resources/config.php");


$DB = DB::get_instance();

/*if ($DB->new_user("users", "rusko", 59) == false) die("NO");
else die ("YES");
*/
$DB->delete_TEST("users", 'KEMAL');

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];

session_start();

Router::route($url);
?>