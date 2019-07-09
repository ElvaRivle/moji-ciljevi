<?php

define('DIR', __DIR__);

require_once(DIR."/resources/config.php");


session_start();

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];


if (!isset($_COOKIE['PHPSESSID']) && $url != ['Register', 'login']) $url = ['Register', 'help'];
if (isset($_COOKIE['PHPSESSID']) && !isset($_SESSION['uname'])) $url = ['Register', 'login'];

if (isset($_POST['uname'])) {
    $url = ['Register','add_user',$_POST['uname']];
}



Router::route($url);
?>