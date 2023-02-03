<?php

require_once("/src/model/repositories/UsersRepo.php");

if(isset($_SESSION["signup"])){
    $_POST["email"] = $_SESSION["signup"]["email"];
    $_POST["password"] = $_SESSION["signup"]["password"];
}

$usersRepo = new UsersRepo($dbConnection);
$_SESSION["user"] = $usersRepo->getByEmailAndPassword($_POST['email'],$_POST['password']);

/**
 * If user doesn't exist send error or redirect to the signup action.
 * Else (he is connected):
 * - if connected as admin : redirect
 * - else : redirect where he comes from but as connected user
 */

if(empty($_SESSION["user"])){
    unset($_SESSION["user"]);
    if(isset($_POST["name"])){
        $_SESSION["signup"] = array(
            "name" => $_POST["name"],
            "email" => $_POST["email"],
            "password" => $_POST["password"]
        );
        header("Location:".$url->original."?action=signup");
        exit();
    }
    header("Location:".$url->original."?error=1");
} else if($_SESSION["user"]["status"] == "admin"){
    header('Location:'.$url->head."/adminpanel");   
} else {
    header('Location:'.$url->original);
}
