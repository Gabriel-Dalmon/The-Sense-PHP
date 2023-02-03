<?php

require_once("/src/model/repositories/PagesRepo.php");
require_once("/src/model/repositories/ComponentsRepo.php");

$pagesRepo = new PagesRepo($dbConnection);
$componentsRepo = new ComponentsRepo($dbConnection);

if(isset($_SESSION["edit"]["name"])){
    $name=$_SESSION["edit"]["name"];
}   else{
    $name=$_POST["name"];
    unset($_POST["name"]);
}

foreach($_FILES as $key => $file){
    if(explode("/",$file['type'])[0] == "image" && $file['error']==0){
        $destination = "templates/images/".strval(rand(0,999999)).$file['name'];
        move_uploaded_file($file['tmp_name'],$destination);
        $_POST[$key]=$destination;
    }
}



$pagesRepo->insert($name,$_SESSION["edit"]["template"],$_POST["language"]);
unset($_POST["language"]);
$page_id=intval($dbConnection->lastInsertId());

foreach($_POST as $key => $content){
    $type=explode("&",$key)[0];
    $name=explode("&",$key)[1];
    $componentsRepo->insert($page_id, $type, $name, $content);
}

header('Location:'.$url->original);



?>