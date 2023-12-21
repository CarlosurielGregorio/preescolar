<?php
session_start();


/* Default options */

if(isset($_SESSION['loggedin']) == true){
    define("DEFAULT_CONTROLLER", "dashboard");
    define("DEFAULT_ACTION", "panel");
}else{
    define("DEFAULT_CONTROLLER", "admin");
    define("DEFAULT_ACTION", "login");
}


?>