<?php

class Model {
    protected $_tableName, $_db;

    public function __construct($tableName) {
        $this->_tableName = $tableName;
        $this->_db = DB::get_instance();
    } 
}


?>