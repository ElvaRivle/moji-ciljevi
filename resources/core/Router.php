<?php

class Router {

    public static function route($url) {
        $controller = (isset($url[0]) && $url[0] != "") ? ucwords($url[0]) : DEFAULT_CONTROLLER;
        array_shift($url);
        $action = (isset($url[0]) && $url[0] != "") ? $url[0].'_action' : DEFAULT_ACTION;
        array_shift($url);

        $params = $url;

        $dispatch = new $controller();


        if (method_exists($dispatch, $action)) {
            call_user_func_array([$dispatch, $action], $params);
        }
        else {
            echo 'Akcija kontrolera ne postoji<br>';
            die();
        }

    }

}


?>