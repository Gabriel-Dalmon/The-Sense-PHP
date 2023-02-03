<?php 

require_once("/src/model/repositories/UsersRepo.php");

if(isset($_SESSION["signup"])){

    $usersRepo = new UsersRepo($dbConnection);
    $usersRepo->insert($_SESSION["signup"]['name'],$_SESSION["signup"]['email'],$_SESSION["signup"]['password']);
}
header('Location:'.$url->original."?action=login");