<?php
//maybe add core Model.php in future?


class Goals extends Model {
    public function __construct() {
        parent::__construct('daily_goals');
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

    public function remove_daily_goal($uname, $description, $type) {
        $result = $this->_db->delete($this->_tableName, [
            'uname' => $uname,
            'description' => $description,
            'type' => $type,
            'completed' => 1    
        ]);

        if ($result) return true;
        else return false;
    }

    public function remove_life_goal($uname, $description, $type) {
        $result = $this->_db->delete($this->_tableName, [
            'uname' => $uname,
            'description' => $description,
            'type' => $type,   
        ]);

        if ($result) return true;
        else return false;
    }

    public function refresh_daily_goals($uname) {

        $result = $this->_db->update($this->_tableName, [
                'uname' => $uname,
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