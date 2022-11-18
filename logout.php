<?php

session_start();

if(!isset($_SESSION['user'])&&!isset($_SESSION['adm'])){
    header('location: index.php');
} elseif(isset($_SESSION['user'])){
    header('location: home.php');
}elseif(isset($_SESSION['adm'])){
    header('location: dashboard.php');
}

if(isset($_GET['logout'])){

    unset($_SESSION['user']);
    unset($_SESSION['adm']);


    session_unset();
    session_destroy();


    header('location: index.php');
}