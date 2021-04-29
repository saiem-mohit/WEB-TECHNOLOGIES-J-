<?php
require 'database.php';
session_start();
ob_start();

$email = $_GET['e'];


if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo '1';
    exit();
}
$sql = "SELECT * FROM `user_table` WHERE `email`= '" . $email . "' AND `user_deleted` IS NULL";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    echo '0';
exit();
}
else{
    echo '2';
}