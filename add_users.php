<?php
include_once 'db.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO users ( name , email , phone ) VALUES ( '$name' , '$email' , '$phone' );";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: index.php?msg=useraddsuccessfullly");
    }else{
        echo "error" . mysqli_error($error);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>add users</title>
</head>
<body>
    <div class="inser">
        <form action="" method="POST">
            <label for="name">
                name:
                <input type="text" name="name" placeholder="Full name">
            </label>
            <label for="email">
                E-mail:
                <input type="email" name="email" placeholder="E-mail">
            </label>
            <label for="phone">
                Phone:
                <input type="number" name="phone" id="phone" placeholder="0600-000000">
            </label>
            <button class="myButton" type="submit" name="submit">Send</button>
            <a href="index.php">concel</a>
        </form>
    </div>

    <script>
        let inputs = document.querySelectorAll('input');
        let form = document.querySelector('form');
        form.addEventListener('submit' ,e=>{
            let isEmpty = false;
            inputs.forEach(item=>{
                if(!item.value){
                    isEmpty = true;
                }
            })
            if(isEmpty){
                e.preventDefault();
                let msg = document.createElement('p');
                msg.classList.add('alert');
                msg.innerHTML = "make sure all the input are filled";
                document.body.appendChild(msg);
            }
        })
    </script>
</body>
</html>