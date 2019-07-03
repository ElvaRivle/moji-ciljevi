<?php

define('DIR', __DIR__);

require_once(DIR."/resources/config.php");




$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];

session_start();

Router::route($url);
?>