<?php
include_once 'db.php';
if(isset($_POST['submit'])){
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $gender = $_POST['inlineRadio'];
    $sql = "INSERT INTO `users`(`firstName`, `lastName`, `email`, `phone`, `city`, `gender`)
            VALUES ('$firstName' , '$lastName' , '$email' , '$phone' , '$city' , '$gender');";

    $result = mysqli_query($conn,$sql);
     if($result){
        header("Location: index.php?msg=useraddsuccessfully");
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
    <title>add users</title>
    
</head>
<body>
    <div style="max-width:40em;" class="container">
    <form action="" method="POST">
        <!-- name input -->
         <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <input type="text" name="firstName" class="form-control" placeholder="first name" aria-label="First name">
            <input type="text" name="lastName" class="form-control" placeholder="last name" aria-label="Last name">
        </div>
        <!-- email input -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="userexemple@gmail.com" aria-label="email">
        </div>
        <!-- phone and city inputs -->
        <div class="row">
            <div class="col">
                <input type="number" name="phone" class="form-control" placeholder="Phone number" aria-label="Phone name">
            </div>
            <div class="col">
                <input type="text" name="city" class="form-control" placeholder="city" aria-label="city name">
            </div>
        </div>
        <!-- check form  -->
        <h5>Gender:</h5>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadio" value="female" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">female</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadio" value="homme" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">Homme</label>
        </div>
        <!-- button submit -->
        <div style="margin-top:.5em;" class="d-grid gap-2">
            <button class="btn btn-outline-dark" type="submit" name="submit">Save</button>
        </div>
    </form>
    </div>
</body>
</html>