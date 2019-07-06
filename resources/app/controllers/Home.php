<?php

class Home extends Controller {
    private $_model;

    public function __construct(/* ubuduce moglo bi se ubaciti koji tacno model zelimo za taj request, nece mozda uvijek biti goals */) {
        parent::__construct("Home");
        $this->_model = new Goals();
    }

    public function daily_goals_action () {
        $this->_view->render_goals('daily');
        $this->_view->render("daily_goals_action");   
    }

    public function add_goal_action($uname, $description, $type) {
        if ($this->_model->add_goal($uname, $description, $type)) 
            echo "USPJELO";
        else echo "NIJE USPJELO";
    } 

    public function mark_daily_goal_done_action($uname, $description, $type) {
        if ($this->_model->mark_daily_goal_done($uname, $description, $type)) 
            echo "USPJELO";
        else echo "NIJE USPJELO";
    }

    public function remove_daily_goal_action($uname, $description, $type) {
        if ($this->_model->remove_daily_goal($uname, $description, $type))
            echo "USPJELO";
        else echo "NIJE USPJELO";
    }
}


?>