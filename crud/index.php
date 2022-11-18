<?php 
session_start();
require_once "../components/db_connect.php";

if(!isset($_SESSION['user'])&&!isset($_SESSION['adm'])){
    header('location: ../index.php');
}
if(isset($_SESSION['user'])){
    header('location: ../home.php');
}

// $sql ="SELECT * FROM animal LEFT JOIN suppliers ON suppliers.supId=products.fk_supplier_id";
$sql ="SELECT * FROM animal";
$result = mysqli_query($connect,$sql);
$card="";



if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)){
        $card .= "<div class='card' style='width: 18rem;'>
        <img style='height:13rem;' src='../pictures/{$row['picture']}' class='card-img-top' alt='...'>
        <div class='card-body'>
          <h5 class='card-title'>{$row['name']}</h5>
          <p class='card-text'>{$row['description']}</p>
        </div>
        <ul class='list-group list-group-flush'>
          <li class='list-group-item'>Size: {$row['size']}</li>
          <li class='list-group-item'>Age: {$row['age']}</li>
          <li class='list-group-item'>Breed: {$row['breed']}</li>
          <li class='list-group-item'>Vaccinated: {$row['vaccinated']}</li>
          <li class='list-group-item'>Address: {$row['address']}</li>
          <li class='list-group-item'>Status: {$row['status']}</li>

    
        </ul>
        <div class='card-body'>
        <a class='text-decoration-none' href='update.php?id=" . $row['id'] ."'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
        <a class='text-decoration-none' href='delete.php?id=" . $row['id'] ."'><button class='btn btn-danger btn-sm'>Delete</button></a>
        

            </div>
      </div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP CRUD</title>
        <?php require_once '../components/boot.php'?>
        <style type="text/css">
            .manageProduct {           
                margin: auto;
            }
            .img-thumbnail {
                width: 70px !important;
                height: 70px !important;
            }
            td {          
                text-align: left;
                vertical-align: middle;
            }
            tr {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="manageProduct w-75 mt-3 ">    
            <div class='mb-3'>
                <a href= "create.php"><button class='btn btn-primary'type="button" >Add animal</button></a>
                <a href= "../dashboard.php"><button class='btn btn-success'type="button" >Dashboard</button></a>

            </div>
            <p class='h2'>Animals</p>
            <div class="container">
                <div class="row p-3 gap-3"> 
                   <?= $card ?>
                 </div>
             </div>
        </div>
    </body>
</html>