<?php 
session_start();
require_once "../components/db_connect.php";

if(!isset($_SESSION['user'])&&!isset($_SESSION['adm'])){
    header('location: ../index.php');
}
if(isset($_SESSION['user'])){
    header('location: ../home.php');
}


$sql ="SELECT * FROM animal";
$result = mysqli_query($connect,$sql);
$tbody="";



if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)){
        $tbody .= "<tr>
            <td><img style='width:150px; height:150px' src='../../pictures/" .$row['picture']."'</td>
            <td>" .$row['name']."</td>
            <td>" .$row['address']."</td>
            <td>" .$row['description']."</td>
            <td>" .$row['size']."</td>
            <td>" .$row['age']."</td>
            <td>" .$row['vaccinated']."</td>
            <td>" .$row['breed']."</td>
            <td>" .$row['status']."</td>
            <td>
            <a href='update.php?id=" .$row['id']."'><button class='btn btn-primary  btn-sm' type='button'>Edit</button></a>
            <a href='delete.php?id=" .$row['id']."'><button class='btn btn-danger mt-3 btn-sm' type='button'>Delete</button></a>
            
            </td>   
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
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

            .bg{
                background-color:beige;
            }
        </style>
    </head>
    <body class="bg">
        <div class=" manageProduct w-75 mt-3 ">    
            <div class='mb-3'>
                <a href= "create.php"><button class='btn btn-primary'type="button" >Add animal</button></a>
                <a href= "../dashboard.php"><button class='btn btn-success'type="button" >Dashboard</button></a>

            </div>
            <p class='h2'>Animals</p>
            <div class="container">
                <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Picture</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Description</th>
                <th scope="col">Size</th>
                <th scope="col">Age</th>
                <th scope="col">Vaccinated</th>
                <th scope="col">Breed</th>
                <th scope="col">Status</th> 
                </tr>
            </thead>
            <tbody>
                <?= $tbody?>
            </tbody>
            </table>
             </div>
        </div>
    </body>
</html>