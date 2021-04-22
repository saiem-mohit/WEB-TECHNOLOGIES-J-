    <!DOCTYPE html>
    <html>
    <head>
        <title>Post reports</title>
    </head>
    <body>
    <div style="text-align:center;">
        <div>
     
            <form action="" method="post">
                <div>
                    <button type="submit" value="Search" formaction="setSuggestion.php">Search</button>
                </div>
            </form>
            <h1>Reported Posts</h1>
     
            <div id="back" style="width:100%;text-align:right;color: #b3d7ff">
                <button type="button" id="back" onclick="location.href='admin.php';"><--Back</button>
            </div><br>
     
     
        </div>
     
     
        <?php
        require 'database.php';
        session_start();
        ob_start();
     
     
        $limit = 5;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        };
        $start_from = ($page - 1) * $limit;
        $sql = "SELECT * FROM `user_blog` WHERE `blog_deleted` IS NULL ORDER BY `report_count` DESC LIMIT $start_from, $limit";
     
        $result = mysqli_query($conn, $sql);
     
        if (mysqli_num_rows($result) > 0) {
     
            while ($row = mysqli_fetch_assoc($result)) {
     
     
            $post_id = $row['post_id'];
     
            $sql2 = "SELECT * FROM `extras` WHERE `post_id` ='" . $post_id . "'";
            $result2 = mysqli_query($conn, $sql2);
     
     
            echo '<div style="text-align:center;">';
            echo "<fieldset>";
            echo '<div style="width: 100%;" id="posts">';
     
            $row2 = mysqli_fetch_assoc($result2);
            echo '<img src="' . $row2['link'] . '" alt="Picture"  height="150" width="200" id="pic"/>';
            echo '<br>';
            ?>
     
     
            <div>
                <h3><a href="readMore.php?id=<?php echo $row['post_id']; ?>" target="_blank">
                        Title: <?php echo $row['title']; ?> </a></h3>
                <small>Created on <?php echo $row['time_date']; ?> by <?php echo $row['user_name']; ?></small>
     
                <p><?php echo $row['post']; ?></p>
                <a href="deletePost.php?id=<?php echo $row['post_id']; ?>"
                   onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                <br><br>
            </div>
        </div>
        <?php
        echo "</div>";
        echo "</fieldset>";
        echo "<hr>";
     
        }
    }
     
    ?>
     
    <div id="page">
        <?php
        $sql = "SELECT COUNT(user_id) FROM `user_blog`";
        $rs_result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($rs_result);
        $total_records = $row[0];
        $total_pages = ceil($total_records / $limit);
        $pagLink = "<ul>";
        for ($i = 1; $i <= $total_pages; $i++) {
            $pagLink .= "<a href='post_report.php?page=" . $i . "'>" . $i . "</a>";
        };
        echo $pagLink . "</ul>";
        //close db connection here
        ?>
    </div>
    </div>
    </body>
    </html>
