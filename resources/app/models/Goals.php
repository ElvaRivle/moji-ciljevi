<?php
//maybe add core Model.php in future?


class Goals /*extends Model */{
    private $_tableName, $_db;

    public function __construct() {
        $this->_tableName = 'goals';
        $this->_db = DB::get_instance();
    }

    public function add_daily_goal($uname, $description) {

        $result = $this->_db->insert($this->_tableName, [
            'uname' => $uname,
            'description' => $description,
            'type' => 'daily'
        ]);

        if ($result) return true;
        else return false;
    }
}



?>