<?php

class Home extends Controller {
    public function __construct() {
        parent::__construct("Home");
    }

    public function index_action () {
        $this->_view->render("index_action");   
    }
}


?>