<?php

class View  {
    protected $_body, $_outBuffer;
    //protected $_head, $_siteTitle, $_layout;
    private $_controller;

    public function __construct($controller) {
        $this->_controller = $controller;
    }

    public function render($action) {
        include(DIR."/public/{$this->_controller}/{$action}/index.php");
    }
}




?>