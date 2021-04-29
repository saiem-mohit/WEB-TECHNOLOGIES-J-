<?php
require 'database.php';
session_start();
ob_start();

if (!(isset($_SESSION['user_id']))) {
    header("location:index.php");
} else {

    $_SESSION['pageBackButtonRef']="userPost";

    ?>


    <!DOCTYPE html>
    <html>
    <head>
        <title>User Posts</title>
    </head>
    <body>


    <div style="text-align:center;">

        <form action="">

            <button type="submit" value="Most_Recent" formaction="index.php">Most Recent</button>
            <button type="submit" formaction="profile.php">My Profile</button>
            <button type="submit" formaction="blog.php">Add new post</button>
            <button type="submit" formaction="logout.php">Logout</button>
            <br><br>
            <input id="in" type="text" placeholder="Search" onclick="window.location.href='setSuggestion.php'"/>
            <button type="submit" value="Search" formaction="setSuggestion.php">Search</button>
        </form>

    </div><br><br>


    <?php


    $limit = 5;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    };
    $start_from = ($page - 1) * $limit;
    $total_pages= array();


    $row2Data=array();
    $total_pages= array();

    getUserPost($page,$limit);

    foreach ($row2Data as $row) {


        echo '<div style="text-align:center;">';
        echo "<fieldset>";
        echo '<div style="width: 100%;"><img src="' . $row['link'] . '" alt="Picture" height="150" width="200"/><br>';
        echo "<div>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<small><i>Created on " . $row['time_date'] . " by " . $row['user_name'] . "</i></small>";
        echo "<p>" . $row['post'] . '...';
        echo "<a href='readMore.php?id=" . $row['post_id'] . "'>Read More</a></p>";
        ?>
        <button><a class="btn btn-default" href="postedit.php?id=<?php echo $row['post_id']; ?>">Edit Post</a></button>
        <button><a class="btn btn-default" href="deletePost.php?id=<?php echo $row['post_id']; ?>"
                   onClick="return confirm('Are you sure you want to delete?')">Delete</a></button>
        <?php
        echo "</div>";
        echo "</fieldset>";
        echo "<hr>";

        ?>
        </form>
        <?php

    }


    ?>

    <div style="text-align:center;">
        <?php
        $pagLink = "<ul>";
        for ($i = 1; $i <= $total_pages[0]; $i++) {
            $pagLink .= "<a href='userPosts.php?page=" . $i . "'>" . $i . "</a> ";
        };
        echo $pagLink . "</ul>";

        ?>
    </div>

    </body>
    </html>

    <?php
}

?>
