<?php
require 'database.php';
session_start();
ob_start();

echo '<div style="text-align:center;">';

$_SESSION["full_name"] = $fullname = dataFilter($_POST["fullname"]);

$_SESSION["gender"] = $gender = dataFilter($_POST["gender"]);

$_SESSION["dob"] = $bday = dataFilter($_POST["bday"]);

$_SESSION["phone_number"] = $phone = dataFilter($_POST["phone"]);

$_SESSION["password"] = $pass = dataFilter($_POST["pass"]);

$_SESSION["occupation"] = $occupation = dataFilter($_POST["occupation"]);


$info = pathinfo($_FILES['propic']['name']);

if ($info["filename"] == "") {
    $sql = "UPDATE `user_table` SET `full_name`='" . $fullname . "', `password`='" . $pass . "', `gender`='" . $gender . "', `phone_number`='" . $phone . "',`occupation`='" . $occupation . "',`dob`='" . $bday . "' WHERE user_id='" . $_SESSION["user_id"] . "'";


    if (mysqli_query($conn, $sql)) {
        echo 'Successfully done ';

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    $ext = $info['extension'];
    $pic_id = rand();
    $newname = ((string)$pic_id) . "." . $ext;

    $_SESSION["profile_pic"] = $target = 'propics/' . $newname;

    move_uploaded_file($_FILES['propic']["tmp_name"], $target);

    $sql = "UPDATE `user_table` SET `full_name`='" . $fullname . "', `password`='" . $pass . "', `gender`='" . $gender . "', `phone_number`='" . $phone . "',`occupation`='" . $occupation . "',`dob`='" . $bday . "' ,`profile_pic`='" . $target . "' WHERE user_id='" . $_SESSION["user_id"] . "'";


    if (mysqli_query($conn, $sql)) {
        echo '<h2>Successfully done</h2>';

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}



echo '<br/><b><a href="index.php">Go to Home page</a></b>';

echo "</div>";
function dataFilter($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

?>