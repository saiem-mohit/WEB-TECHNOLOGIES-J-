<!DOCTYPE html>

<?php
require 'database.php';
session_start();


if (!(isset($_SESSION['user_id']))) {
    header("location:index.php");
}
else {

?>


<html>
<head>
    <title>Welcome | <?php echo $_SESSION["full_name"] ?></title>
</head>
<body>
<fieldset>
    <legend><h2>Profile:</h2></legend>
    <form action="" method="post">
        <div style="text-align:center;">
            <div>
                <div>
                    <button type="submit" formaction="index.php">Home</button>
                    <button type="submit" formaction="index.php">Most Recent</button>
                    <button type="submit" formaction="mostLiked.php">Most liked</button>
                    <button type="submit" formaction="blog.php">Add new post</button>
                    <button type="submit" formaction="userPosts.php">Posts OF Mine</button>
                    <button type="submit" formaction="logout.php">Logout</button>
                </div>

                <div>
                    <h2>Profile Picture</h2>
                    <div>
                        <?php echo '<img  src="' . $_SESSION["profile_pic"] . '" alt="Profile Picture" height="200" width="200"/>'; ?>
                        <div>
                            <p><b>Welcome </b></p>
                            <h4><?php echo $_SESSION["full_name"] ?></h4>

                            <a href="editProfile.php">Edit Profile</a>
                        </div>
                    </div>
                    <br>
                </div>
                <br>
                <div id="textfieldforprofile">
                    <div id="">
                        <label for="usr">Username:</label>

                        <input type="text" id="" value=<?php echo $_SESSION["user_name"] ?> readonly>
                    </div>
                    <br>

                    <div id="">
                        <label for="usr">Fullname:</label>

                        <input type="text" id="" value="<?php echo $_SESSION["full_name"] ?>" readonly>
                    </div>
                    <br>

                    <div id="">
                        <label for="usr">Email:</label>

                        <input type="text" id="" value=<?php echo $_SESSION["email"] ?> readonly>
                    </div>
                    <br>

                    <div id="">
                        <label for="usr">Phone:</label>

                        <input type="text" id="" value=<?php echo $_SESSION["phone_number"] ?> readonly>
                    </div>
                    <br>

                    <div id="">
                        <label for="usr">Gender:</label>

                        <input type="text" id="" value=<?php echo $_SESSION["gender"] ?> readonly>
                    </div>
                    <br>

                    <div id="">
                        <label for="usr">Occupation:</label>

                        <input type="text" id="" value=<?php echo $_SESSION["occupation"] ?> readonly>
                    </div>
                    <br>

                    <div id="">
                        <label for="usr">Date Of Birth:</label>

                        <input type="text" id="" value=<?php echo $_SESSION["dob"] ?> readonly>
                    </div>
                    <br>
                </div>
                <br><br>

            </div>
            <div id="comment2">
                <label for="comment">Suggestion:</label>
                <textarea rows="2" cols="30" id="comment" name="comment"></textarea>
            </div>

            <div>
                <button type="submit" onclick="return validateForm()" formaction="send_suggestion.php">Send</button>
            </div>

        </div>

    </form>
</fieldset>

<script>


    function validateForm() {
        let comment = document.getElementById("comment2").getElementsByTagName("textarea")[0].value;
        if (comment == "") {
            alert("Please write something");
            return false;
        }

    }
</script>
</body>
</html>

<?php
}

?>