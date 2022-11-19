<?php 
session_start();
require_once "../components/db_connect.php";

if(!isset($_SESSION['user'])&&!isset($_SESSION['adm'])){
    header('location: ../index.php');
}
if(isset($_SESSION['user'])){
    header('location: ../home.php');
}


if($_GET['id']){
    $id=$_GET['id'];
    $sql="SELECT * FROM animal WHERE id=$id";
    $result= mysqli_query($connect,$sql);

    if(mysqli_num_rows($result)==1){
        $data=mysqli_fetch_assoc($result);
        $name=$data['name'];
        $address=$data['address'];
        $desc = $data['description'];
        $size = $data['size'];
        $age = $data['age'];
        $vac = $data['vaccinated'];
        $breed = $data['breed'];
        $status = $data['status'];
        $picture = $data['picture'];


    } else {
        header("location: ../error.php");
    }

    


} else {
    header("location: error.php");
}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Animal</title>
        <?php require_once '../components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 70% ;
            }     
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }    
            .bg{
                background-color:beige;
            }
        </style>
    </head>
    <body class="bg">
        <fieldset>
            <legend class='h2 mb-3'>Delete request <img class='img-thumbnail rounded-circle' src='../pictures/<?= $picture?>' alt=""></legend>
            <h5>You have selected the data below:</h5>
            <table class="table w-75 mt-3">
                <tr>
                    <td><?= $name ?></td>
                </tr>
            </table>

            <h3 class="mb-4">Do you really want to delete this animal?</h3>
            <form action="./actions/a_delete.php" method="post"  >
                <input type="hidden" name="id" value="<?= $id ?>" />
                <input type="hidden" name="picture" value="<?= $picture ?>" />
                <button class="btn btn-danger" type="submit">Yes, delete it!</button>
                <a href="index.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
            </form>
        </fieldset>
    </body>
</html>