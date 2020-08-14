<?php

class DailyGoalsController extends Controller {

    public function __construct()
    {
        parent::__construct(new DailyGoalsModel());
    }

    public function index_action($params = []) {
        $goals = $this->_model->get_all_goals();
        return $this->_view->render('Home/daily_goals', [
            'goals' => $goals
        ]);
    }

    //ajax
    public function add_goal_action($description) {
        if ($this->_model->add_goal($description)) {
            echo "USPJELO";
        }
        else echo "NIJE USPJELO";
    }

    //ajax
    public function remove_goal_action($description) {
        if ($this->_model->remove_goal($description)) {
            echo "USPJELO";
        }
        else echo 'NIJE USPJELO';
    }

    //ajax
    public function mark_goal_done_action($description) {
        if ($this->_model->mark_goal_done($description)) 
            echo "USPJELO";
        else echo "NIJE USPJELO";
    }

    //ajax
    public function refresh_goals_action() {
        if ($this->_model->refresh_goals()) 
            echo "USPJELO";
        else echo "NIJE USPJELO";
    }
}


?>