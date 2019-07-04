<?php

class DB {
    private static $_instance = null;
    private $_pdo, $_query, $_error = false, $_result;
    
    private function __construct() {
        try {
            $this->_pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function query($sql, $params = []) {
        $this->_error = false;

        $this->_query = $this->_pdo->prepare($sql);

        if ($this->_query) { 
            /**
             * probaj i if($this->_query instance of PDOExceptio ili PDOStatement)
             */
            $x = 1;
            if (count($params) > 0) {
                foreach ($params as $param) {
                   $this->_query->bindValue($x, $param);
                   $x++; 
                }
            }
        }

        if ($this->_query->execute()) {
            return $this->_query->fetchAll(PDO::FETCH_ASSOC);
        }

        else return false;
    }

    public function update($table, $uname, $fields = []) {
        $fieldString = '';
        $values = [];

        foreach($fields as $field => $value) {
            $fieldString .= ' ' . $field . ' =  ?,';
            $values[] = $value;
        }

        $fieldString = trim($fieldString);
        $fieldString = rtrim($fieldString , ',');



        $sql = "UPDATE {$table} SET {$fieldString} where uname={$uname};";

        if ($this->query($sql, $values) !== false) return true;
        return false;
    }



    //99.9% used for life goals which get completely deleted after done
    public function delete($table, $uname)  {
        $sql = "DELETE FROM {$table} WHERE uname={$uname};";
        if ($this->query($sql) !== false) return true;
        return false;
    }

    public function insert($table, $params = []) {
        $fieldsQuery = "";
        $valuesQuery = "";
        $values = [];


        foreach ($params as $field => $value) {
            $fieldsQuery .= '`'. $field .'`';
            $valuesQuery .= '?,';
            $values[] = $value;
        }

        $fieldsQuery = rtrim($fieldsQuery, ',');
        $valuesQuery = rtrim($valuesQuery, ',');

        $sql = "INSERT INTO {$table} ({$fieldsQuery}) VALUES ({$valuesQuery});";

        if ($this->query($sql, $values) !== false) return true;
        else return false;
    } 

}



?>