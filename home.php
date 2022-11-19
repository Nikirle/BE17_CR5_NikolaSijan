<?php

session_start();
require_once './components/db_connect.php';

if(isset($_SESSION['adm'])){
    header('location: dashboard.php');
}

if(!isset($_SESSION['user'])){
    header('location: index.php');
}

$sql="SELECT * FROM user where id={$_SESSION['user']}";
$result= mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);

$fname=$row['first_name'];
$lname=$row['last_name'];
$email=$row['email'];
$address=$row['address'];
$picture=$row['picture'];
$status=$row['status'];
$phone=$row['phone_number'];



$sql ="SELECT * FROM animal";
$result = mysqli_query($connect,$sql);
$card="";

if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)){
        $card .= "<div class='card' style='width: 18rem;'>
        <img style='height:13rem;' src='pictures/{$row['picture']}' class='card-img-top' alt='...'>
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
        <a class='text-decoration-none' href='details.php?id=" .$row['id']."'><button class='btn btn-info btn-sm' type='button'> Show Details</button></a>
        <a class='text-decoration-none' href='home.php?id=" . $row['id'] ."'><button class='btn btn-success btn-sm'>Take me home</button></a>
        

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
    <title>Welcome, <?= $fname ?></title>
    <?php require_once 'components/boot.php' ?>
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


<body>
    <div class="d-flex gap-3 p-3 justify-content-between align-items-center bg">
        <div class="d-flex gap-3 align-items-center"><img class="img-thumbnail" src="pictures/<?= $picture?>">
        <div><h2>Hi, <?= $fname?></h2> </div>
        <div><a class="btn btn-outline-primary ms-1" href="senior.php">Seniors</a></div>
    </div>
        <div><a class="btn btn-outline-danger ms-1" href="logout.php?logout">Log Out</a></div>
    </div>
            
    <div class="container">
    <div class="row p-3 gap-3"> 
        <?= $card ?>
    </div>
    </div>


</body>

</html>