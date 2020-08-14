<?php

class Register extends Controller {
    private $_model;

    /* ubuduce moglo bi se ubaciti koji tacno model zelimo za taj request, nece mozda uvijek biti goals */
    public function __construct() {
        parent::__construct("Register");
        $this->_model = new Users(); //dodaj model
    }

    public function help_action () {
        $this->_view->render("help_action");  
    }

    public function login_action() {
        $this->_view->render('login_action');
    }

    public function login_or_register_user_action($username, $password) {
        $uspjelo = $this->_model->add_user($username, $password);
        if (!$uspjelo) {
            $this->_view->render('login_action', 'Šifra za korisnika nije tačna!');
            exit();
        }
        header('Location: /');
	#mozda moze ostati /moci kada dodamo server name i alias u apache konfiguraciju!
        exit();
    }
}


?>
