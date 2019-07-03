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
}



?>