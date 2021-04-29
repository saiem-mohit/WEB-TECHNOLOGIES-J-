<?php
require 'database.php';
session_start();

//var_dump($_POST);
$username = dataFilter($_POST["username"]);
$pass = dataFilter($_POST["pass"]);


$sql = "SELECT * FROM `user_table` WHERE `email`= '" . $username . "' AND `password`= '" . $pass . "' AND `user_deleted` IS NULL";

$result = mysqli_query($conn, $sql);


$sqlForAdmin = "SELECT * FROM `admin` WHERE `email`= '" . $username . "' AND `admin_pass`= '" . $pass . "'";

$resultForAdmin = mysqli_query($conn, $sqlForAdmin);


if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result) == 1) {

    while ($row = mysqli_fetch_assoc($result)) {

        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["full_name"] = $row["full_name"];
        $_SESSION["user_name"] = $row["user_name"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["password"] = $row["password"];
        $_SESSION["gender"] = $row["gender"];
        $_SESSION["profile_pic"] = $row["profile_pic"];
        $_SESSION["occupation"] = $row["occupation"];
        $_SESSION["dob"] = $row["dob"];
        $_SESSION["phone_number"] = $row["phone_number"];
//        $_SESSION["user_deleted"]=$row["user_deleted"];
//        print_r($_SESSION);

    }
    header("location:index.php");
}

else if (mysqli_num_rows($resultForAdmin) > 0 && mysqli_num_rows($resultForAdmin) == 1) {

    while ($row = mysqli_fetch_assoc($resultForAdmin)) {
        $_SESSION["admin_user_id"] = $row["admin_id"];
        $_SESSION["admin_user_name"] = $row["admin_name"];
        $_SESSION["admin_email"] = $row["email"];
        $_SESSION["admin_password"] = $row["admin_pass"];
    }
    header("location:admin.php");
}

else {
    echo "User id or password wrong";
    echo '<br/><b><a href="index.php">Go to Home page</a></b>';

}


function dataFilter($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}


?>