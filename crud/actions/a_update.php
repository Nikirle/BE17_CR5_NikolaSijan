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
    $address = $_POST['address'];
    $age = $_POST['age'];
    $vac = $_POST['vac'];
    $breed = $_POST['breed'];
    $status = $_POST['status'];
    $desc = $_POST['desc'];
    $size = $_POST['size'];

    $picture = file_upload($_FILES['picture'],'animal');


    if($picture->error == 0){
        ($picture=='product.png' ?: unlink("../../pictures/$_POST[picture]"));

        $sql="UPDATE  animal SET name='$name',address='$address',picture='$picture->fileName',age=$age,vaccinated='$vac',breed='$breed',status='$status',description='$desc',size='$size'  WHERE id=$id";
     } else {
        $sql="UPDATE  animal SET name='$name',address='$address',age=$age,vaccinated='$vac',breed='$breed',status='$status',description='$desc',size='$size'  WHERE id=$id";
     }

    

    if(mysqli_query($connect,$sql)){

        $class="success";
        $message="You edit animals successfully";

    } else {
        header("location: ../error.php");
    }


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
            
            <div class="alert alert-<?= $class?>" role="alert">
                <p><?=$message?></p>

                <a href='../update.php?id=<?= $id ?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>