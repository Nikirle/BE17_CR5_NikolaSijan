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
    $name=$_POST['name'];
    $price = $_POST['price'];
    $picture = file_upload($_FILES['picture'],'product');
    $supplier = $_POST['supplier'];

    if($picture->error == 0){
        ($_POST['picture']=='product.png' ?: unlink("../../pictures/$_POST[picture]"));
        $sql="UPDATE  products SET name='$name',price=$price,picture='$picture->fileName' ,fk_supplier_id=$supplier WHERE id=$id";
    } else {
        $sql="UPDATE  products SET name='$name',price=$price,fk_supplier_id=$supplier  WHERE id=$id";
    }
   
    if(mysqli_query($connect,$sql)){

        $class="success";
        $message="You edit products successfully";

    } else {
        header("location: ../error.php");
    }



} else {
    header("location: ../error.php");
}




?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../../components/boot.php'?> 
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?= $class?>" role="alert">
                <p><?=$message?></p>
                
                <a href='../update.php?id=<?= $id ?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body> 
</html>