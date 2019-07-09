<?php

class View  {
    protected $_body, $_outBuffer, $_goals="";
    //protected $_head, $_siteTitle, $_layout;
    private $_controller;

    public function __construct($controller) {
        $this->_controller = $controller;
    }

    public function render($action) {
        include(DIR."/public/{$this->_controller}/{$action}/index.php");
    }

    //ove funkcije bi se trebale nekako odvojiti kao posebne za Home view, nema logike sve viewe držati ovdje
    public function render_daily_goals() {
        $db = DB::get_instance();
        
        $result = $db->query("SELECT * FROM goals WHERE `uname`='{$_SESSION['uname']}' AND `type`='daily';");

        for($i = 0; $i < count($result); $i++) {
            $this->_goals .= "<div class='dailyGoal ";
            if($result[$i]['completed'] == 1) {
                $this->_goals .= "dailyGoalDone' data-click-cnt=\"1\"";
            }
            $this->_goals .= "' onclick=\"remove_goal(this)\">";
            $this->_goals .= $result[$i]['description'].'</div>';
        }
        return;
    }

    public function render_life_goals() {
        $db = DB::get_instance();
        
        $result = $db->query("SELECT * FROM goals WHERE `uname`='{$_SESSION['uname']}' AND `type`='life';");

        for($i = 0; $i < count($result); $i++) {
            $this->_goals .= "<div class='lifeGoal ";
            if($result[$i]['completed'] == 1) {
                $this->_goals .= "lifeGoalDone";
            }
            $this->_goals .= "' onclick=\"remove_goal(this)\">";
            $this->_goals .= $result[$i]['description'].'</div>';
        }
        return;
    }
}




?>