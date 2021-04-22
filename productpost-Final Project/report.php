<?php
require 'database.php';
session_start();

$sql = "UPDATE `user_blog` 
  SET `report_count` = `report_count` + 1 
  WHERE `post_id` = '" . $_SESSION['post_id'] . "'";

$sql2 = "INSERT INTO `likecommentstatus` (`user_id`, `post_id`, `status`) VALUES ('" . $_SESSION['user_id'] . "', '" . $_SESSION['post_id'] . "', TRUE)";

if (mysqli_query($conn, $sql)) {
    mysqli_query($conn, $sql2);
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

header('Location: ' . $_SESSION['return_to_readMore']);


?>