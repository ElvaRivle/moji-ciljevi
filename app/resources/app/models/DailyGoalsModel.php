<?php


class DailyGoalsModel extends Model {
    public function __construct() {
        parent::__construct('daily_goals');
    }

    public function get_all_goals() {
        $this->_db = DB::get_instance();
        $user = new UsersModel();
        $user = $user->get_user($_SESSION['username']);
        $userID = $user[0]['id'];
        return $this->_db->query("SELECT * FROM `{$this->_tableName}` WHERE `user_id`='{$userID}'");
    }

    public function add_goal($description) {
        $this->_db = DB::get_instance();

        $user = new UsersModel();
        //racunam da ovdje vec postoji korisnik, necu provjeravati
        $user = $user->get_user($_SESSION['username']);

        $result = $this->_db->insert($this->_tableName, [
            'description' => $description,
            'user_id' => $user[0]['id'],
            'completed' => 0
        ]);

        if ($result) return true;
        else return false;
    }

    public function mark_goal_done($description) {
        $this->_db = DB::get_instance();
        $user = new UsersModel();
        $user = $user->get_user($_SESSION['username']);
        $userID = $user[0]['id'];

        $result = $this->_db->update($this->_tableName, [
                'user_id' => $userID,
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
        $this->_db = DB::get_instance();
        $user = new UsersModel();
        $user = $user->get_user($_SESSION['username']);
        $userID = $user[0]['id'];

        $result = $this->_db->delete($this->_tableName, [
            'user_id' => $userID,
            'description' => $description,
            'completed' => 1
        ]);

        if ($result) return true;
        else return false;
    }

    public function refresh_goals() {
        $this->_db = DB::get_instance();
        $user = new UsersModel();
        $user = $user->get_user($_SESSION['username']);
        $userID = $user[0]['id'];

        $result = $this->_db->update($this->_tableName, [
                'user_id' => $userID,
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