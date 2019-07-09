<?php

class Register extends Controller {
    private $_model;

    public function __construct(/* ubuduce moglo bi se ubaciti koji tacno model zelimo za taj request, nece mozda uvijek biti goals */) {
        parent::__construct("Register");
        $this->_model = new Users(); //dodaj model
    }

    public function help_action () {
        $this->_view->render("help_action");  
    }

    public function login_action() {
        $this->_view->render('login_action');
    }

    public function add_user_action($uname) {
        $this->_model->add_user($uname); //debagaj ovdje
        header('Location: /moci');
        exit();
    }
}


?>