<?php
require 'database.php';
session_start();


if (!(isset($_SESSION['user_id']))) {
    header("location:index.php");
} else {

    ?>

    <html lang="en">
    <head>
        <title>Describe Your Product Review</title>
    </head>
    <body>

    <fieldset>
        <legend><h2>Post:</h2></legend>
        <div style="text-align:center;">

            <div id="blog"><h2>Post Your Product</h2></div>
            <br/>

            <form action="blogPost.php" enctype="multipart/form-data" onsubmit="return validateForm()" method="post"
                  name="blog_post_form">
                <div id="mypost">
                    <div id="title_id">
                        <label for="text">Product Name:</label>
                        <textarea placeholder="Give a Title to your writing" id="comment" name="title" rows="3"></textarea>
                        <span id="title_idErr"> </span>
                        <br><br><br>

                        <div>
                            <div id="pic_id">
                                <span>Choose files</span>
                                <input type="file" name="upload">
                            </div>
                            <div>
                                <input id="myfile" type="text" placeholder="Upload one or more files" disabled>
                                <span id="pic_idErr"> </span>
                            </div>
                        </div>

                    </div>


                    <div>
                        <div id="blog_id">
                            <label for="text">Product Review:</label>
                            <textarea placeholder="Write your blog here" rows="10" cols="75" id="comment" wrap="hard"
                                      name="blog"></textarea>
                            <span id="blog_idErr"> </span>
                        </div>
                    </div>


                    <div id="buttons">
                        <button type="button" onclick="location.href='userPosts.php';">Back</button>
                        <button type="submit">Submit</button>

                    </div>
                </div>

            </form>


            <script>
                function validateForm() {

                    var postTitle = document.getElementById("title_id").getElementsByTagName("textarea")[0].value;
                    if (postTitle == "") {
                        document.getElementById('title_idErr').innerHTML = "Enter Title";
                        document.getElementById('title_idErr').style.color = "red";
                        //alert("Enter Title");
                        return false;
                    }

                    var blog_writings = document.getElementById("blog_id").getElementsByTagName("textarea")[0].value;

                    if (blog_writings == "") {
                        document.getElementById('blog_idErr').innerHTML = "Enter writings";
                        document.getElementById('blog_idErr').style.color = "red";
                        //alert("Enter writings");
                        return false;
                    }

                    var Picture = document.getElementById("pic_id").getElementsByTagName("input")[0].value;
                    if (Picture == "") {
                        document.getElementById('pic_idErr').innerHTML = "Upload a relevant picture according to your post";
                        document.getElementById('pic_idErr').style.color = "red";
                        //alert("Upload at least one relevant picture according to your post");
                        return false;
                    }

                    if (true)
                        alert("Successfully posted");

                }
            </script>
        </div>
    </fieldset>
    </body>
    </html>

    <?php
}

?>