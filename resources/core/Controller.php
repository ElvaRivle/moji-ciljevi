<?php

class Controller {
    protected $_view;

    public function __construct($controllerName) {
        $this->_view = new View($controllerName);
    }
}


?>