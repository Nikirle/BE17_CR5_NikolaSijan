<?php 
session_start();
require_once "../components/db_connect.php";

if(!isset($_SESSION['user'])&&!isset($_SESSION['adm'])){
    header('location: ../index.php');
}
if(isset($_SESSION['user'])){
    header('location: ../home.php');
}

// $sql="SELECT * FROM animal";
// $result = mysqli_query($connect,$sql);
// $animal='';
// while($row=mysqli_fetch_assoc($result)){
//     $suppliers .= "<option value='{$row['supId']}'>{$row['sup_name']}</option>";
    
// }



?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once '../components/boot.php'?>
        <title>PHP CRUD  |  Add Animal</title>
        <style>
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }       
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Add Animal</legend>
            <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
                <table class='table'>
                    <tr>
                        <th>Name</th>
                        <td><input class='form-control' type="text" name="name"  placeholder="Animal Name" /></td>
                    </tr>    
                    <tr>
                        <th>Address</th>
                        <td><input class='form-control' type="text" name= "address" placeholder="Address" step="any" /></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><input class='form-control' type="number" name= "age" placeholder="Age" step="any" /></td>
                    </tr>
                    <tr>
                        <th>Vaccinated</th>
                        <td><select name="vac">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select></td>
                    </tr> 
                    <tr>
                        <th>Breed</th>
                        <td><input class='form-control' type="text" name= "breed" placeholder="Breed" step="any" /></td>
                    </tr>
                    <th>Status</th>
                        <td><select name="status">
                            <option value="available">Available</option>
                            <option value="adopted">Adopted</option>
                        </select></td>
                    </tr> 
                    
                     <tr>
                        <th>Size</th>
                        <td><select name="size">
                            <option value="big">big</option>
                            <option value="big">small</option>
                        </select></td>
                    </tr> 
                    <tr>
                        <th>Description</th>
                        <td><textarea name="desc"  cols="100" rows="4"></textarea></td>
                    </tr> 
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="picture" /></td>
                    </tr>
                    <tr>
                        <td><button class='btn btn-success' type="submit">Insert Animal</button></td>
                        <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>