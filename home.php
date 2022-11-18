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





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, <?= $fname ?></title>
    <?php require_once 'components/boot.php' ?>

</head>

<body>
    <div class="container py-5 h100">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="pictures/<?= $picture ?>" alt=" avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-4">Hi, <?php echo $fname?> </h5>
                        <div class="d-flex justify-content-center mb-2">
                            <a class=" btn btn-primary ms-1" href="update.php?id=<?php echo $_SESSION['user'] ?>">Update your profile</a>
                            <a class="btn btn-outline-primary ms-1" href="logout.php?logout">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card card-body ">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">First Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $fname ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Last Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $lname ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $address ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $email ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Phone number</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $phone ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Status</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $status ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>