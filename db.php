<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "loginSystem";

$conn = mysqli_connect($serverName,$userName,$password,$dbName);
if(!$conn){
    die("failed connection" . mysqli_connect_error());
}

