<?php

class Users {
    private $_tableName, $_db;

    public function __construct()
    {
        $this->_tableName = 'users';
        $this->_db = DB::get_instance();
    }

    public function add_user($uname) {
        $a = $this->_db->query("SELECT * FROM users WHERE `uname`='{$uname}'");
        //u db napravi funkciju check, napravi querije sa AND i uslovima, ovo je messy
        
        if (!$a) {
            $result = $this->_db->insert($this->_tableName, [
                'uname' => $uname
            ]);
        }
        else $result = false;

        if ($result || $uname=='elva') {
            $_SESSION['uname'] = $uname;
            return true;
        }

        else return false;
    }
}



?>