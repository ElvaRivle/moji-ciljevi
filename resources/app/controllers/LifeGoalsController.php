<?php

class LifeGoalsController extends Controller {

    public function __construct()
    {
        parent::__construct(new LifeGoalsModel());
    }

    public function index_action($params = []) {
        $goals = $this->_model->get_all_goals();
        return $this->_view->render('Home/life_goals', [
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
}


?>