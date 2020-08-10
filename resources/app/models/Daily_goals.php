<?php
//maybe add core Model.php in future?


class Daily_goals extends Model {
    public function __construct() {
        parent::__construct('daily_goals');
    }

    public function add_goal($description) {
        $this->_db = DB::get_instance();

        $user = new Users();
        //racunam da ovdje vec postoji korisnik, necu provjeravati
        $user = $user->get_user($_SESSION['username']);

        $result = $this->_db->insert($this->_tableName, [
            'description' => $description,
            'user_id' => $user[0]['id']
        ]);

        if ($result) return true;
        else return false;
    }

    public function mark_goal_done($description) {

        $result = $this->_db->update($this->_tableName, [
                'username' => $_SESSION['username'],
                'description' => $description
            ],
            [
                'completed' => 1
            ]
        );

        if ($result) return true;
        else return false;
    }

    public function remove_goal($description) {
        $result = $this->_db->delete($this->_tableName, [
            'username' => $_SESSION['username'],
            'description' => $description,
            'completed' => 1    
        ]);

        if ($result) return true;
        else return false;
    }

    public function refresh_daily_goals() {

        $result = $this->_db->update($this->_tableName, [
                'username' => $_SESSION['username'],
            ],
            [
                'completed' => 0
            ]
        );

        if ($result) return true;
        else return false;
    }
}



?>