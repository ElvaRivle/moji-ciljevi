<?php
//maybe add core Model.php in future?


class Goals /*extends Model */{
    private $_tableName, $_db;

    public function __construct() {
        $this->_tableName = 'goals';
        $this->_db = DB::get_instance();
    }

    public function add_goal($uname, $description, $type) {

        $result = $this->_db->insert($this->_tableName, [
            'uname' => $uname,
            'description' => $description,
            'type' => $type
        ]);

        if ($result) return true;
        else return false;
    }

    public function mark_daily_goal_done($uname, $description, $type) {

        $result = $this->_db->update($this->_tableName, [
                'uname' => $uname,
                'description' => $description,
                'type' => $type
            ],
            [
                'completed' => 1
            ]
        );

        if ($result) return true;
        else return false;
    }
}



?>