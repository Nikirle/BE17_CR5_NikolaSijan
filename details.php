<?php

require_once 'components/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM animal WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $address = $data['address'];
        $picture = $data['picture'];
        $description = $data['description'];
        $size = $data['size'];
        $age = $data['age'];
        $vac = $data['vaccinated'];
        $breed = $data['breed'];
        $status = $data['status'];
        
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Details</title>
        <?php require_once 'components/boot.php'?>
        <link rel="stylesheet" href="style.css">
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 50px;
                width: 60% ;
            }  
            .img-thumbnail{
                width: 90px !important;
                height: 90px !important;
            }     
            .bg{
                background-color:beige;
            }
           
        </style>
    </head>
    <body class="bg">
        <fieldset>
            <legend class='h2'>Details<img class='img-thumbnail rounded-circle' src='pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
            <form action="details.php"  method="post" enctype="multipart/form-data">
                <table class="table">
                <tr>
                        <th>Name</th>
                        <td><?=$name ?></td>
                    </tr>    
                    <tr>
                        <th>Address</th>
                        <td><?=$address?>  </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><?=$description ?></td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td><?=$size?> </td>
                    </tr>
                    
                    
                    <tr>
                        <th>Age</th>
                        <td><?=$age?>  </td>
                    </tr>
                    <tr>
                        <th>Vaccinated</th>
                        <td><?=$vac ?></td>
                    </tr>
                    <tr>
                        <th>Breed</th>
                        <td><?=$breed ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?=$status ?></td>
                    </tr>
                    <tr> 
                        <td><a href= "home.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>