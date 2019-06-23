<?php

class Router {

    public static function route($url) {
        $controller = (isset($url[0]) && $url[0] != "") ? ucwords($url[0]) : DEFAULT_CONTROLLER;
        array_shift($url);
        $action = (isset($url[0]) && $url[0] != "") ? $url[0].'Action' : DEFAULT_ACTION;
        array_shift($url);

        $params = $url;

        $dispatch = new $controller($controller, $action);

    }

}


?>