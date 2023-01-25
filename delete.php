<?php
include_once 'db.php';
$id = $_GET['id'];
$sql = "DELETE FROM `users` WHERE id = $id";
$result = mysqli_query($conn,$sql);
if($result){
    header("Location: information.php?msgDelete= user deleted successfully");
}else{
    echo "Error: ". mysqli_error($conn);
}