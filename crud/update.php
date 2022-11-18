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

  $sql = "SELECT * FROM animal where id=$id";

  $result= mysqli_query($connect,$sql);
  if(mysqli_num_rows($result)==1){
    $data = mysqli_fetch_assoc($result);
    $name=$data['name'];
    $address=$data['address'];
    $picture=$data['picture'];
    $desc = $data['description'];
    $size=$data['size'];
    $age=$data['age'];
    $vac=$data['vaccinated'];
    $breed=$data['breed'];
    $status=$data['status'];



    // $sql="SELECT * FROM suppliers";
    // $result=mysqli_query($connect,$sql);

    // $supList="";

    // while($row=mysqli_fetch_assoc($result)){
    //     $supList .= "<option value='{$row['supId']}'>{$row['sup_name']}</option>";
        
    // }


  }else {
    header("location: error.php");
  } 
  

} else {
    header("location: error.php");
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Product</title>
        <?php require_once '../components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }  
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }     
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='../pictures/<?php echo $picture ?>' ></legend>
            <form action="actions/a_update.php" method="post" enctype="multipart/form-data" >
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td><input class="form-control" type="text"  name="name" placeholder ="Product Name" value="<?php echo $name ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><input class="form-control" type="text"  name="address" placeholder ="Address" value="<?php echo $address ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><input class="form-control" type= "number" name="age" step="any"  placeholder="Age" value ="<?php echo $age ?>" /></td>
                    </tr>
                    <tr>
                        <th>Vaccinated</th>
                        <td><select name="vac" value="<?= $vac?>">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select></td>
                    </tr> 
                    <tr>
                        <th>Breed</th>
                        <td><input class='form-control' type="text" name= "breed" placeholder="Breed" step="any" value="<?php echo $breed ?>"/></td>
                    </tr>
                    <th>Status</th>
                        <td><select name="status" value="<?= $status?>">
                            <option value="available">Available</option>
                            <option value="adopted">Adopted</option>
                        </select></td>
                    </tr> 
                    
                     <tr>
                        <th>Size</th>
                        <td><select name="size" value="<?= $size?>" >
                            <option value="big">big</option>
                            <option value="big">small</option>
                        </select></td>
                    </tr> 
                    <tr>
                        <th>Description</th>
                        <td><textarea name="desc"  cols="100" rows="4" ><?= $desc?></textarea></td>
                    </tr> 
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="picture" /></td>
                    </tr>
                    
                    <tr>
                        <input type= "hidden" name= "id" value= "<?php echo $id ?>" />
                        <input type= "hidden" name= "picture" value= "<?php echo $picture ?>" />
                        <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                        <td><a href= "index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>