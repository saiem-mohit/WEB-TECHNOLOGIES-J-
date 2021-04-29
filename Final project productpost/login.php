<?php
session_start();

if ((isset($_SESSION['user_id']))) {

    header("location:profile.php");
} else if ((isset($_SESSION['admin_user_id']))) {
    header("location:admin.php");
} else if (!(isset($_SESSION['user_id'])) || !(isset($_SESSION['admin_user_id']))) {
    ?>

    <html>
    <head>
        <title>Login</title>
    </head>
    <body>
    <fieldset>
        <legend><h2>Login:</h2></legend>
        <div style="text-align:center;">
            <br/>
            <form action="loginCheck.php" onsubmit="return validateForm()" method="post">



                <div id="email">
                    <label for="email">Email:</label>
                    <input type="text" name="username">
                </div><br>

                <div id="pass">
                    <label for="pwd">Password: </label>
                    <input type="password" id="pwd" name="pass">
                </div><br>

                <div id="submit"><input type="submit" value="login"></div><br>
                <div id="back">
                    <button type="button" id="back" onclick="location.href='index.php';">
                        <--Back
                    </button>
                </div>

            </form>

        </div>


        <script>
            function validateForm() {

                var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                var full = document.getElementById("email").getElementsByTagName("input")[0];
                //  console.log(full);
                var fullName = full.value;
                //  console.log(fullName);
                if (fullName == "") {
                    alert("Name must be filled out");
                    return false;
                }
                else if (!fullName.match(mailFormat)) {
                    alert("Please follow proper Email format");
                    return false;
                }

                var passWord = document.getElementById("pass").getElementsByTagName("input")[0].value;
                if (passWord == "") {
                    alert("Enter a password");
                    return false;
                }
            }

        </script>

    </body>
    </html>

    <?php
}

?>


