<?php
require 'database.php';
session_start();


$fullname = dataFilter($_POST["fullname"]);

$username = dataFilter($_POST["username"]);

$email = dataFilter($_POST["email"]);

$gender = dataFilter($_POST["gender"]);

$bday = dataFilter($_POST["bday"]);

$phone = dataFilter($_POST["phone"]);

$pass = dataFilter($_POST["pass"]);

$occupation = dataFilter($_POST["occupation"]);


$info = pathinfo($_FILES['propic']['name']);
//print_r($info);
//$tempName=$_FILES['propic']["tmp_name"];
//print_r($tempName);
$ext = $info['extension'];
$pic_id = rand();
$newname = ((string)$pic_id) . "." . $ext;

$target = 'propics/' . $newname;

move_uploaded_file($_FILES['propic']["tmp_name"], $target);


$sql = "INSERT INTO `user_table` (`user_id`, `user_name`, `full_name`, `email`, `password`, `gender`, `profile_pic`, `occupation`, `phone_number`, `dob`,`user_deleted`)
VALUES (NULL, '" . $username . "', '" . $fullname . "', '" . $email . "', '" . $pass . "', '" . $gender . "', '" . $target . "', '" . $occupation . "','" . $phone . "', '" . $bday . "', NULL)";

$choice_id = array("Raw_Science" => 1, "Computer_Science" => 2, "EEE" => 3, "Others" => 4);

if (mysqli_query($conn, $sql)) {

    $last_id = mysqli_insert_id($conn);

    foreach ($_POST['check'] as $each_check) {

        $sql2 = "INSERT INTO `user_choise` (`user_id`, `user_name`, `choice_id`, `choice`) VALUES ('" . $last_id . "', '" . $username . "', '" . $choice_id[$each_check] . "', '" . $each_check . "')";
        mysqli_query($conn, $sql2);
    }

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


echo '<div style="text-align:center;">';
echo 'Successfully registered ';
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