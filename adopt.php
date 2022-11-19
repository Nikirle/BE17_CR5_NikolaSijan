<?php
session_start();
require_once "components/db_connect.php";

if(!isset($_SESSION['user'])&&!isset($_SESSION['adm'])){
    header('location: index.php');
}
if(isset($_SESSION['adm'])){
    header('location: dashboard.php');
}


if($_GET){
    $id=$_GET['id'];
    $user_id=$_SESSION['user'];
    
    $sql="INSERT INTO pet_adoption(fk_user_id,fk_pet_id) VALUES('$user_id', '$id')";
    if (mysqli_query($connect, $sql) === TRUE) {
        $message = "<div>Your adopted successfully!</div>";
    } else {
        $message = "Error.Please try again.. <br>";
    }
    
} else {
    header('location: animals/error.php');
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete</title>
        <?php require_once 'components/boot.php'?>  
        <style>
            .bg{
                background-color:beige;
            }
            </style>
    </head>
    <body>
        <div class="container">
            
            <div class="bg alert alert-<?=$class;?>" role="alert">
                <p><?= $message?></p>
                <a href='index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>