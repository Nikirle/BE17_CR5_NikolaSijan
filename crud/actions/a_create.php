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
    $name=$_POST['name'];
    $address=$_POST['address'];
    $age=$_POST['age'];
    $vac=$_POST['vac'];
    $breed=$_POST['breed'];
    $status=$_POST['status'];
    $size=$_POST['size'];
    $desc=$_POST['desc'];
    $picture=file_upload($_FILES['picture'],'animal');
    
   
    $sql="INSERT INTO animal (name,address,description,size,age,vaccinated,breed,status,picture)
    VALUES('$name','$address','$desc','$size',$age,'$vac','$breed','$status','$picture->fileName')";

       
    if(mysqli_query($connect,$sql)){
        $class="success";
        $message="The entry below was successfully created <br>
        <table>
        <td> $name</td>
       
        </table>";

    } else {
        $class="danger";
        $message="Not successfully created";
       
    }
} else {
    header("location:../error.php");
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
            <div class="alert alert-<?= $class;?>" role="alert">
                <p> <?= $message ?></p>
                
                <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>