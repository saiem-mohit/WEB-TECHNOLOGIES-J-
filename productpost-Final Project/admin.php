<?php
require 'database.php';
session_start();


if (!(isset($_SESSION['admin_user_id']))) {
    header("location:index.php");
} else {

    ?>


    <html lang="en">
    <head>
        <title>ADMIN</title>
    </head>
    <body>

    <fieldset>
        <legend><h2>Admin:</h2></legend>
        <div style="text-align:center;">

            <form action="" method="post">
                <h1><u>Welcome <?php echo $_SESSION['admin_user_name'] ?></u></h1>

                <button type="submit" id="mainpage" formaction="index.php">Main Page</button>

              
                <button type="submit" id="pass" value="adminpassword" formaction="adminpassword.php">Change Password
                </button>

                <button type="submit" id="logout" value="logout" formaction="logout.php">LogOut</button>

            </form>

        </div>
    </fieldset>
    </body>
    </html>


    <?php
}

?>
