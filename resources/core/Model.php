<?php

class Model {
    private $_tableName, $_db;

    public function __construct($tableName) {
        $this->_tableName = $tableName;
        $this->_db = DB::get_instance();
    } 
}


?>