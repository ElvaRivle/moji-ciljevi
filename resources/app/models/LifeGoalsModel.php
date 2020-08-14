<?php


class LifeGoalsModel extends Model {
    public function __construct() {
        parent::__construct('life_goals');
    }

    public function add_goal($description) {
        $this->_db = DB::get_instance();

        $user = new UsersModel();
        //racunam da ovdje vec postoji korisnik, necu provjeravati
        $user = $user->get_user($_SESSION['username']);

        $result = $this->_db->insert($this->_tableName, [
            'description' => $description,
            'user_id' => $user[0]['id']
        ]);

        if ($result) return true;
        else return false;
    }

    public function remove_goal($description) {
        $result = $this->_db->delete($this->_tableName, [
            'username' => $_SESSION['username'],
            'description' => $description 
        ]);

        if ($result) return true;
        else return false;
    }
}



?>