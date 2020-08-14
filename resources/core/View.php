<?php

class View  {
    
    //protected $_body, $_outBuffer, 
    //protected $_head, $_siteTitle, $_layout;

    public function render($templatePath, $params = []) {
        ob_start();
        include(DIR."/public/{$templatePath}/index.php");
        ob_flush();
    }
}




?>