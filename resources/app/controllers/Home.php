<?php

class Home extends Controller {

    public function __construct(/* ubuduce moglo bi se ubaciti koji tacno model zelimo za taj request, nece mozda uvijek biti goals */) {
        parent::__construct("Home");
        $this->_model = new Goals();
    }

    public function daily_goals_action () {
        $this->_view->render_daily_goals();
        $this->_view->render("daily_goals_action");   
    }

    public function life_goals_action() {
        $this->_view->render_life_goals();
        $this->_view->render("life_goals_action");
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

    public function remove_life_goal_action($uname, $description, $type) {
        if ($this->_model->remove_life_goal($uname, $description, $type))
            echo "USPJELO";
        else echo "NIJE USPJELO";
    }

    public function refresh_goals_action($uname) {
        if ($this->_model->refresh_daily_goals($uname)) 
            echo "USPJELO";
        else echo "NIJE USPJELO";
    }
}


?>