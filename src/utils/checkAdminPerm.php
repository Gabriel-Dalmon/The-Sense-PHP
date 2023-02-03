<?php

if(!isset($_SESSION["user"]) || $_SESSION["user"]["status"] !== "admin"){
    header('Location:'.$url->original);
    exit();
}
