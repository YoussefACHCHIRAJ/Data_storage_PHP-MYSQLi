<?php
include_once 'db.php';
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn,$sql);
if($result){
    $row = mysqli_fetch_assoc($result);
    $firstName= $row['firstName'];
    $lastName= $row['lastName'];
    $email= $row['email'];
    $phone= $row['phone'];
    $city= $row['city'];
    $gender =  $row['gender'];
}else{
    echo "error: " . mysqli_error($conn);
}
// updating
if(isset($_POST['submit'])){
    $updFirstName=$_POST['firstName'];
    $updLastName=$_POST['lastName'];
    $updEmail=$_POST['email'];
    $updPhone=$_POST['phone'];
    $updCity=$_POST['city'];
    $updGender = $_POST['inlineRadio'];
    $sql = "UPDATE `users` SET `firstName`='$updFirstName',`lastName`='$updLastName',`email`='$updEmail',`phone`='$updPhone',`city`='$updCity',`gender`='$updGender' WHERE id=$id";

    $result = mysqli_query($conn,$sql);
     if($result){
        header("Location: information.php?msgUpdate=user updated successfully");
    }else{
        echo "failed to insert data";
        echo "<br>" . "error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrab -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="add-users.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>update information</title>
    
</head>
<body>
    <div style="max-width:40em;" class="container">
    <h1>update the information of user</h1>
    <form action="" method="POST">
        <!-- name input -->
         <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <input type="text" name="firstName" class="form-control" placeholder="first name" value="<?php echo $firstName ?>" aria-label="First name">
            <input type="text" name="lastName" class="form-control" placeholder="last name" value="<?php echo $lastName ?>" aria-label="Last name">
        </div>
        <!-- email input -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="userexemple@gmail.com" value="<?php echo $email ?>" aria-label="email">
        </div>
        <!-- phone and city inputs -->
        <div class="row">
            <div class="col">
                <input type="number" name="phone" class="form-control" placeholder="Phone number" value="<?php echo $phone ?>" aria-label="Phone name">
            </div>
            <div class="col">
                <input type="text" name="city" class="form-control" placeholder="city" value="<?php echo $city ?>" aria-label="city name">
            </div>
        </div>
        <!-- check form  -->
        <h5>Gender:</h5>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadio" value="female" id="inlineRadio1" <?php echo ($gender ==="female")? "cheked":""; ?>>
            <label class="form-check-label" for="inlineRadio1">female</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadio" value="homme" id="inlineRadio2" <?php echo ($gender ==="homme")? "cheked":""; ?>>
            <label class="form-check-label" for="inlineRadio2">Homme</label>
        </div>
        <!-- button submit -->
        <div style="margin-top:.5em;" class="d-grid gap-2">
            <button class="btn btn-outline-dark" type="submit" name="submit">update</button>
        </div>
    </form>
    </div>
</body>
</html>