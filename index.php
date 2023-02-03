<?php 
    require_once("/config/routes.php");
    require_once("/config/config.php");


    function request_handling($url, $routes,$dbConnection) {
        if(isset($url->GET["action"])){
            require("/src/controllers/actions/".$url->GET["action"].".php");
        } else if(!isset($routes[$url->relative])) {
            require("/src/controllers/pages/homepage.php");
        } else {
            require("/src/controllers/pages/".$routes[$url->relative].".php");
        }
    }

    if(isset($url)){
        request_handling($url, $routes,$dbConnection);
    } else {
        require("/src/controllers/pages/errorpage.php");
    }
?>