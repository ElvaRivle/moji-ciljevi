<?php

class UsersModel extends Model {

    public function __construct()
    {
        parent::__construct('users');
    }

    public function get_user($username) {
        return $this->_db->query("SELECT * FROM users WHERE `username`='{$username}'");
    }

    public function add_user($username, $password) {
        $a = $this->_db->query("SELECT * FROM users WHERE `username`='{$username}'");
        //u db napravi funkciju check, napravi querije sa AND i uslovima, ovo je messy
        
        if (!$a) {
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            $result = $this->_db->insert($this->_tableName, [
                'username' => $username,
                'password' => $passwordHash
            ]);
            $_SESSION['username'] = $username;
            return true;
        }
        //ovdje dodaj ako korisnik postoji ali mu je sifra dobra
        else if ($a) {
            if (password_verify($password, $a[0]['password'])) {
                $_SESSION['username'] = $username;
                return true;
            }
        }
        else return false;
    }
}



?>
