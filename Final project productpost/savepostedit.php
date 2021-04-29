<?php
require 'database.php';
session_start();
ob_start();

if (!(isset($_SESSION['user_id']))) {
    header("location:index.php");
}
else {

    $title = dataFilter($_POST["title"]);

    $blog = dataFilter($_POST["blog"]);


    $sql = "UPDATE `user_blog` SET `title`='" . $title . "', `post`='" . $blog . "' WHERE `post_id`='" . $_SESSION['edit_post_id'] . "'";
    //var_dump($sql);

    if (mysqli_query($conn, $sql)) {
        echo 'Successfully done ';
        echo '<br/><b><a href="userPosts.php">Go to User Posts page</a></b>';

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
function dataFilter($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
?>