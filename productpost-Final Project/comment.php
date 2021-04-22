<?php
require 'database.php';
session_start();



$comment = dataFilter($_POST["comment3"]);

$sql = "INSERT INTO `comment` (`post_id`, `comment_id`, `comment`, `username`, `comment_deleted`, `Comment_time`) VALUES 
        ('" . $_SESSION['post_id'] . "', NULL , '" . $comment . "', '" . $_SESSION["user_name"] . "', NULL , now())";


if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

header('Location: ' . $_SESSION['return_to_readMore']);


function dataFilter($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

?>