<?php
if(isset($_SESSION['adm'])){
    header('location: dashboard.php');
}

if(isset($_SESSION['user'])){
    header('location: index.php');
}

require_once "components/db_connect.php";
require_once "components/file_upload.php";

$error = false;
$fname=$lname=$address=$email=$pass=$picture=$phone = "";
$fnameError=$lnameError=$addressError=$emailError=$passError=$picError=$phoneError = "";

if(isset($_POST['btn-signup'])){

$fname=$_POST['fname'];
$fname=trim($_POST['fname']);
$fname=strip_tags($_POST['fname']);
$fname=htmlspecialchars($_POST['fname']);

$lname=$_POST['lname'];
$lname=trim($_POST['lname']);
$lname=strip_tags($_POST['lname']);
$lname=htmlspecialchars($_POST['lname']);

$address=$_POST['address'];
$address=trim($_POST['address']);
$address=strip_tags($_POST['address']);
$address=htmlspecialchars($_POST['address']);

$email=$_POST['email'];
$email=trim($_POST['email']);
$email=strip_tags($_POST['email']);
$email=htmlspecialchars($_POST['email']);

$phone=$_POST['phone'];
$phone=trim($_POST['phone']);
$phone=strip_tags($_POST['phone']);
$phone=htmlspecialchars($_POST['phone']);

$password=$_POST['pass'];
$password=trim($_POST['pass']);
$password=strip_tags($_POST['pass']);
$password=htmlspecialchars($_POST['pass']);


$uploadError="";
$picture=file_upload($_FILES['picture']);

if(empty($fname) || empty($lname)){
    $error=true;
    $fnameError="Please enter your firstname and lastname";
} else if(strlen($fname)<3 || strlen($fname)<3)  {
    $error=3;
    $fnameError="firstname and lastname must have at least 3 characters";
} 

if(empty($address)){
    $error=true;
    $addressError="Please Enter your address";
}

if(empty($email)){
    $error=true;
    $emailError="Please Enter your email";
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $error=true;
    $emailError="Please enter a valid email!";
}

if(empty($phone)){
    $error=true;
    $phoneError="Please Enter your phone number";
}

$sql="SELECT email FROM user where email='$email'";
$result=mysqli_query($connect,$sql);
$count=mysqli_num_rows($result);
if($count !== 0){
    $error=true;
    $emailError="Provided email is allready in use";
}

if(empty($password)){
    $error=true;
    $passError="Please Enter your password";
}elseif(strlen($password)<6){
    $error=true;
    $passError="Password must have more than 5 characters";
}

$pass=hash('sha256',$password);


if(!$error){
    $query="INSERT INTO user (first_name,last_name,password,address,email,picture,phone_number)
    VALUES ('$fname','$lname','$pass','$address','$email','$picture->fileName',$phone)";

    $res=mysqli_query($connect,$query);
echo $res ; 
    if($res){
        $class="success";
        $errMSG="Successfully registered, you may log in";
        $uploadError=($picture->error !=0) ? $picture->ErrorMessage  : '';
    
    }else {
        $class="danger";
        $errMSG="Something went wrong";
        $uploadError=($picture->error !=0) ? $picture->ErrorMessage  : '';
    }
}

}
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration System</title>
    <?php require_once 'components/boot.php' ?>
</head>

<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" autocomplete="off" enctype="multipart/form-data">
                            <?php
                               if(isset($errMSG)){

                             
                            ?>
                                <div class="alert alert-<?php echo $class ?>">
                            <p><?php echo $errMSG; ?></p>
                            <p><?php echo $uploadError; ?></p>
                            </div>
                            <?php
                              }
                            ?>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="fname" class="form-control" placeholder="First name" maxlength="50" value="<?php echo $fname ; ?>" />
                                        <span class="text-danger"> <?php echo $fnameError  ?> </span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="lname" class="form-control" placeholder="Last name" maxlength="50" value="<?php echo $lname ;  ?>" />
                                        <span class="text-danger"> <?php echo $fnameError ?> </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <input class='form-control' type="text" name="address" placeholder="Enter Your Address" value="<?php echo $address ;  ?>" />
                                        <span class="text-danger"> <?php echo $addressError  ?> </span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input class='form-control' type="file" name="picture">
                                        <span class="text-danger"> <?php   ?> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-2 pb-2">
                                    <div class="form-outline">
                                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ; ?>" />
                                        <span class="text-danger"> <?php echo $emailError ?> </span>

                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12 mb-2 pb-2">
                                    <div class="form-outline">
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone number" maxlength="40" value="<?php echo $phone ; ?>" />
                                        <span class="text-danger"> <?php echo $phoneError ?> </span>

                                    </div>
                                </div>
                                <div class="col-md-12 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15"      />
                                        <span class="text-danger"><?php echo $passError   ?></span>
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" style="width:100%" name="btn-signup">Register</button>
                            </div>
                            <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="index.php" class="fw-bold text-body"><u>Login here</u></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>