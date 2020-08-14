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
}


?>