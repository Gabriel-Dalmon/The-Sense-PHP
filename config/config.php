<?php 
    session_start();

    require_once("/src/utils/Url.php");

    if(isset($_COOKIE["language"])){
        $_SESSION["language"] = $_COOKIE["language"];
    } else {
        $_SESSION["language"] = "fr";
        setcookie("language", $_SESSION["language"],time() + 86400);
    }



    $dbConnection = new PDO(
        'mysql:host=localhost;dbname=the_sense;',
        'root',
        'root',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
    );
    
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    $url = Url::constructWithBreakpoint($_SERVER['REQUEST_URI'], "TheSenseApp");
?>