<?php
//autoloading functions

spl_autoload_register(function($className) {
    if (file_exists(DIR."/resources/core/".$className.".php")) {
        require_once(DIR.'/resources/core/'.$className.'.php');
    }
});



?>