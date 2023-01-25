<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrab -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="information.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>users information</title>
</head>
<body>
    <?php
        if(isset($_GET['msgAdd'])){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
                     . $_GET['msgAdd'] .
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }else if(isset($_GET['msgUpdate'])){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
                     . $_GET['msgUpdate'] .
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }else if(isset($_GET['msgDelete'])){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
                     . $_GET['msgDelete'] .
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }
    ?>
    <h1>information:</h1>
    <a href="add_users.php" class="btn btn-primary">add user</a>
    <table class="table table-dark table-border table-info">
        <thead class=" table-active">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">First name</th>
            <th scope="col">Last name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Phone</th>
            <th scope="col">city</th>
            <th scope="col">gendre</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider ">
            <?php 
                include_once 'db.php';
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn,$sql);
                if(!$result){
                    echo "erro: " . mysqli_error($conn);
                }else{
                    while($row = mysqli_fetch_assoc($result)){
            ?>
                        <tr>
                            <th scope="row"><?php echo $row['id'] ?></th>
                            <th scope="row"><?php echo $row['firstName'] ?></th>
                            <th scope="row"><?php echo $row['lastName'] ?></th>
                            <th scope="row"><?php echo $row['email'] ?></th>
                            <th scope="row"><?php echo $row['phone'] ?></th>
                            <th scope="row"><?php echo $row['city'] ?></th>
                            <th scope="row"><?php echo $row['gender'] ?></th>
                            <td>
                            <a href="update.php?id=<?php echo $row['id'] ?>"><i style="margin-inline: .3em;" class="fa-regular fa-pen-to-square"></i></a>
                            <a href="delete.php?id=<?php echo $row['id'] ?>"><i style="margin-inline: .3em;" class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
            <?php        
                    }
                }
            ?>
           
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>