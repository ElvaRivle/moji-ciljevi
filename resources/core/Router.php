<?php

class Router {

    public static function route($url) {
        $controller = (isset($url[0]) && $url[0] != "") ? ucwords($url[0]).'Controller' : DEFAULT_CONTROLLER;
        array_shift($url);
        $action = (isset($url[0]) && $url[0] != "") ? $url[0].'_action' : DEFAULT_ACTION;
        array_shift($url);

        $params = $url;

        if (class_exists($controller)) $dispatch = new $controller();
        else {
            echo "Kontroler {$controller} ne postoji";
            die();
        }


        if (method_exists($dispatch, $action)) {
            call_user_func_array([$dispatch, $action], $params);
        }
        else {
            echo "Akcija {$action} kontrolera {$controller} ne postoji";
            die();
        }

    }

}


?>