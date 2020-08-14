<?php

class AuthenticationController extends Controller {

    public function __construct() {
        parent::__construct(new UsersModel());
    }

    public function index_action() {
        $this->_view->render('Register/login');
    }

    public function login_or_register_user_action($username, $password) {
        $uspjelo = $this->_model->add_user($username, $password);
        if (!$uspjelo) {
            $this->_view->render('Register/login', [
                'errors' => "Sifra korisnika {$username} neispravna!"
            ]);
            exit();
        }
        header('Location: /');
        exit();
    }
    
}


?>
