<?php

require_once("/src/model/repositories/UsersRepo.php");

if($_SESSION["user"]["id"] != $_POST["id"]){
    require("/src/utils/checkAdminPerm.php");
}
$usersRepo = new UsersRepo($dbConnection);
$usersRepo->delete($_POST["id"]);

header('Location:'.$url->original);