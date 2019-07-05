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

    public function render_goals($type) {
        $db = DB::get_instance();
        
        $result = $db->query("SELECT * FROM goals WHERE `uname`='rusko' AND `type`='{$type}';");

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
}




?>