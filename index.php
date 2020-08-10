<?php

define('DIR', __DIR__);

require_once(DIR."/resources/config.php");


session_start();

$url = ($_SERVER['REQUEST_URI'] !== '/') ? explode('/', ltrim($_SERVER['REQUEST_URI'], '/')) : [];

if (!isset($_COOKIE['PHPSESSID'])) $url = ['Register', 'login'];

else {
    if (empty($url) && !isset($_SESSION['username']) && $_SERVER['REQUEST_METHOD'] !== 'POST') {
        $url = ['Register', 'login'];
    }
    else if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($url) && !isset($_SESSION['username'])) {
        $url = ['Register', 'login_or_register_user', $_POST['username'], $_POST['password']];
    }
}

if (empty($url) && isset($_SESSION['username'])) $url = [];



Router::route($url);
?>