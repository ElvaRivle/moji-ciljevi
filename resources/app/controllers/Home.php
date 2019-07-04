<?php

class Home extends Controller {
    public function __construct() {
        parent::__construct("Home");
    }

    public function index_action () {
        $this->_view->render("index_action");   
    }

    public function add_goal_action($uname, $description, $type) {
        $model = new Goals();
        if ($model->add_goal($uname, $description, $type)) 
            echo "USPJELO";
        else echo "NIJE USPJELO";
    } 

    public function remove_goal_action($uname, $description, $type) {
        $model = new Goals();
        if ($model->remove_daily_goal($uname, $description, $type)) 
            echo "USPJELO";
        else echo "NIJE USPJELO";
    }
}


?>