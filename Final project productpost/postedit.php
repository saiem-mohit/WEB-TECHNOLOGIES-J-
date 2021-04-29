<?php
require 'database.php';
session_start();
ob_start();

if (!(isset($_SESSION['user_id']))) {
    header("location:index.php");
} else {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $_SESSION['edit_post_id'] = $id;

    $query = "SELECT * FROM `user_blog` WHERE `post_id` ='" . $id . "'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    ?>

    <html lang="en">
    <head>
        <title>Post Edit</title>
    </head>
    <body>
    <fieldset>
        <legend><h2>Post:</h2></legend>
        <div style="text-align:center;">

            <div id="back" style="width:100%;text-align:right;color: #b3d7ff">
                <button type="button" id="back" onclick="location.href='userPosts.php';"><--Back</button>
            </div><br>

            <div id="blog"><h2>Edit Post:</h2>
                <br/>
                <form action="savepostedit.php" enctype="multipart/form-data" onsubmit="return validateForm()"
                      formaction="userPosts.php" method="post"
                      name="blog_post_form">

                    <div id="title_id">
                        <label for="text">Title:</label>
                        <textarea placeholder="Give a Title to your writing" rows="3" id="comment" wrap="hard"
                                  name="title"><?php echo $row['title'] ?></textarea>
                    </div><br>


                    <div id="blog_id">
                        <label for="text">Blog:</label>
                        <textarea placeholder="Write your blog here" rows="4" cols="60" id="comment" wrap="hard"
                                  name="blog"><?php echo $row['post'] ?></textarea>
                    </div>


                    <div id="submit">
                        <button type="submit">Submit</button>
                    </div>

                </form>


            </div>
        </div>
    </fieldset>
    <script>
        function validateForm() {

            var postTitle = document.getElementById("title_id").getElementsByTagName("textarea")[0].value;
            if (postTitle == "") {
                alert("Enter Title");
                return false;
            }

            var blog_writings = document.getElementById("blog_id").getElementsByTagName("textarea")[0].value;

            if (blog_writings == "") {
                alert("Enter writings");
                return false;
            }
            //   var back = document.getElementById("back").getElementsByTagName("button")[0].value;

            if (true)
                alert("Successfully posted");


        }


    </script>
    </body>
    </html>

    <?php
}

?>

