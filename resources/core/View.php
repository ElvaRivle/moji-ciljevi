<?php

class View  {
    
    //protected $_body, $_outBuffer, 
    protected $_goals="";
    //protected $_head, $_siteTitle, $_layout;

    public function render($templatePath, $params = []) {
        ob_start();
        include(DIR."/public/{$templatePath}/index.php");
        ob_flush();
    }

    //funkcionalnost ovih funkcija samo premjestiti u index.php posebnih view-ova
    //tamo napraviti for petlje, dodati sta treba...
    //naravno, iz kontrolera izvuci ciljeve, sigurno ne odavde i to poslati u template
    public function render_daily_goals() {
        $db = DB::get_instance();
        
        $result = $db->query("SELECT * FROM goals WHERE `username`='{$_SESSION['username']}' AND `type`='daily';");

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
        
        $result = $db->query("SELECT * FROM goals WHERE `username`='{$_SESSION['username']}' AND `type`='life';");

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