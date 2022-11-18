<?php
session_start();
require_once './components/db_connect.php';


if(!isset($_SESSION['user'])&&!isset($_SESSION['adm'])){
    header('location: index.php');

if(isset($_SESSION['user'])){
    header('location: home.php');
}
}

$sql ="SELECT * FROM user WHERE id = {$_SESSION['adm']}";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);

$fname=$row['first_name'];
$lname=$row['last_name'];
$email=$row['email'];
$phone=$row['phone_number'];
$picture=$row['picture'];
$status=$row['status'];
$address=$row['address'];

// $sql="SELECT * FROM users WHERE id={$_SESSION['user']}";
// $result1=mysqli_query($connect,$sql);


// if(mysqli_num_rows($result1)>0){
//     while($row1=mysqli_fetch_assoc($result1)){
//         $tbody .= "<tr>
//         <td>".$row1['picture']."</td>
//         <td>".$row1['first_name']."</td>
//         <td>".$row1['date_of_birth']."</td>
//         <td>".$row1['email']."</td>
//         <td>edit delete</td>
//         </tr>";
//     }
//}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php require_once 'components/boot.php' ?>
    <title>Welcome,<?php echo $fname ?></title>

</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 my-4">
                <div class="card-body text-center">
                    <img src="pictures/admavatar.png" alt=" avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-4">Admistrator <?= $fname ?></h5>
                    <div class="d-flex justify-content-center mb-2">
                        <a class="btn btn-outline-primary ms-1" href="logout.php?logout">Log Out</a>
                        <a class="btn btn-outline-success ms-1" href="crud/index.php">Animals</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-2">
                <p class='h2'>Users</p>
                <table class='table align-middle mb-0 bg-white'>
                    <thead class='table-light'>
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Date of birth</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>