<?php 
session_start();
require_once "../../components/db_connect.php";
require_once "../../components/file_upload.php";

if(!isset($_SESSION['user'])&&!isset($_SESSION['adm'])){
    header('location: ../../index.php');
}
if(isset($_SESSION['user'])){
    header('location: ../../home.php');
}

if($_POST){
    $id=$_POST['id'];
    $picture=$_POST['picture'];

    ($picture == 'product.png' ?: unlink("../../pictures/$picture"));

    $sql="DELETE FROM animal WHERE id=$id";
    
     if(mysqli_query($connect,$sql)){
         $class="success";
         $message= "You deleted this animal successfully!" ;
     }else {
         $class="denger";
         $message= " something went wrong!" ;
     }

}else {
    header("location: ../actions/error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete</title>
        <?php require_once '../../components/boot.php'?>  
    </head>
    <body>
        <div class="container">
            
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?= $message?></p>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>