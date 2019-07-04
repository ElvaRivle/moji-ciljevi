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

    public function remove_daily_goal($uname, $description, $type) {

        $result = $this->_db->delete($this->_tableName, [
            'description' => $description,
            'type' => $type
        ]);

        //REKLI SMO DA CEMO SAMO OZNACITI KAO ZAVRSEN, NE BRISATI GA
        //DA BI TO URADILI MORAMO PREUREDITI I update DB FUNKCIJU

        if ($result) return true;
        else return false;
    }
}



?>