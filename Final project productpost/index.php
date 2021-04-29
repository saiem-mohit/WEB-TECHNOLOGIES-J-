<?php
session_start();

?>
    <html>
    <head>
        <title>Open source blogging</title>
    </head>
<body>

    <div style="text-align:center;">

        <form action="">

            <button type="submit" value="Most_Recent" formaction="index.php">Most Recent</button>
 

            <?php

            $_SESSION['pageBackButtonRef']="index";

            if ((isset($_SESSION['user_id']))) {
                echo '<button type="submit" formaction="profile.php">My Profile</button>';
                echo '<button type="submit" formaction="blog.php">Add new post</button>';
                echo '<button type="submit" formaction="userPosts.php">Posts OF Mine</button>';
                echo '<div style="text-align:right;"><button type="submit" formaction="logout.php">Logout</button></div>';
            } else if ((isset($_SESSION['admin_user_id']))) {
                echo '<button type="submit" value="Login" formaction="admin.php">Admin Profile</button>';
                echo '<div style="text-align:right;"><button type="submit" formaction="logout.php">Logout</button></div>';
            } else {
                echo '<button type="submit" value="Login" formaction="login.php">Login</button>';
                echo '<button type="submit" value="register" formaction="signup.php">Register</button>';
            }
            ?>
            <br><br><br>
            <form style="text-align:right;">
                <input id="in" type="text" placeholder="Search" onclick="window.location.href='setSuggestion.php'"/>
                <button type="submit" value="Search" formaction="setSuggestion.php">Search</button>
            </form>



            <div>
                <h1>Recent Posts:</h1>
            </div>

        </form>

    </div>



        <?php
        require 'database.php';

        $limit = 5;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        };

        $row2Data=array();
        $total_pages=array();

        getpost($page,$limit);

        foreach($row2Data as $row){

        echo '<div style="text-align:center;">';
        echo "<fieldset>";
        echo '<div style="width: 100%;"><img src="' . $row['link'] . '" alt="Picture" height="150" width="200"/><br>';
        echo "<div>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<small><i>Created on " . $row['time_date'] . " by " . $row['user_name'] . "</i></small>";
        echo "<p>" . $row['post'].'...' ;
        echo "<a href='readMore.php?id=" . $row['post_id'] . "'>Read More</a></p>";
        echo "</div>";
        echo "</fieldset>";
        echo "<hr>";


        ?>

        <?php


        }



        ?>


    <footer>

    <div style="text-align:center;">
        <?php
        $pagLink = "<ul>";
        for ($i = 1; $i <= $total_pages[0]; $i++) {
            $pagLink .= "<a href='index.php?page=" . $i . "'>" . $i . "</a> ";
        };
        echo $pagLink . "</ul>";

        ?>
    </div>


<?php include('footer.php'); ?>