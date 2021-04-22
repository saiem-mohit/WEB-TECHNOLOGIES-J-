<?php
require 'database.php';
session_start();


echo '<div style="text-align:center;">';

if (!(isset($_SESSION['admin_user_id']))) {
    header("location:index.php");
}
else {
    $oldPass=$_POST['opass'];
    $newPass=$_POST['npass'];
    $rPass=$_POST['rpass'];

    if($oldPass!=$_SESSION["admin_password"] )
    {
        echo '<h2>old password wrong</h2>';
        echo '<br/><b><a href="admin.php">Go to admin page</a></b>';
        echo '<br/><b><a href="adminpassword.php">Go to Change password page</a></b>';
    }

    else
    {
        $sql = "UPDATE `admin` SET `admin_pass`='" . $newPass . "' WHERE admin_id='" . $_SESSION["admin_user_id"] . "'";


        if (mysqli_query($conn, $sql)) {
            echo 'Successfully done ';
            $_SESSION["admin_password"] =$newPass;
            echo '<br/><b><a href="admin.php">Go to admin page</a></b>';

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
echo "</div>";
?>