<?php

class Controller {
    protected $_model, $_view;

    public function __construct($model) {
        $this->_model = $model;
        $this->_view = new View();
    }
}


?>