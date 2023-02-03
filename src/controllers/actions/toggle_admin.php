<?php

require_once("/src/model/repositories/UsersRepo.php");

require("/src/utils/checkAdminPerm.php");

if($_SESSION["user"]["id"] != $_POST["id"]){
    $usersRepo = new UsersRepo($dbConnection);
    $usersRepo->updateStatus($_POST["id"], $_POST["new-status"]);
}


header('Location:'.$url->original);